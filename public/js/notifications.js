function loadPageOnNotificationClick(notificationID, status, messageType, optional, optional_1) {
  if (messageType == 'like') {
    loadSinglePostPage(optional);
  }
  if (messageType == 'comment') {
    loadSinglePostPage(optional, optional_1);
  }
  if (messageType == 'request') {
    loadNetworkPage('connections');
  }
}

function markNotificationsAsSeen() {
  var form = new FormData();
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/mark_notifications_as_seen',
    type: 'POST',
    data: form,
    async: true,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      getNotificationsCount();
    }
  }); 
}

// das gleiche auch bei anfrage annehmen!