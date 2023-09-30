



<div class="position-relative mb-3">
  <div class="align-self-center position-relative" id="{{ $mainId }}">
    <div class="row position-relative pt-1 pb-1" style="height: 58px;">
      <div class="ce" id="{{ $letterId }}">
        <svg width="30" height="50" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M13.5859 12.868C13.2438 13.1546 12.7515 13.1546 12.4094 12.868L0 2.40848V18.7808C0 19.3055 0.415735 19.7308 0.928589 19.7308H25.0714C25.5843 19.7308 26 19.3055 26 18.7808V2.54909L13.5859 12.868Z"
            fill="#ff9721" />
          <path
            d="M25.071 0.730774H0.928177L12.9996 10.9034L25.2075 0.759274C25.1628 0.745915 25.1172 0.736396 25.071 0.730774Z"
            fill="#ff9721" />
        </svg>
      </div>
      <div id="{{ $userDivId }}" class="d-flex justify-content-start" style="width: 281px !important">
        <div class="">
          <?php Helper::profilePicture('testuser', '48px', $user, '', ''); ?>
        </div>
        <div class="ms-2">
          <div class="d-inline-block pe-1 text-start " style="width: 186px !important">
            <div class="float-start InviteFriendsProfilTextRight1 HideOverflowText mb-1 underline-on-hover" onclick="loadUserProfileCard('{{ $user->username }}')">{{ $user->fullName() }}</div>
            <div class="float-start InviteFriendsProfilTextRight2 HideOverflowText mb-1">{{ $user->current_position }}{{ $user->currentEmployer(array('')) }}</div>
            <div class="float-start InviteFriendsProfilTextRight3 HideOverflowText">aus {{ $user->location_city }}</div>
          </div>
          <div  id="plus_btn{{ $user->username }}" class="d-inline-block pointer-on-hover float-end align-self-center me-2" style="margin-top: 10px" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id)">
            <img id="target" onclick="requestConnection('{{ $user->username }}');sendRequest1('{{ $mainId }}', '{{ $userDivId }}', '{{ $letterId }}', '{{ $page }}')" style="" class="" src="/images/NavBarLeftAddIcon.svg"
              alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $('#'+ '{{$letterId}}').fadeOut(0);
</script>