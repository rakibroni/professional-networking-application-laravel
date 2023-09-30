<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsPageInvitesController extends Controller
{
    public function index($status) {
        echo json_encode($status);
    }
}
