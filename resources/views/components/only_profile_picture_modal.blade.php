<div class="modal fade" id="edit_profile_picture_modal" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg-down">
    <div class="modal-content position-relative">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button onclick="openDiscardChangesPopUp()" type="button" class="btn-close" data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <style>
        .center-profile-img {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }

      </style>
      <div class="modal-body modal-body-p0 text-center p-5 my-5" style="height: 300px">
        <?php Helper::profilePicture('profile-pic-public', '300px', $user, 'center-profile-img', '');
        ?>
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
