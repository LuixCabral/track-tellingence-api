<?php

namespace App\Services;

use App\Repository\ConnectionsRepositoryImp;
use Laravel\Socialite\Socialite;

class StravaService
{

    public $stravaRepository;

    public function __construct(ConnectionsRepositoryImp $stravaRepository)
    {
        $this->stravaRepository = $stravaRepository;
    }

    public function redirectToProvider()
    {
        return $this->stravaRepository->redirectToProvider();
    }

    public function syncAccounts(){
        $stravaUser = Socialite::driver('strava')->stateless()->user();

        $stravaData = [
            'id' => $stravaUser->getId(),
            'token' => $stravaUser->token,
            'refresh_token' => $stravaUser->refreshToken,
            'expires_in' => $stravaUser->expiresIn,
        ];
        return $this->stravaRepository->syncAccounts($stravaData);
    }


}
