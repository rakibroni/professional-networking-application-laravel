<div class="modal fade" id="delete_profile_picture_modal" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Profilbild löschen</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
      </div>
      <div class="modal-body modal-body-p0">
        <div class="div p-2">
          Möchtest Du wirklich Dein Profilbild löschen?
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="closeProfilePictureDeletionPopUp()" type="button" class="btn btn-outline-secondary"
          data-bs-dismiss="modal">Zurück</button>
        <button onclick="deleteProfilePicture()" type="button" class="btn btn-danger">Profilbild löschen</button>
      </div>
    </div>
  </div>
</div>

<script>
  var myModalEl = document.getElementById('delete_profile_picture_modal');
  myModalEl.addEventListener('show.bs.modal', function(event) {
    disableScroll();
  })
  myModalEl.addEventListener('hide.bs.modal', function(event) {
    enableScroll();
  })
</script>