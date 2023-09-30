
<link href="{{ asset('css/network.css') }}" rel="stylesheet">
<div class="row mt-5 justify-content-end">
  <div class="mb-3 col-lg-3">

    <div class="row me-xl-2 mb-2 border rounded2 justify-content-center bg-white">

      <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important" id="suggestions" onclick="switchTab(this.id)">
        <div class="col align-self-center">
          <a class="d-flex justify-content-between">
            <div class="">Vorschläge</div>
            <div class="" id="suggestionsCount">...</div>
          </a>
        </div>
      </div>
      <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important" id="requests" onclick="switchTab(this.id)">
        <div class="col-12 align-self-center">
          <a class="d-flex justify-content-between">
            <div class="">Anfragen</div>
            <div id="requestCount" class="">...</div>
          </a>
        </div>
      </div>
      <div class="row py-2 px-2 pointer-on-hover unselectable" style="height: 47px !important" id="connections" onclick="switchTab(this.id)">
        <div class="col align-self-center">
          <a class="d-flex justify-content-between">
            <div class="">Mein Netzwerk</div>
            <div class="" id="connectionsCount">...</div>
          </a>
        </div>
      </div>

    </div>
  </div>
  <div class="col-lg-9">
    <div class="ps-lg-3 ps-xl-4">



      <div class=" border rounded2 bg-white" id="main_network_col">

      </div>
    </div>
  </div>
</div>