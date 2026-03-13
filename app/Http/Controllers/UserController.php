<?php

namespace App\Http\Controllers;

use App\DTOs\UserDTO;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function index()
    {

    }

    public function create(Request $request){
        $dto = UserDTO::fromRequest($request);

        $user = $this->userService->createUser($dto);
        return response()->json($user);
    }
}
