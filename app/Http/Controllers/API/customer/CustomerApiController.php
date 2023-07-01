<?php

namespace App\Http\Controllers\API\customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    public function getProfile()
    {
        try {
            $dataUser = User::with("customer")->where("id", auth()->user()->id)->first();
            return response()->json(["message" => "Success Get Profile", "data" => $dataUser], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Failed Get Profile", "error" => $th], 500);
        }
    }
}
