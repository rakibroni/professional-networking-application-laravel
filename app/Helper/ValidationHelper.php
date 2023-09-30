<?php

namespace App\Helper;

use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helper\Helper;

class ValidationHelper
{
  public static function test()
  {
    return "test";
  }


  public static function validateLocation($location_city, $location_state)
  {
    $response_array = array();
    $response_array[1] = false;

    $valid_location = DB::table('staedte')->where([
      'ort' => $location_city,
      'bundesland' => $location_state
    ])->get()->count();
    if ($valid_location == 0) {
      $response_array[0] = "Bitte wähle eine Stadt aus der Liste.";
      $response_array[1] = true;
    } else {
      $response_array[0] = ".";
    }
    return $response_array;
  }


  public static function validateStrings($request, $data_strings, $data_names, $rules, $error)
  {
    $error = $error;
    $response_array = array();

    $validation_response_array = array();

    for ($i = 0; $i < sizeof($data_strings); $i++) {
      $validator = self::validateString($request, $data_strings[$i], $data_names[$i], $rules[$i]);
      $validation_response_array[$i] = $validator[0];


      if ($error == false) {
        $error = $validator[1];
      }
    }

    $response_array[0] = $validation_response_array;
    $response_array[1] = $error;

    return $response_array;
  }


  public static function validateEndDates($request, $data_strings, $data_names, $rules, $error, $bool)
  {
    $error = $error;
    $response_array = array();

    $validation_response_array = array();

    for ($i = 0; $i < sizeof($data_strings); $i++) {

      if ($bool == "false") {
        $validator = self::validateString($request, $data_strings[$i], $data_names[$i], $rules[$i]);
        $validation_response_array[$i] = $validator[0];


        if ($error == false) {
          $error = $validator[1];
        }
      }
      if ($bool == "true") {
        $validation_response_array[$i] = '.';
      }
    }

    $response_array[0] = $validation_response_array;
    $response_array[1] = $error;

    return $response_array;
  }



  public static function validateString($request, $data_string, $data_name, $rules)
  {
    $response_array = array();
    $response_array[1] = false;


    $data_stringValidator = Validator::make($request->only($data_name), [
      $data_name => $rules,
    ]);
    if ($data_stringValidator->fails()) {
      $response_array[1] = true;
      $response_array[0] = $data_stringValidator->errors()->all();
    } else {
      $data_string = strip_tags($data_string);
      $data_string = HELPER::removeJS($data_string);
      $response_array[0] = ".";
    }

    return $response_array;
  }
}
