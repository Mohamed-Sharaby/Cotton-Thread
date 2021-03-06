<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //$orders = auth()->user()->carts()->where('status', '<>', 'open')->latest()->paginate(10);
        $orders = auth()->user()->carts()->latest()->paginate(10);
        return view('site.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->user_id == auth()->user()->id) {
            return view('site.orders.show', compact('cart'));
        }
        return abort(404);
    }

    public function cancel($id)
    {
        $order = Cart::findOrFail($id);
        $order->update(['status' => 'canceled']);
        return redirect(route('website.orders.index'))->with('success', __('تم الغاء الطلب'));
    }


    public function delete($id)
    {
        $order = Cart::findOrFail($id);
        $order->delete();
        return response()->json(__('Success'));
    }

    public function removeItem($id)
    {
        $item = CartItem::findOrFail($id);
        $item->productQuantity->increment('quantity', $item->quantity);
        $item->delete();
        $cart = $item->cart;
        if (count($cart->cartItems) == 0) {
            $cart->delete();
            return response()->json(['status' => false, 'msg' => 'Cart Deleted']);
        }
        return response()->json(['status' => true, 'msg' => 'Item Deleted Successfully']);
    }

}
