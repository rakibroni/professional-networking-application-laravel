<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;

use App\Models\ProfilePicture;
use App\Models\NotificationModal;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.register');
    }

    static function removeJS($str)
    {
        $blackListarray = ['(', ')', "'", '"', ';'];
        for ($i = 0; $i < sizeof($blackListarray); $i++) {
            $str = str_replace($blackListarray[$i], "", $str);
        }
        return $str;
    }

    public function setAttributeNames(array $attributes)
    {
        $this->customAttributes = $attributes;

        return $this;
    }

    public function finishRegistration(Request $request)
    {
        $reponse_array = array();
        $error = false;

        // Update User data
        $birthdate = $request->birthdate;
        $gender = $request->gender;
        $email = $request->email;
        $location_city = $request->location_city;
        $location_state = $request->location_state;
        $verification_hash = $request->verification_hash;
        $position = $request->position;
        $years_of_experience = $request->years_of_experience;


        // Validation


        // redirect also if veriefied



        // status

        // VALIDATE BIRTHDATE
        $birtdateValidator = Validator::make($request->all(), [
            'birthdate' => [
                'required',
                'date',
            ],
        ]);

        if ($birtdateValidator->fails()) {
            $error = true;
            $response_array[0] = $birtdateValidator->errors()->all();
        } else {
            $birthdate = strip_tags($birthdate);
            $birthdate = self::removeJS($birthdate);
            $response_array[0] = ".";
        }

        // VALIDATE GENDER
        $gender_options = [
            'Männlich',
            'Weiblich',
            'Divers',
            'Keine Angabe'
        ];
        if (!in_array($gender, $gender_options)) {
            $error = true;
        }

        // VALIDATE LOCATION
        $valid_location = DB::table('staedte')->where([
            'ort' => $location_city,
            'bundesland' => $location_state
        ])->get()->count();
        if ($valid_location == 0) {
            $response_array[1] = "Bitte wähle eine Stadt aus der Liste.";
            $error = true;
        } else {
            $response_array[1] = ".";
        }

        // VALIDATE POSITION
        /*$positions = Helper::getPositionArray();
        if (!in_array($position, $positions)) {
            $error = true;
        }*/

        $positionValidator = Validator::make($request->all(), [
            'position' => [
                'required',
            ],
        ]);
        if ($positionValidator->fails()) {
            $error = true;
            $response_array[2] = $positionValidator->errors()->all();
        } else {
            $position = strip_tags($position);
            $position = self::removeJS($position);
            $response_array[2] = ".";
        }

        // VALIDATE YEARS OF EXPERIENCE
        $years_of_experience_options = Helper::getYearsOfExperienceOptions();
        if (!in_array($years_of_experience, $years_of_experience_options)) {
            $error = true;
        }




        if ($error == false) {
            $response_array = array();
            $user = User::where(['email' => $email, 'verification_hash' => $verification_hash])->update([
                'email_verified_at' => Carbon::now(),
                'status' => 'start',
                'birthdate' => $birthdate,
                'gender' => $gender,
                'location_city' => $location_city,
                'location_state' => $location_state,
                'current_position' => $position,
                'years_of_experience' => $years_of_experience
            ]);
            
        }

        echo json_encode($response_array);
    }

    public function finishSetup(Request $request)
    {
        $user = User::where('username', $request->username)->get()->first();
        User::where('username', $request->username)->update([
            'status' => 'verified'
        ]);
        Auth::login($user);
        return json_encode("s");
    }


    public function createUser(Request $request)
    {   
        $response_array = array();
        $error = false;

        // VALIDATE FIRSTNAME
        $firstNameValidator = Validator::make($request->all(), [
            'first_name' => [
                'required',
                'max:255',
                'min:1',             // must be at least 10 characters in length
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
                'min:1',             // must be at least 10 characters in length
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

        // VALIDATE EMAIL
        
    
         $emailValidator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
                'max: 255',
            ],
        ]);

       if ($emailValidator->fails()) {
            $response_array[2] = $emailValidator->errors()->all();
            $error = true;
        } else {
            if (str_contains($request->email, ".")) {
                $mailExists = User::where('email', $request->email)->get()->count();
                if ($mailExists == 1) {
                    $error = true;
                    $response_array[2] = "Diese Email-Adresse existiert bereits.";
                } else {
                    $response_array[2] = ".";
                }
            } else {
                $response_array[2] = "E-Mail Adresse muss eine gültige E-Mail-Adresse sein.";
                $error = true;
            }
        }
        // VALIDATE EMAIL -- END

        // VALIDATE PASSWORD
        $passwordValidator = Validator::make($request->all(), [
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                //'regex:/[\.\_\+\-@$!%*#?&]/', // must contain a special character
            ], // looks for any _confirmation
        ]);

        if ($passwordValidator->fails()) {
            $response_array[3] = $passwordValidator->errors()->all();
            $error = true;
        } else {
            $response_array[3] = ".";
        }
        // VALIDATE PASSWORD -- END



        // SUCCESS -> CREATE USER & SEND MAIL
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



            //$response_array[0] = $username;

            // SUCCESS -> CREATE USER & SEND MAIL -- END
            $rand = rand(0, 1000);
            $str = 'dasproffesionelleBerufsnetzwerkfürdiePlege#+###ä#äas#döasäd' . $rand;
            $hashstring = str_shuffle($str);
            $hashstring = Hash::make($hashstring);
            User::create([
                'name' => $lastname,
                'firstname' => $firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'username' => $username,
                'verification_hash' => $hashstring
            ]);

            $user = User::where(['username' => $username])->get()->first();
            $profilePicture = ProfilePicture::where('user_id', $user->id)->get()->count();
            if ($profilePicture == 0) {
                
                ProfilePicture::create([
                    'user_id' => $user->id,
                    'path' => '/images/profile_picture_default/default.png',
                    'zoom' => '100%',
                    'pos_x' => 0,
                    'pos_y' => 0,
                    'rot' => 'rotate0',
                ]);
            }

            NotificationModal::create(['user_id' => $user->id]);

            //EmailController::sendConfirmation($request, $hashstring);
        }


        // PROFILEPICTURE ERST SPÄTER

        echo json_encode($response_array);
    }

    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            'email' => 'email|required|max:255',
            'password' => 'required|confirmed', // looks for any _confirmation
        ]);

        // store user

        $lastname = json_encode($request->lastname, JSON_UNESCAPED_UNICODE);
        $firstname = strip_tags(ucfirst(strtolower($request->firstname))); // Uppercase first letter
        $lastname = strip_tags(ucfirst(strtolower($lastname))); // Uppercase first letter
        $firstname = self::removeJS($firstname);
        $lastname = self::removeJS($lastname);

        // Generate username by concatinating fist name and last name
        $username = strtolower($firstname . "_" . $lastname);
        $check_username_query = DB::select('select * from users where username = ?', [$username]);
        $i = 0;
        while (sizeof($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = DB::select('select * from users where username = ?', [$username]);
        }



        User::create([
            'name' => $lastname,
            'firstname' => $firstname,
            'email' => strip_tags($request->email),
            'password' => Hash::make($request->password),
            'username' => $username,
        ]);

        $user = User::where('username', $username)->first();

        ProfilePicture::create([
            'user_id' => $user->id,
            'path' => '/images/profile_picture_default/default.png',
            'zoom' => 100,
            'pos_x' => 0,
            'pos_y' => 0,
            'rot' => 0,
        ]);

        // sign user in
        auth()->attempt($request->only('email', 'password'));

        // redirect
        return redirect()->route('feed');
    }
}
