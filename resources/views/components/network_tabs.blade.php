<div class="row me-xl-2 mb-2 border rounded2 justify-content-center bg-white">

  <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important"
    id="suggestions" onclick="loadNetworkPage('suggestions');">
    <div class="col align-self-center">
      <a class="d-flex justify-content-between">
        <div class="">Vorschläge</div>
        <div class="" id="suggestionsCount">...</div>
      </a>
    </div>
  </div>
  <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important" id="requests"
  onclick="loadNetworkPage('requests');">
    <div class="col-12 align-self-center">
      <a class="d-flex justify-content-between">
        <div class="">Anfragen</div>
        <div id="requestCount" class="network-tab-indicator">...</div>
      </a>
    </div>
  </div>
  <div class="row py-2 px-2 pointer-on-hover unselectable" style="height: 47px !important" id="connections"
  onclick="loadNetworkPage('connections');">
    <div class="col align-self-center">
      <a class="d-flex justify-content-between">
        <div class="">Mein Netzwerk</div>
        <div class="" id="connectionsCount">...</div>
      </a>
    </div>
  </div>

</div>
