<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application as AppFoundation;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'User Authenticated!',
                'logged_in' => true,
                'api_token' => Auth::user()->createToken('API_TOKEN')->plainTextToken,
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to Authenticate',
            'logged_in' => false,
        ]);
    }

    public function showForm(): View|Application|Factory|AppFoundation
    {
        return view('app');
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logged out Successfully',
            'logged_out' => true
        ], 200);
    }
}
