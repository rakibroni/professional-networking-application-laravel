<div id="add_education_station{{ $count }}" class="" style="overflow:hidden; max-height: 0px">
  <!-- GLEICH wieder zu 0 zurück -->

  <div class="row ">
    <div class="col-12 InPutTitle mt-3 mb-2 mb-md-3 d-none" style="font-size: 18px;"
      id="add_education_station_header{{ $count }}">Bildungsstation hinzufügen</div>



    <div class="smalltext mt-3 mt-md-2 col-md-6 col-12 d-inline InPutTitle px-1">Abschluss/ Examen
      <div class="row"><input class="mt-1 px-2  form-control" id="degree{{ $count }}" autocomplete="off"
          placeholder="z.B. Pflegemanagement" aria-label="" type="text"></div>
      <?php $id = 'degree_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>
    <div class="smalltext col-12 col-md-6 d-inline mt-4 mt-md-2 InPutTitle ps-1 pe-1 ps-md-2">Art des
      Abschlusses<div class="row">
        <select id="degree_type{{ $count }}" class=" form-control mt-1">
          <option value="-">-</option>
          <option value="Eigene Angabe...">
            Eigene Angabe...</option>
          <option value="Bachelor">
            Bachelor</option>
          <option value="Master">
            Master</option>
          <option value="Ausbildung">
            Ausbildung</option>
          <option value="Diplom">
            Diplom</option>
        </select>
      </div>
      <div id="custom_input_box_degree_type{{ $count }}"
        class="offset-1 offset-md-0 d-none col-11 col-md-12 InPutTitle mt-3 mt-md-2">Eigene
        Angabe...<div id="" class="mt-1"><input style="width:100%" id="custom_input_degree_type{{ $count }}"
            autocomplete="off" placeholder="Art des Abschlusses..." class=" form-control"></div>
      </div>
      <?php $id = 'degree_type_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>
    <div class="smalltext mt-4 col-12 d-inline InPutTitle px-1">Bildungseinrichtung
      <div class="row"><input class="mt-1  form-control" id="school{{ $count }}" autocomplete="off"
          placeholder="z.B. Fachhochschule der Diakonie gGmbH" type="text"></div>
      <?php $id = 'school_error' . $count; ?>
      <x-error_msg :id="$id" />
    </div>

    <div class="row">
      <div class="smalltext mt-4 col-6 d-inline InPutTitle px-1">
        <div class="div">
          <label class="required">Start Datum </label>
          <div><span class="mt-1">
              {!! Helper::yearSelect('month_start' . $count) !!}</span>
            <span class="mt-1">{!! Helper::monthSelect('year_start' . $count) !!}
            </span>
          </div>
        </div>
        <?php $id = 'start_month_error' . $count; ?>
        <x-error_msg :id="$id" />
        <?php $id = 'start_year_error' . $count; ?>
        <x-error_msg :id="$id" />
      </div>
      <div class="smalltext mt-4 InPutTitle col-6 d-inline px-1">
        <div>
          <label class="required">Datum Ende</label>
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
            id="is_current_school{{ $count }}">
          <div class="form-check-label pointer-on-hover" style="margin-top: 2px">
            <label class="pointer-on-hover unselectable" for="is_current_school{{ $count }}"
              style="color: #7F7F7F; font-weight: 400;">Aktuell noch dabei!</label>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="float-end my-3" id="education_station_btns{{ $count }}">
    <div>
      <button class="float-end btn btn-warning bg-cura me-1" style="width: 103px !important"
        id="save_education_station_btn{{ $count }}">
        <div id="save_education_station_btn_spinner{{ $count }}"
          class="d-none spinner-border text-primary cura-spinner" role="status">
          <span class="visually-hidden">Loading...</span>
        </div><span class="" id="save_education_station_btn_text{{ $count }}">Speichern</span>
      </button>
      <button class="float-end me-2 btn btn-outline-warning btn-outline-cura" style="width: 103px !important"
        id="discard_save_education_station_btn{{ $count }}">
        <div id="discard_save_education_station_btn_spinner{{ $count }}"
          class="d-none spinner-border cura-spinner" role="status">
          <span class="visually-hidden">Loading...</span>
        </div><span class="" id="discard_save_education_station_btn_text{{ $count }}">Abbrechen</span>
      </button>
    </div>
  </div>

  <script>
    // SELECT IDS  EVENUELL IN BLADE


    // DROPDOWN ID VON OBEN ÄNDENR

    $("#degree_type" + '{{ $count }}').change(function() {


      var customInputBox = $('#custom_input_box_degree_type' + '{{ $count }}');
      var customInput = $('#custom_input_degree_type' + '{{ $count }}');
      if ($(this).val() == 'Eigene Angabe...') {

        $("#degree_type" + '{{ $count }}').blur();
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



    $('#is_current_school' + '{{ $count }}').on("click", function() {

      if ($('#is_current_school' + '{{ $count }}').prop('checked') == true) {
        $('#is_current_school' + '{{ $count }}').blur();
        disableDatePicker('{{ $count }}');

      } else {
        $('#is_current_school' + '{{ $count }}').blur();
        enableDatePicker('{{ $count }}');
      }
    });




    $('#save_education_station_btn' + '{{ $count }}').on("click", function() {
      addEducationStation('{{ $count }}');
    });

    $('#discard_save_education_station_btn' + '{{ $count }}').on("click", function() {

      //$('#cv_modal_body').scrollTop(0);
      $('#discard_save_education_station_btn_text' + '{{ $count }}').addClass("d-none");
      $('#discard_save_education_station_btn_spinner' + '{{ $count }}').removeClass("d-none");
      //$('#add_job_experience_text').removeClass("d-none");
      //$('#add_job_experience_spinner').addClass("d-none");
      var addEducationStation = $('#add_education_station' + '{{ $count }}');
      addEducationStation.animate({
          maxHeight: 0
        },
        250,
        function() {
          addEducationStation.addClass("d-none");
          $('#add_another_education_station').animate({
            opacity: 1
          }, 200);

          $('#discard_save_education_station_btn_text' + '{{ $count }}').removeClass("d-none");
          $('#discard_save_education_station_btn_spinner' + '{{ $count }}').addClass("d-none");
        });

      $('#education_stations_preview').slideDown(250);
    });
  </script>
</div>
