<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LoginResource;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
      
        $credentials = $request->only('email', 'password');
        $rememberMe = $request->input('remember_me', false);

        
        $user = User::where('email', $credentials['email'])->first();

    
        if ($user && Hash::check($credentials['password'], $user->password)) {
    
            $token = $user->createToken('Personal Access Token')->plainTextToken;

           
            return response()->json([
                'message' => 'Login is successful',
                'token' => $token,
            ], 200);
        }

        // Return an unauthorized message if credentials are incorrect
        return response()->json([
            'message' => 'Unauthorized',
        ], 401);
    }
}
