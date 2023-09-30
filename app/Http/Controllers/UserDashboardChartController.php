<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonPeriod;
use App\Models\UserActivity;
use App\Http\Controllers\ActiveUserController;


class UserDashboardChartController extends Controller
{
    public function index()
    {
        $currentDay = date("Y-m-d");

        $users = User::orderBy('created_at', 'desc')->get();

        $startDay = '2021-10-06';
        $responseArray = [
            "startDay" => $startDay,
            "currentDay" => $currentDay
        ];

        $period = CarbonPeriod::create($startDay, $currentDay);

        // Iterate over the period
        $dates = $period->toArray();


        $datesFormatted = array();
        $userCountAtTimeX = array();
        $monthlyActiveUsersAtTimeX = array();
        $weeklyActiveUsersAtTimeX = array();
        $dailyActiveUsersAtTimeX = array();

        $slicedArray = array();

        /*for ($o = 0; $o < sizeof($dates); $o++) {
            $rand = rand(0,10);
            if ($rand > 7) {
                array_push($slicedArray, $datesFormatted[$o]);
            }
        }*/

        $splitCounter = 0;

        // BEI DATES EIN APPEND MACHEN


        for ($i = 0; $i < sizeof($dates); $i++) {
            $rand = rand(0, 10);
            if ($i == 0 || $i == sizeof($dates) - 1 || $rand >= 0) {
                // PUSH TO DATES ARRAY
                array_push($datesFormatted, $dates[$splitCounter]->format('Y-m-d'));

                // GET USERS AT TIME X AND PUSH TO ARRAY
                $usersAtTimeX = User::where([
                    ['created_at', '<=', end($datesFormatted)],
                    ['status', '!=', 'not verified']
                ])->get();
      

                if ($i != sizeof($dates) - 1) {
                    $counter = $usersAtTimeX->count();
                } else {
                    $usersAtTimeX = User::where([

                        ['status', '!=', 'not verified']
                    ])->get();
                    $counter = $usersAtTimeX->count();
                }
                array_push($userCountAtTimeX, $counter);

                if ($i != sizeof($dates) - 1) {
                    $counter = getUserActivity(30, $datesFormatted, $i);
                } else {
                    $counter = UserActivity::whereDate('created_at', '>=', Carbon::now()->subDays(30))->groupBy('user_id')->distinct()->get()->count();
                }

                array_push($monthlyActiveUsersAtTimeX, $counter);




                if ($i != sizeof($dates) - 1) {
                    $counter = getUserActivity(7, $datesFormatted, $i);
                } else {
                    $counter = UserActivity::whereDate('created_at', '>=', Carbon::now()->subDays(7))->groupBy('user_id')->distinct()->get()->count();
                }




                array_push($weeklyActiveUsersAtTimeX, $counter);



                if ($i != sizeof($dates) - 1) {
                    $counter = getUserActivity(1, $datesFormatted, $i);
                } else {
                    $counter = UserActivity::whereDate('created_at', '>=', Carbon::now()->subDays(1))->groupBy('user_id')->distinct()->get()->count();
                }
                array_push($dailyActiveUsersAtTimeX, $counter);
            }
            $splitCounter++;
        }


        for ($i = 0; $i < sizeof($datesFormatted); $i++) {



            /*for ($k = 0; $k < $usersAtTimeX->count(); $k++) {
                if (ActiveUserController::index($usersAtTimeX[$k], 'day') == "TRUE") {
                    $counter++;
                }
            }*/
            array_push($dailyActiveUsersAtTimeX, $counter);
        }


        $responseArray = array();
        $responseArray[0] = $datesFormatted;
        $responseArray[1] = $userCountAtTimeX;
        $responseArray[2] = $monthlyActiveUsersAtTimeX;
        $responseArray[3] = $weeklyActiveUsersAtTimeX;
        $responseArray[4] = $dailyActiveUsersAtTimeX;



        $responseArray[5] = $usersAtTimeX->count();

        echo json_encode($responseArray);
    }
}


function getUserActivity($days, $array, $index)
{
    return UserActivity::whereDate('created_at', '>=', (new Carbon($array[$index]))->subDays($days))->whereDate('created_at', '<', (new Carbon($array[$index])))->groupBy('user_id')->distinct()->get()->count();
}
