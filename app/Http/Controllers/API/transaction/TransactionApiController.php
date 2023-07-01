<?php

namespace App\Http\Controllers\API\transaction;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionApiController extends Controller
{

    public function getAllTransaction()
    {
        try {
            $data = Transaction::with("user", "car")->where("user_id", auth()->user()->id)->get();
            return response()->json(["message" => "Success Get Transcation", "data" => $data], 200);
        } catch (\Throwable $error) {
            return response()->json(["message" => "Failde Grt Transaction", "error" => $error], 500);
        }
    }

    public function transaction(Request $request)
    {
        try {
            $getCar = Car::where("id", $request->car_id)->first();

            if ($getCar->stock - $request->total_qty < 0) {
                return response()->json(["message" => "Transaction Failed, Less Stock"], 500);
            }

            $totalPrice = $getCar->price * $request->total_qty;

            Transaction::create([
                "user_id" => auth()->user()->id,
                "car_id" => $request->car_id,
                "total_qty" => $request->total_qty,
                "total_price" => $totalPrice,
                "code_transaction" => Str::random(8),
                "status" => "pending"
            ]);

            return response()->json(["message" => "Transaction Successs"], 200);
        } catch (\Throwable $error) {
            return response()->json(["message" => "Transaction Failed", "error" => $error], 500);
        }
    }

    public function sendProof(Request $request)
    {
        $image = $request->file('proof_url');
        $proofUrl = time() . $image->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $destinationStorage = 'proof-image';

        // upload file
        $image->move($destinationStorage, $proofUrl);

        $proofUrl = url("/" . $destinationStorage . "/" . $proofUrl);

        Transaction::where("id", $request->transaction_id)->update([
            "proof_url" => $proofUrl,
        ]);

        return response()->json(["message" => "Send Proof Successs"], 200);
    }
}
