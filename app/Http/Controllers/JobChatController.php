<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JobChatController extends Controller
{
    public function index($uuid)
    {
        $response = '';


        if ($uuid = 'first') {
            $talents = Talent::get();
            $found = false;
            foreach ($talents as $talent) {
                if (!$found)
                    if ($talent->isInvited() && $talent->hasAcceptedInvite()) {
                        $response = View::make('components.job_chat')->with('talent', $talent)->render();
                        $found = true;
                    }
            }
        } else {
            $talent = Talent::where('uuid', $uuid)->get()->first();
            $response = View::make('components.job_chat')->with('talent', $talent)->render();
        }

        echo json_encode($response);
    }
}
