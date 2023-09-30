<div class="modal fade" id="discard_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true" style="max-height: 30vh">
  <div class="modal-dialog modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Änderungen verwerfen</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body modal-body-p0 ">
        <div class="div p-2">
          Möchtest Du wirklich alle Änderungen verwerfen?
        </div>
      </div>
      <div class="modal-footer">
        <button id="cancel_discard_btn" onclick="closeDiscardChangesPopUp()" type="button"
          class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Zurück</button>
        <button id="final_discard_btn" onclick="discardChanges()" type="button"
          class="btn btn-warning bg-cura">Änderungen
          verwerfen</button>
      </div>
    </div>
  </div>
</div>


<style>

</style>


<script>
      
  var myModalEl = document.getElementById('discard_modal');
  myModalEl.addEventListener('show.bs.modal', function(event) {
    backDropVisible = true;


    disableScroll();
    // KLASSE WIEDER ABFRAGEN



    //alert($('.modal-backdrop').attr('class'));
  })
  myModalEl.addEventListener('hbackDropVisibleide.bs.modal', function(event) {
    backDropVisible = false;
    enableScroll();
  })


</script>
