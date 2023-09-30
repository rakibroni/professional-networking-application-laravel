<div id="single_post_grid" class="d-none">
  <div class="row">
    <div class="cura-col-2 pe-2 d-xl-block d-none">
      <div class="sticky-top " id="sticky_side_bar1" style="z-index: 1;">
        {{-- CONTENT --}}
        <x-user_stats />
        <?php $sideLinksID1="side_links_1" ?>
        <x-side_links :sideLinksID="$sideLinksID1" />
      </div>
    </div>
    <div class="cura-col-7 marginttopmobile" style=" background:#F6F6F6; border-radius:5px;padding-top:-10px">





      <div style="min-height: 100vh">

        <div id="single_post_skeleton" class="" style="margin-top: 19px">
          <x-post_skeleton />
        </div>
        <div id="" class="">
          <div class="div" id="single_post">
          </div>



        </div>
      </div>
    </div>
    <?php $id = "2" ?>
    {{--  
    <x-invite_friends :id="$id" />--}}
  </div>
</div>
