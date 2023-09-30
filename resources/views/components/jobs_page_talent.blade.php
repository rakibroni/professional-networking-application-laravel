



<div class="bg-white shadow-md  jobs-br p-4 @if ($talent->isInvited()) no-bottom-br @else mb-2 @endif">
  <div class="d-flex justify-content-between">
    <div>
      <div class="position-relative pointer-on-hover" onclick="loadTalentPage('{{ $talent->uuid }}')">
        <div class="blur-border"></div>
        <img src="{{ asset($talent->profile_pic) }}"
          style="width: 78px; height: 78px; border-radius: 50%; @if(!$talent->hasAcceptedInvite()) filter: blur(4px); @endif" alt="">
      </div>
      <div class="match-text text-center" style="margin-top: 12px">{{ $talent->match_percentage }}% Match</div>
    </div>
    <div style="width: 200px" class="">
      <div class="talent-name HideOverflowText"> @if(!$talent->hasAcceptedInvite())  {{ $talent->shortName() }} @else {{ $talent->firstname." ".$talent->lastname }} @endif </div>
      <div class="talent-item-name mt-4">Ausbildung:</div>
      <div class="talent-item-name mt-2">Berufserfahrung:</div>
      <div class="talent-item-name mt-2">Vertragsart:</div>

    </div>

    <div>
      <div class="talent-name"><span
          class="talent-item-name">{{ $talent->location_city . ', ' . $talent->location_state }}</span></div>
      <div class="talent-item-name mt-4">{{ $talent->position }}</div>
      <div class="talent-item-name mt-2">{{ $talent->years_of_experience }} @if ($talent->years_of_experience == 1) Jahr @else Jahre @endif</div>
      <div class="talent-item-name mt-2">{{ $talent->contract_type }}</div>
    </div>

    <div class="@if ($talent->isInvited()) invisible @endif">
      <div class="talent-item-name mt-2"><span class="text-secondary">Verfügbar ab:</span>
        {{ $talent->startDateFormatted() }}</div>
      <div class="mt-3">
        <button class="btn-primary btn jobs-bg w-100 @if ($talent->isSaved()) disabled @endif"
          id="save_talent_btn_{{ $talent->uuid }}" onclick="saveTalent('{{ $talent->uuid }}')"
          style="color: #3685D6;background-color:transparent !important; font-size: 12px !important">@if (!$talent->isSaved()) Profil speichern @else Gespeichert @endif</button>

      </div>
      <div class="mt-1">
        <button onclick="loadTalentPage('{{ $talent->uuid }}')" class="btn-primary btn jobs-bg w-100 "
          style="font-size: 12px !important">Profil ansehen</button>
      </div>
    </div>
  </div>
</div>
@if ($talent->isInvited())
  <div class="px-4 py-2 mb-2 d-flex justify-content-between bg-white bottom-br shadow-md">



    <div class="d-flex justify-content-ceneter pt-1 w-75">
      @if ($talent->hasAcceptedInvite())

        <div class="me-2">
          <button onclick="loadMessagesPage();" class=" btn-primary btn jobs-bg w-100 "
            style="font-size: 12px !important"><img class="me-1" src="{{ asset('images/jobs-msg.svg') }}"
              alt=""> Schreibe {{ $talent->firstname }} eine Nachricht</button>

        </div>

      @endif
      <div class="me-2">
        <button onclick="loadTalentPage('{{ $talent->uuid }}')" class="disabled btn-primary btn jobs-bg w-100 "
          style="font-size: 12px !important;">Einladung ansehen</button>
      </div>
      <div class="">
        <button class="btn-primary btn jobs-bg w-100 " id="save_talent_btn_{{ $talent->uuid }}"
          onclick="loadTalentPage('{{ $talent->uuid }}')"
          style="color: #3685D6;background-color:transparent !important; font-size: 12px !important;t">Profil
          ansehen</button>
      </div>

    </div>




    <div class="text-secondary">

      <div class="d-flex justify-content-end">
        {{ 'Status: ' }}<span class="ms-1 fw-600">@if ($talent->isInvited() && !$talent->hasAcceptedInvite()) Ausstehend @endif @if ($talent->isInvited() && $talent->hasAcceptedInvite()) <span class="text-success">Match</span> @endif</span>
      </div>
      <div class="d-flex justify-content-end" style="font-size: 12px">
        <span>Gesendet: </span>{{ $talent->invitation()->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
      </div>
    </div>

  </div>
@endif
