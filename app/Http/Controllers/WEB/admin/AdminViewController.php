<?php

namespace App\Http\Controllers\WEB\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{

    public function carIndex()
    {
        $dataCar = Car::get();

        return view("car.car", compact("dataCar"));
    }
    public function carCreateIndex()
    {
        return view("car.car-create");
    }

    public function carUpdateIndex($id)
    {
        $dataCar = Car::where("id", $id)->get();

        return view("car.car-update", compact("dataCar"));
    }
    public function transactionPendingIndex()
    {
        $dataTransaction = Transaction::where("status", "pending")->with("user", "car")->orderBy("id", "asc")->get();

        return view("transaction.pending", compact("dataTransaction"));
    }
    public function transactionProcessIndex()
    {
        $dataTransaction = Transaction::where("status", "process")->with("user", "car")->orderBy("id", "asc")->get();

        return view("transaction.process", compact("dataTransaction"));
    }
    public function transactionRejectIndex()
    {
        $dataTransaction = Transaction::where("status", "reject")->with("user", "car")->orderBy("id", "asc")->get();

        return view("transaction.reject", compact("dataTransaction"));
    }
    public function transactionDeliveryIndex()
    {
        $dataTransaction = Transaction::where("status", "delivery")->with("user", "car")->orderBy("id", "asc")->get();

        return view("transaction.delivery", compact("dataTransaction"));
    }
    public function transactionSuccessIndex()
    {
        $dataTransaction = Transaction::where("status", "success")->with("user", "car")->orderBy("id", "asc")->get();

        return view("transaction.success", compact("dataTransaction"));
    }
}
