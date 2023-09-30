var requestingNetworkNotifications = false;
function getData(postUrl, url, optional, optional1) {
  if (requestingNetworkNotifications == false) {
    requestingNetworkNotifications = true;
    if (typeof optional === 'undefined') { optional = 'default'; }
    if (typeof optional1 === 'undefined') { optional1 = 'default'; }

    var form = new FormData();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({async: true,
      url: postUrl,
      type: 'GET',
      data: form,
      async: true,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        requestingNetworkNotifications = false;
        addToNetworkNotificationsCounter(response[1]);
      }
    });
  }
}

var gettingNotificationsCount = false;
function getNotificationsCount() {
  if (gettingNotificationsCount == false) {
    gettingNotificationsCount = true;
    var form = new FormData();

    ajaxSetup();

    $.ajax({
      url: '/get_new_notifications_count',
      type: 'GET',
      data: form,
      async: true,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        gettingNotificationsCount = false;
        addToNotificationsCounter(response);
      }
    });
  }
}




getData('/get_requests', '');
getNotificationsCount();
setInterval(() => {
  getNotificationsCount();
  getData('/get_requests', '');
}, 10000);






function addToNetworkNotificationsCounter(value) {
  if (value == 0) {
    clearNetworkNotificationsCounter();
  } else {
    setNetworkNotificationsCounter(value);
  }
}

function addToNotificationsCounter(value) {
  if (value == 0) {
    clearNotificationsCounter();
  } else {
    setNotificationsCounter(value);
  }
}

function setNetworkNotificationsCounter(value) {
  $('*[id*=' + 'network_notifictions_indicator' + ']').each(function () {
    $('#' + this.id).html(value);
    $('#' + this.id).addClass("notifications-indicator");
  });
}

function clearNetworkNotificationsCounter() {
  $('*[id*=' + 'network_notifictions_indicator' + ']').each(function () {
    $('#' + this.id).html('');
    $('#' + this.id).removeClass("notifications-indicator");
  });
}

function setNotificationsCounter(value) {
  $('*[id*=' + 'notifictions_indicator' + ']').each(function () {
    if (!this.id.includes('network')) {
      $('#' + this.id).html(value);
      $('#' + this.id).addClass("notifications-indicator");
    }
  });
}

function clearNotificationsCounter() {
  $('*[id*=' + 'notifictions_indicator' + ']').each(function () {
    if (!this.id.includes('network')) {
      $('#' + this.id).html('');
      $('#' + this.id).removeClass("notifications-indicator");
    }
  });
}