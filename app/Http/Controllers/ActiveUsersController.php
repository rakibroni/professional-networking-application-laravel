<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\ActiveUserController;

class ActiveUsersController extends Controller
{
    public function index($type)
    {
        $userCounter = 0;
        $days = 0;
        switch ($type) {
            case 'month':
                $days = 30;
                break;
            case 'day':
                $days = 1;
                break;
            case 'week':
                $days = 7;
                break;
        }
        $userCounter = UserActivity::whereDate('created_at', '>=', Carbon::now()->subDays($days))->groupBy('user_id')->distinct()->get()->count();
        return $userCounter;


        echo json_encode($userCounter);
    }
}
