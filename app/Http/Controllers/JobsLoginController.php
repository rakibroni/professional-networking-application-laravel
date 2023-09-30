<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ValidationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobsLoginController extends Controller
{
    public function store(Request $request)
    {
        $responseArray = array();
        $error = false;
        $email = $request->email;
        $password = $request->password;
        // VALIDATE EMAIL
        $emailValidator = ValidationHelper::validateString($request, $email, 'email', 'email|required');
        $responseArray[0] = $emailValidator[0];
        if ($error == false) {
            $error = $emailValidator[1];
        }

        $passwordValidator = ValidationHelper::validateString($request, $password, 'password', 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/');
        $responseArray[1] = $passwordValidator[0];
        if ($error == false) {
            $error = $passwordValidator[1];
        }
        $responseArray[3] = "."; 
        if (auth()->attempt(array(
            'email' => $request->email,
            'password' => $request->password
        ), true)) {
            $responseArray[3] = auth()->user()->username; 
        } else {
            $error = true;
            $responseArray[3] = "E-Mail und Passwort stimmen nicht überein."; 
        }
        $responseArray[2] = $error;

        echo json_encode($responseArray);
    }
}
