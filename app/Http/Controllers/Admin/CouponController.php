<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Coupons');
    }

    public function index()
    {

        return view(
            'dashboard.coupons.index',
            ['coupons' => Coupon::all()]
        );
  }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(CouponRequest $request)
    {
        $data = $request->validated();
        $coupon = Coupon::create($data);
        return redirect()->route($this->redirectRoute($coupon))->with('success', __('Added Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return
     */
    public function edit(Coupon $coupon)
    {
        return view('dashboard.coupons.edit',compact('coupon'));
    }

    public function update(CouponRequest $request, Coupon $coupon)
    {
        $validator = $request->validated();
        $coupon->update($validator);
        return redirect()->route($this->redirectRoute($coupon))->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return 'Done';
//        return redirect()->route($this->redirectRoute($coupon))->with('success', __('Deleted Successfully'));
    }


    /**
     * redirectRoute
     *
     * @param  Coupon $coupon
     * @return string
     */
    private function  redirectRoute(Coupon $coupon): string
    {
        return 'admin.coupons.index';
    }
}
