<?php

namespace App\Repository;
use App\DTOs\UserDTO;
use App\Models\User;


interface UserRepository
{
    public function createUser(UserDTO $data): User;
    public function updateUser(User $user, array $data);
}
