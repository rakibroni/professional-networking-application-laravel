<?php

$start_date = Helper::reFormatStartDate($jobExperience);
$end_date = Helper::reFormatEndDate($jobExperience);

?>

<div class="p-1">
  <div class="shadow-md br mb-2" style="overflow: hidden; padding: 10px; margin-bottom: 10px; height: 60px"
    id="preview_job_experience{{ $jobExperience->id }}">
    <div class="d-flex justify-content-between" id="jobExperience_preview_text{{ $jobExperience->id }}">
      <div class="div align-center mt-1  cut-text text-secondary" style="width: 80%; font-size: 12px">
        <div class="" style="font-weight: 600; #">
          {{ $jobExperience->position }} @ {{ $jobExperience->company }}
        </div>
        <div>
          {{ $start_date }} - {{ $end_date }}
        </div>
      </div>
      <div class="div">
        <button class="me-2 btn btn-light-outline btn-sm" style="box-shadow: unset !important; margin-top: 5px"
          id="edit_jobEpxerience{{ $jobExperience->id }}">Bearbeiten</button>
      </div>
      <div class="div">
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important; margin-top: 5px"
          id="try_delete_jobEpxerience{{ $jobExperience->id }}">Löschen</button>
      </div>
    </div>
    <div class="d-flex justify-content-between d-none" id="jobExperience_delete_text{{ $jobExperience->id }}">
      <div class="" style="margin-top: 8px">
        Bist du sicher?
      </div>
      <div style="margin-top: 5px">
        <button class="btn btn-danger btn-sm" id="final_delete_jobEpxerience{{ $jobExperience->id }}">Löschen</button>
        <button class="btn btn-light-outline btn-sm" style="box-shadow: unset !important"
          id="discard_jobEpxerience{{ $jobExperience->id }}">Abbrechen</button>
      </div>
    </div>
  </div>
</div>
<script>
  var discardBtn = $('#discard_jobEpxerience' + '{{ $jobExperience->id }}');
  var tryDelteBtn = $('#try_delete_jobEpxerience' + '{{ $jobExperience->id }}');
  var finalDelteBtn = $('#final_delete_jobEpxerience' + '{{ $jobExperience->id }}');
  var editBtn = $('#edit_jobEpxerience' + '{{ $jobExperience->id }}');


  var ANIM_0 = 'animate__animated animate__headShake animate__faster';
  var ANIM_1 = 'animate__animated animate__backOutRight';



  editBtn.on("click", function() {
    $('#add_cv_modal').modal('hide');
    $('#edit_job_experience_modal').modal('show');
    var id = '{{ $jobExperience->id }}';
    var job_location = '{{ $jobExperience->location_city }}' + ', ' + '{{ $jobExperience->location_state }}';
    var company = '{{ $jobExperience->company }}';
    var description = '{{ $jobExperience->description }}';
    var employment_type = '{{ $jobExperience->employment_type }}';
    var company_type = '{{ $jobExperience->company_type }}';
    var start_date = '{{ $jobExperience->start_date }}';
    var end_date = '{{ $jobExperience->end_date }}';
    var position = '{{ $jobExperience->position }}';
    var is_current_position = '{{ $jobExperience->is_current_position }}';
    var is_custom_employment_type = '{{ $jobExperience->is_custom_employment_type }}';
    var is_custom_company_type = '{{ $jobExperience->is_custom_company_type }}'

    returnToMainModal = true;
    prepareEditExperienceModal(id, job_location, company, description, employment_type, company, company_type,
      employment_type, start_date, end_date, position, is_current_position, is_custom_company_type,
      is_custom_employment_type);
  });




  finalDelteBtn.on("click", function() {
    var previewBox = $('#preview_job_experience' + '{{ $jobExperience->id }}');
    var jobExperience = $('#job_experience' + '{{ $jobExperience->id }}');
    previewBox.addClass(ANIM_1);

    setTimeout(() => {

      previewBox.parent().animate({
        height: 0,
        margin: 0,
        padding: 0
      }, 50, function() {
        previewBox.parent().remove();
        jobExperience.remove();
        deleteJobExperience('{{ $jobExperience->id }}');
      });

    }, 500);
  });

  tryDelteBtn.on("click", function() {
    var previewBox = $('#preview_job_experience' + '{{ $jobExperience->id }}');
    var deleteText = $('#jobExperience_delete_text' + '{{ $jobExperience->id }}');
    var previewText = $('#jobExperience_preview_text' + '{{ $jobExperience->id }}');

    previewBox.addClass(ANIM_0);

    setTimeout(() => {
      previewBox.addClass("bg-light");
      previewText.addClass('d-none');
      deleteText.removeClass('d-none');
      previewBox.removeClass(ANIM_0);
    }, 500);
  });

  discardBtn.on("click", function() {
    var previewBox = $('#preview_job_experience' + '{{ $jobExperience->id }}');
    var deleteText = $('#jobExperience_delete_text' + '{{ $jobExperience->id }}');
    var previewText = $('#jobExperience_preview_text' + '{{ $jobExperience->id }}');
    previewBox.addClass(ANIM_0);
    setTimeout(() => {
      previewBox.removeClass("bg-light");
      previewText.removeClass('d-none');
      deleteText.addClass('d-none');
      previewBox.removeClass(ANIM_0);
    }, 500);
  });
</script>
