
 <link href="{{ asset('css/notifications.css') }}" rel="stylesheet">

<div class="row">

  <div class="d-none d-xl-block cura-col-2 pe-2">
    <div class="row p-3" style="background: #F6F6F6; border-radius:5px">
      <div class="col-12">
        <div class="text-center NotificationsBoxLeftFontStyle mb-2">Mitteilungen</div>
      </div>
      <div class="col-12">
        <div class="text-center NotificationsBoxLeftFontStyle2">Hier siehst Du alle Aktivitäten von anderen Mitgliedern, die mit dir in Verbindung stehen (Likes, Kommentare, Anfragen, Profilansichten)</div>
      </div>
    </div>
  </div>


  <div class="cura-col-7 py-3" style="background: #F6F6F6; border-radius:5px">

    <div class="col-12 ps-2 ps-md-3 NotificationsBoxMidFontStyle mb-2 mb-sm-3">Neue Mitteilungen</div>
    <div id="new_notificationse">
      <?php 
      $user = auth()->user();  
        
        
      ?>
      {{ $user->getNewNotifications() }}
    </div>



    <div class="col-12 ps-2 ps-md-3 NotificationsBoxMidFontStyle1 mb-2 mb-sm-3 mt-3">Vergangene Mitteilungen</div>
    <div id="old_notifications">
      {{ $user->getOldNotifications() }}
    </div>

  </div>

  <?php $id = "3" ?>
  <x-invite_friends :id="$id" />
</div>
</div>

<script src="{{ asset('js/notifications.js') }}?v={{ time() }}"></script>


    <!--
    <div class="" style=" background: #F6F6F6; border-radius:5px">
      <div class="btn-group w-100">
        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Benachrichtigungen
        </button>


        <ul class="dropdown-menu dropdown-menu-end py-0 scrollable-menu" style="width: 470px">
          <li class="dropdown-header px-2 pb-1 pt-2 text-end SeeAllNotifications bg-white sticky-top"><span class="pointer-on-hover">Siehe alle Mitteilungen<img class="ps-2" src="/images/ArrowRightNotification.svg" alt=""></span></li>






          <div class="row px-0 justify-content-between">
            <div class="py-4 shadow-md pointer-on-hover bg-white mb-0 text-center" style="line-height: 18px; font-weight: 600; font-size: 16px; color: red">
              Hier siehst Du bald Deine neusten Mitteilungen, wie zum Beispiel:
            </div>
          </div>



          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines Netzwerkes.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 10 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
              <div class="row px-1 ">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 15 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 30 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Jemand </span>
                  <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 1 Std.</div>
              </div>
            </div>
          </div>



          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
              <div class="row px-1 ">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines Netzwerkes.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 10 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 15 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Daniel Reifer</span>
                  <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 30 Min.</div>
              </div>
            </div>
          </div>

          <div class="row px-0 justify-content-between">
            <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
              <div class="row px-1">
                <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
                <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                  <span class="NotificationsBoxMidFontStyle2">Jemand </span>
                  <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
                </div>
                <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 1 Std.</div>
              </div>
            </div>
          </div>
      </div>
      </ul>
      </li>
      </ul>
    </div>
-->



{{--  
    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md pointer-on-hover backgroundhover mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines Netzwerkes.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 10 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md pointer-on-hover backgroundhover mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center backgroundhover align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 15 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md pointer-on-hover backgroundhover mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center backgroundhover align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 30 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md pointer-on-hover backgroundhover mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center backgroundhover align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Jemand </span>
            <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 1 Std.</div>
        </div>
      </div>
    </div>
    --}}



{{--  
    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines Netzwerkes.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 10 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
          </div>

          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 15 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
            <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 30 Min.</div>
        </div>
      </div>
    </div>

    <div class="row px-0 px-sm-2 px-md-3 justify-content-between">
      <div class="py-3 _br shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0 mb-sm-2">
        <div class="row px-1 px-sm-2 px-md-3">
          <div class="col-2 col-sm-1 col-lg-2 col-xl-1 text-center align-self-center"><img src="/images/profilepic13.png" alt="" class="ProfilePicTest"></img></div>
          <div class="col-8 col-sm-9 col-lg-8 col-xl-9 ps-1 ps-sm-3 ps-lg-0 ps-xl-4 pe-3 pe-sm-0 pe-md-2 pe-lg-0 align-self-center" style="line-height: 12px">
            <span class="NotificationsBoxMidFontStyle2">Jemand </span>
            <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
          </div>
          <div class="col-2 col-md-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 1 Std.</div>
        </div>
      </div>
    </div>
--}}