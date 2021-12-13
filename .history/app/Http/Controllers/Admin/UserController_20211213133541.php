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

    public function get_user_paginate($value)
    {
        if( isset( $value ) ) 
        {
            $user->where('name', 'LIKE', '%'.)
        }
        // $users = User::with('role')->paginate(10);
        // return $users;
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

    public function change_status(User $user) 
    {
        $current_status = $user->status;

        if($current_status == 1)
        {
            $data = $user->update(['status' => '0']);
            $new_status = '0';
        }else
        {
            $data = $user->update(['status' => '1']);
            $new_status = '1';
        }

        if($data == 1)
        {
            return response()->json(['error'=> false, 'msg' => 'Success', 'new_status' => $new_status]);
        }
        return response()->json(['error'=> true, 'msg' => 'Failed to change status', 'new_status' => $new_status]);
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
