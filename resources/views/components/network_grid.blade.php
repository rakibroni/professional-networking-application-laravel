
<div id="network_grid" class="d-none">
  <div class="row mt-5 justify-content-end">
    <div id="network_col_left" class="mb-3 col-lg-3">
      {{-- SKELETONS --}}
      <div id="sticky_side_bar_network_tabs_skeletons" class="sticky-top" style="z-index: 0">
        <div id='network_tabs_skeletons' class='d-none'>
          <x-network_tabs_skeleton />
        </div>
      </div>
      {{-- CONTENT --}}
      <div id="sticky_side_bar_network_tabs" class="sticky-top" style="z-index: 0">
        <div id='network_tabs' class='d-none'>
          <x-network_tabs />
        </div>
      </div>
    </div>
    <div class="col-lg-9 ">
      <div class="ps-lg-3 ps-xl-4">
        <div class="border rounded2 bg-white">
          {{-- SKELETONS --}}
          <div id="suggestions_skeletons" class="d-none">
            <x-suggestions_skeleton />
          </div>
          <div id="requests_skeletons" class="d-none">
            <x-requests_skeleton />
          </div>
          <div id="connections_skeletons" class="d-none">
            <x-connections_skeleton />
          </div>
          {{-- CONTENT --}}
          <div id="network_col_main">

          </div>
        </div>
      </div>
    </div>
  </div>


</div>
