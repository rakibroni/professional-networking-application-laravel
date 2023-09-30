<?php 
if (!isset($additionalMargin)) {
    $additionalMargin = 0;
}
if (!isset($pictureSize)) {
    $pictureSize = 32;
}
if (!isset($marginToPicture)) {
    $marginToPicture = 39;
}

?>
<div class="" style="margin-left: {{ $additionalMargin }}px !important; margin-top: -2px">
  <div class="pb-3 position-relative ">
    <div class="position-absolute top-0 start-0">
      <div class="skeleton" style="width:{{ $pictureSize }}px; height: {{ $pictureSize }}px; border-radius: 50% !important"></div>
    </div>
    <div class=" pe-1 skeleton-no-br" style="height: 100px; margin-left: {{ $marginToPicture }}px !important; border-radius: 5px !important;">
      
    </div>
  </div>
</div>


