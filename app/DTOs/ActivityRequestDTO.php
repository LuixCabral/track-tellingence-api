<?php

namespace App\DTOs;
use Carbon\Carbon;

readonly class ActivityRequestDTO
{
    public function __construct(
        public int $userId,
        public string $title,
        public ?string $description,
        public string $type,
        public ?float $distance,
        public ?int $movingTime,
        public ?int $elapsedTime,
        public ?float $totalElevationGain,
        public ?float $averageSpeed,
        public ?float $averageHeartrate,
        public ?float $maxHeartrate
    ){}

    public static function fromRequest(array $data,int $userId):self
    {
        return new self(
            userId: $userId,
            title: $data['name'] ?? 'Treino sem título',
            description: $data['description'] ?? null,
            type: $data['type'] ?? 'Run',
            distance: $data['distance'] ?? null,
            movingTime: $data['moving_time'] ?? null,
            elapsedTime: $data['elapsed_time'] ?? null,
            totalElevationGain: $data['total_elevation_gain'] ?? 0.0,
            averageSpeed: $data['average_speed'] ?? null,
            averageHeartrate: $data['average_heartrate'] ?? null,
            maxHeartrate: $data['max_maxrate'] ?? null,
        );
    }

    public function toArray(): array
    {
        $now = Carbon::now();

        return [
            'user_id'              => $this->userId,
            'activity_title'       => $this->title,
            // Garantindo string vazia caso venha null para não quebrar o banco
            'activity_description' => $this->description ?? '',
            'activity_type'        => $this->type,
            'distance'             => $this->distance,
            'moving_time'          => $this->movingTime,
            'elapsed_time'         => $this->elapsedTime,
            'total_elevation_gain' => $this->totalElevationGain,
            'average_speed'        => $this->averageSpeed,
            'average_heartrate'    => $this->averageHeartrate,
            'max_heartrate'        => $this->maxHeartrate,
            'created_at'           => $now,
            'updated_at'           => $now,
        ];
    }
}
