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
        $orders = auth()->user()->carts()->latest()->paginate(2);
        return view('site.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        return view('site.orders.show', compact('cart'));
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
        $item->productQuantity->increment('quantity',$item->quantity);
        $item->delete();
        return 'Done';
    }


}
