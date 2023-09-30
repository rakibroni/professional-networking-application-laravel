<div class="modal CustomFullScreenModal JobExperienceModalCustom fade" id="add_cv_modal" data-bs-backdrop="static"
  data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl  modal-fullscreen-xl-down">
    <div class="modal-content mt-0 mt-md-5">
      <div class="modal-header" style="height: 55px !important">
        <div class="ModalHeaderProfile" id="exampleModalLabel">Mein Profil bearbeiten</div>
        <span></span><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-body-p0" style="overflow-y: scroll; overflow-x: hidden" id="cv_modal_body">

        <div class="row">
          <div class="d-none d-lg-block sticky-top h-100">
            <div class="position-absolute" style="max-width: 215px">
              <div class="mt-3 mt-lg-0 py-3">
                <div class="" style="background-color: white;">
                  <nav id="navbar-example3" class="nav-pills">
                    <div><a id="show_job_experience_modal_box0"
                        class="ps-3 nav-link pointer-on-hover navbar-brand unselectable"
                        style="color: #FF9721;font-weight:500; font-size: 18px">Berufserfahrung</a></div>
                    <div><a id="show_education_station_modal_box0"
                        class="mt-2 ps-3 nav-link navbar-brand pointer-on-hover unselectable"
                        style="font-weight:500; font-size: 18px">Bildung</a></div>
                    <div><a id="show_other_modal_box0"
                        class="pointer-on-hover mt-2 ps-3 nav-link navbar-brand unselectable"
                        style="font-weight:500; font-size: 18px">(Fach-) Weiterbildung</a></div>
                    <div><a id="show_other_modal_box1"
                        class="pointer-on-hover mt-2 ps-3 nav-link navbar-brand unselectable"
                        style="font-weight:500; font-size: 18px">Skills</a></div>
                    <div><a id="show_other_modal_box2"
                        class="pointer-on-hover mt-2 ps-3 nav-link navbar-brand unselectable"
                        style="font-weight:500; font-size: 18px">Sprachen</a></div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <style>
            @media (max-width: 992px) {
              .border-start {
                display: none;
              }
            }

          </style>
          <div class="border-start h-100 UserCustomMargin d-inline-block" data-bs-spy="scroll"
            data-bs-target="#navbar-example3" data-bs-offset="0" tabindex="0">
            <div class="px-2 px-md-3 py-md-4">
              <div class="row">



                <!-- JOB EXPERIENCE -->
                <div id="job_experience_modal_box" class="d-none">

                  <div class="col-12 py-2" style="background: #F6F6F6;">
                    <div class="HinweisTextProfile px-sm-2 px-2 px-lg-4 mb-1 mt-1 h-100">Hinweis: Hier kannst du deine
                      bisherige Berufserfahrung und deine aktuelle Stelle angeben und beschreiben! Auch
                      Arbeitserfahrungen außerhalb der Pflegebranche darfst du gerne hinzufügen.</div>
                  </div>

                  <div class="my-3" id="itemprofileditmodal-1-1">
                    <div class="InPutTitleHeader" style="color: #23180C">Berufserfahrung</div>
                  </div>

                  <div id="job_experiences_preview" class="" style="overflow:hidden; max-height: 2000px">
                    {{ $user->getJobExperiencesPreview() }}
                  </div>
                  <div id="add_job_experiences"></div>

                  <div>
                    <div onclick="AddAnotherPosition()" class="px-2 py-2 float-md-end mb-3 pointer-on-hover text-center"
                      id="add_another_job_experience"
                      style="background-color:#ff9721;border-color:transparent;box-shadow:none; border-radius:5px;color:white; width: 200px !important">
                      <div class="d-none spinner-border text-primary cura-spinner text-center" role="status" style=""
                        id="add_job_experience_spinner">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div id="add_job_experience_text" class="text-center" style="font-size: 14px">Berufserfahrung
                        hinzufügen</div>
                    </div>
                  </div>


                </div>
                <!-- JOB EXPERIENCE END -->

                <!-- EDUCATION STATIONS -->
                <div id="education_station_modal_box" class="d-none">

                  <div class="col-12 py-2" style="background: #F6F6F6;">
                    <div class="HinweisTextProfile px-2 px-lg-4 mb-1 mt-1 h-100">Hinweis: Hier kannst du angeben,
                      welche Art von Ausbildung oder Studium du abgeschlossen hast, oder aktuell absolvierst! Auch
                      Abschlüsse außerhalb der Pflege darfst du gerne hinzufügen.</div>
                  </div>

                  <div class="InPutTitleHeader my-3" style="color: #23180C" id="itemprofileditmodal-1-2">
                    Bildung bearbeiten
                  </div>

                  <div id="education_stations_preview" class=""
                    style="overflow:hidden; max-height: 2000px">
                    {{ $user->getEducationStationsPreview() }}
                  </div>
                  <?php $count = ''; ?>
                  <div id="add_education_stations"></div>

                  <div class="">
                    <button onclick="addAnotherEducationStation()"
                      class="px-2 py-2 float-md-end mb-3 pointer-on-hover text-center"
                      id="add_another_education_station"
                      style="background-color:#ff9721;border-color:transparent;box-shaddow:none; border-radius:5px;color:white; width: 200px !important">
                      <div class="d-none spinner-border text-primary cura-spinner text-center" role="status" style=""
                        id="add_another_education_spinner">
                        <span class="visually-hidden">Loading...</span>
                      </div>
                      <div id="add_another_education_text" class="text-center" style="font-size: 14px">
                        Bildungsstation hinzufügen</div>
                    </button>
                  </div>


                </div>
                <!-- EDUCATION STATIONS END -->



                <!-- OTHERS -->
                <div id="other_modal_box" class="d-none">

                  <div class="col-12 py-2 mb-3" style="background: #F6F6F6;">
                    <div class="HinweisTextProfile px-2 px-lg-4 mb-1 mt-1 h-100">Hinweis: Hier kannst du deine
                      Weiterbildungen, Skills und Sprachen angeben. Du darfst aus den vorgegebenen Begriffen wählen
                      oder eigene Angaben hinzufügen, wenn diese nicht in den Listen stehen!</div>
                  </div>

                  <div class="" id="training_modal_sub_box">
                    <div class="InPutTitle mb-2" style="font-size: 18px" id="itemprofileditmodal-1-3">(Fach-)
                      Weiterbildung hinzufügen:</div>

                    <div class="mt-4">
                      <div class="px-2" id="training_preview">
                        {{ $user->getUserTrainingPreview() }}


                      </div>


                    </div>
                    <div class="mt-2">
                      <div class="row">
                        <div class="px-1 col-sm-6 col-12 d-inline InPutTitle" style="" id="training-input">
                          <?php
                          $count = '';
                          $id = 'training-search2' . $count;
                          $dropdownId = 'dropdown-' . $id . $count;
                          $function = 'filterFunction1(`' . $id . '`, `' . $dropdownId . '`)';
                          $openDropDown = '$(`#' . $dropdownId . '`).addClass(`d-block`)';
                          
                          Helper::skillSelector(
                              $id,
                              $dropdownId,
                              'z.B. Wundmanagement',
                              $function,
                              '',
                              Helper::getTrainingArray(),
                              ['form-control', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
                              [
                                  'width: 100%',
                                  'max-height: 200px;
                                                                                                          overflow-x: hidden; top:unset; width: 300px !important',
                                  'bg-danger',
                              ],
                              $openDropDown,
                          );
                          ?>
                          <?php $id = 'training_error' . $count; ?>
                          <x-error_msg :id="$id" />
                        </div>
                        <div class="col-12 mt-1 pe-1 col-sm-5 ms-sm-1 mt-sm-0 text-end text-sm-start">
                          <div class="">
                            <button onclick="addTrainingInput('training-search2')" class=""
                              id="add_another_education_station"
                              style="background-color:#ff9721;border-color:transparent;box-shaddow:none; border-radius:5px;color:white; height: 35px !important">
                              <div class="d-none spinner-border text-primary cura-spinner" role="status" style=""
                                id="add_another_education_spinner">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                              <span id="add_another_education_text" class=""
                                style="font-size: 14px">Hinzufügen</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="hr"></div>
                  <div id="skills_modal_sub_box">
                    <div class="InPutTitle mb-2" style="font-size: 18px" id="itemprofileditmodal-1-4">
                      Skills Hinzufügen:
                    </div>
                    <div class="mt-4">
                      <div class="px-2" id="skill_preview">
                        {{ $user->getUserSkillsPreview() }}
                      </div>
                    </div>
                    <div class="mt-2">
                      <div class="row">
                        <div class="px-1 col-sm-6 col-12 d-inline InPutTitle" id="skill-input">
                          <?php
                          $count = '';
                          $id = 'skill-search3' . $count;
                          $dropdownId = 'dropdown-' . $id . $count;
                          $function = 'filterFunction1(`' . $id . '`, `' . $dropdownId . '`)';
                          $openDropDown = '$(`#' . $dropdownId . '`).addClass(`d-block`)';
                          
                          Helper::skillSelector(
                              $id,
                              $dropdownId,
                              'z.B. DAN',
                              $function,
                              '',
                              Helper::getSkillsArray(),
                              ['form-control', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
                              [
                                  'width: 100%',
                                  'max-height: 200px;
                                                                                                        overflow-x: hidden; top:unset; width: 300px !important',
                                  'bg-danger',
                              ],
                              $openDropDown,
                          );
                          ?>
                          <?php $id = 'training_error' . $count; ?>
                          <x-error_msg :id="$id" />
                        </div>
                        <div class="col-12 mt-1 pe-1 col-sm-5 ms-sm-1 mt-sm-0 text-end text-sm-start">
                          <div class="">
                            <button onclick="addSkillInput('skill-search3')" class=""
                              id="add_another_education_station"
                              style="background-color:#ff9721;border-color:transparent;box-shaddow:none; border-radius:5px;color:white; height: 35px !important">
                              <div class="d-none spinner-border text-primary cura-spinner" role="status"
                                id="add_another_education_spinner">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                              <span id="add_another_education_text" class=""
                                style="font-size: 14px">Hinzufügen</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="hr"></div>
                  <div id="language_modal_sub_box">
                    <div class="InPutTitle mb-2" style="font-size: 18px" id="itemprofileditmodal-1-4">
                      Sprachen Hinzufügen:
                    </div>
                    <div class="mt-4">
                      <div class="px-2" id="languages_preview">
                        {{ $user->getUserLanguagesPreview() }}
                      </div>
                    </div>
                    <div class="mt-2">
                      <div class="row">
                        <div class="px-1 col-sm-6 col-12 d-inline-block InPutTitle" id="skill-input">
                          <?php
                          $count = '';
                          $id = 'language-search4' . $count;
                          $dropdownId = 'dropdown-' . $id . $count;
                          $function = 'filterFunction1(`' . $id . '`, `' . $dropdownId . '`)';
                          $openDropDown = '$(`#' . $dropdownId . '`).addClass(`d-block`)';
                          
                          Helper::skillSelector(
                              $id,
                              $dropdownId,
                              'z.B. Englisch',
                              $function,
                              '',
                              Helper::getLanguagesArray(),
                              ['form-control', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
                              [
                                  'width: 100%',
                                  'max-height: 200px;
                                                                                                      overflow-x: hidden; top:unset; width: 300px !important',
                                  'bg-danger',
                              ],
                              $openDropDown,
                          );
                          ?>
                          <?php $id = 'language_error' . $count; ?>
                          <x-error_msg :id="$id" />
                        </div>
                        <div
                          class="mt-2 mt-sm-0 col-sm-5 ms-sm-1 col-lg-5 col-xl-4 text-end text-lg-start d-inline-block">
                          <img class="d-sm-none mx-2" src="/images/LanguageLevelIcon.svg" alt="" style="width: 22px">
                          <div class="pe-1 col-7 col-sm-12 d-inline-block InPutTitle" style="" id="skill-input">
                            <?php
                            $count = '';
                            $id = 'language-level-search4' . $count;
                            $dropdownId = 'dropdown-' . $id . $count;
                            $function = 'filterFunction1(`' . $id . '`, `' . $dropdownId . '`)';
                            $openDropDown = '$(`#' . $dropdownId . '`).addClass(`d-block`)';
                            
                            Helper::skillSelector(
                                $id,
                                $dropdownId,
                                'z.B. Verhandlungssicher',
                                $function,
                                '',
                                Helper::getLanguagesLevelArray(),
                                ['form-control', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
                                [
                                    'width: 100%',
                                    'max-height: 200px;
                                                                                                            overflow-x: hidden; top:unset; width: 300px !important',
                                    'bg-danger',
                                ],
                                $openDropDown,
                            );
                            ?>
                            <?php $id = 'language_error' . $count; ?>
                            <x-error_msg :id="$id" />
                          </div>
                        </div>
                        <div class="col-12 col-sm-11 col-xl-10 mb-4">
                          <div class="px-1 px-sm-0 mt-1 float-end">
                            <button onclick="handleItemInput('language-search4', 'language-level-search4')"
                              class="" id="add_another_education_station"
                              style="background-color:#ff9721; border-color:transparent; box-shadow:none; border-radius:5px; color:white; height: 35px !important">
                              <div class="d-none spinner-border text-primary cura-spinner" role="status" style=""
                                id="add_another_education_spinner">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                              <span id="add_another_education_text" class=""
                                style="font-size: 14px">Hinzufügen</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- OTHERS END -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer py-0" style="height: 60px">
      <button class="btn btn-warning bg-cura" data-bs-toogle="modal2" data-bs-dismiss="modal">Hinzufügen</button>
    </div> -->
    </div>
  </div>
</div>

<script>
  $(document).mouseup(function(e) {
    var container = $("#dropdown-training-search2");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.removeClass('d-block');
    }
  });
  $(document).mouseup(function(e) {
    var container = $("#dropdown-skill-search3");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.removeClass('d-block');
    }
  });
  $(document).mouseup(function(e) {
    var container = $("#dropdown-language-search4");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.removeClass('d-block');
    }
  });
  $(document).mouseup(function(e) {
    var container = $("#dropdown-language-level-search4");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      container.removeClass('d-block');
    }
  });
</script>
