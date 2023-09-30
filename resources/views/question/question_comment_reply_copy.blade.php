<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10" >

        <div class="card comment-reply-box-{{ $question_comment_reply->question_comment_id }}">
            <div class="card-header" style="background-color: #E2F3FF">
                <div class="row">
                    <div class="d-flex justify-content-start">
                        <div><?php Helper::profilePicture('', '32px', auth()->user(), 'pointer-on-hover', ''); ?></div>
                        <div class="ms-3 d-flex justify-content-between w-100">
                            <div>
                                <div style="font-size:13px"> {{ $question_comment_reply->user->firstname . ' ' . $question_comment_reply->user->name }}</div>
                                <div class="HideOverflowText" style="font-size:11px; max-width: 200px">
                                    {{ $question_comment_reply->user->current_position }}
                                    @Examplea</div>
                            </div>
                            <div style="font-size:11px">vor 2 Std.</div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $question_comment_reply->reply_comment }} </p>
            </div>
        </div>
        <div class="mt-2 mb-0 mb-lg-1 px-0 px-sm-2 px-md-3 px-lg-2 px-xl-3">
            <div class="row">
                <div class="col-4 col-md-2">
                    <img onclick="addPostLike('25')" id="" src="{{ asset('images/helpful-icon.svg') }}"
                        class="align-top d-inline-block pointer-on-hover" alt="" />

                    <div id="like_count25" onclick="" style="padding-top: 5px"
                        class="PostLikeFont d-inline-block  unselectable">122</div>
                </div>

                <div class="col-4 col-md-2">
                    <div class=" ">
                        <img src="{{ asset('images/reply-comment-small.svg') }}" class="" alt="" />
                        <div id="" class="PostLikeFont unselectable postbuttons d-inline-block"
                            style="padding-top: 6px">
                            0
                        </div>

                    </div>
                </div>
                <div class="col-4 col-md-8" style="padding-top: 6px">
                    <span class="vl">&nbsp;&nbsp; Antworten</span>
                </div>
            </div>
        </div>
        
    </div>

</div>