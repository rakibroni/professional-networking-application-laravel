<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobChatPreviewController;
use App\Http\Controllers\InvitedTalentController;
use App\Http\Controllers\JobChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsLoginController;
use App\Http\Controllers\JobsLogoutController;
use App\Http\Controllers\JobsPageRouterController;
use App\Http\Controllers\JobSearchFilterController;
use App\Http\Controllers\JobsPageInvitesCounterController;
use App\Http\Controllers\OpenPositionController;
use App\Http\Controllers\SavedTalentController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\TalentSearchController; 

Route::get('talentSearch', function () {
  return view('home');
});
Route::get('/jobs/company/{username}', function () {
  return view('home');
});
Route::get('/talent/{uuid}', function () {
  return view('home');
});
Route::get('/invites/invited', function () {
  return view('home');
});
Route::get('/invites/accepted', function () {
  return view('home');
});
Route::get('/invites/rejected', function () {
  return view('home');
});
Route::get('/openpositions', function () {
  return view('home');
});
Route::get('/messages', function () {
  return view('home');
});
Route::get('/messages', function () {
  return view('home');
});
Route::get('/savedTalents', function () {
  return view('home');
});


Route::get('/get_jobs_page_filter', [JobSearchFilterController::class, 'index']);
Route::get('/get_invites/{status}', [InvitedTalentController::class, 'index']);
Route::get('/get_invites_counters', [JobsPageInvitesCounterController::class, 'index']);

Route::get('get_talent/{uuid}', [TalentController::class, 'index']);

Route::get('/get_invites_counters', [JobsPageInvitesCounterController::class, 'index']);
Route::post('/get_talents', [TalentSearchController::class, 'index']);
Route::post('/talent_search_by_id', [OpenPositionController::class, 'index']);
Route::post('/save_talent_search', [TalentSearchController::class, 'store']);
Route::post('/edit_talent_search', [TalentSearchController::class, 'edit']);
Route::post('/save_talent', [SavedTalentController::class, 'create']);

Route::get('/get_saved_talents', [SavedTalentController::class, 'index']);

Route::post('/invite_talent', [InvitedTalentController::class, 'create']);

Route::get('/get_chat_previews', [JobChatPreviewController::class, 'index']);
Route::get('/get_job_chat/{uuid}', [JobChatController::class, 'index']);

Route::get('/get_company_details', [CompanyController::class, 'index']);
Route::post('/edit_company_basic_info', [CompanyController::class, 'edit']);
Route::post('/edit_company_desc', [CompanyController::class, 'editCompanyDesc']);
Route::post('/delete_company_desc', [CompanyController::class, 'deleteCompanyDesc']);
Route::post('/edit_company_emp', [CompanyController::class, 'editCompanyEmp']);
Route::post('/delete_company_emp', [CompanyController::class, 'deleteCompanyEmp']);
Route::post('/edit_company_pro', [CompanyController::class, 'editCompanyPro']);
Route::post('/delete_company_pro', [CompanyController::class, 'deleteCompanyPro']);