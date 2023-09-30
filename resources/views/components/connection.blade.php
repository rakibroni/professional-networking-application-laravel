<?php
use App\Models\UserFollowers;
use App\Models\User;
$text_3rd = '';
$onclick = '';
if (isset($isInsideConnectionsInCommonModal)) {
    $text_3rd = 'asd';
    $onclick = "$('#in_common_connections').modal('hide')";
}


if (isset($isInsideReactionsModal)) {
    $text_3rd = 'in_common';
    $onclick = "$('#reaction_modal').modal('hide')";
}

if (isset($inNetwork)) {
    $text_3rd = '';
    $onclick = "$('#reaction_modal').modal('hide')";
}

$userFollowerConnection = UserFollowers::where([
    'user_id' => auth()->user()->id,
    'follower_id' => $connection->id,
])->get();
$connectedSince = '';
$connectedToAuthUser = false;

if ($userFollowerConnection->count() == 1) {
    $connectedToAuthUser = true;
    $connectedSince = str_replace(
        'vor',
        'Verbunden seit',
        $userFollowerConnection
            ->first()
            ->updated_at->locale('de_DE')
            ->shortRelativeDiffForHumans(),
    );
}

$connectButtonArray = Helper::connectButton($connection);
$connectBtnStyle = $connectButtonArray[0];
$connectBtnText = $connectButtonArray[1];
$connectBtnSrc = $connectButtonArray[2];
?>


<div class=" div" id="connection_parent{{ $connection->username }}">

  <div class="row py-4">

    <div class="position-absolute" style="width: 80px !important" onclick='{{ $onclick }}'>
      <?php Helper::profilePicture('asdas', '60px', $connection, 'ms-2 ms-sm-3', ''); ?>
    </div>


    <div class="col-10 col-md-9 ps-sm-2 pe-2 pe-sm-0">
      <div class="ConnectMarginLeftRight">
        <div class="ConnectionsNameFont HideOverflowText"
          onclick="{{ $onclick }}; loadUserProfileCard('{{ $connection->username }}')">
          <span class="underline-on-hover"> {{ $connection->fullname() }}</span>
        </div>
        <div class="HideOverflowText2 ConnectionsStelleAGFont my-1"
          onclick="loadUserProfileCard('{{ $connection->username }}')">
          <span
            class="pointer-on-hover">{{ $connection->current_position }}{{ $connection->currentEmployer(['']) }}</span>
        </div>

        @if ($text_3rd == '')
          <div class="PostCommonFriendsFont mt-sm-1 HideOverflowText">
            {{ $connectedSince }}
          </div>
        @else
          <div class="PostCommonFriendsFont mt-sm-1 HideOverflowText">
            @if ($connection->id != auth()->user()->id)
              {!! $connection->connectionsInCommonString() !!}
            @endif
          </div>
        @endif



      </div>
    </div>
    <div class="col-2 col-md-3 pe-1 d-inline-block align-self-center">
      <div class="d-flex text-center align-items-center justify-content-evenly">
        @if ($connection->id != auth()->user()->id)
          @if ($connectedToAuthUser)
            <button class="btn buttonmessage2 d-block d-md-none p-0"><img src="/images/msgprofileorange.svg"
                style="width:26px" alt=""></button>
            <button class="btn buttonmessage3 d-none d-md-block py-0" style="width: 150px !important"><img
                src="/images/msgprofilewhite.svg" style="width:20px; padding-bottom: 2px" class="me-2" alt=""><span
                style="font-size: 15px; color: white;">Nachricht</span></button>
          @else
            <style>
              .connect-btn-extra-style {}

              @media (max-width: 768px) {
                .connect-btn-extra-style {
                  width: 26px;
                  height: 25px;
                  padding-left: 6px;
                }
              }

            </style>
            <button style="{{ $connectBtnStyle }}; max-width: 145px; max-height: 28px; font-size: 14px !important"
              id="btn_{{ $connection->username }}" onclick="requestConnection('{{ $connection->username }}')"
              class="connect-btn-extra-style float-start float-md-end mt-0 mt-md-0 ms-md-0 buttonconnect align-middle d-block">
              <div class="d-inline-block">
                <img id="btn_img{{ $connection->username }}" class="me-1 mb-0" style="height: 14px !important"
                  src="{{ $connectBtnSrc }}">
              </div><span class="d-none d-md-inline-block"
                id="btn_value{{ $connection->username }}">{{ $connectBtnText }}</span>
            </button>
          @endif
          @if ($text_3rd == '')
            <div class="btn-group p-1">
              <button class="btn-clear p-0" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" max-width="50px" height="23" fill="currentColor"
                  class="bi bi-three-dots" viewBox="0 0 16 16" style="color: rgba(168, 168, 168, 1)">
                  <path
                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
              </button>
              <ul class="dropdown-menu">
                <li>
                  <div onclick="removeConnection('{{ $connection->username }}')"
                    class="dropdown-item pointer-on-hover">
                    Entfernen</div>
                </li>
              </ul>
            </div>
          @endif
        @endif
      </div>

    </div>
  </div>
  <hr class="my-0" style="color: #BCBBBB">
</div>
