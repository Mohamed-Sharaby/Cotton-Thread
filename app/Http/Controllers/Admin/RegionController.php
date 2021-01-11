<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\City;
use App\Models\Region;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Regions');
    }
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $regions = Region::latest()->get();
        return view('dashboard.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(RegionRequest $request)
    {
        $validator = $request->validated();
        Region::create($validator);
        return redirect(route('admin.regions.index'))->with('success', 'تم الاضافة بنجاح');
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
    public function edit(Region $region)
    {
        return view('dashboard.regions.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return
     */
    public function update(RegionRequest $request, Region $region)
    {
        $validator = $request->validated();
        $region->update($validator);
        return redirect(route('admin.regions.index'))->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return 'Done';
//        return redirect(route('admin.regions.index'))->with('success', 'تم الحذف بنجاح');
    }


//    public function getCities($id)
//    {
//        $cities = City::where('is_active','1')->where('region_id','=',$id)->pluck('name','id');
//        return response()->json($cities);
//    }
//
//    public function getDistricts($id)
//    {
//        $regions = District::where('is_active','1')->where('city_id','=',$id)->pluck('name','id');
//        return response()->json($regions);
//    }
}
