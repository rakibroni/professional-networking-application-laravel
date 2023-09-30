<?php

namespace App\Http\Controllers;

use App\Models\UserTraining;
use Illuminate\Http\Request;
use App\Helper\ValidationHelper;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\View;

class UserTrainingController extends Controller
{
    public static function createUserTraining(Request $request)
    {

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
            $userTraining = UserTraining::create([
                'user_id' => $user_id,
                'name' => $name
            ]);
        }
        echo json_encode($userTraining->id);
    }

    public static function getUserTrainingPreview ($username) {
        $response = "";
        if ($username == auth()->user()->username) {
            $user = User::where('username', $username)->get()->first();
            $userTrainings = UserTraining::where('user_id', $user->id)->get();;
            $userTrainingsCount = $userTrainings->count();
            if ($userTrainingsCount != 0) {
                for ($i = 0; $i < $userTrainingsCount; $i++) {
                    $userTraining = $userTrainings[$i];
                    $response .= View::make("components.user_training_preview")->with("userTraining", $userTraining)->render();
                }
            }
        }
        return json_encode($response);
    }

    public static function getUserTraining ($username) {
        $response = "";

            $user = User::where('username', $username)->get()->first();
            $userTrainings = UserTraining::where('user_id', $user->id)->get();;
            $userTrainingsCount = $userTrainings->count();
            if ($userTrainingsCount != 0) {
                for ($i = 0; $i < $userTrainingsCount; $i++) {
                    $userTraining = $userTrainings[$i];
                    $response .= View::make("components.user_training")->with("userTraining", $userTraining)->render();
                }
            }
        
        return json_encode($response);
    }

    public function deleteUserTraining (Request $request) {
        $id = $request->id;
        UserTraining::where('id', $id)->delete();
        echo json_encode("delete");
    }
}
