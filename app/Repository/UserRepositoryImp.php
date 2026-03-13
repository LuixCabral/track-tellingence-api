<?php

namespace App\Repository;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepositoryImp implements UserRepository
{

    public function createUser(UserDTO $data): User
    {
        // TODO: Implement createUser() method.
        $newUser = User::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        $newUser->role()->create();
        return $newUser;
    }

    public function updateUser(User $user, array $data)
    {
        // TODO: Implement updateUser() method.

        return $user->update($data);
    }
}
