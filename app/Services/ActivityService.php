<?php

namespace App\Services;
use App\DTOs\ActivityRequestDTO;
use App\Repository\ActivityRepository;
use Mockery\Exception\InvalidArgumentException;

class ActivityService
{

    private ActivityRepository $activityRepository;
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function getActivities(int $user_id)
    {
        $activities = $this->activityRepository->getUserActivities($user_id);
        if ($activities->isEmpty()) {
            throw new \InvalidArgumentException('No activity found for this user.');
        }
        return $activities;
    }

    public function saveUserNewActivity(ActivityRequestDTO $activity){
        return $this->activityRepository->saveUserNewActivity($activity);
    }

}
