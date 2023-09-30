<?php

use App\Http\Controllers\CommentAnswerController;
use App\Http\Controllers\CommentLoaderController;
use Illuminate\Support\Facades\Route;



Route::post('/create_comment_answer', [CommentAnswerController::class, 'create']);
Route::get('/get_next_comments/{postId}/{commentId}/{type}', [CommentLoaderController::class, 'index']);


