<style>
  .outer {
    height: 20px;
    overflow: hidden;
  }

  .readmore {
    height: auto !important;
  }

</style>

<?php 
$experts = $question->experts();
?>


<div class="PostMrMl">
  <div class="FeedUserPostShaddow bg-white" style="margin-top:19px">
    <article class="quest-card card ">
      <!-- Question Section -->
      <section class="quest-section" style="padding: 0px">
        <div class="pt-2 pb-2 pt-xl-2 px-xl-3 px-3 px-xl-0 ">

          <div class="d-lg-none">
            <div class="d-flex justify-content-between PostTimeFont">
              <div>
                <span style="font-size: 12px">
                  {{ $question->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}</span>
              </div>
              <div>
                <button class="btn-clear p-0" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" max-width="50px" height="23" fill="currentColor"
                    class="bi bi-three-dots" viewBox="0 2 16 16" style="color: rgba(168, 168, 168, 1)">
                    <path
                      d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                  </svg>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <div
                      onclick="openReportModal('{{ $question->user->fullName() }}', '{{ $question->user->username }}', 'question', '{{ $question->id }}')"
                      class="dropdown-item pointer-on-hover text-center">Beitrag melden</div>
                  </li>
                </ul>
              </div>
            </div>
            <div> <span class="quest-subtitle">
                <!-- Categories -->
                <span role="svg">
                  <img src="{{ asset('images/icon/Rectangle.svg') }}" alt="icon">
                </span>


                @foreach ($question_category as $data)
                  <a>{{ $data->name() }}</a>
                @endforeach

              </span></div>
          </div>
          <div class="d-none d-lg-block">
            <div class="d-flex justify-content-between">
              <div> <span class="quest-subtitle">
                  <!-- Categories -->
                  <span role="svg">
                    <img src="{{ asset('images/icon/Rectangle.svg') }}" alt="icon">
                  </span>
                  @foreach ($question_category as $data)
                    <a >{{ $data->name() }}</a>
                    @if (!$loop->last),
                    @endif
                  @endforeach

                </span></div>
              <div class="">
                <div class="PostTimeFont d-flex justify-content-end" style="width:100px">
                  <div>
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
                            onclick="openReportModal('{{ $question->user->fullName() }}', '{{ $question->user->username }}', 'question', '{{ $question->id }}')"
                            class="dropdown-item pointer-on-hover text-center">Beitrag melden</div>
                        </li>
                      </ul>
                    </div>

                    <span style="font-size: 12px">
                      {{ $question->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}</span>


                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Question Titile -->
          <h6 class="quest-title mt-2">
            {{ $question->title }}
          </h6>

          <!-- Question Content -->
          <div class="p-0 m-0">

            <div class="pb-2 PostBodyTextFont" style="color: #636466 !important;"
              id="portfolio_{{ $question->id }}">{{ substr($question->description, 0, 150) }}<span
                class="me-2" id="dots_{{ $question->id }}">@if (strlen($question->description) >= 150)...@endif</span>@if (strlen($question->description) >= 150)<div class=" d-inline-block mt-1 underline-on-hover pointer-on-hover text-right" style="text-decoration:underline !important; font-size: 12px; width: 100px" id="show_more_btn_{{ $question->id }}" onclick="showMoreText('{{ $question->id }}')">Mehr anzeigen</div>@endif<span
                  id="rest_{{ $question->id }}"
                  class="d-none">{{ substr($question->description, 150) }}</span></div>



          </div>
        </div>

        <!-- Actions Bar  -->
        <div class="quest-actions card-footer px-4 px-sm-3 pb-1 pt-0 font-size-18 font-weight-400 line-height-21">
          <!-- Views -->
          <div role="button" class="me-5 ">
            <span role="svg">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#7F7F7F" class="bi bi-eye mb-1"
                viewBox="0 0 16 16">
                <path
                  d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
              </svg>
            </span>
            <span class="text-hover-decoration-underline">{{ $total_views }}</span>
          </div>
          <!-- Replaies -->
          <div onclick="loadQuestionComment({{ $question->id }})" data-bs-toggle="collapse"
            data-bs-target="#collapsees_{{ $question->id }}" aria-expanded="false"
            aria-controls="collapse_{{ $question->id }}" role="button" class="me-5">
            <span role="svg" class="pe-2">
              <svg class="replay-icon mb-1" width="28" height="22" viewBox="0 0 28 22" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M18.7997 6.08203L26 13.3721L18.7997 20.1619" stroke="#7F7F7F" stroke-width="2.2"
                  stroke-linecap="round" stroke-linejoin="round" />
                <path d="M24.2456 13.1781L10.7473 13.1441C3.82294 13.0786 2.17939 9.13614 5.74181 2.0111"
                  stroke="#7F7F7F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            <span data-total-comments-{{ $question->id }}="{{ $total_comments }}"
              class="text-hover-decoration-underline total-comments-{{ $question->id }}">{{ $total_comments }}</span>
          </div>
          <!-- Experts Views -->
          
            <div role="button"
              class="@if (!$experts->count() > 0) invisible @endif mb-1 d-flex ms-0 ms-sm-auto align-items-center font-size-14 font-weight-500 line-height-16">
              <span role="svg" class="pe-1">
                <img src="{{ asset('images/icon/ExpertIcon.svg') }}" style="height: 28px; width: 25px" alt="icon" />
              </span>
              <span class="text-hover-decoration-underline">
                <span class="d-none d-sm-block">
                  Von {{ $experts->count() }} Expert*innen beantwortet
                </span>
                <span class="d-sm-none font-size-18 font-weight-400 line-height-21">{{ $experts->count() }}</span>
              </span>
            </div>
        
        </div>
      </section>
      <!-- Comments Scetion -->
      <section class="collapse quest-answers container-fluid p-2" id="collapsees_{{ $question->id }}">
        <!-- Add New Answer Form -->

        @if ($question->canBeAnsweredByEveryone() || auth()->user()->isExpertForQuestion($question_category))

        <div class="col-12 mt-3 d-flex">
          <div class="d-inline-block">
            <?php Helper::profilePicture('', '40px', auth()->user(), 'me-2 pointer-on-hover', ''); ?>
          </div>


          <textarea name="" id="question_comment_{{ $question->id }}" cols="30" oninput="auto_grow(this, 37)"
            class="PostBorderComment d-inline-block py-2 px-3"
            style="width: calc(100% - 50px); height: 37px !important; overflow:hidden; -webkit-appearance: none; border-radius: 30px; font-size: 14px;"
            placeholder="Schreibe einen Kommentar..."></textarea>
        </div>
        <div role="form" class="add-answer">


          <div class="d-flex mt-1 align-items-center">
            {{-- <div class="dropdown">
              Sortieren nach:
              <a href="#" role="button" class="sortMeuneLink" data-bs-toggle="dropdown" aria-expanded="false">
                <b>Relevanteste</b> <i class="dropdown-toggle"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="sortMeuneLink">
                <li>
                  <a class="dropdown-item" href="#">Relevanteste</a>
                </li>
                <li><a class="dropdown-item" href="#">opt1</a></li>
                <li><a class="dropdown-item" href="#">opt2</a></li>
              </ul>
            </div> --}}

            <!-- Submit Button -->
            <button onclick="addQuestionComment({{ $question->id }});"
              class="btn btn-answer ms-auto">Kommentieren</button>
          </div>
        </div>

        @endif
        <!-- Amswers Container -->
        <div class="answers-container mt-3">
          <!-- Question answer -->
          <div class="comment-list-{{ $question->id }}" id="question_comments_{{ $question->id }}"></div>
          <!-- End Question answer -->
          @if (App\Models\QuestionComment::where('question_id', $question->id)->count() >0)
          <a role="button" class="text-center load-more mb-2 mt-1 font-weight-700 load-more-{{ $question->id }}"
            onclick="loadMoreComment({{ $question->id }})"
            data-total-comment="{{ App\Models\QuestionComment::where('question_id', $question->id)->count() }}">
            Mehr Antworten anzeigen</a>
          @endif

        </div>
      </section>
    </article>


  </div>
</div>
