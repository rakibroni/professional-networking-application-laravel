<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RegistrationCode;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Controller;

class RegistrationCodeController extends Controller
{
    public function create(Request $request) {
        $email = $request->email;
        $code = mt_rand(100000, 999999);
        $registrationCodeExists = RegistrationCode::where('email', $email)->get();

        if ($registrationCodeExists->count() == 1) {
            $registrationCodeExists->first()->delete();
        }

        RegistrationCode::create([
            'email' => $email,
            'code' => $code
        ]);
        EmailController::sendConfirmationCode($email, $code);
        echo json_encode($code);
    }

    public function index(Request $request) {
        $response = array();
        $response[0] = "";
        $response[1] = "";
        $response[2] = "";
        $email = $request->email;
        $code = $request->code;
        $registrationCode = RegistrationCode::where([
            'code' => $code,
            'email' => $email,
        ])->get();
        if ($registrationCode->count() == 1) {
            $response[0] = "success";
            $user = User::where('email', $email)->get()->first();
            $response[1] = '/welcome?email='.$email.'&hash='.$user->verification_hash;
            $registrationCode->first()->delete();

        } else {
            $response[0] = "no code found";
        }

        

        echo json_encode($response);
    }
}
