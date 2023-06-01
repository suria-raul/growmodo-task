<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return inertia('Users/Index');
    }

    public function show(User $user)
    {
        return inertia('Users/Show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return inertia('Users/Edit', ['user' => $user]);
    }

}
