<?php

namespace App\DTOs;

use App\Models\User;

readonly class LoginResponseDTO
{
    public function __construct(
        public User $user,
        public string $token,
    )
    {

    }
}
