<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('site.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

//    public function redirectToProvider($provider)
//    {
//        return Socialite::driver($provider)->redirect();
//    }
//
//    public function handleProviderCallback($provider)
//    {
//        $user = Socialite::driver($provider)->user();
//
//        $social_id = $user->getId();
//        $_user = User::firstOrCreate(['social_id' => $social_id, 'social_type', $provider], [
//            'name' => $user->getName(),
//            'email' => $user->getEmail(),
//            'image' => $user->getAvatar()
//        ]);
//
//        \auth()->login($_user);
//        return redirect()->intended(URL::route('/'));
//    }
}
