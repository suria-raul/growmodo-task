<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('app');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('app');
    }

    public function unsubscribe(User $user)
    {
        $user->is_subscribed = 0;
        $user->save();

        return response()->json([
            'unsubscribe' => true,
            'message' => 'Unsubscribed successfully'
        ]);
    }
}
