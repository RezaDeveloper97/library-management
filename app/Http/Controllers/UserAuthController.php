<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function register(RegisterRequest $request, UserService $userService): JsonResponse
    {
        $userService->create(
            name: $request->input('name'),
            email: $request->input('email'),
            password: $request->input('password'),
        );

        return $this->successJson([
            'message' => 'User Created',
        ]);
    }

    public function login(LoginRequest $request, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->findByEmail(
            email: $request->input('email')
        );

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return $this->errorJson([
                'message' => 'Invalid Credentials'
            ], 401);
        }

        return response()->json([
            'access_token' => $user->createToken($user->name . '-AuthToken')->plainTextToken,
        ]);
    }

    public function logout(): JsonResponse
    {
        $this->user->tokens()->delete();

        return $this->successJson([
            "message" => "logged out"
        ]);
    }
}
