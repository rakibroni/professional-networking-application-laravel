<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Helper\ValidationHelper;
use App\Models\EducationStation;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\View;

class EducationStationController extends Controller
{
    public static function getAddEducationForm($count)
    {
        $response = View::make("components.add_education")->with(["count" => $count])->render();
        echo json_encode($response);
    }



    public function addEducationStation(Request $request)
    {
        $response_array = array();
        $error = false;

        $degree = $request->degree;
        $degree_type = $request->degree_type;
        $school = $request->school;
        $start_month = $request->start_month;
        $start_year = $request->start_year;
        $end_month = $request->end_month;
        $end_year = $request->end_year;
        $is_current_school = $request->is_current_school;
        $is_custom_degree_type = $request->is_custom_degree_type;

        $validator = ValidationHelper::validateStrings(
            $request,
            array($degree, $degree_type, $school, $start_month, $start_year),
            array('degree', 'degree_type', 'school', 'start_month', 'start_year'),
            array('required', 'required', 'required', 'required', 'required'),
            $error
        );
        $response_array = $validator[0];
        $error = $validator[1];

        $endDateValidator = ValidationHelper::validateEndDates(
            $request,
            array($end_month, $end_year),
            array('end_month', 'end_year'),
            array('required', 'required'),
            $error,
            $is_current_school
        );
        $response_array = array_merge($response_array, $endDateValidator[0]);
        $error = $endDateValidator[1];


        if ($error == false) {
            $response_array = array();

            $start_month = Helper::intToMonth($start_month);
            $end_month = Helper::intToMonth($end_month);
            $start_date = $start_year . "-" . $start_month . "-01";


            if ($is_current_school == "true") {
                $mytime = Carbon::now();
                $end_date = $mytime->toDateTimeString();
            }

            if ($is_current_school == "false") {
                $mytime = Carbon::now();
                $end_date = $end_year . "-" . $end_month . "-01";
            }

            EducationStation::create([
                'user_id' => auth()->user()->id,
                'degree' => $degree,
                'degree_type' => $degree_type,
                'school' => $school,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'is_current_school' => $is_current_school,
                'is_custom_degree_type' => $is_custom_degree_type,
            ]);
        }

        echo json_encode($response_array);
    }

    public static function getEducationStationsPreview($username)
    {
        $response = "";
        if ($username == auth()->user()->username) {
            $user = User::where('username', $username)->get()->first();
            $educationStations = EducationStation::where('user_id', $user->id)->orderBy('end_date', 'DESC')->get();;
            $educationStationsCount = $educationStations->count();
            if ($educationStationsCount != 0) {
                for ($i = 0; $i < $educationStationsCount; $i++) {
                    $educationStation = $educationStations[$i];
                    $response .= View::make("components.education_station_preview")->with("educationStation", $educationStation)->render();
                }
            }
        }
        return json_encode($response);
    }

    public static function deleteEducationStation(Request $request)
    {
        $id = $request->id;
        EducationStation::where('id', $id)->delete();
        echo json_encode("delete");
    }

    public static function getEducationStations($username)
    {
        $response = "";

            $user = User::where('username', $username)->get()->first();
            $educationStations = EducationStation::where('user_id', $user->id)->orderBy('end_date', 'DESC')->get();;
            $educationStationsCount = $educationStations->count();
            if ($educationStationsCount != 0) {
                for ($i = 0; $i < $educationStationsCount; $i++) {
                    $educationStation = $educationStations[$i];
                    $response .= View::make("components.education_station")->with([
                        "educationStation" => $educationStation,
                        "viewerOwnsProfile" => Helper::viewerOwnsProfile($user)
                    ])->render();
                }
            }
        
        return json_encode($response);
    }

    public function updateEducationStation(Request $request)
    {
        $response_array = array();
        $error = false;

        $id = $request->id;
        $degree = $request->degree;
        $degree_type = $request->degree_type;
        $school = $request->school;
        $start_month = $request->start_month;
        $start_year = $request->start_year;
        $end_month = $request->end_month;
        $end_year = $request->end_year;
        $is_current_school = $request->is_current_school;
        $is_custom_degree_type = $request->is_custom_degree_type;

        $validator = ValidationHelper::validateStrings(
            $request,
            array($degree, $degree_type, $school, $start_month, $start_year),
            array('degree', 'degree_type', 'school', 'start_month', 'start_year'),
            array('required', 'required', 'required', 'required', 'required'),
            $error
        );
        $response_array = $validator[0];
        $error = $validator[1];

        $endDateValidator = ValidationHelper::validateEndDates(
            $request,
            array($end_month, $end_year),
            array('end_month', 'end_year'),
            array('required', 'required'),
            $error,
            $is_current_school
        );
        $response_array = array_merge($response_array, $endDateValidator[0]);
        $error = $endDateValidator[1];


        if ($error == false) {
            $response_array = array();

            $start_month = Helper::intToMonth($start_month);
            $end_month = Helper::intToMonth($end_month);
            $start_date = $start_year . "-" . $start_month . "-01";


            if ($is_current_school == "true") {
                $mytime = Carbon::now();
                $end_date = $mytime->toDateTimeString();
            }

            if ($is_current_school == "false") {
                $mytime = Carbon::now();
                $end_date = $end_year . "-" . $end_month . "-01";
            }

            EducationStation::where('id', $id)->update([
                'degree' => $degree,
                'degree_type' => $degree_type,
                'school' => $school,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'is_current_school' => $is_current_school,
                'is_custom_degree_type' => $is_custom_degree_type,
            ]);
        }
        echo json_encode($response_array);
    }
}
