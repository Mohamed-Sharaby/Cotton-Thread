<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function profile()
    {
        return view('site.user.profile');
    }

    public function editProfile()
    {
        return view('site.user.profile-edit');
    }

    public function updateProfile(Request $request)
    {
       // dd($request->all());
        $user = auth()->user();

        $validator = $request->validate([
            'name'=> 'required|string|max:191',
            'email'=> 'required|email|unique:users,email,'.$user->id,
            'phone'=> 'required|unique:users,phone,'.$user->id,
            'password'=> 'nullable|confirmed|min:6',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,svg,gif',
            'city'=> 'nullable',
        ]);

        if ($request->image) {
            if ($user->image){
                $image = str_replace(url('/') . '/storage/','',$user->image);
                deleteImage('photos/users',$image);
            }
        }

        $user->update($validator);
        return back()->with('success','Updated Successfully');
    }


    public function wallet()
    {
        $wallet = Wallet::whereUserId(\auth()->user()->id)->first();
        return view('site.user.wallet',compact('wallet'));
    }


}
