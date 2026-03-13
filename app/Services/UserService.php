<?php

namespace App\Services;
use App\DTOs\UserDTO;
use App\Repository\UserRepositoryImp;
use PHPUnit\Event\InvalidArgumentException;

class UserService
{
    private $userRepository;
    public function __construct(UserRepositoryImp $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function createUser(UserDTO $data){

        $newUser = $this->userRepository->createUser($data);

        return $newUser;
    }

    public function updateUser(array $data){
        if (empty($data)) {
            throw new InvalidArgumentException("Cannot create user with empty data");
        }
        return ;
    }
}
