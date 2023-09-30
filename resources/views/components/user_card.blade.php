


<?php
$connectBtnStyle = $connectButtonArray[0];
$connectBtnText = $connectButtonArray[1];
$connectBtnSrc = $connectButtonArray[2];

use App\Models\UserFollowers;
use App\Models\User;

$profile_pic = $user->profilePicture()->first();
$zoom = $profile_pic->zoom;
$zoom = str_replace('%', '', $zoom);
$zoom = (float) $zoom / 10;

?>

<div class="w-lg-90 mx-0 mx-md-3 mx-lg-4" style="position: relative; z-index: 20">

  <div class="d-none d-md-block _title-img_profile _shadowDown _no-br-bottom _no-br-top"></div>
  <div class="d-none d-sm-block d-md-none _title-img_profile _shadowDown _no-br-bottom"></div>
  <div class="d-block d-sm-none _title-img_profile1 _shadowDown _no-br-bottom"></div>

  <div class="_shadowDown custom-br bg-white">


    @if ($viewerOwnsProfile)



      <div style="width: 32px; height: 32px" id="open-personal-exp-popup"
        class="position-absolute end-0 p-1 mt-1 me-1 pointer-on-hover  btn-edit"><img style="width: 100%; height: 100%"
          class="ProfileEditIcon" src="/images/Pen.svg" alt=""></div>
    @endif



    <button onclick="stopEditingProfilePic()" type="button" class="btn-clear" data-bs-toggle="modal"
      data-bs-target="#edit_profile_picture_modal" role="button">
      <div class="d-none d-md-block">

        <?php Helper::profilePicture('profile-pic', '121px', $user, '_profile-pic-btns', ''); ?>
      </div>
      <!-- neue ID hinzufügen für 3. größe -->
      <div class="d-none d-sm-block d-md-none">
        <?php Helper::profilePicture('profile-pic1', '110px', $user, '_profile-pic-btns', ''); ?>
      </div>
      <div class="d-block d-sm-none">
        <?php Helper::profilePicture('profile-pic2', '80px', $user, '_profile-pic-btns', ''); ?>
      </div>
    </button>


    <!-- Card User Profile -->

    <div class="row px-2 px-sm-3 px-md-4">
      <div class="d-none d-md-block col-12 pt-2 ProfileNameFont pb-1">
        <span id="first-name">{{ $user->firstname }} </span>
        <span id="last-name">{{ $user->name }}</span>
        <span class="ProfileLocationFont ps-2">aus <span
            id="work-city">{{ $user->location_city . ', ' . $user->location_state }}</span></span>
      </div>
      <div class="d-block d-md-none ol-12 pt-2 ProfileNameFont pb-1">
        <span id="first-name1">{{ $user->firstname }} </span>
        <span id="last-name1">{{ $user->name }}</span>
      </div>


      <div class="col-12 d-block d-md-none ProfileLocationFont mb-1">
        <span>aus <span id="work-city1">{{ $user->location_city . ', ' . $user->location_state }}</span></span>
        <span id=""> - <span id="connections-count"> {{ $user->connectionCount() }} </span>
          @if ($user->connectionCount() == 1)
            Verbindung
          @else
            Verbindungen
          @endif
        </span>
      </div>

      <div class="col-12 col-md-9 py-1  ProfileRoleFont" id="current-position">{{ $user->current_position }}
      </div>
      <div class="d-none d-md-block col-3 py-1 ConnectionsFont text-end"><span id="connections-count1">
          {{ $user->connectionCount() }}</span>
        @if ($user->connectionCount() == 1)
          Verbindung
        @else
          Verbindungen
        @endif
      </div>

    </div>
    <div class="row px-2 px-sm-3 px-md-4 pt-1 pb-3">
      <div class="col-md-9 col-12">
        <div class="row py-1">
          {{-- <div style="height: 35px; width: 35px"><img class="img-fluid me-1" id="institution-photo"
              src="/images/image1.png"></div> --}}
          <div class="col-10 align-self-center AGNameFont" id="employer-name">


            {{ $user->currentEmployer(['s']) }}




          </div>
          @if (!$viewerOwnsProfile)
            <div class="col-12 mb-2 mt-3 CommonFriendsFont d-none d-md-block" id="employer-name">
              {!! $user->connectionsInCommonString() !!}</div>
          @endif
        </div>
      </div>



      @if (!$viewerOwnsProfile)
        <div class="col-md-3 col-12 mt-2 mt-md-0">
          <button style="{{ $connectBtnStyle }}; width: 145px; height: 28px; font-size: 14px !important"
            id="btn_{{ $user->username }}" onclick="requestConnection('{{ $user->username }}')"
            class="float-start float-md-end mt-0 mt-md-0 ms-md-0 buttonconnect align-middle d-block">
            <div class="d-inline-block">
              <img id="btn_img{{ $user->username }}" class="me-1 mb-0"
                style="margin-bottom: 3px !important ;height: 14px !important" src="{{ $connectBtnSrc }}">
            </div><span id="btn_value{{ $user->username }}">{{ $connectBtnText }}</span>
          </button>
          <button class="float-start float-md-end mt-0 mt-md-2 ms-sm-1 ms-1 ms-md-0 buttonmessage align-middle">
            <img class="me-1" style="margin-bottom: 2px"
              src="{{ asset('/images/msgprofile.svg') }}">Nachricht</button>
        </div>
        <div class="d-block d-md-none col-12 mt-2 mb-1 CommonFriendsFont" id="employer-name2">
          {!! $user->connectionsInCommonString() !!}</div>
      @endif
    </div>
  </div>
</div>

<!-- MODALS -->
@if (!$viewerOwnsProfile)
  <!-- MODAL - ONLY PROFILE PICTURE -->
  <x-only_profile_picture_modal :user="$user" />


@endif

@if ($viewerOwnsProfile)
  <!-- Modal - USER SUMMARY -->
  <x-user_summary_modal :user="$user" />

  <!-- Modal - DISCARD CHANGES -->
  <x-discard_changes_modal />

  <!-- Modal - DELETE PROFILE IMG -->
  <x-delete_profile_picture_modal />

  <!-- MODAL - CHANGE PROFILE PICTURE -->
  <x-change_profile_picture_modal :user="$user" :zoom="$zoom" />

  <!-- Modal - UPDATE USER INFO -->
  <x-update_user_info_modal :user="$user" />

  <!-- Modal - USER CV -->
  <x-user_cv_modal :user="$user" />
@endif
<!-- MODALS END -->


<!-- JAVSCRIPT  -->
<script>
  var username = '{{ auth()->user()->username }}';
</script>


<!-- JAVSCRIPT END -->



