<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCars()
    {
        $cars = Car::all();

        return response()->toJSON
    }
}
