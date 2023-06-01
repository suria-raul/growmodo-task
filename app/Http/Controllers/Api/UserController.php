<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
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

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        dd($updateUserRequest->validated());
        $user->update($updateUserRequest->validated());

        return redirect()->route('user.edit')
            ->with('success', 'User updated!');
//        $response = [
//            'message' => 'Failed to update',
//            'isUpdated' => false
//        ];
//
//        if ($user->update($updateUserRequest->validated())) {
//            $response = [
//                'message' => 'Update Success',
//                'isUpdated' => true
//            ];
//        }
//
//        return response()->json($response);
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
