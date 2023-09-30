<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helper\Helper;
use Illuminate\Support\Facades\View;

class UserCardController extends Controller
{
    public function index ($username)
    {
        $user = User::where('username', $username)->get()->first();  
        $viewerOwnsProfile = false;  
        if ($user == auth()->user()) {
            $viewerOwnsProfile = true;
        }
        $reponseArray = array();
        $reponseArray[0] = View::make("components.user_card")->with([
            'viewerOwnsProfile' => $viewerOwnsProfile,
            'user' => $user,
            'connectButtonArray' => Helper::connectButton($user)
            ])->render();
        echo json_encode($reponseArray);
    }
}
