<?php
$type = '';
if ($user->status == 'team') {
    $type = '<img class="" src="/images/team_badge.svg" alt="" width="30" height="30">';
}
?>

<div id="badge_{{ $user->username }}" class="status-badge">{!! $type !!}
  <div id="badge_text_{{ $user->username }}" class="d-none badge-text shadow-md p-2 bg-white display-none">Team
    Curawork</div>
</div>

<script>
  $("#badge_" + '{{ $user->username }}').on("mouseover", function() {
    $("#badge_text_" + '{{ $user->username }}').removeClass('d-none');
  });
  $("#badge_" + '{{ $user->username }}').on("mouseleave", function() {
    $("#badge_text_" + '{{ $user->username }}').addClass('d-none');
  });
</script>
