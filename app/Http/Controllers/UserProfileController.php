<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Models\UserFollowers;
use Illuminate\Support\Facades\View;

class UserProfileController extends Controller
{
    public function connections()
    {
        return view('home');
    }



    public function getUser($username)
    {
        $user = User::where('username', $username)->get()->first();


        $reponseArray = array();
        //$reponseArray[0] = View::make("users.index")->with('user', $user)->render();
        $reponseArray[0] = View::make("users.index")->with('user', $user)->render();
        echo json_encode($reponseArray);
    }


    
    public function getUserTabs($username) {
        $reponseArray = array();
        $user = User::where('username', $username)->get()->first();
        $reponseArray[0] = View::make("components.user_profile_tabs")->with([
            'user' => $user,
            'isInsideReactionsModal' => 'true'
        ])->render();
        echo json_encode($reponseArray);
    }


    public function getUserCard($username)
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
        echo json_encode("usercard");
    }


    public function getUserPosts($username)
    {
        $reponseArray = array();
        $postViews = '';
        $user = User::where('username', $username)->get()->first();   
        $posts = Post::where('user_id', $user->id)->take(10)->latest()->get();
        $string = '';
        for ($i = 0; $i < $posts->count(); $i++) {
            $postViews .= View::make("components.post")->with([
                'post' => $posts[$i],   
                ])->render();
        }
        $reponseArray[0] = $postViews;
        echo json_encode($reponseArray);
    }

    public function getUserActivitySubTabs($username)
    {
        $reponseArray = array();
        $user = User::where('username', $username)->get()->first();
        $reponseArray[0] = View::make("components.activity_sub_tabs")->with([
            'user' => $user
        ])->render();
        echo json_encode($reponseArray);
    }

    public function getUserActivitySubTabsMobile($username)
    {
        $reponseArray = array();
        $user = User::where('username', $username)->get()->first();
        $reponseArray[0] = View::make("components.activity_sub_tabs_mobile")->with([
            'user' => $user
        ])->render();
        echo json_encode($reponseArray);
    }

    
    public function getUserConnections($username) {
        $user = User::where('username', $username)->get()->first();
        $reponseArray = array();
        $connections = '';
        $followers = UserFollowers::where(['follower_id' => $user->id, 'request' => 'done'])->get();

        foreach ($followers as &$follower) {
            $userFollowsBack = UserFollowers::where(['user_id' => $user->id, 'request' => 'done'])->get()->count();
            if ($userFollowsBack > 0) {
                $followerObject = User::where(['id' => $follower->user_id])->get()->first();
                $connections .= View::make("components.connection")->with([
                    "connection" => $followerObject,
                    "isInsideConnectionsInCommonModal" => "yes"
                    ])->render();
                //array_push($dataArray, $followerObject);
            } else {
                //array_push($dataArray, "error");
            }
        }
        //$reponseArray[0] = View::make("components.connections")->with("dataArray", $dataArray)->render();
        $reponseArray[0] = $connections; 
        return json_encode($reponseArray);
    }




    public function getUserPageInfo($username)
    {
        $user = User::where('username', $username)->get()->first();   
        $viewerOwnsProfile = false;  
        if ($user == auth()->user()) {
            $viewerOwnsProfile = true;
        }
       
        $reponseArray = array();
         
        $reponseArray[0] = View::make("components.user_page_info")->with([
            'viewerOwnsProfile' => $viewerOwnsProfile,
            'user' => $user,
            'connectButtonArray' => Helper::connectButton($user)
            ])->render();

            
        echo json_encode($reponseArray);
        //echo json_encode("asd");
    }



    public function getConnections(Request $request)
    {
        $reponseArray = array();


        $dataArray = array();
        /*$followers = UserFollowers::where(['follower_id' => auth()->user()->id, 'request' => 'done'])->get();

        foreach ($followers as &$follower) {
            $userFollowsBack = UserFollowers::where(['user_id' => auth()->user()->id, 'request' => 'done'])->get()->count();
            if ($userFollowsBack > 0) {
                $followerObject = User::where(['id' => $follower->user_id])->get()->first();
                array_push($dataArray, $followerObject);
            } else {
                //array_push($dataArray, "error");
            }
        }*/
        $reponseArray[0] = View::make("components.connections")->with("dataArray", $dataArray)->render();
        $reponseArray[1] = sizeof($dataArray);
        return json_encode($reponseArray);
    }


}
