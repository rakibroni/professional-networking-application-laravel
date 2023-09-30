<div class="modal fade" id="edit_profile_picture_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profilbild</h5>
        <button onclick="getProfilePicStats()" type="button" class="btn-close"></button>
      </div>
      <div class="modal-body modal-body-p0" style="height: 400px; margin-top: 50px">
        <div id="profile-pic-inner">
          <!--<img onclick="" src="{{ asset('images/back.svg') }}" class="_mt20 _ml20 _btn _hover-btn"
                                alt="" style="width: 25px; height: 25px">-->

          <style>
            #temp-profile-pic {
              transform-origin: top left;
              /* IE 10+, Firefox, etc. */
              -webkit-transform-origin: top left;
              /* Chrome */
              -ms-transform-origin: top left;
              /* IE 9 */


              width: 120px;
              height: 120px;
              border-radius: 50%;
              border-style: solid;
              border-width: 4px;
              border-color: white !important;
              object-fit: contain;
              background-position: center;
              background-repeat: no-repeat;
              background-size: 100%;
              background-image: url('/user/profile/profilepics/default.png');
            }



            .center000 {
              position: absolute;
              top: 65px;
              left: 50%;
              transform: translate(-50%, -50%);
            }

          </style>



          <div class="center000">
            <?php Helper::profilePicture('temp-profile-pic', '120px', $user, 'shadow-md', ''); ?>
          </div>




          <!--<div id="temp-profile-pic" class="rotate0 _profile-pic _shadow" style="width:200px; height: 200px; position:absolute; top: 120px; left: 50%; background-image: url('/user/profile/profilepics/default.png');">
                    
                            </div>-->
          <style>
            ._profile-pic-btns1 {
              position: absolute;
              top: 420px;
              left: 50%;
              transform: translate(-50%, -50%);
            }

          </style>
          <div class="_profile-pic-btns1 text-center" id="profile-pic-move-text"
            style="top: 165px !important; font-size: 12px; display:none">
            <span style="width: 250px !important; display:inline-block">Zur Positionierung das Bild ziehen.</span>
          </div>

          <div id="profile-btns-container" class="_shadow _br _profile-pic-btns1"
            style="width: 300px; padding-left: 30px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; height: 64px; margin-top:-90px">


            <div id="profile-pic-btns-spinner" style="display:none">
              <div id="" class="_profile-pic-btns-spinner" role="status">
                <span class="visually-hidden"></span>
              </div>
            </div>

            <div id="profile-pic-btns" style="display:block; height: 40px !important">
              <div class="d-flex justify-content-between">
                <img id="edit-profile-pic" onclick="" src="{{ asset('images/edit.png') }}" class="_btn _hover-btn"
                  alt="" style="width: 45px; height: 45px; padding: 10px">

                <form id="upload_profile_pic_form" method="post" action={{ route('profilepic_temp') }}>
                  @csrf
                  <input type="file" id="upload_profile_pic" name="upload_profile_pic"
                    style="position: fixed; top: -100em" onclick="imgId = 'img'"
                    accept="image/png,image/jpg,image/jpeg,/image/heic,/image/heif" />

                  <label id="file-btn" for="upload_profile_pic">
                    <img onclick="" src="{{ asset('images/upload.png') }}" class="_btn _hover-btn" alt=""
                      style="width: 45px; height: 45px">
                  </label>
                  <button id="submit_profile_pic" class="d-none" type="submit">
                  </button>
                </form>

                <form id="delete_profile_pic_form" method="post" action={{ route('delete_profile_picture') }}>
                  @csrf
                  <img id="delete_profile_picture" src="{{ asset('images/delete.png') }}" class="_btn _hover-btn"
                    alt="" style="width: 45px; height: 45px; padding: 10px">
                  <button id="submit_delete_profile_picture" class="d-none" type="submit">
                </form>
              </div>
            </div>


          </div>
          <style>
            ._zoom-slider-header {
              border-style: solid;
              border-width: 2px;
              border-color: transparent;
              border-top-color: #f2f2f2;
              padding-top: 5px;
              margin-top: 5px;
            }




            .slider {
              -webkit-appearance: none;
              width: 100%;
              height: 15px;
              background: #f2f2f2;
              outline: none;
              border-radius: 5px;
            }

            .slider:hover {
              opacity: 1;
            }

            .slider::-webkit-slider-thumb {
              -webkit-appearance: none;
              appearance: none;
              width: 20px;
              height: 20px;
              background: #ff9721 !important;
              cursor: pointer;
              border-color: transparent;
              border-radius: 50%;
            }

            .slider::-moz-range-thumb {
              width: 20px;
              height: 20px;
              background: #ff9721 !important;
              cursor: pointer;
              border-style: solid;
              border-color: transparent;
              border-radius: 50%;
            }

            .slider::-webkit-slider-thumb:hover {
              width: 25px;
              height: 25px;
            }

            .slider::-moz-range-thumb:hover {
              width: 25px;
              height: 25px;
            }


            ._pl {
              padding-left: 0px !important;
            }

            @media (min-width: 1200px) {
              ._pl {
                padding-left: 28px !important;
              }
            }

          </style>
          <div class="_profile-pic-btns1 text-center _zoom-slider-header " id="profile-pic-zoom-text"
            style="top: 290px !important; font-size: 12px; display:none; width: 250px">

            <div class="d-flex justify-content-between">
              <div class="slidecontainer " style="top: 0px; width: 160px">
                <div class="text-center">Zoom</div>
                <input type="range" min="10" max="20" value="<?php echo $zoom; ?>" class="slider"
                  id="profile-pic-zoom-slider" style="margin-top: 20px">

              </div>
              <style>
                .disable-dbl-tap-zoom {
                  touch-action: manipulation;
                }

              </style>

              <div class="disable-dbl-tap-zoom" style="top:0px">
                <div class="text-center">Bild drehen</div>
                <img id="rotate-profile-pic" src="{{ asset('images/rotate.png') }}" class="_btn _hover-btn" alt=""
                  style="width: 45px; height: 45px; padding: 10px; margin-top: 5px">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal"
          onclick="openDiscardChangesPopUp()">Abbrechen</button>
        <form id="save_profile_pic_form" action="{{ route('profilepic_final') }}" method="post">
          @csrf
          <button id="" type="submit" class="btn btn-warning bg-cura">Speichern</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var myModalEl = document.getElementById('edit_profile_picture_modal');
  myModalEl.addEventListener('show.bs.modal', function(event) {
    disableScroll();
  })
  myModalEl.addEventListener('hide.bs.modal', function(event) {
    enableScroll();
  })
</script>
