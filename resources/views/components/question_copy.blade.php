<?php
$padding = 'PostMrMl';
if (isset($pa)) {
    $padding = '';
} else {
}

?>

<style>
    .btn_border {
        border: 1px solid #BCBBBB;
    }

    .vl {
        border-left: 2px solid #7F7F7F;
        height: 20px;

    }

</style>



<div class="{{ $padding }}" id="post-scroll-25">
    <div class="FeedUserPostShaddow bg-white" style="margin-top: 19px;">
        <div class="row">
            
            <div class="col-md-8">
                <div class="d-flex bd-highlight ">
                    <div class="p-2 w-100 bd-highlight"><img onclick="addPostLike('25')" id="remove_like_img25"
                            src="{{ asset('images/tag-icon.svg') }}" class="align-top d-inline-block pointer-on-hover"
                            style="height: 22px;" alt="" />
                        @foreach ($question_category as $data)
                            {{ $data->name }}@if (!$loop->last),@endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-end flex-column bd-highlight">
                    <div class="p-2 bd-highlight"><img id="remove_like_img25"
                            src="{{ asset('images/group-icon.svg') }}"
                            class="align-top d-inline-block pointer-on-hover" /> </div>
                    <div class=" bd-highlight">{{ \Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</div>
                </div>
            </div>


        </div>

        <div class="pt-2 pb-2 pt-xl-3">


            <div class="px-xl-3">

                <div class="px-2 px-md-3 px-lg-2 px-xl-0 d-flex" style="">

                    <!-- Profilbild + Name + Position + AG + Post-time -->
                    <div class="pointer-on-hover">
                        <div class="d-flex justify-content-between">
                            <div class="d-inline-block">
                                <h5> {{ $question->title }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <span style="padding-left: 15px; padding-right:10px"> {{ $question->description }}</span>
            </div>


            <div class="mb-3"></div>

            <!-- Likes + Comments -->
            <div class="mt-2 mb-0 mb-lg-1 px-0 px-sm-2 px-md-3 px-lg-2 px-xl-3">
                <div class="row">
                    <div class="col-4 col-md-2">
                        <img onclick="addPostLike('25')" id="remove_like_img25"
                            src="{{ asset('images/eye-icon.svg') }}" class="align-top d-inline-block pointer-on-hover"
                            style="height: 22px;" alt="" />

                        <div id="like_count25" onclick="openReactionModal('25');"
                            class="PostLikeFont d-inline-block ps-2 unselectable">{{ $total_views }}</div>
                    </div>

                    <div class="col-4 col-md-2">
                        <div data-bs-toggle="collapse" data-bs-target="#collapsees_{{ $question->id }}"
                            aria-expanded="false" aria-controls="collapse25" class="unselectable">
                            <img src="{{ asset('images/reply-comment-large.svg') }}" style="height: 22px;"
                                class="unselectable pointer-on-hover" alt=""
                                onclick="loadQuestionComment({{ $question->id }})" />
                            <div data-total-comments-{{ $question->id }}="{{ $total_comments }}"
                                class="ps-2 PostLikeFont unselectable postbuttons d-inline-block total-comments-{{ $question->id }}">
                                {{ $total_comments }}
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-8">
                        <div class="d-flex flex-row-reverse">
                           
                                @if(!empty($total_expert_answered))
                            
                            <div class="p-2"><span class="d-none d-md-inline-block">Von</span>
                                {{ $total_expert_answered }} <span class="d-none d-md-inline-block">Experten
                                    beantwortet</span> </div>
                            <div class="p-2"><img src="{{ asset('images/expert.svg') }}"
                                    style="height: 22px;" class="" alt="" /></div>
                                   
                              @endif
                                    
                        </div>
                    </div>
                </div>

                <!-- Write a comment dropdown -->
                <div class="         collapse px-2 px-md-3 px-lg-2 px-xl-3 mt-0 mt-md-2"
                    id="collapsees_{{ $question->id }}">
                    <div class="row">
                        <div class="col-12 mt-3 d-flex">
                            <div class="d-inline-block">
                                <div onclick="loadUserProfileCard('md_rakib_mostofa')" id=""
                                    class="pointer-on-hover object-fit d-inline-block align-top br-50 me-2 pointer-on-hover rotate-origin rotate0"
                                    style="background-size: 100%; background-position-x: 0px; background-position-y: 0px; background-image: url(/images/profile_picture_default/default.png); height: 40px !important; width: 40px !important;">
                                </div>
                            </div>

                            <textarea name="" id="question_comment_{{ $question->id }}" cols="30"
                                oninput="auto_grow(this, 10)" class="PostBorderComment d-inline-block py-2 px-3"
                                style="width: calc(100% - 50px); height: 40px !important; overflow: hidden; -webkit-appearance: none; border-radius: 30px; font-size: 14px;"
                                placeholder="Schreibe einen Kommentar..."> </textarea>
                        </div>
                        <div class="row">
                            <div class="col-8 mt-1 align-self-center">
                                <span class="PostStelleAGFont d-none">Sortieren nach: </span>
                                <select class="d-none pointer-on-hover CommentInvisibleBtn PostStelleAGFont2">
                                    <option value="1">Relevanteste</option>
                                    <option value="2">Neuste</option>
                                    <option value="3">Älteste</option>
                                </select>
                            </div>

                            <div class="col-4 mt-2">
                                <button id="comment_btn25"
                                    class="d-inline-block float-end btn btn-warning btn-sm mb-1 me-1"
                                    onclick="addQuestionComment({{ $question->id }});">Antworten</button>
                            </div>
                        </div>
                        <br />

                        <div class="comment-list-{{ $question->id }}" id="question_comments_{{ $question->id }}">
                        </div>
                        
                        {{-- <x-question_comment /> --}} 
                        <button class="btn btn-secondary btn-sm load-more-{{ $question->id }}"
                            onclick="loadMoreComment({{ $question->id }})"
                            data-total-comment="{{ App\Models\QuestionComment::where('question_id', $question->id)->count() }}">Load
                            more.. </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>