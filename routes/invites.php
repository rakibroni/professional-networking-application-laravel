<?php

use App\Http\Controllers\UserInviteController;
use Illuminate\Support\Facades\Route;



Route::post('/send_invite_emails', [UserInviteController::class, 'create']);
 