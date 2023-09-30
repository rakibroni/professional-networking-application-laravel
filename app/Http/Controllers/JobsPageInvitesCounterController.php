<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsPageInvitesCounterController extends Controller
{
    public function index() {
        $response = array();
        $response[0] = 0;
        $response[1] = 1;
        $response[2] = 2;
        echo json_encode($response);
    }
}
