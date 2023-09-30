 <!-- Answer comment is copy of Answer card but like button changed-->

 <?php
 $isExpertForQuestion = $question_comment_reply->user->isExpertForQuestion($questionCategories);
 
 ?>
 <div class="answer-card    comment-reply-box-{{ $question_comment_reply->question_comment_id }}">
   <div>
     <div class="answer-header">
       <div class="py-1 @if ($isExpertForQuestion) expert-bg @endif">
         <span role="figure" class="   answer-avatar px-2">
           <!-- user Picture -->
           <div><?php Helper::profilePicture('', '32px', $question_comment_reply->user, 'pointer-on-hover', 'margin-top: 3px'); ?></div>

           <div class="ms-2 d-flex justify-content-between w-100">
             <div style="width: calc(100% - 100px)">
               <div class="d-flex justify-content-between">
                 <div class="d-inline-block HideOverflowText"
                   onclick="loadUserProfileCard('{{ $question_comment_reply->user->username }}')"
                   style="font-weight: 600; font-size: 13px">
                   <span
                     class="underline-on-hover">{{ $question_comment_reply->user->firstname . ' ' . $question_comment_reply->user->name }}</span>
                 </div>

               </div>

               <div class="mb-1 pointer-on-hover HideOverflowText"
                 onclick="loadUserProfileCard('{{ $question_comment_reply->user->username }}')"
                 style="font-size: 12px !important; color: #7F7F7F"><span
                   class="pointer-on-hover">{{ $question_comment_reply->user->current_position }}{{ $question_comment_reply->user->currentEmployer(['']) }}</span>
               </div>
             </div>




             <div class="PostTimeFont d-flex justify-content-end" style="width:100px !important">
               <div>
                 <div class="d-inline-block" style="font-size: 12px; font-weight: 400; color: #7F7F7F !important">
                   {{ $question_comment_reply->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
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
                         onclick="openReportModal('{{ $question_comment_reply->user->fullName() }}', '{{ $question_comment_reply->user->username }}', 'comment', '{{ $question_comment_reply->uuid }}', '{{ $question_comment_reply->post_id }}')"
                         class="dropdown-item pointer-on-hover text-center">
                         Kommentar melden</div>
                     </li>
                   </ul>
                 </div>
               </div>

               {{-- shortRelativeDiffForHumans() --}}

             </div>


           </div>
         </span>
       </div>
     </div>
     <div class="answer-body p-2">
       <!-- content of question -->
       <p class="my-1" role="article" aria-label="Content of Answer">
         {{ $question_comment_reply->reply_comment }}
       </p>

       <!-- load more button -->

       {{-- <a role="button" class="load-more">Mehr anzeigen</a> --}}
     </div>
   </div>
   <!-- Answer Actions Bard -->

   <div class="answer-actions row ps-1 pb-2">
     {{-- <a role="button" class="icon col-auto">
                 <span role="svg">
                     <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                         class="heart-icon">
                         <path fill-rule="evenodd" clip-rule="evenodd"
                             d="M5.99524 11.0163C7.39862 12.3984 9.6641 12.3862 11.0523 10.9897L14.333 7.68936C15.7212 6.29283 15.7097 4.03752 14.3063 2.65536C12.9035 1.27378 10.6371 1.2857 9.24893 2.68223L5.96825 5.98256C4.58004 7.37909 4.59243 9.63467 5.99524 11.0163Z"
                             fill="white" />
                         <path fill-rule="evenodd" clip-rule="evenodd"
                             d="M4.84467 12.1732C6.88903 14.1866 10.1912 14.1693 12.214 12.1344L15.4947 8.83404C17.5176 6.79907 17.4999 3.5122 15.4556 1.49878C13.4112 -0.514629 10.1091 -0.497318 8.08622 1.53765L4.8055 4.83798C2.78266 6.87295 2.80029 10.1598 4.84467 12.1732ZM5.99472 11.0163C7.39813 12.3984 9.6636 12.3863 11.0518 10.9897L14.3325 7.6894C15.7207 6.29289 15.7093 4.03756 14.3059 2.6554C12.903 1.27384 10.6366 1.28575 9.24843 2.68227L5.96773 5.98262C4.57951 7.37913 4.5919 9.63471 5.99472 11.0163Z"
                             fill="#7F7F7F" />
                         <path fill-rule="evenodd" clip-rule="evenodd"
                             d="M11.1918 10.8492C12.6241 9.48483 12.417 7.27514 11.009 5.88604L7.75404 2.67578C6.34608 1.2872 4.07002 1.29759 2.67497 2.69906C1.27994 4.10102 1.29038 6.3661 2.69836 7.75519L5.95282 10.9649C8.46579 13.401 8.48963 13.3659 9.5867 12.3624C10.2318 11.7727 10.5094 11.4993 11.1918 10.8492Z"
                             fill="white" />
                         <path fill-rule="evenodd" clip-rule="evenodd"
                             d="M12.3221 12.0263C14.4264 10.0223 14.2282 6.77197 12.1597 4.73181L8.9047 1.52157C6.85555 -0.499306 3.54395 -0.484471 1.51318 1.55519C-0.517082 3.59485 -0.501681 6.89163 1.54747 8.91248L4.80693 12.1277C6.00929 13.2928 6.72597 13.9385 7.22657 14.2361C7.72421 14.5322 8.15083 14.6291 8.53372 14.6345C9.1759 14.6439 9.82201 14.3591 10.6931 13.5623C11.3477 12.9636 11.6298 12.6863 12.3221 12.0263ZM11.1918 10.8508C12.6241 9.48639 12.417 7.2767 11.009 5.8876L7.75398 2.67732C6.346 1.28872 4.06988 1.29911 2.67483 2.70057C1.27977 4.10254 1.2902 6.36761 2.69817 7.75671L5.95268 10.9665C8.4657 13.4026 8.48953 13.3675 9.58661 12.364C10.2317 11.7742 10.5094 11.5008 11.1918 10.8508Z"
                             fill="#7F7F7F" />
                     </svg>
                 </span>

                 25
             </a>

             <a role="button" class="icon col-auto ms-3">
                 <span role="svg" class="pe-2">
                     <svg class="replay-icon" width="25" height="20" viewBox="0 0 28 22" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="M18.7997 6.08203L26 13.3721L18.7997 20.1619" stroke="#7F7F7F" stroke-width="2.2"
                             stroke-linecap="round" stroke-linejoin="round" />
                         <path d="M24.2456 13.1781L10.7473 13.1441C3.82294 13.0786 2.17939 9.13614 5.74181 2.0111"
                             stroke="#7F7F7F" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                 </span>
                 25
             </a>
             <span class="mx-1 mx-sm-2 col-auto">|</span>
             <a role="button" class="icon col-auto font-weight-400">Antworten</a> --}}
   </div>
 </div>
