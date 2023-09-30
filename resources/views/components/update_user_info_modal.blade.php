<div class="modal fade" id="update_user_info_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered  ">
  <div class="modal-content mt-0 mt-md-5" style="min-height: 450px">

    <!-- Modal Card Header 1 -->
    <div class="d-none d-lg-block">
      <div class="modal-header" style="height: 55px !important">
        <div class="ModalHeaderProfile" id="exampleModalLabel">Profil bearbeiten
          <!-- font-weight 500 funktioniert nicht, das ist 400 -->
        </div>
        <button id="discard_update_user_info" type="button" class="btn-close"></button>
      </div>
    </div>
    <!-- Modal Card Header 2 -->
    <div class="d-block d-lg-none">
      <div class="modal-header px-2" style="height: 55px !important">
        <div class="row w-100">
          <div class="col-2 ps-1" id="discard_update_user_info_1"><img src="/images/ArrowLeftProfile.svg" alt="">
          </div>
          <div class="col-8 ModalHeaderProfile2" id="exampleModalLabel">Profil bearbeiten
            <!-- font-weight 500 funktioniert nicht, das ist 400 -->
          </div>
          <div class="col-2 pe-1 d-none d-sm-block SaveBtnProfile pointer-on-hover" id="update_user_info_btn_1">
            Speichern</div>
          <div id="update_user_info_btn_2" class="col-2 pe-1 d-block d-sm-none"><img onclick="" class="float-end"
              src="/images/CheckOrange.svg" alt="">
          </div>
        </div>
      </div>
    </div>




    <!-- Modal Card Body -->
    <div class="modal-body modal-body-p0">
      <div class="col-12">
        <div class="col-12 h-100 py-2" style="background: #F6F6F6">
          <div class="HinweisTextProfile px-2 px-lg-4 mb-1 mt-1">Hinweis: Bitte fülle die allgemeinen Informationen
            über dich aus, damit andere Pfleger*innen sehen können, wer du bist!</div>
          <!-- Vielleicht coolerer Text -->
        </div>
        <div class="row px-2 px-lg-4 pt-3">
          <div class="col-6 mb-3 pe-1">
            <div class="InPutTitle mb-2">Vorname</div>
            <div class="">
              <input type="text" id="firstname_modal" placeholder="{{ $user->firstname }}" class="form-control"
                value="{{ $user->firstname }}">
            </div>
            <div id="firstname_error" class="d-none text-danger error-text">Bitte trage deinen Vornamen ein</div>
          </div>

          <div class="col-6 mb-3 ps-1">
            <div class="InPutTitle mb-2">Nachname</div>
            <div class="">
              <input type="text" id="lastname_modal" placeholder="{{ $user->name }}" class="form-control"
                value="{{ $user->name }}">
            </div>
            <div id="lastname_error" class="d-none text-danger error-text">Bitte trage deinen Nachnamen ein</div>
          </div>
          <div class="col-12">
            <div class="InPutTitle mb-2">Standort</div>
            <div class="">
              <?php
              $current_city = $user->location_city . ', ' . $user->location_state;
              
              Helper::showDropdown(
                  'city-search',
                  'search-dropdown-city',
                  'z.B. Bielefeld',
                  'filterTest3(this.id,
                                                  `search-dropdown-city`)',
                  $current_city,
                  [''],
                  ['form-control w-100', 'dropdown-menu w-100', 'bg-danger'],
                  ['', '', 'bg-danger'],
                  '',
              );
              ?>

            </div>
            <div id="location_error" class="d-none text-danger error-text">Bitte gebe deinen aktuellen Standort
              an</div>
          </div>
          <div class="col-12 mb-3">
            <div class="InPutTitle mb-2 mt-3">Position</div>
            <div class=" mb-2">
              <?php
              $current_position = $user->current_position;
              Helper::showDropdown(
                  'position-search',
                  'search-dropdown-position',
                  '',
                  'filterFunction1(`position-search`, `search-dropdown-position`)',
                  $current_position,
                  Helper::getPositionArray(),
                  ['form-control w-100', 'dropdown-menu', 'dropdown-item pointer-on-hover'],
                  [
                      '',
                      'max-height: 200px; margin-top: -25px; overflow-x: hidden',
                      'bg-danger',
                  ],
                  '$(`#search-dropdown-position`).addClass(`d-block`)',
              );
              ?>
              <div id="position_error" class="d-none text-danger error-text">Bitte gebe deinen aktuellen Standort
                an</div>
            </div>

          </div>
          <script>
            $("#position-search").on("click", function() {
              scrollToInput();
            });


            function scrollToInput() {
              document.getElementById('position-search').scrollIntoView(true);
            }
          </script>
        </div>
      </div>
    </div>
    <div class="d-none d-lg-block">
      <div class=" modal-footer py-0" style="height: 60px">
        <button id="update_user_info_btn" style="width: 100px; color: white !important"
          class="btn btn-warning bg-cura" id="">Speichern</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
  var myModalEl = document.getElementById('update_user_info_modal');
  myModalEl.addEventListener('show.bs.modal', function(event) {
    //disableScroll();
  })
  myModalEl.addEventListener('hide.bs.modal', function(event) {
    //enableScroll();
  })
</script>