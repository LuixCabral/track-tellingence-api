<?php

namespace App\Http\Controllers;

use App\Ai\Agents\RunCoach;
use App\DTOs\CoachPromptDTO;
use Illuminate\Http\Request;

class RunCoachController extends Controller
{

    public function index(Request $request)
    {
        $coach = new RunCoach();
        $dto = CoachPromptDTO::fromRequest($request);
        $response = $coach->prompt($dto->prompt);
        return response()->json($response,200);
    }
}
