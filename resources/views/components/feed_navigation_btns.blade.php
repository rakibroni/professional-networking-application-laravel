<div class=" d-none d-lg-block">
  <div class="row">
    <div class="col-6 p-3">
      <div data-bs-toggle="modal" data-bs-target="#post_modal" class="pointer-on-hover shadow-md post-box p-4"
        id="post-box" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id, 1.02)">
        <div class="d-flex justify-content-start">
          <div>
            <img src="{{ asset('images/newPost.svg') }}" alt="">
          </div>
          <div class="ms-3 w-100">
            <div class="create-post-or-question-header">Was gibt's Neues?
            </div>
            <div class="create-post-or-question-underline"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- frage modal trigger -->
    <div class="col-6 pe-3 pt-3">
      <div data-bs-toggle="modal" data-bs-target="#frage_modal"
        class="pointer-on-hover post-box shadow-md p-4 position-relative" id="open_frage_modal"
        onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id, 1.02)">
        <div class="d-flex justify-content-start">
          <div>
            <img src="{{ asset('images/askQuestion.svg') }}" alt="">
          </div>
          <div class="ms-3 w-100">
            <div class="create-post-or-question-header">Hast du Fragen?
            </div>
            <div class="create-post-or-question-underline"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-none d-flex justify-content-center">
      <div class="btn-group" style="height: 25px !important">
        {{-- <button type="button" class="btn btn-warning btn-sm btn_border">Beides</button> --}}
        <button id="navigate_to_posts" class="btn btn-warning bg-cura py-0 w-115px" style="font-size:13px"
          onclick="changeColorOfFeedNavigation(this.id);loadFeedPage()">Beiträge</button>
        <button id="navigate_to_questions" class=" feed-navigator-btn btn py-0 w-115px " style="font-size:13px"
          onclick="changeColorOfFeedNavigation(this.id); loadQuestionsPage()">Fragen</button>
        <button id="navigate_to_users_questions" class=" feed-navigator-btn btn py-0 w-115px " style="font-size:13px"
          onclick="changeColorOfFeedNavigation(this.id); loadQuestionsCreatedByUser()">Meine Fragen</button>
      </div>
    </div>


  </div>
</div>



