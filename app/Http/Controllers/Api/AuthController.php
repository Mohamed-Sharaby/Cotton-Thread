<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Resource\UserResource;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api
 */
class AuthController extends Controller
{
    use ApiResponse;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
//        dd($request->all());
        $validate = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|numeric|unique:users,phone',
            'password'=>'required|string|confirmed|min:6',
            'type'=>'required|string|in:android,ios',
            'fcm'=>'required|string',
        ]);
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        $inputs = $request->except(['type','fcm']);
        $code = 1234;
        $inputs['confirmation_code'] = $code;
        $user = User::create($inputs);
        $token = JWTAuth::fromUser($user);
        $user['token'] = $token;
        $user->fcm_tokens()->create(['type'=>$request['type'],'token'=>$request['fcm']]);
        return $this->apiResponse(new UserResource($user));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'phone'=>'required|numeric|exists:users,phone',
            'password'=>'required|string|min:6',
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verify(Request $request){
        $validate = Validator::make($request->all(),[
            'phone'=>'required|numeric|exists:users,phone',
            'code'=>'required|numeric|exists:users,confirmation_code',
        ]);
        if($validate->fails())
            return $this->apiResponse($validate->errors()->first(),422);
        $user = User::where('phone',$request['phone']);
        if(!$user->exists()){
            return $this->apiResponse(__('something wrong insert correct phone or password'),404);
        }
        $user = $user->first();
        $user->update(['confirmation_code'=>'verified']);
        $token = JWTAuth::fromUser($user);
        $user['token'] = $token;
        return $this->apiResponse(new UserResource($user));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forget1(Request $request)
    {
        $rules = [
            'phone'=>'required|numeric|exists:users,phone',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $user = User::wherePhone($request->phone)->first();
        $code = 1234;
        $user->update(['reset_code'=>$code]);
        return $this->apiResponse(__('reset code send'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forget2(Request $request)
    {
        $rules = [
            'phone'=>'required|numeric|exists:users,phone',
            'code'=>'required|numeric|exists:users,reset_code'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $user = User::wherePhoneAndResetCode($request->phone,$request->code)->first();
        if(!$user) return $this->apiResponse(__('invalid code'),422);
        return $this->apiResponse(__('reset code is valid'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function forget3(Request $request)
    {
        $rules = [
            'phone'=>'required|numeric|exists:users,phone',
            'password'=>'required|string|confirmed'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $user = User::wherePhone($request->phone)->where('reset_code','!=',null)->first();
        if(!$user)
            return $this->apiResponse(__('user forget Invalid process'),403);
        $user->update(['password'=>$request->password,'verification_code'=>null]);
        $token = JWTAuth::fromUser($user);
        $user['token'] = $token;
        return $this->apiResponse(new UserResource($user));

    }


}
