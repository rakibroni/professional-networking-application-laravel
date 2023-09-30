<?php

$start_date = Helper::reFormatStartDate($educationStation);
$end_date = Helper::reFormatEndDate($educationStation);

?>

<div class="p-1">
  <div class="shadow-md br mb-2" style="overflow: hidden; padding: 10px; margin-bottom: 10px; height: 60px"
    id="preview_education_station{{ $educationStation->id }}">
    <div class="d-flex justify-content-between" id="educationStation_preview_text{{ $educationStation->id }}">
      <div class="div align-center mt-1  cut-text text-secondary" style="width: 80%; font-size: 12px">
        <div class="" style="font-weight: 600; #">
          {{ $educationStation->degree }} @ {{ $educationStation->school }}
        </div>
        <div>
          {{ $start_date }} - {{ $end_date }}
        </div>
      </div>
      <div class="div">
        <button class="me-2 btn btn-light-outline btn-sm" style="box-shadow: unset !important; margin-top: 5px"
          id="edit_education_station{{ $educationStation->id }}">Bearbeiten</button>
      </div>
      <div class="div">
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important; margin-top: 5px"
          id="try_delete_educationStation{{ $educationStation->id }}">Löschen</button>
      </div>
    </div>
    <div class="d-flex justify-content-between d-none" id="educationStation_delete_text{{ $educationStation->id }}">
      <div class="" style="margin-top: 8px">
        Bist du sicher?
      </div>
      <div style="margin-top: 5px">
        <button class="btn btn-danger btn-sm" id="final_education_station{{ $educationStation->id }}">Löschen</button>
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important"
          id="discard_educationStation{{ $educationStation->id }}">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
<script>
  var discardBtn = $('#discard_educationStation' + '{{ $educationStation->id }}');
  var tryDelteBtn = $('#try_delete_educationStation' + '{{ $educationStation->id }}');
  var finalDelteBtn = $('#final_education_station' + '{{ $educationStation->id }}');
  var editBtn = $('#edit_education_station' + '{{ $educationStation->id }}');


  var ANIM_0 = 'animate__animated animate__headShake animate__faster';
  var ANIM_1 = 'animate__animated animate__backOutRight';



  editBtn.on("click", function() {
    $('#add_cv_modal').modal('hide');
    $('#edit_education_station_modal').modal('show');
    var id = '{{ $educationStation->id }}';
    var school =  '{{ $educationStation->school }}';
    var degree = '{{ $educationStation->degree }}';
    var degree_type = '{{ $educationStation->degree_type }}';
    var start_date = '{{ $educationStation->start_date }}';
    var end_date = '{{ $educationStation->end_date }}';
    var is_current_school = '{{ $educationStation->is_current_school }}';
    var is_custom_degree_type = '{{ $educationStation->is_custom_degree_type }}';
    returnToMainModalEducation = true;
    prepareEditEducationStationModal(id, degree, degree_type, school, start_date, end_date, is_current_school, is_custom_degree_type);
  });




  finalDelteBtn.on("click", function() {
    var previewBox = $('#preview_education_station' + '{{ $educationStation->id }}');
    var educationStation = $('#education_station' + '{{ $educationStation->id }}');
    previewBox.addClass(ANIM_1);
    setTimeout(() => {
      previewBox.parent().animate({
        height: 0,
        margin: 0,
        padding: 0
      }, 50, function() {
        previewBox.parent().remove();
        educationStation.remove();
        deleteEducationStation('{{ $educationStation->id }}');
      });

    }, 500);
  });

  tryDelteBtn.on("click", function() {
    var previewBox = $('#preview_education_station' + '{{ $educationStation->id }}');
    var deleteText = $('#educationStation_delete_text' + '{{ $educationStation->id }}');
    var previewText = $('#educationStation_preview_text' + '{{ $educationStation->id }}');

    previewBox.addClass(ANIM_0);
    setTimeout(() => {
      previewBox.addClass("bg-light");
      previewText.addClass('d-none');
      deleteText.removeClass('d-none');
      previewBox.removeClass(ANIM_0);
    }, 500);
  });

  discardBtn.on("click", function() {
    var previewBox = $('#preview_education_station' + '{{ $educationStation->id }}');
    var deleteText = $('#educationStation_delete_text' + '{{ $educationStation->id }}');
    var previewText = $('#educationStation_preview_text' + '{{ $educationStation->id }}');
    previewBox.addClass(ANIM_0);
    setTimeout(() => {
      previewBox.removeClass("bg-light");
      previewText.removeClass('d-none');
      deleteText.addClass('d-none');
      previewBox.removeClass(ANIM_0);
    }, 500);
  });
</script>
