<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Post;
use App\Models\Question;
use App\Models\UserRole;
use App\Models\Categories;
use App\Models\UserActivity;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\UserItemsController;
use App\Http\Controllers\ActiveUserController;
use App\Http\Controllers\UserSkillsController;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserTrainingController;
use App\Http\Controllers\JobExperienceController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\UserFollowersController;
use App\Http\Controllers\EducationStationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'username',
        'verification_hash',
        'status',
        'eula_acceptance',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function fullName()
    {
        return $this->firstname . " " . $this->name;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function postCount()
    {
        return PostController::getUsersPostsCount($this->username);
    }

    public function receivesLikes()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

    public function test()
    {
        return "asd";
    }

    public function connectionCount()
    {
        return UserFollowersController::getConnectionsCount($this);
    }

    public function connectionsInCommonString()
    {
        return json_decode(UserFollowersController::getConnectionsInCommonString($this));
    }

    public function connectionsInCommon()
    {
        return json_decode(UserFollowersController::getConnectionsInCommon($this));
    }

    // JOB EXPERIENCES
    public function getJobExperiences()
    {
        echo json_decode(JobExperienceController::getJobExperiences($this->username));
    }

    public function getJobExperiencesPreview()
    {
        echo json_decode(JobExperienceController::getJobExperiencesPreview($this->username));
    }

    public function currentEmployer($parameters)
    {
        echo json_decode(JobExperienceController::getCurrentEmployer($this->username, $parameters));
    }

    // EDUCATION STATIONS
    public function getEducationStationsPreview()
    {
        echo json_decode(EducationStationController::getEducationStationsPreview($this->username));
    }

    public function getEducationStations()
    {
        echo json_decode(EducationStationController::getEducationStations($this->username));
    }

    // USER TRAINING

    public function getUserTraining()
    {
        echo json_decode(UserTrainingController::getUserTraining($this->username));
    }

    public function getUserTrainingPreview()
    {
        echo json_decode(UserTrainingController::getUserTrainingPreview($this->username));
    }

    // USER SKILLS

    public function getUserSkills()
    {
        echo json_decode(UserSkillsController::getUserSkills($this->username));
    }

    public function getUserSkillsPreview()
    {
        echo json_decode(UserSkillsController::getUserSkillsPreview($this->username));
    }

    public function getUserLanguagesPreview()
    {
        echo json_decode(UserItemsController::getUserItemsPreview($this->username, 'language'));
    }

    public function getUserLanguages()
    {
        echo json_decode(UserItemsController::getUserItems($this->username, 'language'));
    }

    // NOTIFICATIONS

    public function getNewNotifications()
    {
        echo json_decode(NotificationsController::getNewNotifications($this));
    }

    public function getOldNotifications()
    {
        echo NotificationsController::getOldNotifications($this);
    }

    public function roles()
    {
        return $this->hasMany(UserRole::class);
    }

    public function isAdmin()
    {
        $userRoles = $this->hasMany(UserRole::class)->get();
        $isAdmin = false;
        if (sizeof($userRoles) > 0) {
            for ($i = 0; $i < sizeof($userRoles); $i++) {
                if ($userRoles[$i]->role_id == 1) {
                    $isAdmin = true;
                }
            }
        }
        return $isAdmin;
    }

    public function loginsCount()
    {
        return $this->hasMany(UserLogin::class)->get()->count();
    }

    public function lastLogin()
    {
        if (sizeof($this->hasMany(UserLogin::class)->get()) > 0) {
            return $this->hasMany(UserLogin::class)->get()->last()->created_at->locale('de_DE')->shortRelativeDiffForHumans();
        } else {
            return "no logins yet.";
        }
    }

    public function wasActiveInCurrentMonth()
    {
        return ActiveUserController::index($this, 'month');
    }

    public function wasActiveInCurrentDay()
    {
        return ActiveUserController::index($this, 'day');
    }
    public function wasActiveInCurrentWeek()
    {
        return ActiveUserController::index($this, 'week');
    }



    public function activities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function timeOflastActivity()
    {
        if (sizeof(UserActivityController::index($this)) > 0) {
            return UserActivityController::index($this)->last()->created_at->locale('de_DE')->shortRelativeDiffForHumans();
        } else {
            return "-";
        }
    }

    public function latestActivity()
    {
        if (sizeof(UserActivityController::index($this)) > 0) {
            return UserActivityController::index($this)->last()->name;
        } else {
            return "no activity yet.";
        }
    }

    public function isRecruiter()
    {
        $isRecruiter = false;
        $userRoles = $this->hasMany(UserRole::class)->get();
        foreach ($userRoles as $userRole) {
            if ($userRole->role_id == 3 || $userRole->role_id ==  4) {
                $isRecruiter = true;
            }
        }
        return $isRecruiter;
    }


    public function isInfluencer()
    {
        $isInfluencer = false;
        $userRoles = $this->hasMany(UserRole::class)->get();
        foreach ($userRoles as $userRole) {
            if ($userRole->role_id == 5) {
                $isInfluencer = true;
            }
        }
        return $isInfluencer;
    }

    public function isExpert()
    {
        $isExpert = false;
        $userRoles = $this->hasMany(UserRole::class)->get();
        foreach ($userRoles as $userRole) {
            if ($userRole->role_id == 2) {
                $isExpert = true;
            }
        }
        return $isExpert;
    }

    public function isExpertForQuestion($categories)
    {
        $isExpertForQuestion = false;
        $questionCategories = $this->expertCategories();
        if ($questionCategories) {
            for ($i = 0; $i < sizeof($categories); $i++) {
                for ($j = 0; $j < sizeof($questionCategories); $j++) {
                    if ($categories[$i]->category_id == $questionCategories[$j]->category_id) {
                        $isExpertForQuestion = true;
                    }
                }
            }
        }
        /// return sizeof($questionCategories);
        return $isExpertForQuestion;
    }


    public function expertCategories()
    {
        if ($this->isExpert()) {
            $categories = UserRole::where([
                ['user_id', '=', $this->id],
                ['category_id', '!=', null]
            ])->get();
            return $categories;
        } else {
            return null;
        }
    }

    public function askedQuestions()
    {
        $questions = $this->hasMany(Question::class)->get();
        return $questions;
    }

    public function questionsMatchingExpertise()
    {
        $questions = Question::get();
        $questionsMatchingExpertise = new Collection(new Question);
        foreach ($questions as $question) {
            if (/*$question->user_id != auth()->user()->id*/1 < 2) {
                $questionCategories = QuestionCategories::where([
                    ['question_id', $question->id]
                ])->get();

                $containsOtherCategory = false;
                foreach ($questionCategories as $category) {
                    if ($category->category_id == 10) {
                        $containsOtherCategory = true;
                    }
                }

                if ($question->post()->isApproved()) {
                    if ($this->isExpertForQuestion($questionCategories) || $containsOtherCategory) {
                        $questionsMatchingExpertise->push($question);
                    }
                }
            }
        }
        return $questionsMatchingExpertise;
    }


    public function unansweredQuestionsMatchingExpertise()
    {
        $questionsMatchingExpertise = $this->questionsMatchingExpertise();
        $unansweredQuestionsMatchingExpertise = new Collection(new Question);
        foreach ($questionsMatchingExpertise as $question) {
            if (!$question->answeredByUser() && $question->post()->isApproved()) {
                $unansweredQuestionsMatchingExpertise->push($question);
            }
        }
        return $unansweredQuestionsMatchingExpertise;
    }

    public static function getCompanyUserId()
    {
        $user_id = auth()->user()->id;

        $companyIdAndUserId = DB::table('companies')
            ->select('companies.id', 'companies.user_id')
            ->leftJoin('user_roles', 'user_roles.company_id', '=', 'companies.id')
            ->where('user_roles.user_id', '=', $user_id)
            ->get();
        return $companyIdAndUserId;
    }
}
