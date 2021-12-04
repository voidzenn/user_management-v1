<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCars()
    {
        $cars = Car::all();

        return CarResource::collection($cars);
    }

    public function getCarsData()
    {
        $cars = Car::all();

        return CarResource::collection($cars);
    }
}
