<?php

use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSettingsController;
use App\Models\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('admin')->group(function() {
    Route::post('register', [UserController::class, 'registerAdminUser']);
    Route::post('login', [UserController::class, 'loginAdminUser']);
});

Route::middleware(['auth:sanctum', 'current_user', 'is_admin_api'])->group(function() {

    Route::prefix('admin')->group(function() {
        Route::get('logout', [UserController::class, 'logoutAdminUser'])->name('api_admin_logout');
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('api_admin_dashboard');
    });

    Route::prefix('settings')->group(function() {
        Route::post('update-mode', [UserSettingsController::class, 'update_mode'])->name('api_update_mode');
    });

});