var url = decodeURI(window.location);
var cardContentLoaded = false;
var tabsLoaded;
var tabContentLoaded = false;
var subTabContentLoaded = false;
var subTabsMobileLoaded = false;


// TABS makieren 
// unter Tabs auch user_profile_tab_active

// ON PAGE LOAD / REFRESH
if (url.includes('/users/')) {
  var username = url.substring(url.lastIndexOf('/') + 1);
  if (url.includes('/users/') && !url.includes('/connections') && !url.includes('/activity')) {
    loadUserProfileCard(username);
  } else {
    var url1 = window.location.toString();
    var url_splitted = url1.split('/');
    username = url_splitted[url_splitted.length - 3];
    if (url.includes('/connections')) {
      username = url_splitted[url_splitted.length - 2];
      loadUserProfileCard(username, 'connections')
    }
    if (url.includes('/activity')) {
      loadUserProfileCard(username, 'activity');
    }
  }
}

var javascriptLoaded = false;

setInterval(() => {
  url = decodeURI(window.location);
  if (pageIsCompletelyLoaded()) {
    if (!javascriptLoaded) {
      javascriptLoaded = true;
      loadUserPageJavascript();
    }
  } else {
    javascriptLoaded = false;
  }
}, 10);


// USER PROFILE
function loadUserProfileCard(username, tab) {
  
  javascriptLoaded = false;
  cardContentLoaded = false;
  changeBtnColor('profile');
  if (typeof tab === 'undefined') { tab = 'info'; }
  var contentId = 'user_card';
  var skeletonId = 'user_card_skeletons';
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    [function () { cardContentLoaded = true }, []]
  ];

  clearAllProfilePageContent();
  resetNavBtnColors();
  showGrid('user_profile');
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_card/');
  loadUserTabs(username, tab);
  if (tab == 'info') {
    loadUserInfo(username);
  }
  if (tab == 'activity') {
    loadUserActivity(username);
  }
  if (tab == 'connections') {
    loadUserConnections(username);
  }
  storeActivity('/users/'+username+'/'+tab);
}

function reloadJavascript(scripts) {
  $('#user_page_javascript').html(scripts);
  //alert("loaded");
}

function loadUserPageJavascript() {
  var functionsOnSuccess = [[reloadJavascript, ['response']]];
  ajax('/get_user_page_javascript', 'GET', functionsOnSuccess);
}

function loadUserConnections(username) {
  tabContentLoaded = false;
  var contentId = 'user_connections'
  var skeletonId = 'user_connections_skeleletons'
  var tab = 'connections';
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    [function () { tabContentLoaded = true; }, []]
  ];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_connections/', tab);
}

function loadUserActivity(username) {
  tabContentLoaded = false;
  loadActivitySubTabs(username);
  loadActivitySubTabsMobile(username);
  var contentId = 'user_activity_posts';
  var skeletonId = 'user_activity_posts_skeletons';
  var tab = 'activity';
  var subTab = 'posts';
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    [function () { tabContentLoaded = true; }, []]
  ];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_posts/', tab, subTab);
  $('#user_activity').removeClass('d-none');
}

function loadActivitySubTabs(username) {
  var contentId = 'acitvity_sub_tabs';
  var skeletonId = 'acitvity_sub_tabs_skeletons';
  var functionsOnSuccess = [[showContentHideSkeletons, [contentId, skeletonId, 'response']]];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_activity_sub_tabs/');
}

function loadActivitySubTabsMobile(username) {
  var contentId = 'acitvity_sub_tabs_mobile';
  var skeletonId = 'acitvity_sub_tabs_mobile_skeletons';
  var functionsOnSuccess = [[showContentHideSkeletons, [contentId, skeletonId, 'response']]];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_activity_sub_tabs_mobile/');
}



function loadUserInfo(username) {
  tabContentLoaded = false;
  var contentId = 'user_page_info'
  var skeletonId = 'user_page_info_skeletons'
  var tab = 'info';
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    [function () { tabContentLoaded = true; }, []]
  ];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_page_info/', tab);
}

function loadUserTabs(username, activeTab) {
  tabsLoaded = false;
  var contentId = 'user_tabs';
  var skeletonId = 'user_tabs_skeletons';
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
    [setCurrentTab, [activeTab, 0]],
    [function () { tabsLoaded = true; }, []]
  ];
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_tabs/');
}

// HELPER FUNCTIONS
function pageIsCompletelyLoaded() {
  if (cardContentLoaded && tabsLoaded && tabContentLoaded) {
    return true;
  } else {
    return false;
  }
}



function clearAllProfilePageContent() {
  var contentIds = ['user_activity_posts', 'user_page_info', 'user_card', 'user_tabs', 'acitvity_sub_tabs', 'user_connections'];
  contentIds.forEach(function (contentId) {
    $('#' + contentId).html('');
  });
}

function handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, route, tab, subTab) {
  if (typeof subTab === 'undefined') { subTab = 'default'; }
  if (typeof tab === 'undefined') { tab = 'default'; }

  if (tab != 'default') {
    setCurrentTab(tab, 200);
    if (subTab != 'default') {
      setCurrentSubTab(subTab);
      tab += '/' + subTab;
    }
    var pageUrl = username + '/' + tab;
    if (tab == 'info') { pageUrl = username }
    setUserPageUrl(pageUrl);
    hideAllProfilePageTabs();
  }

  hideContentShowSkeletons(contentId, skeletonId);
  if (reloadIsRequired(username, contentId)) {
    ajax(route + username, 'GET', functionsOnSuccess);
  } else {
    showContentHideSkeletons(contentId, skeletonId);
  }
}

function reloadIsRequired(username, contentId) {
  var reloadIsRequired = true;
  if (contentLoaded(contentId)) {
    reloadIsRequired = false;
  }
  return reloadIsRequired;
}

function contentLoaded(id) {
  var content = $('#' + id).html().trim();
  if (content == '') {
    return false;
  } else {
    return true;
  }
}


function setCurrentUsername(username) {
  currentProfilePageUsername = username;
}

function setUserPageUrl(page) {
  window.history.pushState("", "", '/users/' + page);
}

function hideAllProfilePageTabs() {
  $('#user_page_info_skeletons').addClass('d-none');
  $('#user_page_info').addClass('d-none');
  $('#user_activity_posts_skeletons').addClass('d-none');
  $('#user_activity_posts').addClass('d-none');
  $('#user_activity').addClass('d-none');
  $('#user_connections').addClass('d-none');
}

function showContentHideSkeletons(contentId, SkeletonId, content) {
  if (typeof content === 'undefined') { content = 'default'; }
  var userInfoSkeletons = $('#' + SkeletonId);
  var userInfo = $('#' + contentId);
  userInfoSkeletons.addClass('d-none');
  userInfo.removeClass('d-none');
  if (content != 'default') {
    userInfo.html(content);
  }
}

function hideContentShowSkeletons(contentId, SkeletonId) {
  var userInfoSkeletons = $('#' + SkeletonId);
  var userInfo = $('#' + contentId);
  userInfoSkeletons.removeClass('d-none');
  userInfo.addClass('d-none');
}

function setCurrentTab(id, time) {
  var screenWidth = $(window).width();
  var tabText;
  var tabIndicator;


  $('*[id*=user_profile_tab_]').each(function () {
    tabText = $('#' + this.id);
    tabIndicator = $('#' + this.id + '_indicator');

    tabText.animate({
      color: '#7F7F7F'
    }, { duration: time, queue: false });
    if (screenWidth >= 768) {
      tabIndicator.animate({
        opacity: 0,
        width: 0 + '%'
      }, { duration: time, queue: false });
    } else {
      tabIndicator.css('width', '100%');
      tabIndicator.animate({
        opacity: 0,
      }, { duration: time, queue: false });
    }
  });


  $('*[id*=user_profile_tab_' + id + ']').each(function () {
    tabText = $('#' + this.id);
    tabIndicator = $('#' + this.id + '_indicator');

    tabText.animate({
      color: '#FF9721'
    }, { duration: time, queue: false });
    if (screenWidth >= 768) {
      tabIndicator.animate({
        opacity: 1,
        width: 100 + '%'
      }, { duration: time, queue: false });
    } else {
      tabIndicator.css('width', '100%');
      tabIndicator.animate({
        opacity: 1,
      }, { duration: time, queue: false });
    }
  });
}

function setCurrentSubTab(id) {
  $('*[id*=user_profile_sub_tab_' + id + ']').each(function () {
    $('#' + this.id).addClass('active1');
  });
}