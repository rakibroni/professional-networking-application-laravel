


<?php
$connectBtnStyle = $connectButtonArray[0];
$connectBtnText = $connectButtonArray[1];
$connectBtnSrc = $connectButtonArray[2];
?>

<div id="user_info" class="">
  <!-- USER SUMMARY -->
  <div class="mt-3 bg-white px-2 px-sm-3 px-md-4 py-3 _br shadowtop">
    <div class="d-flex justify-content-between mb-2">

      <div class="ProfileHeader1">Über mich</div>
      @if ($viewerOwnsProfile)
        <div style="width: 32px; height: 32px" id="open_summary_modal" onclick=""
          class="p-1  pointer-on-hover  btn-edit">
          <img style="width: 100%; height: 100%" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
        </div>
      @endif
    </div>

    <div class="col-12 ProfileText1 mt-1" id="summary-"
      style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top">{{ $user->summary }}</div>
  </div>

  <!-- USER SUMMARY END -->
  <div class="mt-3 bg-white px-2 px-sm-3 px-md-4 py-3 _br shadowtop">
    <!-- JOB EXPERIENCE -->
    <x-job_experiences_container :user="$user" :viewerOwnsProfile="$viewerOwnsProfile" />
    <div class="hr"></div>
    <!-- EDUCATION STATIONS -->
    <x-education_stations_container :user="$user" :viewerOwnsProfile="$viewerOwnsProfile" />
  </div>

  <!-- Box 2 Weiterbildung -->
  <div class="_br shadow-md px-2 px-sm-3 px-md-4 py-3 bg-white mt-3">
    <!-- Weiterbildung -->
    <div class="d-flex justify-content-between mb-3">
      <div class="ProfileHeader1">(Fach-) Weiterbildung</div>
      @if ($viewerOwnsProfile)
        <div class="">
          <div class="p-1  pointer-on-hover  btn-edit" onclick="openCVModal($(this).children('img').attr('id'), '0')">
            <img id="open_show_other_modal0" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
          </div>
        </div>
      @endif

    </div>
    <div id="training">
      {{-- $user->getUserTraining() --}}
    </div>
    <div class="hr"></div>
    <div class="d-flex justify-content-between mb-3">
      <div class="ProfileHeader1">Skills</div>
      @if ($viewerOwnsProfile)
        <div class="">
          <div class="p-1  pointer-on-hover  btn-edit" onclick="openCVModal($(this).children('img').attr('id'), '1')">
            <img id="open_show_other_modal1" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
          </div>
        </div>
      @endif

    </div>
    <div id="skills">
      {{ $user->getUserSkills() }}
    </div>
    <div class="hr"></div>
    <div class="d-flex justify-content-between mb-3">
      <div class="ProfileHeader1">Sprachen</div>
      @if ($viewerOwnsProfile)
        <div class="">
          <div class="p-1  pointer-on-hover  btn-edit" onclick="openCVModal($(this).children('img').attr('id'), '2')">
            <img id="open_show_other_modal2" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
          </div>
        </div>
      @endif

    </div>
    <div id="languages">
      {{-- $user->getUserLanguages() --}}
    </div>

  </div>

  <!-- Mitglied bei Curawork -->
  <div class="_br shadow-md px-2 px-md-4 py-3 mb-3 bg-white mt-3">

    <div class="ProfileCWMember mb-3 text-center" style="color: #ff9721 !important;">
      Mitglied bei Curawork</div>
    <div class="ProfileLicenseFont text-center">seit
      {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</div>
  </div>
</div>
