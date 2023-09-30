
<div class="modal fade"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Änderungen verwerfen</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>sdal-body">
        Möchtest Du wirklich alle Änderungen verwerfen?
      </div>
      <div class="modal-footer">
        <button onclick="closeDiscardChangesPostPopUp()" type="button" class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Zurück</button>
        <button onclick="discardPost()" type="button" class="btn btn-warning bg-cura">Änderungen
          verwerfen</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/feed.js') }}" defer></script>
<div class="modal fade CustomFullScreenModal" id="post_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" style="z-index: 2000000 !important;">
  <div class="modal-dialog modal-dialog-scrollable modal-down modal-dialog-centered">
    <div class="modal-content _br">
      <style>
        .post_control {
          position: absolute;
          top: calc(100% - 120px);
          left: 10px;

        }
      </style>
      <div class="post_control" style="z-index: 100000000000000">

        <div class="btn float-start post-action-box" id="add_post_img_btn" style="padding-left: 8px !important">
          <form id="upload_post_image_form" method="post" action={{ route('upload_post_img') }}>
            @csrf
            <input type="file" id="upload_post_image" name="upload_post_image" style="position: fixed; top: -100em" onclick="imgId = 'img'" accept="image/png,image/jpg,image/jpeg,/image/heic,/image/heif" />

            <label id="file-btn pointer-on-hover" for="upload_post_image">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7F7F7F" class="bi bi-images pointer-on-hover" viewBox="0 0 16 16">
                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
              </svg>
              <div class="h7 d-inline-block pointer-on-hover ms-1" style="color: #7F7F7F">Bild hinzufügen</div>
            </label>
            <button id="upload_post_image_submit" class="d-none" type="submit">
            </button>
          </form>
        </div>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Beitrag verfassen</h5>
        <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border-color: transparent !important"></button>
      </div>
      <div class="modal-body position-relative px-2 px-sm-3">

        <div class="d-flex justify-content-start">
          <div class="">
            <?php Helper::profilePicture(
              'post_profile_pic',
              '60px',
              auth()->user(),
              '',
              '',
            ); ?>
          </div>
          <style>
            .center-vertical {
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              width: 100%;

            }
          </style>
          <div class="w-100 position-relative">
            <div class="center-vertical">
              <button class="viewerpostbox ms-3 d-inline-block px-2 me-2">
                <div style="font-size:12px;">{{ auth()->user()->firstname . ' ' . auth()->user()->name }}
                  <!--<svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                                                                                      height="14" fill="currentColor" class="ms-1 mb-1 bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                                                                                      <path
                                                                                                                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                                                                                    </svg>-->
                </div>
              </button>
              <button class="viewerpostbox d-inline-block px-2">
                <div style="font-size:12px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-globe me-1 self-align-center" viewBox="0 0 16 16">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                  </svg>Jeder
                  <!--<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                                                                                                                    class="bi bi-care
                                                                                                                                    t-down-fill ms-3 mb-1" viewBox="0 0 16 16">
                                                                                                                                    <path
                                                                                                                                      d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                                                                                  </svg>-->
                </div>
              </button>
            </div>
          </div>

        </div>
        @auth

        <div class="mb-4">

          <div class="form-floating">

            <style>
              .delete_post_img {
                position: absolute;
                top: 10px;
                left: calc(100% - 40px);
                background-color: #f2f2f2;
                border-radius: 50%;
                width: 30px;
                height: 30px;
              }
            </style>
            <form action="{{ route('feed') }}" method="post" id="post_form" class="mt-0">
              @csrf


              <textarea oninput="auto_grow(this, 0)" name="body" id="post_body" type="text" cols="20" placeholder="Was möchtest du mit der Community teilen?" class="curaInput mt-3" style="min-height:100px ;max-height: 200px"></textarea>
              <button id="submit_post" class="d-none" type="submit"></button>
            </form>

            <div class="text-danger h7" id="post_error_messages">
              <div class="invisible">.</div>
            </div>
            <div class="invisible p-2"></div>

            <div class="position-relative d-none" id="post_img_parent">
              <div id="post_img" src="" alt="" style="background-image: none; width:100%; border-radius: 4px">
                <img src="" id="post_img_inner" alt="" style="width:100%; ">
              </div>
              <form id="delete_post_image_form" method="post" action={{ route('delete_post_image') }}>
                @csrf
                <div class="delete_post_img pointer-on-hover" onclick="deletePostImage()">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                  </svg>
                </div>
                <button id="submit_delete_post_image" class="d-none" type="submit">
              </form>

            </div>
          </div>






        </div>



      </div>

      @endauth

      <div class="modal-footer">
        <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Abbrechen</button>
        <button id="submit_post_btn" type="submit" class="btn btn-warning bg-cura" onclick="post()">Beitrag verfassen</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="cura-col-2 pe-2 d-xl-block d-none ">
    <div class="sticky-top " id="sticky_side_bar4" style="z-index: 1;">
      <div class="ProfileBoxLeftInner">
        <div class="row">
          <div class="col-4 mt-2 ms-2 ">
            <?php Helper::profilePicture(
              'post_profile_pic',
              '60px',
              auth()->user(),
              'ProfileImageUser',
              '',
            ); ?>

          </div>
          <div class="col-7 align-self-center" style="cursor: pointer;" onclick="getPage('/get_user', '/users/'+'{{ auth()->user()->username }}', '{{ auth()->user()->username }}');">
            <div class="ps-2 ProfileBoxLeftFontStyle">{{ auth()->user()->firstname }}

            </div>
            <div class="ps-2 ProfileBoxLeftFontStyle">{{ auth()->user()->name . '' }}

            </div>
          </div>

        </div>
        <div class="row pb-2">

          <div class="ProfileBoxLeftProfileViews ">
            <div class="ProfileBoxLeftProfileViews1">3235</div>
            <div class="ProfileBoxLeftProfileViews2">Profilaufrufe</div>
          </div>

          <div class="linebetween">

          </div>

          <div class="ProfileBoxLeftProfilePosts">
            <div class="ProfileBoxLeftProfilePosts1">12</div>
            <div class="ProfileBoxLeftProfilePosts2">Posts</div>
          </div>

        </div>
      </div>

      <div class="ProfileBoxSecondLeft pt-2">
        <div class="ProfileBoxSecondLeftInner">
          <div class="row">


            <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3" src="/images/NavBarLeftInfluencerIcon.svg" alt="">
              Seiten</div>

            <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3 " src="/images/NavBarLeftCompanyIcon.svg" alt="">
              Unternehmen</div>

            <div class="NavBarLeft mt-2" style="padding-left: 22px !important;"><img style="width: 26px; " class="me-3" src="/images/NavBarLeftStudyIcon.svg" alt="">
              Weiterbilden</div>

            <div class="NavBarLeft mt-2 ps-4"><img style="width: 22px;" class="me-3" src="/images/NavBarLeftEventIcon.svg" alt="">
              Events</div>

            <div class="lineSeperation mt-3"></div>

            <div class="NavBarLeft2 mt-2 ps-4" onclick="getPage('/get_network', '/network', 'network', 'suggestions');"><img style="width: 23px;" class="me-3" src="/images/NavBarLeftAddIcon.svg" alt="">
              Leute finden</div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="cura-col-7 marginttopmobile" style=" background:#F6F6F6; border-radius:5px;padding-top:-10px">



    <div class="col-12 text-center mt-3">
      <div class="spinner-border text-warning text-center border-color-cura" style="border-top-color: transparent; border-width: 2px" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <div id="spinner-placeholder" style="height: 100vh"></div>
    </div>


    <div  style="display:none">
      <div class="div" id="posts">
      </div>

      <div class="mb-3">
        @if ($posts->count())
        @foreach ($posts as $post)
        <x-post :post="$post" />
        @endforeach

        @else
        <div class="row ">
          <div class="col-12 text-center">
            Post existiert nicht
          </div>
        </div>

        @endif
      </div>
      <div class="div" id="loaded_posts">
      </div>
    </div>
  </div>

  <div class="cura-col-3 ps-2 d-none d-lg-block">
    <div class="sticky-top pe-2 pe-xl-0" id="sticky_side_bar_right1" style="z-index: 1;">
      <div class="ProfileBoxRight py-2 mb-2">
        <div class="NavBarRight justify-content-center py-1">
          <div class="d-inline-block" onclick="Toasty()">
            <img style="width: 40px" id="iconAdd" class="me-2 mt-2 mb-2" src="/images/InviteFriendsIcon1.svg" alt="">
          </div>
          <div class="d-inline-block" onclick="Toasty()">
            <div class=" InviteFriendsButtonRight1 mt-1 mb-1">Damit die Community wächst</div>
            <div class="InviteFriendsButtonRight2 mb-2">Lade Deine Kollegen ein!</div>
          </div>

          <div class="position-fixed bottom-0  p-3" style="z-index: 5">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-header">
                <img src="/images/LogoWithoutText.svg" style="width:20px" class="rounded me-2" alt="...">
                <strong class="me-auto">Ups</strong>

                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
              </div>
              <div class="toast-body py-2 " style="text-align: center; font-size:12px;font-weight:normal;color:#988F86">
                Keine Sorge, unser IT-Chef wird gefeuert.
                Super aber, dass Du anderen von Curawork erzählen willst.
                Diese Funktion ist bald verfügbar!
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="ProfileBoxSecondRight">
        <div class="row NavBarSecondRight">
          <div class="col-12 mt-4">
            <div class="NavBarSecondRight1 mb-1">More people, more fun!<img class="ms-2" style="height: 20px" src="/images/FrogSmiley.svg" alt=""></div>
          </div>
          <div class="lineSeperation2 pb-1 mb-1 mt-1"></div>

          <!-- Profile 1 -->
          <div class="row position-relative pt-1 pb-1" id="targetdiv">
            <div class="position-absolute top-0 start-0 ps-1" style="z-index: 1">
              <div class="ProfileImageUser1 _profile-pic-btnsNavRight mt-1"></div>
            </div>
            <div class="FeedMarginLeftRight d-flex justify-content-between" style="z-index: 20">
              <div class="d-inline-block pe-1 text-start" style="max-width: 80% !important">
                <div class="InviteFriendsProfilTextRight1 HideOverflowText mb-1">Ute Bringkamp</div>
                <div class="InviteFriendsProfilTextRight2 HideOverflowText mb-1">Exam. Gesundheits- und Krankenpfleger*in</div>
                <div class="InviteFriendsProfilTextRight3 HideOverflowText">aus Bielefeld</div>
              </div>
              <div class="d-inline-block pointer-on-hover float-end align-self-center me-2">
                <img id="target" onclick="fadeOutEffect()" style="" class="" src="/images/NavBarLeftAddIcon.svg" alt="">

                <div id="iconChecked" class="text-center align-self-center lds-spinner d-none">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="d-none ms-xl-1 mb-2" id="requestsent">
                  <div class="col-12 text-center"><img src="/images/CheckGrey.svg" style="height: 12px; width:13px" alt=""></div>
                  <div class="col-12 RequestSend">Anfrage</div>
                  <div class="col-12 RequestSend">gesendet!</div>
                </div>
              </div>
            </div>
          </div>


          <div class="invisible" style="font-size: 8px">..</div>


          <!-- Profile 2 -->
          <div class="row position-relative pt-1 pb-1" id="targetdiv">
            <div class="position-absolute top-0 start-0 ps-1" style="z-index: 1">
              <div class="ProfileImageUser2 _profile-pic-btnsNavRight mt-1"></div>
            </div>
            <div class="FeedMarginLeftRight d-flex justify-content-between" style="z-index: 20">
              <div class="d-inline-block pe-1 text-start" style="max-width: 80% !important">
                <div class="InviteFriendsProfilTextRight1 HideOverflowText mb-1">Daniela Richter</div>
                <div class="InviteFriendsProfilTextRight2 HideOverflowText mb-1">Exam. Altenpfleger*in</div>
                <div class="InviteFriendsProfilTextRight3 HideOverflowText">aus Gütersloh</div>
              </div>
              <div class="d-inline-block pointer-on-hover float-end align-self-center me-2">
                <img id="target" onclick="" style="" class="" src="/images/NavBarLeftAddIcon.svg" alt="">
                <!--
                <div id="iconChecked" class="text-center align-self-center lds-spinner d-none">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="d-none ms-xl-1 mb-2" id="requestsent">
                  <div class="col-12 text-center"><img src="/images/CheckGrey.svg" style="height: 12px; width:13px" alt=""></div>
                  <div class="col-12 RequestSend">Anfrage</div>
                  <div class="col-12 RequestSend">gesendet!</div>
                </div>
              </div>-->
              </div>
            </div>

            <div class="invisible" style="font-size: 10px">..</div>

            <!-- Profile 3 -->
            <div class="row position-relative pt-1 pb-1" id="targetdiv">
              <div class="position-absolute top-0 start-0 ps-1" style="z-index: 1">
                <div class="ProfileImageUser3 _profile-pic-btnsNavRight mt-1"></div>
              </div>
              <div class="FeedMarginLeftRight d-flex justify-content-between" style="z-index: 20">
                <div class="d-inline-block pe-1 text-start" style="max-width: 80% !important">
                  <div class="InviteFriendsProfilTextRight1 HideOverflowText mb-1">Marie Schwellinger</div>
                  <div class="InviteFriendsProfilTextRight2 HideOverflowText mb-1">Exam. Kinderkrankenpfleger*in</div>
                  <div class="InviteFriendsProfilTextRight3 HideOverflowText">aus Avenwedde</div>
                </div>
                <div class="d-inline-block pointer-on-hover float-end align-self-center me-2">
                  <img id="target" onclick="" style="" class="" src="/images/NavBarLeftAddIcon.svg" alt="">
                  <!--
                <div id="iconChecked" class="text-center align-self-center lds-spinner d-none">
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                  <div></div>
                </div>
                <div class="d-none ms-xl-1 mb-2" id="requestsent">
                  <div class="col-12 text-center"><img src="/images/CheckGrey.svg" style="height: 12px; width:13px" alt=""></div>
                  <div class="col-12 RequestSend">Anfrage</div>
                  <div class="col-12 RequestSend">gesendet!</div>
                </div>
              </div>-->
                </div>
              </div>
            </div>

            <div class="invisible" style="font-size: 8px">..</div>


            <div class="lineSeperation2 ms-2 mt-0 "></div>
            <div class="col-12 mt-1">
              <div class="NavBarSecondRight2 mb-5" onclick="getPage('/get_network', '/network', 'network', 'suggestions');" style="cursor: pointer;"> Mehr anzeigen </div>
            </div>




            <style>
              .TransparentFooterRight {
                color: #988F86 !important;
                font-size: 12px;
              }
            </style>

            <div class="row pt-1">
              <div class="col-12 px-4 ms-2 d-flex justify-content-between">
                <a tabindex="0" target="_blank" href="https://www.curawork.de/aboutus" id="compactfooter-about" class="d-inline-block TransparentFooterRight">Über uns</a>
                <a tabindex="0" target="_blank" href="https://www.curawork.de/impressum" id="compactfooter-accessibility" class="d-inline-block TransparentFooterRight">Impressum</a>
                <a tabindex="0" target="_blank" href="https://www.curawork.de/datenschutz" id="compactfooter-help" class="d-inline-block TransparentFooterRight">Datenschutz</a>
              </div>
              <div class="col-12">
                <div class="TransparentFooterRight text-center mt-2" style="font-size: 12px">Curawork ©️ 2021</div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>