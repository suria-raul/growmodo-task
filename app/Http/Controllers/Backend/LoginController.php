<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'User Authenticated!',
                'logged_in' => true
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to Authenticate',
            'logged_in' => false
        ]);
    }
    public function showForm()
    {
        return view('app');
    }
}
