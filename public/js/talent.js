
function saveTalent(uuid) {
  ajaxSetup();
  var form = new FormData;
  form.append('uuid', uuid);
  var functionsOnSuccess = [
    [changeBtnStatus, [uuid, 'Gespeichert', 'save_talent_btn_', 'response']]
  ];
  ajax('/save_talent', 'POST', functionsOnSuccess, form);
}

function inviteTalent(uuid) {
  var form = new FormData;
  form.append('uuid', uuid);
  ajaxSetup();
  var functionsOnSuccess = [
    [changeBtnStatus, [uuid, 'Eingeladen', 'invite_talent_btn_', 'response']]
  ]
  ajax('/invite_talent', 'POST', functionsOnSuccess, form);
}

function changeBtnStatus(uuid, text, id, response) {
  var saveBtn = $('#'+ id + uuid);
  if (saveBtn.length != 0) {
    saveBtn.trigger('blur');
    saveBtn.html(text);
    saveBtn.addClass('disabled');
  }
}