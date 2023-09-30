<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Models\JobExperience;
use App\Helper\ValidationHelper;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\View;

class JobExperienceController extends Controller
{
    public function addJobExperience(Request $request)
    {
        $response_array = array();
        $error = false;


        $id = $request->id;
        $location_city = $request->location_city;
        $location_state = $request->location_state;
        $position = $request->position;
        $company = $request->company;
        $company_type = $request->company_type;
        $employment_type = $request->employment_type;
        $start_month = $request->start_month;
        $start_year = $request->start_year;
        $end_month = $request->end_month;
        $end_year = $request->end_year;
        $description = $request->description;
        $is_current_position = $request->is_current_position;
        $is_custom_company_type = $request->is_custom_company_type;
        $is_custom_employment_type = $request->is_custom_employment_type;


        // VALIDATE POSITION
        $positionValidator = ValidationHelper::validateString($request, $position, 'position', 'required');
        $response_array[0] = $positionValidator[0];
        if ($error == false) {
            $error = $positionValidator[1];
        }

        // VALIDATE EMPLOYMENT TYPE
        $employmentTypeValidator = ValidationHelper::validateString($request, $employment_type, 'employment_type', 'required');
        $response_array[1] = $employmentTypeValidator[0];
        if ($error == false) {
            $error = $employmentTypeValidator[1];
        }

        // VALIDATE COMPANY 
        $companyValidator = ValidationHelper::validateString($request, $company, 'company', 'required');
        $response_array[2] = $companyValidator[0];
        if ($error == false) {
            $error = $companyValidator[1];
        }

        // VALIDATE COMPANY TYPE
        $companyTypeValidator = ValidationHelper::validateString($request, $company_type, 'company_type', 'required');
        $response_array[3] = $companyTypeValidator[0];
        if ($error == false) {
            $error = $companyTypeValidator[1];
        }

        // VALIDATE LOCATION
        $locationValidator = ValidationHelper::validateLocation($location_city, $location_state);
        $response_array[4] = $locationValidator[0];
        if ($error == false) {
            $error = $locationValidator[1];
        }

        // VALIDATE START MONTH
        $startMonthValidator = ValidationHelper::validateString($request, $start_month, 'start_month', 'required');
        $response_array[5] = $startMonthValidator[0];
        if ($error == false) {
            $error = $startMonthValidator[1];
        }

        // VALIDATE START YEAR
        $startYearValidator = ValidationHelper::validateString($request, $start_year, 'start_year', 'required');
        $response_array[6] = $startYearValidator[0];
        if ($error == false) {
            $error = $startYearValidator[1];
        }


        // VALIDATE DESCRIPTION
        $descriptionValidator = ValidationHelper::validateString($request, $description, 'description', '');
        $response_array[7] = $descriptionValidator[0];

        if ($error == false) {
            $error = $descriptionValidator[1];
        }

        if ($description == null) {
            $description = '';
        }

        // VALIDATE END MONTH
        $endMonthValidator = ValidationHelper::validateString($request, $end_month, 'end_month', 'required');
        if ($is_current_position == "false") {
            $response_array[8] = $endMonthValidator[0];
            if ($error == false) {
                $error = $endMonthValidator[1];
            }
        }
        if ($is_current_position == "true") {
            $response_array[8] = '.';
        }

        // VALIDATE END YEAR
        $endYearValidator = ValidationHelper::validateString($request, $end_year, 'end_year', 'required');
        if ($is_current_position == "false") {
            $response_array[9] = $endYearValidator[0];
            if ($error == false) {
                $error = $endYearValidator[1];
            }
        }
        if ($is_current_position == "true") {
            $response_array[9] = '.';
        }

        // IF ERROR == FALSE; DANN ZU TRUE
        // ERROR FALSCH
        // VALIDATE IS CURRENT POSITIONs


        if ($error == false) {
            $response_array = array();


            // TRANSFORM DATE
            $start_month = Helper::intToMonth($start_month);
            $end_month = Helper::intToMonth($end_month);
            $start_date = $start_year . "-" . $start_month . "-01";


            if ($is_current_position == "true") {
                $mytime = Carbon::now();
                $end_date = $mytime->toDateTimeString();
                //$end_date = $end_year . "-" . $end_month . "-01";
            }

            if ($is_current_position == "false") {
                $mytime = Carbon::now();
                $end_date = $end_year . "-" . $end_month . "-01";
            }


            JobExperience::create([
                'user_id' => auth()->user()->id,
                'position' => $position,
                'employment_type' => $employment_type,
                'company' => $company,
                'company_type' => $company_type,
                'location_city' => $location_city,
                'location_state' => $location_state,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'is_current_position' => $is_current_position,
                'is_custom_company_type' => $is_custom_company_type,
                'is_custom_employment_type' => $is_custom_employment_type
            ]);
        }
        // START DATUM SOLLTE NICHT HINTER END DATUM LIEGEN! EINFACH GRÖßer KLeiner REchung
        echo json_encode($response_array);
    }

    public static function deleteJobExperience(Request $request)
    {
        $response = "";
        $id = $request->id;
        JobExperience::where('id', $id)->delete();
        echo json_encode("s");
    }

    public static function getJobExperiences($username)
    {
        $response = "";

        $user = User::where('username', $username)->get()->first();
        $jobExperiences = JobExperience::where('user_id', $user->id)->orderBy('end_date', 'DESC')->get();;
        $jobExperiencesCount = $jobExperiences->count();
        if ($jobExperiencesCount != 0) {
            for ($i = 0; $i < $jobExperiencesCount; $i++) {
                $jobExperience = $jobExperiences[$i];
                $response .= View::make("components.job_experience")->with([
                    "jobExperience" => $jobExperience,
                    "viewerOwnsProfile" => Helper::viewerOwnsProfile($user)
                ])->render();
            }
        }
        return json_encode($response);
    }

    public static function getJobExperiencesPreview($username)
    {
        $response = "";
        if ($username == auth()->user()->username) {
            $user = User::where('username', $username)->get()->first();
            $jobExperiences = JobExperience::where('user_id', $user->id)->orderBy('end_date', 'DESC')->get();;
            $jobExperiencesCount = $jobExperiences->count();
            if ($jobExperiencesCount != 0) {
                for ($i = 0; $i < $jobExperiencesCount; $i++) {
                    $jobExperience = $jobExperiences[$i];
                    $response .= View::make("components.job_experience_preview")->with("jobExperience", $jobExperience)->render();
                }
            }
        }
        return json_encode($response);
    }

    public static function getCurrentEmployer($username, $parameters)
    {
        $user = User::where('username', $username)->get()->first();
        $currentEmployer = '';
        $currentJob = JobExperience::latest()->where([
            'user_id' => $user->id,
            'is_current_position' => 'true'
        ])->get();
        if ($currentJob->count() > 0) {
            $currentEmployer = $currentJob->first()->company;
            if ($parameters[0] == '') {
                $currentEmployer = ' @ ' . $currentJob->first()->company;
            }
        }




        return json_encode($currentEmployer);
    }

    public static function getAddExperienceForm($count)
    {
        $response = View::make("components.add_job_experience")->with(["count" => $count])->render();
        echo json_encode($response);
    }

    public static function updateJobExperience(Request $request)
    {
        $response_array = array();
        $error = false;


        $id = $request->id;
        $location_city = $request->location_city;
        $location_state = $request->location_state;
        $position = $request->position;
        $company = $request->company;
        $company_type = $request->company_type;
        $employment_type = $request->employment_type;
        $start_month = $request->start_month;
        $start_year = $request->start_year;
        $end_month = $request->end_month;
        $end_year = $request->end_year;
        $description = $request->description;
        $is_current_position = $request->is_current_position;
        $is_custom_company_type = $request->is_custom_company_type;
        $is_custom_employment_type = $request->is_custom_employment_type;


        // VALIDATE POSITION
        $positionValidator = ValidationHelper::validateString($request, $position, 'position', 'required');
        $response_array[0] = $positionValidator[0];
        if ($error == false) {
            $error = $positionValidator[1];
        }

        // VALIDATE EMPLOYMENT TYPE
        $employmentTypeValidator = ValidationHelper::validateString($request, $employment_type, 'employment_type', 'required');
        $response_array[1] = $employmentTypeValidator[0];
        if ($error == false) {
            $error = $employmentTypeValidator[1];
        }

        // VALIDATE COMPANY 
        $companyValidator = ValidationHelper::validateString($request, $company, 'company', 'required');
        $response_array[2] = $companyValidator[0];
        if ($error == false) {
            $error = $companyValidator[1];
        }

        // VALIDATE COMPANY TYPE
        $companyTypeValidator = ValidationHelper::validateString($request, $company_type, 'company_type', 'required');
        $response_array[3] = $companyTypeValidator[0];
        if ($error == false) {
            $error = $companyTypeValidator[1];
        }

        // VALIDATE LOCATION
        $locationValidator = ValidationHelper::validateLocation($location_city, $location_state);
        $response_array[4] = $locationValidator[0];
        if ($error == false) {
            $error = $locationValidator[1];
        }

        // VALIDATE START MONTH
        $startMonthValidator = ValidationHelper::validateString($request, $start_month, 'start_month', 'required');
        $response_array[5] = $startMonthValidator[0];
        if ($error == false) {
            $error = $startMonthValidator[1];
        }

        // VALIDATE START YEAR
        $startYearValidator = ValidationHelper::validateString($request, $start_year, 'start_year', 'required');
        $response_array[6] = $startYearValidator[0];
        if ($error == false) {
            $error = $startYearValidator[1];
        }


        // VALIDATE DESCRIPTION
        $descriptionValidator = ValidationHelper::validateString($request, $description, 'description', '');
        $response_array[7] = $descriptionValidator[0];

        if ($error == false) {
            $error = $descriptionValidator[1];
        }

        if ($description == null) {
            $description = '';
        }

        // VALIDATE END MONTH
        $endMonthValidator = ValidationHelper::validateString($request, $end_month, 'end_month', 'required');
        if ($is_current_position == "false") {
            $response_array[8] = $endMonthValidator[0];
            if ($error == false) {
                $error = $endMonthValidator[1];
            }
        }
        if ($is_current_position == "true") {
            $response_array[8] = '.';
        }

        // VALIDATE END YEAR
        $endYearValidator = ValidationHelper::validateString($request, $end_year, 'end_year', 'required');
        if ($is_current_position == "false") {
            $response_array[9] = $endYearValidator[0];
            if ($error == false) {
                $error = $endYearValidator[1];
            }
        }
        if ($is_current_position == "true") {
            $response_array[9] = '.';
        }

        // IF ERROR == FALSE; DANN ZU TRUE
        // ERROR FALSCH
        // VALIDATE IS CURRENT POSITIONs


        if ($error == false) {
            $response_array = array();


            // TRANSFORM DATE
            $start_month = Helper::intToMonth($start_month);
            $end_month = Helper::intToMonth($end_month);
            $start_date = $start_year . "-" . $start_month . "-01";


            if ($is_current_position == "true") {
                $mytime = Carbon::now();
                $end_date = $mytime->toDateTimeString();
                //$end_date = $end_year . "-" . $end_month . "-01";
            }

            if ($is_current_position == "false") {
                $mytime = Carbon::now();
                $end_date = $end_year . "-" . $end_month . "-01";
            }



            //$end_date = $end_year . "-" . $end_month . "-01";
            //$response_array[0] = $is_current_position;
            //$response_array[1] = $end_date;
            JobExperience::where('id', $id)->update([
                'position' => $position,
                'employment_type' => $employment_type,
                'company' => $company,
                'company_type' => $company_type,
                'location_city' => $location_city,
                'location_state' => $location_state,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'is_current_position' => $is_current_position,
                'is_custom_company_type' => $is_custom_company_type,
                'is_custom_employment_type' => $is_custom_employment_type
            ]);
        }
        // START DATUM SOLLTE NICHT HINTER END DATUM LIEGEN! EINFACH GRÖßer KLeiner REchung
        echo json_encode($response_array);
    }
}
