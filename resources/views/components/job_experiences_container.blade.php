<div class="d-flex justify-content-between mb-3">
  <div class="ProfileHeader1">Berufserfahrung</div>
  @if ($viewerOwnsProfile)
  <div class=""><div  class="btn-edit position-relative" onclick="openCVModal($(this).children('img').attr('id'))"><img class="ProfileEditIcon center"
    id="open_show_job_experience_modal0" src="/images/AddSymbole.svg" alt=""></div></div>
  @endif
  
</div>

<div id="job_experiences">
  {{ $user->getJobExperiences() }}
</div>

<!-- EDIT JOB EXPERIENCE -->
@if ($viewerOwnsProfile)
  <div class="modal fade CustomFullScreenModal" id="edit_job_experience_modal" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered modal-fullscreen-xl-down">
      <div class="modal-content mt-0 mt-md-5">

        <!-- Modal Card Header 1 -->
        <div class="d-none d-lg-block">
          <div class="modal-header" style="height: 55px !important">
            <div class="ModalHeaderProfile" id="exampleModalLabel">Berufserfahrung bearbeiten
            </div>
            <button class="btn-close" id="discard_edit_job_experience"></button>
          </div>
        </div>
        <!-- Modal Header 2 -->
        <div class="d-block d-lg-none">
          <div class="modal-header px-2" style="height: 55px !important">
            <div class="row w-100">
              <div class="col-2 ps-1" id=""><img id="discard_edit_job_experience1" src="/images/ArrowLeftProfile.svg"
                  alt="">
              </div>
              <div class="col-8 ModalHeaderProfile2 self-align-center" id="">Berufserfahrung bearbeiten

              </div>
              <div class="col-2 pe-1 d-none d-sm-block SaveBtnProfile pointer-hover" onclick="" id="update_job_experience_btn"
                id="">Speichern</div>
              <div class="col-2 pe-1 d-block d-sm-none pointer-on-hover"><img onclick="" class="float-end"
                  id="update_job_experience_btn1" src="/images/CheckOrange.svg" alt=""></div>
            </div>
          </div>
        </div>

        <!-- Modal Body -->
        <div class="modal-body modal-body-p0 m-2" id="edit_job_experience_modal_body">
        </div>

        <!-- Modal Footer -->
        <div class="d-none d-lg-block">
          <div class="modal-footer py-0" style="height: 60px">
          <button style="width: 100px;" class="d-none btn btn-outline-warning btn-outline-cura"
              id="">Löschen</button>

            <button style="width: 100px; color:white !important" class="btn btn-warning bg-cura"
              id="update_job_experience_btn2">Speichern</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
<!-- EDIT JOB EXPERIENCE END -->