<?php

namespace App\Repository;

use App\DTOs\ActivityRequestDTO;

interface ActivityRepository
{
    public function getUserActivities(int $userId , int $limit = 20);

    public function fetchFromStrava();
    public function saveUserNewActivity(ActivityRequestDTO $activity);
}
