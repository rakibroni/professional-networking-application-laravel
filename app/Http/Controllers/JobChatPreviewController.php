<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class JobChatPreviewController extends Controller
{
    public function index() {
        $response = '';
        $talents = Talent::get();
        
        
        foreach ($talents as $talent) {
            if ($talent->isInvited() && $talent->hasAcceptedInvite()) {
                $response .= View::make('components.chat_preview')->with('talent', $talent)->render();
            }
        }


        
        echo json_encode($response);
    }
}
