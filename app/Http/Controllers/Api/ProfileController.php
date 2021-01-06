<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\AddressesCollection;
use App\Http\Resources\Resource\UserResource;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class ProfileController extends Controller
{
    use ApiResponse;

    public function profile(Request $request){
        $validator = Validator::make($this->arrayFilter($request),[
            'name'=>'sometimes|string',
            'email'=>'sometimes|email|unique:users,email,'.auth()->id(),
            'phone'=>'sometimes|unique:users,phone,'.auth()->id(),
            'image'=>'sometimes|nullable|file',
            'type'=>'sometimes|string|in:android,ios',
            'fcm'=>'sometimes|string',
        ]);
        if ($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $user = auth()->user();
        $user->update($this->arrayFilter($request));
        $token = JWTAuth::fromUser($user);
        if($request['type'] != null && $request['fcm'] != null){
            $user->fcm_tokens()->updateOrCreate(['type'=>$request['type']],
                ['type'=>$request['type'],'token'=>$request['fcm']]);
        }
        $user['token'] = $token;
        return $this->apiResponse(new UserResource($user));

    }

    public function logout(){
        auth()->logout();
        return $this->apiResponse(__('successfully logged out'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function arrayFilter(Request $request)
    {
        return array_filter($request->all(), function ($var) {
            return ($var !== NULL && $var !== FALSE && $var !== "");
        });
    }


}
