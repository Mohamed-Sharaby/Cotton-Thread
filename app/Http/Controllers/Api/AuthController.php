<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resource\UserResource;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{
    use ApiResponse;
    public function register(Request $request){
//        dd($request->all());
        $validate = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric|unique:users,phone',
            'password'=>'required|string|confirmed',
            'type'=>'required|string|in:sandroid,ios',
            'fcm'=>'required|string',
        ]);
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        $inputs = $request->except(['type','fcm']);
        $user = User::create($inputs);
        $token = JWTAuth::fromUser($user);
        $user['token'] = $token;
        $user->fcm_tokens()->create(['type'=>$request['type'],'token'=>$request['fcm']]);
        return $this->apiResponse(new UserResource($user));
    }

    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'phone'=>'required|numeric|exists:users,phone',
            'password'=>'required|string',
            'type'=>'required|string|in:web,android,ios',
            'fcm'=>'required|string',
        ]);
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
       $user = User::where('phone',$request['phone']);
       if(!$user->exists()){
           return $this->apiResponse(__('something wrong insert correct phone or password'),404);
       }
        $credentials = $request->only(['phone', 'password']);
        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->apiResponse(__('unauthorized'), 401);
        }
        $user = $user->first();
        $user['token'] = $token;
        $user->fcm_tokens()->updateOrCreate(['type'=>$request['type']],
            ['type'=>$request['type'],'token'=>$request['fcm']]);
        return $this->apiResponse(new UserResource($user));
    }
}
