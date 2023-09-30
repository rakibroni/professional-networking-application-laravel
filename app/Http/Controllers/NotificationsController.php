<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NotificationsController extends Controller
{
    public function index()
    {
        return view('home');
    }



    public function getNotifications()
    {
        $response_array = array();
        $response_array[0] = View::make("notifications.index")->render();
        echo json_encode($response_array);
    }

    public static function createNotification($message_type, $receiver_id, $optional, $optional_1)
    {
        $auth_user_id = auth()->user()->id;


        // CHECK IF EXISTS
        if ($optional == 'like') {
            $notificationExists = Notification::where([
                'sender_id' => $auth_user_id,
                'receiver_id' => $receiver_id,
                'message_type' => $message_type,
                'optional' => $optional
            ])->get()->count();
        } else {
            $notificationExists = 0;
        }



        // OPTIONAL POSTID
        if ($notificationExists == 0) {
            if ($receiver_id != $auth_user_id) {
                Notification::create([
                    'sender_id' => $auth_user_id,
                    'receiver_id' => $receiver_id,
                    'message_type' => $message_type,
                    'optional' => $optional,
                    'optional_1' => $optional_1
                ]);
            }
        }
    }

    public static function getNotificationsMessage($id, $message_type, $optional, $optional_1)
    {
        $message = '';
        /*if ($message_type == 'like') {
            $message = <<<HTML
<span class="NotificationsBoxMidFontStyle3"> gefällt ein <span
class="NotificationsBoxMidFontStyle2 underline-on-hover"
onclick="loadSinglePostPage('$optional');">Beitrag</span>,
den du veröffentlicht hast.</span>
HTML;
        }
        if ($message_type == 'comment') {
            $message = <<<HTML
<span class="NotificationsBoxMidFontStyle3"> hat einen  <span
class="NotificationsBoxMidFontStyle2 underline-on-hover"
onclick="loadSinglePostPage('$optional', '$optional_1');">Beitrag</span>
kommentiert, den du veröffentlicht hast.</span>
HTML;
        }*/
        if ($message_type == 'like') {
            $message = <<<HTML
<span class="NotificationsBoxMidFontStyle3"> gefällt ein <span
class="NotificationsBoxMidFontStyle2 underline-on-hover"
onclick="loadSinglePostPage('$optional');">Beitrag</span>,
den du veröffentlicht hast.</span>
HTML;
        }
        if ($message_type == 'comment') {
            $message = <<<HTML
<span class="NotificationsBoxMidFontStyle3"> hat einen  <span
class="NotificationsBoxMidFontStyle2 underline-on-hover"
onclick="">Beitrag</span>
kommentiert, den du veröffentlicht hast.</span>
HTML;
        }
        if ($message_type == 'request') {
            $message = <<<HTML
<span class="NotificationsBoxMidFontStyle3">hat deine Anfrage angenommen.</span>
HTML;
        }
        return $message;
    }


    public static function updateNewNotifications()
    {
        $response = '';

        $user = auth()->user();
        $new_notifications = Notification::where([
            'status' => 'not seen',
            'receiver_id' => $user->id
        ])->orderBy('created_at', 'DESC')->get();


        foreach ($new_notifications as $notification) {
            $response .= View::make("components.notification")->with('notification', $notification)->render();
        }
        return json_encode($response);
    }

    public static function updateOldNotifications()
    {
        $response = '';

        $user = auth()->user();
        $new_notifications = Notification::where([
            'status' => 'seen',
            'receiver_id' => $user->id
        ])->orderBy('created_at', 'DESC')->get();


        foreach ($new_notifications as $notification) {
            $response .= View::make("components.notification")->with('notification', $notification)->render();
        }

        return json_encode($response);
    }

    public static function getNewNotifications($user)
    {
        $response = '';

        $new_notifications = Notification::where([
            'status' => 'not seen',
            'receiver_id' => $user->id
        ])->get();


        foreach ($new_notifications as $notification) {
            $response .= View::make("components.notification")->with('notification', $notification)->render();
        }

        return json_encode("asd");
    }

    public static function getOldNotifications($user)
    {
        $response = '';


        $new_notifications = Notification::where([
            'status' => 'seen',
            'receiver_id' => $user->id
        ])->get();


        foreach ($new_notifications as $notification) {
            $response .= View::make("components.notification")->with('notification', $notification)->render();
        }

        return json_encode($response);
    }

    public static function markNotificationsAsSeen(Request $request)
    {
        $response = '';
        $notifications = Notification::where([
            'receiver_id' => auth()->user()->id,
            'status' => 'not seen'
        ])->get();


        foreach ($notifications as $notification) {
            Notification::where('id', $notification->id)->update(['status' => 'seen']);
        }

        echo json_encode($response);
    }

    public static function getNewNotificationsCount() {
        $notifications = Notification::where([
            'receiver_id' => auth()->user()->id,
            'status' => 'not seen'
        ])->get();
        echo json_encode($notifications->count());
    }
}
