<!-- Modal -->
<style>
  .thanks-for-reporting {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .thanks-for-reporting-box {}

</style>

<!-- Modal -->
<div id="question_disclaimer_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-down modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="question_disclaimer_modal_title">Danke, deine Frage wird überprüft!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body unselectable">
        <div class="row mB">
          <div class="d-flex justify-content-center">
            <img style="width: 200px; height: 200px"  src="{{ asset('images/disclaimer_question.svg') }}" alt="">
          </div>
          <div class="mt-2 col-12 text-center" style="color: #7F7F7F, font-size: 12px">
            Vielen Dank für deine Frage! Sie wird umgehend von unserem Team überprüft und an den jeweiligen Experten
            und/oder die Community weitergeleitet.
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="$('#question_disclaimer_modal').modal('hide')" class="btn btn-warning cura-bg">Schließen</button>
      </div>
    </div>
  </div>
</div>
