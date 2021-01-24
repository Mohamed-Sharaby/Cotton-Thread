<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = $user->carts()->where('status', 'open')->first();

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

        if (!$productQuantity->exists() || $product->is_ban)
            return response()->json(['status' => false, 'msg' => 'هذا المنتج غير متاح حاليا']);

        if ($productQuantity->first()->quantity < $request['quantity']) {
            return response()->json(['status' => false, 'msg' => 'عفوا الكمية المطلوبة غير متاحة حاليا']);
        }

        $productQuantity = $productQuantity->first();
        $openCart = $user->carts()->where('status', 'open');
        if ($openCart->exists()) {
            $openCart = $openCart->first();
            $openCart->itemsUpdate($productQuantity, $request);
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        } else {
            $result = Cart::addToCart($productQuantity, $request->all());
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }

    }


    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();

        if ($coupon) {
            $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);

            if ($cart->coupon_id == $coupon->id) {
                return response()->json(['status' => 'exists', 'msg' => 'هذا الكوبون مستخدم بالفعل']);
            }

            $discount_val = $this->couponDiscount($cart, $coupon);
            $cart->update(['coupon_id' => $coupon->id, 'coupon_perc' => $coupon->discount, 'coupon_val' => $discount_val]);
            return response()->json([
                'status' => true,
                'value' => $discount_val,
                'perc' => $coupon->discount,
                'msg' => __('تم اضافة الخصم بنجاح')
            ]);
        }
        return response()->json(['status' => false, 'msg' => __('trans.code_incorrect')]);
    }


    public function couponDiscount($cart, $coupon)
    {
        if (!$coupon) return 0;
        $result = [];
        $cartItems = $cart->cartItems;
        if (count($cartItems) > 0) {
            foreach ($cartItems as $item) {
                $product = Product::findOrFail($item->productQuantity->product->id);
                $price = price_after_coupon_discount($coupon, $product->priceAfterDiscount);
                $result[] = $price;
            }
        }
        $total_after_discount = array_sum($result);
        return round($total_after_discount, 2);
    }

    public function removeFromCart($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();
        return response()->json('success');
    }


    public function payOff()
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);

        if (!$cart) return back();
        $coupon = $cart->coupon;
        $discount = $this->couponDiscount($cart, $coupon);
        //$total = $cart->items()->sum('price');
        $total = $cart->cartItems()->sum('price');
        dd($total);
        $cart_discount = Discount::whereType('cart_discount')->first();
        if ($cart_discount && $cart_discount->cart_min <= $total) {
            $discount += $total * $cart_discount->value / 100;
        }

        return view('site.cart.payOff', compact('discount', 'cart', 'banks'));
    }
}
