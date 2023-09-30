<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionCommentController;
use App\Http\Controllers\QuestionCommentLikeController;
use App\Http\Controllers\QuestionCommentReplyController;
use App\Http\Controllers\QuestionsPageController;
use App\Http\Controllers\UnasnweredQuestionsMatchingExpertiseController;

Route::get('/get_questions/{question_type}/{skip}/{take}', [QuestionController::class, 'index']);
Route::get('/get_question_right_side_panel', [QuestionController::class, 'getRightSidePanel']);
Route::post('/question', [QuestionController::class, 'store'])->name('question');
Route::post('/question_comment_index', [QuestionCommentController::class, 'index']);
Route::post('/load_more_comment', [QuestionCommentController::class, 'loadMoreQuestionComment']);
Route::post('/add_question_comment', [QuestionCommentController::class, 'store']);
Route::post('/question_comment_reply_index', [QuestionCommentReplyController::class, 'index']);
Route::post('/add_question_comment_reply', [QuestionCommentReplyController::class, 'store']);
Route::post('/load_more_comment_reply', [QuestionCommentReplyController::class, 'loadMoreQuestionCommentReply']);
Route::post('/add_comment_like', [QuestionCommentLikeController::class, 'store']);

Route::get('/questions', [QuestionsPageController::class, 'index'])->name('questions');
Route::get('/get_unaswered_questions_matching_expertise', [UnasnweredQuestionsMatchingExpertiseController::class, 'index']);

Route::get('/questions-for-me', function () {
  return view('home');
})->name('home');

Route::get('/my-questions', function () {
  return view('home')->with('question_categories', array());
})->name('home');
