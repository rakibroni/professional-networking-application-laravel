<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActiveUserController extends Controller
{
    public static function index($user, $type)
    {
        $compareValue = '';
        if ($type == 'month') {
            $currentMonth = Carbon::now()->month;

            $lastLogin = UserLogin::where('user_id', $user->id)->get();
            if (sizeof($lastLogin) > 0) {
                $compareValue = $lastLogin->last()->created_at->month;
            }

            $lastActivity = UserActivity::where('user_id', $user->id)->get();
            if (sizeof($lastActivity) > 0) {
                $compareValue = $lastActivity->last()->created_at->month;
            }

            if ($compareValue == $currentMonth) {
                return "TRUE";
            } else {
                return "FALSE";
            }
        }


        if ($type == 'week') {
            $currentWeek = Carbon::now()->week;

            $lastLogin = UserLogin::where('user_id', $user->id)->get();
            if (sizeof($lastLogin) > 0) {
                $compareValue = $lastLogin->last()->created_at->week;
            }

            $lastActivity = UserActivity::where('user_id', $user->id)->get();
            if (sizeof($lastActivity) > 0) {
                $compareValue = $lastActivity->last()->created_at->week;
            }

            if ($compareValue == $currentWeek) {
                return "TRUE";
            } else {
                return "FALSE";
            }
        }

        if ($type == 'day') {
            $currentDay = Carbon::now()->day;

            $lastLogin = UserLogin::where('user_id', $user->id)->get();
            if (sizeof($lastLogin) > 0) {
                $compareValue = $lastLogin->last()->created_at->day;
            }

            $lastActivity = UserActivity::where('user_id', $user->id)->get();
            if (sizeof($lastActivity) > 0) {
                $compareValue = $lastActivity->last()->created_at->day;
            }

            if ($compareValue == $currentDay) {
                return "TRUE";
            } else {
                return "FALSE";
            }
        }
    }
}
