<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCountController;
use App\Http\Controllers\ActiveUsersController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserDashboardChartController;



Route::get('/dashboard', function () {
  return view('dashboard');
});
Route::post('/create_activity', [UserActivityController::class, 'create']);
Route::get('/get_user_dashboard_rows/{rowCounter}', [UserDashboardController::class, 'index']);
Route::get('/get_active_users/{type}', [ActiveUsersController::class, 'index']);
Route::get('/get_total_user_count', [UserCountController::class, 'index']);
Route::get('/get_user_dashboard_chart', [UserDashboardChartController::class, 'index']);