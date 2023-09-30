<div id="user_profile_grid" class="d-none">
  <div class="row p-0 my-0 mx-0 my-md-3 mx-xl-3 mx-md-0">
    <div id="user_main_col" class="col-lg-9 p-0 ">
      {{-- SKELETONS --}}
      <div id='user_card_skeletons' class='d-none'>
        <x-user_card_skeletons />
      </div>
      {{-- CONTENT --}}
      <div id='user_card' class='d-none'>

      </div>


      <span id="user_tabs_skeletons" class="d-none">
        <x-user_profile_tabs_skeletons :user="auth()->user()" />
      </span>
      <span id="user_tabs" class="d-none">

      </span>

      <div id='user_page_info_skeletons' class='d-none'>
        <x-user_page_info_skeletons />
      </div>

      <div id='user_page_info' class='d-none'>

      </div>

      <div id="user_activity" class='d-none'>
        <div class='mb-3'>
          <span id="acitvity_sub_tabs_mobile_skeletons" class="d-none">
            <x-activity_sub_tabs_mobile_skeletons />
          </span>

          <span id="acitvity_sub_tabs_mobile" class="d-none">

          </span>
          <div style="height: 10px"></div>
          <div class="row">

            <div class="cura-col-3 d-none d-md-block">
              <div id="sticky1_side_bar_acitvity_sub_tabs" class="sticky-top pe-2" style="z-index: 20">
                <div id="acitvity_sub_tabs" class="d-none">
                </div>
                <div id="acitvity_sub_tabs_skeletons" class="d-none">
                  <x-activity_sub_tabs_skeletons />
                </div>
              </div>
            </div>

            <div class="col">

              <div style="background:#F6F6F6; border-radius:5px;padding-top: 3px; padding-bottom: 19px" class="">
                <div class="d-none" id="user_activity_posts">

                </div>
                <div class="d-none" id="user_activity_posts_skeletons">
                  <x-post_skeleton />
                  <x-post_skeleton />
                  <x-post_skeleton />
                  <x-post_skeleton />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="user_connections" class='d-none mt-3 bg-white _br shadowtop'>

      </div>


      <div id="user_connections_skeleletons" class='d-none mt-3 bg-white _br shadowtop'>
        <x-connection_skeleton />
        <x-connection_skeleton />
        <x-connection_skeleton />
        <x-connection_skeleton />
      </div>


      <div id="user_page_javascript"></div>
    </div>
  </div>
</div>

















{{-- <div id="user_profile_grid" class="d-none">
  <div id="user_profile_card" class="d-none">
    
  </div>





  <div id="user_profile_content" class="d-none">
    
  </div>
  <div id="user_profile_skeletons" class="d-none">
    <div class="row">
      <div class="row p-0 my-0 mx-0 my-md-3 mx-xl-3 mx-md-0">
        <div class="col-lg-9 p-0">
          <div class="w-lg-90 mx-0 mx-md-3 mx-lg-4" style="position: relative">

            <div class="d-none d-md-block _title-img_profile _shadowDown _no-br-bottom _no-br-top"></div>
            <div class="d-none d-sm-block d-md-none _title-img_profile _shadowDown _no-br-bottom"></div>
            <div class="d-block d-sm-none _title-img_profile1 _shadowDown _no-br-bottom"></div>

            <div class="_shadowDown custom-br bg-white">
              <div class="btn-clear" data-bs-toggle="modal" style="height: 22px"
                data-bs-target="#edit_profile_picture_modal" role="button">
                <div class="d-none d-md-block">
                  <div style="border-radius: 50% !important; width: 121px; height: 121px"
                    class="_profile-pic-btns skeleton"></div>
                </div>
                <!-- neue ID hinzufügen für 3. größe -->
                <div class="d-none d-sm-block d-md-none">
                  <div style="border-radius: 50% !important; width: 110px; height: 110px"
                    class="_profile-pic-btns skeleton"></div>
                </div>
                <div class="d-block d-sm-none">
                  <div style="border-radius: 50% !important; width: 80px; height: 80px"
                    class="_profile-pic-btns skeleton">
                  </div>
                </div>
              </div>

              
              <!-- Card User Profile -->

              <div class="row px-2 px-sm-3 px-md-4">
                <div class="d-none d-md-block col-12 pt-2 ProfileNameFont pb-1">
                  <div class="d-flex justify-content-start w-75">
                    <div class="skeleton me-2" style="height: 25px !important">asdfasdasd</div>
                    <div class="skeleton me-2" style="height: 15px !important">asdasdas</div>
                    <div class="skeleton" style="height: 15px !important">asdasdasdsss</div>
                  </div>

                </div>
                <div class="d-block d-md-none ol-12 pt-2 ProfileNameFont pb-1">
                  <span class="skeleton" style="height: 10px !important">asdfasdasd</span>
                  <span class="skeleton" style="height: 10px !important">asdasdas</span>
                </div>


                <div class="col-12 d-block d-md-none ProfileLocationFont mb-1">
                  <span class="skeleton" style="height: 10px !important">asdasdasdsssssssssssss</span>
                  <span class="skeleton" style="height: 10px !important">asdasdasdsssssssssssss</span>
                </div>

                <div class="col-12 col-md-9 py-1  ProfileRoleFont" style="height: 10px !important"><div class="skeleton" style="width: 200px !important">asdasdsa</div></div>
                <div class="d-none d-md-block col-3 py-1 ConnectionsFont text-end"><span class="skeleton" style="height: 10px !important; width: 30px">asdasdasssssssssss</span></div>

              </div>
              <div class="row px-2 px-sm-3 px-md-4 pt-1 pb-3">
                <div class="col-md-9 col-12">
                  <div class="row py-1">

                    <div class="col-10 align-self-center AGNameFont mt-2">

                      <span class="skeleton" style="height: 10px !important">asdasdasdsssssssssssssasssssssssssss</span>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- TABS -->
          <div class="d-block d-md-none col-12 bg-white _shadowDown">
            <div class="row pt-2">
              <span class="col-4 linebetween_profile"><span class="skeleton mx-2 mt-1">asdfasdasd</span></span>
              <span class="col-4 linebetween_profile"><span class="skeleton mx-2 mt-1">asdfasdasd</span></span>
              <span class="col-4 linebetween_profile"><span class="skeleton mx-2 mt-1">asdfasdasd</span></span>
            </div>
          </div>

          <div class="_shadowDown d-none d-md-block _no-br-topgrey br_bottom_menu">
            <div style="height: 60px; margin-top: -40px">
              <div class="_no-br-topgrey h-100" style="background-color: #EDEDED"></div>
            </div>
            <div class="bg-white br_bottom_menu d-flex justify-content-start">
              <div class="skeleton my-3 ms-3" style="width: 200px">asdasdasdas</div>
              <div class="skeleton my-3 ms-3" style="width: 200px">asdasdasdas</div>
              <div class="skeleton my-3 ms-3" style="width: 200px">asdasdasdas</div>
              
            </div>
          </div>
          <!-- TABS -->




          <div>
            <!-- USER SUMMARY -->
            <div class="mt-3 bg-white px-2 px-sm-3 px-md-4 py-3 _br shadowtop">
              <div class="row">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>
            </div>

            <!-- USER SUMMARY END -->







            <div class="mt-3 bg-white px-2 px-sm-3 px-md-4 py-3 _br shadowtop">
              <div class="row">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>
              <div class="row py-2">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>
            </div>


            <!-- Box 2 Weiterbildung -->
            <div class="_br shadow-md px-2 px-sm-3 px-md-4 py-3 bg-white mt-3">
              <div class="row">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>
              <div class="hr"></div>
              <div class="row">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>
              <div class="hr"></div>
              <div class="row">
                <div class="col-2 skeleton" style="height: 10px !important">asdasdas</div>
              </div>

            </div>

            <!-- Mitglied bei Curawork -->
            <div class="_br shadow-md px-2 px-md-4 py-3 mb-3 bg-white mt-3">
              <div class="d-flex justify-content-center">
                <div class="mb-3 skeleton">
                  Mitglied bei Curawork</div>
              </div>
              <div class="d-flex justify-content-center">
                <div class="ProfileLicenseFont skeleton ">seit
                  asdasdas</div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div style="height: 200px"></div>

    <!-- MAIN CONTENT END -->


  </div>
</div>
</div> --}}
