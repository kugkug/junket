<?php

use App\Http\Controllers\AccountExecuteController;
use App\Http\Controllers\AdminExecuteController;
use App\Http\Controllers\AdminModulesController;
use App\Http\Controllers\AgentExecuteController;
use App\Http\Controllers\CashierModulesController;
use App\Http\Controllers\CompanyExecuteController;
use App\Http\Controllers\PlayerExecuteController;
use App\Http\Controllers\TransactionExecuteController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminModulesController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum', 'current_user', 'is_admin_web'])->group(function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [AdminModulesController::class, 'admin_dashboard'])->name('admin_dashboard');
        Route::get('/dashboard', [AdminModulesController::class, 'admin_dashboard'])->name('admin_dashboard');
        Route::get('/companies', [AdminModulesController::class, 'companies'])->name('companies');
        Route::get('/accounts', [AdminModulesController::class, 'accounts'])->name('accounts');
        Route::get('/reports', [AdminModulesController::class, 'reports'])->name('reports');
    });

    Route::group(['prefix' => 'company'], function() {
        Route::get('/registration', [AdminModulesController::class, 'company_registration'])->name('company_registration');
        Route::get('/edit', [AdminModulesController::class, 'company_edit'])->name('company_edit');
    });

    Route::group(['prefix' => 'account', 'current_user'], function() {
        Route::get('/add', [AdminModulesController::class, 'account_create'])->name('account_create');
        Route::get('/edit/{id}', [AdminModulesController::class, 'account_edit'])->name('account_edit');
    });
});

Route::group(['prefix' => 'execute'], function() {
    Route::post('login', [AdminExecuteController::class, 'login'])->name('web_execute_login');
});
Route::middleware(['auth:sanctum', 'current_user'])->group(function() {
    
    Route::group(['prefix' => 'cashier'], function() {
        Route::get('/', [CashierModulesController::class, 'cashier_dashboard'])->name('cashier_dashboard');
        Route::get('/dashboard', [CashierModulesController::class, 'cashier_dashboard'])->name('cashier_dashboard');
        Route::get('/enrollments', [CashierModulesController::class, 'enrollments'])->name('enrollments');
        Route::get('/agents', [CashierModulesController::class, 'agents'])->name('enrollments');
    });


    Route::group(['prefix' => 'player'], function() {
        Route::get('/transactions/{id}', [CashierModulesController::class, 'player_transactions'])->name('player_transactions');
    });

    Route::group(['prefix' => 'agent'], function() {
        Route::get('/add', [CashierModulesController::class, 'agent_add'])->name('agent_add');
        
    });

    Route::group(['prefix' => 'enrollment'], function() {
        Route::get('/add', [CashierModulesController::class, 'enrollment_create'])->name('enrollment_create');
        Route::get('/edit', [CashierModulesController::class, 'enrollment_edit'])->name('enrollment_edit');
    });

    Route::group(['prefix' => 'execute'], function() {
        Route::get('logout', [AdminExecuteController::class, 'logout'])->name('web_execute_logout');

        Route::post('settings', [UserSettingsController::class, 'update'])->name('web_update_settings');
        
        Route::group(['prefix' => 'company'], function() {
            Route::post('/list', [CompanyExecuteController::class, 'list'])->name('company_list');
            Route::post('/save', [CompanyExecuteController::class, 'save'])->name('company_save');
            Route::post('/update', [CompanyExecuteController::class, 'update'])->name('company_update');        
        });

        Route::group(['prefix' => 'accounts'], function() {
            Route::post('/list', [AccountExecuteController::class, 'list'])->name('accounts_list');
            Route::post('/save', [AccountExecuteController::class, 'save'])->name('accounts_save');
            Route::post('/update', [AccountExecuteController::class, 'update'])->name('accounts_update');
            Route::post('/reset-password', [AccountExecuteController::class, 'reset'])->name('accounts_reset');
            Route::post('/deactivate', [AccountExecuteController::class, 'deactivate'])->name('accounts_delete');
        });

        Route::group(['prefix' => 'players'], function() {
            Route::post('/list', [PlayerExecuteController::class, 'list'])->name('players_list');
            Route::post('/save', [PlayerExecuteController::class, 'save'])->name('players_save');
            Route::post('/update', [PlayerExecuteController::class, 'update'])->name('players_update');
            Route::post('/reset-password', [PlayerExecuteController::class, 'reset'])->name('players_reset');
            Route::post('/deactivate', [PlayerExecuteController::class, 'deactivate'])->name('players_delete');
        });

        Route::group(['prefix' => 'agents'], function() {
            Route::post('/list', [AgentExecuteController::class, 'list'])->name('agents_list');
            Route::post('/save', [AgentExecuteController::class, 'save'])->name('agents_save');
        });

        Route::group(['prefix' => 'transactions'], function() {
            Route::post('/list/{player_id}', [TransactionExecuteController::class, 'list'])->name('agents_list');
            Route::post('/save/{player_id}', [TransactionExecuteController::class, 'save'])->name('agents_save');
        });
    });
});