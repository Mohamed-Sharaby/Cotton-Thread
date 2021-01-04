<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard/main';

    public function showLoginForm()
    {
        return view('dashboard.auth.login');
    }


    protected function authenticated(Request $request, $user)
    {
        if ($user->is_active != 1) {
            $this->guard()->logout();

            return redirect()
                ->route('admin.login')
                ->withErrors(['email' => __('Your account has been disabled by administration')]);
        }

        return redirect()->intended($this->redirectPath());
    }


}

