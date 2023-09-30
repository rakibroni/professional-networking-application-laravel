<style>
    .profile-header{
      font-size: 19px;
    }


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


      .row {
        --bs-gutter-x: 0 !important;
        --bs-gutter-y: 0 !important;
        margin: auto !important;
        max-width: 1128px;
      }

      .InterviewInviteTitle {
        font-weight: 600;
        font-size: 20px;
        color: black;
      }

      .InterviewInviteTitle1 {
        font-weight: 500;
        font-size: 16px;
        color: black;
      }

      .hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);

      }


      .InviteTextNormal {

        font-size: 15px;
        line-height: 20px;
        color: #636466;
      }

      .InviteDropdownBtn {
        color: #BCBBBB;
        background: #FFFFFF;
        font-size: 14px;
        border: 1px solid #BCBBBB;
        box-sizing: border-box;
        border-radius: 6px;
        height: 35px;
        width: 180px;

      }

      .InviteNotNowBtn {
        font-size: 15px;
        height: 36px;
        color: #3685D6;
        background: #FFFFFF;
        border: 1.5px solid #FFFFFF;
        border-radius: 2px;

      }

      .InviteSendBtn {
        font-size: 15px;
        height: 36px;
        color: #FFFFFF;
        background: #3685D6;
        border-radius: 2px
      }

      .InviteSaveBtn {
        color: #3685D6;
        font-weight: 500;
        font-size: 15px
      }


      .bg {
        background-color: #FAFAFA;

      }

      ._br {
        border-radius: 4px;
      }

      @media (max-width: 992px) {
        ._br {
          border-radius: 0px;
        }
      }

      .shadow-md {
        box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.12) !important;
      }


      @media (min-width: 992px) {
        .cura-col-2 {
          width: 33% !important;
        }

        .cura-col-7 {
          width: 67% !important;
        }
      }

      @media (min-width: 768px) {

        .TalentProfileBlue2 {
          line-height: 140% !important;
        }
      }

      .btn-primary {
        background-color: #3685D6 !important;
      }

      .btn-outline-primary {
        border-color: #3685D6 !important;
        color: #3685D6 !important;
      }

      .TalentProfileBlue {
        font-size: 22px;
        font-weight: 500;
        color: #3685D6;
        text-align: center;

      }

      .TalentProfileBlue2 {
        font-size: 15px;
        font-weight: 300;
        color: #3685D6;
        text-align: center;
        line-height: 120%;
      }

      .TalentProfileHeader {
        font-size: 19px;
        font-weight: 500;
        color: black !important;
      }

      .TalentProfileHeader2 {
        font-size: 15px;
        color: #636466;
        line-height: 120%;
      }

      .TalentProfileHeader3 {
        font-size: 14px;
        color: #7F7F7F;
        line-height: 110%;
      }

      .TalentProfileKonditions {
        font-size: 15px !important;
        color: #636466;
        line-height: 120%;
        font-weight: 500;
      }

      .TalentProfileText {
        font-size: 15px;
        font-weight: 500;
        line-height: 110%;

      }

      .TalentProfileText2 {
        font-size: 15px;
        font-weight: 500;
        line-height: 110%;

      }

      .TalentProfileText3 {
        font-size: 15px;
        font-weight: 500;
        line-height: 110%;
        color: #3685D6;

      }

      .TalentProfileTextItalic {
        font-size: 16px;
        line-height: 130%;
        color: #7F7F7F;
        font-style: italic;

      }

      .TalentProfileTextItalic2 {
        font-size: 14px;
        line-height: 130%;
        color: #A9A9A9;
        font-style: italic;

      }

      .TalentProfileName {
        font-size: 16px;

      }

      .TalentProfileRole {
        font-size: 13px;
        color: #BCBBBB;

      }

      .text-wrap {
        background: #FFFFFF;
        border: 1.5px solid #3685D6;
        box-sizing: border-box;
        border-radius: 5px;

      }

      .TextWrapStyle {
        font-size: 15px;
        color: #3685D6;
        font-weight: 500;

      }

    </style>

    </head>

    <div style="min-height: 101vh" class="">








      <!-- Modal -->
      <div class="modal" id="InviteBtn" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">

            <!-- Header -->

            <div class="modal-header d-block">
              <div class="row">
                <div class="d-flex justify-content-between">
                  <div class="InterviewInviteTitle col-sm-6 col-lg-7 col-10 mt-1">Interview Einladung</div>
                  <div class="dropdown col-sm-3 col-lg-4 d-sm-block d-none text-end">
                    <a class="btn dropdown-toggle InviteDropdownBtn mt-1" href="#" role="button" id="dropdownMenuLink"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      Vorlage auswählen
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Fachkraft</a></li>
                      <li><a class="dropdown-item" href="#">Hilfskraft</a></li>
                      <li><a class="dropdown-item" href="#">PDL</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn-close mt-1" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
            </div>

            <!-- Body -->

            <div class="modal-body">
              <div class="row mt-sm-3">

                <div class="dropdown d-sm-none d-block text-start mb-2">
                  <a class="btn dropdown-toggle InviteDropdownBtn mb-4 mt-1" href="#" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Vorlage auswählen
                  </a>

                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Fachkraft</a></li>
                    <li><a class="dropdown-item" href="#">Hilfskraft</a></li>
                    <li><a class="dropdown-item" href="#">PDL</a></li>
                  </ul>
                </div>

                <div class="col-lg-4 col-12 InterviewInviteTitle1 mb-2 mt-lg-1">Position</div>
                <div class="col-lg-8 col-12 mb-3">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="z.B. Examinierte Pflegekraft">
                  </div>
                </div>

                <div class="col-lg-4 col-12 InterviewInviteTitle1 mb-2 mt-lg-1">Vertragsart</div>
                <div class="col-lg-8 col-12">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="z.B. Vollzeit">
                  </div>
                </div>

                <div class="hr"></div>
                <div class="h5">Unser Angebot</div>
                <div style="color: #BCBBBB" class="mb-4">Dies ist ein unverbindliches Angebot</div>

                <div class="col-lg-4 col-12 InterviewInviteTitle1 mb-2 mt-lg-1">Tarif</div>
                <div class="col-lg-8 col-12">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="z.B. 38.000€ - 40.000€">
                  </div>
                </div>

                <div class="mb-3 mt-3"><span class="InterviewInviteTitle1">Konditionen</span> <span
                    class="InterviewInviteTitle1 fw-normal">(vom Talent)</span></div>
                <div class="row">

                  <div class="col-lg-10">
                    <div class="col-lg-9 form-check mb-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label InviteTextNormal ms-3" for="flexCheckDefault">
                        Keine Nachtschicht
                      </label>
                    </div>
                    <div class="col-lg-9 form-check mb-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label InviteTextNormal ms-3" for="flexCheckDefault">
                        Hund mit zur Arbeit nehmen
                      </label>
                    </div>
                    <div class="col-lg-9 form-check mb-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label InviteTextNormal ms-3" for="flexCheckDefault">
                        Ein Wochenende im Monat frei
                      </label>
                    </div>
                  </div>
                </div>
                <div class="hr"></div>

                <div class="InterviewInviteTitle1 mb-1 mt-1">Deine Aufgaben bei uns sind..</div>
                <textarea style="resize:none" name="" id="" cols="30" rows="10"></textarea>

                <div class="mt-4 mb-1"> <span class="InterviewInviteTitle1">Persönliche Nachricht</span> <span
                    class="InterviewInviteTitle1 fw-normal">(Warum wollen wir dich?)</span> </div>
                <div class="InviteTextNormal mb-2">An: Sandra</div>
                <textarea style="resize:none" name="" id="" cols="30" rows="10"></textarea>


              </div>

            </div>
            <div class="modal-footer px-3">
              <div class="row w-100">
                <div class="col-sm-4 col-lg-3">
                  <button type="button" class="btn fw-bold w-100 InviteSendBtn">Senden</button>
                </div>
                <div class="col-sm-3 col-lg-2 px-0 text-start">
                  <button type="button" class="btn w-100 InviteNotNowBtn">Nicht jetzt</button>
                </div>
                <div class="col-sm-5 col-lg-7 mt-3 mt-sm-2 mt-lg-1 text-center text-sm-end InviteSaveBtn">Als Vorlage
                  speichern ></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <div class="row">

          <div class="col-lg-9 col-12 order-last">
            <div class="row">
              <div class="col-12">
                <!-- Profil Box -->
                <div class="col-12 _br shadow-md p-3 bg-white mt-3 mt-lg-0">
                  <div class="row d-block d-md-none">
                    <div class="col-12 TalentProfileBlue">{{ $talent->match_percentage }}% Match</div>
                    <div class="col-12 TalentProfileBlue2 px-3 mt-2">Das Talent und Ihre Suchkriterien stimmen
                      @if ($talent->match_percentage >= 90) serh gut @else gut @endif überein.</div>
                    <div class="hr"></div>
                  </div>

                  <div class="row">
                    <div class="col-4 col-sm-3 col-md-2 position-relative pointer-on-hover">
                        <div class="blur-border" style="width: 110px ; height: 110px"></div>
                      <div class="text-center"><img src="{{ asset($talent->profile_pic) }}"
                          style="border-radius: 50%; @if(!$talent->hasAcceptedInvite()) filter: blur(4px); @endif;width: 100px; height: 100px"></div>
                    </div>
                    <div class="col-7 col-md-5 ms-3 ms-md-0">
                      <div class="row py-1">
                        <div class="col-12 TalentProfileHeader mt-2"> @if(!$talent->hasAcceptedInvite())  {{ $talent->shortName() }} @else {{ $talent->firstname." ".$talent->lastname }} @endif</div>
                        <div class="col-12 TalentProfileHeader2 mt-1">{{ $talent->position }}</div>
                        <div class="col-12 TalentProfileHeader3 mt-2">{{ $talent->location() }}</div>
                      </div>
                    </div>
                    <div class="d-none d-md-block offset-1 col-4 mt-2">
                      <div class="col-12 TalentProfileBlue">{{ $talent->match_percentage }}% Match</div>
                      <div class="col-12 TalentProfileBlue2 px-3 mt-2">Das Talent und Ihre Suchkriterien
                        stimmen @if ($talent->match_percentage >= 90) serh gut @else gut @endif überein.</div>
                    </div>
                    <div class="row d-lg-none">
                      <div class="col-12 col-sm-4 col-md-3 px-sm-1 px-md-0"> <button type="button"
                          data-bs-toggle="modal" data-bs-target="#InviteBtn"
                          class="btn btn-primary w-100 mt-3">Einladung senden</button></div>
                      <div class="col-12 col-sm-4 col-md-3 px-sm-1"><button class="btn-primary btn jobs-bg mb-3"
                          style="width: 263px; color: #3685D6;background-color:transparent !important; font-size: 15.23pxpx !important"><img
                            style="margin-bottom: 3px" src="{{ asset('images/job_plus.svg') }}" alt=""> Profil
                          speichern</button>
                      </div>
                      <div class="col-12 col-sm-4 offset-md-2 offset-lg-0 px-sm-1 px-md-4"><button type="button"
                          class="btn btn-outline-primary w-100 mt-2 mt-sm-3 bg-white">Als PDF
                          exportieren</button></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="cura-col-2 col-12">
                <!-- Zusammenfassung Box -->
                <div class="row">
                  <div class="pe-lg-3">
                    <div class="row">
                      <div style="height: 100%" class="order-lg-0 order-0 _br shadow-md px-3 py-2 mt-3 mb-3 bg-white">
                        <div class="TalentProfileHeader mb-3">Zusammenfassung</div>

                        <div class="col-12 col-sm-6 col-lg-12 d-inline-block">
                          <div class="row">
                            <div class="col-12 TalentProfileHeader3 mb-2">Berufserfahrung</div>
                            <div class="col-12 TalentProfileText">{{ $talent->years_of_experience }}+ Jahre</div>
                          </div>
                          <div class="row">
                            <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Ausbildung</div>
                            <div class="col-12 TalentProfileText">{{ $talent->position }}</div>
                          </div>
                        </div>

                        <div class="col-12 col-sm-5 col-lg-12 d-inline-block">
                          <div class="row">
                            <div class="col-12 TalentProfileHeader3 mb-2 mt-4 mt-sm-0 mt-lg-4">
                              Weiterbildung</div>
                            <div class="col-12 TalentProfileText">Pflegedienstleitung</div>
                          </div>
                          <div class="row">
                            <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Sprachen</div>
                            <div class="col-12 TalentProfileText mb-2">Deutsch, Englisch, Russisch</div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <!-- Konditionen Box -->
                  <div class="pe-lg-3">
                    <div class="_br shadow-md px-3 py-2 bg-white">
                      <div class="TalentProfileHeader mb-3">Konditionen</div>
                      <li class="TalentProfileKonditions mb-2 ms-3 ">Möglichkeit auf bezahlte Weiterbildungen</li>
                      <li class="TalentProfileKonditions mb-2 ms-3 ">Keine Nachtschicht</li>
                      <li class="TalentProfileKonditions mb-2 ms-3 ">Arbeit an max. 2 Wochenenden des Monats</li>
                    </div>
                  </div>
                </div>
              </div>

              <div class="cura-col-7 col-12">
                <!-- Gewünschte Stelle Box -->
                <div class="row">
                  <div class="col-12 order-lg-0 order-0 _br shadow-md px-3 py-2 mt-3 mb-3 bg-white">
                    <div class="TalentProfileHeader mb-3">Gewünschte Stelle</div>
                    <div class="row">
                      <div class="col-12 col-sm-6 d-inline-block order-1 order-sm-1">
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2">Sucht in</div>
                          <div class="col-12 TalentProfileText">{{ $talent->location() }}</div>
                        </div>
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Vertragsart</div>
                          <div class="col-12 TalentProfileText">{{ $talent->contract_type }}</div>
                        </div>
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Einrichtung</div>
                          <div class="col-12 TalentProfileText">{{ $talent->institution_type }}</div>
                        </div>
                      </div>

                      <div class="col-12 col-sm-5 mb-2 mb-sm-0 d-inline-block order-3 order-sm-2">
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2 mt-4 mt-sm-0">Gehalt (beispielhaft)</div>
                          <div class="col-12 TalentProfileText">35.000€ - 40.000€ </div>
                        </div>
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Abteilung</div>
                          <div class="col-12 TalentProfileText">-{{-- Geriarrie, Chirugie, HNO --}}</div>
                        </div>
                        <div class="row">
                          <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Arbeitsbeginn</div>
                          <div class="col-12 TalentProfileText">{{ $talent->startDateFormatted() }}</div>
                        </div>
                      </div>
                      <div class="col-12 order-2 order-sm-3">
                        <div class="col-12 TalentProfileHeader3 mb-2 mt-4">Position</div>
                        <div class="col-12 TalentProfileText mb-sm-2 mb-0">{{ $talent->position }}
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <!-- Warum Pflege Box -->
                <div class="mb-3">
                  <div class="row _br shadow-md bg-white px-3 py-2">
                    <div class="TalentProfileHeader mb-3">Warum arbeite ich in der Pflege? (beispielhaft)</div>
                    <div class="TalentProfileTextItalic mb-2">...</div>
                  </div>
                </div>

                <!-- Weiterbildung Box -->
                <div class="_br shadow-md px-3 py-2 mb-3 bg-white">
                  <div class="TalentProfileHeader mb-3">Weiterbildungen (beispielhaft)</div>

                  <span class="badge text-wrap TextWrapStyle me-1 mb-2">Schmerzmanagement</span>
                  <span class="badge text-wrap TextWrapStyle me-1 mb-2">Hygienemanagement</span>
                  <span class="badge text-wrap TextWrapStyle me-1 mb-2">Wundmanagement</span>
                  <span class="badge text-wrap TextWrapStyle me-1 mb-2">Außerklinische Beatmungspflege</span>

                  <div class="hr"></div>

                  <!-- Berufserfahrung Box -->
                  <div class="TalentProfileHeader mb-3">Berufserfahrung (beispielhaft)</div>
                  <div class="row">
                    <div class="col-12 col-md-3 col-lg-4 TalentProfileText3 mb-3">02.2018 - heute</div>
                    <div class="col-11 col-md-9 col-lg-8 mb-4 ms-2 ms-sm-4 ms-md-0">
                      <div class="TalentProfileText2 mb-2">
                        Gesundheits- und Kinderkrankenpfleger/in</div>
                      <div class="TalentProfileHeader2 mb-1">Kinderkrankenhaus</div>
                      <div class="TalentProfileTextItalic2 mb-1">Lorem ipsum dolor sit amet, consetetur sadipscing
                        elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                      </div>
                    </div>
                  </div>
                  <div class="row d-none">
                    <div class="col-12 col-md-3 col-lg-4 TalentProfileText3 mb-3">02.2018 - 01-2018</div>
                    <div class="col-11 col-md-9 col-lg-8 mb-4 ms-2 ms-sm-4 ms-md-0">
                      <div class="TalentProfileText2 mb-2">Altenpfleger*in</div>
                      <div class="TalentProfileHeader2 mb-1">Krankenhaus</div>
                      <div class="TalentProfileTextItalic2">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                        erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                      </div>
                    </div>
                  </div>
                  <div class="hr"></div>

                  <div class="TalentProfileHeader mb-3">Bildung (beispielhaft)</div>
                  <div class="row">
                    <div class="col-12 col-md-3 col-lg-4 TalentProfileText3 mb-3">02.2010 - 06-2013</div>
                    <div class="col-11 col-md-9 col-lg-8 mb-4 ms-2 ms-sm-4 ms-md-0">
                      <div class="TalentProfileText2 mb-2">Exam. Gesundheits- und Kinderkrankenpfleger/in</div>
                      <div class="TalentProfileHeader2 mb-1">Ausbildung</div>
                    </div>
                  </div>
                </div>


                <!-- Skills + Sprachen Box -->
                <div class="_br shadow-md px-3 py-2 bg-white">

                  <div class="TalentProfileHeader mb-3">Dokumentationssysteme (beispielhaft)</div>
                  <div class="">
                    <span class="badge text-wrap TextWrapStyle me-1 mb-2">DAN</span>
                    <span class="badge text-wrap TextWrapStyle me-1 mb-2">CareCloud</span>
                    <span class="badge text-wrap TextWrapStyle me-1 mb-2">Excel</span>
                  </div>
                  <div class="hr"></div>
                  <div class="TalentProfileHeader mb-3">Sprachen (beispielhaft)</div>
                  <div class="row">
                    <span class="col-12 TalentProfileKonditions mb-2">Deutsch (Muttersprache)</span>
                    <span class="col-12 TalentProfileKonditions mb-2">Englisch (Verhandlungssicher)</span>
                    <span class="col-12 TalentProfileKonditions mb-3">Russisch (B2)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-12 ps-lg-3 order-first order-lg-last">
            <div class="row">
              <!-- LG btns right side -->
              <div class="col mb-3 order-lg-2">
                <div class="row">
                  <div class="col-12 d-none d-lg-block"><button
                      class="btn-primary btn jobs-bg w-100 @if ($talent->isInvited()) disabled @endif"
                      id="invite_talent_btn_{{ $talent->uuid }}" onclick="inviteTalent('{{ $talent->uuid }}')"
                      style="font-size: 15.23pxpx !important">@if ($talent->isInvited()) Eingeladen @else Einladung senden @endif</button></div>
                  <div class="col-12 d-none d-lg-block mt-2"> <button class="disabled btn-primary btn jobs-bg  w-100"
                      style="color: #3685D6;background-color:white !important; font-size: 15.23pxpx !important">Als
                      PDF exportieren</button></div>
                  <div class="col-12 d-none d-lg-block mt-2">
                    <button class="btn-primary bg-white btn jobs-bg mb-1 w-100 @if ($talent->isSaved()) disabled @endif"
                      id="save_talent_btn_{{ $talent->uuid }}" onclick="saveTalent('{{ $talent->uuid }}')"
                      style="color: #3685D6;background-color:white !important; font-size: 15.23pxpx !important">@if (!$talent->isSaved()) Profil speichern @else Gespeichert @endif</button>
                  </div>
                </div>
              </div>

              <!-- Ansprechpartner Box -->

              <button class="btn w-100 TalentProfileHeader d-lg-none bg-white _br shadow-md" style="font-size: 19px"
                type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false"
                aria-controls="collapseExample3">
                Sie brauchen Hilfe bei der Suche? <img src="{{-- assets/img/TriangleDown.svg --}}"
                  class="d-none align-middle mb-1 ms-0 ms-sm-1" alt="" style="width: 16px; height: 16px">
              </button>
              <div class="collapse d-lg-none bg-white _br shadow-md" id="collapseExample3">
                <div class="box">
                  <div class="row">
                    <div class="col-4 col-sm-3 mt-3 mb-3">
                      <div class="text-center"><img src="{{ asset('images/nils.png') }}" alt=""
                          style="width: 110px; height: 110px"></div>
                    </div>
                    <div class="col-8 col-sm-9 mt-3 mb-3">
                      <div class="row">
                        <div class="col-12 col-sm-6 TalentProfileName ms-2 mt-sm-2" style="font-size: 18px">Nils
                          Bußmann</div>
                        <div class="col-12 col-sm-6 TalentProfileRole mb-2 mb-sm-3 ms-2" style="font-size: 16px">
                          Kundenerfolgsmanager</div>
                      </div>
                      <div class="row TalentProfileText3" style="font-size: 17px">
                        <div class="col-12 col-sm-5 ms-2 mb-1">+49 157 519 97 122</div>
                        <div class="col-12 col-sm-5 ms-2">nils@curawork.online</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row d-none d-lg-block px-2 _br shadow-md bg-white">
              <div class="col-12 d-none d-lg-block TalentProfileHeader mb-2 ms-1 py-2">Ansprechpartner</div>
              <div class="row">
                <div class="col-4">
                  <div><img src="{{ asset('images/nils.png') }}" alt="" style="width: 65px; height: 65px"></div>
                </div>
                <div class="col-8 text-start align-self-center">
                  <div class="row">
                    <div class="col-12 TalentProfileName" style="font-size: 18px">Nils Bußmann</div>
                    <div class="col-12 TalentProfileRole">Kundenerfolgsmanager</div>
                  </div>
                </div>
              </div>
              <div class="hr"></div>
              <div class="row TalentProfileText3" style="font-size: 17px">
                <div class="col-12 mb-1 ms-2">+49 157 519 97 122</div>
                <div class="col-12 mb-2 ms-2 mb-3">nils@curawork.online</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>





    </div>


    </html>
