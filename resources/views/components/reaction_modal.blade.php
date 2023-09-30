
<div id="connection_skeletons_reaction_modal" class="d-none">
  <x-connection_skeleton />
  <x-connection_skeleton />
  <x-connection_skeleton />
  <x-connection_skeleton />
  <x-connection_skeleton />
  <x-connection_skeleton />
</div>


<div class="modal fade CustomFullScreenModal" id="reaction_modal" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title ModalHeaderProfile" id="exampleModalLabel">Wem gefällt dieser Beitrag?
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body py-2 px-0" id="reaction_modal_body">

        <!-- Profile 1 -->
        <div class="row postition-relative px-2 px-lg-3">
          <img class="position-absolute pointer-on-hover" style="height: 48px; width: 48px" src="/images/UserTest1.png"
            alt="">

          <div class="PostMarginLeftRight align-self-center">
            <div class="row">
              <div class="col-10">
                <div class="PostNameFont HideOverflowText pointer-on-hover">Daniela Reifer</div>
                <div class="PostStelleAGFont HideOverflowText pointer-on-hover"
                  style="padding-top: 1px; padding-bottom: 2px">Gesundheits- und Krankenpfleger*in @ Evangelisches
                  Johanneswerk Standort 4</div>
                <div class="PostCommonFriendsFont underline-on-hover HideOverflowText">35 gemeinsame Verbindungen
                </div>
              </div>
              <div class="col-2 align-self-center ps-2" style="height 32px">
                <button class="btn buttonmessage w-100 d-block d-lg-none p-0"><img src="/images/msgprofile.svg"
                    style="width:18px" alt=""></button>
                <button class="btn buttonmessage w-100 d-none d-lg-block py-0"><img src="/images/msgprofile.svg"
                    style="width:18px" class="me-2" alt=""><span style="font-size: 12px">Nachricht</span></button>
              </div>
            </div>
          </div>

        </div>
        <hr class="mb-2 mt-2" style="color: #BCBBBB">


        <!-- Profile 2 -->
        <div class="row postition-relative px-2 px-lg-3" style="height: 50px">
          <img class="position-absolute pointer-on-hover" style="height: 48px; width: 48px" src="{{-- /images/UserTest2.png --}}"
            alt="">

          <div class="PostMarginLeftRight align-self-center">
            <div class="row">
              <div class="col-10">
                <div class="PostNameFont HideOverflowText pointer-on-hover">Candy Sarah Reifertemas</div>
                <div class="PostStelleAGFont HideOverflowText pointer-on-hover"
                  style="padding-top: 1px; padding-bottom: 2px">Exam. Altenpfleger*in @ Evangelisches Klinikum
                  Bielefeld</div>
                <div class="PostCommonFriendsFont underline-on-hover HideOverflowText">8 gemeinsame Verbindungen
                </div>
              </div>
              <div class="col-2 align-self-center ps-2" style="height 32px">
                <button class="btn btn-warning w-100 d-block d-lg-none p-0"><img src="/images/VernetzenIcon.svg"
                    alt=""></button>
                <button class="align-self-center btn btn-warning w-100 d-none d-lg-block py-0"><img
                    src="/images/VernetzenIcon.svg" class="me-2" alt=""><span
                    style="font-size: 12px">Verbinden</span></button>
              </div>
            </div>
          </div>

        </div>
        <hr class="mb-2 mt-2" style="color: #BCBBBB">
        <x-connection_skeleton />
        <x-connection_skeleton />
      </div>
    </div>
  </div>
</div>


<script>

  var myModalEl = document.getElementById('reaction_modal');
  myModalEl.addEventListener('show.bs.modal', function(event) {
    //disableScroll();
  })
  myModalEl.addEventListener('hide.bs.modal', function(event) {
    //enableScroll();
  })
</script>