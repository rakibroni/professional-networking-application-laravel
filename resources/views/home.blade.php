@extends('layouts.app')



<?php
$svgNetwork = file_get_contents('images/test2.svg');
$svgConnect = file_get_contents('images/connect.svg');
$svgChat = file_get_contents('images/chat.svg');
$svgNews = file_get_contents('images/news.svg');

$instaLink = 'https://www.instagram.com/curaworkonline/';
$facebookLink = 'https://www.facebook.com/curawork.online/';
$linkedInLink = 'https://de.linkedin.com/company/curawork';
$twitterLink = 'https://twitter.com/curawork1';
?>

@section('content')
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-VRY0VCHD7Q"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-VRY0VCHD7Q');
  </script>
  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '316519853140120');
    fbq('track', 'PageView');






    var playstoreLink = 'https://play.google.com/store/apps/details?id=webviewgold.curawork&gl=DE';
    var appstoreLink = 'https://apps.apple.com/de/app/curawork/id1580785461';


    function appstore() {
      window.open(appstoreLink, '_blank');
    }

    function playstore() {
      window.open(playstoreLink, '_blank');
    }

    function register() {
      window.location.href ="/register";
    }

  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=316519853140120&ev=PageView&noscript=1" /></noscript>




  <div>

    <div style="width:100%; margin-top: 15px;" alt="" class="mb-2 d-md-none d-sm-none d-block">
      {!! $svgNetwork !!}
    </div>
    <div class="container-fluid position-absolute pm0" style="position: absolute; top: 0px; z-index: 0;">

      <div style="float:right;width: 820px; height: 820px" alt="" class="d-xxl-block d-none">
        {!! $svgNetwork !!}
      </div>
      <div style="float: right; height: 720px; width: 720px" alt="" class=" d-xxl-none d-xl-block d-none">
        {!! $svgNetwork !!}
      </div>
      <div style="float: right; height: 520px; width: 520px" alt="" class=" d-xl-none d-lg-block d-md-none d-none">
        {!! $svgNetwork !!}</div>
      <div style="float: right; height: 450px; width: 450px" alt="" class="d-lg-none d-md-block d-sm-none d-none">
        {!! $svgNetwork !!}
      </div>
      <div style="float: right; height: 350px; width: 350px" alt="" class=" d-md-none d-sm-block d-none">
        {!! $svgNetwork !!}
      </div>
    </div>
    <div class="container" style="padding: 0; z-index: 2;
                      position: relative;">
      <div class="mx-1 mx-md-2">
        <div class="row pm0">
          <div class="d-sm-block d-none">

            <div class="col-12 my-5 invisible">.</div>
            <div class="col-12 my-5 invisible">.</div>
          </div>
          <div class="row pm0">
            <div class="col-md-7 col-xl-7">
              <div class="display-4 mt-3" style="font-weight: 600;">
                <span class="h1">Das Berufsnetzwerk</span>
                <div class="display-6" style="font-weight: 600; line-height: 35px; margin-bottom: 10px">für
                  professionelle
                  Pflege</div>
              </div>
            </div>
          </div>
          <div class="row pm0">
            <div class="col-md-6 mt-sm-4 mt-0  text-center mt-4">
              <style>
                .underline-on-hover {
                  text-decoration: underline;
                }

                .pointer-on-hover:hover {
                  cursor: pointer !important;
                }


                .custom-breakpoint {
                  display: block !important;
                }

                .sm-store-btns {
                  display: none !important;
                }

                @media (max-width: 385px) {
                  .custom-breakpoint {
                    display: none !important;
                  }

                  .sm-store-btns {
                    display: block !important;
                  }
                }

              </style>
              <div class="text-start text-secondary mt-2 mt-lg-5">
                Jetzt <span class="fw-bold">kostenlos</span> downloaden und <span
                  class="underline-on-hover pointer-on-hover" onclick="register()">registrieren:</span>
              </div>


              <div class="custom-breakpoint">
                <div class="d-sm-block d-none">
                  <div class="d-flex justfiy-content-start mt-3 me-3">
                    <div>
                      <img onclick="playstore()" class="pointer-on-hover" src="{{ asset('images/playstore.png') }}" alt=""
                        style="height: 60px !important">
                    </div>
                    <div>
                      <img class="ms-3 pointer-on-hover"
                        onclick="appstore()"
                        src="{{ asset('images/appstore.png') }}" alt="" style="height: 60px !important">
                    </div>
                  </div>
                </div>




                <div class="d-block d-sm-none">
                  <div class="d-flex justfiy-content-start mt-3 me-3">
                    <div>
                      <img class="pointer-on-hover"
                        onclick="playstore()"
                        src="{{ asset('images/playstore.png') }}" alt="" style="height: 50px !important">
                    </div>
                    <div>
                      <img onclick="appstore()" class="ms-3 pointer-on-hover" src="{{ asset('images/appstore.png') }}" alt=""
                        style="height: 50px !important">
                    </div>
                  </div>
                </div>
              </div>

              <div class="sm-store-btns">
                <div class="mt-4">
                  <img class="pointer-on-hover"
                  onclick="playstore()"
                  src="{{ asset('images/playstore.png') }}" alt="" style="height: 55px !important">
                  <img onclick="appstore()" class="mt-3 pointer-on-hover" src="{{ asset('images/appstore.png') }}" alt=""
                  style="height: 55px !important">
                </div>
              </div>
            </div>
          </div>
          <div class="invisible display-3 d-xl-block d-none">.</div>
          <div class="invisible display-6 d-xl-block d-none">.</div>
          <div class="row pm0">
            <div class="invisible my-2">.</div>
            <div class="col-12 mt-5 mb-2 text-secondary">
              Wir werden unterstützt durch:
            </div>

            <div class="col-12 mb-3">
              <div class="bg-secondary" style="width: 100%; height: 2px"></div>
            </div>

            <div class="d-none col-12 d-lg-flex justify-content-between d-none d-md-none">
              <a class="partner-logo-link " href="https://foundersfoundation.de/" target="_blank">
                <img src="{{ asset('images/FFB.png') }}" class="supporter " alt="..."
                  style="margin-left: 0px !important">
              </a>

              <a class="partner-logo-link" href="https://startups.nrw/public/" target="_blank">
                <img src="{{ asset('images/startupsnrw.png') }}" class="supporter " alt="...">
              </a>

              <a class="partner-logo-link" href="https://www.ptj.de/" target="_blank">
                <img src="{{ asset('images/juelich.png') }}" class="supporter " alt="...">
              </a>

              <a class="partner-logo-link" href="https://www.wirtschaft.nrw/" target="_blank">
                <img src="{{ asset('images/ministerium.png') }}" class="supporter " alt="...">
              </a>

              <a class="partner-logo-link" href="https://www.gruenderstipendium.nrw/" target="_blank">
                <img src="{{ asset('images/gruendi.jpg') }}" class="supporter" alt="...">
              </a>

            </div>
            <div class="col-12 d-lg-none d-md-block ">
              <div class="d-flex justify-content-between ">
                <a class="partner-logo-link " href="https://foundersfoundation.de/" target="_blank">
                  <img src="{{ asset('images/FFB.png') }}" class="supporter " alt="..."
                    style="margin-left: 0px !important">
                </a>

                <a class="partner-logo-link" href="https://startups.nrw/public/" target="_blank">
                  <img src="{{ asset('images/startupsnrw.png') }}" class="supporter " alt="...">
                </a>

                <a class="partner-logo-link  hide" href="https://www.ptj.de/" target="_blank">
                  <img src="{{ asset('images/juelich.png') }}" class="supporter " alt="...">
                </a>
              </div>

              <div class="d-flex justify-content-between mt-3 ">
                <a class="partner-logo-link" href="https://www.wirtschaft.nrw/" target="_blank">
                  <img src="{{ asset('images/ministerium.png') }}" class="supporter custom-height" alt="...">
                </a>
                <a class="partner-logo-link _show" href="https://www.ptj.de/" target="_blank">
                  <img src="{{ asset('images/juelich.png') }}" class="supporter " alt="...">
                </a>
                <a class="partner-logo-link hide" href="https://www.gruenderstipendium.nrw/" target="_blank">
                  <img src="{{ asset('images/gruendi.jpg') }}" class="supporter" alt="...">
                </a>
                <a class="partner-logo-link d-sm-block d-none  invisible" href="https://www.gruenderstipendium.nrw/"
                  target="_blank">
                  <img src="{{ asset('images/FFB.png') }}" class="supporter" alt="...">
                </a>
              </div>
              <div class="d-flex justify-content-between mt-2 ">

                <a class="partner-logo-link _show" href="https://www.gruenderstipendium.nrw/" target="_blank">
                  <img src="{{ asset('images/gruendi.jpg') }}" class="supporter" alt="...">
                </a>

              </div>
            </div>



          </div>
          <div class="row pm0" id="connect">
            <style>
              .about-hover:hover {
                cursor: pointer !important;
              }

            </style>
            <div class="col-sm-6 mt-5 col-left ">
              <div class="col-img " style="pointer-events: none">
                <object id="animated-svg1" type="image/svg+xml" data="{{ asset('images/connect.svg') }}"></object>
              </div>
            </div>
            <div class="col-sm-6 mt-5 position-relative col-right ">
              <div class="center d-none d-md-block " style="top: 60%">
                <div class="h2 mx-xxl-0 mx-3">Vernetzen und Diskutieren</div>
                <div class="text-secondary mt-3 mx-xxl-0 mx-3">
                  Werde auch Du Teil der Curawork-Community: <br>Hier kannst Du Dich mit Deinen Kolleg*innen und weiteren
                  Pflegeexpert*innen vernetzen, austauschen und über aktuelle Themen und Probleme in der Pflege
                  diskutieren.
                </div>
                <div  class="about-hover h4 text-primary mt-3 mx-xxl-0 mx-3" onclick="register()">Registrieren<img
                    src="{{ asset('images/arrow.svg') }}" alt="" class="mx-2"></div>
              </div>
              <div class="center d-none d-sm-block d-md-none" style="top: 60%">
                <div class="h4 mx-xxl-0 mx-1">Vernetzen und Diskutieren</div>
                <div class="h6 text-secondary mt-1 mx-xxl-0 mx-1">
                  Werde auch Du Teil der Curawork-Community: Hier kannst Du Dich mit deinen Kolleg*innen und weiteren
                  Pflegeexpert*innen vernetzen, austauschen und über aktuelle Themen und Probleme in der Pflege
                  diskutieren.
                </div>
                <div  class="about-hover h4 text-primary mt-3 mx-xxl-0 " onclick="register()">Registrieren<img
                    src="{{ asset('images/arrow.svg') }}" alt="" class="mx-2"></div>
              </div>
            </div>
            <div class="d-block d-sm-none">
              <div class="h2 mx-xxl-0 mx-1">Vernetzen und Diskutieren</div>
              <div class="text-secondary mt-1 mx-xxl-0 mx-1">
                Werde auch Du Teil der Curawork-Community: Hier kannst Du Dich mit Deinen Kolleg*innen und weiteren
                Pflegeexpert*innen vernetzen, austauschen und über aktuelle Themen und Probleme in der Pflege diskutieren.
              </div>
              <div  class="about-hover h4 text-primary mt-3 mx-xxl-0 " onclick="register()">Registrieren<img
                  src="{{ asset('images/arrow.svg') }}" alt="" class="mx-2"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="display-2 invisible d-lg-none ">.</div>
      <div class="row pm0" id="jobs">
        <div class="invisible my-2 display-3 d-sm-block d-none">.</div>
        <div class="invisible my-2 display-4 d-sm-none d-block">.</div>
        <div class="h2  text-center my-2 my-sm-0">Passende Job-Angebote erhalten </div>
        <div class="invisible my-2 display-5 d-sm-block d-none">.</div>
      </div>
      <div class="display-2 invisible d-lg-none  d-sm-block d-none">.</div>

      <div class="row pm0">
        <style>
          .landing-text {
            font-size: 16px !important;
          }

          @media (max-width:768px) {
            .landing-text {
              font-size: 16px !important;
            }
          }

          @media (min-width:992px) {
            .landing-text {
              font-size: 20px !important;
            }
          }

        </style>
        <div class="d-none d-sm-block col-6 mt-5 position-relative">
          <div class="center">
            <div class="row mx-xxl-0 mx-2" id="arrow0-xl" style="opacity:0">

              <div class="col-12">
                <img id="arrow0-img-xl" src="{{ asset('images/arrow0.svg') }}" alt="" class="arrow-img"
                  style="margin-left: -150px">
              </div>
              <div class="col-12">
                <div class="text-secondary landing-text">
                  <div class="mx-xxl-5 mx-0">Es geht um Dich: Bestimme wo, und zu welchen Konditionen Du arbeiten
                    möchtest, Lebenslauf und Anschreiben sind von gestern!</div>
                </div>
              </div>
            </div>


            <div class="row mt-3 mx-xxl-0 mx-2" id="arrow1-xl" style="opacity:0">
              <div class="col-12">
                <img id="arrow1-img-xl" src="{{ asset('images/arrow1.svg') }}" alt="" class="arrow-img"
                  style="margin-left: -150px">
              </div>
              <div class="col-12">
                <div class="text-secondary landing-text">
                  <div class="mx-xxl-5 mx-0">Zurücklehnen und Abwarten: Du bekommst passende Job-Angebote von Top
                    Arbeitgebern direkt in Dein Postfach.</div>
                </div>
              </div>
            </div>


            <div class="row mt-3 mx-xxl-0 mx-2" id="arrow2-xl" style="opacity:0">
              <div class="col-12">
                <img id="arrow2-img-xl" src="{{ asset('images/arrow2.svg') }}" alt="" class="arrow-img"
                  style="margin-left: -150px">
              </div>
              <div class="col-12">
                <div class="text-secondary landing-text">
                  <div class="mx-xxl-5 mx-0">Du entscheidest: Führe Bewerbungsgespräche und wähle nur den Job aus, der
                    Deinen Vorstellungen gerecht wird.</div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-6 mt-5">
          <div class="col-img" style="pointer-events: none">
            <object id="animated-svg" type="image/svg+xml" data="{{ asset('images/chat.svg') }}"></object>
          </div>
        </div>
        <div class="d-block d-sm-none col-12 mt-5 position-relative pm0">
          <div class="mt-5">
            <div class="row mx-xxl-0 mx-1" id="arrow0" style="opacity:0">
              <div class="col-12">
                <img id="arrow0-img" style="margin-left: -150px !important" src="{{ asset('images/arrow0.svg') }}"
                  alt="" class="arrow-img">
              </div>
              <div class="col-12">
                <div class="text-secondary h6">
                  <div class="mx-xxl-5 mx-0">Es geht um Dich: Bestimme wo, und zu welchen Konditionen Du arbeiten
                    möchtest, Lebenslauf und Anschreiben sind von gestern!</div>
                </div>
              </div>
            </div>


            <div class="row mt-3 mx-xxl-0 mx-2" id="arrow1" style="opacity:0">
              <div class="col-12">
                <img id="arrow1-img" style="margin-left: -150px !important" src="{{ asset('images/arrow1.svg') }}"
                  alt="" class="arrow-img">
              </div>
              <div class="col-12">
                <div class="text-secondary h6">
                  <div class="mx-xxl-5 mx-0">Zurücklehnen und Abwarten: Du bekommst passende Job-Angebote von Top
                    Arbeitgebern direkt in Dein Postfach.</div>
                </div>
              </div>
            </div>


            <div class="row mt-3 mx-xxl-0 mx-2" id="arrow2" style="opacity:0">
              <div class="col-12">
                <img id="arrow2-img" style="margin-left: -150px !important" src="{{ asset('images/arrow2.svg') }}"
                  alt="" class="arrow-img">
              </div>
              <div class="col-12">
                <div class="text-secondary h6">
                  <div class="mx-xxl-5 mx-0">Du entscheidest: Führe Bewerbungsgespräche und wähle nur den Job aus, der
                    Deinen Vorstellungen gerecht wird.</div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="row pm0" id="news" >
        <div class="invisible my-2 display-1">.</div>
        <div class="col-sm-6 mt-5 col-left">
          <div class="col-img">
            <object id="animated-svg2" type="image/svg+xml" data="{{ asset('images/news.svg') }}"></object>
          </div>
        </div>
        <div class="col-sm-6 mt-5 position-relative col-right">
          <div class="center d-none d-md-block">
            <div class="mx-xxl-0 mx-3 h2">Pflege-News, Weiterbildungen und kurze Lerninhalte</div>
            <div class="mx-xxl-0 mx-3 text-secondary mt-3">
              In Deinem Feed findest Du tagesaktuelle Informationen zum Thema Pflege und erhältst hilfreiche Tipps
              von
              Expert*innen, die Deinen Arbeitsalltag erleichtern können. <br>Außerdem bieten wir zeitnah digitale Fort-und
              Weiterbildungen mit Zertifikat an!
            </div>
            <div class="pointer-on-hover mx-xxl-0 mx-3 h4 text-primary mt-3" onclick="register()">Registrieren<img class="mx-2" src="{{ asset('images/arrow.svg') }}"
                alt=""></div>
          </div>
          <div class="center d-none d-sm-block d-md-none" style="top: 60%">
            <div class="h4 mx-xxl-0 mx-1">Pflege-News, Weiterbildungen und kurze Lerninhalte</div>
            <div class="h6 text-secondary mt-1 mx-xxl-0 mx-1">
              In Deinem Feed findest Du tagesaktuelle Informationen zum Thema Pflege und erhältst hilfreiche Tipps
              von
              Expert*innen, die Deinen Arbeitsalltag erleichtern können. <br>Außerdem bieten wir zeitnah digitale Fort-und
              Weiterbildungen mit Zertifikat an!
            </div>
            <div class="pointer-on-hover h4 text-primary mt-3 mx-xxl-0 mx-1" onclick="register()">Registrieren<img class="mx-2" src="{{ asset('images/arrow.svg') }}"
                alt="">
            </div>
          </div>
          <div class="d-block d-sm-none">
            <div class="mx-xxl-0 mx-1 h2">Pflege-News, Weiterbildungen und kurze Lerninhalte</div>
            <div class="mx-xxl-0 mx-1 text-secondary mt-3">
              In Deinem Feed findest Du tagesaktuelle Informationen zum Thema Pflege und erhältst hilfreiche Tipps
              von
              Expert*innen, die Deinen Arbeitsalltag erleichtern können. <br>Außerdem bieten wir zeitnah digitale Fort-und
              Weiterbildungen mit Zertifikat an!
            </div>
            <div class="pointer-on-hover mx-xxl-0 mx-1 h4 text-primary mt-3" onclick="register()">Registrieren<img class="mx-2" src="{{ asset('images/arrow.svg') }}"
                alt="" ></div>
          </div>
        </div>
        <div class="invisible my-2 display-1">.</div>
      </div>
      <div class="display-2 invisible d-lg-none  d-sm-block d-none">.</div>
      <div class="display-2 invisible d-md-none  d-sm-block d-none">.</div>
      <div class="display-2 invisible d-sm-none  d-sm-block d-none">.</div>
    </div>
  </div>
  </div>


@endsection
