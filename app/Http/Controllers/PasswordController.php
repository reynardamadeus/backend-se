<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\PasswordReset;
use App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function forgotPassword(LoginRequest $request){
        try{
            $validated = $request->safe()->only('email');
            $email = User::where('email', $validated['email'])->first();
            if(empty($email)){
                return response()->json([
                    'message' => 'email not found, please try again'
                ], 404);
            }

            $token = Str::random(40);
            $timeCreated = Carbon::now()->format('Y-m-d_H:i:s');
            PasswordReset::updateOrCreate(
                ['email' => $email],
                ['email' => $email,
                'token' => $token,
                'created_at' => $timeCreated]
            );

            return response()->json([
                'token' => $token,
                'message' => 'Change Password Request sent, please open your email'
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

    public function resetPassword(LoginRequest $request, $token){
        try{
        $validated = $request->safe()->only('password');
        $resetData = PasswordReset::where('token', $token)->first();
        if(empty($resetData) || Carbon::parse($resetData->created_at)->addHours(24)->isPast()){
            return response()->json([
                'message' => 'token is invalid or already expired'
            ], 404);
        }

        $user = User::where('email', $resetData->email)->first();
        if(empty($user)){
            return response()->json([
                'message' => 'email not found, please try again'
            ], 404);
        }
        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

}

