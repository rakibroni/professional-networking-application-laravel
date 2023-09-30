<?php $user = $connectionRequest->user($connectionRequest->follower_id); ?>

<div class="div" id="request{{ $user->username }}">

  <div class="row pt-3 pb-3">


    <div class="position-absolute" style="width: 80px !important">
      <?php Helper::profilePicture('test', '60px', $user, 'ms-2 ms-sm-3', ''); ?>
    </div>
    <div class="ConnectMarginLeftRight">
      <div class="row ConnectMarginLeftRight">
        <div class="col-12 pe-3 col-sm-9 col-lg-8 ps-sm-2 d-inline-block">
          <div class="justify-content-center align-self-center">
            <div class="ConnectionsNameFont HideOverflowText" onclick="loadUserProfileCard('{{ $user->username }}')">
              <span class="underline-on-hover">{{ $user->fullName() }}</span>
            </div>
            <div class="HideOverflowText2 ConnectionsStelleAGFont my-1"
              onclick="loadUserProfileCard('{{ $user->username }}')">
              <span
                class="pointer-on-hover">{{ $user->current_position }}{{ $user->currentEmployer(['']) }}</span>
            </div>
            <div class="PostCommonFriendsFont">
              <span class="">{!! $user->connectionsInCommonString() !!}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-3 col-lg-4 d-inline-block align-start pe-sm-3 mt-2 mt-sm-0 align-self-center">
          <div class="row">
            <div class="col-5 col-sm-12 col-lg-5 mb-sm-2 pe-1 pe-sm-0 me-lg-2">
              <button type="button" class="w-100 btn btn-warning btn-cura p-0 py-lg-1 pointer-on-hover"
                style="font-size: 15px" onclick="acceptRequest('{{ $user->username }}')">
                Annehmen
              </button>
            </div>
            <div class="col-5 col-sm-12 col-lg-5 ps-1 ps-sm-0">
              <button id="ablehnen" type="button" class="btn ConnectionDeclineBtn w-100 btn p-0 py-lg-1"
                style="font-size: 15px; border-radius: 5px !important">
                Ablehnen
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
