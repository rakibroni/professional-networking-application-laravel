<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserFollowers;
use Illuminate\Support\Facades\View;

class NetworkController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function invites()
    {
        return view('home');
    }
    public function connections()
    {
        return view('home');
    }

    public function getNetwork() {
        $response_array = array();
        $response_array[0] = View::make("network.index")->render();
        echo json_encode($response_array);
    }
}
