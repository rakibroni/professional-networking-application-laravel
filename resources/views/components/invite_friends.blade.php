<?php
$mainId = 'ute';
$letterId = 'letter1';
$userDivId = 'user';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>







<div class="cura-col-3 ps-2 d-none d-lg-block" style="widht: 290px !important">

  <div class="sticky-top" id="sticky_side_bar_right{{ $sideBarId }}" style="z-index: 1; width: 290px">
    <div class="ProfileBoxRight py-2 mb-2">
      <div class="NavBarRight justify-content-center py-1">
        <div class="d-inline-block">
          <img style="width: 40px" id="iconAdd" class="me-2 mt-2 mb-2" src="/images/InviteFriendsIcon1.svg" alt="">
        </div>
        <div class="d-inline-block" onclick="openReferalModal()">
          <div class=" InviteFriendsButtonRight1 mt-1 mb-1">Damit die Community wächst</div>
          <div class="InviteFriendsButtonRight2 mb-2" style="color: #FF9721 !important">Lade deine Kolleg*innen ein!</div>
        </div>


      </div>
    </div>
    <style>
      .cover-box {
        position: absolute;
        z-index: 2000;
        height: 100px;
        width: 100%;
        top: 360px;
        background-color: white;
      }

    </style>
    <div class="cover-box">
      <div class="lineSeperation2 ms-2 mt-1 "></div>
      <div class="col-12 mt-1">
        <div class="NavBarSecondRight2 mb-5" onclick="loadNetworkPage('suggestions');" style="cursor: pointer;">
          Mehr anzeigen </div>
      </div>
      <div class="row pt-1">
        <div class="col-12 px-4 ms-2 d-flex justify-content-between">
          <a tabindex="0" target="_blank" href="https://www.curawork.de/aboutus" id="compactfooter-about"
            class="d-inline-block TransparentFooterRight">Über uns</a>
          <a tabindex="0" target="_blank" href="https://www.curawork.de/impressum" id="compactfooter-accessibility"
            class="d-inline-block TransparentFooterRight">Impressum</a>
          <a tabindex="0" target="_blank" href="https://www.curawork.de/datenschutz" id="compactfooter-help"
            class="d-inline-block TransparentFooterRight">Datenschutz</a>
        </div>
        <div class="col-12 text-center pointer-on-hover">
          <a onclick="enableScroll();$('#eula_modal').modal('show');" id="compactfooter-help"
            class="d-inline-block TransparentFooterRight">Endnutzer-Lizenzvertrag</a>
        </div>
        <div class="col-12">
          <div class="TransparentFooterRight text-center mt-2" style="font-size: 12px">Curawork ©️ 2021</div>
        </div>
      </div>
    </div>
    <div class="position-relative ms-2 ProfileBoxSecondRight" style="overflow: hidden">

      <div class="row NavBarSecondRight">

        <div class="col-12 mt-4">
          <div class="NavBarSecondRight1 mb-1" style="">More people, more fun!
            <img class="ms-2" style="height: 20px;width: 20px" src="/images/FrogSmiley.svg" alt="">

          </div>
        </div>
        <div class="lineSeperation2 pb-1 mb-1 mt-1"></div>






        <div id="suggestions_{{ $id }}" class="">

        </div>

        <div id="suggestions_{{ $id }}_skeletons">
          <x-suggestion1_skeleton />
          <x-suggestion1_skeleton />
          <x-suggestion1_skeleton />
        </div>

      </div>

    </div>
  </div>



</div>


<script>
  function openReferalModal() {
    storeActivity('/invite_friends');
    $('#referal_modal').modal('show');
    $('#referal_email1_preview').css('width', '100%');
    $('#referal_email1_preview').removeClass('my-3');
    $('#referal_email1_preview').addClass('mb-2');
    $('#referal_email1_preview').css('height', '0px');

  }
</script>
