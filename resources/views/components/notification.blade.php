<?php

use App\Models\User;
use App\Models\Post;

$sender_id = $notification->sender_id;
$sender = User::where('id', $sender_id)->first();
$optional = $notification->optional;
$optional_1 = $notification->optional_1;
$message_type = $notification->message_type;
$post = '';
$uuid = '';
$status = $notification->status;

if (($message_type == 'like' || $message_type == 'comment') && $optional != '') {
    $post = Post::where('id', $optional)
        ->get()
        ->first();
    $uuid = $post->uuid;
}
$status = $notification->status;

?>

<style>
  .NotificationsMargin {
    margin-left: 67px !important;
    width: calc(100%-67px);
    align-self: center;
  }

</style>



<div class="px-0 px-sm-2 px-md-3" id="notification_parent{{ $notification->id }}">
  <div class="py-2 _br shadow-md backgroundhover @if ($status == 'not seen') NewNotificationBoxStyle @endif pointer-on-hover bg-white mb-0 mb-sm-2"
    style="">
    <div class="pe-1 pe-sm-2 position-relative" style="">
      <div class="position-absolute top-0 start-0 text-center @if ($status == 'not seen') ms-1 @endif ms-2">
        <div id="sender{{ $notification->id }}_img">
          <?php Helper::profilePicture('', '50px', $sender, 'pointer-on-hover', 'margin-top:7px'); ?>
        </div>
      </div>

      <div class="d-flex align-self-center justify-content-between" style="height: 65px; line-height: 12px">
        <div class="d-inline-block NotificationsMargin">
          <span id="sender{{ $notification->id }}_name"
            class="NotificationsBoxMidFontStyle2 align-self-center me-0 me-sm-1 underline-on-hover">{{ $sender->fullname() }}
          </span>
          {!! $notification->getNotificationsMessage($notification->id, $message_type, $uuid, $optional_1) !!}
        </div>

        <div class="text-end ms-1 ms-sm-2 d-inline-block align-self-center NotificationsBoxMidFontStyle4"
          style="min-width: 61px">
          {{ $notification->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var blockParent = false;
  $('#notification_parent' + '{{ $notification->id }}').on('click', function() {
    if (blockParent == false) {
      loadPageOnNotificationClick('{{ $notification->id }}', '{{ $status }}', '{{ $message_type }}',
        '{{ $uuid }}', '{{ $optional_1 }}');
    }
  });

  $('#sender' + '{{ $notification->id }}' + '_name').on('click', function() {
    blockParent = true;
    loadUserProfileCard('{{ $sender->username }}');
  });

  $('#sender' + '{{ $notification->id }}' + '_img').on('click', function() {
    blockParent = true;
    loadUserProfileCard('{{ $sender->username }}');
  });
</script>
