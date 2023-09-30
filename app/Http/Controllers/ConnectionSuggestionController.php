<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserFollowers;
use Illuminate\Support\Facades\View;

class ConnectionSuggestionController extends Controller
{
    public function index($skip, $take, $suggestionsCounter)
    {
        $reponseArray = array();
        $dataArray = array();
        $reponseArray[0] = "";
        $reponseArray[2] = "";
        $skipCounter = 0;
        $takeCounter = 0;


        $users = User::where([
            ['id', '!=', auth()->user()->id],
            ['status', '!=', 'not verified'],
            ['status', '!=', 'company'],
        ])->get();


        $suggestesUsers = array();


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
                array_push($suggestesUsers, $users[$i]);
            }
        }



        for ($i = 0; $i < sizeof($suggestesUsers); $i++) {
            if ($skip == 0 && $skipCounter == 0 && $takeCounter == 0) {
                $reponseArray[2] = View::make("components.suggestions")->with("dataArray", array())->render();
                $suggestionsCounter += 8;
            }


            $a = $skip + $takeCounter;
            $b = 0;
            if ($a < sizeof($suggestesUsers)) {
                $b = 0;
            } else {
                $b = 1;
            }

            if ($skipCounter == $skip && $takeCounter < $take && $b == 0) {
                $takeCounter++;
                $followerObject = User::where(['id' => $suggestesUsers[$i]->id])->get()->first();
                array_push($dataArray, $followerObject);
                if (!$followerObject->isRecruiter()) {
                    $reponseArray[0] .= View::make("components.suggestion")->with("suggestion", $followerObject)->render();
                }
            } else {
                $skipCounter++;
            }
        }

        $reponseArray[1] = sizeof($suggestesUsers);
        echo json_encode($reponseArray);
    }
}
