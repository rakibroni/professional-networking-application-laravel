

var url = decodeURI(window.location);

// ON PAGE LOAD OR REFRESH
handleURL(url);

// LOAD PAGE CONTENT
function handleURL(url) {
  // FEED
  if (url.includes('feed')) {
    if (!url.includes('/feed/')) {
      loadFeedPage();
    }
    if (url.includes('/feed/posts/')) {
      var url1 = window.location.toString();
      var url_splitted = url1.split('/');
      var postID = url_splitted[url_splitted.length - 1];
      if (url_splitted.length == 6) {
        loadSinglePostPage(postID);
      }
      if (url_splitted.length == 7) {
        postID = url_splitted[url_splitted.length - 2];
        var commentID = url_splitted[url_splitted.length - 1];
        loadSinglePostPage(postID, commentID);
      }
    }
  }

  // NOTIFICATIONS
  if (url.includes('/notifications') == true) {
    loadNotificationsPage();
  }

  if (url.includes('/questions') && !url.includes('-')) {
    loadQuestionsPage();
  }

  // NETWORK & SUBPAGES
  if (url.includes('/network')) {
    if (url.includes('invites') == true) {
      loadNetworkPage('requests');
    }
    if (url.includes('/connections') == true) {
      loadNetworkPage('connections');
    }
    if (url.includes('/network') && url.includes('/connections') == false && url.includes('invites') == false) {
      loadNetworkPage('suggestions');
    }
  }


}

// NETWORK
function loadNetworkPage(subPage) {
  changeBtnColor('network1');

  var array = ['suggestions', 'connections', 'requests', 'suggestions1', 'connections1', 'requests1'];
  for (var i = 0; i < array.length; i++) {
    $('#' + array[i]).removeClass('active1');
  }


  $('#' + subPage).addClass("active1");
  $('#' + subPage + '1').addClass("active1");
  hideAllPages();

  $('#network_col_main').html("");
  $('#' + subPage + '_skeletons').removeClass('d-none');
  loadNetworkTabs();



  $('#network_grid').removeClass('d-none');

  var form = new FormData();

  if (subPage == 'suggestions') {
    window.history.pushState("", "", '/network');

  }
  if (subPage == 'connections') {
    window.history.pushState("", "", '/network/connections');

  }
  if (subPage == 'requests') {
    window.history.pushState("", "", '/network/invites');

  }

  if (subPage != 'suggestions') {
    ajaxSetup();
    $.ajax({
      async: true,
      url: '/get_' + subPage,
      type: 'GET',
      async: true,
      data: form,
      processData: false, 
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },
      success: function (response) {
        $('#network_col_main').html(response[0]);
        $('#' + subPage + '_skeletons').addClass('d-none');
        storeActivity('/network/' + subPage);
      }
    });

  }

  if (subPage == 'suggestions') {
    suggestionsCounter = 0
    loadMoreSuggestions(0,16);
    loadingMoreSuggestions = false;
  }
}

function loadNetworkTabs() {
  var form = new FormData();
  $('#network_tabs').addClass('d-none');
  $('#network_tabs_skeletons').removeClass('d-none');
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/get_all_network_counts',
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      var requestCount = response[0];
      var requestCountElem = $('#requestCount');
      if (requestCount != 0) {
        requestCountElem.addClass("network-tab-indicator");
      } else {
        requestCountElem.removeClass("network-tab-indicator");
      }
      requestCountElem.html(requestCount);
      $('#suggestionsCount').html(response[1]);
      $('#connectionsCount').html(response[2]);
      $('#requestCount1').html(response[0]);
      $('#suggestionsCount1').html(response[1]);
      $('#connectionsCount1').html(response[2]);
      $('#network_tabs_skeletons').addClass('d-none');
      $('#network_tabs').removeClass('d-none');
    }
  });
}


// QUESTIONS
function loadQuestionsPage(optional) {
  questionsCounter = 0;
  $('#load_more_questions_btn').removeClass('d-none');
  $('#load_more_questions_btn').attr("onclick","loadMoreQuestions(1, 'BE')");
  changeBtnColor('feed1');
  hideAllPages();
  $('#feed_grid').removeClass('d-none');
  changeColorOfFeedNavigation('navigate_to_questions');
  //$('#question_grid').removeClass('d-none');
  if (typeof optional === 'undefined') { optional = 'default'; }
  if (optional == 'openModal') {
    $('#post_modal').modal('show');
  }



  var sug = $('#suggestions_feed').html().trim();
  if (sug == '') {
    loadSuggestions1('feed');
  }
  $('#loaded_posts').html('FRAGEN HIER');
  
  $('#all_posts').addClass('d-none');
  $('#posts_skeleton').removeClass('d-none');

  window.history.pushState("", "", '/questions');
  /*feedURL = window.location.toString();
  postCount = 0;
  lastMaxScroll = 0;*/
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestions, ['response']]
  ]
  ajax('/get_questions/BE/0/10', 'GET', functionsOnSuccess);
}

function displayQuestions(questions) {
  $('#load_more_questions_btn').removeClass('d-none');
  $('#all_questions').html(questions[0]);
  $('#posts_skeleton').addClass('d-none');
  if (questions[1] == "" || questions[1] == null) {
    $('#load_more_questions_btn').addClass('d-none');
  }

}


// FEED & POSTS
function loadFeedPage(optional) {
  changeBtnColor('feed1');
  var sug = $('#suggestions_feed').html().trim();
  if (sug == '') {
    loadSuggestions1('feed');
  }
  hideAllPages();
  $('#all_posts').removeClass('d-none');
  $('#feed_grid').removeClass('d-none');
  if (typeof optional === 'undefined') { optional = 'default'; }
  if (optional == 'openModal') {
    $('#post_modal').modal('show');
  }

  $('#loaded_posts').html('');
  $('#posts_skeleton').removeClass('d-none');

  var functionsOnSuccess = [
    [displayPosts, ['response']]
  ];

  window.history.pushState("", "", '/feed');
  feedURL = window.location.toString();
  postCount = 0;
  lastMaxScroll = 0;
  ajaxSetup();
  ajax('/get_posts', 'GET', functionsOnSuccess);
}

function displayPosts(response) {
  $('#posts_skeleton').addClass('d-none');
  $('#loaded_posts').html(response);
  storeActivity('/feed');
}

// SINGLE POST 
function loadSinglePostPage(uuid, optional) {
  changeBtnColor('single_post');
  hideAllPages();
  if (typeof optional === 'undefined') { optional = 'default'; }
  $('#content').html("");
  $('#single_post').html('');
  $('#single_post_skeleton').removeClass('d-none');
  hideAllPages();
  $('#single_post_grid').removeClass('d-none');
  var form = new FormData();
  if (optional == 'default') {
    window.history.pushState("", "", '/feed/posts/' + uuid);
  } else {
    window.history.pushState("", "", '/feed/posts/' + uuid + '/' + optional);
  }
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/get_post/' + uuid,
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#single_post').css('opacity', '0')
      $('#single_post').html(response);

      storeActivity('/feed/posts/' + uuid + '/' + optional);
      if (optional != 'default') {
        $('#collapse' + uuid).collapse();
        setTimeout(() => {
          $('#single_post_skeleton').addClass('d-none');
          $('#single_post').css('opacity', '1');
          var postImg = $('#img' + uuid);
          if (postImg.length > 0) {

            newImageSrc(uuid, optional);
          } else {
            setTimeout(() => {
              highlightComment(optional);
            }, 300);
          }
        }, 2000);

      } else {
        $('#single_post_skeleton').addClass('d-none');
        $('#single_post').css('opacity', '1');
      }
    }
  });
}





// NOTIFICATIONS
function loadNotificationsPage() {
  changeBtnColor('notifications1');
  loadSuggestions1('notifications');
  hideAllPages();
  window.history.pushState("", "", '/notifications');

  $('#old_notifications').addClass('d-none');
  $('#new_notifications').addClass('d-none');
  $('#old_notifications_skeletons').removeClass('d-none');
  $('#new_notifications_skeletons').removeClass('d-none');
  $('#notifications_grid').removeClass('d-none');
  var form = new FormData();
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/update_new_notifications',
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      storeActivity('/notifications');
      $('#new_notifications_skeletons').addClass('d-none');
      if (response == '') {
        $('#new_notifications').html(`<div class="ms-3 pb-3" style="color: #BCBBBB"> Du bist auf dem neuesten Stand! </div>`);
      } else {
        $('#new_notifications').html(response);
      }
      $('#new_notifications').removeClass('d-none');
    }
  });

  ajaxSetup();
  $.ajax({
    async: true,
    url: '/update_old_notifications',
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#old_notifications_skeletons').addClass('d-none');
      $('#old_notifications').removeClass('d-none');
      $('#old_notifications').html(response);
    }
  });
}


// HELPER FUNCTIONS
async function newImageSrc(uuid, optional) {

  // Get a reference to the image in whatever way suits.
  let image = document.getElementById('img' + uuid);
  // Wait for it to load.
  await new Promise((resolve) => {
    image.onload = resolve;
  });

  setTimeout(() => {
    highlightComment(optional);
  }, 300);
}

var comment = $('#comment');
var scrollTimeout;
addEventListener('scroll', function (e) {
  if (comment.length > 0) {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(function () {
      comment.addClass("animate__animated animate__pulse animate__faster");
    }, 100);
  }
});

function highlightComment(id) {
  var comment_ = $("#comment" + id);
  comment = comment_;
  var commentPosY = comment_.position().top;
  document.getElementById('comment' + id).scrollIntoView({ behavior: "smooth" });
}

function hideAllPages() {
  $(window).scrollTop(0);
  $('#network_grid').addClass('d-none');
  $('#feed_grid').addClass('d-none');
  $('#notifications_grid').addClass('d-none');
  $('#user_profile_grid').addClass('d-none');
  $('#single_post_grid').addClass('d-none');
  $('#question_grid').addClass('d-none');
}

function changeBtnColor(id) {

  var navBarItemsMobile = ['feed1', 'network1', 'notifications1', 'makepost', 'single_post'];
  var innerHtml = '';
  var navBarItem;
  var activeNavBarItem;
  var screenWidth = $(window).width();

  if (screenWidth < 1200) {


    for (var i = 0; i < navBarItemsMobile.length; i++) {
      navBarItem = $('#' + navBarItemsMobile[i]);
      innerHtml = navBarItem.html();
      navBarItem.css('transform', 'scale(1,1)');
      while (innerHtml.includes('#FF9721')) {
        innerHtml = innerHtml.replace('#FF9721', '#FFF');
      }
      navBarItem.html(innerHtml);
    }

    activeNavBarItem = $('#' + id);

    if (activeNavBarItem.length) {
      innerHtml = activeNavBarItem.html();
      while (innerHtml.includes('#FFF')) {
        innerHtml = innerHtml.replace('#FFF', '#FF9721');
      }

      activeNavBarItem.html(innerHtml);
      activeNavBarItem.css('transition', 'all .1s ease-in-out');
      activeNavBarItem.css('transform', 'scale(1,1)');
    }
  } else {

    id = id.replace('1', '');
    for (var i = 0; i < navBarItemsMobile.length; i++) {
      var navBarItemId = navBarItemsMobile[i].replace('1', '');
      navBarItem = $('#' + navBarItemId);
      innerHtml = navBarItem.html();
      navBarItem.css('transform', 'scale(1,1)');
      while (innerHtml.includes('#FF9721')) {
        innerHtml = innerHtml.replace('#FF9721', '#FFF');
      }
      navBarItem.html(innerHtml);


      $('#' + navBarItemId + "_label").css("color", '#FFF');
      //$('#' + value + "_label_indicator").addClass("d-none");
      $('#' + navBarItemId + "_label_indicator").animate({
        width: '0%',
        opacity: 0
      }, 200);
    }

    activeNavBarItem = $('#' + id);

    if (activeNavBarItem.length) {
      innerHtml = activeNavBarItem.html();
      while (innerHtml.includes('#FFF')) {
        innerHtml = innerHtml.replace('#FFF', '#FF9721');
      }
      activeNavBarItem.html(innerHtml);
      var label = $('#' + id + "_label");
      if (label != null) {
        $('#' + id + "_label_indicator").css("width", "0px");
        $('#' + id + "_label").css("color", '#FF9721');
        $('#' + id + "_label_indicator").animate({
          width: '100%',
          opacity: 1
        }, 200);
      }
    }
  }
}




function resetNavBtnColors() {
  array = ["feed", "network", "notifications"];
  $.each(array, function (key, value) {

    var html = $('#' + value).html();
    //html = html.replaceAll("#FF9721", "#FFF");
    $('#' + value).html(html);

    var html = $('#' + value + "1").html();

    //html = html.replaceAll("#FF9721", "#FFF");
    $('#' + value + "1").html(html);

    var label = $('#' + value + "_label");
    if (label != null) {
      $('#' + value + "_label").css("color", '#FFF');
      //$('#' + value + "_label_indicator").addClass("d-none");
      $('#' + value + "_label_indicator").animate({
        width: '0%',
        opacity: 0
      }, 200);
    }
  });
}

function showGrid(id) {
  hideAllPages();
  $('#' + id + '_grid').removeClass('d-none');
}



function changeColorOfFeedNavigation(id) {
  var idArray = ['navigate_to_posts', 'navigate_to_questions', 'navigate_to_users_questions'];
  for (var i = 0; i < idArray.length; i++) {
    $('#'+idArray[i]).removeClass('btn btn-warning bg-cura').addClass(' feed-navigator-btn btn');
  }

  $('#'+id).addClass('btn btn-warning bg-cura').removeClass(' feed-navigator-btn');
}