<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInviteController extends Controller
{
    public function create(Request $request) {
        $fullName = $request->fullName;
        $emails = json_decode($request->emailArray);

        for ($i = 0; $i < sizeof($emails); $i++) {
            EmailController::sendInviteLink($emails[$i], $fullName);
        }
        
        //echo json_encode($email1[0]);
        echo json_encode("asdas");
    }
}
