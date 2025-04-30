<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        try{
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 2;
        User::create($validated);
        return response()->json([
            'message' => 'User has successfully registered their account'
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

    public function login(LoginRequest $request){
        try{
        $validated = $request->validated();
        $account  = User::where('email', $validated['email'])->first();
        if(empty($account) || !Hash::check($validated['password'], $account->password)){
            return response()->json([
                'message' => 'email or password is wrong, please try again'
            ], 400);
        }
        $token = $account->createToken($account['email'])->plainTextToken;
        return response()->json([
            'message' => 'Login Successful',
            'token' => $token
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }

    }

    public function logout(Request $request){
        try{
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Account has logged out!'
        ], 200);

        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

}
