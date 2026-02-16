<?php

namespace App\Http\Controllers;

use App\Actions\Auth\ResolveSocialUserAction;
use App\Http\Requests\Auth\AppleAuthRequest;
use App\Http\Requests\Auth\GoogleAuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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
            ],
        ]);
    }

    public function google(GoogleAuthRequest $request): JsonResponse
    {
        return $this->socialAuth('google', $request->validated());
    }

    public function apple(AppleAuthRequest $request): JsonResponse
    {
        return $this->socialAuth('apple', $request->validated());
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
            ],
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    /**
     * @param array<string, mixed> $validated
     */
    private function socialAuth(string $provider, array $validated): JsonResponse
    {
        try {
            $user = ResolveSocialUserAction::run($provider, (string) $validated['token'], $validated);
        } catch (ValidationException $exception) {
            throw $exception;
        } catch (Throwable $exception) {
            return response()->json([
                'message' => 'Invalid social token.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $token = Auth::login($user);

        return response()->json([
            'user' => new UserResource($user),
            'authorization' => [
                'token' => $token,
                'type' => 'Bearer',
            ],
        ]);
    }
}
