<script defer src="{{ asset('js/multiSelect.js') }}?v={{ time() }}"></script>
<link href="{{ asset('css/multiSelect.css') }}?v={{ time() }}" rel="stylesheet">
<div class="modal fade CustomFullScreenModal" id="referal_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title ModalHeaderProfile" id="exampleModalLabel">Kolleg*innen einladen
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <style>
        .email-referal-input {
          border: 1px solid #BCBBBB;
          box-sizing: border-box;
          border-radius: 3px;
          padding-left: 15px;
          width: calc(100% - 120px) !important;
        }

        .email-referal-btn {
          position: absolute;
          top: calc(100% - 27px);
          left: calc(100% - 70px);
          transform: translate(-50%, -50%);
          width: 120px !important;
        }

        .example-box-style {
          border-color: #ff9721;
          color: #ff9721;
        }

      </style>
      <div class="modal-body px-0 py-0" >
        <div class="p-2 mb-3" style="font-size: 12px; background-color: #F6F6F6; color: #AAAAAA">
          Hinweis: Gib hier die E-Mail Adresse von deinen Kolleg*innen an, um ihnen im nächsten Schritt eine Einladung
          zu Curawork zu schicken.
        </div>
        <div class="p-2">
          <div class="mb-1" style="color: #FF9121; font-size: 14px; font-weight: 600">
            Email-Adressen deiner Kolleg*innen
          </div>
          <div class="pe-2 w-100">
            <?php
            $uuid = '1';
            $id = 'referal_email' . $uuid;
            $dropdownId = $id . '_dropdown';
            $placeholder = 'Email-Adresse';
            $value = '';
            $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
            $onkeyup = '';
            $cssStylesArray = ['height: 38px', '', ''];
            $cssClassesArray = ['w-100 email-referal-input', '', ''];
            $dropdownContentArray = [];
            ?>
            <x-multi_select_input :id="$id" :dropdownId="$dropdownId" :placeholder="$placeholder" :value="$value"
              :onclick="$onclick" :onkeyup="$onkeyup" :cssStylesArray="$cssStylesArray"
              :cssClassesArray="$cssClassesArray" :dropdownContentArray="$dropdownContentArray" />
          </div>

        </div>
        <div class="" style="width: 120px">
          <div id="addmail" class="email-referal-btn btn btn-warning" onclick="">
            Hinzufügen</div>
        </div>
      </div>
      <div class=" modal-footer p-0 py-2 mt-3" style="height: 60px;">
        <button onclick="$('#referal_modal').modal('hide')" 
          style="width: 100px; color: #FF9121 !important" class="btn btn-outline-warning btn-outline-cura"
          id="">Abbrechen</button>
        <button id="send_invite_mail_btn" style="margin-right: 10px;width: 180px;color: white !important"
          class="btn btn-warning bg-cura">

          <div id="send_invite_mail_btn_spinner" class="d-none spinner-border text-primary cura-spinner" role="status">
            <span class="visually-hidden">Loading...</span>
          </div><span class="" id="send_invite_mail_btn_text">Jetzt Einladen</span>


        </button>
      </div>

    </div>
  </div>
</div>


<script>
  $('#addmail').on('click', function() {
    if ($('#' + '{{ $id }}').val() != '') {
      addToItemsPreview('{{ $id }}', $('#' + '{{ $id }}').val());
      $('#' + '{{ $id }}').val('');
    }

  });

  $('#send_invite_mail_btn').on('click', function() {
    $('#send_invite_mail_btn_spinner').removeClass("d-none");
    $('#send_invite_mail_btn_text').addClass("d-none");
    var fullName = '{{ auth()->user()->fullName() }}';
    var emailArray = getAllSelectedItems('referal_email1');
    ajaxSetup();
    var form = new FormData;
    var functionsOnSuccess = [
      [finishInvite, ['response']]
    ]
    form.append('emailArray', JSON.stringify(emailArray));
    form.append('fullName', fullName);
    ajax('/send_invite_emails', 'POST', functionsOnSuccess, form);         

  });

  function finishInvite(response) {
    $('#referal_email1_preview').html('');
    $('#send_invite_mail_btn_spinner').addClass("d-none");
    $('#send_invite_mail_btn_text').removeClass("d-none");
    $('#referal_modal').modal('hide');
    storeActivity('/feed');
  }
</script>
