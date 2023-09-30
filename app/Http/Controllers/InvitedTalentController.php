<?php

namespace App\Http\Controllers;

use App\Models\Talent;
use App\Models\TalentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InvitedTalentController extends Controller
{
    public function create(Request $request)
    {
        $talent = Talent::where('uuid', $request->uuid)->get()->first();
        if (!$talent->isInvited()) {
            TalentStatus::create([
                'talent_id' => $talent->id,
                'object_status_id' => 4
            ]);
            echo json_encode("invited");
        } else {
            echo json_encode("already invited");
        }
    }

    public function index($status)
    {
        $responseArray = array();
        $responseArray[0] = '';
        $responseArray[1] = 0;
        $responseArray[2] = 0;
        $responseArray[3] = 0;


        $invitedTalents = Talent::where('user_id', auth()->user()->id)->get();
        $inviteCounter = 0;
        foreach ($invitedTalents as $talent) {
            if ($talent->isInvited() && !$talent->hasAcceptedInvite()) {
                if ($status ==  'invited') {
                    $responseArray[0] .= View::make("components.jobs_page_talent")->with([
                        'talent' => $talent
                    ])->render();  
                }
                $inviteCounter++;
            }

        }
        if ($inviteCounter == 0 && $status ==  'invited') {
            $responseArray[0] = View::make("components.no_invites_yet")->render();
        }
        $responseArray[1] = $inviteCounter;


        $acceptedInviteTalents = Talent::where('user_id', auth()->user()->id)->get();
        $acceptedInvitesCounter = 0;
        foreach ($acceptedInviteTalents as $talent) {
            if ($talent->hasAcceptedInvite()) {
                if ($status ==  'accepted') {
                    $responseArray[0] .= View::make("components.jobs_page_talent")->with([
                        'talent' => $talent
                    ])->render();  
                }
                $acceptedInvitesCounter++;
            }
        }
        if ($acceptedInvitesCounter == 0 && $status == 'accepted') {
            $responseArray[0] = View::make("components.no_invites_yet")->render();
        }
        $responseArray[2] = $acceptedInvitesCounter;





        echo json_encode($responseArray);
    }
}
