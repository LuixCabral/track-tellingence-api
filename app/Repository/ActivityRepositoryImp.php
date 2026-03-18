<?php

namespace App\Repository;

use App\DTOs\ActivityRequestDTO;
use App\Models\Activity;
use App\Models\Connected_accounts;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class ActivityRepositoryImp implements ActivityRepository
{
    private Activity $activityModel;

    private Connected_accounts $connection;

    public function __construct(Activity $activityModel , Connected_accounts $connection){
        $this->activityModel = $activityModel;
        $this->connection = $connection;
    }

    public function getUserActivities(int $userId, int $limit = 20): Collection
    {
        // TODO: Implement getUserActivities() method
        return $this->activityModel
            ->query()
            ->where('user_id',$userId)
            ->latest()
            ->limit($limit)
            ->get();
    }

    public function saveUserNewActivity(ActivityRequestDTO $activity):Activity
    {
        // TODO: Implement saveUserNewActivity() method.
        return Activity::query()->create($activity->toArray());
    }

    public function fetchFromStrava()
    {
        $user = auth()->id();

        if (Activity::where('user_id', $user)->exists()) {
            return response()->json(['message' => 'Atividades já foram sincronizadas.'], 200);
        }

        $accessToken = $this->connection
            ->query()
            ->where('user_id', $user)
            ->value('strava_access_token');

        if (!$accessToken) {
            return response()->json(['message' => 'Strava token not found'], 404);
        }

        $fetchStravaActivities = Http::withToken($accessToken)->get('https://www.strava.com/api/v3/athlete/activities', [
            'per_page' => 20,
            'page' => 1
        ]);

        if ($fetchStravaActivities->failed()) {
            return response()->json(['message' => 'Failed to fetch activities'], 400);
        }

        $activities = $fetchStravaActivities->json();

        $activitiesToInsert = [];

        foreach ($activities as $activity) {
            $dto = ActivityRequestDTO::fromRequest($activity, $user);
            $activitiesToInsert[] = $dto->toArray();
        }

        if (!empty($activitiesToInsert)) {
            Activity::insert($activitiesToInsert);
        }

        return response()->json(['message' => 'Successfully Fetched Activities'], 200);
    }
}
