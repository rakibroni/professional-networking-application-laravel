<?php
use App\Models\User;
$user = User::where(['email' => $_GET['email'], 'verification_hash' => $_GET['hash']])->get();
if ($user->count() == 0) {
header('Location: ' . route('login'));
exit();
} else {
$user = $user->first();
$firstname = $user->firstname;
// IF AUTH -> IF START -> start IF VERIFIED -> FEED

if (auth()->user()) {
$user = auth()->user();
if ($user->status == 'start') {
header('Location: ' . route('start'));
exit();
}
if ($user->status == 'verified') {
header('Location: ' . '/feed');
exit();
}
}

$test = $user->status;

// START

// IF AUTH -> IF START -> START -> if VERIFIED ->FEED
// IF UNAUTH -> LOGIMN

// check if verified or notq

// IF UNAUTH -> LOGIn
if ($user->status == 'start') {
header('Location: ' . '/start?username=' . $user->username);
exit();
}
}

$positionArray = Helper::getPositionArray();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="">
  <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous" defer>
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700');


    ::placeholder {
      /* Chrome, Firefox, Opera, Safari 10.1+ */
      color: #BCBBBB !important;
      opacity: 1;
      /* Firefox */
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: #BCBBBB !important;
    }

    ::-ms-input-placeholder {
      /* Microsoft Edge */
      color: #BCBBBB !important;
    }

    ::-webkit-calendar-picker-indicator {
      filter: invert(70%);
    }

    .yearCol:hover {

      color: white;
      background-color: #ff9721;
      cursor: pointer;
      box-shadow: 0px 0px 3px #ff9721 !important;
    }

    .yearCol:active {

      color: white;
      background-color: #ff9721;
      cursor: pointer;
      box-shadow: 0 0 5px #ff9721 !important;

    }

    .yearColSelected {
      color: white;
      background-color: #ff9721;
      cursor: pointer;
    }

    .dropdown-toggle {
      position: var(--bs-gutter-x);
    }

    .dropdown-toggle::after {
      position: absolute;
      right: 15px;
      bottom: 45%;
    }

    .row {
      --bs-gutter-x: 0 !important;
      --bs-gutter-y: 0 !important;
      margin: auto !important;
      max-width: 1128px;
    }

    .row2 {
      --bs-gutter-x: 0 !important;
      --bs-gutter-y: 0 !important;
      margin: auto !important;
      width: 400px;
    }

    @media (max-width: 576px) {
      .row2 {
        --bs-gutter-x: 0 !important;
        --bs-gutter-y: 0 !important;
        margin: auto !important;
        width: 100%;
      }

      ._br {
        border-radius: 0px !important;
        border: 1px solid #D3D3D3;
      }
    }

    ._br {
      border-radius: 5px;
      border: 1px solid #D3D3D3;
    }

    .btn {
      background-color: #FF9721;
      border: 1px solid #FF9721;
      color: #FFFFFF;
    }

    .Dropdownbtn {
      border: 1px solid #BCBBBB;
      color: #BCBBBB;
      background-color: #FFFFFF;
      font-size: 15px !important;
      border-radius: .25rem;
      line-height: 1.5;
    }


    .form-control {
      font-size: 15px !important;
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #636466 !important;
      background-color: #FFFFFF;
      background-clip: padding-box;
      border: 1px solid #BCBBBB !important;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;

    }

    .bg {
      background-color: #FAFAFA;
    }

    .container {
      max-width: 1128px;
    }

    @media (max-width: 576px) {

      .Title2 {
        font-weight: 500;
        font-size: 27px !important;
        line-height: 25px;
      }

      .Title3 {
        font-size: 16px !important;
        line-height: 21px;
        color: #7F7F7F;
      }
    }

    .Title2 {
      font-weight: 500;
      font-size: 30px;
      line-height: 25px;
    }

    .Title3 {
      font-size: 18px;
      line-height: 20px;
      color: #7F7F7F;
    }

    .Textbox {
      height: 91px;
    }

    @media (max-width: 768px) {
      .Textbox {
        height: auto;
      }
    }

    .InPutTitle {
      font-size: 15px;
      line-height: 20px;
      color: #FF9721;
      font-weight: 500;
    }

    .error-text {
      font-size: 12px !important;
    }

    .lds-spinner {
      color: white;
      display: inline-block;
      position: relative;
      width: 12px;
      height: 17px;
    }

    .lds-spinner div {
      transform-origin: 12px 12px;
      animation: lds-spinner 0.8s linear infinite;
    }

    .lds-spinner div:after {
      content: " ";
      display: block;
      position: absolute;
      top: 1px;
      left: 11px;
      width: 2px;
      height: 6px;
      border-radius: 20%;
      background: white;
    }

    .lds-spinner div:nth-child(1) {
      transform: rotate(0deg);
      animation-delay: -0.8s;
    }

    .lds-spinner div:nth-child(2) {
      transform: rotate(45deg);
      animation-delay: -0.7s;
    }

    .lds-spinner div:nth-child(3) {
      transform: rotate(90deg);
      animation-delay: -0.6s;
    }

    .lds-spinner div:nth-child(4) {
      transform: rotate(135deg);
      animation-delay: -0.5s;
    }

    .lds-spinner div:nth-child(5) {
      transform: rotate(180deg);
      animation-delay: -0.4s;
    }

    .lds-spinner div:nth-child(6) {
      transform: rotate(225deg);
      animation-delay: -0.3s;
    }

    .lds-spinner div:nth-child(7) {
      transform: rotate(270deg);
      animation-delay: -0.2s;
    }

    .lds-spinner div:nth-child(8) {
      transform: rotate(315deg);
      animation-delay: -0.1s;
    }

    .lds-spinner div:nth-child(9) {
      transform: rotate(360deg);
      animation-delay: 0s;
    }

    @keyframes lds-spinner {
      0% {
        opacity: 1;
      }

      100% {
        opacity: 0;
      }
    }

  </style>

</head>

<body class="bg">


  <!-- NAVBAR -->
  <nav id="navbar" class="fixed-top navbar navbar-expand-xl navbar-light trans-navigation"
    style="background-color: #23180C !important">
    <div class="container">

      <a onclick="location.href='{{ route('home') }}'" class="mx-1 mx-md-2 mx-lg-0 navbar-brand" href="#">
        <img src="{{ asset('images/logo_white_beta.svg') }}" alt="" height="40">
      </a>

    </div>
  </nav>


  <div style="margin-top: 80px">
    <div class="row my-3 mx-xl-3 mx-0 px-2 px-md-0 m-md-2 m-0">

      <!-- Titles -->
      <div class="col-12 Title2 text-center mb-4 mt-3">Willkommen in der Community, {{ $firstname }}!</div>
      <div class="col-12 Title3 text-center mb-3 mb-md-4">Du hast es fast geschafft, bitte gib uns noch ein Paar Infos
        über dich, damit wir wissen, wer du bist!</div>
    </div>

    <div class="row my-3 mx-xl-3 mx-0 m-md-2 m-0">
      <div class="col-12">
        <div class="row">


          <!-- Box 2 - Vernetze dich -->
          <div class="row2 align-items-end">
            <div class="col px-sm-4 px-2 py-4 _br bg-white mt-2">
              <div class="row">
                <div class="col-6 pe-1 mb-4">
                  <div class="InPutTitle mb-2">Geschlecht</div>
                  <div class="dropdown">
                    <select id="gender" class="form-select form-control " aria-label="Default select example">
                      <option value="Weiblich" selected>Weiblich</option>
                      <option value="Männlich">Männlich</option>
                      <option value="Divers">Divers</option>
                      <option value="Keine Angabe">Keine Angabe</option>
                    </select>
                  </div>
                </div>
                <div class="col-6 ps-1">
                  <div class="InPutTitle mb-2">Geburtsdatum</div>
                  <input type="date" class="form-control" style="color: #BCBBBB !important; font-size: 15px !important;"
                    id="birthdate" name="trip-start" value="" min="1940-01-01" max="2021-01-01">
                  <div id="birthdate_error" class="invisible text-danger error-text">Hier Firstname Error</div>
                </div>
              </div>
              <div class="col-12 mb-3">
                <div class="InPutTitle mb-2">Wohnort</div>
                <div class="input-group mb-2">
                  <?php Helper::showDropdown('city-search', 'search-dropdown-city', 'z.B. Bielefeld',
                  'filterTest(this.id, `search-dropdown-city`)', '', [''], ['form-control w-100', 'dropdown-menu w-100',
                  'bg-danger'], ['', '', 'bg-danger'], ''); ?>
                  <div id="location_error" class="invisible text-danger error-text">Hier Firstname Error</div>
                </div>

              </div>


              <div class="col-12 mb-3">

                <div class="InPutTitle mb-2">Arbeitserfahrung in Jahren</div>
                <div class="row Dropdownbtn">
                  <?php 
                  Helper::printYearCols(); ?>
                </div>
                <div class="invisible" style="height: 10px">.</div>
              </div>

              <!-- Dropdown für Positionen -->
              <div class="col-12">
                <div class="InPutTitle mb-2">Position</div>
                <div class="input-group mb-2">
                  <?php Helper::showDropdown(
                  'position-search',
                  'search-dropdown-position',
                  'z.B. Exam.Altenpfleger*in',
                  'filterFunction1(`position-search`, `search-dropdown-position`)',
                  '',
                  $positionArray,
                  ['form-control w-100', 'dropdown-menu w-100', 'dropdown-item pointer-on-hover'],
                  [
                  '',
                  'max-height:
                  300px; overflow-x: hidden',
                  'bg-danger',
                  ],
                  '$(`#search-dropdown-position`).addClass(`d-block`)',
                  ); ?>
                  <div id="position_error" class="invisible text-danger error-text">Hier Firstname Error</div>
                </div>
              </div>

              <div class="col-12 text-center align-text-bottom mt-3"><button type="button"
                  onclick="finishRegistration()" style="width: 190px; color:white !important" class="btn mt-1"><span
                    id="btn-text">Curawork entdecken</span>
                  <div id="spinner" style="width:27px" class="d-none lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                  </div>
                </button></div>
            </div>
          </div>
        </div><br>

      </div><br>
    </div>
  </div>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>

  <script>
    function setYear(id) {
      var cols = document.getElementsByClassName("yearCol");
      for (var i = 0; i < 6; i++) {
        cols[i].classList.remove("yearColSelected")
      }
      document.getElementById(id).classList.add("yearColSelected")
    }

  </script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>


<script>
  if (performance.navigation.type == 2) {
    window.location = "/start?username=" + '{{ $user->username }}';
  }


  var gender = $('#gender').val();
  $('#gender').change(function() {
    gender = $(this).val();
  })


  function filterFunction1(id, dropdownID) {

    var input, filter, ul, li, a, i;
    input = document.getElementById(id);


    filter = input.value.toUpperCase();
    div = document.getElementById(dropdownID);
    a = div.getElementsByTagName("div");

    if (document.getElementById(id).value.length < 1) {
      $('#' + dropdownID).removeClass("d-block");
    } else {
      $('#' + dropdownID).addClass("d-block");
      var hiddenCount = 0;
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          hiddenCount++;
          a[i].style.display = "none";
        }
      }
      if (hiddenCount == a.length) {
        $('#' + dropdownID).removeClass("d-block");
      }
    }
  }

  function filterTest(inputID, dropdownID) {
    document.getElementById(dropdownID).classList.remove("d-none");
    var inputValue = $('#' + inputID).val();
    var form = new FormData();
    form.append('inputValue', inputValue);
    form.append('inputID', inputID);
    form.append('dropdownID', dropdownID);
    // str, id, inputID
    //var str = "j";
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({async: true,
      url: '/search_city',
      method: 'post',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function() {
        //
      },

      success: function(response) {

        $('#search-dropdown-city').addClass("d-block");
        $('#search-dropdown-city').html(response);

        //var branchid = $('#city-search').val();
      }
    })
  }

  function fillInput(id, inputID, dropdownID) {
    var text = document.getElementById(id).innerHTML;
    document.getElementById(inputID).value = text;
    document.getElementById(dropdownID).classList.remove("d-block");
  }


  function finishRegistration() {


    $('#spinner').removeClass("d-none");
    $('#btn-text').addClass("d-none");

    const url = window.location.toString();
    var hash = url.split('hash=')[1];

    var email = url.split('email=')[1];
    email = email.replace(hash, "");
    email = email.replace("&hash=", "");






    var birthdate = $('#birthdate').val();
    const location = $('#city-search').val();
    var location_city = location.split(',')[0];
    var location_state = location.split(', ')[1];





    var years_of_experience = $(".yearColSelected").html()
    var position = $('#position-search').val();


    var form = new FormData();
    form.append('gender', gender);
    form.append('birthdate', birthdate);
    //form.append('location_city', location_city);
    form.append('years_of_experience', years_of_experience);
    form.append('position', position);
    form.append('verification_hash', hash);
    form.append('email', email);
    form.append('location_city', location_city);
    form.append('location_state', location_state);




    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({async: true,
      url: '/finish_registration',
      method: 'post',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function() {

      },

      success: function(response) {

        /*$('*[id*=' + 'register_btn' + ']:visible').each(function() {
          $('#' + this.id).trigger('blur');
        });*/

        clearErrorMsgs();
        if (response.length > 0) {
          handleError(response[0], "birthdate_error");
          handleError(response[1], "location_error");
          handleError(response[2], "position_error");
          $('#spinner').addClass("d-none");
          $('#btn-text').removeClass("d-none");
        } else {

          var username = '{{ $user->username }}';
          window.location.href = "/start?username=" + username;
        }
      }
    })
  }


  function clearErrorMsgs() {
    $('*[id*=' + 'error' + ']:visible').each(function() {
      $('#' + this.id).addClass("invisible");
    });
  }

  function handleError(errorMsg, id) {
    if (errorMsg != "undefined") {
      if (errorMsg != ".") {
        switch (errorMsg) {
          case 'first_name_error':

            break;
        }
        $('#' + id).removeClass("invisible");
        $('#' + id).html(formatErrorMsg(errorMsg));
      }



    }
  }

  function formatErrorMsg(errorMsg) {
    errorMsg = errorMsg.toString();
    errorMsg = errorMsg.replaceAll(".,", ". ");

    return errorMsg;
  }

</script>


</html>
