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
        $user = auth()->user();
        $cart = $user->carts()->where('status','open')->first();

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
        $openCart = $user->carts()->where('status','open');
        if($openCart->exists()){
            $openCart = $openCart->first();
            $openCart->itemsUpdate($productQuantity,$request);
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }else{
            $result = Cart::addToCart($productQuantity,$request->all());
            return response()->json(['status' => true, 'msg' => 'Added Successfully']);
        }

    }

    public function payOff()
    {
        $cart = Cart::firstOrCreate(['user_id' => auth()->id(), 'status' => 'open']);

        if (!$cart) return back();

        $total = $cart->cartItems()->sum('price');

        //$banks = Bank::whereIsActive(1)->get();
        return view('site.cart.payment', compact('total', 'cart'));
    }
}
