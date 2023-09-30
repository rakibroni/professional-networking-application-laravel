<?php

namespace App\Helper;

use App\Models\User;
use App\Models\UserFollowers;
use App\Models\ProfilePicture;
use Illuminate\Support\Facades\View;

class Helper
{
  public static function connectButton($user)
  {

    $viewerOwnsProfile = false;
    $connectBtnStyle = '';
    $connectBtnText = 'Vernetzen';
    $connectBtnSrc = '/images/VernetzenIcon.svg';
    if ($user == auth()->user()) {
      $connectBtnStyle = '';
      $connectBtnText = 'Vernetzen';
      $connectBtnSrc = '/images/VernetzenIcon.svg';
      $viewerOwnsProfile = true;
    } else {
      $pending = UserFollowers::where(['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'open'])
        ->get()
        ->count();
      $connected = '';

      //echo $status;
      $isFollowingUSerQuery = ['user_id' => $user->id, 'follower_id' => auth()->user()->id, 'request' => 'done'];
      $userIsFollowingQuery = ['follower_id' => $user->id, 'user_id' => auth()->user()->id, 'request' => 'done'];

      $isFollower = UserFollowers::where($isFollowingUSerQuery)
        ->get()
        ->count();
      if ($isFollower == 1) {
        $connected = UserFollowers::where($userIsFollowingQuery)
          ->get()
          ->count();
      }

      if ($pending == 1) {
        $connectBtnText = 'Ausstehend';
        $connectBtnSrc = '/images/VernetzenIcon.svg';
        $connectBtnStyle = 'background-color: #ebebeb !important;color:#a4a4a4;cursor:no-drop';
      }

      if ($connected == 1) {
        $connectBtnText = 'Vernetzt';
        $connectBtnSrc = '/images/check.svg';
        $connectBtnStyle = '';
      }

      $userFollowerRelation = ['user_id' => $user->id, 'follower_id' => auth()->user()->id];
      $userFollowerUser = ['follower_id' => $user->id, 'user_id' => auth()->user()->id];
      $requestExists = UserFollowers::where($userFollowerRelation)->count();
      $requestExistsFromFollower = UserFollowers::where($userFollowerUser)->count();

      if ($requestExistsFromFollower == 1 && $connected == false) {
        $connectBtnText = 'Akzeptieren';
        $connectBtnSrc = '';
        $connectBtnStyle = '';
      }
    }

    $returnValues = array(
      $connectBtnStyle,
      $connectBtnText,
      $connectBtnSrc
    );
    return $returnValues;
  }





  public static function numberAbbreviation($number)
  {
    if ($number != 0) {
      $abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");

      foreach ($abbrevs as $exponent => $abbrev) {
        if ($number >= pow(10, $exponent)) {
          $display_num = $number / pow(10, $exponent);
          $decimals = ($exponent >= 3 && round($display_num) < 100) ? 1 : 0;
          return number_format($display_num, $decimals) . $abbrev;
        }
      }
    } else {
      return $number;
    }
  }

  public static function viewerOwnsProfile($user)
  {
    $viewerOwnsProfile = false;
    if ($user->id == auth()->user()->id) {
      $viewerOwnsProfile = true;
    }
    return $viewerOwnsProfile;
  }


  public static function anotherRandomIDGenerator()
  {
    // Copyright: http://snippets.dzone.com/posts/show/3123
    $len = 8;
    $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz';
    $max = strlen($base) - 1;
    $activatecode = '';
    mt_srand((float)microtime() * 1000000);
    while (strlen($activatecode) < $len + 1)
      $activatecode .= $base[mt_rand(0, $max)];
    return $activatecode;
  }

  public static function yearSelect($id)
  {
    $select = <<<HTML
<select
id=$id class="form-control-date mt-1">
<option value="">Monat</option>
<option value="1">Januar
</option>
<option value="2">Februar
</option>
<option value="3">März</option>
<option value="4">April</option>
<option value="5">Mai</option>
<option value="6">Juni</option>
<option value="7">Juli</option>
<option value="8">August
</option>
<option value="9">September
</option>
<option value="10">Oktober
</option>
<option value="11">November
</option>
<option value="12">Dezember
</option>
</select>
HTML;
    return $select;
  }

  public static function monthSelect($id)
  {
    $select = <<<HTML
<select id=$id class="form-control-date mt-1">
<option value="">Jahr</option>
<option value="2021">2021
</option>
<option value="2020">2020
</option>
<option value="2019">2019
</option>
<option value="2018">2018
</option>
<option value="2017">2017
</option>
<option value="2016">2016
</option>
<option value="2015">2015
</option>
<option value="2014">2014
</option>
<option value="2013">2013
</option>
<option value="2012">2012
</option>
<option value="2011">2011
</option>
<option value="2010">2010
</option>
<option value="2009">2009
</option>
<option value="2008">2008
</option>
<option value="2007">2007
</option>
<option value="2006">2006
</option>
<option value="2005">2005
</option>
<option value="2004">2004
</option>
<option value="2003">2003
</option>
<option value="2002">2002
</option>
<option value="2001">2001
</option>
<option value="2000">2000
</option>
<option value="1999">1999
</option>
<option value="1998">1998
</option>
<option value="1997">1997
</option>
<option value="1996">1996
</option>
<option value="1995">1995
</option>
<option value="1994">1994
</option>
<option value="1993">1993
</option>
<option value="1992">1992
</option>
<option value="1991">1991
</option>
<option value="1990">1990
</option>
<option value="1989">1989
</option>
<option value="1988">1988
</option>
<option value="1987">1987
</option>
<option value="1986">1986
</option>
<option value="1985">1985
</option>
<option value="1984">1984
</option>
<option value="1983">1983
</option>
<option value="1982">1982
</option>
<option value="1981">1981
</option>
<option value="1980">1980
</option>
<option value="1979">1979
</option>
<option value="1978">1978
</option>
<option value="1977">1977
</option>
<option value="1976">1976
</option>
<option value="1975">1975
</option>
<option value="1974">1974
</option>
<option value="1973">1973
</option>
<option value="1972">1972
</option>
<option value="1971">1971
</option>
<option value="1970">1970
</option>
<option value="1969">1969
</option>
<option value="1968">1968
</option>
<option value="1967">1967
</option>
<option value="1966">1966
</option>
<option value="1965">1965
</option>
<option value="1964">1964
</option>
<option value="1963">1963
</option>
<option value="1962">1962
</option>
</select>
HTML;
    return $select;
  }

  public static function intToMonth($int)
  {
    $length = strlen($int);
    if ($length == 1) {
      $int = '0' . $int;
    }
    return $int;
  }


  public static function printYearCol($content)
  {
    $id = 'year' . $content;
    $yearCol = <<<STRING
                 <div id=$id onClick="setYear(this.id)" style="height: 36px"
                  class="col-sm-2 col-4 text-center py-2 yearCol unselectable h7">$content</div>
              STRING;
    if ($content === '0-1') {
      $yearCol = <<<STRING
              <div id=$id onClick="setYear(this.id)" style="height: 36px"
                class="yearColSelected col-sm-2 col-4 text-center py-2 yearCol unselectable h7">$content
            </div>
            STRING;
    }
    echo $yearCol;
  }

  public static function printYearCols()
  {
    $cols = self::getYearsOfExperienceOptions();
    for ($i = 0; $i < 6; $i++) {
      if ($i < 6) {
        Helper::printYearCol($cols[$i]);
      }
    }
  }

  static function removeJS($str)
  {
    $blackListarray = ['(', ')', "'", '"', ';'];
    for ($i = 0; $i < sizeof($blackListarray); $i++) {
      $str = str_replace($blackListarray[$i], "", $str);
    }
    return $str;
  }
  public static function printTeamIMG($type, $firstname, $lastname, $title)
  {
    $firstname1 = mb_strtolower($firstname, 'UTF-8');
    if ($type == "desktop") {
      $img = <<<HTML
      <div class="team-img position-relative">
          <div class="team-img-info center">
            <div class="row mt-5 mx-3">
              <div class="text-left col-12 h5 font-weight-bold">
                $firstname<br>$lastname
              </div>
              <div class="col-12 h6 text-secondary font-weight-bold">
              $title
              </div>
            </div>
          </div>
          <img src="/images/$firstname1.png" alt="" style="height:100%">
        </div>
      HTML;
    } else {
      if ($type == "tablet") {
        $img = '<div class="col-6 ">';
        $img .= <<<HTML
        <div class="position-relative">
            <div class="team-img-info center">
              <div class="row mt-5 mx-3">
                <div class="text-left col-12  h2  font-weight-bold">
                  $firstname<br>$lastname
                </div>
                <div class="col-12 h2 text-secondary font-weight-bold">
                  $title
                </div>
              </div>
            </div>
            <img src="/images/$firstname1.png" alt="" class="img-fluid" style="width: 100%">
          </div>
        HTML;
        $img .= '</div>';
      }
      if ($type == "mobile") {
        $img = '<div class="col-12 mt-3">';
        $img .= <<<HTML
        <div class="position-relative">
            <div class="team-img-info center">
              <div class="row mt-5 mx-3">
                <div class="text-left col-12  h1  font-weight-bold">
                  $firstname<br>$lastname
                </div>
                <div class="col-12 h1 text-secondary font-weight-bold">
                  $title
                </div>
              </div>
            </div>
            <img src="/images/$firstname1.png" alt="" class="img-fluid" style="width: 100%">
          </div>
        HTML;
        $img .= '</div>';
      }
    }
    echo $img;
  }
  public static function showDropdown($id, $dropdownID, $placeholder, $filterfunction, $inputValue, $dropdownContentArray, $cssClassesArray, $cssStylesArray, $dropDownFunction)
  {
    $input = <<<HTML
<div style="width: 100%" class="" ><input placeholder="$placeholder" value="$inputValue" onkeyup="$filterfunction"
onclick="$dropDownFunction" autofill="none" autocomplete="off" autocomplete="none" style="$cssStylesArray[0]" class="$cssClassesArray[0]"
type="text" id='$id'>
HTML;
    echo $input;
    $contentBox = <<<HTML
<div style="; $cssStylesArray[1]" id="$dropdownID" class="$cssClassesArray[1]">
HTML;
    echo $contentBox;
    for ($i = 0; $i < sizeof($dropdownContentArray); $i++) {
      $item = <<<HTML
  <div style="$cssStylesArray[2]" onclick="fillInput(this.id, '$id', '$dropdownID')" id="$id-$i" onclick="fillInput(this.id)" class="$cssClassesArray[2]">$dropdownContentArray[$i]</div>
HTML;
      echo $item;
    }
    echo '</div>
</div>';
  }

  public static function skillSelector($id, $dropdownID, $placeholder, $filterfunction, $inputValue, $dropdownContentArray, $cssClassesArray, $cssStylesArray, $dropDownFunction)
  {
    $input = <<<HTML
<div style="width: 100%" class="" ><input placeholder="$placeholder" value="$inputValue" onkeyup="$filterfunction"
onclick="$dropDownFunction" autofill="none" autocomplete="off" style="$cssStylesArray[0]" class="$cssClassesArray[0]"
type="text" id='$id'>
HTML;
    echo $input;
    $contentBox = <<<HTML
<div style="; $cssStylesArray[1]" id="$dropdownID" class="$cssClassesArray[1]">
HTML;
    echo $contentBox;
    for ($i = 0; $i < sizeof($dropdownContentArray); $i++) {
      $item = <<<HTML
  <div style="$cssStylesArray[2]" onclick="selectSkill(this.id, '$id', '$dropdownID')" id="$id-$i" onclick="fillInput(this.id)" class="$cssClassesArray[2]">$dropdownContentArray[$i]</div>
HTML;
      echo $item;
    }
    echo '</div>
</div>';
  }

  public static function searchDropdown($id, $dropdownID, $placeholder, $filterfunction, $inputValue, $dropdownContentArray, $cssClassesArray, $cssStylesArray, $dropDownFunction)
  {
    $input = <<<HTML
<div style="width: 100%" class="search-parent" ><input placeholder="$placeholder" value="$inputValue" onkeyup="$filterfunction"
onclick="$dropDownFunction" autofill="none" autocomplete="off" style="$cssStylesArray[0]" class="$cssClassesArray[0]"
type="text" id='$id'>
HTML;
    echo $input;
    $contentBox = <<<HTML
<div style="; $cssStylesArray[1]" id="$dropdownID" class="$cssClassesArray[1]">
HTML;
    echo $contentBox;
    for ($i = 0; $i < sizeof($dropdownContentArray); $i++) {
      $item = <<<HTML
  <div style="$cssStylesArray[2]" onclick="fillInput(this.id, '$id', '$dropdownID')" id="$id-$i" onclick="fillInput(this.id)" class="$cssClassesArray[2]">$dropdownContentArray[$i]</div>
HTML;
      echo $item;
    }
    echo '</div>
</div>';
  }



  public static function profilePicture($id, $size, $user, $extraClasses, $extraStyle)
  {
    $profile_picture = $user->profilePicture;
    $rotateClass = $profile_picture['rot'];
    $pos_y = $profile_picture['pos_y'];
    $pos_x = $profile_picture['pos_x'];
    $zoom = $profile_picture['zoom'];
    $path = $profile_picture['path'];



    $sizeFloat = str_replace("px", "", $size);
    $pos_y = ((float)$pos_y * (float)$sizeFloat) . 'px';
    $pos_x = ((float)$pos_x * (float)$sizeFloat) . 'px';


    $onclick = <<<STRING
    onclick="loadUserProfileCard('$user->username')"
    STRING;

    if (str_contains($id, '_with_badge') || $id == 'profile-pic-public' || $id == 'post_profile_pic' || $id == 'navbar_profile_pic' | $id == 'navbar_profile_pic1' | $id == 'profile-pic' | $id == 'profile-pic1' | $id == 'profile-pic2' | $id == 'temp-profile-pic') {
      $onclick = <<<STRING
      onclick=""
      STRING;
    }

    $badge = '';

    if ($user->status == 'team' && ($id == 'profile-pic' | $id == 'profile-pic1' | $id == 'profile-pic2')) {
      $badge = View::make("components.badge")->with('user', $user)->render();
    }


    $profile_picture = <<<HTML
    <div $onclick id="$id" class="pointer-on-hover object-fit d-inline-block align-top br-50 $extraClasses rotate-origin $rotateClass" style="background-size: $zoom; background-position-x: $pos_x; background-position-y: $pos_y; background-image: url($path); height: $size !important; width: $size !important; $extraStyle">
    {$badge}</div>
    HTML;
    echo $profile_picture;
  }

  public static function returnProfilePicture($id, $size, $user, $profile_picture, $extraClasses, $extraStyle)
  {

    $onclick = <<<STRING
    onclick="loadUserProfileCard('$user->username')"
    STRING;


    if ($profile_picture != null) {
      $rotateClass = $profile_picture->rot;
      $pos_y = $profile_picture->pos_y;
      $pos_x = $profile_picture->pos_x;
      $zoom = $profile_picture->zoom;
      $path = $profile_picture->path;



      $sizeFloat = str_replace("px", "", $size);
      $pos_y = ((float)$pos_y * (float)$sizeFloat) . 'px';
      $pos_x = ((float)$pos_x * (float)$sizeFloat) . 'px';

      $profile_picture = <<<HTML
    <div $onclick id="$id" class="object-fit d-inline-block align-top br-50 $extraClasses rotate-origin $rotateClass" style="background-size: $zoom; background-position-x: $pos_x; background-position-y: $pos_y; background-image: url($path); height: $size; width: $size; $extraStyle"></div>
    HTML;
    } else {
      $profile_picture = <<<HTML
    <div $onclick id="$id" class="object-fit d-inline-block align-top br-50 rotate-origin " style="height: $size; width: $size;"></div>
    HTML;
    }
    return $profile_picture;
  }

  public static function getYearsOfExperienceOptions()
  {
    $array = ['0-1', '2-4', '5-6', '7-10', '11-14', '15+'];
    return $array;
  }

  public static function getSkillsArray()
  {
    $skillsArray = [
      'Cairful',
      'CareCloud',
      'Careplan',
      'Curasoft',
      'DAN',
      'Factis',
      'Heimbas',
      'MCC',
      'Medifox',
      'Microsoft Office',
      'NetWeaver',
      'Open Office',
      'Orbis',
      'Schriftliche Dokumentation',
      'SENSO',
      'Sinfonie',
      'Vivendi',
      'WHP',
    ];
    return $skillsArray;
  }

  public static function getTrainingArray()
  {
    $trainingArray = [
      "Intensivpflege und Anästhesie",
      "Praxisanleiter*in",
      "Wundmanagement",
      "Hygienefachkraft",
      "Geriatrie (Gerontopsychiatrie)",
      "Rehabilitation",
      "Stationsleitung",
      "Wohnbereichsleitung",
      "Schmerzmanagement",
      "Qualitätsmanagement",
      "Psychiatrie",
      "Pflegegutachter (MdK)",
      "Pflegedienstleitung (PDL)",
      "Pflegeberater*in",
      "Palliativpflege",
      "Häusliche Pflege",
      "Kultursensible Pflege",
      "Dialysefachkraft",
      "Case Manager*in",
      "Onkologie",
      "Außerklinische Intensivpflege",
      "Außerklinische Beatmung",
      "Kinästhetik",
      "Bobath – Therapeut*in",
      "Stillberatung",
      "pädiatrische Intensiv - Anästhesie",
    ];
    return $trainingArray;
  }


  public static function getLanguagesLevelArray()
  {
    $languagesLevelArray = [
      'Grundkenntnisse',
      'Gute Kenntnisse',
      'Sehr gute Kenntnisse',
      'Verhandlungssicher',
      'Muttersprache'
    ];
    return $languagesLevelArray;
  }

  public static function getLanguagesArray()
  {
    $languagesArray = [
      'Afrikaans',
      'Amharisch',
      'Arabisch',
      'Albanisch',
      'Armenisch',
      'Aserbaidschanisch',
      'Baskisch',
      'Bengalisch',
      'Birmanisch',
      'Bosnisch',
      'Bulgarisch',
      'Cebuano',
      'Chinesisch(traditionell)',
      'Chinesisch(vereinfacht)',
      'Dänisch',
      'Deutsch',
      'Englisch',
      'Esperanto',
      'Estnisch',
      'Filipino',
      'Finnisch',
      'Französisch',
      'Galizisch',
      'Georgisch',
      'Griechisch',
      'Gujarati',
      'Haiti-Kreolisch',
      'Haussa',
      'Hawaiisch',
      'Hebräisch',
      'Hindi',
      'Hmong',
      'Igbo',
      'Indonesisch',
      'Irisch',
      'Isländisch',
      'Italienisch',
      'Japanisch',
      'Javanisch',
      'Jiddisch',
      'Kannada',
      'Kasachisch',
      'Katalanisch',
      'Khmer',
      'Kirgisisch',
      'Koreanisch',
      'Korsisch',
      'Kroatisch',
      'Kurdisch',
      'Laotisch',
      'Latein',
      'Lettisch',
      'Litauisch',
      'Luxemburgisch',
      'Madagassisch',
      'Malaiisch',
      'Malayalam',
      'Maltesisch',
      'Maori',
      'Marathi',
      'Mazedonisch',
      'Mongolisch',
      'Nepalesisch',
      'Niederländisch',
      'Norwegisch',
      'Nyanja-Sprache',
      'Paschtu',
      'Persisch',
      'Polnisch',
      'Portugiesisch',
      'Punjabi',
      'Rumänisch',
      'Russisch',
      'Samoanisch',
      'Schottisches Gälisch',
      'Schwedisch',
      'Serbisch',
      'Shona',
      'Sindhi',
      'Singhalesisch',
      'Slowakisch',
      'Slowenisch',
      'Somali',
      'Spanisch',
      'Suaheli',
      'Sundanesisch',
      'Tadschikisch',
      'Tamil',
      'Telugu',
      'Thailändisch',
      'Tschechisch',
      'Türkisch',
      'Ukrainisch',
      'Ungarisch',
      'Urdu',
      'Usbekisch',
      'Vietnamesisch',
      'Walisisch',
      'Weißrussisch',
      'Westfriesisch',
      'Xhosa',
      'Yoruba',
      'Zulu',
    ];
    return $languagesArray;
  }


  public static function getPositionArray()
  {
    $positionArray = [
      'Alltagsbegleiter*in',
      'Altenpflegefachkraft',
      'Altenpflegehelfer*in',
      'Atemtherapeut*in',
      'Assistenz Einrichtungsleitung',
      'Assistenz Pflegedienstleitung',
      'ATA',
      'Ausbildung Altenpflegehelfer*in',
      'Ausbildung Altenpfleger*in',
      'Ausbildung Pflegefachfrau/mann',
      'Betreuungskraft/ Alltagsbegleiter*in',
      'Berufspädagog*in für Gesunsheitsberufe',
      'CTA',
      'Ergotherapeut*in',
      'Fachkraft - Pflegeassistenz',
      'Fachkraft Betreuung (Alltagsbegleiter*in)',
      'Fachkraft Onkologie und Palliativpflege',
      'Fachkraft Operations- und Endoskopiedienst',
      'Gerontopsychiatrische Fachkraft',
      'Gesundheits- und Kinderkrankenpfleger*in',
      'Gesundheits- und Krankenpflegeassistent*in',
      'Gesundheits- und Krankenpflegehelfer*in',
      'Gesundheits- und Krankenpfleger*in',
      'Gesundheitswissenschaftler*in',
      'Familienpfleger*in',
      'Hauswirtschaftler*in',
      'Hauswirtschaftsassistent*in',
      'Hebamme / Entbindungspfleger',
      'Heilerziehungspflegehelfer*in',
      'Heilerziehungspfleger*in',
      'Heilpraktiker*in',
      'Heimleitung/ Einrichtungsleitung',
      'Hygienebeauftragte/r',
      'Hygienefachkraft',
      'Kinderkrankenpfleger*in',
      'Leitung Tagespflege',
      'Verantwortliche Pflegefachkraft',
      'Lehrer*in für Pflegeberufe',
      'Logopäd*in',
      'Masseur*in und medizinische/r Bademeister*in',
      'MFA',
      'Mitarbeiter Beratung/ Vertrieb',
      'Mitarbeiter Bundesfreiwilligendienst (BFD)',
      'Mitarbeiter für den Sozial-Kulturellen Dienst',
      'MTA',
      'MTRA',
      'Notfallsanitäter*in/ Rettungsassistent*in',
      'OTS',
      'Pflegeberater*in',
      'Pflegedienstleitung',
      'Pflegedirektion',
      'Pflegefachfrau/mann',
      'Pflegepädagoge*in',
      'Pflegewirt*in Pflegemanager*in',
      'Pflegewissenschaftler*in',
      'Physiotherapeut*in',
      'Podolog*in',
      'Praxisanleiter*in',
      'PTA',
      'Qualitätsbeauftragte/r',
      'Qualitätsmanagement',
      'Rettungssanitäter*in',
      'Sanitäter*in',
      'Sanitätshelfer*in',
      'Sozialarbeiter*in',
      'Sozialassistent*in',
      'Sozialpädagoge*in',
      'Sportwissenschaftler*in',
      'Stationsleitung',
      'stellv. Heimleitung/ Einrichtungsleitung',
      'stellv. Pflegedienstleitung',
      'stellv. Pflegedirektion',
      'stellv. Stationsleitung',
      'stellv. Teamleiter*in',
      'stellv. Wohnbereichsleitung',
      'Study Nurse',
      'Teamleiter*in',
      'Verwaltungskraft',
      'Wohnbereichsleitung',
      'Wundmanager*in',
    ];
    return $positionArray;
  }
  public static function getInstitueArray()
  {
    $instituteArray = [
      'Alltagsbegleitung',
      'Altenpflegeeinrichtung',
      'Ambulanter Dienst',
      'Eingliederungshilfe',
      'Krankenhaus',
      'Psychatrie',
      'Rehaklinik',
      'Suchtklink',
      'Tagespflege',
      'WfbM',
      
    ];
    return $instituteArray;
  }
  public static function getContractTypeArray()
  {
    $contractTypeArray = [
      'Vollzeit',
      'Teilzeit',
      'Ausbildung',
      'Duales Studium',
      'Zeitarbeit',
      'Praktikum',
      'Freiwilliges Soziales Jahr',
      'Werkstudium',  
    ];
    return $contractTypeArray;
  }

  public static function reFormatStartDate($jobExperience)
  {
    $start_date = $jobExperience->start_date;
    $start_year = substr($start_date, 0, 4);
    $start_month = substr($start_date, 5, -3);
    $start_date = $start_month . '.' . $start_year;
    return $start_date;
  }

  public static function reFormatEndDate($jobExperience)
  {
    $end_date = $jobExperience->end_date;
    $end_year = substr($end_date, 0, 4);
    $end_month = substr($end_date, 5, -3);
    $end_date = $end_month . '.' . $end_year;

    if ($jobExperience->is_current_position == 'true' || $jobExperience->is_current_school == 'true') {
      $end_date = 'heute';
    }

    return $end_date;
  }
}
