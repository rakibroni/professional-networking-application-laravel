 <div id="notifications_grid" class="d-none">
  <div class="row">

    <div class="d-none d-xl-block cura-col-2 pe-2">
      <div id="sticky_side_bar_network" class="sticky-top" style="z-index: 0">
        <div class="row p-3" style="background: #F6F6F6; border-radius:5px">
          <div class="col-12">
            <div class="text-center NotificationsBoxLeftFontStyle mb-2">Mitteilungen</div>
          </div>
          <div class="col-12">
            <div class="text-center NotificationsBoxLeftFontStyle2">Hier siehst Du alle Aktivitäten von anderen
              Mitgliedern, die mit dir in Verbindung stehen (Likes, Kommentare, Anfragen, Profilansichten)</div>
          </div>
        </div>
      </div>
    </div>
    <div class="cura-col-7 py-3" style="background: #F6F6F6; border-radius:5px">

      <div class="col-12 ps-2 ps-md-3 NotificationsBoxMidFontStyle mb-2 mb-sm-3">Neue Mitteilungen</div>
      <div id="new_notifications_skeletons" class="d-none">
        <x-notification_skeleton />
        <x-notification_skeleton />
        <x-notification_skeleton />
        <x-notification_skeleton />
      </div>
      <div id="new_notifications" class="d-none">
        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines
                  Netzwerkes.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 10 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
            <div class="row px-1 ">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 15 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 30 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md NewNotificationBoxStyle pointer-on-hover bg-white mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img style="" src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Jemand </span>
                <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle4">vor 1 Std.</div>
            </div>
          </div>
        </div>




      </div>




      <div class="col-12 ps-2 ps-md-3 NotificationsBoxMidFontStyle1 mb-2 mb-sm-3 mt-3">Vergangene Mitteilungen</div>
      <div id="old_notifications_skeletons" class="d-none">
        <x-notification_skeleton />
        <x-notification_skeleton />
        <x-notification_skeleton />
        <x-notification_skeleton />
      </div>
      <div id="old_notifications" class="d-none">
        {{-- $user->getOldNotifications() --}}
        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
            <div class="row px-1 ">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> hat Deine Anfrage angenommen und ist jetzt Teil Deines
                  Netzwerkes.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 10 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniela Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> hat einen Deiner Beiträge kommentiert.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 15 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Daniel Reifer</span>
                <span class="NotificationsBoxMidFontStyle3"> gefällt ein Beitrag, den Du veröffentlicht hast.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 30 Min.</div>
            </div>
          </div>
        </div>

        <div class="row px-0 px-sm-2 px-md-3  justify-content-between">
          <div class="py-3 shadow-md pointer-on-hover backgroundhover mb-0">
            <div class="row px-1">
              <div class="col-2 text-center align-self-center"><img src="/images/profilepic13.png" alt=""
                  class="ProfilePicTest"></img></div>
              <div class="col-8 ps-1 pe-3 align-self-center" style="line-height: 12px">
                <span class="NotificationsBoxMidFontStyle2">Jemand </span>
                <span class="NotificationsBoxMidFontStyle3"> hat Dein Profil angeschaut.</span>
              </div>
              <div class="col-2 align-self-center text-end pe-1 NotificationsBoxMidFontStyle5">vor 1 Std.</div>
            </div>
          </div>
        </div>
      </div>


      {{-- <?php
$user = auth()->user();
?>
      {{ $user->getNewNotifications() }}
      {{ $user->getOldNotifications() }} --}}
    </div>

    <?php $id = 'notifications';
    $sideBarId = 'side_bar_notiications'; ?>
    <x-invite_friends :id="$id" :sideBarId="$sideBarId" />
  </div>
</div>

<script src="{{ asset('js/notifications.js') }}?v={{ time() }}"></script>
