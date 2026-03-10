<?php

namespace App\Providers;

use App\Repository\ActivityRepository;
use App\Repository\ActivityRepositoryImp;
use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ActivityRepository::class, ActivityRepositoryImp::class);

    }

    public function boot(): void
    {
    }
}
