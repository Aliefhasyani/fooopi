<?php

namespace App\Http\Controllers;

use Laravel\Sanctum\HasApiTokens; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;


class ApiController extends Controller
{
    public function login(Request $request){
        
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json(
                [
                    "message" => "login successful",
                    "token" => $token
                ]);
        }elseif(!Auth::attempt()){
            return response()->json(
                [
                    "message" => "an error occured!"
                ]);
        };
    }

      


    
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
            
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(
            [
                "message" => "user registered",
                "user data" => $data,
                "YOUR TOKEN" => $token

        ]);
    }
}
