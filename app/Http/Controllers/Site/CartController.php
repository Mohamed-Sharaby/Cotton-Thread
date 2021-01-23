<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductQuantity;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $my_cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);
        $cart = $my_cart->items;

        if (count($cart) > 0) {
            $result = [];
            foreach ($cart as $single) {
                if (empty($single['offer_id'])) {
                    $single['item'] = ProductSize::with('product')->findOrFail($single['product_size_id']);
                    $single['type'] = 'product';
                } else {
                    $single['item'] = Offer::findOrFail($single['offer_id']);
                    $single['type'] = 'offer';
                }
                $result[] = $single;
            }
            $cart = $result;
        }
        $discount_val = $my_cart->coupon_val ?? 0;

        return view('site.cart.index', compact('cart', 'discount_val'));
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
        $openCart = $user->carts()->where('status','open');
        if($openCart->exists()){
            $openCart = $openCart->first();
            $openCart->itemsUpdate($productQuantity,$request);
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }else{
            $result = Cart::addToCart($productQuantity,$request->all());
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }

       // return response()->json(['status' => true, 'msg' => 'Added Successfully']);
    }


//    public function addToCart($request)
//    {
//        $current_user = auth()->check() ? auth()->user() : (auth('api')->check() ? auth('api')->user() : []);
//        $cart = Cart::firstOrCreate(['user_id' => $current_user->id, 'status' => 'open']);
////dd($cart);
//        $qty = $request->quantity ?? 1;
//        $item = ['quantity' => $qty];
//
//        $product_size = Size::findOrFail($request->size);
//        $product_color = Color::findOrFail($request->color);
//
//        if ($product_size->quantity < $qty) return response()->json(['value' => false, 'msg' => __('Quantity out of stock')]);
//
//        $price = $product_size->product->priceAfterDiscount;
//
//        $item['size_id'] = $product_size->id;
//        $item['color_id'] = $product_color->id;
//        $item['price'] = $price * $qty;
//        $item['price_before_discount'] = $product_size->price * $qty;
//
//        // update in database
//        if (!is_null($request->item_id)) {
//            $cart_item = CartItem::find($request->item_id);
//            optional($cart_item)->update($item);
//        } elseif (!is_null($request->product_id)) {
//            $cart->cartItems()->create($item);
//        } else {
//            if ($cart->cartItems()->where('size_id', $product_size->id)->first()) $cart->cartItems()->where('size_id', $product_size->id)->update($item);
//            else $cart->cartItems()->create($item);
//        }
//    }
}
