<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Districts');
    }
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $districts = District::all();
        return view('dashboard.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(DistrictRequest $request)
    {
        $validator = $request->validated();
        District::create($validator);
        return redirect(route('admin.districts.index'))->with('success','تم الاضافة بنجاح');
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
    public function edit(District $district)
    {
        return view('dashboard.districts.edit',compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return
     */
    public function update(DistrictRequest $request, District $district)
    {
        $validator = $request->validated();
        $district->update($validator);
        return redirect(route('admin.districts.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(District $district)
    {
        $district->delete();
        return redirect(route('admin.districts.index'))->with('success', 'تم الحذف بنجاح');
    }


//    public function getCities($id)
//    {
//        $cities = City::where('is_active','1')->where('region_id','=',$id)->pluck('ar_name','id');
//        return response()->json($cities);
//    }
}
