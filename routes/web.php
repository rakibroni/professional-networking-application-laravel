<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EulaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserCardController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\JobsLoginController;
use App\Http\Controllers\UserCountController;
use App\Http\Controllers\UserItemsController;
use App\Http\Controllers\ActiveUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JobsLogoutController;
use App\Http\Controllers\UserSkillsController;
use App\Http\Controllers\ActiveUsersController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserTrainingController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JobExperienceController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserFollowersController;
use App\Http\Controllers\JobsPageRouterController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\JobsPageInvitesController;
use App\Http\Controllers\EducationStationController;
use App\Http\Controllers\RegistrationCodeController;
use App\Http\Controllers\UserPageJavascriptController;
use App\Http\Controllers\JobsPageInvitesCounterController;
use App\Http\Controllers\JobsPageRouterControllerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/app', function () {
    return view('app');
})->name('app');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/testFri', function () {
    return view('testFri');
})->name('testFri');

Route::get('/testpage', function () {
    return view('testpage');
})->name('testpage');

Route::get('/testpage1', function () {
    return view('testpage1');
})->name('testpage1');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/nutzervereinbarung', function () {
    return view('nutzervereinbarung');
})->name('nutzervereinbarung');

Route::get('/datenschutz', function () {
    return view('datenschutz');
})->name('datenschutz');


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/start', function () {
    return view('start');
})->name('start');

Route::get('/multiSelect', function () {
    return view('multiSelect');
});






/*Route:: get('/feed', [PostController::class, 'index'])
->name('feed');*/

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// hier lieber mit username anstat user id
//{user: username}
//Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']); // name inherited




Route::post('/get_regisration_code', [RegistrationCodeController::class, 'index']);
Route::post('/create_regisration_code', [RegistrationCodeController::class, 'create']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']); // name inherited
Route::post('/createUser', [RegisterController::class, 'createUser']); // name inherited
Route::post('/finish_registration', [RegisterController::class, 'finishRegistration']); // name inherited
Route::post('/finish_setup', [RegisterController::class, 'finishSetup']); // name inherited

// POSTS
Route::get('/feed', [PostController::class, 'index'])->name('feed');
Route::get('/get_feed', [PostController::class, 'getFeed']);
Route::post('/feed', [PostController::class, 'store']);
Route::get('/get_users_who_reacted_to_post/{post_id}', [PostController::class, 'getUsersWhoReactedToPost']);
//Route::delete('/feed/{post}', [PostController::class, 'destroy'])->name('feed.destroy');
Route::get('/feed/posts/{uuid}', [PostController::class, 'show'])->name('feed.show');
Route::get('/feed/posts/{uuid}/{id}', [PostController::class, 'show'])->name('feed.show');
Route::get('get_post/{uuid}', [PostController::class, 'getPost']);
Route::get('get_posts', [PostController::class, 'getPosts']);




Route::post('/upload_post_img', [PostController::class, 'upload_image'])->name('upload_post_img');
Route::post('/delete_post_image', [PostController::class, 'deleteImage'])->name('delete_post_image');
Route::post('/discard_post', [PostController::class, 'discardPost'])->name('discard_post');
Route::post('/load_next_post', [PostController::class, 'loadNextPost']);

// COMMENTS
Route::post('/add_comment', [CommentController::class, 'addComment']);

// LIKES
Route::post('/like_post', [PostLikeController::class, 'likePost']);
Route::post('/remove_post_like', [PostLikeController::class, 'removePostLike']);

Route::get('/search1/{sliderValue}', [SearchController::class, 'searchTalent']);
Route::post('/searchPost', [SearchController::class, 'searchTalentPost']);


Route::post('/search', [SearchController::class, 'store'])->name('search');
Route::post('/search_city', [SearchController::class, 'getCity']);

Route::post('/profilepic_temp', [ProfilePictureController::class, 'uploadTempImage'])->name('profilepic_temp');
Route::post('/profilepic_final', [ProfilePictureController::class, 'store_final'])->name('profilepic_final');
Route::post('/delete_profile_picture', [ProfilePictureController::class, 'delete'])->name('delete_profile_picture');
Route::post('/discard_profile_picture_changes', [ProfilePictureController::class, 'discard'])->name('discard_profile_picture_changes');




// erst wieder ajax über form

Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('/get_notifications', [NotificationsController::class, 'getNotifications'])->name('notifications');


Route::middleware(['auth'])->get('/network', [NetworkController::class, 'index'])->name('network');
Route::get('/network/invites', [NetworkController::class, 'invites'])->name('network.invites');
Route::get('/network/connections', [NetworkController::class, 'connections'])->name('network.connections');


Route::get('/users/{username}', [UserController::class, 'index'])->name('users');
Route::get('/get_user/{username}', [UserProfileController::class, 'getUser']);
Route::get('/get_user_posts/{username}', [UserProfileController::class, 'getUserPosts']);
Route::get('/get_user_card/{username}', [UserCardController::class, 'index']);
Route::get('/get_user_page_info/{username}', [UserProfileController::class, 'getUserPageInfo']);
Route::get('/get_user_tabs/{username}', [UserProfileController::class, 'getUserTabs']);
Route::get('/get_user_activity_sub_tabs/{username}', [UserProfileController::class, 'getUserActivitySubTabs']);
Route::get('/get_user_activity_sub_tabs_mobile/{username}', [UserProfileController::class, 'getUserActivitySubTabsMobile']);
Route::get('/users/{username}/connections', [UserProfileController::class, 'connections']);
Route::get('/users/{username}/activity/posts', [UserProfileController::class, 'connections']);
Route::get('/get_user_connections', [UserProfileController::class, 'getConnections']);
Route::get('/get_user_connections_in_common/{username}', [UserFollowersController::class, 'getConnectionsInCommonViews']);
Route::get('/get_user_connections/{username}', [UserProfileController::class, 'getUserConnections']);

Route::get('/get_user_page_javascript', [UserPageJavascriptController::class, 'index']);

// CONNECTION
Route::get('/get_network', [NetworkController::class, 'getNetwork'])->name('network');
Route::post('/request_connection', [UserFollowersController::class, 'requestConnection'])->name('request_connection');
Route::post('/accept_request', [UserFollowersController::class, 'acceptRequest'])->name('accept_request');
Route::get('/get_requests', [UserFollowersController::class, 'getAllRequests'])->name('get_all_requests');
Route::get('/get_suggestions', [UserFollowersController::class, 'getSuggestions'])->name('get_suggestions');
Route::get('/get_connections', [UserFollowersController::class, 'getConnections'])->name('get_connections');
Route::post('/remove_connection', [UserFollowersController::class, 'removeConnection'])->name('remove_connection');
Route::get('/get_all_network_counts', [UserFollowersController::class, 'getAllNetworksCounts']);
Route::get('/get_suggestions1/{page}', [UserFollowersController::class, 'getSuggestions1']);
Route::get('/get_next_suggestion/{count}/{page}', [UserFollowersController::class, 'getNextSuggestion']);



// EMAIL
Route::post('/email_newsletter', [EmailController::class, 'sendNewsLetter']);


// GET USER DATA
Route::get('/get_user_summary', [UserController::class, 'getUserSummary']);
Route::post('get_profile_pic_stats', [ProfilePictureController::class, 'getProfilePictureStats']);

// USER SUMMARY
Route::post('/update_user_info', [UserController::class, 'updateUserInfo']);
Route::post('/update_user_summary', [UserController::class, 'updateUserSummary']);

// USER JOB EXPERIENCE
Route::post('/add_job_experience', [JobExperienceController::class, 'addJobExperience']);
Route::get('/get_job_experiences/{username}', [JobExperienceController::class, 'getJobExperiences']);
Route::get('/get_add_experience_form/{count}', [JobExperienceController::class, 'getAddExperienceForm']);
Route::get('/get_job_experiences_preview/{username}', [JobExperienceController::class, 'getJobExperiencesPreview']);
Route::post('delete_job_experience', [JobExperienceController::class, 'deleteJobExperience']);
Route::post('update_job_experience', [JobExperienceController::class, 'updateJobExperience']);

// USER EDUCATION STATION
Route::post('/add_education_station', [EducationStationController::class, 'addEducationStation']);
Route::get('/get_education_stations_preview/{username}', [EducationStationController::class, 'getEducationStationsPreview']);
Route::get('/get_education_stations/{username}', [EducationStationController::class, 'getEducationStations']);
Route::get('/get_add_education_form/{count}', [EducationStationController::class, 'getAddEducationForm']);
Route::post('/delete_education_station', [EducationStationController::class, 'deleteEducationStation']);
Route::post('/update_education_station', [EducationStationController::class, 'updateEducationStation']);

// USER TRAINING
Route::post('/create_user_training', [UserTrainingController::class, 'createUserTraining']);
Route::post('/delete_user_training', [UserTrainingController::class, 'deleteUserTraining']);


// USER SKILLS
Route::post('/create_user_skill', [UserSkillsController::class, 'createUserSkill']);
Route::post('/delete_user_skill', [UserSkillsController::class, 'deleteUserSkill']);


// USER ITEMS
Route::post('/create_user_item', [UserItemsController::class, 'createUserItem']);
Route::post('/delete_user_item', [UserItemsController::class, 'deleteUserItem']);

//Notifications
Route::post('/mark_notifications_as_seen', [NotificationsController::class, 'markNotificationsAsSeen']);
Route::get('/update_new_notifications', [NotificationsController::class, 'updateNewNotifications']);
Route::get('/update_old_notifications', [NotificationsController::class, 'updateOldNotifications']);
Route::get('/get_new_notifications_count', [NotificationsController::class, 'getNewNotificationsCount']);



//EULA
Route::post('/update_eula', [EulaController::class, 'update']);


//REPORT
Route::post('/create_report', [ReportController::class, 'create']);

// PASSWORD RESET
Route::post('/reset_password', [PasswordResetController::class, 'create']);
Route::post('/change_password', [PasswordResetController::class, 'update']);


