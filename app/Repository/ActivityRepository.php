<?php

namespace App\Repository;

use App\DTOs\ActivityDTO;

interface ActivityRepository
{
    public function getUserActivities(int $userId , int $limit = 20);
    public function saveUserNewActivity(ActivityDTO $activity);
}
