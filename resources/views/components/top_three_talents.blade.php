@php
  if (!isset($showAll)) {
    $showAll = true;
  } 

@endphp

<div style="font-size: 12px" class="mb-2 d-flex justify-content-between">
  <div  class="@if (!$showAll)
  invisible
@endif">
    <span class=" fw-bold" >Top Talente</span><span class="text-secondary"> für Sie</span>
  </div>
  <div class="pointer-on-hover" onclick="loadSavedTalentsPage()">
   <img @if($showAll) src="{{ asset('images/transparent_badge.svg') }}"   @else src="{{ asset('images/jobs_save_badge_blue.svg') }}" @endif    class="me-2 text-secondary" 
    alt=""><span @if (!$showAll)
    style="color: #3685D6 !important; font-weight: 600" @endif>Gespeicherte Talente</span> 
  </div>
  <div class="@if (!$showAll)
    invisible
  @endif">
    <span class="text-secondary">Sortieren nach: </span><span class="fw-bold"> Passende zuerst</span>
  </div>
</div>