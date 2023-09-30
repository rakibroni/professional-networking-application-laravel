<div class="row me-xl-2 mb-2 border rounded2 justify-content-center bg-white">

  <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important"
     onclick="loadInvitesPage('invited');">
    <div class="col align-self-center">
      <a class="d-flex justify-content-between position-relative">
        <div class="vertical-tab-indicator" id="invited_skeleton_indicator">.</div>
        <div class="">Eingeladene Talente</div>
        <div class="skeleton d-none" id="invited_counter_skeleton">...</div>
        <div class="d-none" id="invited_counter">...</div>
      </a>
    </div>
  </div>
  <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important" id="requests"
  onclick="loadInvitesPage('accepted');">
    <div class="col-12 align-self-center">
      <a class="d-flex justify-content-between position-relative">
        <div class="vertical-tab-indicator" id="accepted_skeleton_indicator">.</div>
        <div class="">Angenommene Einladungen</div>
        <div id="accepted_counter_skeleton" class="skeleton d-none">...</div>
        <div id="accepted_counter" class="d-none">...</div>
      </a>
    </div>
  </div>
  <div class="row py-2 px-2 pointer-on-hover unselectable" style="height: 47px !important" id="connections"
  onclick="loadInvitesPage('rejected');">
    <div class="col align-self-center">
      <a class="d-flex justify-content-between position-relative">
        <div class="vertical-tab-indicator" id="rejected_skeleton_indicator">.</div>
        <div class="">Abgelehnte Einladungen</div>
        <div class="d-none" id="rejected_counter">...</div>
        <div class="skeleton d-none" id="rejected_counter_skeleton">...</div>
      </a>
    </div>
  </div>

</div>
