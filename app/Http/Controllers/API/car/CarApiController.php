<?php

namespace App\Http\Controllers\API\car;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarApiController extends Controller
{
    public function getAllCar()
    {
        try {
            $dataCar =  Car::get();
            return response()->json(["message" => "Success Get All Car", "data" => $dataCar], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Failed Get All Car", "error" => $th], 500);
        }
    }

    public function getCarByID($id)
    {
        try {
            $dataCar =  Car::where("id", $id)->first();
            return response()->json(["message" => "Success Get Car By ID", "data" => $dataCar], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Failed Get Car By ID", "error" => $th], 500);
        }
    }
}
