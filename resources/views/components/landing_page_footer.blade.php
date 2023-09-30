<?php
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
<div id="footer" class="container-fluid bg-light pm0">
  <div class="container">
    <div class="mx-1 mx-md-2">

      <div class="row pm0">
        <div class="col-12 col-xl-4 pm0">
          <div class="d-none d-xl-block text-left">
            <img class="mt-5" src="{{ asset('images/schrift.svg') }}" alt="" height="40">
          </div>
          <div class="d-block d-xl-none text-center">
            <img class="mt-5" src="{{ asset('images/schrift.svg') }}" alt="" height="40">
          </div>
          <div class="text-secondary mt-3">
            <div class="d-none d-xl-block text-left " style="margin-right: 40px">
              Mit Curawork machen Pflegekräfte einen wichtigen Schritt in Richtung Neugestaltung der Pflege.
              Sei auch Du dabei und werde Teil der Community!
            </div>
            <div class="d-block d-xl-none text-center">
              Mit Curawork machen Pflegekräfte einen wichtigen Schritt in Richtung Neugestaltung der Pflege.
              Sei auch Du dabei und werde Teil der Community!
            </div>
          </div>


          <div class="text-center d-xl-none text-center">
            <div class="mt-3 h7" style="font-weight:600">Folg uns gerne auf<br>
              <a href="<?php echo $instaLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Insta.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $facebookLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Facebook.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $linkedInLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Likeactive.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $twitterLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Twitter.svg') }}" alt="" height="30"></a>
            </div>
          </div>
          <div class="text-center d-xl-block text-center d-none" style="margin-right: 40px">
            <div class="mt-5 h7" style="font-weight:600">Folg uns gerne auf<br>
              <a href="<?php echo $instaLink; ?>" target="_blank"><img class="mx-2 mt-3" src="{{ asset('images/Insta.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $facebookLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Facebook.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $linkedInLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Likeactive.svg') }}" alt="" height="30"></a>
              <a href="<?php echo $twitterLink; ?>" target="_blank"><img class=" mx-2 mt-3" src="{{ asset('images/Twitter.svg') }}" alt="" height="30"></a>
            </div>
          </div>


        </div>
        <div class="col-12 pm0 d-block d-xl-none">
          <div class="bg-secondary mt-4" style="height:2px; width: 100%">
            <div class="invisible">.</div>
          </div>
        </div>

        <div class="col-6 col-xl-1 pm0">
          <div class="d-block d-xl-none text-center">
            <div class="mt-5" style="height: 40px">Übersicht</div>
            <div class="mt-3">
              <a href="<?php echo $homeLink; ?>">Home</a>
            </div>
            <div>
              <a href="<?php echo $aboutLink; ?>">Über uns</a>
            </div>

          </div>
          <div class="d-none d-xl-block text-left">
            <div class="mt-5" style="height: 40px">Übersicht</div>
            <div class="mt-3">
              <a href="<?php echo $homeLink; ?>">Home</a>
            </div>
            <div>
              <a href="<?php echo $aboutLink; ?>">Über uns</a>
            </div>

          </div>
        </div>

        <div class="col-6 col-xl-2">
          <div class="text-left d-none d-xl-block">
            <div class="mt-5" style="height: 40px">Kontakt</div>
            <div class="mt-3">
              <a href="mailto:info@curawork.online">info@curawork.online</a>
            </div>
            <div>
              <a>+49 1575 1997122</a>
            </div>
          </div>
          <div class="text-center d-block d-xl-none">
            <div class="mt-5" style="height: 40px">Kontakt</div>
            <div class="mt-3">
              <a href="mailto:info@curawork.online">info@curawork.online</a>
            </div>
            <div>
              <a>+49 1575 1997122</a>
            </div>
          </div>
        </div>

        <div class="col-12 pm0 d-block d-xl-none">
          <div class="bg-secondary mt-4" style="height:2px; width: 100%">
            <div class="invisible">.</div>
          </div>
        </div>
        <div class="col-3 d-none d-md-block d-xl-none"></div>
        <div class="col-md-6 col-xl-5 pm0">
          <div class="">
            <div class="mx-4 text-center  d-xl-none">
              <div class="mt-5" style="height: 40px; font-weight: 600">Lass uns in Kontakt bleiben!</div>
              <div class="mt-3 text-secondary">
                Erhalte eine E-Mail, sobald es losgeht und Du Dein Profil erstellen kannst.
              </div>
              <div class="input-group my-3">
                <input id="submit-mail-text-1" type="text" class="form-control" placeholder="Email-Adresse" aria-label="Email-Adresse" aria-describedby="button-addon2">
                <button id="submit-mail-1" type="button" class="btn btn-warning">Abschicken</button>
                <div id="footer-email-box-1" class="center h-100 w-100" style="margin: 0; width: 102%; height: 104% !important; width: 104% !important; display: none !important; z-index:10; width:100%; border-radius: 5px; border-color: transparent; background-color:transparent">
                  <div id="footer-email-tick-1" class="center"><img src="{{ asset('images/tick.png') }}" height="30px" alt="">
                    <div style="font-weight: 600"> Vielen Dank, bis bald!</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-left  d-none d-xl-block" style="margin-left: 40px">
              <div class="mt-5" style="height: 40px; font-weight: 600">Lass uns in Kontakt bleiben!</div>
              <div class="mt-3 text-secondary">
                Erhalte eine E-Mail, sobald es losgeht und Du Dein Profil erstellen kannst.
              </div>
              <div class="input-group my-3 position-relative">
                <input id="submit-mail-text-2" type="text text-left" class="form-control" placeholder="Email-Adresse" aria-label="Email-Adresse" aria-describedby="button-addon2">
                <button id="submit-mail-2" type="button" class="btn btn-warning">Abschicken</button>
                <div id="footer-email-box-2" class=" center h-100 w-100" style="margin: 0; width: 102%; height: 104% !important; width: 104% !important; display: none !important; z-index:10; width:100%; border-radius: 5px; border-color: transparent; background-color:transparent">
                  <div id="footer-email-tick-2" class="center text-center"><img src="{{ asset('images/tick.png') }}" height="30px" alt="">
                    <div style="font-weight: 600"> Vielen Dank, bis bald!</div>
                  </div>

                </div>
              </div>

            </div>
            <div id="footer-disclaimer" class="mx-2 text-center col-12 h7 mb-3 text-secondary" style="font-size: 10px">
              Durch das Abschicken bestätige ich die langweilige, aber nötige <a class="text-decoration-underline" href="/datenschutz">Datenschutzerklärung.</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row pm0">
        <div class="col-12 pm0">
          <div class="bg-secondary mt-4" style="height:2px; width: 100%; background-color: #f2f2f2 !important">
            <div class="invisible">.</div>
          </div>
        </div>
        <div class="col-12 pm0 d-none d-lg-block">
          <div class="d-flex justify-content-between my-2">
            <div class="px-2">
              <a>©️ 2021. Alle Rechte vorbehalten.</a>
            </div>
            <div class="mx-2">
              <a href="<?php echo $privacyPolicy; ?>">Datenschutzerklärung</a>
            </div>
            <div class="mx-2">
              <a href="<?php echo $impressumLink; ?>">Impressum</a>
            </div>
          </div>
        </div>
        <div class="col-12 pm0 d-block d-lg-none text-center">
          <div class="my-2">

            <div class="mx-2">
              <a href="<?php echo $privacyPolicy; ?>">Datenschutzerklärung</a>
            </div>
            <div class="mx-2">
              <a href="<?php echo $impressumLink; ?>">Impressum</a>
            </div>
            <div class="px-2">
              <a>©️ 2021. Alle Rechte vorbehalten.</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
  .cookie-shadow {
    box-shadow: 0 0 10px rgba(1, 1, 1, 0.1);
  }

</style>
<?php if (isset($_COOKIE['cookies']) == false) {
echo '<div class="cookie-shadow container-fluid fixed-bottom" id="cookie-box"
  style=" display:none; background-color:white">
  <div class="row">
    <div class="col-12 pm0" style="">
      <div class="text-center h7 text-secondary mt-2 mx-3" style="line-height: 14px; font-size: 12px">Diese
        Website
        verwendet Cookies, um die Nutzererfahrung zu verbessern
        und eine ordnungsgemäße Funktionalität zu gewährleisten.
      </div>
      <div class="col text-center">
        <button type="submit" id="cookie" class="btn btn-warning font-weigt-bold  my-2"
          style="width: 200px">Akzeptieren</button>
      </div>
    </div>
  </div>
</div>';
} ?>

<script>
  $(document).ready(function() {
    $("#cookie").click(function() {
      $("#cookie-box").fadeOut();
      $("#cookie-placeholder").fadeOut();
      document.cookie = "cookies=1; path=/";
    })
  });
</script>


<div class="container bg-primary invisible" id="cookie-placeholder"
  style="max-width: 1128px;  border-color: white; border-width: 3px; border-style: solid; background-color:black">
  <div class="row">
    <div class="col-12 pm0" style="">
      <div class="text-center h7 text-white mt-2 mx-3" style="line-height: 14px; font-size: 12px">Diese
        Website
        verwendet Cookies, um die Nutzererfahrung zu verbessern
        und eine ordnungsgemäße Funktionalität zu gewährleisten.
      </div>
      <div class="col text-center">
        <button type="submit" id="cookie" class="btn btn-dark font-weigt-bold custom-btn-1 my-2"
          style="width: 200px">Akzeptieren</button>
      </div>
    </div>
  </div>
</div>

<script>
  var myEle = document.getElementById("cookie-box");

  if (myEle) {
    setTimeout(() => {
      $("#cookie-box").fadeIn(500);
    }, 1000);

  } else {
    $("#cookie-placeholder").css("display", "none");
  }
</script>