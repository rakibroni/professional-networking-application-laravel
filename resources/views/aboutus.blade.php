@extends('layouts.app')

@section('content')

  <style>
    .navbar {
      background-color: white !important;
      box-shadow: 0 0 10px rgba(1, 1, 1, 0.1);
    }

  </style>

  <!-- CONTENT -->
  <style>
    .heading-underline {
      background-color: #ff9721 !important;
      height: 5px;
      width: 100%;
    }

    .big-comma {
      height: 90px;
      position: absolute;
      top: 0%;
      left: 10%;
      transform: translate(-50%, -50%);
      z-index: 0;
    }

    @media (max-width:768px) {
      .big-comma {
        top: 10%;
        left: 20%;
      }
    }

    .font-weight-bold {
      font-weight: 600;
    }

    .feature-img {
      position: absolute;
      width: 55%;
      height: 55%;
      transform: translate(-50%, -50%);
    }

    .team-img {
      height: 250px;
    }

    .team-img-info {
      opacity: 0;
      background-color: rgba(255, 255, 255, 0.7);
      width: 85%;
      height: 85%;
    }

    .team-img-info:hover {
      opacity: 1;
    }

  </style>

  <div class="container" style="padding: 0; z-index: 2; margin-top: 120px;
    position: relative;">
    <div class="mx-1 mx-md-2">
      <div class="row pm0">
        <div class="col-xl-5 col-sm-6 d-sm-block d-none">
          <div class="bg-secondary">
            <img src="{{ asset('images/ff-building.png') }}" class="img-fluid" style="width: 100%">
          </div>
        </div>
        <div class="col-sm-1 d-xl-block d-sm-none"></div>
        <div class="col-sm-6 display-6 mb-3">
          <div class="">
            <div class="d-inline-block mt-0 mt-sm-3 mt-xl-5 mb-3">ÜBER UNS
              <div class="heading-underline bg-cura"></div>
            </div>
            <div class="h4 text-secondary mt-4 d-md-block d-none" style="font-weight: 500">
              Curawork wird das Berufsnetzwerk rund um professionelle Pflege.<br>
              Von unserer Vision, unserem Angebot und unserem Team lest Ihr hier.
            </div>
            <div class="h6 text-secondary mt-2 d-md-none d-block" style="font-weight: 500">
              Curawork wird das Berufsnetzwerk rund um professionelle Pflege.<br>
              Von unserer Vision, unserem Angebot und unserem Team lest Ihr hier.
            </div>
          </div>
        </div>

        <div class="col-sm-6 mb-5">
          <div class="d-block d-sm-none">
            <img src="{{ asset('images/ff-building.png') }}" style="width: 100%">
          </div>
        </div>

        <div class="col-12 my-5 text-center text-secondary position-relative ">
          <img src="{{ asset('images/big-comma.svg') }}" alt="" class="big-comma">
          <div class="position-relative h4 mx-md-5 mx-0"
            style="z-index: 1; font-style: italic; font-weight:300 !important">
            Unsere Vision ist es, alle Pflegeberufe näher zusammenzubringen und die Professionalisierung des Berufsfeldes
            zu fördern. Mit Curawork machen Pflegekräfte einen wichtigen Schritt in Richtung Neugestaltung der Pflege!
          </div>
        </div>

        <div class="col-12 mt-3 d-md-none">
          <div id="carouselExampleIndicators" class="p-5 p-sm-5 p-md-5 carousel slide" data-bs-ride="carousel"
            data-bs-touch="false">
            <style>
              .indicator {
                height: 20px !important;
                width: 20px !important;
                border-radius: 50% !important;
                background-color: #ff9721 !important
              }

              .carousel-item {
                height: 48vw;
                overflow-x: visible;
              }

              .indicator {

                height: 20px !important;
                width: 20px !important;
                margin-left: 18px !important;
              }

            </style>
            <div class="carousel-indicators" style="top: 80%; overflow-x:visible;">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                class="active indicator" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"
                class="indicator"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
                class="indicator"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"
                class="indicator"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ asset('images/connect-aboutus.svg')}}" class="d-block w-100" alt="...">
                  </div>
                  <div class="col-6 position-relative">
                    <img src="{{ asset('images/jobs-aboutus.svg') }}" class="d-block w-100 invisible" alt="...">
                    <div class="d-sm-block d-none">
                      <div class="center text-center h4 font-weight-bold text-secondary">Vernetzen</div>
                    </div>
                    <div class="d-block d-sm-none">
                      <div class="center text-center h6 font-weight-bold text-secondary">Vernetzen</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ asset('images/jobs-aboutus.svg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="col-6 position-relative">
                    <img src="{{ asset('images/jobs-aboutus.svg') }}" class="invisible d-block w-100" alt="...">
                    <div class="d-sm-block d-none">
                      <div class="center text-center h4 font-weight-bold text-secondary">Jobs finden</div>
                    </div>
                    <div class="d-block d-sm-none">
                      <div class="center text-center h6 font-weight-bold text-secondary">Jobs finden</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item ">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ asset('images/educate-aboutus.svg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="col-6 position-relative">
                    <img src="{{ asset('images/educate-aboutus.svg') }}" class="d-block w-100 invisible" alt="...">
                    <div class="d-sm-block d-none">
                      <div class="center text-center h4 font-weight-bold text-secondary">Weiterbilden</div>
                    </div>
                    <div class="d-block d-sm-none">
                      <div class="center text-center h6 font-weight-bold text-secondary">Weiterbilden</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-6">
                    <img src="{{ asset('images/chat-aboutus.svg') }}" class="d-block w-100" alt="...">
                  </div>
                  <div class="col-6 position-relative">
                    <img src="{{ asset('images/chat-aboutus.svg') }}" class="d-block w-100 invisible" alt="...">
                    <div class="d-sm-block d-none">
                      <div class="center text-center h4 font-weight-bold text-secondary">Austauschen</div>
                    </div>
                    <div class="d-block d-sm-none">
                      <div class="center text-center h6 font-weight-bold text-secondary">Austauschen</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" style="border-radius: 50%; background-color:#ff9721"
                aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" style="border-radius: 50%; background-color:#ff9721"
                aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>


          <div class="invisible" style="height: 50px !important;">.</div>




          <div class="text-center">
            <div class="h4 font-weight-bold">Warum Curawork?</div>
            <div class="text-secondary">Die Pflege muss endlich als eigenständige, hoch qualifizierte Profession
              anerkannt werden.
              Unsere Plattform ermöglicht den Aufbau eines Karrierenetzwerks und regt den berufsspezifischen Austausch
              an.
              Zusätzlich bieten wir Weiterbildungsmöglichkeiten und einen einfachen und transparenten
              Job-Findungs-Prozess.</div>
          </div>
        </div>
        <div class="col-12 my-2">
          <div class="invisible" style="height: 50px !important;">.</div>
          <div class="d-md-block d-none">
            <div class="row">
              <div class="col-5">
                <div class="mt-0 text-left">

                  <div class="h4 font-weight-bold">Warum Curawork?</div>
                  <div class="text-secondary" style="font-size: 17px">Die Pflege muss endlich als eigenständige, hoch
                    qualifizierte Profession
                    anerkannt werden.
                    Unsere Plattform ermöglicht den Aufbau eines Karrierenetzwerks und regt den berufsspezifischen
                    Austausch an.
                    <br>Zusätzlich bieten wir Weiterbildungsmöglichkeiten und einen einfachen und transparenten
                    Job-Findungs-Prozess.
                  </div>
                </div>
              </div>
              <div class="col-1"></div>
              <div class="col-6">


                <div class="mt-0 text-left position-relative ">
                  <div class="feature-img" style="top: 25%; left:25%">
                    <img class="h-100" src="{{ asset('images/connect-aboutus.svg') }}"><span
                      class="ms-3 font-weight-bold h6 text-secondary d-inline-block"><br
                        class="d-block d-md-none">Vernetzen<span class="invisible">ass</span></span>
                  </div>
                  <div class="feature-img" style="top: 95%; left:25%">
                    <img class="h-100" src="{{ asset('images/chat-aboutus.svg') }}"><span
                      class="ms-3 font-weight-bold h6 text-secondary"><br class="d-block d-md-none">Austauschen</span>
                  </div>
                  <div class="feature-img" style="top: 25%; left:75%">
                    <img class="h-100" src="{{ asset('images/jobs-aboutus.svg') }}"><span
                      class="ms-3 font-weight-bold h6 text-secondary d-inline-block"><br class="d-block d-md-none">Jobs
                      finden<span class="invisible">a</span></span>
                  </div>
                  <div class="feature-img" style="top: 95%; left:75%">
                    <img class="h-100" src="{{ asset('images/educate-aboutus.svg') }}"><span
                      class="ms-3 font-weight-bold h6 text-secondary"><br class="d-block d-md-none">Weiterbilden</span>
                  </div>

                  <div class="h4 font-weight-bold invisible">Warum Curawork?</div>
                  <div class="text-secondary  invisible">Die Pflege muss endlich als eigenständige, hoch qualifizierte
                    Profession anerkannt werden.
                    Unsere Plattform ermöglicht den Aufbau eines Karrierenetzwerks und regt den berufsspezifischen
                    Austausch an.
                    Zusätzlich bieten wir Weiterbildungsmöglichkeiten und einen einfachen und transparenten
                    Job-Findungs-Prozess.</div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div style="height: 30px" class="invisible d-none d-md-block "></div>
        <div class="col-xl-5 col-md-6 mt-md-5 mt-0">
          <img src="{{ asset('images/accelerator.png') }}" class="mt-3" alt="" style="width:100%">
        </div>

        <div class="col-1 d-xl-block d-none"></div>
        <div class="col-md-6 mt-3">
          <div class="mt-5 d-md-block d-none">
            <div class="d-md-none d-lg-block bg-primary invisible" style="height: 20px">.</div>
            <div class="h4 font-weight-bold h4 mt-3">Wer sind Wir?</div>
            <div class="mt-3 text-secondary " style="font-size: 17px">Wir sind Anfang 2020 als ein junges Startup aus
              Bielefeld gestartet.<br>
              Unterstützt werden wir von der Founders Foundation, einer Tochtergesellschaft der Bertelsmann Stiftung,
              dem NRW-Landesministerium und diversen Experten aus der Pflegebranche.</div>
          </div>
          <div class="mt-5 d-md-none text-center">
            <div class="h4 font-weight-bold">Wer sind Wir?</div>
            <div class="mt-3 text-secondary ">Wir sind Anfang 2020 als ein junges Startup aus Bielefeld gestartet.<br>
              Unterstützt werden wir von der Founders Foundation, einer Tochtergesellschaft der Bertelsmann Stiftung,
              dem NRW-Landesministerium und diversen Experten aus der Pflegebranche.</div>
          </div>
        </div>

        <div style="height: 50px" class="invisible"></div>
        <div class="col-12 my-sm-5 my-3 display-5 text-center font-weight-bold">
          Unser Team
        </div>

        <?php $du = 'Wenn Du Teil unseres Teams werden möchtest, schicke uns einfach eine E-Mail mit Deinen
        Bewerbungsunterlagen zu.'; ?>
        <!-- TEAM IMG DESKTOP -->
        <div class="d-xl-block d-none">
          <div class="col-12">
            <div class="d-flex justify-content-between">
              <?php Helper::printTeamIMG('desktop', 'NNANGE', 'AWONG', 'FRONTEND <br> DEVELOPER'); ?>
              <?php Helper::printTeamIMG('desktop', 'FELIX', 'VON<br>MINCKWITZ', 'COO & <br> CO-FOUNDER');
              ?>
              <?php Helper::printTeamIMG('desktop', 'MOJO', '', 'HEALTH MANAGEMENT'); ?>
              <?php Helper::printTeamIMG('desktop', 'JAKOB', 'PODKRAJAC', 'CTO & <br> CO-FOUNDER'); ?>

            </div>

          </div>
          <div class="col-12 my-4">
            <div class="d-flex justify-content-between">
              <?php Helper::printTeamIMG('desktop', 'NILS', 'BUßMANN', 'HEAD OF CONTENT'); ?>
              <?php Helper::printTeamIMG('desktop', 'CHRISTIANE', 'GRÄFIN MATUSCHKA', 'ADVISORY BOARD');
              ?>
              <?php Helper::printTeamIMG('desktop', 'RAUL', 'KONNERTH', 'CEO & <br> CO-FOUNDER'); ?>
              <div class="team-img position-relative">
                <div class="team-img-info center" style="opacity: 1">
                  <div class="row mt-4 mx-3">
                    <div class="text-center col-12 h3 font-weight-bold">
                      Du
                    </div>
                    <div class="text-center col-12 h4 text-secondary font-weight-bold" style="font-size: 14px">
                      <?php echo $du; ?>
                    </div>
                  </div>
                </div>
                <img src="{{ asset('images/empty.png') }}" alt="" style="height:100%">
              </div>
            </div>
          </div>

        </div>
        <!-- TEAM IMG DESKTOP END -->

        <!-- TEAM IMG TABLET -->
        <div class="d-xl-none d-lg-block d-md-block d-sm-block d-none">
          <div class="row">
            <?php Helper::printTeamIMG('tablet', 'NNANGE', 'AWONG', 'FRONTEND <br> DEVELOPER'); ?>
            <?php Helper::printTeamIMG('tablet', 'FELIX', 'VON<br>MINCKWITZ', 'COO & <br> CO-FOUNDER'); ?>
          </div>
          <div class="row mt-4">
            <?php Helper::printTeamIMG('tablet', 'MOJO', '', 'HEALTH MANAGEMENT'); ?>
            <?php Helper::printTeamIMG('tablet', 'JAKOB', 'PODKRAJAC', 'CTO & <br> CO-FOUNDER'); ?>
          </div>
          <div class="row mt-4">
            <?php Helper::printTeamIMG('tablet', 'RAUL', 'KONNERTH', 'CEO & <br> CO-FOUNDER'); ?>
            <?php Helper::printTeamIMG('tablet', 'NILS', 'BUßMANN', 'HEAD OF CONTENT'); ?>
          </div>
          <div class="row mt-4">
            <?php Helper::printTeamIMG('tablet', 'CHRISTIANE', 'GRÄFIN MATUSCHKA', 'ADVISORY BOARD'); ?>
            <div class="col-6">
              <div class="position-relative">
                <div class="team-img-info center" style="opacity: 1">
                  <div class="row mt-5 mx-3">
                    <div class="text-center col-12  display-3  font-weight-bold">
                      Du
                    </div>
                    <div class="mt-3 col-12 h6 text-center text-secondary font-weight-bold" style="font-size: 2.7vw">
                      <?php echo $du; ?>
                    </div>
                  </div>
                </div>
                <img src="{{ asset('images/empty.png') }}" alt="" class="img-fluid" style="width: 100%">
              </div>
            </div>
          </div>

        </div>

        <!-- TEAM IMG MOBILE -->
        <div class="d-block d-sm-none">
          <div class="row">
            <?php Helper::printTeamIMG('mobile', 'NNANGE', 'AWONG', 'FRONTEND <br> DEVELOPER'); ?>
            <?php Helper::printTeamIMG('mobile', 'FELIX', 'VON<br>MINCKWITZ', 'COO & <br> CO-FOUNDER'); ?>
            <?php Helper::printTeamIMG('mobile', 'MOJO', '', 'HEALTH MANAGEMENT'); ?>
            <?php Helper::printTeamIMG('mobile', 'JAKOB', 'PODKRAJAC', 'CTO & <br> CO-FOUNDER'); ?>
            <?php Helper::printTeamIMG('mobile', 'RAUL', 'KONNERTH', 'CEO & <br> CO-FOUNDER'); ?>
            <?php Helper::printTeamIMG('mobile', 'CHRISTIANE', 'GRÄFIN MATUSCHKA', 'ADVISORY BOARD'); ?>
            <?php Helper::printTeamIMG('mobile', 'NILS', 'BUßMANN', 'HEAD OF CONTENT'); ?>
            <div class="col-12 mt-3">
              <div class="position-relative">
                <div class="team-img-info center" style="opacity: 1">
                  <div class="row mt-5 mx-3">
                    <div class="text-center col-12 display-2 font-weight-bold">
                      Du
                    </div>
                    <div class="col-12 text-center text-secondary font-weight-bold" style="font-size: 5.0vw">
                      <?php echo $du; ?>
                    </div>
                  </div>
                </div>
                <img src="{{ asset('images/empty.png') }}" alt="" class="img-fluid" style="width: 100%">
              </div>
            </div>
          </div>
        </div>
        <!-- TEAM IMG MOBILE END -->
      </div>
    </div>


  </div>
  </div>
  </div>

@endsection
