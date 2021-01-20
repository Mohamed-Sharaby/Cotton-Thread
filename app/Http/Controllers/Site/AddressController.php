<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function index()
    {
        $addresses = Address::whereUserId(auth()->user()->id)->get();
        return view('site.user.my-addresses', compact('addresses'));
    }


    public function create()
    {
        return view('site.user.add-address');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:191',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable',
            'street' => 'nullable',
            'house_num' => 'nullable',
            'address' => 'required',
        ]);
        $request['user_id'] = auth()->user()->id;
        Address::create($request->all());
        return redirect(route('website.users.addresses.index'))->with('success', __('Address Saved Successfully'));
    }


    public function show($id)
    {
        //
    }


    public function edit(Address $address)
    {
        return view('site.user.edit-address',compact('address'));
    }


    public function update(Request $request, Address $address)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'nullable|string|max:191',
            'city_id' => 'required|exists:cities,id',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable',
            'street' => 'nullable',
            'house_num' => 'nullable',
            'address' => 'required',
        ]);
        $address->update($request->all());
        return redirect(route('website.users.addresses.index'))->with('success', __('Address Updated Successfully'));

    }


    public function destroy(Address $address)
    {
        $address->delete();
        return 'Done';
        //return redirect(route('website.users.addresses.index'));
    }


    public function regions($id)
    {
        $regions = Region::where('city_id',$id)->pluck('ar_name','id');
        return response()->json($regions);
    }

    public function districts($id)
    {
        $districts = District::where('region_id',$id)->pluck('ar_name','id');
        return response()->json($districts);
    }
}
