<?php
use App\Models\User;
use App\Models\PasswordReset;
$homeLink = '/';
$aboutLink = '/aboutus';
$impressumLink = '/impressum';
$privacyPolicy = '/datenschutz';

$instaLink = 'https://www.instagram.com/curaworkonline/';
$facebookLink = 'https://www.facebook.com/curawork.online/';
$linkedInLink = 'https://de.linkedin.com/company/curawork';
$twitterLink = 'https://twitter.com/curawork1';

/*$svgConnect = file_get_contents('/images/connect.svg');
                                                $svgChat = file_get_contents('/images/chat.svg');
         #                                       $svgNews = file_get_contents('/images/news.svg');*/
$showLoginPage = 'true';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $token = $_GET['hash'];
    $isValidPasswordReset = false;

    //$showLoginPage = true;

    $passwordReset = PasswordReset::where([
        'email' => $email,
        'token' => $token,
    ])->get();

    if ($passwordReset->count() != 1) {
        header('Location: http://www.curawork.de/login');
        exit();
    } else {
        $showLoginPage = 'false';
    }
    //echo $passwordReset->count();
} else {
    $_GET['email'] = '';
}


$jobs_area = false;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link .= 'jobs.';
if (str_contains($actual_link, 'jobs.')) {
    $jobs_area = true;
}
?>


<head>

  @auth
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Curawork</title>

    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
    <script src="{{ asset('js/feed.js') }}" defer></script>
    <script src="{{ asset('js/userConnection.js') }}" defer></script>
    <script src="{{ asset('js/router.js') }}" defer></script>
    <script src="{{ asset('js/helper.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  @endauth
  <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
  @guest
    <script></script>
    <script src="{{ asset('js/helper.js') }}" defer></script>

    <head>
      <!-- META TAGS -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8">

      <meta name="description" content="Das Berufsnetzwerk für professionelle Pflege">
      <meta name="keywords" content="">
      <meta name="author" content="Curawork">
      <meta property="og:image" src="{{ asset('images/schrift.svg') }}">

      <title>Curawork</title>
      <link href="{{ asset('css/landingPage.css') }}" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <!-- JQUERY -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="shortcut icon" type="image/x-icon" href="">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
      </script>


      <script src="{{ asset('js/landingPage.js') }}" defer></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    </head>

    <!-- FILE LINKS -->

    <!-- FILE LINKS END -->

  @endguest
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">
  <style>
    .shadowloginpage {
      box-shadow: 0px 0px 2px 2px rgb(0 0 0 / 7%);
      border-radius: 9px;
      background-color: white;
      Width: 400px !important
    }

    @media (max-width:558px) {
      .shadowloginpage {
        border-radius: 0px;
      }

    }

    .LoginTextInnerBox1 {}

    @media (max-width:558px) {
      .LoginTextInnerBox1 {}

    }

    .cura-spinner {
      border-color: white;
      border-top-color: transparent;
      height: 20px;
      width: 20px;
      border-width: 2px;
      margin-top: 2px;
    }

    .LoginButtonInnerBox1 {
      width: 80%;
      margin: auto;
      margin-top: 20px;
    }

    @media (max-width:558px) {
      .LoginButtonInnerBox1 {
        margin: auto;

      }

    }

    .back-button:hover {
      cursor: pointer;
    }

    .dark-mode-bg {
      position: fix;
      background: rgb(35, 24, 12);
      background: linear-gradient(180deg, rgba(35, 24, 12, 1) 0%, rgba(255, 255, 255, 1) 100%);
      height: 200px;
    }

    .custom-margin {
      margin-top: 5%;
    }

    @media (max-width: 768px) {
      .custom-margin {
        margin-top: 15%;
      }
    }

    @media (max-width: 376px) {
      .custom-margin {
        margin-top: 2%;
      }
    }

  </style>
</head>

<body class="">


  <div>


    <div class=" container custom-margin">
  <div class="row" style="max-width: 1158px !important;">
    <div class="row">

      <div class="col-8 col-md-4" style="text-align: center;margin:auto"><img style="margin:auto;width:250px"
          src="/images/schrift.svg"></div>
    </div>
    <div class="row">

      <div class="col-12 col-md-4 mt-2"
        style="text-align: center;margin:auto;letter-spacing: 0.025em;color:#23180C; font-size: 18px">

      @if (!$jobs_area)
      Willkommen in der Community für
      professionelle Pflege!
      @else
      Wir verbinden passgenau Talente mit Arbeitsgebern!
      @endif

</div>
    </div>

    <div style="margin: auto;" class=" mb-3 mt-4 col-md-4  px-3 px-md-4 pb-3  py-2  shadowloginpage">

      <div id="login_section">

        <h4 class="my-3 LoginTextInnerBox1 text-center" style="font-weight: 500;">Login</h4>
        @if (session('status'))
          <div class="text-danger my-3">
            {{ session('status') }}
          </div>
        @endif
        <form action="{{ route('login') }}" method="post">
          @csrf


          <div class="mb-3">
            <label for="lastname" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
              value="{{ old('email') }}">

            @error('email')
              <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>

          <div class="mb-0">
            <label for="password" class="form-label">Passwort</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
              name="password">

            @error('password')
              <div class="text-danger"> {{ $message }}</div>
            @enderror
          </div>
          <style>
            .forgot-password:hover {
              text-decoration: underline;
              cursor: pointer;
            }

          </style>
          @if(!$jobs_area)
          <div class="mb-4 mt-1 text-primary forgot-password" onclick="prepareForgotPasswordMail()"
            style="font-size: 14px">Passwort vergessen?</div>
          @else
          <div class="mb-4 mt-1 text-primary forgot-password invisible" 
          style="font-size: 14px">Passwort vergessen?</div>
          @endif

          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
            <label class="form-check-label" for="exampleCheck1">Eingeloggt bleiben</label>
          </div>
          <button type="submit" class="mt-2 btn w-100  @if (!$jobs_area) btn-warning LoginButtonInnerBox1 @else btn-primary @endif ">Einloggen</button>

        </form>
        <div class="row">

        </div>
      </div>


      <div id="reset_password_section" class="d-none">
        <div class="d-flex justify-content-between">
          <div><img class="me-2  back-button " style="margin-top: 3px" onclick="backToLogin()"
              src="{{ asset('images/back.svg') }}" alt="" style="height: 20px; width: 20px">
          </div>
          <div class="fw-600">Passwort zurücksetzen</div>
          <img class="invisible me-2 back-button " onclick="backToLogin()" src="{{ asset('images/back.svg') }}"
            alt="" style="height: 20px; width: 20px">
        </div>
        <h4 class="my-3 text-center" style="font-weight: 500;"> </h4>
        <div class="text-secondary h6 mb-2 unselectable" style="font-weight: 400">
          Gib deine E-Mail-Adresse an, klicke auf
          "E-Mail erhalten"
          und wir schicken dir einen Link, über den du dein Passwort zurücksetzen kannst.
        </div>

        @if (session('status'))
          <div class="text-danger my-3">
            {{ session('status') }}
          </div>
        @endif

        @csrf
        <div class="mb-3">
          <div id="send_section">
            <label for="lastname" class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" id="reset_mail" value="{{ old('email') }}">


            <div id="reset_email_error" class="text-danger"></div>

            <button onclick="sendResetPasswordMail()" class="mt-3 w-100 btn btn-warning LoginButtonInnerBox1">E-Mail
              erhalten</button>
          </div>
          <div id="success_section">
            <div class="text-center mt-5" id="success_section_text">
              <img class="my-2" src="{{ asset('images/CheckOrange.svg') }}" alt="">
              <div> Wir haben eine E-mail an <span id="sent_to_email" class="fw-600"></span> gesendet.
              </div>

            </div>
          </div>
        </div>

      </div>


      <div id="set_new_password_section" class="d-none">
        <h4 class="my-3 LoginTextInnerBox1 " style="font-weight: 500;">Passwort zurücksetzen</h4>

        <div class="mb-3">
          <label for="lastname" class="form-label">Passwort</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror"
            autocomplete="new-password" id="new_password">


          <div class="text-danger d-none" id="new_password_error">.</div>

        </div>

        <div class="mb-0">
          <label for="password" class="form-label">Passwortbestätigung</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
            name="password">



          <div class="text-danger d-none" id="password_confirmation_error">.</div>

        </div>
        <style>
          .forgot-password:hover {
            text-decoration: underline;
            cursor: pointer;
          }

        </style>

        <button id="save_password_btn" onclick="saveNewPassword()" type="submit"
          class="mt-4 btn w-100  btn-warning LoginButtonInnerBox1">
          <div id="save_password_btn_spinner" class="d-none spinner-border text-primary cura-spinner" role="status">
            <span class="visually-hidden">Loading...</span>
          </div><span id="save_password_btn_text">Speichern</span>
        </button>
        <div class="row">

        </div>

      </div>

      <div id="password_change_success" class="">
        <div class=" text-center mt-3"
        id="password_change_success_inner">
        Passwort erfolgreich geändert! <img class="ms-2" src="{{ asset('images/CheckOrange.svg') }}"
          style="width: 15px; height: 15px" alt="">
      </div>
      <div class="text-center">
        <div class="pointer-on-hover underline-on-hover text-primary p-3" onclick="backToLoginFromPasswordChange()">
          Zurück zum Login</div>
      </div>
    </div>
    <div id="">

    </div>
  </div>
  @if(!$jobs_area)
  <div class=" mt-1   text-center" onclick="window.location.href='/register'" style="font-size: 14px">Du hast noch kein
    Profil? <span class="underline-on-hover text-primary fw-600">Registriere dich hier.</span> </div>
    @endif
  </div>






  <script>
    $('#password_change_success').fadeOut(0);
    $('#password_change_success_inner').fadeOut(0);




    var showLoginPage = '{{ $showLoginPage }}';
    if (showLoginPage == 'false') {
      $('#new_password').val('');
      $('#login_section').addClass('d-none');
      $('#set_new_password_section').removeClass('d-none');
    }

    function backToLoginFromPasswordChange() {
      window.history.pushState("", "", '/login');
      $('#login_section').removeClass('d-none');
      $('#set_new_password_section').addClass('d-none');
      $('#password_change_success').fadeOut(0);
      $('#password_change_success_inner').fadeOut(0);
      $('#email').val('<?php echo $_GET['email']; ?>');
    }

    $('#success_section').fadeOut(0);
    $('#success_section_text').fadeOut(0);

    function prepareForgotPasswordMail() {
      $('#login_section').addClass('d-none');
      $('#reset_password_section').removeClass('d-none');
      $('#reset_mail').val($('#lastname').val());
    }

    function backToLogin() {
      $('#login_section').removeClass('d-none');
      $('#reset_password_section').addClass('d-none');
      $('#send_section').fadeIn(0);
      $('#success_section').fadeOut(0);
      $('#success_section_text').fadeOut(200);

    }

    function sendResetPasswordMail() {
      var email = $('#reset_mail').val();
      var form = new FormData;
      form.append('email', email);
      var functionsOnSuccess = [
        [resetPasswordMessage, ['response']]
      ];
      ajax('/reset_password', 'POST', functionsOnSuccess, form);
    }

    function resetPasswordMessage(msg) {

      $('#reset_email_error').html('');
      if (msg == 'no user found') {
        $('#reset_email_error').html('Es existierst kein User mit dieser Email-Adresse.');
      }
      if (msg == 'success') {
        $('#send_section').fadeOut(0);

        $('#sent_to_email').html($('#reset_mail').val());
        $('#success_section').fadeIn(0);
        $('#success_section_text').fadeIn(200);
      }
    }

    var requestingPasswordChange = false;

    function saveNewPassword() {

      var newPassword = $('#new_password').val();
      var newPasswordRepeat = $('#password_confirmation').val();
      var form = new FormData;
      form.append('newPassword', newPassword);
      form.append('password_confirmation', newPasswordRepeat);
      form.append('email', '<?php echo $_GET['email']; ?>');
      var functionsOnSuccess = [
        [changePasswordMessage, ['response']]
      ];
      ajax('/change_password', 'POST', functionsOnSuccess, form);
    }



    function changePasswordMessage(msg) {



      //alert(msg[0] + msg[1] + msg[2] + msg[3] + msg[4] + msg[5]);
      $('#save_password_btn_spinner').removeClass('d-none');
      $('#save_password_btn_text').addClass('d-none');
      $('#save_password_btn').addClass('disabled');


      var error = false;
      $('#new_password').removeClass('is-invalid');
      $('#new_password_error').addClass('d-none');
      if (msg[1] == 'true') {
        error = true;
        $('#new_password').addClass('is-invalid');
        $('#new_password_error').removeClass('d-none');
        $('#new_password_error').html(formatErrorMsg(msg[0]));
      }

      if (msg[3] == 'true') {
        error = true;
        $('#password_confirmation').addClass('is-invalid');
        $('#password_confirmation_error').removeClass('d-none');
        $('#password_confirmation_error').html(formatErrorMsg(msg[2]));
      }

      if (msg[5] == 'true') {
        error = true;
        $('#password_confirmation').addClass('is-invalid');
        $('#password_confirmation_error').removeClass('d-none');
        $('#password_confirmation_error').html(formatErrorMsg(msg[4]));
      } else {
        $('#password_confirmation').removeClass('is-invalid');
        $('#password_confirmation_error').addClass('d-none');
      }
      //alert('#'+msg[6] + "#" + msg[7]+'#');

      if (error == false) {

        setTimeout(() => {
          $('#password_change_success').fadeIn(0);
          $('#password_change_success_inner').fadeIn(200);
          $('#set_new_password_section').fadeOut(0);

          /*window.history.pushState("", "", '/login');
          $('#login_section').removeClass('d-none');
          $('#set_new_password_section').addClass('d-none');*/
        }, 500);

      } else {
        setTimeout(() => {
          resetSavePasswordBtn();
        }, 100);

      }


    }


    function resetSavePasswordBtn() {
      $('#save_password_btn').removeClass('disabled');
      $('#save_password_btn_spinner').addClass('d-none');
      $('#save_password_btn_text').removeClass('d-none');
      $('#save_password_btn').blur()
    }

    function formatErrorMsg(errorMsg) {
      errorMsg = errorMsg.toString();
      errorMsg = errorMsg.replaceAll(".,", ". ");
      if (errorMsg.includes("Passwort Format ist ungültig.")) {
        errorMsg = "Format: Kombination aus mind. acht Ziffern, Groß- und Kleinbuchstaben.";
      }
      return errorMsg;
    }
  </script>
</body>
