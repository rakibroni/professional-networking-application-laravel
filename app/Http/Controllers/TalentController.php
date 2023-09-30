<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TalentController extends Controller
{
    public function index($uuid)
    {
        $talent = Talent::where('uuid', $uuid)->get()->first();
        $view = View::make("components.talent_page")->with('talent', $talent)->render();
        echo json_encode($view);
    }
}
