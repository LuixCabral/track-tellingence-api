<?php

namespace App\Repository;

use App\DTOs\ActivityDTO;
use App\Models\Activity;
use Illuminate\Support\Collection;

class ActivityRepositoryImp implements ActivityRepository
{
    private Activity $model;

    public function __construct(Activity $model){
        $this->model = $model;
    }

    public function getUserActivities(int $userId, int $limit = 20): Collection
    {
        // TODO: Implement getUserActivities() method
        return $this->model
            ->query()
            ->where('user_id',$userId)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function saveUserNewActivity(ActivityDTO $activity):Activity
    {
        // TODO: Implement saveUserNewActivity() method.
        return Activity::query()->create($activity->toArray());
    }
}
