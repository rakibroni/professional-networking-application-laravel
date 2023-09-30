<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use ConvertApi\ConvertApi;
use App\Helper\ImageHelper;
use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\Validator;

class ProfilePictureController extends Controller
{
    public function uploadTempImage(Request $request)
    {
        ImageHelper::uploadTempImage($request, "profile_picture");
    }

    public function store_final(Request $request)
    {
        echo ImageHelper::saveImage($request, 'profile_picture');
    }

    public function delete(Request $request)
    {
        ImageHelper::deleteOldTemp($request->temp_path, 'profile_picture');
        ImageHelper::deleteImage($request);
    }


    public function discard(Request $request)
    {
        ImageHelper::deleteOldTemp($request->temp_path, 'profile_picture');
    }

    public function getProfilePictureStats(Request $request) {
        $profilePicture = ProfilePicture::where('user_id', auth()->user()->id)->get()->first();
        $response_array = array();

        $response_array[0] = $profilePicture->path;
        $response_array[1] = $profilePicture->zoom;
        $response_array[2] = $profilePicture->pos_x;
        $response_array[3] = $profilePicture->pos_y;
        $response_array[4] = $profilePicture->rot;

        echo json_encode($response_array);
    }
}
