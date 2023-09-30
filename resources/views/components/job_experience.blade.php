<?php
$start_date = Helper::reFormatStartDate($jobExperience);
$end_date = Helper::reFormatEndDate($jobExperience);
?>
<div class="row pb-1" id="job_experience{{ $jobExperience->id }}">
  <div class="col-12 col-md-3 mb-2 d-flex justify-content-between mt-1">
    <div class="ProfileExperienceDate align-self-center align-self-md-start">{{ $start_date }} - {{ $end_date }}
    </div>
    @if ($viewerOwnsProfile)
    {{-- <divstyle="width:32px;height:32px"id="open_edit_job_experience_modal$jobExperience->id"
      class="p-1  pointer-on-hover d-block d-md-none btn-edit"><img style="width: 100%; height: 100%"
        class="ProfileEditIcon" src="/images/Pen.svg" alt="">
    </div>--}}
    @endif
  </div>
  <div class="col-12 col-md-9 mb-2 mb-md-4 ps-2 ps-sm-4 ps-md-0">
    <div class="mb-2 d-flex justify-content-between">
      <div class="ProfileRoleFont2 align-self-center">{{ $jobExperience->position }}</div>

      @if ($viewerOwnsProfile)
      <div style="width: 32px; height: 32px" id="open_edit_job_experience_modal{{ $jobExperience->id }}"
        class="p-1  pointer-on-hover   btn-edit"><img style="width: 100%; height: 100%"
          class="ProfileEditIcon" src="/images/Pen.svg" alt="">
      </div>
      @endif
 

      
    </div>
    <div class="ProfileInstitutionFont mb-2">{{ $jobExperience->company }} | {{ $jobExperience->company_type }} |
      {{ $jobExperience->location_city }}, {{ $jobExperience->location_state }}
    </div>
    <div class="ProfileExperienceFont mb-1">{{ $jobExperience->description }}
    </div>
  </div>
</div>

<div id="hidden_modal_body{{ $jobExperience->id }}" class="d-none">
  <?php $count = $jobExperience->id; ?>
  <x-add_job_experience :count="$count" />
</div>
<script>
  var id = '{{ $jobExperience->id }}';

  $('#open_edit_job_experience_modal' + '{{ $jobExperience->id }}').on("click", function() {
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

    prepareEditExperienceModal(id, job_location, company, description, employment_type, company, company_type,
      employment_type, start_date, end_date, position, is_current_position, is_custom_company_type,
      is_custom_employment_type);
  });
</script>
