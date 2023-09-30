var url = ".jobs" + decodeURI(window.location);
var cardContentLoaded = false;
var tabsLoaded;
var tabContentLoaded = false;
var subTabContentLoaded = false;
var subTabsMobileLoaded = false;
var javascriptLoaded = false;
var username = '{{ auth()->user()->username }}';
// TABS makieren 
// unter Tabs auch user_profile_tab_active

// ON PAGE LOAD / REFRESH

if (url.includes('.jobs')) {
  if (!url.includes('talentSearch') && !url.includes('/jobs/company') && !url.includes('/invites') && !url.includes('/openpositions') && !url.includes('/messages') && !url.includes('/talent/') && !url.includes('/savedTalents')) {
    loadSearchPage();
  } else {
    if (url.includes('talentSearch')) {
      loadSearchPage();
    }

    if (url.includes('savedTalents')) {
      loadSavedTalentsPage();
    }

    if (url.includes('/jobs/company')) {
      var username = url.substring(url.lastIndexOf('/') + 1);
      loadCompanyPage(username);
    }

    if (url.includes('/talent/')) {
      var uuid = url.substring(url.lastIndexOf('/') + 1);
      loadTalentPage(uuid);
    }

    if (url.includes('/invites/invited')) {
      loadInvitesPage('invited');
    }
    if (url.includes('/invites/accepted')) {

      loadInvitesPage('accepted');
    }
    if (url.includes('/invites/rejected')) {

      loadInvitesPage('rejected');
    }
    if (url.includes('/openpositions')) {
      loadOpenPositionsPage();
    }

    if (url.includes('/messages')) {
      loadMessagesPage();
    }


  }
}

function loadInvitesPage(tab) {
  //console.log("loading invites " + tab);
  hideAllPagesAndShow('invites_grid');

  setNavBarItemIndicatorColor('invites_indicator');
  showJobsNavbar();


  if (tab == 'invited') {
    setPageUrl('/invites/invited');
    setInvitesTabIndicatorColor('invited_skeleton_indicator');

  }
  if (tab == 'accepted') {
    setPageUrl('/invites/accepted');
    setInvitesTabIndicatorColor('accepted_skeleton_indicator');
    //loadFilter();
    //loadTalents();
  }
  if (tab == 'rejected') {
    setPageUrl('/invites/rejected');
    setInvitesTabIndicatorColor('rejected_skeleton_indicator');
    //loadFilter();
    //loadTalents();
  }
  var skeleton = tab + '_talents_skeleton';
  hideContentShowSkeletons('invites_col_main', skeleton);
  var functionsOnSuccess = [
    [updateInvitesGrid, ['response', tab]]
  ];
  ajax('/get_invites/' + tab, 'GET', functionsOnSuccess);
}

function updateInvitesGrid(response, tab) {
  $('#invites_col_main').html(response[0]);
  $('#invites_col_main').removeClass('d-none');
  var skeleton = tab + '_talents_skeleton';
  $('#' + skeleton).addClass('d-none');


  $('#invited_counter_skeleton').addClass('d-none');
  $('#invited_counter').removeClass('d-none');
  $('#invited_counter').html(response[1]);
  $('#accepted_counter_skeleton').addClass('d-none');
  $('#accepted_counter').removeClass('d-none');
  $('#accepted_counter').html(response[2]);
  $('#rejected_counter_skeleton').addClass('d-none');
  $('#rejected_counter').removeClass('d-none');
  $('#rejected_counter').html(response[3]);

}

function updateInvitesTabsCounter(response) {
  var counter = ['invited_counter', 'accepted_counter', 'rejected_counter'];
  for (var i = 0; i < counter.length; i++) {
    showContentHideSkeletons(counter[i], counter[i] + '_skeleton', response[i]);
  }
}

function loadUserProfileCard(username, tab) {
  /*javascriptLoaded = false;
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
  }*/
}

function loadMessagesPage(uuid) {

  if (typeof uuid === 'undefined') {
    uuid = 'first';
  }

  hideAllPagesAndShow('messages_grid');
  setPageUrl('/messages');
  setNavBarItemIndicatorColor('messages_indicator');
  showJobsNavbar();
  loadChatPreview();
  loadChat(uuid);
}



function loadOpenPositionsPage() {
  hideAllPagesAndShow('openpositions_grid');
  setPageUrl('/openpositions');
  setNavBarItemIndicatorColor('openpositions_indicator');
  showJobsNavbar();
}

function setPageUrl(page) {
  window.history.pushState("", "", page);
}

function loadSearchPage(optional, optionalSearchValues) {
  if (typeof optional === 'undefined') {
    optional = 'default';
  }
  if (typeof optionalSearchValues === 'undefined') {
    optional = 'default';
  }

  $('#saved_talents').addClass('d-none');

  hideAllPagesAndShow('talentsearch_grid');
  setPageUrl('/talentSearch');

  setNavBarItemIndicatorColor('talentsearch_indicator');
  showJobsNavbar();
  loadFilter(optional, optionalSearchValues);
}


function loadFilter(optional, optionalSearchValues) {
  if (typeof optional === 'undefined') {
    optional = 'default';
  }
  if (typeof optionalSearchValues === 'undefined') {
    optional = 'default';
  }


  ajaxSetup();

  var functionsOnSuccess = [
    [showContentHideSkeletons, ['filter', 'filter_skeleton', 'response']],
  ];

  if (optional == 'default') {
    hideContentShowSkeletons('filter', 'filter_skeleton');
    functionsOnSuccess[1] = [searchTalents, ['']];

  }
  if (optional == 'savedSearch' && optionalSearchValues != 'default') {
    hideContentShowSkeletons('filter', 'filter_skeleton');

    //functionsOnSuccess[1] = [, ['']];
    functionsOnSuccess[1] = [setFilterInputValues, [optionalSearchValues]];
    //functionsOnSuccess[1] = [searchTalents, ['']];
  }

  ajax('/get_jobs_page_filter', 'GET', functionsOnSuccess);
}

function setFilterInputValues(values) {

  var training_length = values.training.length;
  for (var i = 0; i < training_length; i++) {
    // alert(values.training[i].name) ; 
    addToItemsPreview('input0', values.training[i].name);
  }
  var documentation_length = values.documentation.length;
  for (var i = 0; i < documentation_length; i++) {
    //alert(values.documentation[i].name) ; 
    addToItemsPreview('input1', values.documentation[i].name);
  }
  var language_length = values.language.length;
  for (var i = 0; i < language_length; i++) {

    addToItemsPreview('input2', values.language[i].language, 'input2_lang_level', values.language[i].language_lavel);
  }
  document.getElementById("open_position").value = values.talent.talent_search_id;
  document.getElementById("position-search").value = values.talent.position;
  document.getElementById('institution_type').value = values.talent.institution_type;
  document.getElementById('city-search').value = values.talent.location;
  //document.getElementById('years_of_experience_slider').value = values.talent.years_of_experience;

  $('#years_of_experience').html( values.talent.years_of_experience);
  $('#years_of_experience_slider').val( values.talent.years_of_experience);
  var slider = document.getElementById("years_of_experience_slider"); 
  var value = ( values.talent.years_of_experience - slider.min) / (slider.max - slider.min) * 100;
  document.getElementById("years_of_experience_slider").style.background = 'linear-gradient(to right, #BCBBBB 0%, #BCBBBB ' + value + '%, #3685D6 ' + value +
  '%, #3685D6 100%)';
  document.getElementById('contract_type').value = values.talent.contract_type;
  document.getElementById('contract_start').value = values.talent.contract_start_date;
  document.getElementById('talent_search_id').value = values.talent.talent_search_id;
  if (values.talent.drivers_license_necessary == 0) {
    $('#drivers_license_not_neccessary').addClass('drivers-license-btn-active');
    $('#drivers_license_neccessary').removeClass('drivers-license-btn-active');
  } else {
    $('#drivers_license_not_neccessary').removeClass('drivers-license-btn-active');
    $('#drivers_license_neccessary').addClass('drivers-license-btn-active');
  }
  //alert(values.talent.years_of_experience);
  searchTalents();


}



function loadCompanyPage(username, optional) {
  var skeletonsId = 'jobs_page_company_skeletons';
  var contentId = 'jobs_page_company_content'; 
  hideAllPagesAndShow('jobs_page_company_grid');
  if (typeof optional === 'undefined') { optional = 'default'; }
  setNavBarItemIndicatorColor('profile_indicator');
  setPageUrl('/jobs/company/' + username);
  showJobsNavbar();
  ajaxSetup();
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonsId, 'response']]
  ];
  setTimeout(() => {
    ajax('/get_company_details/', 'GET', functionsOnSuccess);
  }, 300);
}

function loadTalentPage(uuid) {
  hideAllPagesAndShow('talent_grid');
  setNavBarItemIndicatorColor('talentsearch_indicatortalentsearch_indicator');
  setPageUrl('/talent/' + uuid);
  showJobsNavbar();
  var skeletonsId = 'talent_page_skeletons';
  var contentId = 'talent_page_content';
  hideContentShowSkeletons(contentId, skeletonsId);
  ajaxSetup();
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonsId, 'response']]
  ];
  setTimeout(() => {
    ajax('/get_talent/' + uuid, 'GET', functionsOnSuccess);
  }, 300);

}

function loadSavedTalentsPage() {
  hideAllPagesAndShow('talentsearch_grid');

  $('#search_talents').addClass('d-none');

  $('#saved_talents').removeClass('d-none');
  setNavBarItemIndicatorColor('talentsearcasdash_indicator');
  setPageUrl('/savedTalents');
  showJobsNavbar();
  loadFilter('savedTalents');
  ajaxSetup()
  var contentId = 'saved_talents_content';
  var skeletonId = 'saved_talents_skeletons';
  hideContentShowSkeletons(contentId, skeletonId);
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']]
  ];
  ajax('/get_saved_talents', 'GET', functionsOnSuccess);
}

function setNavBarItemIndicatorColor(currentIndicator) {
  var navBarItemIndicators = ['openpositions_indicator', 'talentsearch_indicator', 'invites_indicator', 'messages_indicator', 'profile_indicator'];
  for (var i = 0; i < navBarItemIndicators.length; i++) {
    if (navBarItemIndicators[i] != currentIndicator) {
      animateNavbarItemIndicator(navBarItemIndicators[i], 0, '0%');
    } else {
      animateNavbarItemIndicator(currentIndicator, 1, '100%');
    }
  }
}

function animateNavbarItemIndicator(id, opacity, width) {
  $('#' + id).animate({
    width: width,
    opacity: opacity
  }, 200);
}

function setInvitesTabIndicatorColor(currentIndicator) {
  var invitesTabIndicators = ['invited_skeleton_indicator', 'accepted_skeleton_indicator', 'rejected_skeleton_indicator', 'invited_indicator', 'accepted_indicator', 'rejected_indicator'];
  for (var i = 0; i < invitesTabIndicators.length; i++) {
    if (invitesTabIndicators[i] != currentIndicator) {
      animateInvitesTabsIndicators(invitesTabIndicators[i], 0, '0px');
    } else {
      animateInvitesTabsIndicators(currentIndicator, 1, '47px');
    }
  }
}



function animateInvitesTabsIndicators(id, opacity, height) {
  $('#' + id).animate({
    height: height,
    opacity: opacity
  }, 200);
}

function hideAllPagesAndShow(id) {
  $('*[id*=' + '_grid' + ']').each(function () {
    var grid = $('#' + this.id);
    grid.removeClass('d-none');
    grid.fadeOut(0);
  });

  // ANIMATE WITH OPACITY
  $(window).scrollTop(0);

  if (!id.includes('logout')) {
    if (!id.includes('invites')) {
      $('#' + id).fadeIn(300);
    } else {
      $('#' + id).fadeIn(0);
    }
  }
}


function showContentHideSkeletons(contentId, SkeletonId, content) {
  if (typeof content === 'undefined') { content = 'default'; }
  var skeleton = $('#' + SkeletonId);
  var contentContainer = $('#' + contentId);
  skeleton.addClass('d-none');
  contentContainer.removeClass('d-none');
  if (content != 'default') {
    contentContainer.html(content);
  }

}

function hideContentShowSkeletons(contentId, SkeletonId) {
  var skeleton = $('#' + SkeletonId);
  var contentContainer = $('#' + contentId);
  skeleton.removeClass('d-none');
  contentContainer.addClass('d-none');
}

