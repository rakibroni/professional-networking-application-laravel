@php
  use App\Models\QuestionCategories;
if (!isset($showCommentLines)) {
    $showCommentLines = true;
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

$commenMainLineStyle = '';
$commentSubLineStyle = '';
$commentParentMainLineStyle = '';
$level = $commentAnswer->answerLevel();
if (!isset($additionalMarginSkeleton)) {
    if ($level == 1) {
        $additionalMarginSkeleton = 70;
    } else {
        $additionalMarginSkeleton = 45;
    }
}

if ($level == 1) {
    $commentSubLineStyle = 'top: -45px; left: -29px; width: 57px; height: 55px';
}

if ($level > 1) {
    $commentSubLineStyle = 'top: -41px; left: -10px; width: 37px; height: 58px';
}
if ($level == 0) {
    $commenMainLineStyle = 'left: 17px; height: calc(100% - 40px)';
}
if ($level > 0) {
    $commenMainLineStyle = 'top: 50%;left: 10px; height: calc(100%)';
}
$pictureSizeSkeleton = 20;
$marginToPictureSkeleton = 25;

$answers = $commentAnswer->firstFewAnswers();

if ($level == 2) {
    $commentParentMainLineStyle = 'left: -53px';
}
if ($level >= 3) {
    $commentParentMainLineStyle = 'left: -78px';
}
// FALLS COMMEN MAIN LINE LEVEL 0 DANN - 20 PX
$parents = $commentAnswer->levelArray();

$islastAnswer = $commentAnswer->isLastAnswer();
$totalAnswerCount = $commentAnswer->totalAnswersCount();

$isCommenAnswer = $commentAnswer->post()->isNormalPost();
if (!$isCommenAnswer) {

    $questionCategories = QuestionCategories::where('question_id', $commentAnswer->post()->question()->id)->get();


    $isExpertForQuestion = $commentAnswer->user->isExpertForQuestion($questionCategories);

}

@endphp

{{ $commentAnswer->question_comment_reply_id }}

<div class="" style="margin-left: {{ $additionalMargin }}px !important; margin-top: -2px !important;">
  <div class="position-relative pb-3">
    @if ($showCommentLines)
      @if ($totalAnswerCount > 0 && $level < 3)
        <div class="comment-main-line" style="{{ $commenMainLineStyle }}"></div>
      @endif
      @if ($level >= 3 && $totalAnswerCount > 0)
        <div class="comment-main-line" style="{{ $commenMainLineStyle }}"></div>

      @endif

      @if ($commentAnswer->parentComment1()->isLastAnswer())
        @if ($level == 0 && $islastAnswer)
          <div class="comment-white-line"></div>
        @endif
        @if ($level > 0 && $parents[0]->isLastAnswer())


          @if ($level == 1)
            <div class="comment-white-line" style="left: -70px"></div>
          @endif
          @if ($level == 2)
            <div class="comment-white-line" style="left: -95px"></div>
          @endif
          @if ($level > 2)
            <div class="comment-white-line" style="left: -120px"></div>
          @endif
        @endif
      @endif

      @if ($level == 3 && !$islastAnswer)
        <div class="comment-parent-main-line" style="left: -15px; height: calc(100% + 40px)">

        </div>
      @endif

      @if ($level > 3 && !$parents[3]->isLastAnswer())
        <div class="comment-parent-main-line" style="left: -15px; height: calc(100% + 40px)">

        </div>

      @endif

      @if ($level > 0)

        @if (!$parents[0]->isLastAnswer() || (sizeof($parents) == 1 && !$islastAnswer) || (sizeof($parents) > 1 && !$parents[1]->isLastAnswer()))

          <div class="comment-parent-main-line" style="{{ $commentParentMainLineStyle }}">

          </div>
        @else

        @endif



      @endif

      @if ($level > 1)
        @if (!$parents[1]->isLastAnswer())
          @if ($level == 2 && !$islastAnswer)
            <div class="comment-parent-main-line" style="left: -15px">

            </div>
          @endif


        @endif

      @endif
      @if ($level == 2 && !$islastAnswer)
        <div class="comment-parent-main-line " style="left: -15px">

        </div>

      @endif

      @if ($level >= 3 && !$commentAnswer->parent()->answerLevel() > 3)
        <div class="comment-parent-main-line " style="left: -15px">
          AAAAA
        </div>

      @endif

      @if ($level > 2 && !$parents[2]->isLastAnswer())
        <div class="comment-parent-main-line " style="left: -40px">

        </div>

      @endif

      @if ($level > 2)
        @if (!$parents[2]->isLastAnswer())
          <div class="comment-parent-main-line" style="left: -15px">

          </div>
        @endif

      @endif

      @if ($level < 4)
        @if ($level == 0)
          <div class="comment-sub-line-extension" style="top: -10px"></div>
        @endif
        @if ($level == 1)
          <div class="comment-sub-line-extension" style="top: -24px; left: -28px"></div>
        @endif
        <div class="comment-sub-line" style="{{ $commentSubLineStyle }}"></div>
      @endif
    @endif

    @if ($isCommenAnswer)
      <div class="position-absolute">
        <?php Helper::profilePicture('', $pictureSize . 'px', $commentAnswer->user, 'pointer-on-hover', ''); ?>
      </div>
      <div class="" style="margin-left: {{ $marginToPicture }}px !important">

        <div class="py-2 pe-2 ps-2 ps-sm-3" style="background-color: #f2f2f2; border-radius: 5px">
          <div class="d-flex justify-content-between ">
            <div style="width: calc(100% - 100px)">
              <div class="d-flex justify-content-between">
                <div class="d-inline-block HideOverflowText"
                  onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
                  style="font-weight: 600; font-size: 13px">
                  <span
                    class="underline-on-hover">{{ $commentAnswer->user->firstname . ' ' . $commentAnswer->user->name }}</span>
                </div>
              </div>

              <div class="mb-1 pointer-on-hover HideOverflowText"
                onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
                style="font-size: 12px !important; color: #7F7F7F"><span
                  class="pointer-on-hover">{{ $commentAnswer->user->current_position }}{{ $commentAnswer->user->currentEmployer(['']) }}</span>
              </div>
            </div>





            <div class="PostTimeFont d-flex justify-content-end" style="width:100px !important">
              <div>
                <div class="d-inline-block" style="font-size: 12px; font-weight: 400; color: #7F7F7F !important">
                  {{ $commentAnswer->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
                </div>
                <div class="d-flex justify-content-end">
                  <button class="btn-clear p-0" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" max-width="50px" height="23" fill="currentColor"
                      class="bi bi-three-dots" viewBox="0 0 16 16" style="color: rgba(168, 168, 168, 1)">
                      <path
                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                    </svg>
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <div
                        onclick="openReportModal('{{ $commentAnswer->user->fullName() }}', '{{ $commentAnswer->user->username }}', 'comment', '{{ $commentAnswer->uuid }}', '{{ $commentAnswer->post_id }}')"
                        class="dropdown-item pointer-on-hover text-center">
                        Kommentar melden</div>
                    </li>
                  </ul>
                </div>
              </div>

              {{-- shortRelativeDiffForHumans() --}}

            </div>


          </div>
          <div class="PostBodyTextFont"
            style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top;">{{ $commentAnswer->text }}</div>
        </div>
        <div class="d-flex justify-content-start mt-1 mb-2">
          <div class="d-none PostLikeFont ps-2 ps-sm-3 pe-3"><img class="align-self-center mb-1 pe-1" onclick="" id=""
              src="{{ asset('images/Like.svg') }}" alt=""> 5</div>
          <div class=" PostLikeFont ps-2 pe-3"><img class="align-self-center mb-1" onclick="" id=""
              src="{{ asset('images/Reply.svg') }}" alt=""><span class="ms-1"
              id="comment_answer_answer_count{{ $commentAnswer->uuid }}">{{ $totalAnswerCount }}</span>
          </div>
          <div class="CommentVerticalLine" style="color: white">.</div>
          <div data-bs-toggle="collapse" data-bs-target="#comment_answer_collapse{{ $commentAnswer->uuid }}"
            class="ps-3 PostLikeFont underline-on-hover align-self-center" style="font-size: 14px !important">
            Antworten</div>
        </div>
        <div class="collapse" id="comment_answer_collapse{{ $commentAnswer->uuid }}">
          <div class="col-12 d-flex position-relative pe-1">
            <div class="position-absolute top-0 start-0">
              <?php Helper::profilePicture('', '32px', auth()->user(), 'pointer-on-hover', ''); ?>
            </div>
            <div class="CommentMarginLeftRight2"><textarea name=""
                id="comment_answer_answer_text{{ $commentAnswer->uuid }}" cols="30" oninput="auto_grow(this, 32)"
                class="PostBorderComment d-inline-block px-3"
                style="padding-top: 7px;padding-bottom: 5px;width:100%; height: 32px !important; overflow:hidden; -webkit-appearance: none; border-radius: 30px; font-size: 12px;"
                placeholder="Schreibe einen Kommentar..."></textarea>
            </div>
          </div>
          <div class="w-100 pe-1 d-flex justify-content-end">
            <button onclick="answerComment('{{ $commentAnswer->uuid }}', '{{ $type }}')"
              id="comment_answer_answers_count{{ $commentAnswer->uuid }}"
              style="width:109px;  padding-left: 0px !important; padding-right: 0px !important"
              class="float-end btn btn-warning btn-sm mb-1 mt-1" onclick="">Kommentieren</button>
          </div>
        </div>
      </div>
    @else
      <div class="position-absolute">
        <?php Helper::profilePicture('', $pictureSize . 'px', $commentAnswer->user, 'pointer-on-hover', ''); ?>
      </div>
      <div class="" style="margin-left: {{ $marginToPicture }}px !important">
        <div class="comment-question-border">
          <div class="py-2 pe-2 ps-2 ps-sm-3 @if ($isExpertForQuestion) expert-bg @else no-expert-bg @endif no-bottom-br" style="border-radius: 5px">
            <div class="d-flex justify-content-between ">
              <div style="width: calc(100% - 100px)">
                <div class="d-flex justify-content-between">
                  <div class="d-inline-block HideOverflowText"
                    onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
                    style="font-weight: 600; font-size: 13px">
                    <span
                      class="underline-on-hover">{{ $commentAnswer->user->firstname . ' ' . $commentAnswer->user->name }}</span>
                  </div>
                </div>
  
                <div class="mb-1 pointer-on-hover HideOverflowText"
                  onclick="loadUserProfileCard('{{ $commentAnswer->user->username }}')"
                  style="font-size: 12px !important; color: #7F7F7F"><span
                    class="pointer-on-hover">{{ $commentAnswer->user->current_position }}{{ $commentAnswer->user->currentEmployer(['']) }}</span>
                </div>
              </div>
  
  
  
  
  
              <div class="PostTimeFont d-flex justify-content-end" style="width:100px !important">
                <div>
                  <div class="d-inline-block" style="font-size: 12px; font-weight: 400; color: #7F7F7F !important">
                    {{ $commentAnswer->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
                  </div>
                  <div class="d-flex justify-content-end">
                    <button class="btn-clear p-0" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" max-width="50px" height="23" fill="currentColor"
                        class="bi bi-three-dots" viewBox="0 0 16 16" style="color: rgba(168, 168, 168, 1)">
                        <path
                          d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                      </svg>
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <div
                          onclick="openReportModal('{{ $commentAnswer->user->fullName() }}', '{{ $commentAnswer->user->username }}', 'comment', '{{ $commentAnswer->uuid }}', '{{ $commentAnswer->post_id }}')"
                          class="dropdown-item pointer-on-hover text-center">
                          Kommentar melden</div>
                      </li>
                    </ul>
                  </div>
                </div>
  
                {{-- shortRelativeDiffForHumans() --}}
  
              </div>
  
  
            </div>
          </div>
          <div class="py-2 pe-2 ps-2 ps-sm-3">
            <div class=" PostBodyTextFont"
              style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top;">{{ $commentAnswer->text }}</div>
          </div>
        </div>
        <div class="d-flex justify-content-start mt-1 mb-2">
          <div class="d-none PostLikeFont ps-2 ps-sm-3 pe-3"><img class="align-self-center mb-1 pe-1" onclick="" id=""
              src="{{ asset('images/Like.svg') }}" alt=""> 5</div>
          <div class=" PostLikeFont ps-2 pe-3"><img class="align-self-center mb-1" onclick="" id=""
              src="{{ asset('images/Reply.svg') }}" alt=""><span class="ms-1"
              id="comment_answer_answer_count{{ $commentAnswer->uuid }}">{{ $totalAnswerCount }}</span>
          </div>
          <div class="CommentVerticalLine" style="color: white">.</div>
          <div data-bs-toggle="collapse" data-bs-target="#comment_answer_collapse{{ $commentAnswer->uuid }}"
            class="ps-3 PostLikeFont underline-on-hover align-self-center" style="font-size: 14px !important">
            Antworten</div>
        </div>
        <div class="collapse" id="comment_answer_collapse{{ $commentAnswer->uuid }}">
          <div class="col-12 d-flex position-relative pe-1">
            <div class="position-absolute top-0 start-0">
              <?php Helper::profilePicture('', '32px', auth()->user(), 'pointer-on-hover', ''); ?>
            </div>
            <div class="CommentMarginLeftRight2"><textarea name=""
                id="comment_answer_answer_text{{ $commentAnswer->uuid }}" cols="30" oninput="auto_grow(this, 32)"
                class="PostBorderComment d-inline-block px-3"
                style="padding-top: 7px;padding-bottom: 5px;width:100%; height: 32px !important; overflow:hidden; -webkit-appearance: none; border-radius: 30px; font-size: 12px;"
                placeholder="Schreibe einen Kommentar..."></textarea>
            </div>
          </div>
          <div class="w-100 pe-1 d-flex justify-content-end">
            <button onclick="answerComment('{{ $commentAnswer->uuid }}', '{{ $type }}')"
              id="comment_answer_answers_count{{ $commentAnswer->uuid }}"
              style="width:109px;  padding-left: 0px !important; padding-right: 0px !important"
              class="float-end btn btn-warning btn-sm mb-1 mt-1" onclick="">Kommentieren</button>
          </div>
        </div>
      </div>

    @endif

  </div>
</div>



<div class="d-none" id="add_comment_answer_skeleton{{ $commentAnswer->uuid }}">
  <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
    :marginToPicture="$marginToPictureSkeleton" />
</div>


<div class="" id="answers_to_comment_answer{{ $commentAnswer->uuid }}">
  <span class="p-2 d-none" id="answers_to_comment_answer_counter{{ $commentAnswer->uuid }}">0</span>
  <div class="" id="answers_to_comment_answer_container{{ $commentAnswer->uuid }}">
  </div>
  <div class="d-none" id="answers_to_comment_answers_skeletons{{ $commentAnswer->uuid }}">
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
    <x-comment_answer_skeleton :additionalMargin="$additionalMarginSkeleton" :pictureSize="$pictureSizeSkeleton"
      :marginToPicture="$marginToPictureSkeleton" />
  </div>

  @if ($commentAnswer->answers()->count() > 0)
    <div
      onclick="loadMoreComments('{{ $commentAnswer->uuid }}', $('#answers_to_comment_answer_counter'+'{{ $commentAnswer->uuid }}').html(), 'answerToAnswer')"
      id="load_more_answers_to_comment_answer_btn{{ $commentAnswer->uuid }}" style="font-size: 10px"
      class="mb-2 text-center pointer-on-hover ShowMoreFont p-3">Mehr Antworten anzeigen</div>

  @endif
</div>
