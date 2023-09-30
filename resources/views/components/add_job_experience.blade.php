<div id="add_job_experience{{ $count }}" class="" style="overflow:hidden; max-height: 0px">

  <div class="row">
    <div class="col-12 InPutTitle mb-2 mb-md-3 mt-3 d-none" style="font-size: 18px"
      id="add_job_experience_header{{ $count }}">Berufserfahrung hinzufügen</div>
    <div class="mt-3 mt-md-2 col-md-6 col-12 d-inline InPutTitle px-1">Position<div id="" class="mt-1">
        <!-- Placeholder mit "z.B. Altenpflegefachkraft" -->
        <?php
        $id = 'position-search1' . $count;
        $dropdownId = 'search-dropdown-position1' . $count;
        $function = 'filterFunction1(`' . $id . '`, `' . $dropdownId . '`)';
        $openDropDown = '$(`#' . $dropdownId . '`).addClass(`d-block`)';
        
        Helper::showDropdown(
            $id,
            $dropdownId,
            '',
            $function,
            '',
            Helper::getPositionArray(),
            ['form-control', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
            [
                'width: 100%',
                'max-height: 200px;
                                        overflow-x: hidden; top:unset; max-width: 400px !important',
                'bg-danger',
            ],
            $openDropDown,
        );
        ?>
        <?php $id = 'position_error' . $count; ?>
        <x-error_msg :id="$id" />
      </div>
    </div>
    <div class="mt-3 mt-md-2 col-md-6 col-12 d-inline InPutTitle ps-1 pe-1 ps-md-2">
      Arbeitsverhältnis <div class="row">
        <select id="employment_type{{ $count }}" class=" form-control mt-1">
          <option value="">-</option>
          <option value="Eigene Angabe..." id="custom_select_employment_type{{ $count }}">
            Eigene Angabe...</option>
          <option value="Vollzeit">
            Vollzeit</option>
          <option id="Teilzeit">
            Teilzeit</option>
          <option id="Ausbildung">
            Ausbildung</option>
          <option id="Duales Studium">
            Duales Studium</option>
          Zeitarbeit</option>
          <option id="Praktikum">
            Praktikum</option>
          <option id="Freiwilliges Soziales Jahr">
            Freiwilliges Soziales Jahr</option>
          <option value="Werkstudierenden Tätigkeit">
            Werkstudierenden Tätigkeit</option>
          <option id="450€-Stelle">
            450€-Stelle</option>
          <option value="Selbständig">
            Selbständig</option>
        </select>
      </div>
      <div id="custom_input_box_employment_type{{ $count }}"
        class="offset-1 offset-md-0 d-none col-11 col-md-12 InPutTitle mt-3">
        Eigene Angabe...
        <div id="" class="mt-1">
          <input class=" form-control" id="custom_input_employment_type{{ $count }}" autocomplete="off"
            placeholder="Arbeitsverhältnis..." required="" role="combobox" aria-autocomplete="list"
            aria-activedescendant="" aria-expanded="false" aria-owns="" aria-label="Exam. Altenpfleger*in" type="text">
        </div>
      </div>
      <?php $id = 'employment_type_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>


    <div class="smalltext mt-4 col-md-6 col-12 d-inline InPutTitle px-1">Name der Einrichtung
      <div class="row"><input class="mt-1  form-control" id="company{{ $count }}" autocomplete="off"
          placeholder="z.B. Charité" maxlength="100" required="" role="combobox" aria-autocomplete="list"
          aria-activedescendant="" aria-expanded="false" aria-owns="" aria-label="Bsp: Chartié" type="text"></div>
      <?php $id = 'company_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>
    <div class="smalltext mt-4 col-12 col-md-6 d-inline InPutTitle ps-1 pe-1 ps-md-2">Art der
      Einrichtung<div class="row mt-2">
        <select id="company_type{{ $count }}" class=" form-control mt-2">
          <option value="">-</option>
          <option value="Eigene Angabe...">
            Eigene Angabe...</option>
          <option value="Alltagsbegleitung">
            Alltagsbegleitung</option>
          <option value=" Altenpflegeeinrichtung ">
            Altenpflegeeinrichtung</option>
          <option value="Ambulanter Dienst">
            Ambulanter Dienst</option>
          <option value="Eingliederungshilfe">
            Eingliederungshilfe</option>
          <option value="Krankenhaus">
            Krankenhaus</option>
          <option value="Rehaklinik">
          <option value="Psychatrie">
            Psychatrie</option>
          <option value="Psychatrie">
            Rehaklinik</option>
          <option value="Suchtklink">
            Suchtklink</option>
          <option value="Tagespflege">
            Tagespflege</option>
          <option value="Werkstatt für Menschen mit Behinderung (WfbM)">
            Werkstatt für Menschen mit Behinderung (WfbM)</option>
        </select>
      </div>
      <div id="custom_input_company_type_box{{ $count }}"
        class="offset-1 offset-md-0 d-none col-11 col-md-12 InPutTitle mt-3 mt-md-2">Eigene
        Angabe...<div id="" class="mt-1"><input style="width:100%" id="custom_input_company_type{{ $count }}"
            autocomplete="off" placeholder="Art der Einrichtung..." required="" role="combobox" aria-autocomplete="list"
            aria-activedescendant="" aria-expanded="false" aria-owns="" aria-label="Exam. Altenpfleger*in" type="text"
            class=" form-control"></div>
      </div>
      <?php $id = 'company_type_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>


    <div class="smalltext mt-4 col-12 d-inline px-1">
      <div id="ember1202" class=""><label class="InPutTitle mb-1" for="position-geo-location-typeahead">Standort
        </label></div>
      <div id="ember1203" class="row">
        <?php
        $id = 'city-search1' . $count;
        $dropdownId = 'search-dropdown-city1' . $count;
        $function = 'filterTest3(this.id, `' . $dropdownId . '`)';
        //$openDropDown = '$(`#'.$dropdownId.'`).addClass(`d-block`)';
        
        Helper::showDropdown($id, $dropdownId, 'z.B. Bielefeld', $function, '', [''], ['form-control', 'dropdown-menu', 'bg-danger'], ['width: 100%', 'max-height: 200px; overflow-x: hidden; top:unset; width: 300px', 'bg-danger'], '');
        ?>

      </div>
      <?php $id = 'location_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>
    <div class="row">
      <div class="smalltext mt-4 col-6 d-inline InPutTitle px-1">
        <div class="div">
          <label class="required">Start Datum</label>
          <div>
            <span class="mt-1">{!! Helper::yearSelect('month_start' . $count) !!}</span>
            <span class="mt-1">{!! Helper::monthSelect('year_start' . $count) !!}</span>
          </div>
        </div>
        <?php $id = 'start_month_error' . $count; ?>
        <x-error_msg :id="$id" />
        <?php $id = 'start_year_error' . $count; ?>
        <x-error_msg :id="$id" />
      </div>
      <div class="smalltext mt-4 InPutTitle col-6 d-inline px-1">
        <div>
          <label class=" required">Datum Ende</label>
          <div><span class="mt-1">
              {!! Helper::yearSelect('month_end' . $count) !!}</span>
            <span class="mt-1">{!! Helper::monthSelect('year_end' . $count) !!}
            </span>
          </div>
        </div>
        <?php $id = 'end_month_error' . $count; ?>
        <x-error_msg :id="$id" />
        <?php $id = 'end_year_error' . $count; ?>
        <x-error_msg :id="$id" />
        <div class="form-check pt-3 pb-2">
          <input class="form-check-input cura-check pointer-on-hover" type="checkbox" value=""
            id="is_current_position{{ $count }}">
          <div class="form-check-label pointer-on-hover" style="margin-top: 2px">
            <label class="pointer-on-hover unselectable d-inline-block" for="is_current_position{{ $count }}"
              style="color: #7F7F7F; font-weight: 400;">Aktuelle Position!</label>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 px-1">
    <div class="smalletext mt-2 col-12">
      <div id="ember579">
        <label for="position-description" class="pe-form-field__label label-text InPutTitle">Beschreibung
        </label>
      </div>
    </div>
    <form>
      <div class="form-group mt-1 mb-2">
        <textarea class="form-control" id="job_description{{ $count }}"
          placeholder="Hier kannst du deine Stelle beschreiben: Du kannst deinen Fachbereich, deine täglichen Aufgaben und mögliche Besonderheiten eintragen."
          rows="5"></textarea>
      </div>
    </form>
    <?php $id = 'description_error' . $count; ?>
    <x-error_msg :id="$id" />
  </div>




  <div class="float-end my-3 " id="job_experiences_btns{{ $count }}">

    <button class="float-end btn btn-warning bg-cura me-1" style="width: 103px !important"
      id="save_experience_btn{{ $count }}">
      <div id="save_experience_btn_spinner{{ $count }}" class="d-none spinner-border text-primary cura-spinner"
        role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <span class="" id="save_experience_btn_text{{ $count }}">Speichern</span>
    </button>


    <button class="float-end me-2 btn btn-outline-warning btn-outline-cura" style="width: 103px !important"
      id="discard_save_experience_btn{{ $count }}">
      <div id="discard_save_experience_btn_spinner{{ $count }}"
        style="border-color:#ff9721; border-top-color: transparent;"
        class="d-none spinner-border text-primary cura-spinner" role="status" style="">
        <span class="visually-hidden">Loading...</span>
      </div><span class="" id="discard_save_experience_btn_text{{ $count }}">Abbrechen</span>
    </button>

  </div>
</div>
<script>
  // SELECT IDS  EVENUELL IN BLADE


  // DROPDOWN ID VON OBEN ÄNDENR

  $("#employment_type" + '{{ $count }}').change(function() {

    var customInputBox = $('#custom_input_box_employment_type' + '{{ $count }}');
    var customInput = $('#custom_input_employment_type' + '{{ $count }}');
    if ($(this).val() == 'Eigene Angabe...') {
      $("#employment_type" + '{{ $count }}').blur();
      customInputBox.removeClass("d-none");
      customInput.get(0).focus();

    } else {
      customInput.val('');
      customInputBox.addClass("d-none");
    }
  });


  $("#company_type" + '{{ $count }}').change(function() {
    //

    var customInputBox = $('#custom_input_company_type_box' + '{{ $count }}');
    var customInput = $('#custom_input_company_type' + '{{ $count }}');
    if ($(this).val() == 'Eigene Angabe...') {
      $("#company_type" + '{{ $count }}').blur();
      customInputBox.removeClass("d-none");
      customInput.get(0).focus();

    } else {
      customInput.val('');
      customInputBox.addClass("d-none");
    }
  });


  var startMonth;
  var endMonth;
  $("#month_start" + '{{ $count }}').change(function() {
    startMonth = $(this).val();
    updateStartMonth = $(this).val();
  });

  $("#month_end" + '{{ $count }}').change(function() {
    endMonth = $(this).val();
  });



  $('#is_current_position' + '{{ $count }}').on("click", function() {

    if ($('#is_current_position' + '{{ $count }}').prop('checked') == true) {
      $('#is_current_position' + '{{ $count }}').blur();
      disableDatePicker('{{ $count }}');

    } else {
      $('#is_current_position' + '{{ $count }}').blur();
      enableDatePicker('{{ $count }}');
    }
  });




  $('#save_experience_btn' + '{{ $count }}').on("click", function() {
    addJobExperience('{{ $count }}');
  });

  $('#discard_save_experience_btn' + '{{ $count }}').on("click", function() {
    //$('#cv_modal_body').scrollTop(0);
    $('#discard_save_experience_btn_text' + '{{ $count }}').addClass("d-none");
    $('#discard_save_experience_btn_spinner' + '{{ $count }}').removeClass("d-none");
    setTimeout(() => {

      $('#add_job_experience_text').removeClass("d-none");
      $('#add_job_experience_spinner').addClass("d-none");
      var addJobExperience = $('#add_job_experience' + '{{ $count }}');
      addJobExperience.animate({
          height: 0,
          margin: 0,
          padding: 0
        },
        250,
        function() {
          addJobExperience.addClass("d-none");
          $('#add_another_job_experience').animate({
            opacity: 1
          }, 200);

          $('#discard_save_experience_btn_text' + '{{ $count }}').removeClass("d-none");
          $('#discard_save_experience_btn_spinner' + '{{ $count }}').addClass("d-none");
        });

      $('#job_experiences_preview').slideDown(250);
    }, 200);

  });
</script>
