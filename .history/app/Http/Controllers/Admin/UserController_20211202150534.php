<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function get_user()
    {
        $users = User::with('role')->get();
        return UserResource::collection($users)->all();
    }

    public function get_single_user(User $user)
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

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json('deleted');
    }


}
