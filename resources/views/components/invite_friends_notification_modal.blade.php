<script defer src="{{ asset('js/multiSelect.js') }}?v={{ time() }}"></script>
<link href="{{ asset('css/multiSelect.css') }}?v={{ time() }}" rel="stylesheet">
<div class="modal fade CustomFullScreenModal" id="invite_friends_notification_modal" tabindex="-1"
  aria-labelledby="invite_friends_notification_modal" aria-hidden="true" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title ModalHeaderProfile">Expertenfragen ab sofort verfügbar!
        </div>
        <button type="button" id="close_invite_friends_notification_modal" class="btn-close" onclick="location.reload();"></button>
      </div>
      <style>
        .Invite_Friends_Modal_Font1 {
          font-weight: 500px;
          font-size: 14px;
          color: #636466;
          line-height: 130%;

        }

        .Invite_Friends_Modal_Font2 {
          font-weight: 500px;
          font-size: 14px;
          color: black;
          line-height: 130%;

        }

      </style>
      <div class="modal-body ">
        {{-- <div class="Invite_Friends_Modal_Font1">In sehr kurzer Zeit ist die Curawork Community schon auf über
          300 Mitglieder gewachsen und wir sind sehr froh, dass sich schon so viel vernetzt und
          ausgetauscht wird. <br>
          In den nächsten Tagen/ Wochen möchten wir einige spannende Features hinzufügen, dafür brauchen
          wir aber <span style="font-weight: 600">deine Hilfe:</span><br>
          <p class="mt-2">Du kannst in <span class="text-decoration-underline">nur zwei Klicks</span> andere
            Pflegekräfte
            einladen.</p>
        </div>

        <div class="text-center mt-4 Invite_Friends_Modal_Font2">
          Wenn jeder nur zwei seiner liebsten Kolleg*innen von Curawork erzählt und sie einlädt, <span
            class="fw-bold">hilft uns das <span class="text-decoration-underline">sehr</span>.</span>
        </div>

        <div class="text-center mb-4 mt-3">
          <div class="d-block d-lg-none">
            @if ($isWebView)
              <div onclick="storeActivity('/invite_friends_mobile_app_through_modal');">
                <a class="text-center btn btn-warning bg-cura px-3 py-1" href="@if ($isAndroid)shareapp://sharetext?=https://curawork.de/app @else shareapp://sharetext?=Hey, schau Dir mal https://curawork.de/app an! @endif">
                  Jetzt Kolleg*innen einladen
                </a>
              </div>
            @else
              <div id="share-btn1" onclick="storeActivity('/invite_friends_mobile_app_through_modal');">
                <button class="text-center btn btn-warning bg-cura px-3 py-1"> Jetzt Kolleg*innen
                  einladen</button>
              </div>
            @endif
          </div>
          <div class="d-none d-lg-block">
            <button id="desktop_share_btn" class="text-center btn btn-warning bg-cura px-3 py-1"> Jetzt Kolleg*innen
              einladen</button>
          </div>
        </div>

        <div class="Invite_Friends_Modal_Font1">Nur wenn wir als Community wachsen und größer werden, können wir
          zusammen etwas für die Pflege bewegen.
          <br> Dank, dass ihr dabei seid und uns unterstützt. <br>
          Ohne euch geht es nicht! <p class="mt-3">Euer Team Curawork</p>
        </div> --}}
        
        <div class="row">
          <img class="img-fluid mb-2" src="{{ asset('images/questions_explanation.png') }}" alt="">
          <div class="col-12"></div>
          <div class="col-12">
            Stelle jetzt einem Experten und/oder der Community deine Frage: Wir haben eine neue Funktion entwickelt, die wir jetzt in einer 1. Version veröffentlichen! 
            Du hast jetzt die Möglichkeit auf Curawork Experten Fragen zu verschiedenen Themenbereichen zu stellen. Die Frage wird zu 100% anonym gestellt und niemand kann sehen, dass du diese Frage gestellt hast. Du kannst zwischen verschiedenen Themenbereichen wählen und eine konkrete Frage stellen, die einen lösungsorientierten Ansatz verfolgt. 
            Wir möchten mit dieser neuen Funktion keinen Kummerkasten integrieren, uns geht es darum, hilfreiche, lösungsorientierte Antworten auf pflegespezifische Fragen zu geben. 
          </div>
          <div class="col-12">

          </div>
        </div>
       

      </div>


    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    markModalAsSeen('invite_friends_notification_modal');
  });

  const btn1 = document.getElementById("share-btn1");
  if (btn1) {
    btn1.addEventListener('click', async () => {
      try {
        await navigator.share(shareData)
      } catch (err) {

        //resultPara.textContent = 'Error: ' + err
      }
    });
  }
  $('#close_invite_friends_notification_modal').on('click', function() {
    $('#invite_friends_notification_modal').modal('hide');
  });

  $('#desktop_share_btn').on('click', function() {
    $('#invite_friends_notification_modal').modal('hide');
    $('#referal_modal').modal('show');
    //close modal an open other 
    //markModalAsSeen('invite_friends_notification_modal');
  });
</script>
