<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            "email"=> "required|email",
            "password"=>"required|string|min:6"
        ]);

        if(!Auth::attempt($request->only("email", "password"))) {
            return response()->json([
                "success" => false,
                "message" => "Email atau password salah",
            ], 401);
        }
        $user = Auth::user();
        $token = $user->createToken('flutter')->plainTextToken;
        return response()->json([
            "success" => true,
            "message" => "Login berhasil",
            "token" => $token,
            "user" => $user
        ]);
    }
    
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "success" => true,
            "message" => "Logout berhasil"
        ]);
    }
}
