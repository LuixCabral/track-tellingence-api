<?php

namespace App\Repository;

use App\Models\Connected_accounts;

interface ConnectionsRepository
{
    public function redirectToProvider();
    public function syncAccounts(array $stravaData):Connected_accounts;
}
