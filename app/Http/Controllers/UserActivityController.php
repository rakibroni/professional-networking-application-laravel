<?php

namespace App\Http\Controllers;

use App\Models\UserActivity;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    public function create(Request $request) {
        $type = $request->type;
        UserActivity::create([
            'user_id' => auth()->user()->id,
            'name' => $type
        ]);
        echo json_encode("asd");
    }

    public static function index($user) {
        $activities = UserActivity::where('user_id', $user->id)->get();
        return $activities;
    }
}
