<div class="p-2 position-relative" style="background-color: rgba(80, 80, 80, 0.05)">
  <div class="vertical-tab-indicator" id="invited_skeleton_indicator" style="height: 58px; opacity: 1; left: 0px">.</div>
  <div class="d-flex justify-content-start">
    <div class="">
      <img src="{{ asset($talent->profile_pic) }}" onclick="loadTalentPage('{{ $talent->uuid }}')"
        style="width: 40px; height: 40px; border-radius: 50%;" alt="">
    </div>
    <div class="ms-3 w-100">
      <div class="d-flex justify-content-between w-100">
        <div>{{ $talent->firstname." ".$talent->lastname }}</div>
        <div>...</div>
      </div>
      <div style="font-size: 12px">
        Eingeladen {{ " ".$talent->invitation()->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
      </div>
    </div>
  </div>
</div>