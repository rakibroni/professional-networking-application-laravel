<?php
use App\Models\User;
if (isset($_GET['username'])) {
$user = User::where(['username' => $_GET['username']])->get();
if ($user->count() == 0) {
header('Location: ' . route('login'));
exit();
} else {
$user = $user->first();
if ($user == auth()->user()) {
header('Location: ' . route('feed'));
exit();
}
}
} else {
if (auth()->user()) {
header('Location: ' . route('feed'));
exit();
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, user-scalable=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="/images/webtab.svg">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700');

  .row {
    --bs-gutter-x: 0 !important;
    --bs-gutter-y: 0 !important;
    margin: auto !important;
    max-width: 1128px;
  }

  ._br {
    border-radius: 5px !important;
    border: 1px solid #D3D3D3;
  }

  .btn {
    background-color: #FF9721;
    border: 1px solid #FF9721;
    color: #FFFFFF;
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

  .Text1 {
    font-weight: 500;
    font-size: 22px;
    line-height: 26px;
  }

  .Text2 {
    font-size: 16px;
    line-height: 136.7%;
    color: #7F7F7F;
  }

  .Text4 {
    font-weight: 500 !important;
    font-size: 16px !important;
    color: #ADADAD !important;
  }

  .Textbox {
    height: 91px;
  }

  @media (max-width: 768px) {
    .Textbox {
      height: auto;
    }
  }

  .row {
    --bs-gutter-x: 0 !important;
    --bs-gutter-y: 0 !important;
    margin: auto !important;
    max-width: 1158px !important;
  }

</style>



<body>

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
      <div class="col-12 Title2 text-center mb-4 mt-3">Was möchtest du als erstes machen?</div>
      <div class="col-12 Title3 text-center mb-2 mb-md-4">Jede Pflegekraft soll es auf Curawork so einfach wie
        möglich haben, deshalb führen wir dich herum!</div>
    </div>

    <div class="row my-3 mx-xl-3 mx-0 m-md-2 m-0">
      <div class="col-12">
        <div class="row">

          <!-- Box 1 - Profil ausfüllen -->
          <div class="col-12 col-sm-8 offset-sm-2 offset-md-0 col-md-4 mt-2 pe-md-1">
            <div class="row p-3 _br bg-white h-100">
              <div class="col-12">
                <img src="{{ asset('images/ProfilAusfüllenDesign.svg') }}"
                  class="w-100 mb-3 mb-lg-3 mb-sm-1 mt-lg-3 mt-0" alt="" style=" height: 221.41px">
              </div>
              <div class="col-12 Text1 text-center mb-3 mt-2">Profil ausfüllen</div>
              <div class="col-12 Text2 text-center mb-3 mb-lg-0 Textbox">Schließe das Ausfüllen deines Profils ab,
                damit andere Pflegekräfte wissen, wer sich hinter dem netten Profil versteckt.</div>
              <div class="col-12 text-center mb-2"><button id="profile" style="color:white !important"
                  class="btn mt-2 mt-lg-0">Profil
                  ausfüllen <img src="{{ asset('images/ArrowRight.svg') }}" alt="" class="mb-1 ms-1"
                    style="height: 12px; width: 10px"></button></div>
            </div>
          </div>

          <!-- Box 2 - Vernetze dich -->
          <div class="col-12 col-sm-8 offset-sm-2 offset-md-0 col-md-4 mt-2 px-md-1">
            <div class="row p-3 _br bg-white h-100">
              <div class="col-12">
                <img src="{{ asset('images/VernetzeDichDesign.svg') }}"
                  class="w-100 mb-3 mb-lg-3 mb-sm-1 mt-lg-3 mt-0" alt="" style=" height: 221.41px">
              </div>
              <div class="col-12 Text1 text-center mb-3 mt-2">Vernetze dich</div>
              <div class="col-12 Text2 text-center mb-3 mb-lg-0 Textbox">Vernetze dich mit Kolleg*innen aus deiner
                Einrichtung, deiner Umgebung oder lerne neue Pflegekräfte kennen.</div>
              <div class="col-12 text-center mb-2"><button id="connect" style="color:white !important"
                  class="btn mt-2 mt-lg-0">Jetzt vernetzen <img src="{{ asset('images/ArrowRight.svg') }}" alt=""
                    class="mb-1 ms-1" style="height: 12px; width: 10px"></button></div>
            </div>
          </div>

          <!-- Box 3 - Seiten folgen -->
          <div class="col-12 col-sm-8 offset-sm-2 offset-md-0 col-md-4 mt-2 ps-md-1">
            <div class="row p-3 _br bg-white h-100">
              <div class="col-12">
                <img src="{{ asset('images/SeitenFolgenDesign.svg') }}"
                  class="w-100 mb-3 mb-lg-3 mb-sm-1 mt-lg-3 mt-0" alt="" style=" height: 221.41px">
              </div>
              <div class="col-12 Text1 text-center mb-3 mt-2">Seiten folgen</div>
              <div class="col-12 Text2 text-center mb-3 mb-lg-0 Textbox">Entdecke Experten, Influencer und Seiten rund
                um die Pflege, um täglich spannende Beiträge in deinem Feed zu sehen.</div>
              <div class="col-12 text-center mb-2 align-text-bottom"><button id="feed" id="follow" style="color:white !important"
                  class="btn mt-2 mt-lg-0">Feed füllen <img src="{{ asset('images/ArrowRight.svg') }}" alt=""
                    class="mb-1 ms-1" style="height: 12px; width: 10px"></button></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div id="skip" class="my-4 text-center Text4 text-reset" style="cursor: pointer" id=>
            Erstmal überspringen
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script>
    if (performance.navigation.type == 2) {
      window.location = '/feed';
    }

    function finishSetup(href) {
      var username = '{{ $user->username }}';
      var form = new FormData();
      form.append('username', username);


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $.ajax({async: true,
        url: '/finish_setup',
        method: 'post',
        data: form,
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function() {},

        success: function(response) {

          window.location.href = href;
        }
      })
    }









    $("#connect").click(function() {
      finishSetup("/network");
    });

    $("#profile").click(function() {
      var username = '{{ $user->username }}';
      finishSetup("/users/" + username);
    });
    $("#skip").click(function() {
      finishSetup("/feed");
    });

    $("#feed").click(function() {
      finishSetup("/feed");
    });

  </script>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
  </script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
