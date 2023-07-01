<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\WEB\admin\AdminViewController;
use App\Http\Controllers\WEB\admin\Auth\AdminAuthController;
use App\Http\Controllers\WEB\admin\car\CarController;
use App\Http\Controllers\WEB\transaction\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("")->middleware("session.admin")->group(function () {
    Route::GET('/', function () {

        return view('index');
    });

    Route::GET("/logout", [AdminAuthController::class, "logout"]);
});



// route for auth
Route::GET('/registerIndex', [Controller::class, 'registerIndex']);
Route::GET('/loginIndex', [Controller::class, 'loginIndex']);
Route::POST('/register', [AdminAuthController::class, 'register']);
Route::POST('/login', [AdminAuthController::class, 'login']);


Route::prefix("admin")->middleware("session.admin")->group(function () {

    Route::prefix("car")->group(function () {
        Route::GET('/index', [AdminViewController::class, 'carIndex']);
        Route::GET('/create-index', [AdminViewController::class, 'carCreateIndex']);
        Route::POST('/create', [CarController::class, 'create']);
        Route::POST('/update', [CarController::class, 'update']);
        Route::GET('/delete/{id}', [CarController::class, 'delete']);
        Route::GET('/update-index/{id}', [AdminViewController::class, 'carUpdateIndex']);
    });

    Route::prefix("transaction")->group(function () {
        Route::GET('/pending', [AdminViewController::class, 'transactionPendingIndex']);
        Route::GET('/process', [AdminViewController::class, 'transactionProcessIndex']);
        Route::GET('/success', [AdminViewController::class, 'transactionSuccessIndex']);
        Route::GET('/reject', [AdminViewController::class, 'transactionRejectIndex']);
        Route::GET('/delivery', [AdminViewController::class, 'transactionDeliveryIndex']);

        Route::GET('/accept/{id}', [TransactionController::class, 'acceptTransaction']);
        Route::GET('/reject/{id}', [TransactionController::class, 'rejectTransaction']);
        Route::GET('/delivery/{id}', [TransactionController::class, 'deliveryTransaction']);
    });
});
