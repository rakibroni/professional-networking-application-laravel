<!-- Modal -->
<style>
  .thanks-for-reporting {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  }

  .thanks-for-reporting-box {

  }
</style>

<!-- Modal -->
<div id="report_modal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="report_modal_title">Beitrag melden</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body unselectable">
        <div id="thanks_for_reporting_message_box" class="thanks-for-reporting-box">
          <div id="thanks_for_reporting_message"  class="fw-600 thanks-for-reporting w-100 text-center">
            Danke für deine Unterstützung!
          </div>
        </div>
        <div id="report_form">
          <div class="mb-2 "><span class="fw-600">Verfasser: </span> <span id="reported_user_full_name">Hans Werner</span></div>
          <div class="fw-600" style="font-size: 16px">Zusätzliche Bemerkungen:</div>

          <textarea  name="body" id="report_message" type="text" cols="20"
            placeholder="(optional)" class="curaInput mt-1"
            style="max-height: 80px;padding: 0px; font-size: 14px; color: #a3a3a3;"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="reportPost()" class="btn btn-warning cura-bg">Melden</button>
      </div>
    </div>
  </div>
</div>

<script>
 


</script>
