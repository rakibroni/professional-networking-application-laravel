<div id="sticky1_side_bar_profile_tabs2" class="row sticky-top" style="z-index: 19">
  <div class="d-block d-md-none bg-white _shadowDown">
    <div class="row pm0">
      <div class="col-4 linebetween_profile unselectable pointer-on-hover pm0">
        <div class=" px-2 py-1">
          <div class="skeleton mt-2 mb-1" style="height: 10px">Information</div>
        </div>
        <div class="user_profile_tab_indicator" style="margin-top: 2px"></div>
      </div>
      <div class="col-4 linebetween_profile unselectable pointer-on-hover pm0">
        <div class=" px-2 py-1  ">
          <div class="skeleton mt-2 mb-1" style="height: 10px">Information</div>
        </div>
        <div class="user_profile_tab_indicator" style="margin-top: 2px"></div>
      </div>
      <div class="col-4 unselectable pointer-on-hover pm0" onclick="loadUserConnections('{{ $user->username }}')">
        <div class="px-2 py-1  ">
          <div class="skeleton mt-2 mb-1" style="height: 10px">Information</div>
        </div>
        <div class="user_profile_tab_indicator" style="margin-top: 2px"></div>
      </div>
    </div>
  </div>
</div>


<div id="sticky1_side_bar_profile_tabs3" class="row sticky-top" style="z-index: 19">
  <div class="shadow-md d-none d-md-block _no-br-topgrey br_bottom_menu bg-white" style="margin-top: -40px">

    <div style="height: 60px; z-index: 0;" class="">
      <div class="_no-br-topgrey h-100" style="background-color: #EDEDED"></div>
    </div>


    <div class="d-flex justifiy-content-start">
      <div>
        <div class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2">
          <span class="skeleton" style="font-size: 10px">Info</span>
        </div>
        <div class="user_profile_tab_indicator" style="border-bottom-left-radius: 3px;"></div>
      </div>
      <div>
        <div class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2">
          <span class="skeleton" style="font-size: 10px">Aktivität</span>
        </div>
        <div class="user_profile_tab_indicator" style="border-bottom-left-radius: 3px;"></div>
      </div>
      <div>
        <div class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2">
          <span class="skeleton" style="font-size: 10px">Verbindungen</span>
        </div>
        <div class="user_profile_tab_indicator" style="border-bottom-left-radius: 3px;"></div>
      </div>
    </div>

  </div>

</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
