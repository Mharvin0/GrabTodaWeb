<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class MobileController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201);
    }

     public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

             /** @var \App\Models\User $user **/
            $user = Auth::user();
            $token = $user->createToken('GrabToda')->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at->toDateTimeString(),
                ],
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|unique:users|max:255',
            'password' => 'sometimes|string|min:8',
        ]);

        $user = Auth::user();
        if ($user instanceof User) {
            if ($request->filled('name')) {
                $user->name = $request->name;
                }
            if ($request->filled('email')) {
                $user->email = $request->email;
                }
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                }
        $user->save();

        return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'user' => $user,
            ]);
        }else {
            return response()->json([
            'success' => false,
            'message' => 'User not found or unauthorized',
        ], 404);
    }}

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
