<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        $token = Auth::login($user);

        return response()->json([
            'user' => new UserResource($user),
            'authorization' => [
                'token' => $token,
                'type' => 'Bearer',
            ]
        ]);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = Auth::attempt($request->validated());

        return response()->json([
            'user' => new UserResource(Auth::user()),
            'authorization' => [
                'token' => $token,
                'type' => 'Bearer',
            ]
        ]);
    }

    public function profile(): UserResource
    {
        return new UserResource(Auth::user());
    }

    public function refresh(): JsonResponse
    {
        return response()->json([
            'authorization' => [
                'user' => new UserResource(Auth::user()),
                'token' => Auth::refresh(),
                'type' => 'Bearer',
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
