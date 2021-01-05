<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\AddressesCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressesController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
//        $user = User::find(1);
        $addresses = new AddressesCollection($user->addresses);
        return $this->apiResponse($addresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
//        $user = User::find(1);
        $validate = Validator::make($request->all(), $this->addressValidation());
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        $user->addresses()->create($request->all());
        return $this->apiResponse(__('address added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
//        $user = User::find(1);
        $address = Address::find($id);
        if(!$address)
            return $this->apiResponse(__('address not found'),404);
        if($address->user_id != $user->id)
            return $this->apiResponse(__('forbidden access to address'),422);
        $validate = Validator::make($request->all(), $this->addressValidation());
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        $address->update($request->all());
        return $this->apiResponse(__('address updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
//        $user = User::find(1);
        $address = Address::find($id);
        if(!$address)
            return $this->apiResponse(__('address not found'),404);
        if($address->user_id != $user->id)
            return $this->apiResponse(__('forbidden access to address'),422);
        $address->delete();
        return $this->apiResponse(__('address deleted successfully'));
    }

    /**
     * @return array
     */
    private function addressValidation()
    {
        return [
            'city_id' => 'required|numeric|exists:cities,id',
            'region_id' => 'required|numeric|exists:regions,id',
            'district_id' => 'required|numeric|exists:districts,id',
            'street' => 'required|string',
            'house_num' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
