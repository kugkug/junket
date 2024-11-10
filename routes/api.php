<?php

use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserSettingsController;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('admin')->group(function() {
    Route::post('register', [UserController::class, 'registerAdminUser']);
    Route::post('login', [UserController::class, 'login']);
});

Route::middleware(['auth:sanctum', 'current_user'])->group(function() {

    Route::get('logout', [UserController::class, 'logout'])->name('api_logout_logout');
    
    Route::middleware(['is_admin_api'])->group(function() {
        Route::prefix('admin')->group(function() {            
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('api_admin_dashboard');
        });

        Route::prefix('company')->group(function() {
            Route::post('list', [CompanyController::class, 'list'])->name('api_company_list');
            Route::post('save', [CompanyController::class, 'save'])->name('api_company_save');
            Route::post('update', [CompanyController::class, 'update'])->name('api_company_update');
            Route::post('delete', [CompanyController::class, 'delete'])->name('api_company_delete');
        });

        Route::prefix('accounts')->group(function() {
            Route::post('list', [UserController::class, 'getNonAdminUser'])->name('api_accounts_list');
            Route::post('save', [UserController::class, 'registerNonAdminUser'])->name('api_accounts_save');
            Route::post('update/{id}', [UserController::class, 'updateNonAdminUser'])->name('api_accounts_update');
            Route::post('reset-password/{id}', [UserController::class, 'resetNonAdminUser'])->name('api_accounts_reset');
            Route::post('deactivate/{id}', [UserController::class, 'deleteNonAdminUser'])->name('api_accounts_delete');
        });
    });

    Route::prefix('settings')->group(function() {
        Route::post('update-mode', [UserSettingsController::class, 'update_mode'])->name('api_update_mode');
    });

    Route::prefix('players')->group(function() {
        Route::post('list', [PlayerController::class, 'list'])->name('api_players_list');
        Route::post('save', [PlayerController::class, 'save'])->name('api_players_save');
        Route::post('update/{id}', [PlayerController::class, 'update'])->name('api_players_update');
        Route::post('delete/{id}', [PlayerController::class, 'delete'])->name('api_players_delete');
    });

    Route::prefix('agents')->group(function() {
        Route::post('list', [AgentController::class, 'list'])->name('api_agents_list');
        Route::post('save', [AgentController::class, 'save'])->name('api_agents_save');
    });

    Route::prefix('transactions')->group(function() {
        Route::post('list/{id}', [TransactionController::class, 'list'])->name('api_transactions_list');
        Route::post('save/{id}', [TransactionController::class, 'save'])->name('api_transactionss_save');
        Route::post('update/{id}', [TransactionController::class, 'update'])->name('api_transactions_update');
        Route::post('delete/{id}', [TransactionController::class, 'delete'])->name('api_transactions_delete');
    });
});