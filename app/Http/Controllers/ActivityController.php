<?php

namespace App\Http\Controllers;
use App\DTOs\ActivityDTO;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }
    public function index(int $user_id)
    {
        return $this->activityService->getActivities($user_id);
    }

    public function store(Request $request){
        $dto = ActivityDTO::fromRequest($request);

        $activity = $this->activityService->saveUserNewActivity($dto);
        return response()->json($activity,201);
    }
}
