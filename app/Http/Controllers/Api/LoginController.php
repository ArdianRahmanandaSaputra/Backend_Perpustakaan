<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
 
        $user = User::where('email', $request->email)->first();
 
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'success' => false,
                'message' => ['Theese credentials do not match to our records.']
            ], 404);
        }
 
        $token = $user->createToken('ApiToken')->plainTextToken;
        $response = [
            'success' => true,
            'user' => $user,
            'token' => $token
        ];
 
        return response($response,201);
    }
 
    public function logout(){
        auth()->logout();
        return response()->json([
            'success' => true
        ], 200);
    }
}
