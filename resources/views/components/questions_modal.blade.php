<!-- Frage Modal -->
<div class="modal fade CustomFullScreenModal" id="frage_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-bs-backdrop="static" style="z-index: 2000000 !important;">
  <div class="modal-dialog modal-dialog-scrollable modal-down modal-dialog-centered modal-fullscreen-xl-down">
    <div class="modal-content _br">


      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Stelle einem Experten deine Frage</h5>
        <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close" style="border-color: transparent !important"></button>
      </div>

      <div class="modal-body position-relative px-0 py-0">
        <div class="p-2 mb-3" style="font-size: 12px; background-color: #F6F6F6; color: #AAAAAA">

          <p class="font-weight-lighter">
            Hinweis: Diese Frage wird anonym gestellt und es wird nicht zu sehen sein, dass du
            diese gestellt hast.
          <p>

          <p class="font-weight-lighter">
            Mit Klicken auf "Frage stellen" bestätige ich, dass meine Frage eine lösungsorientierte, konkrete und pflegespezifische Frage
            darstellt und ich von negativen Aussagen, die keine explizite Frage enthalten absehe.
          <p>



        </div>
        <div class=" px-sm-3">
          <div style="font-size: 12px">

          </div>
          {{-- model body start --}}

          <form action="{{ route('question') }}" method="post" id="question_form" class="mt-0">
            @csrf
            <div class="col-12 px-1">

              <div id="skill_preview">
              </div>
              {{-- start multiselect --}}

              <style>
                .delete-badge {
                  position: absolute;
                  top: -10px;
                  float: right;
                  left: calc(100% - 10px);
                  height: 20px;
                  width: 20px;
                  background-image: url("/images/CloseModalIcon.svg");
                  background-repeat: no-repeat;
                  z-index: 40;
                }

                .example-box-style {
                  height: 23px;
                  background: #FFFFFF;
                  border: 2px solid #FF9721;
                  box-sizing: border-box;
                  border-radius: 5px;
                  color: #FF9721;
                  font-weight: 500;
                  font-size: 14px;
                  line-height: 139.19%;
                }

              </style>


              <div class="InPutTitle">Thema der Frage</div>
              {{-- @foreach ($question_categories as $key => $value)
                           {{$key}} - {{$value}}
                           @endforeach --}}
              <?php
              
              $uuid = 'aa';
              $id = 'input' . $uuid;
              $dropdownId = $id . '_dropdown';
              $placeholder = 'Thema';
              $value = '';
              $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
              $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
              $cssStylesArray = ['height: 35px; width: 231px', 'width: 231px; max-height: 200px; overflow-x: hidden; top: unset', ''];
              $cssClassesArray = ['mt-1 input-box form-control', 'dropdown-menu position-absolute shadow-md', 'dropdown-item pointer-on-hover'];
              $dropdownContentArray = $list;
              $category = 'question';
              ?>
              <x-multi_select_input :id="$id" :category="$category" :dropdownId="$dropdownId"
                :placeholder="$placeholder" :value="$value" :onclick="$onclick" :onkeyup="$onkeyup"
                :cssStylesArray="$cssStylesArray" :cssClassesArray="$cssClassesArray"
                :dropdownContentArray="$dropdownContentArray" />



              {{-- end multiselect --}}
            </div>





            <div class="col-12 px-1">
              <div class="smalletext mt-2 col-12">
                <div id="ember579">
                  <label for="position-description" class="pe-form-field__label label-text InPutTitle">Fragetitel
                  </label>
                </div>
              </div>

              <div class="form-group mt-1 mb-2">
                <input id="question_modal_title" class="mt-1  form-control" name="title" autocomplete="off"
                  placeholder="z.B. Wie verhalte ich mich gegenüber respektlosen Bewohnern?" type="text">
              </div>

              <span id="title_error" class="text-danger error-text"> </span>
            </div>


            <div class="col-12 px-1">
              <div class="smalletext mt-2 col-12">
                <div id="ember579">
                  <label for="position-description" class="pe-form-field__label label-text InPutTitle">Beschreibung
                  </label>
                </div>
              </div>

              <div class="form-group mt-1 mb-2">
                <textarea class="form-control" id="job_description0add" name="description"
                  placeholder="z.B. Ich arbeite in einem Pflegeheim und seit 2 Wochen haben wir einen neuen Bewohner, der sich mir gegenüber sehr respektlos verhält. Er äußert immer wieder Kommentare bezüglich meiner Arbeitsweise und..."
                  rows="5" spellcheck="false"></textarea>
              </div>

              <span id="description_error" class="text-danger error-text"> </span>
            </div>
            <div class="col-12 px-1">
              <div class="smalletext mt-2 col-12">
                <div id="ember579">
                  <label for="position-description" class="pe-form-field__label label-text InPutTitle">Meine Frage
                    stellen
                    an:
                  </label>
                </div>
              </div>

              <div class="form-group mt-1 mb-2">
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="EXPT" name="question_for" id="question_for1">
                  <label class="form-check-label" for="question_for1">
                    passende Experten.
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="COM" type="radio" name="question_for" id="question_for2"
                    checked>
                  <label class="form-check-label" for="question_for2">
                    die gesamte Community.
                  </label>
                </div>
              </div>

              <span id="description_error0add" class="d-none text-danger error-text">Bitte gebe deinen aktuellen
                Standort
                an</span>
            </div>




            <button id="submit_question" class="d-none" type="submit">
          </form>

          {{-- model body end --}}
        </div>
      </div>


      <div class="modal-footer">
        <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn btn-outline-warning btn-outline-cura"
          data-bs-dismiss="modal">Abbrechen</button>
        <button id="submit_question_btn" type="submit" class="btn btn-warning bg-cura" onclick="question()">Frage stellen</button>

      </div>

    </div>
  </div>
</div>

<script>
    $('#inputaa_preview').addClass('w-100');
</script>