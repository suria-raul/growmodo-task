<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $response = [
            'message' => 'Failed to delete',
            'isDeleted' => false
        ];

        if ($user->delete()) {
            $response = [
                'message' => 'Deleted successfully',
                'isDeleted' => true
            ];
        }

        return response()->json($response);
    }
}
