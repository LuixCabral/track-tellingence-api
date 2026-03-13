<?php

namespace App\Services;

use App\DTOs\LoginRequestDTO;
use App\DTOs\LoginResponseDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Exceptions\InvalidArgumentException;

class AuthService
{
    public function __construct()
    {
    }

    public function validateUserCredentials(LoginRequestDTO $dto):LoginResponseDTO
    {
        $user = User::query()->where('email', $dto->email)->first();

        if (!$user) {
            throw new InvalidArgumentException('User not found');
        }

        if (!Hash::check($dto->password,$user->password)){
            throw new InvalidArgumentException('Wrong password');
        }

        $token = $user->createToken('acess_token')->plainTextToken;

        return new LoginResponseDTO(
            $user,
            $token
        );
    }
}
