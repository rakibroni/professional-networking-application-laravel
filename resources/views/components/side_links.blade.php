
<?php

if (!isset($sideLinksID)) {
    $sideLinksID = 'test';
}
?>
<div class="ProfileBoxSecondLeft pt-2">
  <div class="ProfileBoxSecondLeftInner">

    <div class="row">



      <div class="position-relative">
        <div onmouseleave="removeAvailableMsg(this.id)" onmouseover="showNotAvailableMsg(this.id)"
          id="{{ $sideLinksID }}" class="center-links">
          <div id="{{ $sideLinksID . "text" }}"class="soon-available-text-position p-3">
            <div class="zahnrad mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="30" fill="currentColor" class="bi bi-gear-fill"
                viewBox="0 0 16 16">
                <path
                  d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
              </svg></div>
            <div class="unselectable">Diese Funktionen sind bald verfügbar!</div>
          </div>
        </div>
        <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3"
            src="/images/NavBarLeftInfluencerIcon.svg" alt="">
          Seiten</div>

        <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3 "
            src="/images/NavBarLeftCompanyIcon.svg" alt="">
          Unternehmen</div>

        <div class="NavBarLeft mt-2" style="padding-left: 22px !important;"><img style="width: 26px; " class="me-3"
            src="/images/NavBarLeftStudyIcon.svg" alt="">
          Weiterbilden</div>

        <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3" src="/images/NavBarLeftEventIcon.svg"
            alt="">
          Events</div>
      </div>
      <div class="lineSeperation mt-3"></div>



      @if (auth()->user()->isExpert())
      <div id="" class="NavBarLeft2 mt-2 ps-4" style="color: #988f86" onclick="loadQuestionsForExpert()" alt="" >
        <img class="me-2 " src="/images/expert.svg" alt=""> Fragen für mich ({{ auth()->user()->questionsMatchingExpertise()->count() }})
      </div>


      @else
      <div id="leute{{ $sideLinksID }}" class="NavBarLeft2 mt-2 ps-4 unselectable " onclick="loadNetworkPage('suggestions')" alt="" >
        <img class="me-3 " src="/images/NavBarLeftAddIcon.svg" alt=""> Leute finden
      </div>

      @endif
    </div>
  </div>
</div>

<script>

</script>
