function getUnseenModals() {
  ajaxSetup();
  var functionsOnSuccess = [
    [displayUnseenModals, ['response']]
  ];
  ajax('/get_notification_modal_status', 'GET', functionsOnSuccess);
}

function displayUnseenModals(modals) {
  var inviteFriendsModalSeen = false;
  if (modals['inviteFriendsModalSeen'] == true) {
    inviteFriendsModalSeen = true;
  }
  if (!inviteFriendsModalSeen) {
    $('#invite_friends_notification_modal').modal('show');
  }
}

function markModalAsSeen(modal) {
  var form = new FormData;
  ajaxSetup();
  form.append('modal', modal);
  ajax('/update_notification_modal_status', 'POST', [], form);
}

getUnseenModals();