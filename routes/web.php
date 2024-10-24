<?php

use App\Http\Controllers\AdminExecuteController;
use App\Http\Controllers\AdminModulesController;
use App\Http\Controllers\CashierModulesController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminModulesController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum', 'current_user'])->group(function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [AdminModulesController::class, 'admin_dashboard'])->name('admin_dashboard');
        Route::get('/dashboard', [AdminModulesController::class, 'admin_dashboard'])->name('admin_dashboard');
        Route::get('/companies', [AdminModulesController::class, 'companies'])->name('companies');
        Route::get('/accounts', [AdminModulesController::class, 'accounts'])->name('accounts');
        Route::get('/reports', [AdminModulesController::class, 'reports'])->name('reports');
    });
});

Route::group(['prefix' => 'company'], function() {
    Route::get('/registration', [AdminModulesController::class, 'company_registration'])->name('company_registration');
    Route::get('/edit', [AdminModulesController::class, 'company_edit'])->name('company_edit');
});

Route::group(['prefix' => 'account'], function() {
    Route::get('/add', [AdminModulesController::class, 'account_create'])->name('account_create');
    Route::get('/edit', [AdminModulesController::class, 'account_edit'])->name('account_edit');
});



Route::group(['prefix' => 'cashier'], function() {
    Route::get('/', [CashierModulesController::class, 'cashier_dashboard'])->name('cashier_dashboard');
    Route::get('/dashboard', [CashierModulesController::class, 'cashier_dashboard'])->name('cashier_dashboard');
    Route::get('/enrollments', [CashierModulesController::class, 'enrollments'])->name('enrollments');
});


Route::group(['prefix' => 'enrollment'], function() {
    Route::get('/add', [CashierModulesController::class, 'enrollment_create'])->name('enrollment_create');
    Route::get('/edit', [CashierModulesController::class, 'enrollment_edit'])->name('enrollment_edit');
});


Route::group(['prefix' => 'execute'], function() {
    Route::post('login', [AdminExecuteController::class, 'login'])->name('web_execute_login');
    Route::get('logout', [AdminExecuteController::class, 'logout'])->name('web_execute_logout');

    Route::post('settings', [UserSettingsController::class, 'update'])->name('web_update_settings');
});