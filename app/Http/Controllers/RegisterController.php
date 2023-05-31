<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return inertia('Forms/Register');
    }

    public function register(StoreUserRequest $storeUserRequest)
    {
        User::create($storeUserRequest->validated());

        return redirect()->route('login');
    }
}
