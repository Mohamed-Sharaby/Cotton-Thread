<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Discount;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ReturnRequest;
use App\Models\Setting;
use App\Notifications\CartBankTransfareStatus;
use App\Notifications\CartStatusNotification;
use App\Notifications\OrderStatusNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Carts');
    }

    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $carts = Cart::latest()->where('status', '<>', 'open')->get();
        return view('dashboard.carts.index', compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return
     */
    public function show(Cart $cart)
    {
        return view('dashboard.carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return
     */
    public function edit(Cart $cart)
    {
        return view('dashboard.carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return
     */
    public function update(Request $request, Cart $cart)
    {
        $validator = $request->validate([
            'status' => 'required|in:open,confirmed,finished,refused,canceled',
        ]);

        if ($request->status == 'confirmed') {
            foreach ($cart->cartItems as $item) {
                //$item->productQuantity->decrement('quantity',$item->quantity);
            }
        }
//        if ($request->status == 'cancelled') {
//            if ($cart->status != 'deliverd') {
//                foreach ($cart->items as $item) {
//                    if ($item->offer_id) {
//                        $offer = Offer::find($item->offer_id);
//                        foreach ($offer->sizes as $offer_size) {
//                            $offer_size->productSize->quantities()->create(['type' => 'increase', 'quantity' => $item->quantity]);
//                        }
//                    } else {
//                        $item->product_size->quantities()->create(['type' => 'increase', 'quantity' => $item->quantity]);
//                    }
//                }
//            } else {
//                return back()->with('error', 'تم توصيل الطلب .. لا يمكن الغاؤه');
//            }
//        }


        $cart->update($validator);
        return back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return 'Done';
//        return redirect(route('admin.carts.index'))->with('success', 'تم الحذف بنجاح');
    }


}
