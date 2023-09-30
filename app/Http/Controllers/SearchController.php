<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $inputValue = $request->inputValue;
        $response = "";
        if (strlen($inputValue) > 0) {

            // NICHT ÜBER DB SONDERN ÜBER USER
            $userArray = DB::select("SELECT * FROM users WHERE CONCAT(firstname, ' ', name) LIKE ? LIMIT 10", ["%$inputValue%"]);

            //$user = User::where('id', $userArray['id'])->first();
            if (sizeof($userArray) > 0 && $userArray != null) {
                //$response = $userArray;
                $wrapper = '<div class="bg-white shadow-md p-2 _br">';
                $response = $wrapper;
                for ($i = 0; $i < sizeof($userArray); $i++) {
                    $user = User::where('id', $userArray[$i]->id)->get()->first();
                    if ($user->status != "not verified" && !$user->isRecruiter()) {
                        $firstname = strip_tags($user->firstname);
                        $lastname = $user->name;



                        //$img = $user->profilpicture;
                        $img = Helper::returnProfilePicture('', '30px', $user, $user->profilePicture, "", "");
                        $item = <<<HTML
                    <div class="d-flex justify-content-start my-2 pointer-on-hover" onclick="$('#search-dropdown').fadeOut(0); loadUserProfileCard('$user->username');">
                        <div class="ms-1">$img</div>
                        <div  class="mt-1 ms-1" style="white-space: nowrap;">
                        $firstname $lastname
                        </div>
                        <div class="mt-1 mx-1">&middot</div>
                        <div class="mt-2 cut-text" style="font-size: 12px" style="width: 50% !important">
                         $user->current_position
                        </div>
                    </div>
                    HTML;
                        $response .= $item;
                    }
                }
                $response .= '</div>';
            } else {
                $response = "";
            }
        } else {
            $response = "";
        }
        echo json_encode($response);
        //echo json_encode($request->id);
    }

    static function search($array, $key, $seachValue)
    {
        $result = "";

        foreach ($array as $row) {
            if ($row->{$key} == $seachValue) {
                $result = $row;
            }
        }
        return $result;
    }


    public function getCity(Request $request)
    {
        $inputValue = $request->inputValue;
        $inputID = $request->inputID;
        $dropdownID = $request->dropdownID;
        if (strlen($inputValue) > 0) {


            $cityArray = DB::select("SELECT * FROM staedte WHERE ort LIKE ? LIMIT 20", ["$inputValue%"]);


            if (sizeof($cityArray) > 0) {
                $numOfRows = sizeof($cityArray);
                $array = $cityArray;



                $osm_ids = array();

                for ($j = 0; $j < $numOfRows; $j++) {
                    if ($j < $numOfRows - 1) {
                        if ($array[$j]->osm_id != $array[$j + 1]->osm_id) {
                            if (in_array($array[$j]->osm_id, $osm_ids) == false)
                                array_push($osm_ids, $array[$j]->osm_id);
                        }
                    } else {
                        if (in_array($array[$j]->osm_id, $osm_ids) == false)
                            array_push($osm_ids, $array[$j]->osm_id);
                    }
                }



                $test = self::search($cityArray, 'osm_id', $cityArray[0]->osm_id);

                $hint = "";
                for ($i = 0; $i < sizeof($osm_ids) && $i < 7; $i++) {
                    $osm_id = $osm_ids[$i];


                    $city_row = self::search($cityArray, 'osm_id', $osm_id);
                    $city = $city_row->ort;
                    $state = $city_row->bundesland;
                    $plz = $city_row->plz;

                    /*if ($i != 0) {
                        $osm_id_before = $osm_ids[$i - 1];
                        $row_before = self::search($cityArray, 'osm_id', $osm_id_before);
                        $city_before = $row_before->ort;
                    }
                    if ($i < sizeof($osm_ids) - 1) {
                        $osm_id_after = $osm_ids[$i + 1];
                        $row_after = self::search($cityArray, 'osm_id', $osm_id_after);
                        $city_after = $row_after->ort;
                    }*/

                    $final = $city . ", " . $state;

                    $item = <<<STRING
                      <div id="stadt$i" onclick="fillInput(this.id, '$inputID', '$dropdownID')" class="dropdown-item pointer-on-hover">$final</div>
                      STRING;
                    $hint .= $item;
                }



                // $cityArray[0]->osm_id
            } else {
                $hint = "";
                $item = <<<STRING
                <div id=""  class="unselectable dropdown-item " style="background-color: white !important" >Keine passenden Ergebnisse gefunden...</div>
                STRING;
                $hint .= $item;
            }

            echo json_encode($hint);
        }
    }


    public function searchTalent($sliderValue)
    {

        //$talent = Talent::where('years_of_experience', $sliderValue)->get()->first();


        echo json_encode($sliderValue);
    }


    public function searchTalentPost(Request $request)
    {
        echo json_encode($request->sliderValue);
    }
}
