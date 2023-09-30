<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserFollowers;
use Illuminate\Support\Facades\View;

class UserFollowersController extends Controller
{
    public function removeConnection(Request $request)
    {
        $reponseArray = array();


        $user = User::where('username', $request->username)->get()->first();

        $isFollowingUSerQuery = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'done'];
        $userIsFollowingQuery = ['follower_id' => $user->id, 'user_id' => auth()->user()->id, 'request' => 'done'];



        $isFollower = UserFollowers::where($isFollowingUSerQuery)->get()->count();
        if ($isFollower == 1) {
            $followedByUser = UserFollowers::where($userIsFollowingQuery)->get()->count();

            UserFollowers::where($userIsFollowingQuery)->delete();
            UserFollowers::where($isFollowingUSerQuery)->delete();
        }

        $reponseArray[0] = $isFollower . " " . $followedByUser;




        echo json_encode($reponseArray);
    }

    public function getAllNetworksCounts()
    {
        $reponseArray = array();


        // Request
        $dataArray = array();
        $dataArray = UserFollowers::where(['user_id' => auth()->user()->id, 'request' => 'open'])->get();
        $reponseArray[0] = sizeof($dataArray);

        // Suggestions
        $dataArray = array();
        $users = User::where([
            ['id', '!=', auth()->user()->id],
            ['status', '!=', 'not verified'], ['status', '!=', 'company']
        ])->get();
        foreach ($users as &$user) {
            $isFollower = UserFollowers::where([
                'user_id' => $user->id,
                'follower_id' => auth()->user()->id

            ])->count();


            $followerByUser = UserFollowers::where([
                'user_id' => auth()->user()->id,
                'follower_id' => $user->id
            ])->count();

            if ($followerByUser == 0 && $isFollower == 0) {
                $followerObject = User::where(['id' => $user->id])->get()->first();
                array_push($dataArray, $followerObject);
            }
        }
        $reponseArray[1] = sizeof($dataArray);

        // CONNECTIONS
        $dataArray = array();
        $followers = UserFollowers::where(['follower_id' => auth()->user()->id, 'request' => 'done'])->get();

        foreach ($followers as $follower) {
            $userFollowsBack = UserFollowers::where(['user_id' => auth()->user()->id, 'request' => 'done'])->get()->count();
            if ($userFollowsBack > 0) {
                $followerObject = User::where(['id' => $follower->user_id])->get()->first();
                array_push($dataArray, $followerObject);
            } else {
                //array_push($dataArray, "error");
            }
        }
        $reponseArray[2] = sizeof($dataArray);


        return json_encode($reponseArray);
    }


    public function getAllRequests(Request $request)
    {
        $reponseArray = array();
        $dataArray = UserFollowers::where(['user_id' => auth()->user()->id, 'request' => 'open'])->get();

        $reponseArray[0] = View::make("components.invites")->with("dataArray", $dataArray)->render();
        $reponseArray[1] = sizeof($dataArray);
        return json_encode($reponseArray);
    }

    public static function getUserSuggestions($skip, $take, $page)
    {
        $count = 0;
        $response = array();
        $response[0] = '';
        $users = User::where([
            ['id', '!=', auth()->user()->id],
            ['status', '!=', 'not verified'], ['status', '!=', 'company']
        ])->get();

        $skipCount = 0;
        $takeCount = 0;
        foreach ($users as &$user) {
            $isFollower = UserFollowers::where([
                'user_id' => $user->id, 'follower_id' => auth()->user()->id

            ])->count();


            $followerByUser = UserFollowers::where([
                'user_id' => auth()->user()->id,
                'follower_id' => $user->id
            ])->count();

            if ($followerByUser == 0 && $isFollower == 0) {
                if (!$user->isRecruiter()) {
                    if ($skipCount == $skip && $takeCount < $take) {
                        $takeCount++;
                        //$followerObject = User::where(['id' => $user->id])->get()->first();
                        $response[0] .= View::make("components.suggestion1")->with([
                            'user' => $user,
                            'mainId' => $user->username,
                            'letterId' => 'letter' . $user->username,
                            'userDivId' => 'userDivId' . $user->username,
                            'page' => $page,
                        ])->render();
                    }
                } else {
                    $skipCount++;
                }
                $count++;
            }
        }

        $response[1] = $takeCount;

        //$reponseArray[0] = View::make("components.suggestions")->with("dataArray", $dataArray)->render();
        return json_encode($response);
    }

    public function getSuggestions(Request $request)
    {
        $reponseArray = array();
        $dataArray = array();
        $users = User::where([
            ['id', '!=', auth()->user()->id],
            ['status', '!=', 'not verified'],
            ['status', '!=', 'company'],
        ])->get();
        $counter = 0;
        for ($i = 0; $i < sizeof($users); $i++) {
            $isFollower = UserFollowers::where([
                'user_id' => $users[$i]->id,
                'follower_id' => auth()->user()->id

            ])->count();


            $followerByUser = UserFollowers::where([
                'user_id' => auth()->user()->id,
                'follower_id' => $users[$i]->id
            ])->count();

            if ($followerByUser == 0 && $isFollower == 0) {
                $followerObject = User::where(['id' => $users[$i]->id])->get()->first();
                array_push($dataArray, $followerObject);
                $counter++;
            }
        }
        $reponseArray[0] = View::make("components.suggestions")->with("dataArray", $dataArray)->render();
        $reponseArray[1] = sizeof($dataArray);
        return json_encode($reponseArray);
    }

    public function getConnections(Request $request)
    {
        $reponseArray = array();


        $dataArray = array();
        $followers = UserFollowers::where(['follower_id' => auth()->user()->id, 'request' => 'done'])->get();

        foreach ($followers as &$follower) {
            $userFollowsBack = UserFollowers::where(['user_id' => auth()->user()->id, 'request' => 'done'])->get()->count();
            if ($userFollowsBack > 0) {
                $followerObject = User::where(['id' => $follower->user_id])->get()->first();
                array_push($dataArray, $followerObject);
            } else {
                //array_push($dataArray, "error");
            }
        }
        $reponseArray[0] = View::make("components.connections")->with("dataArray", $dataArray)->render();
        $reponseArray[1] = sizeof($dataArray);
        return json_encode($reponseArray);
    }

    public static function getConnectionsCount(User $user)
    {
        $count = sizeof(self::getConnectionsArray($user));
        return json_encode($count);
    }

    public static function getNextSuggestion($count, $page)
    {
        return self::getUserSuggestions($count, 1, $page);
    }
    public static function getSuggestions1($page)
    {
        return self::getUserSuggestions(0, 4, $page);
    }


    public static function getConnectionsArray(User $user)
    {
        $dataArray = array();
        $followers = UserFollowers::where(['follower_id' => $user->id, 'request' => 'done'])->get();

        foreach ($followers as &$follower) {
            $userFollowsBack = UserFollowers::where(['user_id' => $user->id, 'request' => 'done'])->get()->count();
            if ($userFollowsBack > 0) {
                $followerObject = User::where(['id' => $follower->user_id])->get()->first();
                array_push($dataArray, $followerObject);
            }
        }
        return $dataArray;
    }

    public static function getConnectionsInCommonViews($username)
    {
        $array = json_decode(self::getConnectionsInCommon($username));
        $connections = "";
        for ($i = 0; $i < sizeof($array); $i++) {
            $user = User::where('id', $array[$i]->id)->get()->first();
            $connections .= View::make("components.connection")->with([
                'connection' => $user,
                'isInsideConnectionsInCommonModal' => true
            ])->render();
        }
        $array = $connections;
        echo json_encode($array);
    }

    public static function getConnectionsInCommon($username)
    {
        $user = User::where('username', $username)->get()->first();
        $array_user_auth = self::getConnectionsArray(auth()->user());
        $array_user = self::getConnectionsArray($user);
        $in_common_array = array();

        if ($array_user_auth != null && $array_user != null) {
            if (sizeof($array_user) > 0 && sizeof($array_user_auth) > 0) {
                $in_common_array = array_intersect($array_user, $array_user_auth);
                $in_common_array = array_filter($in_common_array);
                $in_common_array = array_values($in_common_array);
            }
        }


        return json_encode($in_common_array);
    }

    public static function getConnectionsInCommonString(User $user)
    {
        $in_common_array = json_decode(self::getConnectionsInCommon($user->username));

        if (sizeof($in_common_array) == 0) {
            $response = "Keine gemeinsamen Verbindungen";
        }
        if (sizeof($in_common_array) > 0) {
            $first_user = $in_common_array[0];
            if (sizeof($in_common_array) == 1) {

                $onclick = <<<STRING
            onclick="loadUserProfileCard('$first_user->username'); $('#reaction_modal').modal('hide'); $('#in_common_with').html('$user->firstname')"
            STRING;

                $insideSpan = <<<STRING
            $first_user->firstname $first_user->name ist eine gemeinsame Verbindung
            STRING;

                //$test = $in_common_array[0]->firstname $in_common_array[0]->name." ist eine gemeinsame Verbindung";

                $response = <<<HTML
            <span class="underline-on-hover" $onclick>$insideSpan</span>
            HTML;
            }

            if (sizeof($in_common_array) == 2) {
                $onclick = <<<STRING
            onclick="loadConnectionsInCommon('$user->username');$('#in_common_connections').modal('show'); $('#reaction_modal').modal('hide'); $('#in_common_with').html('$user->firstname')"
            STRING;

                $size = sizeof($in_common_array);
                $insideSpan = <<<STRING
            $first_user->firstname $first_user->name und eine weitere gemeinsame Verbindung
            STRING;

                //$test = $in_common_array[0]->firstname $in_common_array[0]->name." ist eine gemeinsame Verbindung";

                $response = <<<HTML
            <span class="underline-on-hover" $onclick>$insideSpan</span>
            HTML;
            }

            if (sizeof($in_common_array) > 2) {
                $onclick = <<<STRING
            onclick="loadConnectionsInCommon('$user->username');$('#in_common_connections').modal('show'); $('#reaction_modal').modal('hide'); $('#in_common_with').html('$user->firstname')"
            STRING;

                $size = sizeof($in_common_array) - 1;
                $insideSpan = <<<STRING
            $first_user->firstname $first_user->name und $size weitere gemeinsame Verbindungen
            STRING;

                //$test = $in_common_array[0]->firstname $in_common_array[0]->name." ist eine gemeinsame Verbindung";

                $response = <<<HTML
            <span class="underline-on-hover" $onclick>$insideSpan</span>
            HTML;
            }
        }
        return json_encode($response);
    }

    public function requestConnection(Request $request)
    {
        $responseArray = array();
        $username = strip_tags($request->username);
        $username = trim($username);

        $user = User::where('username', $username)->get();
        $userExists = $user->count();
        if ($userExists == 1) {
            $user = $user->first();


            $areConnected = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'open'];
            $areConnectedDone = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'done'];
            $userWantsToConnect = ['user_id' => auth()->user()->id, 'follower_id' => $user->id, 'request' => 'open'];


            $userFollowerRelation = ['user_id' => $user->id, 'follower_id' => auth()->user()->id];
            $userFollowerUser = ['follower_id' => $user->id, 'user_id' => auth()->user()->id];

            $requestExists = UserFollowers::where($userFollowerRelation)->count();
            $requestExistsFromFollower = UserFollowers::where($userFollowerUser)->count();
            if ($requestExists == 0) {
                if ($requestExistsFromFollower == 0)
                    // SEND REQUEST
                    UserFollowers::create($userFollowerRelation);
                $responseArray[0] = "pending";
            }
            if ($requestExistsFromFollower == 1 && $requestExists == 0) {
                // TRANSFORM ALREADY EXISTING REQUEST FROM OTHER USER INTO CONNECTION
                UserFollowers::create($areConnectedDone);
                UserFollowers::where($userWantsToConnect)->update(['request' => 'done']);
                $responseArray[0] = "connecting";
            }
            $responseArray[1] = $requestExists . " " . $requestExistsFromFollower;
        }
        echo json_encode($responseArray);
    }

    public function acceptRequest(Request $request)
    {

        $response_array = array();



        $username = strip_tags($request->username);
        $user = User::where('username', $username)->get();
        $userExists = $user->count();

        if ($userExists == 1) {

            $user = $user->first();
            $areConnected = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'open'];
            $areConnectedDone = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'done'];
            $userWantsToConnect = ['user_id' => auth()->user()->id, 'follower_id' => $user->id, 'request' => 'open'];



            $requestAccepted = UserFollowers::where($areConnected)->count();
            $requestExists = UserFollowers::where($userWantsToConnect)->count();
            if ($requestExists == 1 && $requestAccepted == 0) {
                UserFollowers::create($areConnectedDone);
                UserFollowers::where($userWantsToConnect)->update(['request' => 'done']);
                NotificationsController::createNotification('request', $user->id, '', '');
                $response_array[0] = "connecting";
            } else {
                $response_array[0] = "already connected";
            }
        } else {
            $response_array[0] = "nicht";
        }
        echo json_encode($response_array[0]);
    }
}
