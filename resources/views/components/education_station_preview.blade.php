<?php

$start_date = Helper::reFormatStartDate($educationStation);
$end_date = Helper::reFormatEndDate($educationStation);

?>


<div class="py-1 mb-2 px-1">
  <div class="align-self-center br ps-2 ps-lg-3 pe-2" style="overflow: hidden; height: 55px; border: 0.5px solid #BCBBBB;" id="preview_education_station{{ $educationStation->id }}">
    <div class="d-flex mt-2 align-self-center justify-content-between" id="educationStation_preview_text{{ $educationStation->id }}">
      <div class="cut-text" style="width: 80%; font-size: 12px">
        <div class="HideOverflowText" style="font-weight: 500; color: #636466; font-size: 14px">
          {{ $educationStation->degree }} @ {{ $educationStation->school }}
        </div>
        <div style="color: #7F7F7F" class="">
          {{ $start_date }} - {{ $end_date }}
        </div>
      </div>
      <div class="align-self-center">
        <button class="me-1 btn btn-light-outline btn-sm" style="box-shadow: unset !important" id="edit_education_station{{ $educationStation->id }}">
          <img class="d-block d-lg-none" src="/images/Pen.svg" style="height: 20px" alt="">
          <span class="d-none d-lg-block">Bearbeiten</span>
        </button>
      </div>
      <div class="align-self-center">
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important" id="try_delete_educationStation{{ $educationStation->id }}">
          <img class="d-block d-lg-none" src="/images/DeleteIcon.svg" style="height: 20px" alt="">
          <span class="d-none d-lg-block">Löschen</span>
        </button>
      </div>
    </div>
    <div class="d-flex mt-2 justify-content-between d-none" id="educationStation_delete_text{{ $educationStation->id }}">
      <div class="" style="margin-top: 8px">
        Bist du sicher?
      </div>
      <div style="margin-top: 5px">
        <button class="btn btn-danger btn-sm" id="final_education_station{{ $educationStation->id }}">Löschen</button>
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important" id="discard_educationStation{{ $educationStation->id }}">Abbrechen</button>
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
    var school = '{{ $educationStation->school }}';
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