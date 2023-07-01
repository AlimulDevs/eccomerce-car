<?php

namespace App\Http\Controllers\API\customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerAuthApiController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => "customer",
            "photo_profile_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png"
        ]);

        Customer::create([
            "user_id" => $user->id,
        ]);

        return response()->json(["message" => "Success Registered Account", "data" => $user]);
    }

    public function login(Request $request)
    {
        $getUser = User::where("email", $request->email)->first();
        if ($getUser == null) {
            return response()->json(["message" => "Email or Password Wrong"]);
        }

        if (Hash::check($request->password, $getUser->password)) {
            $user = User::where('email', $request['email'])->firstOrFail();

            $token_customer = $user->createToken('auth_token')->plainTextToken;

            User::where("id", $user->id)->update([
                "remember_token" => $token_customer
            ]);



            return response()->json(["message" => "Success Login Account", "token" => $token_customer]);
        } else {
            return response()->json(["message" => "Email or Password Wrong"]);
        }
    }

    public function logout()
    {
        try {

            auth()->user()->tokens()->delete();
            return [
                'message' => 'You have successfully logged out and the token was successfully deleted',

            ];
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed Register',
                'error' => $th
            ], 500);
        }
    }
}
