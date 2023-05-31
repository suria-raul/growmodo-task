<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return inertia('Forms/Login');
    }

    public function login(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->getCredentials();

        if (Auth::attempt($credentials)) {
            $loginRequest->session()->regenerate();

            return redirect()
                ->intended('dashboard')
                ->with('message', 'Successfully logged in');
        }

        return redirect()->route('login.show')
            ->withErrors(trans('auth.failed'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login.show')
            ->with('message', 'Logged out successfully!');
    }
}
