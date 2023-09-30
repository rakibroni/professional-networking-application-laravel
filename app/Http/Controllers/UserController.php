<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    /*public function getUser(User $user) {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);

        return view('users.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }*/



    public function updateUserInfo(Request $request)
    {
        $response_array = array();
        $error = false;

        // VALIDATE FIRSTNAME
        $firstNameValidator = Validator::make($request->all(), [
            'first_name' => [
                'required',
                'max:255',
                'min:2',             // must be at least 10 characters in length
                'regex: /^[a-zA-Zäöüß\- ]*$/',
            ],
        ]);

        if ($firstNameValidator->fails()) {
            $response_array[0] = $firstNameValidator->errors()->all();
            $error = true;
        } else {
            $response_array[0] = ".";
        }
        // VALIDATE FIRSTNAME -- END

        // VALIDATE LASTNAME
        $lastNameValidator = Validator::make($request->all(), [
            'last_name' => [
                'required',
                'max:255',
                'min:2',             // must be at least 10 characters in length
                'regex: /^[a-zA-Zäöüß\- ]*$/',
            ],
        ]);

        if ($lastNameValidator->fails()) {
            $response_array[1] = $lastNameValidator->errors()->all();
            $error = true;
        } else {
            $response_array[1] = ".";
        }
        // VALIDATE LASTNAME -- END

        // VALIDATE LOCATION
        $location_city = $request->location_city;
        $location_state = $request->location_state;
        $valid_location = DB::table('staedte')->where([
            'ort' => $location_city,
            'bundesland' => $location_state
        ])->get()->count();
        if ($valid_location == 0) {
            $response_array[2] = "Bitte wähle eine Stadt aus der Liste.";
            $error = true;
        } else {
            $response_array[2] = ".";
        }
        // VALIDATE LOCATION -- END

        $position = $request->position;
        $positionValidator = Validator::make($request->all(), [
            'position' => [
                'required',
            ],
        ]);
        if ($positionValidator->fails()) {
            $error = true;
            $response_array[3] = $positionValidator->errors()->all();
        } else {
            $position = strip_tags($position);
            $position = HELPER::removeJS($position);
            $response_array[3] = ".";
        }

        // SUCCESS -> UPDATE USER
        if ($error == false) {
            $response_array = array();


            // store user

            $lastname = json_encode($request->last_name, JSON_UNESCAPED_UNICODE);
            $firstname = json_encode($request->first_name, JSON_UNESCAPED_UNICODE);




            $firstname = Helper::removeJS($firstname);
            $lastname = Helper::removeJS($lastname);


            // Generate username by concatinating fist name and last name
            $username = str_replace(" ", "_", $firstname) . "_" . str_replace(" ", "_", $lastname);
            $username = mb_strtolower($username, 'UTF-8');
            $check_username_query = DB::select('select * from users where username = ?', [$username]);
            $i = 0;
            while (sizeof($check_username_query) != 0) {
                $i++;
                $username = $username . "_" . $i;
                $check_username_query = DB::select('select * from users where username = ?', [$username]);
            }

            $firstname = ucfirst($firstname);
            $lastname = ucfirst($lastname);

            User::where('id', auth()->user()->id)->update([
                'firstname' => $firstname,
                'name' => $lastname,
                'current_position' => $position,
                'location_city' => $location_city,
                'location_state' => $location_state
            ]);
        }


        echo json_encode($response_array);
    }

    public function updateUserSummary(Request $request)
    {
        $response_array = array();
        $error = false;

        // VALIDATE SUMMARY
        $summary = $request->summary;
        if ($summary != null) {
            $summaryValidator = Validator::make($request->all(), [
                'summary' => [
                    'max:3000'
                ],
            ]);

            if ($summaryValidator->fails()) {
                $response_array[0] = $summaryValidator->errors()->all();
                $error = true;
            } else {
                $response_array[0] = ".";
            }
        } else {
            $summary = '';
        }

        // SUCCESS -> UPDATE USER
        if ($error == false) {
            $response_array = array();

            User::where('id', auth()->user()->id)->update([
                'summary' => $summary,
            ]);
        }


        echo json_encode($response_array);
    }

    public function getUserSummary(Request $request)
    {
        echo json_encode(auth()->user()->summary);
    }

    
}
