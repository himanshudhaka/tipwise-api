<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('name', $request['name'])->first();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Invalid Details'
            ], 401);
        }
        $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        // $user = $this->getUser($user->id);
        return response([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function loginByUID(Request $request)
    {
        $user = User::where('uniqueId', $request['uid'])->first();
        $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        // $user = $this->getUser($user->id);
        return response([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function register(Request $request)
    {
        $user = User::create(
            ['phone' => $request['phone']],
            ['password' => bcrypt($request['password'])]
        );
        $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }
    public function registerByUID(Request $request)
    {
        $user = User::create(
            ['uniqueId' => $request['uid']],
        );
        $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        // $user = $this->getUser($user->id);
        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }
    public function init(Request $request)
    {
        return $request->user();
    }
    public function logout(Request $request)
    {
        return $request->user()->tokens()->delete();
    }
}
