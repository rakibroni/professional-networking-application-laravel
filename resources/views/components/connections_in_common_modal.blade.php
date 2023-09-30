
<?php 
// User Namespace needs to be imported
use App\Models\User; 
$isInsideConnectionsInCommonModal = true;
?>

<div class="modal fade CustomFullScreenModal" id="in_common_connections" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Gemeinsame Verbindungen von dir und <span id="in_common_with"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-body-p0">
        <div id="connections_in_common" class="d-none">

        </div>

        <div id="connections_in_common_skeletons" class="d-none">
          <x-connection_skeleton />
          <x-connection_skeleton />
          <x-connection_skeleton />
          <x-connection_skeleton />
          <x-connection_skeleton />

        </div>
      </div>
    </div>
  </div>
</div>


