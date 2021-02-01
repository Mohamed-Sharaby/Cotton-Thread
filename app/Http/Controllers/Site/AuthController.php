<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function resetForm()
    {
        return view('site.auth.forget');
    }

    public function sendCode(Request $request)
    {
        $request->validate(['phone' => 'required|exists:users,phone']);
        $user = User::wherePhone($request->phone)->first();
        if (!$user){
            return back()->with('error','رقم الجوال الذى أدخلته ليس مسجل لدينا ');
        }
        if ($user->reset_code) {
            $code = $user->reset_code;
        } else $code = '1234';

        $user->update(['reset_code' => $code]);
        $phone = $user->phone;
        return view('site.auth.check-code', compact('phone'))->with('success', 'برجاء ادخال الكود الذى تم ارساله على جوالك');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'code' => 'required|exists:users,reset_code',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::wherePhone($request->phone)->first();
        if ($user->reset_code === $request->code) {
            $user->update([
                'password' => $request->password,
                'reset_code' => ''
            ]);
           // return back()->with('success', 'تم تغيير كلمة المرور بنجاح');
            return redirect(route('login'));
        }
        return back()->with('error', 'برجاء المحاولة مرة اخرى');
    }
}
