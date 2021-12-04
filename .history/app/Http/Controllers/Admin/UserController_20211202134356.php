<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return UserResource::collection($users)->all();
    }

    public function getSingleUser(User $user)
    {
        return $user;
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        return UserResource::collection($user);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
       $data = $user->update($request->validated());
       
       return  UserResource::collection($data);
    }


}
