<div class="row">
  <?php
  use App\Models\UserFollowers;
  use App\Models\User;
  
  $profile_pic = $user->profilePicture()->first();
  $profile_pic_path = $profile_pic->path;
  $zoom = $profile_pic->zoom;
  $zoom = str_replace('%', '', $zoom);
  $zoom = (float) $zoom / 10;
  
  $viewerOwnsProfile = false;
  
  if ($user == auth()->user()) {
      $viewerOwnsProfile = true;
  }
  
  $connectButtonArray = Helper::connectButton($user);
  $connectBtnStyle = $connectButtonArray[0];
  $connectBtnText = $connectButtonArray[1];
  $connectBtnSrc = $connectButtonArray[2];
  ?>

  <!-- MAIN CONTENT -->
  <div class="row p-0 my-0 mx-0 my-md-3 mx-xl-3 mx-md-0">
    <div class="col-lg-9 p-0">
      <div class="w-lg-90 mx-0 mx-md-3 mx-lg-4" style="position: relative">

        <div class="d-none d-md-block _title-img_profile _shadowDown _no-br-bottom _no-br-top"></div>
        <div class="d-none d-sm-block d-md-none _title-img_profile _shadowDown _no-br-bottom"></div>
        <div class="d-block d-sm-none _title-img_profile1 _shadowDown _no-br-bottom"></div>

        <div class="_shadowDown custom-br bg-white">


          @if ($viewerOwnsProfile)



            <div style="width: 32px; height: 32px" id="open-personal-exp-popup"
              class="position-absolute end-0 p-1 mt-1 me-1 pointer-on-hover  btn-edit"><img
                style="width: 100%; height: 100%" class="ProfileEditIcon" src="/images/Pen.svg" alt=""></div>
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

      <!-- TABS -->
      <div class="d-block d-md-none col-12 bg-white _shadowDown">
        <div class="row pt-2">
          <span class="col-4 linebetween_profile"><button onclick="//showInfos()"
              class="h-100 w-100 profile_button_second px-2 py-1" autofocus>Information</button></span>
          <span class="col-4 linebetween_profile"><button
              onclick="loadUserProfileCard('{{ $user->username }}', 'activity', false)"
              class="h-100 w-100 profile_button_second px-2 py-1">Beiträge1</button></span>
          <span class="col-4"><button onclick="//showConnections()"
              class="h-100 w-100 profile_button_second px-2 py-1">Verbindungen</button></span>
        </div>
      </div>

      <div class="_shadowDown d-none d-md-block _no-br-topgrey br_bottom_menu">
        <div style="height: 60px; margin-top: -40px">
          <div class="_no-br-topgrey h-100" style="background-color: #EDEDED"></div>
        </div>
        <div class="bg-white br_bottom_menu">
          <span class="profile_button_second"><button
              onclick="loadUserProfileCard('{{ $user->username }}', 'default', false)"
              class="br_bottom_left profile_button_second px-4 pt-3 pb-2" autofocus>Information</button></span>
          <span class="profile_button_second"><button
              onclick="loadUserProfileCard('{{ $user->username }}', 'activity', false)"
              class="profile_button_second px-4 pt-3 pb-2">Beiträge1</button></span>
          <span class="profile_button_second"><button class="profile_button_second px-4 pt-3 pb-2"
              id="userProfileConnetion"
              onclick="//switchTab(this.id, '{{ $user->username }}')">Verbindungen</button></span>
        </div>
      </div>
      <!-- TABS -->


      <div id="user_info" class="">
        <!-- USER SUMMARY -->
        <div class="mt-3 bg-white px-2 px-sm-3 px-md-4 py-3 _br shadowtop">
          <div class="d-flex justify-content-between mb-2">

            <div class="ProfileHeader1">Über mich</div>
            @if ($viewerOwnsProfile)
              <div style="width: 32px; height: 32px" id="open_summary_modal" class="p-1  pointer-on-hover  btn-edit">
                <img style="width: 100%; height: 100%" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
              </div>
            @endif
          </div>
          <div class="col-12 ProfileText1 mt-1" id="summary-"
            style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top">
            {{ $user->summary }}</div>
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
                <div class="p-1  pointer-on-hover  btn-edit"
                  onclick="openCVModal($(this).children('img').attr('id'), '0')">
                  <img id="open_show_other_modal0" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
                </div>
              </div>
            @endif

          </div>
          <div id="training">
            {{ $user->getUserTraining() }}
          </div>
          <div class="hr"></div>
          <div class="d-flex justify-content-between mb-3">
            <div class="ProfileHeader1">Skills</div>
            @if ($viewerOwnsProfile)
              <div class="">
                <div class="p-1  pointer-on-hover  btn-edit"
                  onclick="openCVModal($(this).children('img').attr('id'), '1')">
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
                <div class="p-1  pointer-on-hover  btn-edit"
                  onclick="openCVModal($(this).children('img').attr('id'), '2')">
                  <img id="open_show_other_modal2" class="ProfileEditIcon" src="/images/Pen.svg" alt="">
                </div>
              </div>
            @endif

          </div>
          <div id="languages">
            {{ $user->getUserLanguages() }}
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
      <div id="profile_main_content">
        
      </div>
    </div>

  </div>

</div>

<div style="height: 200px"></div>

<!-- MAIN CONTENT END -->


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

<script src="{{ asset('js/errorHandler.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/picture.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/profile.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/jobExperience.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/educationStation.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/userTraining.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/userSkills.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/userLanguages.js') }}?v={{ time() }}"></script>
<script src="{{ asset('js/cvModal.js') }}?v={{ time() }}"></script>
<!-- JAVSCRIPT END -->
