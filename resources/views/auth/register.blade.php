<!doctype html>
<html lang="en">

<head>
  <script defer src="{{ asset('js/helper.js') }}?v={{ time() }}"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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


    ._br {
      border-radius: 4px !important;
      border: 1px solid #D3D3D3;
    }

    @media (max-width: 567px) {

      ._br {
        border-radius: 0px !important;
      }
    }



    .container {
      max-width: 1128px;
    }

    .bg {
      background-color: #FFFFFF;
    }

    @media (max-width: 768px) {
      .bg {
        background-color: #FAFAFA;
      }

    }

    hr {
      margin: 1rem 1;
      color: #BCBBBB;
      border: 0;
      opacity: 0.5;
    }

    .shadow-md {
      box-shadow: 0 0 3px rgba(1, 1, 1, 0.2);
    }

    .row {
      --bs-gutter-x: 0 !important;
      --bs-gutter-y: 0 !important;
      margin: auto !important;
      max-width: 1128px;
    }

    .Title4 {
      font-weight: 500 !important;
      font-size: 24px;
      line-height: 25px;
    }

    .Title3 {
      font-size: 18px;
      line-height: 20px;
      color: #7F7F7F;
    }

    .Title2 {
      font-weight: 500 !important;
      font-size: 30px;
      line-height: 25px;
    }

    @media (max-width: 400px) {
      .Title3 {
        font-size: 16px !important;
        line-height: 21px;
        color: #7F7F7F;
      }

      .Title4 {
        font-weight: 500 !important;
        font-size: 18px !important;
        line-height: 25px;
      }

      .Title2 {
        font-weight: 500 !important;
        font-size: 27px !important;
        line-height: 25px;
      }

      .DeinProfilText {
        font-weight: bold;
        font-size: 26px !important;
        color: #FF9721;
        line-height: 30px;
      }

      .DeinBerufText {
        font-weight: bold;
        font-size: 36px !important;
        color: #FF9721;
        line-height: 40px;
      }

      .DeinePlattformText {
        font-weight: bold;
        font-size: 38px !important;
        color: #FF9721;
        line-height: 43px;
      }
    }

    .DeinProfilText {
      font-weight: bold;
      font-size: 30px;
      color: #FF9721;
      line-height: 30px;
    }

    .DeinBerufText {
      font-weight: bold;
      font-size: 40px;
      color: #FF9721;
      line-height: 40px;
    }

    .DeinePlattformText {
      font-weight: bold;
      font-size: 43px;
      color: #FF9721;
      line-height: 43px;
    }

    .InPutTitle {
      font-size: 15px;
      line-height: 20px;
      color: #FF9721;
      font-weight: 500 !important;
    }

    .AGBsText {
      font-size: 14px;
      line-height: 15px;
      color: #BCBBBB;
    }

    .btn {
      background-color: #FF9721;
      border: 1px solid #FF9721;
      color: #FFFFFF;
    }

    .btn:hover {
      color: white !important;
    }

    .form-control {
      font-size: 15px !important;
      display: block;
      width: 100%;
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: black !important;
      background-color: #FFFFFF;
      background-clip: padding-box;
      border: 1px solid #BCBBBB;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      border-radius: .25rem;

    }

    .form-control:focus {
      border-color: #BCBBBB !important;
      box-shadow: 0 0 0 0.15rem rgba(255, 151, 33, 0.3) !important;
    }

    .Text5 {
      font-size: 18px;
      line-height: 20px;
      color: #7F7F7F;
    }

    .Text6 {
      font-size: 17px;
      line-height: 30px;
      color: black;
      font-weight: 500 !important;
    }

    .Text7 {
      font-size: 14px;
      line-height: 16px;
      color: #BCBBBB;
    }

    .margintop {
      margin-top: 80px;
    }

    @media (max-width: 768px) {
      .margintop {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-top: 0px;
        width: 100vw;
      }
    }

    .loader {
      border: 4px solid #f3f3f3;
      /* Light grey */
      border-top: 4px solid #ff9721;
      /* Blue */
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 0.65s linear infinite;

      right: 60px;
    }



    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
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

    .error-text {
      margin-top: 3px;
      font-size: 12px !important;
    }



    }

  </style>

</head>

<body class="bg">
  <!-- Nav Bar -->
  <!-- NAVBAR -->
  <nav id="navbar" class="fixed-top navbar navbar-expand-xl navbar-light trans-navigation shadow-md d-none d-md-block"
    style="background-color: #23180C !important;">
    <div class="container">

      <a onclick="location.href='{{ route('home') }}'" class="mx-1 mx-md-2 mx-lg-0 navbar-brand" href="#">
        <img src="{{ asset('images/logo_white_beta.svg') }}" alt="" height="40">
      </a>

    </div>
  </nav>
  <div class="margintop" id="main_container">
    <div class="row">
      <!-- Left side -->
      <div class="col-12 col-md-6">
        <div class="row d-none d-md-block">
          <div class="offset-md-1 px-1 px-sm-4 px-md-3">
            <div class="ms-lg-3 mt-1 mb-2 mt-md-2 DeinProfilText"> Dein Profil.</div>
            <div class="ms-lg-3 mb-2 DeinBerufText">Dein Beruf.</div>
            <div class="ms-lg-3 mb-3 mb-md-2 mb-lg-5 DeinePlattformText">Deine Plattform.</div>
          </div>
          <div class="col-12 d-none d-md-block ps-3 ps-xl-0" id="Animation1" style="opacity: 0">
            <object id="RegisterAnimationsvg" type="image/svg+xml" data="/images/KeyInLock.svg" class="w-100"
              style="height: 450.43px" alt=""></object>
          </div>
          <div class="col-12 d-none ps-3 ps-xl-0" id="Animation2">
            <object id="RegisterAnimationsvg2" type="image/svg+xml" data="/images/RegisterSuccess.svg"
              class="w-100" style="height: 450.43px" alt=""></object>
          </div>
        </div>
      </div>
      <!-- Right side box -->
      <div id="page0" class="col-12 col-md-6 px-0 px-sm-4 px-lg-5">
        <div class="row p-4 _br bg-white ">
          <div class="col-12">
            <div class="row text-center">
              <div class="col-12 Title2 mb-3 d-none d-md-block">Registrieren</div>
              <style>
                .logo-size {
                  height: 60px;
                }

                @media (max-width: 376px) {
                  .logo-size {
                    height: 45px;
                  }
                }

              </style>
              <div class="col-12 Title2 mb-1 d-block d-md-none "><img src="{{ asset('images/Likeactive.svg') }}"
                  class="logo-size" alt=""></div>
              <div class="col-12 Title3 mb-2 text-black" style="color:black !important">Werde in wenigen Minuten Teil
                der Curawork Community.</div>
            </div>

          </div>

          <div class="col-12 mt-2">
            <div class="row">
              <div class="col-12 mb-3">
                <div class="InPutTitle mb-2">Vorname</div>
                <div class="input-group">
                  <input type="text" id="first_name" placeholder="z.B. Daniela" class="form-control" value="">
                </div>
                <div id="firstname_error" class="d-none text-danger error-text">Hier Firstname Error</div>
              </div>
              <div class="col-12 mb-3">
                <div class="InPutTitle mb-2">Nachname</div>
                <div class="input-group">
                  <input type="text" id="last_name" placeholder="z.B. Berger" class="form-control">
                </div>
                <div id="lastname_error" class="d-none error-text text-danger ">Hier Lastname Error</div>
              </div>
              <div class="col-12 mb-3">
                <div class="InPutTitle mb-2">E-Mail-Adresse</div>
                <div class="input-group">
                  <input type="email" id="email" placeholder="z.B. danielaberger@web.de" class="form-control">
                </div>
                <div id="email_error" class="d-none text-danger error-text">Hier Email Error</div>
              </div>
              <div class="col-12 mb-3">
                <div class="InPutTitle mb-2">Passwort</div>
                <div class="input-group">
                  <input type="password" id="password" autocapitalize="off" autocorrect="off"
                    autocomplete="new-password" placeholder="z.B. &Qlx3FF2js!" class="form-control">
                </div>
                <div id="password_error" class="d-none text-danger error-text">Hier Passwort Error</div>
              </div>
              <div class="col-12 AGBsText mb-4">Durch klicken auf "Registrieren" bestätigst Du die langweiligen, aber
                nötigen AGBs und
                <a href="{{ route('datenschutz') }}"
                  style="text-decoration: underline;color: #BCBBBB; ;">Datennutzungsbestimmungen.</a>
              </div>
              <div class="col-12 text-center align-text-bottom d-md-block d-none"><button type="button"
                  onclick="register();" style="width: 190px" class="btn mt-2 mt-lg-0" id="register_btn">Registrieren
                  <img src="{{ asset('images/Key.svg') }}" id="Key1" class=" ms-3 mb-1" alt="">
                  <div id="spinner" class="ms-1 lds-spinner d-none">
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
              <div class="col-12 text-center align-text-bottom d-block d-md-none"><button type="button"
                  onclick="register();" style="width: 190px" class="btn mt-2 mt-lg-0" id="register_btn_1">Registrieren
                  <img src="{{ asset('images/Key.svg') }}" id="Key2" class=" ms-3 mb-1" alt="">
                  <div id="spinner2" class="ms-1 lds-spinner d-none">
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
        </div>
        <br>
        <br>
      </div>
      <style>
        .loader-after-register {
          position: fixed;
          left: calc(50% - 30px);
          top: calc(50% - 30px);
          transform: translate(-50%, -50%);
        }

      </style>
      <div class="d-none" id="loader">
        <div class="loader loader-after-register" style=""></div>
      </div>

      <div id="page1" class="col-12 col-md-6 px-0 px-sm-4 px-lg-5 d-none" style="opacity: 0;">
        <div class="row px-4 py-2 _br bg-white">
          <div class="col-12">
            <div class="Title4 text-center mt-4 mb-md-4 mb-2">Bestätige deine E-Mail Adresse um fortzufahren!</div>
          </div>
          <div class="col-12 mb-3 text-center">
            <object id="RegisterSuccessCW" type="image/svg+xml" data="/images/MailSentCW.svg"
              style="height: 189.5px; width: 189.5px" alt=""></object>
          </div>
          <div class="col-12 mt-4 mb-5 text-center">
            <div class="mb-5 Text5">Wir haben einen Bestätigungscode an <span class="Text6"
                id="sent_to_email">jessicakssng@web.de</span> gesendet.
            </div>
            <div class="InPutTitle mb-2">Code eingeben:</div>
            <div class="d-flex justify-content-center">
              <div class="input-group" style="width: 100px">
                <input maxlength="6" style="text-align:center; border-radius: 3px !important" type="text" pattern="\d*"
                  class="form-control" id="code_input">
                <script>

                </script>


              </div>
            </div>
            <div id="code_error_message" class="text-danger invisible" style="height: 24px">
              Falscher Code!
            </div>
          </div>

          <div class="col-12 mb-3 text-center Text7">
            Du hast keine E-Mail erhalten? Schaue mal im Spam-Ordner nach!
            {{-- <div class="InPutTitle mb-2">E-Mail erneut senden</div>
            <div class="InPutTitle">E-Mail Adresse bearbeiten</div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    -->
  <script>
    $('#Animation1').animate({
      opacity: '1',
    }, 200, function() {

    });

    function ajaxSetup() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
    }

    function register() {
      var screenWidth = document.documentElement.clientWidth

      var form = new FormData();
      form.append('first_name', $("#first_name").val());
      form.append('last_name', $("#last_name").val());
      form.append('email', $("#email").val());
      form.append('password', $("#password").val());


      $('#spinner').removeClass("d-none");
      $('#spinner').addClass("d-inline-block");
      $('#Key1').addClass("d-none");


      $('#spinner2').removeClass("d-none");
      $('#spinner2').addClass("d-inline-block");
      $('#Key2').addClass("d-none");


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $.ajax({
        async: true,
        url: '/createUser',
        method: 'post',
        data: form,
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function() {

        },

        success: function(response) {

          $('*[id*=' + 'register_btn' + ']:visible').each(function() {
            $('#' + this.id).trigger('blur');
          });

          clearErrorMsgs();
          if (response.length > 0) {



            $('#spinner').addClass("d-none");
            $('#spinner').removeClass("d-inline-block");
            $('#Key1').removeClass("d-none");

            $('#spinner2').addClass("d-none");
            $('#spinner2').removeClass("d-inline-block");
            $('#Key2').removeClass("d-none");

            handleError(response[0], "firstname_error");
            handleError(response[1], "lastname_error");
            handleError(response[2], "email_error");
            handleError(response[3], "password_error");
          } else {
            createRegisrationCode($("#email").val());
            $('#sent_to_email').html($('#email').val());
            $('*[id*=' + 'register_btn' + ']:visible').each(function() {
              $('#' + this.id).attr("onclick", "");
            });


            if (screenWidth >= 768) {
              document.getElementById('Animation2').classList.remove("d-none");
              document.getElementById('Animation1').classList.add("d-md-none");

              setTimeout(() => {
                $('#page0').addClass("d-none");
                $('#page1').removeClass("d-none");
                $('#page1').animate({
                  opacity: '1',
                }, 400, function() {
                  //
                });
              }, 3000);
            } else {

              document.getElementById('page0').classList.add("d-none");
              document.getElementById('loader').classList.remove("d-none");
              setTimeout(function() {
                document.getElementById('loader').classList.add("d-none");
                document.getElementById('page1').classList.remove("d-none");
                $('#page1').css('opacity', 1);
              }, 1200);
            }
          }
        }
      });
    }



    function clearErrorMsgs() {

      $('*[id*=' + 'error' + ']:visible').each(function() {
        $('#' + this.id).addClass("d-none");
      });
    }

    function handleError(errorMsg, id) {
      if (errorMsg != "undefined") {
        if (errorMsg != ".") {

          $('#' + id).removeClass("d-none");
          $('#' + id).html(formatErrorMsg(errorMsg));
        }



      }
    }

    function formatErrorMsg(errorMsg) {
      errorMsg = errorMsg.toString();
      errorMsg = errorMsg.replaceAll(".,", ". ");
      if (errorMsg.includes("Passwort Format ist ungültig.")) {
        errorMsg = "Format: Kombination aus mind. acht Ziffern, Groß- und Kleinbuchstaben.";
      }
      return errorMsg;
    }

    function createRegisrationCode(email) {
      form = new FormData;
      form.append('email', email);
      var functionsOnSuccess = [];
      ajaxSetup();
      ajax('/create_regisration_code', 'POST', functionsOnSuccess, form);
    }



    function alertCode(code) {
      var errorMessage = $('#code_error_message');


      var inputField = $('#code_input');

      if (code[0] == 'success') {
        window.location.href = code[1];
      } else {

        if (inputField.val().length == 6) {

          setTimeout(() => {
            if (errorMessage.hasClass('invisible') == true) {
              errorMessage.removeClass('invisible');
            }
          }, 300);

        } else {

          errorMessage.addClass('invisible');
        }

      }
    }

    function checkCode(email, code) {
      form = new FormData;
      form.append('code', code);
      form.append('email', email);
      var functionsOnSuccess = [
        [alertCode, ['response']]
      ];
      ajaxSetup();
      ajax('/get_regisration_code', 'POST', functionsOnSuccess, form);
    }


    setInterval(() => {
      checkCode($('#email').val(), $('#code_input').val());
    }, 100);
  </script>



  </div>





</body>

</html>
