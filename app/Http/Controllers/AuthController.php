<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerCashier(Request $request) {
            // dd($request->all());
            $request-> validate([
                'name' => 'required',
                'user_name' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required'
            ]);

            $record = [
                'name' => $request->get('name'),
                'user_name' => $request->get('user_name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'user_type' => 'Cashier',
            ];            

            $cashier = User::create($record);
            return response($cashier,200);          
            
    }

    public function logInUser(Request $request) {
            // dd($request->all());
            $request-> validate([
                'user_name' => 'required',
                'password' => 'required'
            ]);

            $user = User::where('user_name', $request->get('user_name'))-> first();

            if(!$user || !Hash::check($request->get('password'), $user->password)) {
                return response()->json([
                    "message" => "Input credentials are wrong!!!"
                ]);
            }
            $userToken = $user->createToken('access-token')->plainTextToken;
            return response()->json([
                "token" => $userToken
            ]);           
    }

    public function logOutUser() {
        auth()->user()->tokens()->delete();
        return response()->json([
            "message" => "User log out successfully!!!"
        ]);
    }


}
