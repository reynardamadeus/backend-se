<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('errors', 'Registration failed. Please try again.')
            ->with('show_signup_popup', true);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Account created successfully!');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->with('errors', 'Please provide credentials.')
            ->with('show_login_popup', true);
        }

        $account  = User::where('email', $request->email)->first();
        if(empty($account) || !Hash::check($request->password, $account->password)){
            return redirect()->back()
            ->with('errors', 'Login failed, please check your credentials')
            ->with('show_login_popup', true);
        }
        Auth::login($account);
        $request->session()->regenerate();
        return redirect()->route('homepage');

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
