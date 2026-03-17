<?php

namespace App\Http\Controllers;

use App\Services\StravaService;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;

class ConnectionsController extends Controller
{
    private $connectionService;

    public function __construct(StravaService $connectionService){
        $this->connectionService = $connectionService;
    }

// No seu Service ou Controller
    public function redirect()
    {
        $userId = auth()->id();

        $url = Socialite::driver('strava')
            ->stateless()
            ->scopes(['activity:read_all'])
            ->with(['state' => encrypt($userId)])
            ->redirect()
            ->getTargetUrl();

        return response()->json(['redirect_url' => $url], 200);
    }

    public function syncAccounts(Request $request){
        $this->connectionService->syncAccounts();
        return response()->json(['message'=>'Accounts synced'],200);
    }
}
