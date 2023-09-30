<?php
session_start();
$token = md5(rand(1000, 9999)); //you can use any encryption
$_SESSION['token'] = $token;
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
$svgNews = file_get_contents('/images/news.svg');*/
?>

<style>
  .pm0 {
    margin: 0;
    padding: 0;
  }

</style>
<!-- NAVBAR -->
<nav id="navbar" class="fixed-top navbar navbar-expand-xl navbar-light trans-navigation bg-trans">
  <div class="container">

    <a onclick="location.href='{{ route('home') }}'" class="mx-1 mx-md-2 mx-lg-0 navbar-brand" href="#">
      <img src="{{ asset('images/schrift.svg') }}" alt="" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="mt-1 collapse navbar-collapse flex-grow-1 text-right" id="navbarNav">
      <ul class="navbar-nav ms-auto flex-nowrap">
        <li class="nav-item mx-xl-2 mx-3 ">
          <a class="nav-link active" aria-current="page"
            href="<?php echo $homeLink; ?>">Home</a>
        </li>
        <li class="nav-item dropdown mx-3 ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Features
          </a>
          <ul id="navDrop" class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a onclick="hideNavDropdown()" class="dropdown-item" href="{{ url('/#connect') }}">Vernetzen &
                Chatten</a></li>
            <li><a onclick="hideNavDropdown()" class="dropdown-item" href="{{ url('/#jobs') }}">Job-Angebote
                erhalten</a></li>
            <li><a onclick="hideNavDropdown()" class="dropdown-item" href="{{ url('/#news') }}">Weiterbilden</a>
            </li>
          </ul>
        </li>
        <li class="nav-item mx-xl-2 mx-3 ">
          <a class="nav-link" href="<?php echo $aboutLink; ?>">Über Uns</a>
        </li>
        <li class="nav-item mx-xl-2 mx-3 ">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item mx-xl-2 mx-3 ">
          <button onclick="window.location.href='/register'" class="btn btn-primary" style="color:white !important">Registrieren</button>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<script>
  function hideNavDropdown1(id) {
    document.getElementById(id).css.removeClass("show");
  }
</script>
<!-- MobileFeed -->



<!-- NAVBAR END -->
