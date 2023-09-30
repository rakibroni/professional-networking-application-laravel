<?php
$userPostCount = auth()->user()->postCount(auth()->user()->username);
?>

<div class="ProfileBoxLeftInner">
  <div class="row">
    <div class="col-4 mt-2 ms-2 ">
      <?php Helper::profilePicture(
        'user_stats_profile_pic',
        '60px',
        auth()->user(),
        'ProfileImageUser',
        '',
      ); ?>

    </div>
    <div class="col-7 align-self-center" style="cursor: pointer;" onclick="loadUserProfileCard('{{ auth()->user()->username }}');">
      <div class="ps-2 ProfileBoxLeftFontStyle">{{ auth()->user()->firstname }}

      </div>
      <div class="ps-2 ProfileBoxLeftFontStyle">{{ auth()->user()->name . '' }}

      </div>
    </div>

  </div>
  <div class="row pb-2">

    <div class="ProfileBoxLeftProfileViews ">
      <div class="ProfileBoxLeftProfileViews1">{{ auth()->user()->connectionCount() }}</div>
      <div class="ProfileBoxLeftProfileViews2">Verbindungen</div>
    </div>

    <div class="linebetween">

    </div>

    <div class="ProfileBoxLeftProfilePosts">
      <div class="ProfileBoxLeftProfilePosts1">{{ $userPostCount }}</div>
      <div class="ProfileBoxLeftProfilePosts2">
        @if ($userPostCount == 1)
          Post
        @else
          Posts
        @endif
    </div>
    </div>

  </div>
</div>