


<div id="sticky1_side_bar_profile_tabs" class="row sticky-top" style="z-index: 19">
  <div class="d-block d-md-none bg-white _shadowDown">
    <div class="row pm0">
      <div class="col-4 linebetween_profile unselectable pointer-on-hover pm0"
        onclick="loadUserInfo('{{ $user->username }}');">
        <div class="profile_button_second px-2 py-1  mt-1" id="user_profile_tab_info1">Information
        </div>
        <div id="user_profile_tab_info1_indicator" class="user_profile_tab_indicator" style="margin-top: 2px"></div>
      </div>
      <div class="col-4 linebetween_profile unselectable pointer-on-hover pm0"
        onclick="loadUserActivity('{{ $user->username }}');">
        <div class="profile_button_second px-2 py-1  mt-1" id="user_profile_tab_activity1">Aktivität
        </div>
        <div id="user_profile_tab_activity1_indicator" class="user_profile_tab_indicator" style="margin-top: 2px"></div>
      </div>
      <div class="col-4 unselectable pointer-on-hover pm0" onclick="loadUserConnections('{{ $user->username }}')">
        <div class="profile_button_second px-2 py-1 mt-1" id="user_profile_tab_connections1">Verbindungen
        </div>
        <div id="user_profile_tab_connections1_indicator" class="user_profile_tab_indicator" style="margin-top: 2px">
        </div>
      </div>
    </div>
  </div>
</div>


<!-- TABS -->
<style>
  .user_profile_tab_indicator {
    height: 3px;
    width: 100%;
    background-color: #FF9721;
    width: 0px;
    opacity: 0;
  }

</style>
<div id="sticky1_side_bar_profile_tabs1" class="row sticky-top" style="z-index: 19">

  <div class="shadow-md d-none d-md-block _no-br-topgrey br_bottom_menu bg-white" style="margin-top: -40px">

    <div style="height: 60px; z-index: 0;" class="">
      <div class="_no-br-topgrey h-100" style="background-color: #EDEDED"></div>
    </div>


    <div class="d-flex justifiy-content-start">
      <div>
        <div id="user_profile_tab_info"
          class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2"
          onclick="loadUserInfo('{{ $user->username }}')">
          Information
        </div>
        <div id="user_profile_tab_info_indicator" class="user_profile_tab_indicator"
          style="border-bottom-left-radius: 3px;"></div>
      </div>
      <div>
        <div id="user_profile_tab_activity"
          class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2"
          onclick="loadUserActivity('{{ $user->username }}');">
          Aktivität
        </div>
        <div id="user_profile_tab_activity_indicator" class="user_profile_tab_indicator"></div>
      </div>
      <div>
        <div id="user_profile_tab_connections"
          class="unselectable pointer-on-hover br_bottom_left profile_button_second px-4 pt-3 pb-2"
          onclick="loadUserConnections('{{ $user->username }}')">
          Verbindungen
        </div>
        <div id="user_profile_tab_connections_indicator" class="user_profile_tab_indicator"></div>
      </div>
    
    </div>
  </div>
</div>
