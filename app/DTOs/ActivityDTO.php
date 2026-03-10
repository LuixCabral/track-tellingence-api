<?php

namespace App\DTOs;
use Illuminate\Http\Request;
use DateTime;
readonly class ActivityDTO
{
    public function __construct(
        public int $userId,
        public string $title,
        public ?string $description,
        public string $type,
        public ?float $distance = null,
        public ?float $averagePace = null,
        public ?int $averageBpm = null,
        public ?DateTime $activityDate = null,
    ){}

    public static function fromRequest(Request $request):self
    {
        return new self(
            userId: $request->input('user_id'),
            title: $request->input('activity_title'),
            description: $request->input('activity_description'),
            type: $request->input('activity_type'),
            distance: $request->input('distance',0),
            averagePace: $request->input('average_pace'),
            averageBpm: $request->input('average_bpm'),
            activityDate: $request->has('activity_date')
                ? new DateTime($request->input('activity_date'))
                : new DateTime(),
        );
    }

    public function toArray(): array
    {
        return [
            'user_id'              => $this->userId,
            'activity_title'       => $this->title,
            'activity_description' => $this->description,
            'activity_type'        => $this->type,
            'distance'             => $this->distance,
            'average_pace'         => $this->averagePace,
            'average_bpm'          => $this->averageBpm,
            'activity_date'        => $this->activityDate?->format('Y-m-d H:i:s'),
        ];
    }
}
