<?php

namespace App\Http\Controllers\WEB\admin\Auth;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(Request $request)
    {

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => "admin",
            "photo_profile_url" => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png"
        ]);

        Admin::create([
            "user_id" => $user->id,
        ]);

        return redirect("/loginIndex")->with("success_register", "Success Registered Account");
    }

    public function login(Request $request)
    {
        $getUser = User::where("email", $request->email)->first();
        if ($getUser == null) {
            return redirect("/loginIndex")->with("failed_login", "Email or Password Wrong");
        }

        if (Hash::check($request->password, $getUser->password)) {
            $token = $getUser->createToken('auth_token')->plainTextToken;
            User::where("email", $request->email)->update([
                "remember_token" => $token,
            ]);
            $request->session()->put("token", $token);
            $request->session()->put("role", $getUser->role);
            $request->session()->put("name", $getUser->name);
            $request->session()->put("email", $getUser->email);

            return redirect("/")->with("success_login", "Success Login Account");
        } else {
            return redirect("/loginIndex")->with("failed_login", "Email or Password Wrong");
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect("/loginIndex")->with("success_login", "Success Logout");
    }
}
