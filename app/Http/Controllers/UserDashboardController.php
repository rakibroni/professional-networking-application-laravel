<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserDashboardController extends Controller
{
    public function index($rowCounter)
    {
        $response = array();
        $response[0] = "";
      
        

        $users = User::skip($rowCounter)->take(5)->get();
        for ($i = 0; $i < sizeof($users); $i++) {
            $rowCounter++;
            $response[0] .= View::make("components.dashboard_user_row")->with([
                "user" => $users[$i]
            ])->render();
        }
        $response[1] = $rowCounter;
        echo json_encode($response);
    }

    
}
