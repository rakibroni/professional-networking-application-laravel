<?php

if (!isset($idPrefix)) {
    $idPrefix = '';
}
if (!isset($type)) {
    $type = 'answer';
}
if (!isset($additionalMargin)) {
    $additionalMargin = 0;
}
if (!isset($pictureSize)) {
    $pictureSize = 32;
}
if (!isset($marginToPicture)) {
    $marginToPicture = 39;
}

$additionalMarginSkeleton = 40;
$pictureSizeSkeleton = 20;
$marginToPictureSkeleton = 25;

$answers = $commentAnswer->firstFewAnswers();
?>
<div class="" style="margin-left: {{ $additionalMargin }}px !important;  margin-top: -2px">
  <div class="position-relative ">
    <div class="position-absolute top-0 start-0 mt-1">
      <?php Helper::profilePicture('', $pictureSize . 'px', $commentAnswer->user, 'pointer-on-hover', ''); ?>
    </div>
    <div class="pe-1" style="margin-left: {{ $marginToPicture }}px !important">
      <div class="py-2 pe-2 ps-2 ps-sm-3" style="background-color: #f2f2f2; border-radius: 5px">
        <div class="d-flex justify-content-between">
          <div class="d-inline-block pointer-on-hover"
            onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
            style="font-weight: 600; font-size: 13px">
            {{ $commentAnswer->user->firstname . ' ' . $commentAnswer->user->name }}
          </div>
          <div class="d-inline-block" style="font-size: 12px; font-weight: 400; color: #7F7F7F !important">
            {{ $commentAnswer->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
          </div>
        </div>
        <div class="mb-2 pointer-on-hover HideOverflowText"
          onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
          style="font-size: 12px !important; color: #7F7F7F">{{ $commentAnswer->user->current_position }}
          @
          aktueller
          Arbeitgeber</div>
        <div class="PostBodyTextFont"
          style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top">
          {{ $commentAnswer->text }}</div>
      </div>
      <div class="d-flex justify-content-start mt-1 mb-2">
        <div class="d-none PostLikeFont ps-2 ps-sm-3 pe-3"><img class="align-self-center mb-1 pe-1" onclick="" id=""
            src="{{ asset('images/Like.svg') }}" alt=""> 5</div>
        <div class=" PostLikeFont ps-2 pe-3"><img class="align-self-center mb-1" onclick="" id=""
            src="{{ asset('images/Reply.svg') }}" alt=""><span class="ms-1"
            id="comment_answer_answer_count{{ $idPrefix . $commentAnswer->id }}">{{ $commentAnswer->answers()->count() }}</span>
        </div>
        <div class="CommentVerticalLine" style="color: white">.</div>
        <div data-bs-toggle="collapse" data-bs-target="#comment_answer_collapse{{ $idPrefix . $commentAnswer->id }}"
          class="ps-3 PostLikeFont underline-on-hover align-self-center" style="font-size: 14px !important">
          Antworten</div>
      </div>
      <div class="collapse" id="comment_answer_collapse{{ $idPrefix . $commentAnswer->id }}">
        <div class="col-12 d-flex position-relative pe-1">
          <div class="position-absolute top-0 start-0">
            <?php Helper::profilePicture('', '32px', auth()->user(), 'pointer-on-hover', ''); ?>
          </div>
          <div class="CommentMarginLeftRight2"><textarea name=""
              id="comment_answer_answer_text{{ $idPrefix . $commentAnswer->id }}" cols="30"
              oninput="auto_grow(this, 32)" class="PostBorderComment d-inline-block px-3"
              style="padding-top: 7px;padding-bottom: 5px;width:100%; height: 32px !important; overflow:hidden; -webkit-appearance: none; border-radius: 30px; font-size: 12px;"
              placeholder="Schreibe einen Kommentar..."></textarea>
          </div>
        </div>
        <div class="w-100 pe-1 d-flex justify-content-end">
          <button onclick="answerComment('{{ $idPrefix . $commentAnswer->id }}', '{{ $type }}')"
            id="comment_answer_answers_count{{ $idPrefix . $commentAnswer->id }}" style="width:109px"
            class="float-end btn btn-warning btn-sm mb-1 mt-1" onclick="">Kommentieren</button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="" id="answers_to_comment_answer{{ '' . $commentAnswer->id }}">
  <span class="bg-danger p-2" id="answers_to_comment_answer_counter{{ '' . $commentAnswer->id }}">0</span>
  <div id="answers_to_comment_answer_container{{ '' . $commentAnswer->id }}">
  </div>
  <div class="d-none" id="answers_to_comment_answers_skeletons{{ '' . $commentAnswer->id }}">
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
  </div>

  @if ($commentAnswer->answers()->count() > 0)
    <div
      onclick="loadMoreComments('{{ $commentAnswer->id }}', $('#answers_to_comment_answer_counter'+'{{ '' . $commentAnswer->id }}').html(), 'answerToAnswer')"
      id="load_more_answers_to_comment_answer_btn{{ '' . $commentAnswer->id }}" style="font-size: 10px"
      class="mb-2 text-center pointer-on-hover ShowMoreFont">Mehr Antworten anzeigen</div>
  @endif
</div>
