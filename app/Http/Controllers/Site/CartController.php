<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\Size;
use App\Notifications\CartStatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);
        return view('site.cart.index', compact('cart'));
    }

    public function AddItemToCart(Request $request)
    {
        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);
        $validator = Validator::make($request->all(), [
            'color' => 'required|numeric|exists:colors,id',
            'size' => 'required|numeric|exists:sizes,id',
            'quantity' => 'required|numeric'
        ]);

        if (!$product || $product->is_ban)
            return response()->json(['status' => false, 'msg' => 'لا يمكن الوصول لهذا المنتج']);

        if ($validator->fails())
            return response()->json(['status' => false, 'msg' => $validator->errors()->first()]);

        $productQuantity = ProductQuantity::where(function ($q) use ($request, $product) {
            $q->where('product_id', $product->id)
                ->where('size_id', $request['size'])
                ->where('color_id', $request['color'])
                ->where('quantity', '>=', $request['quantity']);
        });

//        if (!$productQuantity->exists() || $product->is_ban)
        if (!$productQuantity->exists())
           // return response()->json(['status' => false, 'msg' => 'هذا المنتج غير متاح حاليا']);
            return response()->json(['status' => false, 'msg' => 'الكمية المطلوبة من اللون والمقاس غير متوفرة حاليا']);

        if ($productQuantity->first()->quantity < $request['quantity']) {
            return response()->json(['status' => false, 'msg' => 'عفوا الكمية المطلوبة غير متاحة حاليا']);
        }

        $productQuantity = $productQuantity->first();
        $openCart = $user->carts()->where('status', 'open');
        if ($openCart->exists()) {
            $openCart = $openCart->first();
            $openCart->itemsUpdate($productQuantity, $request->all());
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        } else {
            $result = Cart::addToCart($productQuantity, $request->all());
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }

    }


    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);
        if (count($cart->cartItems) > 0) {
            if ($coupon) {
                $discount_val = $this->couponDiscount($cart, $coupon);
                $cart->update(['coupon_id' => $coupon->id, 'coupon_perc' => $coupon->discount, 'coupon_val' => $discount_val]);
                return response()->json([
                    'status' => true,
                    'coupon_id' => $coupon->id,
                    'value' => $discount_val,
                    'perc' => $coupon->discount,
                    'msg' => __('تم اضافة الخصم بنجاح')
                ]);
            }
            return response()->json(['status' => false, 'msg' => __('trans.code_incorrect')]);
        } else {
            return response()->json(['status' => 'no_products', 'msg' => __('لا يوجد منتجات لتطبيق الخصم عليها ')]);
        }
    }


    public function couponDiscount($cart, $coupon)
    {
        if (!$coupon) return 0;
        $result = [];
        $cartItems = $cart->cartItems;
        if (count($cartItems) > 0) {
            foreach ($cartItems as $item) {
                $product = Product::findOrFail($item->productQuantity->product->id);
                $productPrice = $product->priceAfterDiscount * $item->quantity;
                $price = price_after_coupon_discount($coupon, $productPrice);
                $result[] = $price;
            }
        }
        $total_after_discount = array_sum($result);
        return round($total_after_discount, 2);
    }


    public function removeFromCart($id)
    {
        $item = CartItem::findOrFail($id);
        $item->productQuantity->update(['quantity' => $item->productQuantity->quantity + $item->quantity]);
        $item->delete();
        return response()->json('success');
    }

    public function update(Request $request)
    {
        $item = CartItem::findOrFail($request->item);

//        if ($request->quantity > $item->productQuantity->quantity){
//            return response()->json(['status' => false, 'msg' => 'الكمية المطلوبة غير متوفرة حاليا']);
//        }
       // dd($item->quantity , $request->quantity);
        if ($request->quantity > $item->quantity){
            $q = $request->quantity - $item->quantity;
            $item->productQuantity->update(['quantity' => $item->productQuantity->quantity - $q]);
        }else{
            $q =  $item->quantity - $request->quantity ;
            $item->productQuantity->update(['quantity' => $item->productQuantity->quantity + $q]);
        }

        $item->update([
            'quantity' => $request->quantity,
            'price' => $item->productQuantity->product->priceAfterDiscount * $request->quantity,
        ]);

        return 'updated';
    }


    public function payOff()
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);
        if (!$cart) return back();
        $coupon = $cart->coupon ? $cart->coupon : 0;
        $total = $cart->totalProductsPrice;
        $discount = $total * ($coupon ? $coupon->discount : 0) / 100;
        return view('site.cart.payOff', compact('cart', 'total', 'discount', 'coupon'));
    }

    public function submitPayOff(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_id' => 'required|integer|exists:addresses,id',
            'payment' => 'required|in:COD,bank_transaction,wallet,credit',
            'transaction_image' => 'required_if:payment,bank_transaction|image',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        $cart = auth()->user()->carts()->whereStatus('open')->first();
        if (!$cart) return back();

        $address = Address::findOrFail($request->address_id);

        if ($request->payment == 'bank_transaction') {
            $image = $request->transaction_image;
            $cart->update(['transaction_image' => Storage::disk('public')->put('photos/carts', $image)]);
        }

        if ($request->payment == 'wallet') {
            $wallet = auth()->user()->wallet;
            if (!$wallet) {
                return response()->json(['error' => 'لا يوجد لديك محفظة']);
            }
            $amount = $wallet->amount;

            if ((float)$amount >= (float)$request->final_total) {
                $wallet->update(['amount' => $amount - $request->final_total]);
            } else {
                return response()->json(['error' => 'المبلغ الموجود فى المحفظة غير كافى للدفع']);
            }
        }

        $cart->update([
            'address_id' => $address->id,
            'payment' => $request->payment,
            'status' => 'confirmed',
        ]);
        $cart->user->notify(new CartStatusNotification($cart, 'confirmed'));
        return response()->json(['status' => true, 'id' => $cart->id]);
    }
}
