<?php
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConnectionsController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (){
    Route::prefix('/user')->group(function (){
        Route::post('/register', [UserController::class, 'create']);
        Route::post('/login',[AuthController::class, 'login']);
    });
    Route::get('redirect', [ConnectionsController::class,'redirect' ]);
    Route::get('syncAccounts', [ConnectionsController::class,'syncAccounts' ]);

    Route::middleware('auth:sanctum')->group(function (){
        Route::prefix('/activity')->group(function () {
            Route::get('/findByUserId/{id}', [ActivityController::class, 'index']);
            Route::post('/storeActivity', [ActivityController::class, 'store']);
        });
    });
});
