<?php

namespace App\Http\Controllers;

use App\Models\NotificationModal;
use Illuminate\Http\Request;

class NotificationModalController extends Controller
{
    public function index()
    {
        $responseArray = [
            "inviteFriendsModalSeen" => false,
        ];

        $notificationModal = NotificationModal::where('user_id', auth()->user()->id)->get()->first();
        if ($notificationModal) {
            $responseArray = [
                "inviteFriendsModalSeen" => $notificationModal->invite_friends_modal_seen,
            ];
        } else {
            $responseArray = [
                "inviteFriendsModalSeen" => false,
            ];
        }
        echo json_encode($responseArray);
    }

    public function update(Request $request)
    {
        $modal = $request->modal;
        $response = '';
        switch ($modal) {
            case 'invite_friends_notification_modal':
                $notificationModal = NotificationModal::where('user_id', auth()->user()->id)->get()->first();
                if ($notificationModal) {
                    $notificationModal->update(['invite_friends_modal_seen' => 1]);
                }         
                break;
        }   
        echo json_encode($response);
    }
}
