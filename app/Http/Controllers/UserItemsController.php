<?php

namespace App\Http\Controllers;

use App\Models\UserSkill;
use App\Models\UserLanguage;
use Illuminate\Http\Request;
use App\Helper\ValidationHelper;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\View;

class UserItemsController extends Controller
{
    public static function createUserItem(Request $request)
    {
        $response_array = array();
        $user_id = auth()->user()->id;
        $error = false;

        $value = $request->value;
        $optionalValue = $request->optionalValue;
        $itemCategory = $request->itemCategory;


        // VALIDATE VALUE
        $valueValidator = ValidationHelper::validateString($request, $value, 'value', 'required');
        $response_array[0] = $valueValidator[0];
        if ($error == false) {
            $error = $valueValidator[1];
        }

        // VALIDATE OPTIONAL VALUE
        $optionalValueValidator = ValidationHelper::validateString($request, $optionalValue, 'optionalValue', 'required');
        $response_array[1] = $optionalValueValidator[0];
        if ($error == false) {
            $error = $optionalValueValidator[1];
        }

        if ($error == false) {
            if ($itemCategory == 'language') {
                $userLanguage = UserLanguage::create([
                    'user_id' => $user_id,
                    'language' => $value,
                    'level' => $optionalValue
                ]);
                $response_array = array();
                $response_array = $userLanguage->id;
            }
        }
        echo json_encode($response_array);
    }

    public static function getUserItemsPreview($username, $itemCategory)
    {
        $response = "";
        if ($username == auth()->user()->username) {
            $user = User::where('username', $username)->get()->first();
            if ($itemCategory == 'language') {
                $userItems = UserLanguage::where('user_id', $user->id)->get();
            }
            $itemsCount = $userItems->count();
            if ($itemsCount != 0) {
                for ($i = 0; $i < $itemsCount; $i++) {
                    $userItem = $userItems[$i];

                    $userItem['mainID'] = $itemCategory . '_preview_' . $userItem->id;
                    $userItem['innerID'] = 'inner_' . $itemCategory . '_preview' . $userItem->id;
                    $userItem['deleteID'] = $itemCategory . '_delete_preview' . $userItem->id;
                    $userItem['category'] = $itemCategory;
                    $userItem['optionalValue'] = '';

                    if ($itemCategory == 'language') {
                        $userItem['value'] = $userItem->language;
                        $userItem['optionalValue'] = ' (' . $userItem->level . ')';
                    }

                    $response .= View::make("components.user_item_preview")->with("userItem", $userItem)->render();
                }
            }
        }
        return json_encode($response);
    }

    public static function getuserItems($username, $itemCategory)
    {
        $response = "";

            $user = User::where('username', $username)->get()->first();
            if ($itemCategory == 'language') {
                $userItems = UserLanguage::where('user_id', $user->id)->get();
            }
            $itemsCount = $userItems->count();
            if ($itemsCount != 0) {
                for ($i = 0; $i < $itemsCount; $i++) {
                    $userItem = $userItems[$i];
                    $userItem['mainID'] = $itemCategory . '_' . $userItem->id;

                    if ($itemCategory == 'language') {
                        $userItem['value'] = $userItem->language . ' (' . $userItem->level . ')';
                    }

                    $response .= View::make("components.user_item")->with("userItem", $userItem)->render();
                }
            }
        
        return json_encode($response);
    }

    public static function deleteUserItem(Request $request)
    {
        $id = $request->id;
        $itemCategory = $request->itemCategory;

        if ($itemCategory == 'language') {
            UserLanguage::where('id', $id)->delete();
        }

        echo json_encode($id."   ".$itemCategory);
    }
}
