

<div id="invites_grid" class="d-none">
  <div class="row mt-5 justify-content-end" style="height:200vh">
    <div id="network_col_left" class="mb-3 col-lg-3">
      <div id="sticky_side_bar_network2_tabs_skeletons" class="sticky-top" style="z-index: 0">
        <div id='network_tabs_skeletons' class=''>
          <x-jobs_page_invites_tabs />
        </div>
      </div>    
    </div>
    <div class="col-lg-9 ">
      <div class="ps-lg-3 ps-xl-4">
        <div class="">
          {{-- SKELETONS --}}
          <div id="invited_talents_skeleton" class="d-none">
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
          </div>
          <div id="accepted_talents_skeleton" class="d-none">
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
          </div>
          <div id="rejected_talents_skeleton" class="d-none">
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
            <x-jobs_page_talent_skeleton />
          </div>

          {{-- CONTENT --}}
          <div id="invites_col_main">

          </div>
        </div>
      </div>
    </div>
  </div>


</div>