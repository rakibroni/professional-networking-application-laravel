<div class="ProfileBoxLeftInner mb-2">
  <div class="px-3 py-2">
    <div class="col-12">
      <div class="text-center NotificationsBoxLeftFontStyle2">Hier kanns du alle Aktivitäten von <span style="font-weight: 600">{{ $user->firstname }} </span>, wie z.B. Beiträge, Kommentare und Likes sehen.</div>
    </div>
  </div>
</div>





<div class="active-activity-tab p-2 w-100" style="border-top-right-radius: 5px; border-top-left-radius: 5px;">
  <div class="d-flex justify-content-between">
    <div>Beiträge</div>
    <div>{{ $user->postCount() }}</div>
  </div>
</div>
<?php $sideLinksID = 'userprofile'; ?>
<div onmouseleave="removeAvailableMsg(this.id); $('#'+this.id).removeClass('border rounded2 pe-2')"
  onmouseover="showNotAvailableMsg(this.id); $('#'+this.id).addClass('border rounded2 pe-2')" id="{{ $sideLinksID }}"
  class="center-links" style="height: 145px; top: 200px; max-width: 209px !important; margin-left: -4px !important">
  <div id="{{ $sideLinksID . 'text' }}" class="soon-available-text-position p-3">
    <div class="zahnrad mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor"
        class="bi bi-gear-fill" viewBox="0 0 16 16">
        <path
          d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
      </svg></div>
    <div class="unselectable">Diese Funktionen sind bald verfügbar!</div>
  </div>
</div>
<div class="inactive-activity-tab p-2 w-100">
  <div class="d-flex justify-content-between">
    <div>Likes</div>
    <div>-</div>
  </div>
</div>
<div class="inactive-activity-tab p-2 w-100">
  <div class="d-flex justify-content-between">
    <div>Kommentare</div>
    <div>-</div>
  </div>
</div>

