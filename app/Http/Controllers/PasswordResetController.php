<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class PasswordResetController extends Controller
{
    public function create(Request $request)
    {
        $email = $request->email;
        $token = Hash::make(rand(0, 1000));

        $userWithMailExists = User::where('email', $email)->get()->count();
        if ($userWithMailExists == 1) {

            // CHECK IF USER ALREADY TRIED TO RESET PASSWORD, IF TRUE DELETE OLD RESET REQUEST
            $passwordResetAlreadyExists = PasswordReset::where('email', $email)->get();
            if ($passwordResetAlreadyExists->count() == 1) {
                $passwordResetAlreadyExists->first()->delete();
            }

            // CREATE NEW PASSWORD RESET
            PasswordReset::create([
                'email' => $email,
                'token' => $token //change 60 to any length you want     
            ]);

            // SECURITY QUESTION HERE MAYBE
            EmailController::sendPasswordReset($email, $token);
            echo json_encode("success");




        } else {
            echo json_encode("no user found");
        }
    }

    public function update(Request $request)
    {

        $newPassword = $request->newPassword;
        $newPasswordRepeat = $request->password_confirmation;
        $error = false;


        $responseArray = [];
        // new password
        $responseArray[0] = '';
        $responseArray[1] = 'false';
        // new password confirmation
        $responseArray[2] = '';
        $responseArray[3] = 'false';
        // password comparisons
        $responseArray[4] = '';
        $responseArray[5] = 'false';


        $responseArray[6] = $newPassword;
        $responseArray[7] = $newPasswordRepeat;



        $passwordValidator = Validator::make($request->all(), [
            'newPassword' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);

        if ($passwordValidator->fails()) {
            $responseArray[0] = $passwordValidator->errors()->all();
            $responseArray[1] = 'true';
            $error = true;
        } else {
            $responseArray[0] = ".";
        }

        $passwordValidator = Validator::make($request->all(), [
            'password_confirmation' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);

        if ($passwordValidator->fails()) {
            $responseArray[2] = $passwordValidator->errors()->all();
            $responseArray[3] = 'true';
            $error = true;
        } else {
            $responseArray[2] = ".";
        }


        if ($newPassword != $newPasswordRepeat) {
            $responseArray[4] = 'Passwörter stimmen nicht überein.';
            $responseArray[5] = 'true';
            $error = true;
        }

        if ($error == false) {
            $email = $request->email;
            $user = User::where('email', $email)->get()->first();
            $user->update([
                'password' => Hash::make($newPassword)
            ]);
            PasswordReset::where('email', $email)->get()->first()->delete();
            //$responseArray[6] = $user->username;
            
        }

        echo json_encode($responseArray);
    }
}
