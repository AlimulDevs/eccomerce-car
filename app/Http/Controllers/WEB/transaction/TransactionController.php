<?php

namespace App\Http\Controllers\WEB\transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function acceptTransaction($id)
    {
        Transaction::where("id", $id)->update([
            "status" => "process",
        ]);

        return redirect("/admin/transaction/pending")->with("success_accept", "Success Accept Transaction");
    }
    public function rejectTransaction($id)
    {
        Transaction::where("id", $id)->update([
            "status" => "reject",
        ]);

        return redirect("/admin/transaction/pending")->with("success_reject", "Success Reject Transaction");
    }
    public function deliveryTransaction($id)
    {
        Transaction::where("id", $id)->update([
            "status" => "delivery",
        ]);

        return redirect("/admin/transaction/process")->with("success_delivery", "Success Delivery Transaction");
    }
}
