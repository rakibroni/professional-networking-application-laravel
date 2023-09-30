<?php

use App\Http\Controllers\ConnectionSuggestionController;
use Illuminate\Support\Facades\Route;

Route::get('/get_user_connections/{skip}/{take}/{suggestionsCounter}', [ConnectionSuggestionController::class, 'index']);