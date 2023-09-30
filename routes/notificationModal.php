<?php

use App\Http\Controllers\NotificationModalController;
use Illuminate\Support\Facades\Route;

Route::get('/get_notification_modal_status', [NotificationModalController::class, 'index']);
Route::post('/update_notification_modal_status', [NotificationModalController::class, 'update']);
 