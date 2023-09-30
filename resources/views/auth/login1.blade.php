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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<style>
  html {
    scroll-behavior: smooth;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    background: #121212;
    /* fallback for old browsers */
    overflow-x: hidden;

    height: 100%;

    /* code to make all text unselectable */
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
  }

  /* Disables selector ring */
  body:not(.user-is-tabbing) button:focus,
  body:not(.user-is-tabbing) input:focus,
  body:not(.user-is-tabbing) select:focus,
  body:not(.user-is-tabbing) textarea:focus {
    outline: none;
  }

  /* ########################################################## */

  h1 {
    color: white;

    font-size: 35px;
    font-weight: 800;
  }

  .flex-container {


    margin-top: 60px;

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .content-container {

    height: 350px;
  }

  .form-container {
    display: flex;
    justify-content: center;
    align-items: center;


    height: 350px;

    margin-top: 5px;
    padding-top: 20px;

    border-radius: 12px;

    display: flex;
    justify-content: center;
    flex-direction: column;

    background: #1f1f1f;
    box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.199);
  }

  .subtitle {
    font-size: 11px;

    color: white;
  }

  input {
    border: none;
    border-bottom: solid rgb(143, 143, 143) 1px;

    margin-bottom: 30px;

    background: none;
    color: rgba(255, 255, 255, 0.555);

    height: 35px;
    text-align: center; 
  }

  .submit-btn {
    cursor: pointer;

    border: none;
    border-radius: 8px;

    box-shadow: 2px 2px 7px #38d39f70;

    background: #38d39f;
    color: rgba(255, 255, 255, 0.8);



    transition: all 1s;
  }

  .submit-btn:hover {
    color: rgb(255, 255, 255);

    box-shadow: none;
  }

  .login-box-position {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .dark-mode-bg {
    background-color: #23180C;
  }

</style>





<body class=" dark-mode-bg">
  <div class="login-box-position">
    <div class="text-center" style="width: 300px;">
      <img src="{{ asset('images/Likeactive.svg') }}" class="mb-2" alt="" style="height: 50px; width: 50px">
      <div class="text-white mb-5">
        Willkommen in der Community für professionelle Pflege!
      </div>
      <br>
      <br>
      <div class="h3 text-white">
        Login
      </div>
      <br>
      <br>
      <span class="subtitle" style="text-align: left !important">EMAIL</span>
      <br>
      <input class="w-100" type="text" name="username" value="">
      <br>
      <span class="subtitle">PASSWORT</span>
      <br>
      <input class="w-100" type="password" name="password" value="">
      <br>
      <br>

      <button type="submit" class="btn btn-warning LoginButtonInnerBox1">Einloggen</button>
    </div>
  </div>
</body>


