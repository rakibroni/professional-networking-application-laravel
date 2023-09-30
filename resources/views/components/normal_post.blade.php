<div class="px-xl-3">

          

  <div class="px-2 px-md-3 px-lg-2 px-xl-0 d-flex" style="height: 48px">
    <div class="position-relative">
      <div class="position-absolute top-0 start-0 pointer-on-hover">

        <div onclick="loadUserProfileCard('{{ $post->user->username }}')">
          <?php Helper::profilePicture('', '48px', $post->user, 'pointer-on-hover', 'margin-top:0px'); ?>
        </div>
      </div>
    </div>
    <!-- Profilbild + Name + Position + AG + Post-time -->
    <div class="align-self-center PostMarginLeftRight pointer-on-hover">
      <div class="d-flex justify-content-between">

        <div class="d-inline-block">
          <div class="PostNameFont underline-on-hover  HideOverflowText" style="color: #23180C !important"
            onclick="loadUserProfileCard('{{ $post->user->username }}')">
            {{ $post->user->fullName() }}
          </div>
          <div class="PostStelleAGFont align-top HideOverflowText2"
            onclick="loadUserProfileCard('{{ $post->user->username }}')">
            <div class="">
              <span>{{ $post->user->current_position . ' ' }}</span><span>{{ $post->user->currentEmployer(['']) }}</span>
            </div>
          </div>
        </div>
        <div class="">
          <div class="PostTimeFont d-flex justify-content-end" style="width:100px">
            <div>
              @if ($post->id == 25)
                Angepinnt
              @else
                {{ $post->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
              @endif
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
                      onclick="openReportModal('{{ $post->user->fullName() }}', '{{ $post->user->username }}', 'post', '{{ $post->id }}')"
                      class="dropdown-item pointer-on-hover text-center">Beitrag melden</div>
                  </li>
                </ul>
              </div>
            </div>

            {{-- shortRelativeDiffForHumans() --}}

          </div>

        </div>

      </div>

    </div>
  </div>



  <!-- Post Body (Text + Bild) -->
  <div class="px-2 px-sm-2 px-md-3 px-lg-2 px-xl-0 pb-2 pt-2 mt-1 PostBodyTextFont"
    id="post_text{{ $post->uuid }}"
    style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box; vertical-align: top;">
    {{ substr($post->body, 0, 150) }}<span class="me-2"
      id="dots_{{ $post->uuid }}">@if (strlen($post->body) >= 150)...@endif</span>@if (strlen($post->body) >= 150)<div class=" d-inline-block mt-1 underline-on-hover pointer-on-hover text-right" style="text-decoration:underline !important; font-size: 12px; width: 100px" id="show_more_btn_{{ $post->uuid }}" onclick="showMoreText('{{ $post->uuid }}')">Mehr anzeigen</div>@endif<span id="rest_{{ $post->uuid }}"
        class="d-none">{{ substr($post->body, 150) }}</span></div>





</div>
<div class="mb-3">
  <?php if ($post->image_0 != '') {
      $image_0 = <<<HTML
      <div
      style="background-image:url($post->image_0)" alt="" style="width: 100%"><img id="img$post->uuid" src="$post->image_0" alt=""
      style="width: 100%">
      </div>
      HTML;
      echo $image_0;
  } ?>
  @if ($post->id == 16)
    <div class="" style="background-imgae:url($post->image_0)" alt="" style="width: 100%">
      <video tabindex="-1" controlsList="nodownload" controls='true' muted playsinline playsinline
        type='video/mp4' style="width: 100%">
        <source src="/images/CW_compressed.mp4">
        <source src="mov_bbb.ogg" type="video/ogg">
        Your browser does not support HTML video.
      </video>

    </div>
  @endif
</div>