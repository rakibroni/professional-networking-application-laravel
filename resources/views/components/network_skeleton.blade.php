
<link href="{{ asset('css/network.css') }}" rel="stylesheet">
<div class="row mt-5 justify-content-end">
  <div class="mb-3 col-lg-3">

    <div class="row me-xl-2 mb-2 border rounded2 justify-content-center bg-white">

      <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important"  onclick="switchTab(this.id)">
        <div class="col align-self-center">
          <a class="d-flex justify-content-between">
            <div class="skeleton">Vorschläge</div>
            <div class="skeleton" >...</div>
          </a>
        </div>
      </div>
      <div class="row py-2 px-2 border-bottom pointer-on-hover unselectable" style="height: 47px !important"  onclick="switchTab(this.id)">
        <div class="col-12 align-self-center">
          <a class="d-flex justify-content-between">
            <div class="skeleton">Anfragen</div>
            <div class="skeleton">...</div>
          </a>
        </div>
      </div>
      <div class="row py-2 px-2 pointer-on-hover unselectable" style="height: 47px !important"  onclick="switchTab(this.id)">
        <div class="col align-self-center">
          <a class="d-flex justify-content-between">
            <div class="skeleton">Mein Netzwerk</div>
            <div class="skeleton" >...</div>
          </a>
        </div>
      </div>

    </div>
  </div>
  <div class="col-lg-9">
    <div class="ps-lg-3 ps-xl-4">
      <div id="suggestions_skeletons" class="border rounded2 bg-white d-none">
        <x-suggestions_skeleton />
      </div>
    </div>
  </div>
</div>