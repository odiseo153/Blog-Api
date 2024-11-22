<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(LoginUserRequest $request)
    {
        // Attempt to authenticate the user
        
    
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
      

        // Retrieve the authenticated user
        $user = User::firstWhere('email', $request->email);

        // Return a successful response with user data
        return response()->json([
            'token' => $user->createToken('token', ['*'], now()->addHours(15))->plainTextToken,
            'name' => $user->name,
            'role' => $user->role,
        ]);
    }

    public function logout(Request $request)
    {
        // Delete the current access token
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['success' => 'Logged out']);
    }

    public function me(Request $request)
    {
        // Return the authenticated user
        return response()->json(['Authenticated' =>$request->user()]);
    }


    
}