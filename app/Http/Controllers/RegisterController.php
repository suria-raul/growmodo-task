<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return inertia('Forms/Register');
    }

    public function register(StoreUserRequest $storeUserRequest)
    {
        $user = User::create($storeUserRequest->validated());

        Auth::login($user);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Registered successfully!');
    }
}
