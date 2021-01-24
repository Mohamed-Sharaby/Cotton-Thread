<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'image' => 'sometimes',
            'city' => 'nullable',
        ]);

        if ($request->image) {
            if ($user->image) {
                $image = str_replace(url('/') . '/storage/', '', $user->image);
                deleteImage('photos/users', $image);
            }
            $image = json_decode($request->image, true);
            $file = base64_decode($image['data']);
            $name = 'photos/users/' . Str::random(10) . '.' . 'png';
            Storage::disk('public')->put($name, $file);
            $validator['image'] = $name;
        }

        $user->update($validator);
        return back()->with('success', __('Updated Successfully'));
    }


    public function wallet()
    {
        $wallet = Wallet::whereUserId(\auth()->user()->id)->first();
        return view('site.user.wallet', compact('wallet'));
    }


}
