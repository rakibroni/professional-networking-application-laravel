<?php

namespace App\Http\Controllers;

use App\Models\UserSkill;
use Illuminate\Http\Request;
use App\Helper\ValidationHelper;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\View;

class UserSkillsController extends Controller
{
    public static function createUserSkill (Request $request) {

        $name = $request->name;
        $user_id = auth()->user()->id;
        $error = false;

        // VALIDATE NAME
        $nameValidator = ValidationHelper::validateString($request, $name, 'name', 'required');
        $response_array[0] = $nameValidator[0];
        if ($error == false) {
            $error = $nameValidator[1];
        }

        if ($error == false) {
            $userSkill = UserSkill::create([
                'user_id' => $user_id,
                'name' => $name
            ]);
        }
        echo json_encode($userSkill->id);
    }

    public static function getUserSkillsPreview ($username) {
        $response = "";
        if ($username == auth()->user()->username) {
            $user = User::where('username', $username)->get()->first();
            $userSkills = UserSkill::where('user_id', $user->id)->get();;
            $userSkillsCount = $userSkills->count();
            if ($userSkillsCount != 0) {
                for ($i = 0; $i < $userSkillsCount; $i++) {
                    $userSkill = $userSkills[$i];
                    $response .= View::make("components.user_skill_preview")->with("userSkill", $userSkill)->render();
                }
            }
        }
        return json_encode($response);
    }

    public static function getUserSkills ($username) {
        $response = "";

            $user = User::where('username', $username)->get()->first();
            $userSkills = UserSkill::where('user_id', $user->id)->get();;
            $userSkillsCount = $userSkills->count();
            if ($userSkillsCount != 0) {
                for ($i = 0; $i < $userSkillsCount; $i++) {
                    $userSkill = $userSkills[$i];
                    $response .= View::make("components.user_skill")->with("userSkill", $userSkill)->render();
                }
            }
        
        return json_encode($response);
    }

    public function deleteUserSkill (Request $request) {
        $id = $request->id;
        UserSkill::where('id', $id)->delete();
        echo json_encode("delete");
    }
}
