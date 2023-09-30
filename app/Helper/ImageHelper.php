<?php

namespace App\Helper;

use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\Validator;

class ImageHelper
{
  public static function saveImage(Request $request, $mode) // VALIDATOR NECESSARAY IF FILE_EXIST USED??
  {
    // DECLARE RESPONSE ARRAY
    $responseArray = array();

    switch ($mode) {
      case 'profile_picture':
        $FINAL_PATH = '/images/profile_pictures/';
        $FILE_NAME = 'profile_picture';
        break;
      case 'post_image':
        $FINAL_PATH = '/images/post_images/';
        $FILE_NAME = 'post_image';
        break;
      default:
        break;
    }

    $temp_path = parse_url($request->temp_path, PHP_URL_PATH);
    $ext = pathinfo($request->temp_path, PATHINFO_EXTENSION);
    $final_path = $FINAL_PATH . uniqid($FILE_NAME, true) . '.' . $ext;


    if ((file_exists(public_path($temp_path))) && $temp_path != "") { // Check if temp file (still) exists
      if (!str_contains($temp_path, 'profile_picture_default/')) {
        rename(public_path($temp_path), public_path($final_path));
        switch ($mode) {
          case 'profile_picture':
            ProfilePicture::where('user_id', auth()->user()->id)->update(['path' => $final_path]);
            break;
          case 'post_image':
            break;
          default:
            break;
        }
        $responseArray[0] = $final_path;
      } else {
        $responseArray[0] = "user tried to upload the default profile picture";
      }
    } else {
      $responseArray[0] = "temp file was already uploaded";
      switch ($mode) {
        case 'profile_picture':
          break;
        case 'post_image':
          $responseArray[0] = "";
          break;
        default:
          break;
      }
    }

    switch ($mode) {
      case 'profile_picture':
        ProfilePicture::where('user_id', auth()->user()->id)->update([
          'pos_x' => $request->pos_x,
          'pos_y' => $request->pos_y,
          'zoom' => $request->zoom,
          'rot' => $request->rot
        ]);
        break;
      case 'post_image':
        break;
      default:
        break;
    }

    // RETURN RESPONSE ARRAY
    return json_encode($responseArray);
  }
  public static function uploadTempImage(Request $request, $mode)
  {
    // DECLARE RESPONSE ARRAY
    $reponse_array = array();

    // Set variables for each mode
    switch ($mode) {
      case 'profile_picture':
        $MAX_SIZE = '10240';
        $TEMP_PATH = '/images/profile_pictures_temp';
        $FILE_NAME = 'temp_profile_picture';
        $IMAGE_ID = 'upload_profile_pic';
        $QUALITY = 50;
        $image = $request->upload_profile_pic;
        break;
      case 'post_image':
        $MAX_SIZE = '10240';
        $TEMP_PATH = '/images/post_images_temp';
        $FILE_NAME = 'temp_post_image';
        $IMAGE_ID = 'upload_post_image';
        $QUALITY = 50;
        $image = $request->upload_post_image;
        break;
      default:
        $MAX_SIZE = '';
        $TEMP_PATH = '';
        $FILE_NAME = '';
    }

    // delete old temp image 
    if ($request->tempPath != "") {
      self::deleteOldTemp($request->tempPath, 'profile_picture');
    }

    // Set general variables
    $png_jpg_validator = 'required|image|mimes:jpeg,png,jpg|max: ' . $MAX_SIZE;
    $heic_validator = 'required|mimes:heic|max: ' . $MAX_SIZE;

    $ext = $image->extension();
    $imageName = uniqid($FILE_NAME, true) . '.' . $ext;

    // Validators
    $validator = Validator::make($request->all(), [
      $IMAGE_ID => $png_jpg_validator,
    ]);
    $validator2 = Validator::make($request->all(), [
      $IMAGE_ID => $heic_validator,
    ]);

    // Check Valiadators
    if (!$validator->fails()) {
      // JPG & PNG
      $path = self::uploadFileToTempPath($image, $imageName, $TEMP_PATH);
      $path = self::handlePngAndJpg($ext, $path, $QUALITY);
      $reponse_array[0] = $path;
    } else {
      if (!$validator2->fails()) {
        // HEIC
        $path = self::uploadFileToTempPath($image, $imageName, $TEMP_PATH);
        self::handlePngAndJpg($path, $QUALITY, $TEMP_PATH);
      } else {
        // ERROR
        $reponse_array[0] = "error";
      }
    }
    // RETURN RESPONSE ARRAY
    echo json_encode($reponse_array);
  }

  public static function deleteImage()
  {
    // DECLARE RESPONSE ARRAY
    $reponse_array = array();

    $profile_picture_path = ProfilePicture::where('user_id', auth()->user()->id)->first()->path;
    if (!str_contains($profile_picture_path, 'profile_picture_default/')) {
      ProfilePicture::where('user_id', auth()->user()->id)->update([
        'path' => '/images/profile_picture_default/default.png',
      ]);
      unlink(public_path($profile_picture_path));
      $response_array[0] = "delete success";
    } else {
      $response_array[0] = "profile picture already deleted";
    }

    ProfilePicture::where('user_id', auth()->user()->id)->update([
      'zoom' => '100%',
      'pos_x' => '0',
      'pos_y' => '0',
      'rot' => 'rotate0'
    ]);

    // RETURN RESPONSE ARRAY
    echo json_encode($reponse_array);
  }

  public static function deleteOldTemp($temp_path, $mode)
  {
    $temp_path = parse_url($temp_path, PHP_URL_PATH);
    if (file_exists(public_path($temp_path))) {
      switch ($mode) {
        case 'profile_picture':
          $profilePicPath = ProfilePicture::where('user_id', auth()->user()->id)->first()->path;
          if ($profilePicPath != $temp_path) {
            unlink(public_path($temp_path));
          }
          break;
        case 'post_image':
          unlink(public_path($temp_path));
          break;
        default:
          break;
      }
    }
  }

  static function handleHeic($path, $QUALITY, $TEMP_PATH)
  {
    ConvertApi::setApiSecret('2hqmlNj9QsR1VqKV');
    $result = ConvertApi::convert('jpg', ['File' => public_path($path),], 'heic');
    $result->saveFiles(public_path($TEMP_PATH));
    unlink(public_path($path));
    $path = str_replace(".heic", ".jpg", $path);
    self::storeJpg(public_path($path), $QUALITY);
  }

  static function handlePngAndJpg($ext, $path, $QUALITY)
  {
    $filePath = public_path($path);
    if ($ext == "png") {
      $path = self::convertPngtoJpg($filePath, $path, $QUALITY);
    }
    if ($ext == "jpg" || $ext == "jpeg") {
      self::storeJpg($filePath, $QUALITY);
    }
    return $path;
  }

  static function uploadFileToTempPath($image, $imageName, $TEMP_PATH)
  {
    $image->move(public_path($TEMP_PATH), $imageName);
    $path = $TEMP_PATH . '/' . $imageName;
    return $path;
  }

  static function convertPngtoJpg($filePath, $path, $QUALITY)
  {
    $image = imagecreatefrompng($filePath);
    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
    imagealphablending($bg, TRUE);
    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    imagedestroy($image);
    $new_path = str_replace(".png", "", $path) . ".jpg";
    imagejpeg($bg, public_path($new_path), $QUALITY);
    unlink($filePath);
    imagedestroy($bg);
    return $new_path;
  }

  static function storeJpg($filePath, $QUALITY)
  {
    $image = imagecreatefromjpeg($filePath);
    $exif = exif_read_data($filePath);
    if (!empty($exif['Orientation'])) {
      switch ($exif['Orientation']) {
        case 8:
          $image = imagerotate($image, 90, 0);
          break;
        case 3:
          $image = imagerotate($image, 180, 0);
          break;
        case 6:
          $image = imagerotate($image, -90, 0);
          break;
      }
    }
    imagejpeg($image, $filePath, $QUALITY);
  }
}
