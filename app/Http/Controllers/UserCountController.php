<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCountController extends Controller
{
    public function index() {
        return json_encode(User::where([
            ['status', '!=', 'not verified']
        ])->get());
    }
}
