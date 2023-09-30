<div class="modal fade CustomFullScreenModal" id="update_user_summary" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered modal-fullscreen-xl-down">
    <div class="modal-content mt-0 mt-md-5">

      <!-- Modal Card Header 1 -->
      <div class="d-none d-lg-block">
        <div class="modal-header" style="height: 55px !important">
          <div class="ModalHeaderProfile" id="exampleModalLabel">Über mich
            <!-- font-weight 500 funktioniert nicht, das ist 400 -->
          </div>
          <button class="btn-close" id="discard_update_summary"></button>
        </div>
      </div>
      <!-- Modal Header 2 -->
      <div class="d-block d-lg-none">
        <div class="modal-header px-2" style="height: 55px !important">
          <div class="row w-100">
            <div class="col-2 ps-1" id=""><img id="discard_update_summary_1" src="/images/ArrowLeftProfile.svg" alt="">
            </div>
            <div class="col-8 ModalHeaderProfile2 self-align-center" id="">Warum die Pflege?

            </div>
            <div class="col-2 pe-1 d-none d-sm-block SaveBtnProfile pointer-hover" onclick="" id="update_summary_btn"
              id="">Speichern</div>
            <div class="col-2 pe-1 d-block d-sm-none pointer-on-hover"><img onclick="" class="float-end"
                id="update_summary_btn_1" src="/images/CheckOrange.svg" alt=""></div>
          </div>
        </div>
      </div>

      <!-- Modal Body -->
      <div class="modal-body modal-body-p0">
        <div class="col-12 py-2" style="background: #F6F6F6">
          <div class="HinweisTextProfile px-2 px-lg-4 mb-1 mt-1 h-100">Hinweis: Hier teilst du anderen Pflegekräften
            mit, wer du bist und was dich an deiner Arbeit in der Pflege motiviert. Weshalb arbeitest du in der
            Pflege? Was macht eine gute Pflege für dich aus und wann ist ein Tag in der Pflege für dich
            zufriedenstellend? Was du schreibst, ist selbstverständlich dir überlassen!</div>
        </div>
        <div class="row px-2 px-lg-4 pt-3">
          <div class="col-12 mb-3 pe-1">
            <div class="InPutTitle mb-2">Über mich...</div>
            <form>
              <div class="form-group mb-2">
                <textarea id="summary" class="form-control" id="exampleFormControlTextarea1"
                  placeholder="Ich arbeite nun schon seit 9 Jahren in einem Pflegeberuf, natürlich sind manche Tage hart und kräfteraubend. Ich kann mir dennoch keinen schöneren Beruf vorstellen, der mich so erfüllt. Den Fortschritt von Patienten zu sehen, für die man verantwortlich war, ist einfach großartig! Dann auch noch zu wissen, dass man einen großen Teil dazu beigetragen hat, ist ein schönes Gefühl."
                  rows="5">{{ $user->summary }}</textarea>
              </div>
            </form>
            <div id="summary_error" class="d-none text-danger error-text">Bitte trage deinen Vornamen ein</div>
          </div>
        </div>

      </div>

      <!-- Modal Footer -->
      <div class="d-none d-lg-block">
        <div class="modal-footer py-0" style="height: 60px">
          <button style="width: 100px; color:white !important" class="btn btn-warning bg-cura"
            id="update_summary_btn_2">Speichern</button>
        </div>
      </div>
    </div>
  </div>
</div>
