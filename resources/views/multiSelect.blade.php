<!doctype html>
<html lang="en">

<head>
  <!-- META TAGS -->
  <meta http-equiv='cache-control' content='no-cache'>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- OTHER -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
  <title>Multi Select</title>

  <!-- ANIMATE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- BOOTSRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- JS -->
  <script src="{{ asset('js/multiSelect.js') }}?v={{ time() }}" defer></script>

  <!-- JQUERY  -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- JQUERY UI  -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <!-- Bootstrap Bundle with Popper -->
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:100,200,300,500,400,600,700');


  body {
    transition: none !important;
    font-family: 'Roboto' !important;
  }

  .pointer-on-hover:hover {
    cursor: pointer;
  }

  .delete-badge {
    position: absolute;
    top: -10px;
    float: right;
    left: calc(100% - 10px);
    height: 20px;
    width: 20px;
    background-image: url("/images/CloseModalIcon.svg");
    background-repeat: no-repeat;
    z-index: 40;
  }

  .example-box-style {
    height: 23px;
    background: #FFFFFF;
    border: 2px solid #3685D6;
    box-sizing: border-box;
    border-radius: 5px;
    color: #3685D6;
    font-weight: 500;
    font-size: 14px;
    line-height: 139.19%;
  }

  .input-box {
    width: 230.66px;
    height: 27px;
    left: 208px;
    top: 970px;

    /* Light grey */

    border: 0.7px solid #BCBBBB;
    box-sizing: border-box;
    border-radius: 4px;
  }

  .hide-overflow-text {
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
  }

</style>

{{-- Route::get('/multiSelect', function () {
    return view('multiSelect');
}); --}}


<body>
  <div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-12">
        <?php
        $uuid = '0';
        $id = 'input' . $uuid;
        $dropdownId = $id . '_dropdown';
        $placeholder = 'Weiterbildungen';
        $value = '';
        $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
        $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
        $cssStylesArray = ['width: 231px', 'width: 231px; max-height: 200px; overflow-x: hidden;', ''];
        $cssClassesArray = ['input-box form-control', 'dropdown-menu position-absolute', 'dropdown-item pointer-on-hover'];
        $dropdownContentArray = ['Intensivpflege und Anästhesie', 'Praxisanleiter*in', 'Wundmanagement', 'Hygienefachkraft', 'Geriatrie (Gerontopsychiatrie)', 'Rehabilitation', 'Stationsleitung', 'Wohnbereichsleitung', 'Schmerzmanagement', 'Qualitätsmanagement', 'Psychiatrie', 'Pflegegutachter (MdK)', 'Pflegedienstleitung (PDL)', 'Pflegeberater*in', 'Palliativpflege', 'Häusliche Pflege', 'Kultursensible Pflege', 'Dialysefachkraft', 'Case Manager*in', 'Onkologie', 'Außerklinische Intensivpflege', 'Außerklinische Beatmung', 'Kinästhetik', 'Bobath – Therapeut*in', 'Stillberatung', 'pädiatrische Intensiv - Anästhesie'];
        ?>
        <x-multi_select_input :id="$id" :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value"
          :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray" :cssClassesArray="$cssClassesArray"
          :dropdownContentArray="$dropdownContentArray" />

      </div>
      <div class="col-12">
        <?php
        $uuid = '1';
        $id = 'input' . $uuid;
        $dropdownId = $id . '_dropdown';
        $placeholder = 'Skills';
        $value = '';
        $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
        $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
        $cssStylesArray = ['width: 231px', 'width: 231px; max-height: 200px; overflow-x: hidden;', ''];
        $cssClassesArray = ['input-box form-control', 'dropdown-menu position-absolute', 'dropdown-item pointer-on-hover'];
        $dropdownContentArray = ['Cairful', 'CareCloud', 'Careplan', 'Curasoft', 'DAN', 'Factis', 'Heimbas', 'MCC', 'Medifox', 'Microsoft Office', 'NetWeaver', 'Open Office', 'Orbis', 'Schriftliche Dokumentation', 'SENSO', 'Sinfonie', 'Vivendi', 'WHP'];
        ?>
        <x-multi_select_input :id="$id" :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value"
          :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray" :cssClassesArray="$cssClassesArray"
          :dropdownContentArray="$dropdownContentArray" />
      </div>
      <div class="col-12">
        <?php
        
        $uuid = '2';
        $id = 'input' . $uuid;
        $category = 'languages';
        $dropdownId = $id . '_dropdown';
        $placeholder = 'Sprachen';
        $value = '';
        $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
        $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
        $cssStylesArray = ['width: 231px', 'width: 231px; max-height: 200px; overflow-x: hidden;', ''];
        $cssClassesArray = ['input-box form-control', 'dropdown-menu position-absolute', 'dropdown-item pointer-on-hover'];
        $dropdownContentArray = [
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
        ?>
        <x-multi_select_input :id="$id" :category="$category" :dropdownId="$dropdownId" :placeholder="$placeholder"
          :value="$value" :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray"
          :cssClassesArray="$cssClassesArray" :dropdownContentArray="$dropdownContentArray" />
      </div>
    </div>
  </div>
</body>

</html>
