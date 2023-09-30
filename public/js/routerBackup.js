function getPage(postUrl, url, optional, optional1, optional2) {
  $('#suggestions_skeletons').css('display', 'block');
  var currentUrl = window.location.toString();

  if (typeof optional === 'undefined') { optional = 'default'; }
  if (typeof optional1 === 'undefined') { optional1 = 'default'; }
  if (typeof optional2 === 'undefined') { optional2 = 'default'; }

  var form = new FormData();






  $('*[id*=' + 'skeleton' + ']').each(function () {
    if (!this.id.includes('network') || !this.id.includes('suggestion')) {
      //$('#' + this.id).addClass("d-none");
    }
  });

  if (url == '/network/connections' || url == '/network/invites' || url == '/network' || url == '/users/' + optional + '/connections') {


    if (url.includes('/network') && !url.includes('/network/')) {
      // HIER ID AKTIVIEREN

    }






    if (optional == 'view' || optional1 == 'view') {

      window.history.pushState("", "", url);
      changeBtnColor(url);
      if (url.includes('/network') && !url.includes('/network/')) {


        $('#suggestions_skeletons').removeClass('d-none');
        $('#network_skeletons').removeClass("d-none");

      }
    }
  } else {
    window.history.pushState("", "", url);



    if (url.includes('/feed')) {
      $('#skeletons').removeClass("d-none");
    }
    if (url.includes('/notifications')) {
      $('#notifications_skeletons').removeClass("d-none");
    }




    $('#content').html("");




    // DIE URL SO KÜRZEN, DASS NUR FEED DRIN STEHT
    if (url.includes('/feed/')) {
      var url_splitted = url1.split('/');
      url_splitted = url_splitted[0] + '/' + url_splitted[1] + '/' + url_splitted[2] + '/' + url_splitted[3];
      changeBtnColor(url_splitted);
    } else {
      changeBtnColor(url);
    }

  }

  // User

  if (url.includes('/users/')) {
    form.append('username', optional);
  }


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var method = "GET";
  if (postUrl == "/get_user") {
    method = "POST";
  }



  $.ajax({async: true,
    url: postUrl,
    type: method,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {

    },
    success: function (response) {

      if (url.includes('/users/') && url.includes('/connections')) {

      } else {
        $(window).scrollTop(0);
      }

      // NETWORK
      var print = true;

      if (url.includes('/network')) {
        validateNetworkUrl(optional, url, response);
        updateNetworkCounts(url, optional, optional1, response);
        //$('#content').removeClass('d-none').css("display", "none").fadeIn(0);

      }

      if (url.includes('/notifications')) {
        $('#content').html(response[0]);
        $('#content').removeClass('d-none').css("display", "none").fadeIn(0);
        $('#notifications_skeletons').addClass('d-none');
      }

      if (url.includes('/users/')) {
        validateProfileUrl(optional, optional1, url, response);
        updateProfileCounts(url, optional, optional1, optional2, response);
        $('#content').removeClass('d-none').css("display", "none").fadeIn(0);
        $('#skeletons').addClass('d-none');
      }

      if (url.includes('/feed')) {




        $('#content').html(response[0]);
        handleFeed();
        $('#content').removeClass('d-none').css("display", "none").fadeIn(0);

        $('*[id*=' + 'skeleton' + ']').each(function () {
          $('#' + this.id).addClass("d-none");
        });

      }


      // USER PROFILE
      var url1 = window.location.toString();
      var username1 = url1.split('/');
      username1 = username1[username1.length - 2];


      switch (url) {
        case '/feed':

          if (optional == "post") {
            $('#post_modal').modal('show');
          }
          break;
      }
    }
  });
}

var makepost = false;

function handleFeed() {

  $("#all_posts").fadeIn(0);

  /*setTimeout(() => {
    $("#posts_spinner").fadeOut(function () {
      $("#all_posts").fadeIn();
      $('#spinner-placeholder').hide();
      calcPostsHeight(), 0;
    });
  }, 0);*/
}

function updateNetworkTab(optional, response) {

  if (optional == 'view') {

    $('#main_network_col').html(response[0]);




    $('#content').removeClass('d-none').css("display", "none").fadeIn(0);
    setTimeout(() => {

      $('#network_skeletons').addClass('d-none');

    }, 50);

  } else {

  }
  //$('#suggestions_skeletons').addClass('d-none');
}


function updateProfileTab(response) {
  $('#profile_main_content').html(response[0]);
}

function updateProfileTab(response, optional) {
  if (optional == 'view') {
    $('#profile_main_content').html(response[0]);
  }
}

function validateProfileUrl(optional, optional1, url, response) {
  if (typeof optional1 === 'undefined') { optional1 = 'default'; }
  if (optional1 != 'user' && (url == '/users/' + optional + '/connections')) {
    updateProfileTab(response, optional1);
  } else {
    $('#content').html(response[0]);
  }
}

function validateNetworkUrl(optional, url, response) {
  if (optional != 'network' && (url == '/network/connections' || url == '/network/invites' || url == '/network')) {
    updateNetworkTab(optional, response);
  } else {

    $('#content').html(response[0]);
  }
}

function updateProfileCounts(url, optional, optional1, optional2, response) {
  if (optional1 == 'user') {

    if (optional2 == "suggestions") {

    }
    if (optional2 == "connections") {
      var username = optional;
      getPage('/get_user_connections', '/users/' + username + '/connections', username);
      switchTab("userProfileConnetion", username);
    }
    if (optional2 == "requests") {

    }
    //updateAllTabs(); // FOR COUNTERS ?
  }
}

function updateNetworkCounts(url, optional, optional1, response) {

  if (optional == 'view' || optional == '') {
    switch (url) {
      case '/network/connections':
        updateCount('connectionsCount', response[1]);
        break;
      case '/network':
        updateCount('suggestionsCount', response[1]);
        break;
      case '/network/invites':
        updateCount('requestCount', response[1]);
        break;
    }
  }

  if (optional == 'network') {
    if (optional1 == "suggestions") {
      getPage('/get_suggestions', '/network', '');
      switchTab("suggestions");
    }
    if (optional1 == "connections") {
      getPage('/get_connections', '/network/connections', '');
      switchTab("connections")
    }
    if (optional1 == "requests") {
      getPage('/get_requests', '/network/invites', '');
      switchTab("requests")
    }
    //updateAllTabs();

  }
}

function switchTab(id, optional) {
  if (typeof optional === 'undefined') { optional = 'default'; }
  removeActiveClass();
  $('#' + id).addClass("active");

  if (id == 'requests') {
    getPage('/get_requests', '/network/invites', 'view');
  }
  if (id == 'suggestions') {
    getPage('/get_suggestions', '/network', 'view');
  }
  if (id == 'connections') {
    getPage('/get_connections', '/network/connections', 'view');
  }
  if (id == 'userProfileConnetion') {
    getPage('/get_user_connections', '/users/' + optional + '/connections', optional, 'view');
  }
}

function updateAllTabs() {
  getPage('/get_connections', '/network/connections', '');
  getPage('/get_suggestions', '/network', '');
  getPage('/get_requests', '/network/invites', '');
}