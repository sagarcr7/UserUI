<?php

namespace App\Http\Controllers;

use App\User;
use Illiuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWAuth\Facades\JWTAuth;
use Tymon\JWAuth\Facades\JWTFactory;
use Tymon\JWAuth\Facades\JWTException;
use Tymon\JWAuth\Facades\JWTSubject;
use Tymon\JWAuth\JWTManager as JWT;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ])
        
        if ($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
    }
}