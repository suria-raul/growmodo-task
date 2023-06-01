<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('app');
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return response()->json([
            'message' => 'Registered Successfully!',
            'registered' => true,
            'user' => Auth::user(),
        ], 200);
    }
}
