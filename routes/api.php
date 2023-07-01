<?php

use App\Http\Controllers\API\car\CarApiController;
use App\Http\Controllers\API\customer\Auth\CustomerAuthApiController;
use App\Http\Controllers\API\customer\CustomerApiController;
use App\Http\Controllers\API\transaction\TransactionApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::GET("invalidToken", function () {
    return response()->json(["message" => "invalid token"]);
})->name("invalidToken");

Route::POST("/register", [CustomerAuthApiController::class, "register"]);
Route::POST("/login", [CustomerAuthApiController::class, "login"]);
Route::group(['middleware' => ['auth:sanctum']], function () {


    Route::GET("car", [CarApiController::class, "getAllCar"]);
    Route::GET("car/{id}", [CarApiController::class, "getCarByID"]);






    Route::get('/profile', [CustomerApiController::class, "getProfile"]);
    Route::GET("/logout", [CustomerAuthApiController::class, "logout"]);

    Route::POST("/transaction", [TransactionApiController::class, "transaction"]);
    Route::POST("/transaction/send-proof", [TransactionApiController::class, "sendProof"]);
    Route::GET("/transaction-detail", [TransactionApiController::class, "getAllTransaction"]);
});
