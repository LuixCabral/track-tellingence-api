<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Connected_accounts;
use Exception;
use Laravel\Socialite\Socialite;

class ConnectionsRepositoryImp implements ConnectionsRepository
{

    public function redirectToProvider()
    {
        // TODO: Implement
        $driver = Socialite::driver('strava');
        return $driver
            ->scopes(['activity:read_all'])
            ->redirect();
    }

    public function syncAccounts(array $stravaData): Connected_accounts
    {
        $connection = Connected_accounts::updateOrCreate(
            ['user_id' => auth()->id()],
            [
                'strava_id' => $stravaData['id'], // Fixed object to array syntax
                'strava_access_token' => $stravaData['token'],
                'strava_refresh_token' => $stravaData['refresh_token'],
                'strava_token_expires_at' => Carbon::now()->addSeconds($stravaData['expires_in']),
            ]
        );

        return $connection;
    }
}
