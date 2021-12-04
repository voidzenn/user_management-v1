<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function get_role()
    {
        $roles = Role::all();

        return response()->json($roles);
    }
}
