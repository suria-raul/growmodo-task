<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): UserCollection
    {
        return new UserCollection(User::role('authenticated')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::create($request->validated());
//        by default any user created by the admin
//        will have the authenticated role
        $user->assignRole('authenticated');

        return response()->json([
            'message' => 'User Created Successfully!',
            'model_created' => true
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): UserResource
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json([
            'message' => 'User Updated Successfully!',
            'model_updated' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->user()->hasPermissionTo('administer users')) {
            $user->delete();

            return response()->json([
                'message' => 'User Deleted Successfully!',
                'model_deleted' => true
            ], 200);
        }
    }
}
