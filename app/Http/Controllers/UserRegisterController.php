<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserRegisterResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserRegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        $user = $this->userService->createUser($validated);

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => new UserRegisterResource($user),
        ], 201);
    }
}
