<!-- Modal -->
<style>
  .no-connection-modal {
    /*border-color: transparent;
    border-top-color: red;
    border-style: solid;
    border-width: 3px;*/
  }

</style>


<div id="no_connection_modal" class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content  no-connection-modal">
      <div class="modal-body h6 mt-2 text-center">
        <div>Keine Internetverbindung!</div>
        <div class="my-3">
          <img src="{{ asset('images/image_offline.png') }}" style="width:100px; height: 100px"  alt="">
        </div>
        <div class="mt-2" style="font-size: 12px">Versuche erneut zu verbinden...</div>
      </div>
    </div>
  </div>
</div>

<script>
  //var isConnected = false;
  var reloaded = true;
  setTimeout(() => {
    setInterval(() => {
      if (!navigator.onLine) {
        reloaded = false;
        $('#no_connection_modal').modal('show');
      } else {
        $('#no_connection_modal').modal('hide');
        if (!reloaded) {
          reloaded = true;
          location.reload();
        }
      }
    }, 500);
  }, 2000);


  function reConnect() {
    isConnected = true
  }
</script>
