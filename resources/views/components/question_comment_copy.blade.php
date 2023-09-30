<div class="card comment-box-{{ $question_comment->question_id }}">
     <div class="card-header" style="background-color: #E2F3FF">
         <div class="row">
             <div class="d-flex justify-content-start">
                 <div><?php Helper::profilePicture('', '32px', $question_comment->user, 'pointer-on-hover', ''); ?></div>
                 <div class="ms-3 d-flex justify-content-between w-100">
                     <div>
                         <div style="font-size:13px">
                             {{ $question_comment->user->firstname . ' ' . $question_comment->user->name }}</div>
                         <div class="HideOverflowText" style="font-size:11px; max-width: 200px">
                             {{ $question_comment->user->current_position }}
                             @Examplea</div>
                     </div>

                     <div style="font-size:11px">{{ $question_comment->created_at->diffForHumans() }}</div>
                 </div>
             </div>


         </div>
     </div>
     <div class="card-body">
         <p class="card-text">

             {{ $question_comment->comment }}

         </p>
     </div>
 </div>

 <div class="mt-2 mb-0 mb-lg-1 px-0 px-sm-2 px-md-3 px-lg-2 px-xl-3">
     <div class="row">
         <div class="col-4 col-md-2">
             @if ($user_like_check == 0)
                 <img onclick="addCommentLike({{ $question_comment->id }})"
                     id="comment_like_{{ $question_comment->id }}" src="{{ asset('images/helpful-icon.svg') }}"
                     class="pointer-on-hover" alt="" />
             @else
                 <img onclick="removeCommentLike({{ $question_comment->id }})"
                     id="comment_like_{{ $question_comment->id }}" src="{{ asset('images/active-helpful-icon.svg') }}"
                     class="pointer-on-hover" alt="" />
             @endif
             <div id="like_count_{{ $question_comment->id }}" onclick="" style="padding-top: 5px"
                 class="PostLikeFont d-inline-block  unselectable">{{ $total_comment_likes }}</div>
         </div>

         <div class="col-4 col-md-2">
             <div data-bs-toggle="collapse" data-bs-target="#collapsees_reply_{{ $question_comment->id }}"
                 aria-expanded="false" aria-controls="collapse_reply" class="unselectable pointer-on-hover">
                 <img onclick="loadQuestionCommentReply({{ $question_comment->id }})"
                     src="{{ asset('images/reply-comment-small.svg') }}" class="" alt="" />
                 <div data-total-comment-replies-{{ $question_comment->id }}="{{ $total_comment_replies }}"
                     class="ps-2 PostLikeFont unselectable postbuttons d-inline-block total-comments-reply-{{ $question_comment->id }}">
                     {{ $total_comment_replies }}
                 </div>

             </div>
         </div>
         <div class="col-4 col-md-8" style="padding-top: 6px">
             <span class="vl">&nbsp;&nbsp; Antworten</span>
         </div>
     </div>

     {{-- reply comment --}}

     <div id="collapsees_reply_{{ $question_comment->id }}" class="collapse">
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-10 mt-3 d-flex">
                 <div class="d-inline-block">
                     <div onclick="loadUserProfileCard('md_rakib_mostofa')" id=""
                         class="pointer-on-hover object-fit d-inline-block align-top br-50 me-2 pointer-on-hover rotate-origin rotate0"
                         style="background-size: 100%; background-position-x: 0px; background-position-y: 0px; background-image: url(/images/profile_picture_default/default.png); height: 40px !important; width: 40px !important;">
                     </div>
                 </div>
                 <textarea name="" id="comment_reply_textarea_{{ $question_comment->id }}" cols="30"
                     oninput="auto_grow(this, 10)" class="PostBorderComment d-inline-block py-2 px-3"
                     style="width: calc(100% - 50px); height: 40px !important; overflow: hidden; -webkit-appearance: none; border-radius: 30px; font-size: 14px;"
                     placeholder="Schreibe einen Kommentar..."></textarea>
                 <button id="comment_btn25" class="d-inline-block float-end btn btn-warning btn-xm mb-1 me-1"
                     onclick="addQuestionCommentReply({{ $question_comment->id }});">Antworten</button>


             </div>
         </div>
         <br>
         <div class="comment-reply-list-{{ $question_comment->id }}"
             id="question_comments_reply_{{ $question_comment->id }}">

         </div>
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-10 mt-3 d-flex">
                 <button class="btn btn-secondary btn-sm load-more-reply-{{ $question_comment->id }}"
                     onclick="loadMoreCommentReply({{ $question_comment->id }})"
                     data-total-comment="{{ App\Models\QuestionCommentReply::where('question_comment_id', $question_comment->id)->count() }}">Load
                     more.. </button>
             </div>
         </div>


     </div>
     {{-- reply comment end --}}
 </div>
