<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserPageJavascriptController extends Controller
{
    public function index() {
        $userPageJavascript = View::make('components.user_page_javascript')->render();
        echo json_encode($userPageJavascript);
    }
}
