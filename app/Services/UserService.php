<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    protected $passwordService;

    public function __construct(PasswordService $passwordService)
    {
        $this->passwordService = $passwordService;
    }

    public function createUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $this->passwordService->hashPassword($data['password']),
        ]);
    }
}
