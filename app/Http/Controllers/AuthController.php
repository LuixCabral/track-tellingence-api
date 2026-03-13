<?php

namespace App\Http\Controllers;

use App\DTOs\LoginRequestDTO;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }
    public function login(Request $request){
        $dto = LoginRequestDTO::fromRequest($request);

        $responseDTO = $this->authService->validateUserCredentials($dto);
        return response()->json([
            'user' => $responseDTO->user,
            'token' => $responseDTO->token,
        ],200);
    }
}
