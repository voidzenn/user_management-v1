<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function get_user()
    {
        $users = User::with('role')->with('role')->get();
        return UserResource::collection($users)->all();
    }

    public function get_user_paginate()
    {
        $users = User::with('role')->paginate(10);
        // return UserResource::collection($users)->all();
        return $users;
    }

    public function get_single_user(User $user)
    {
        return $user;
    }
   
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        return UserResource::make($user);
    }

    public function update(User $user, UserUpdateRequest $request)
    {
       $data = $user->update($request->validated());
       
       if($data == 1)
       {
           return response()->json(['error' => false, 'msg' => 'User Updated Successfully']);
       }

       return response()->json(['error' => true, 'msg' => 'Failed to update, Try again later']);
    }

    public function update_pass(User $user, UserUpdateRequest $request)
    {
       $data = $user->update($request->validated());
       
       if($data == 1)
       {
           return response()->json(['error' => false, 'msg' => 'Password Updated Successfully']);
       }

       return response()->json(['error' => true, 'msg' => 'Failed to update, Try again later']);
    }

    public function destroy(User $user)
    {
        $logged_id =  Auth::user();

        if($user->id !== $logged_id->id)
        {
            $user->delete();
            return response()->json(['error' => false, 'msg' => 'Deleted Successfully']);
        }
        
        return response()->json(['error' => true, 'msg' => 'You are deleting yourself']);
    }
}
