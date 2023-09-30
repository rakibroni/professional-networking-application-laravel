<?php

$start_date = Helper::reFormatStartDate($educationStation);
$end_date = Helper::reFormatEndDate($educationStation);

?>
<div class="row pb-1" id="job_experience{{ $educationStation->id }}">
  <div class="col-12 col-md-3 mb-2 d-flex justify-content-between mt-1">
    <div class="ProfileExperienceDate align-self-center align-self-md-start">{{ $start_date }} - {{ $end_date }}
    </div>
    
    {{-- @if ($viewerOwnsProfile)<div style="width: 32px; height: 32px" id="open_edit_education_station_modal{{ $educationStation->id }}"
      class="p-1 pointer-on-hover d-block d-md-none btn-edit"><img style="width: 100%; height: 100%"
        class="ProfileEditIcon" src="/images/Pen.svg" alt=""></div>
        @endif 
   --}}
  </div>
  <div class="col-12 col-md-9 mb-2 mb-md-4 ps-2 ps-sm-4 ps-md-0">
    <div class="mb-2 d-flex justify-content-between">
      <div class="ProfileRoleFont2 align-self-center">{{ $educationStation->degree }}</div>



      @if ($viewerOwnsProfile)
      <div style="width: 32px; height: 32px" id="open_edit_education_station_modal{{ $educationStation->id }}"
        class="p-1 pointer-on-hover  btn-edit"><img style="width: 100%; height: 100%"
          class="ProfileEditIcon" src="/images/Pen.svg" alt=""></div>
      @endif 
      



    </div>
    <div class="ProfileInstitutionFont mb-2">{{ $educationStation->degree_type }} | {{ $educationStation->school }}

    </div>

  </div>
</div>

<div id="hidden_modal_body_education{{ $educationStation->id }}" class="d-none">
  <?php $count = $educationStation->id; ?>
  <x-add_education :count="$count" />
</div>
<script>
  var id = '{{ $educationStation->id }}';

  $('#open_edit_education_station_modal' + '{{ $educationStation->id }}').on("click", function() {

    var id = '{{ $educationStation->id }}';
    var school =  '{{ $educationStation->school }}';
    var degree = '{{ $educationStation->degree }}';
    var degree_type = '{{ $educationStation->degree_type }}';
    var start_date = '{{ $educationStation->start_date }}';
    var end_date = '{{ $educationStation->end_date }}';
    var is_current_school = '{{ $educationStation->is_current_school }}';
    var is_custom_degree_type = '{{ $educationStation->is_custom_degree_type }}';
      
    prepareEditEducationStationModal(id, degree, degree_type, school, start_date, end_date, is_current_school, is_custom_degree_type);
  });

</script>
