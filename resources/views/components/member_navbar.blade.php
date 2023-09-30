@auth
  <!-- MEMBER NAVBAR -->
  <?php
  
  $profile_pic = $user->profilePicture()->first();
  $profile_pic_path = $profile_pic->path;
  $bottomNavBarItemWith = 'width: 55px;';
  ?>
  <div>

    <script>
      var toastoption = {
        animation: true,
        delay: 4000,
      }

      function Toasty() {

        var toastHTMLELEMENT = document.getElementById("liveToast");
        var toastElement = new bootstrap.Toast(toastHTMLELEMENT, toastoption);

        toastElement.show();
      }
    </script>
    <div>
      <div class="postion-relative" style="z-index: 10">
        <nav id="navbar" class="no-tran fixed-top navbar navbar-expand-xl navbar-light bg-light trans-navigation bg-trans"
          style="top: 0px; height:65px;padding:2px; background-color: #23180C !important">

          <div class="row w-100" style="max-width: 1128px;">


            <?php
            $timeStamp = time();
            $navbarBrandWidth = 24;
            $navbarBrandHeight = 24;
            $navbarBrandWidth1 = 24;
            $navbarBrandHeight1 = 24;
            $brandWithText = "/images/herz.svg?i=$timeStamp";
            $brandWithoutText = "/images/logow.svg?i=$timeStamp"; // ändern noch
            $navbarBrandPath = $brandWithoutText;
            $space = '0px';
            ?>

            <style>
              .dropdown-toggle::after {
                margin-top: 6px !important;
                border-top: 0.6em solid;
                border-left: 0.4em solid transparent;
                border-right: 0.4em solid transparent;
              }

            </style>
            <div class="d-flex py-1 justify-content-between">

              <div onclick="loadFeedPage();" class="d-xl-block d-none pointer-on-hover mx-1">
                <img src="{{ asset('images/logo_white_beta.svg') }}" alt="" height="34" width="197"
                  style="margin-top: 3px !important">
              </div>
              <div class="ms-2 text-center d-block d-xl-none">

                <div class="nav-mobile-text-sm ">
                  <div class="btn-group">

                    <div class="" style=" transform: scale(1.9,1.9)"
                      onclick="showOffCanvas('open_off_canvas', 'offcanvasExample')">
                      <div class="btn-clear" id="open_off_canvas"
                        style="transform: scale(0.5,0.5); color:white; background-color:transparent; box-shadow: none !important; outline: none !important;"
                        aria-expanded="false">
                        <img class="mt-1" src="{{ asset('images/menu_white_24dp.svg') }}" alt=""
                          style="height: 37px; height: 37px">
                        <br>
                      </div>
                    </div>


                    <div class="offcanvas offcanvas-start SideBarBox" style="z-index:2040" id="offcanvasExample"
                      tabindex="-1" aria-labelledby="offcanvasExample">
                      <div class="offcanvas-header BgHead pt-2 pb-0 px-0">
                        <div class="row">
                          <div class="col-12"><img class="float-end mb-2" src="/images/logo_white_beta.svg"
                              alt="">
                          </div>
                          <div class="offcanvas-title" id="offcanvasExampleLabel">
                            <div class="w-100 BgHead2">
                              <div class="row p-2">
                                <div class="col-2" data-bs-dismiss="offcanvas" aria-label="Close">
                                  <?php
                                  Helper::profilePicture('navbar_profile_pic2', '45px', $user, 'white-border rounded-circle', ''); ?>
                                </div>
                                <div class="col-8 align-self-center ps-3">
                                  <div class="row ps-1"
                                    onclick="loadUserProfileCard('{{ auth()->user()->username }}')"
                                    data-bs-dismiss="offcanvas" aria-label="Close">
                                    <div class="col-12 text-start HeaderNameFont mb-1">
                                      {{ auth()->user()->firstname }}&nbsp;{{ auth()->user()->name . '' }}</div>
                                    <div class="col-12 text-start HeaderFont2">Profil ansehen</div>
                                  </div>
                                </div>
                                <div class="col-2 align-self-center ">
                                  <div class="" data-bs-dismiss="offcanvas" aria-label="Close"><img
                                      src="{{ asset('images/close_black_24dp.svg') }}" style="height:30px;width:30px"
                                      alt="">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bg-white offcanvas-body px-0 pm0">


                        <div class="row ">
                          <div class="col-6 pb-2" style="border-right: 0.5px solid #BCBBBB !important;">
                            <div class="ProfileBoxLeftProfileViews1">{{ auth()->user()->connectionCount() }}</div>
                            <div class="ProfileBoxLeftProfileViews2">
                              @if (auth()->user()->connectionCount() == 1)
                                Verbindung
                              @else
                                Verbindungen
                              @endif
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="ProfileBoxLeftProfileViews1">
                              {{ auth()->user()->postCount(auth()->user()->username) }}</div>
                            <div class="ProfileBoxLeftProfileViews2">
                              @if (auth()->user()->postCount(auth()->user()->username) == 1)
                                Post
                              @else
                                Posts
                              @endif
                            </div>
                          </div>
                        </div>

                        <!-- Invite Friends -->
                        <div class="row pt-2 pb-2 ps-2 py-3 BgBody">
                          <div class="col-2 text-center text-start" style="margin: 10px 0 "><img
                              src="/images/InviteFriendsIcon1.svg" alt="" style="width: 32px; height: 32px;"></div>
                          <div class="col-10 text-start " style="margin: 10px 0 ">
                            <div class="col-12 InviteFriendsFont1">Damit die Community wächst</div>
                            <div class="col-12 InviteFriendsFont2">Lade Deine Kolleg*innen ein!</div>
                          </div>
                        </div>

                        <div class="position-relative">
                          <div class=" center-links" style="top: 55px; height: 240px">
                            <div class="soon-available-text soon-available soon-available-text-position p-3"
                              style="height: 100%">
                              <div class="zahnrad mb-2" style="margin-top: 70px"><svg xmlns="http://www.w3.org/2000/svg"
                                  width="30" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                  <path
                                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg></div>
                              <div class="unselectable h5">Diese Funktionen sind bald verfügbar!</div>
                            </div>
                          </div>
                        </div>
                        <!-- Menu -->
                        <div class="row ps-2">
                          <div class="col-12 mt-1">
                            <div class="row pt-2 pb-3" style="z-index: 2;">
                              <div class="col-2 text-center"><img style="width: 25px"
                                  src="/images/NavBarLeftInfluencerIcon1.svg" alt=""></div>
                              <div class="col-10 ps-1 text-start h-100 align-self-center SidebarMenuFont ">Seiten
                              </div>
                            </div>
                            <div class="row pb-3">
                              <div class="col-2 text-center"><img style="width: 25px"
                                  src="/images/NavBarLeftCompanyIcon1.svg" alt=""></div>
                              <div class="col-10 ps-1 text-start h-100 align-self-center SidebarMenuFont">Unternehmen
                              </div>
                            </div>
                            <div class="row pb-3">
                              <div class="col-2 text-center"><img style="width: 28px"
                                  src="/images/NavBarLeftStudyIcon1.svg" alt=""></div>
                              <div class="col-10 ps-1 text-start h-100 align-self-center SidebarMenuFont">Weiterbilden
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-2 text-center"><img style="width: 25px"
                                  src="/images/NavBarLeftEventIcon1.svg" alt=""></div>
                              <div class="col-10 ps-1 text-start h-100 align-self-center SidebarMenuFont">Events</div>
                            </div>
                          </div>
                        </div>
                        <div class="lineSeperation mt-3 pb-1"></div>
                        <div class="row ps-2">
                          <div class="col-2 text-center"><img style="width: 24px" src="/images/NavBarLeftAddIcon.svg"
                              alt=""></div>
                          <div class="col-10 ps-1 text-start h-100 align-self-center SidebarMenuFont2"
                            onclick="loadNetworkPage('suggestions');" data-bs-dismiss="offcanvas" aria-label="Close">
                            Leute finden</div>
                        </div>
                        <div class="lineSeperation ps-0 mt-2"></div>

                        <div class="row mt-2 ps-3 SidebarMenuFont">

                          @if (auth()->user()->isAdmin())
                            <div class="col-12 mb-2 text-start" onclick="window.location.href='/dashboard'">
                              Dashboard</div>
                            <div class="col-12 mb-2 text-start" onclick="window.location.href='/testFri'">
                              Test</div>
                          @endif
                          <div class="col-12 mb-2 text-start" onclick="window.location.href='/datenschutz'">Datenschutz
                          </div>
                          <div class="col-12 mb-2 text-start" onclick="window.location.href='/aboutus'">Über Uns</div>
                          <div class="col-12 mb-2 text-start" onclick="window.location.href='/impressum'">Impressum</div>
                          <div class="col-12 mb-2 text-start" onclick="enableScroll();$('#eula_modal').modal('show');">
                            Endbenutzer
                            Lizenzvertrag</div>


                          <form action="{{ route('logout') }}" method="post" type="sumbit" class="col-12 text-start">
                            @csrf<button style="margin-left: -5px !important; background: none;border:none"
                              class="SidebarMenuFont">Ausloggen</button>
                          </form>


                        </div>




                        {{-- <div class="mt-5">


                          <button class="btn btn-primary" onclick=" location.reload();" type="submit"
                            style="border-radius:4px">
                            <div class="h7">Reload</div>
                          </button>


                          <button class="btn btn-primary" onclick="window.location.href = '/testpage';" type="submit"
                            style="border-radius:4px">
                            <div class="h7">TestPage</div>
                          </button>
                        </div> --}}
                      </div>
                    </div>






                  </div>

                </div>
              </div>
              <div class="" id=" navbarNav">
                <div class="d-flex">
                  <div class="nav-item d-inline-block">
                    <div class="position-relative ">
                      <?php Helper::searchDropdown('feed-search', 'search-dropdown', 'Suche', 'filterTest()', '', [''], ['feed-search mt-1', 'search-dropdown', ''], ['bg-success', 'bg-warning', ''], ''); ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="d-xl-block d-none " style="width: 329px"></div>
              <div class="ms-5 d-xl-block d-none text-center pointer-on-hover unselectable" onclick="loadFeedPage();">
                <div id="feed" class="d-inline-block">
                  <svg width="23" height="31" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                      <path id="path"
                        d="M20.4333 9.13399C20.4328 9.13351 20.4323 9.13303 20.4319 9.13255L11.8655 0.566528C11.5004 0.201233 11.0149 0 10.4985 0C9.98216 0 9.4967 0.201073 9.13141 0.566368L0.569556 9.12806C0.566672 9.13094 0.563788 9.13399 0.560904 9.13687C-0.188913 9.89101 -0.187631 11.1146 0.564589 11.8668C0.908255 12.2106 1.36215 12.4098 1.84745 12.4306C1.86716 12.4325 1.88702 12.4335 1.90705 12.4335H2.24847V18.7376C2.24847 19.985 3.26345 21 4.51122 21H7.86265C8.20231 21 8.47788 20.7246 8.47788 20.3848V15.4424C8.47788 14.8731 8.94091 14.4101 9.51016 14.4101H11.4869C12.0562 14.4101 12.5192 14.8731 12.5192 15.4424V20.3848C12.5192 20.7246 12.7946 21 13.1344 21H16.4859C17.7336 21 18.7486 19.985 18.7486 18.7376V12.4335H19.0652C19.5814 12.4335 20.0669 12.2324 20.4323 11.8671C21.1854 11.1136 21.1857 9.88797 20.4333 9.13399Z"
                        fill="#FFF" />
                    </g>
                    <defs>
                      <clipPath id="clip0">
                        <rect width="23" height="31" fill="#FFF" />
                      </clipPath>
                    </defs>
                  </svg>
                </div><br>
                <div id="feed_label" class="nav-mobile-text-sm">Mein Feed
                  <div id="feed_label_indicator" class="navbar-bottom-indicator"></div>
                </div>
              </div>

              <div class="d-xl-block d-none text-center pointer-on-hover position-relative unselectable"
                onclick="loadNetworkPage('suggestions');">

                <div id="network_notifictions_indicator" class="network-indicator-position">

                </div>
                <div id="network">
                  <svg width="29" height="31" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8.79784 0C5.87909 0 3.50455 2.34703 3.50455 5.2319C3.50455 8.11676 5.87909 10.4638 8.79784 10.4638C11.7166 10.4638 14.0912 8.11676 14.0912 5.2319C14.0912 2.34703 11.7166 0 8.79784 0Z"
                      fill="#FFF" />
                    <path
                      d="M20.8323 0.747711C20.8204 0.747711 20.8083 0.747764 20.7963 0.747817C19.5714 0.757268 18.4273 1.2394 17.5747 2.1055C16.7371 2.9563 16.2817 4.0787 16.2921 5.26589C16.3027 6.45308 16.7779 7.5683 17.6304 8.40616C18.4897 9.25051 19.6279 9.71421 20.8392 9.71421C20.8514 9.71421 20.8635 9.71416 20.8758 9.71411C22.1007 9.70466 23.2448 9.22247 24.0974 8.35642C24.935 7.50563 25.3904 6.38322 25.38 5.19598C25.3582 2.73574 23.3216 0.747711 20.8323 0.747711Z"
                      fill="#FFF" />
                    <path
                      d="M21.0556 10.5717H20.6161C18.5691 10.5717 16.7011 11.2972 15.2907 12.4863C15.6436 12.7387 15.9795 13.0138 16.2978 13.3105C17.2369 14.186 17.9743 15.2061 18.4898 16.3424C18.9542 17.3657 19.2193 18.4439 19.281 19.5543H29V17.9771C29 13.894 25.4362 10.5717 21.0556 10.5717Z"
                      fill="#FFF" />
                    <path
                      d="M17.5784 19.5543C17.4181 17.1471 16.1092 15.0297 14.1556 13.6727C12.7345 12.6853 10.9719 12.1008 9.0625 12.1008H8.53348C3.82041 12.1009 0 15.6623 0 20.0559V21H17.5954V20.0559C17.5954 19.8875 17.5897 19.7201 17.5784 19.5543Z"
                      fill="#FFF" />
                  </svg>
                  <br>
                </div>
                <div id="network_label" class="nav-mobile-text-sm">Mein Netzwerk
                  <div id="network_label_indicator" class="navbar-bottom-indicator"></div>
                </div>
              </div>

              <div class=" text-center pointer-on-hover unselectable me-3 me-xl-0">
                <div id="messages" class="position-relative" onclick="chatSoonAvailable('chat-soon-available1')">
                  <div id="chat-soon-available1" class="d-none">
                    <div class="d-none d-xl-block">
                      <div class="chat-soon-available-box shadow-md " style="top: 166%">

                        <div class="mt-2">Bald Verfügbar!</div>
                        <div class="chat-soon-available-rotate " style="top: -10%"></div>
                      </div>

                    </div>
                    <div class="d-xl-none d-block">
                      <div class="chat-soon-available-box shadow-md " style="top: 166%; left: -20px">

                        <div class="mt-2">Bald Verfügbar!</div>
                        <div class="chat-soon-available-rotate " style="top: -10%; left: 75px"></div>
                      </div>

                    </div>
                  </div>
                  <div class="d-xl-block d-none">
                    <svg width="26" height="31" viewBox="0 0 26 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M13.5859 12.868C13.2438 13.1546 12.7515 13.1546 12.4094 12.868L0 2.40848V18.7808C0 19.3055 0.415735 19.7308 0.928589 19.7308H25.0714C25.5843 19.7308 26 19.3055 26 18.7808V2.54909L13.5859 12.868Z"
                        fill="#FFF" />
                      <path
                        d="M25.071 0.730774H0.928177L12.9996 10.9034L25.2075 0.759274C25.1628 0.745915 25.1172 0.736396 25.071 0.730774Z"
                        fill="#FFF" />
                    </svg> <br>
                  </div>
                  <div class="d-xl-none mt-1">
                    <img src="{{ asset('images/messages2.svg') }}" style=" width: 30px" alt="">
                  </div>


                  <div class="nav-mobile-text-sm d-xl-block d-none">Nachrichten</div>
                </div>
              </div>

              <style>
                .notifications-indicator {
                  height: 19px;
                  width: 19px;
                  background-color: #0068DE;
                  border-radius: 50%;
                  font-size: 13px;
                  color: white;
                }

              </style>
              <div onclick="loadNotificationsPage(), markNotificationsAsSeen()"
                class="d-xl-block d-none text-center pointer-on-hover position-relative unselectable">
                <div id="notifications">
                  <div id="notifictions_indicator" class=" network-indicator-position" style="left: 50px">
                    5
                  </div>
                  <svg width="19" height="31" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M18.9326 19.2316L17.3014 16.5126C16.5481 15.2576 16.15 13.8202 16.15 12.3571V9.97539C16.15 6.96852 14.1435 4.42529 11.3998 3.60539V1.90009C11.3998 0.852183 10.5476 0 9.49968 0C8.45178 0 7.59959 0.852183 7.59959 1.90009V3.60539C4.85591 4.42529 2.84944 6.96852 2.84944 9.97539V12.3571C2.84944 13.8202 2.45136 15.2566 1.69893 16.5117L0.0677271 19.2307C-0.0206263 19.378 -0.0225412 19.5604 0.062027 19.7095C0.146595 19.8586 0.303351 19.9508 0.474358 19.9508H18.525C18.6961 19.9508 18.8537 19.8587 18.9383 19.7105C19.0229 19.5622 19.02 19.3779 18.9326 19.2316Z"
                      fill="#FFF" />
                    <path
                      d="M6.04565 20.7273C6.70029 22.1511 8.08618 23.1447 9.70069 23.1447C11.3152 23.1447 12.7011 22.1511 13.3558 20.7273H6.04565Z"
                      fill="#FFF" />
                  </svg>
                  <br>
                </div>

                <div id="notifications_label" class="nav-mobile-text-sm" onclick="markNotificationsAsSeen()">Mitteilungen
                  <div id="notifications_label_indicator" class="navbar-bottom-indicator"></div>
                </div>
              </div>


              <div class="text-center d-xl-block d-none">

                <div class="nav-mobile-text-sm ">
                  <div class="btn-group">
                    <button type="button" class="dropdown-toggle btn-clear"
                      style="color:white; background-color:transparent; box-shadow: none !important; outline: none !important"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <?php Helper::profilePicture('navbar_profile_pic', '24px', $user, 'white-border', 'margin-top: 3px'); ?>
                      <br>
                      <div style="" class="nav-mobile-text-sm  d-inline-block">Mein Profil</div>
                    </button>


                    <ul class="dropdown-menu dropdown-menu-end shadow-md p-2" style="width: auto">
                      <div class="d-flex mb-2">
                        <div class="d-inline-block">
                          <?php Helper::profilePicture('navbar_dropdown_profile_pic', '48px', $user, '', ''); ?>
                        </div>
                        <div class="align-top d-inline-block ms-3">
                          <div class="h7">
                            {{ auth()->user()->firstname }}
                          </div>
                          <div class="h7">
                            {{ auth()->user()->name . '' }}
                          </div>
                          <!--<div class="h7 text-secondary invisible" style="font-size: 10px; line-height: 12px; margin-top: 0px">
                                                                                                                                          <div>
                                                                                                                                          .
                                                                                                                                          </div>
                                                                                                                                        </div>-->
                        </div>
                      </div>

                      <button onclick="loadUserProfileCard('{{ auth()->user()->username }}')"
                        class="btn-warning bg-cura btn btn-sm w-100 h7">Profil ansehen</button>
                      <hr style="margin: 0" class="my-2">
                      <li class="mb-2">
                        <button class="dropdown-item" type="submit" style="border-radius:4px">
                          <div class="h7">Einstellungen</div>
                        </button>








                        <form action="{{ route('logout') }}" method="post" class=""
                          style=" height: 20px">
                          @csrf
                          <button class="dropdown-item" style="border-radius:4px" type="submit">
                            <div class="h7">Ausloggen</div>
                          </button>
                        </form>





                      </li>

                    </ul>
                  </div>

                </div>
              </div>


              <!--<div class="text-center d-xl-block d-none">
                                                                                                                                                                  <img src="{{ asset('images/notifications.svg') }}" alt="" width=<?php echo $navbarBrandWidth1; ?> height=<?php echo $navbarBrandHeight1; ?> class="d-inline-block align-top"><br>
                                                                                                                                                                  <div class="nav-mobile-text-sm mt-1">Job-Angebote</div>
                                                                                                                                                                </div>-->
            </div>

          </div>

        </nav>

      </div>

    </div>
    <!-- NAVBAR END -->
    <style>
      .paddingIos {
        padding-bottom: calc(.5rem + env(safe-area-inset-bottom))
      }

    </style>

    <!-- BOTTOM NAV BAR -->
    <div style="background-color: #23180C !important" class="paddingIos  fixed-bottom d-xl-none bg-white shadow-lg"
      style="height: 52px">
      <div class="d-flex  mx-1 p-2">
        <div class="nav-item text-center pointer-on-hover unselectable " onclick="loadFeedPage();"
          style="{{ $bottomNavBarItemWith }}">
          <div id="feed1">
            <svg width="21" height="24" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0)">
                <path id="path"
                  d="M20.4333 9.13399C20.4328 9.13351 20.4323 9.13303 20.4319 9.13255L11.8655 0.566528C11.5004 0.201233 11.0149 0 10.4985 0C9.98216 0 9.4967 0.201073 9.13141 0.566368L0.569556 9.12806C0.566672 9.13094 0.563788 9.13399 0.560904 9.13687C-0.188913 9.89101 -0.187631 11.1146 0.564589 11.8668C0.908255 12.2106 1.36215 12.4098 1.84745 12.4306C1.86716 12.4325 1.88702 12.4335 1.90705 12.4335H2.24847V18.7376C2.24847 19.985 3.26345 21 4.51122 21H7.86265C8.20231 21 8.47788 20.7246 8.47788 20.3848V15.4424C8.47788 14.8731 8.94091 14.4101 9.51016 14.4101H11.4869C12.0562 14.4101 12.5192 14.8731 12.5192 15.4424V20.3848C12.5192 20.7246 12.7946 21 13.1344 21H16.4859C17.7336 21 18.7486 19.985 18.7486 18.7376V12.4335H19.0652C19.5814 12.4335 20.0669 12.2324 20.4323 11.8671C21.1854 11.1136 21.1857 9.88797 20.4333 9.13399Z"
                  fill="#FFF" />
              </g>
              <defs>
                <clipPath id="clip0">
                  <rect width="21" height="21" fill="white" />
                </clipPath>
              </defs>
            </svg><br>

            <div class="nav-mobile-text-sm mt-1" style="color: #FFF; font-size: 10px">Home</div>
          </div>
        </div>

        <div class="nav-item text-center pointer-on-hover position-relative unselectable "
          onclick="loadNetworkPage('suggestions');" style="{{ $bottomNavBarItemWith }}">
          <div class="d-flex justify-content-center">
            <div id="network1" class="position-relative" style="width: 50px">
              <div id="network_notifictions_indicator1" class="network-indicator-position" style="left: 50px">

              </div>
              <svg width="26" height="24" viewBox="0 0 29 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.79784 0C5.87909 0 3.50455 2.34703 3.50455 5.2319C3.50455 8.11676 5.87909 10.4638 8.79784 10.4638C11.7166 10.4638 14.0912 8.11676 14.0912 5.2319C14.0912 2.34703 11.7166 0 8.79784 0Z"
                  fill="#FFF" />
                <path
                  d="M20.8323 0.747711C20.8204 0.747711 20.8083 0.747764 20.7963 0.747817C19.5714 0.757268 18.4273 1.2394 17.5747 2.1055C16.7371 2.9563 16.2817 4.0787 16.2921 5.26589C16.3027 6.45308 16.7779 7.5683 17.6304 8.40616C18.4897 9.25051 19.6279 9.71421 20.8392 9.71421C20.8514 9.71421 20.8635 9.71416 20.8758 9.71411C22.1007 9.70466 23.2448 9.22247 24.0974 8.35642C24.935 7.50563 25.3904 6.38322 25.38 5.19598C25.3582 2.73574 23.3216 0.747711 20.8323 0.747711Z"
                  fill="#FFF" />
                <path
                  d="M21.0556 10.5717H20.6161C18.5691 10.5717 16.7011 11.2972 15.2907 12.4863C15.6436 12.7387 15.9795 13.0138 16.2978 13.3105C17.2369 14.186 17.9743 15.2061 18.4898 16.3424C18.9542 17.3657 19.2193 18.4439 19.281 19.5543H29V17.9771C29 13.894 25.4362 10.5717 21.0556 10.5717Z"
                  fill="#FFF" />
                <path
                  d="M17.5784 19.5543C17.4181 17.1471 16.1092 15.0297 14.1556 13.6727C12.7345 12.6853 10.9719 12.1008 9.0625 12.1008H8.53348C3.82041 12.1009 0 15.6623 0 20.0559V21H17.5954V20.0559C17.5954 19.8875 17.5897 19.7201 17.5784 19.5543Z"
                  fill="#FFF" />
              </svg>
              <br>
              <div class="nav-mobile-text-sm mt-1" style="color: #FFF; font-size: 10px">Netzwerk</div>
            </div>

          </div>
        </div>

        <style>
          .add-post-btn {
            transform: rotate(0deg);
            width: 50px;
            width: 50px;


          }

          .add-post-btn-container {
            position: absolute;
            top: 30% !important;
            left: 50%;
            transform: translate(-50%, -50%);
            padding-top: 10px;

          }

          @keyframes colorChange {
            0% {
              fill: #ff0000
            }

            50% {
              fill: #000
            }

            100% {
              fill: #ff0000
            }
          }

          .box {
            width: 200px;
            height: 200px;
            animation: colorChange 3s infinite;
          }

          .post-question-container {
            top: -50px;
            left: 50%;
            position: absolute;
            transform: translate(-50%, -50%);
            background-color: transparent;
            width: 200px;
            height: 100px;
            opacity: 0;
          }

          .post-mobile-btn-text {
            transform: rotate(-11deg);
            font-size: 14px;
            font-weight: bold;
            padding-left: 12px;
            color: white;
          }

          .question-mobile-btn-text {
            transform: rotate(11deg);
            font-size: 14px;
            font-weight: bold;
            padding-right: 12px;
            color: white;
          }

        </style>
        <div id="add-btn" class="nav-item text-center pointer-on-hover position-relative unselectable "
          onclick="openPostChoice()//loadFeedPage('openModal'); changeBtnColor('makepost'); "
          style="{{ $bottomNavBarItemWith }}; ">
          <div>
            <div id="makepost" class="position-relative">
              <div class="position-relative d-flex justify-content-center" style="widht: 70px">
                <div class="add-post-btn-container" id="add-post-btn-container">
                  <div id="add-post-btn" class="add-post-btn">

                    <svg width="45" height="45" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_4184:10)" filter="url(#filter0_d_4184:10)">
                        <rect x="33.4263" y="12.2131" width="32" height="31" transform="rotate(45 33.4263 12.2131)"
                          fill="#23180C" />
                        <path
                          d="M33.4263 3.42651C16.8836 3.42651 3.42627 16.8839 3.42627 33.4265C3.42627 49.9692 16.8836 63.4265 33.4263 63.4265C49.9689 63.4265 63.4263 49.9692 63.4263 33.4265C63.4263 16.8839 49.9689 3.42651 33.4263 3.42651ZM46.5513 35.9264H35.9261V46.5515C35.9261 47.9317 34.8064 49.0514 33.4263 49.0514C32.0461 49.0514 30.9264 47.9317 30.9264 46.5515V35.9264H20.3013C18.9211 35.9264 17.8014 34.8067 17.8014 33.4265C17.8014 32.0464 18.9211 30.9267 20.3013 30.9267H30.9264V20.3015C30.9264 18.9214 32.0461 17.8017 33.4263 17.8017C34.8064 17.8017 35.9261 18.9214 35.9261 20.3015V30.9267H46.5513C47.9314 30.9267 49.0511 32.0464 49.0511 33.4265C49.0511 34.8067 47.9314 35.9264 46.5513 35.9264Z"
                          fill="#FFF" />
                      </g>
                      <defs>
                        <filter id="filter0_d_4184:10" x="0.42627" y="0.426514" width="66" height="66"
                          filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                          <feFlood flood-opacity="0" result="BackgroundImageFix" />
                          <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                            result="hardAlpha" />
                          <feMorphology radius="1" operator="dilate" in="SourceAlpha"
                            result="effect1_dropShadow_4184:10" />
                          <feOffset />
                          <feGaussianBlur stdDeviation="1" />
                          <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" />
                          <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4184:10" />
                          <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4184:10" result="shape" />
                        </filter>
                        <clipPath id="clip0_4184:10">
                          <rect width="60" height="60" fill="#FFF" transform="translate(3.42627 3.42651)" />
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                  <div class="post-question-container" id="post-question-container">
                    <div class="d-flex justify-content-center w-100">
                      <div  onclick="loadFeedPage('openModal');">
                        <img src="{{ asset('images/mobilepost.svg') }}" alt="">
                        <div class="post-mobile-btn-text">Posten</div>

                      </div>
                      <div class="mx-2">

                      </div>
                      <div onclick="$('#frage_modal').modal('show')" ><img  src="{{ asset('images/questionmobile.svg') }}" alt="">
                        <div class="question-mobile-btn-text">Fragen</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="nav-mobile-text-sm mt-1 position-relative" style="color:#FFF; font-size: 11px !important">
                Posten/Fragen
              </div>
            </div>
          </div>
        </div>

        <script>

        </script>








        <div class="nav-item  text-center pointer-on-hover unselectable position-relative"
          style="{{ $bottomNavBarItemWith }}" onclick="@if (!auth()->user()->isExpert()) chatSoonAvailable('chat-soon-available') @else loadQuestionsForExpert()   @endif">
          <div class="position-relative">
            <div class="chat-soon-available-box shadow-md d-none" id="chat-soon-available">
              <div class="mt-2">Bald Verfügbar!</div>
              <div class="chat-soon-available-rotate "></div>
            </div>
            <span class="position-relative">
              <img style="height: 24px" src="{{ asset('images/questionsForum.svg') }}" alt="">


              @if (auth()->user()->isExpert())

                <div id="unanswered_questions_count_indicator"
                  class="position-abslute network-indicator-position network-tab-indicator"
                  style="padding: 4px; font-size: 10px; left: 30px">
                  <span id="unanswered_questions_count">
                    {{ auth()->user()->unansweredQuestionsMatchingExpertise()->count() }}
                  </span>
                </div>

                <script>
                  if ($('#unanswered_questions_count').html().trim() == "0") {

                    $('#unanswered_questions_count_indicator').addClass('d-none');
                  }

                  function getUnansweredQuestionsMatchingExpertiseCount() {
                    ajaxSetup();
                    var functionsOnSuccess = [
                      [updateUnansweredQuestionsMatchingExpertiseCount, ['response']]
                    ];
                    ajax('/get_unaswered_questions_matching_expertise', 'GET', functionsOnSuccess);
                  }

                  function updateUnansweredQuestionsMatchingExpertiseCount(response) {
           
                    if (response.length > 0) {
                      $('#unanswered_questions_count').html(response.length);
                      $('#unanswered_questions_count_indicator').removeClass('d-none');
                    } else {
                      $('#unanswered_questions_count').html(response.length);
                      $('#unanswered_questions_count_indicator').addClass('d-none');
                    }
                  }


                  setInterval(() => {
                    getUnansweredQuestionsMatchingExpertiseCount();
                  }, 20000);
                </script>
              @endif
            </span>

            <br>

            <div class="nav-mobile-text-sm mt-1" style="font-size: 10px !important">Fragenportal</div>

          </div>
        </div>
        <style>
          .nav-item {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            font-size: 1.1rem;
            font-weight: 400;
            font-weight: normal;
          }

        </style>







        <div onclick="loadNotificationsPage(); markNotificationsAsSeen()"
          class="nav-item text-center pointer-on-hover position-relative unselectable "
          style="{{ $bottomNavBarItemWith }}">
          <div id="notifications1">
            <div class="d-flex justify-content-center">
              <div id="notifications1" class="position-relative" style="width: 70px">
                <div id="notifictions_indicator1" class="network-indicator-position" style="left: 50px">
                  5
                </div>
                <svg width="17" height="24" viewBox="0 0 19 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M18.9326 19.2316L17.3014 16.5126C16.5481 15.2576 16.15 13.8202 16.15 12.3571V9.97539C16.15 6.96852 14.1435 4.42529 11.3998 3.60539V1.90009C11.3998 0.852183 10.5476 0 9.49968 0C8.45178 0 7.59959 0.852183 7.59959 1.90009V3.60539C4.85591 4.42529 2.84944 6.96852 2.84944 9.97539V12.3571C2.84944 13.8202 2.45136 15.2566 1.69893 16.5117L0.0677271 19.2307C-0.0206263 19.378 -0.0225412 19.5604 0.062027 19.7095C0.146595 19.8586 0.303351 19.9508 0.474358 19.9508H18.525C18.6961 19.9508 18.8537 19.8587 18.9383 19.7105C19.0229 19.5622 19.02 19.3779 18.9326 19.2316Z"
                    fill="#FFF" />
                  <path
                    d="M6.04565 20.7273C6.70029 22.1511 8.08618 23.1447 9.70069 23.1447C11.3152 23.1447 12.7011 22.1511 13.3558 20.7273H6.04565Z"
                    fill="#FFF" />
                </svg>
                <br>
              </div>

            </div>

            <div class="nav-mobile-text-sm  mt-1" style="color:#FFF; font-size: 10px">Mitteilungen</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MEMBER NAVBAR END -->
@endauth

<div id="posting-actions" aria-hidden="true">
  <div class="new-post">
    <a type="button">
      <svg width="25px" height="25px" fill="none" viewBox="0 0 30 29" xmlns="http://www.w3.org/2000/svg">
        <rect width="100%" height="100%" fill="none" />
        <mask fill="white">
          <path
            d="m24.001 2.0601c-0.7345-0.60004-1.7986-0.47688-2.3766 0.27508l-0.6485 0.84353 2.66 2.1729 0.6484-0.84353c0.5781-0.75196 0.4512-1.848-0.2833-2.448z" />
        </mask>
        <g>
          <rect transform="rotate(-.018439 15 14.5)" x="4.9517" y="4.107" width="20.097" height="20.786" rx="2.75"
            stroke="#23180C" stroke-width="2.5" />
          <rect transform="rotate(-.30674 23.582 7.3049)" x="18.749" y="1.8681" width="9.6653" height="10.873"
            fill="#FFC583" />
          <path transform="rotate(13.823 26.47 4.7352)"
            d="m27.659 3.2796c-0.7345-0.60004-1.7986-0.47688-2.3766 0.27508l-0.6485 0.84353 2.66 2.1729 0.6484-0.84353c0.5781-0.75196 0.4512-1.848-0.2833-2.448z"
            fill="#23180C" />
          <path transform="rotate(28.883 -17.542 -8.6725)"
            d="m-18.78-9.6262-1.8283 2.3785-2.3234-1.8979 1.8284-2.3785 2.3233 1.8979zm2.66 2.1729 2.3233 1.8979-1.8283 2.3785-2.3234-1.8979 1.8284-2.3785zm0.3118-1.1185-0.6485 0.84353-4.6466-3.7959 0.6484-0.84354 4.6467 3.7959zm-1.1434-3.4329 2.6599 2.1729-3.6567 4.7569-2.6599-2.1729 3.6567-4.7569zm-1.4917 2.6535 0.6484-0.84354 4.6466 3.7959-0.6484 0.84353-4.6466-3.7959zm0.6484-0.84354c-0.4317 0.56163-0.337 1.3802 0.2116 1.8284l3.6567-4.7569c2.0177 1.6482 2.3662 4.6589 0.7783 6.7244l-4.6466-3.7959zm-2.66-2.1729c1.5879-2.0656 4.5107-2.4038 6.5283-0.75561l-3.6567 4.7569c0.5486 0.44816 1.3433 0.35618 1.7751-0.20545l-4.6467-3.7959z"
            fill="#23180C" mask="url(#a)" />
          <rect transform="rotate(13.084 19.139 10.817) matrix(.60945 -.79282 .77444 .63264 11.024 17.746)" x="2.6809"
            y="1.3591" width="15.649" height="1.705" stroke="#23180C" stroke-width="1.705" />
          <path transform="rotate(15.962 11.42 17.269)" d="m9.3389 19.65 1.4642-4.7608 2.6972 2.2033-4.1614 2.5575z"
            fill="#23180C" />
        </g>
      </svg>
      <span class="font-weight-700 font-size-12 text-dark">Posten</span>


    </a>
  </div>
  <div class="new-quest">
    <a type="button">
      <svg width="13" height="23" viewBox="0 0 13 23" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M4.33203 15.7305C4.33203 14.4316 4.49316 13.3965 4.81543 12.625C5.1377 11.8535 5.77246 11.0088 6.71973 10.0908C7.67676 9.16309 8.28223 8.50391 8.53613 8.11328C8.92676 7.51758 9.12207 6.87305 9.12207 6.17969C9.12207 5.26172 8.89258 4.56348 8.43359 4.08496C7.98438 3.59668 7.32031 3.35254 6.44141 3.35254C5.60156 3.35254 4.92285 3.5918 4.40527 4.07031C3.89746 4.53906 3.64355 5.17871 3.64355 5.98926H0.0839844C0.103516 4.26074 0.689453 2.89355 1.8418 1.8877C3.00391 0.881836 4.53711 0.378906 6.44141 0.378906C8.4043 0.378906 9.93262 0.876953 11.0264 1.87305C12.1299 2.86914 12.6816 4.26074 12.6816 6.04785C12.6816 7.63965 11.9395 9.20703 10.4551 10.75L8.65332 12.5225C8.00879 13.2549 7.67676 14.3242 7.65723 15.7305H4.33203ZM4.08301 20.2861C4.08301 19.71 4.26367 19.2461 4.625 18.8945C4.98633 18.5332 5.47461 18.3525 6.08984 18.3525C6.71484 18.3525 7.20801 18.5381 7.56934 18.9092C7.93066 19.2705 8.11133 19.7295 8.11133 20.2861C8.11133 20.8232 7.93555 21.2725 7.58398 21.6338C7.23242 21.9951 6.73438 22.1758 6.08984 22.1758C5.44531 22.1758 4.94727 21.9951 4.5957 21.6338C4.25391 21.2725 4.08301 20.8232 4.08301 20.2861Z"
          fill="#23180C" />
      </svg>
      <span class="font-weight-700 font-size-12 text-dark">Fragen</span>


    </a>
  </div>
</div>
<div id="overlayin" class="d-none"></div>
<script>

</script>
