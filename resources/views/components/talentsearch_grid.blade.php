<div class="d-none" id="talentsearch_grid">
  <div class="row">
    <div class="col-3">
      <div class="d-none" id="filter">

      </div>
      <div id="filter_skeleton">
        <x-jobs_search_filter_skeleton />
      </div>
    </div>
    <div class="col-9">
      <div id="search_talents" class="d-none">
        <div class="d-none" id="talents">

        </div>

        <div class="" id="talents_skeletons">
          <x-top_three_talents />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-more_talents />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />

        </div>
      </div>
      <div id="saved_talents" class="d-none">
        <div class="d-none" id="saved_talents_content">

        </div>
        <div class="" id="saved_talents_skeletons">
          @php
            $showAll = false;
          @endphp
          <x-top_three_talents :showAll="$showAll" />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />
          <x-jobs_page_talent_skeleton />

        </div>
      </div>
    </div>
  </div>
</div>
