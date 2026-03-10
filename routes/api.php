<?php
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('/activity')->group(function () {
        Route::get('/findByUserId/{id}', [ActivityController::class, 'index']);
        Route::post('/storeActivity', [ActivityController::class, 'store']);
    });
});
