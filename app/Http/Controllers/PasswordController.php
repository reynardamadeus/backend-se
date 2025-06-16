<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function getForgotPasswordRequest(){
        return view('resetpasswordweb');
    }
    public function forgotPassword(Request $request){
        $email = User::where('email', $request->email)->first();
        if(empty($email)){
            return view('resetpasswordweb')->with(['email' => 'Email not found']);
        }

        $token = Str::random(40);
        $date = now();
        PasswordReset::updateOrCreate(
            ['email' => $email->email],
            [
                'email' => $email->email,
                'token' => $token,
                'created_at' => $date
            ]
        );
        $resetUrl = url('reset-password?token=' . $token);
        Mail::to($request->email)->send(new ForgotPasswordMail($resetUrl));
        return view('resetpasswordweb', ['success' => 'Email Sent Successfully']);
    }

    public function resetPassword(Request $request){
        $resetData = PasswordReset::where('token', $request->token)->first();
        if(empty($resetData) || Carbon::parse($resetData->created_at)->addHours(24)->isPast()){
            return view('resetpasswordweb', ['email' => 'The token has already expired, please retry']);
        }
        $email = User::where('email', $resetData->email)->first()->email;
        $resetData->delete();
        return view('resetpasswordform', compact('email'));
    }

    public function submitResetPassword(Request $request){
        $request->validate([
            "password" => 'required|min:8|confirmed'
        ]);

        $user = User::where("email", $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('homepage');
    }

}

