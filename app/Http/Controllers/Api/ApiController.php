<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class ApiController extends BaseController
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

       try
       {
           $user = User::create([
               'name' => $data['name'],
               'password' => Hash::make($data['password']),
               'email' => $data['email'],
               // user is the default role
               'role_id' => '1',
           ]);

           $token = $user->createToken('auth_token')->plainTextToken;

           return $this->sendResponse($user, ['bearer_token' => $token]);

       }catch(QueryException $e)
       {
           return $this->sendError('error',$e);
       }

    }
}
