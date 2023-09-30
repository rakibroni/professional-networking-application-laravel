function storeActivity(type) {
  var form = new FormData;
  form.append('type', type);
  var functionsOnSuccess = [];
  ajax('/create_activity', 'POST', functionsOnSuccess, form);
  ajaxSetup();
}







function loadTotalUserCount() {
  var contentId = 'total_user_count';
  var skeletonId = 'total_user_count_skeleton';

  hideContentShowSkeletons(contentId, skeletonId);
  var functionsOnSuccess = [
    [showUserCount, ['response']],
  ];
  ajaxSetup();
  ajax('/get_total_user_count/', 'GET', functionsOnSuccess);
}

function showUserCount(response) {
  var contentId = 'total_user_count';
  var skeletonId = 'total_user_count_skeleton';
  showContentHideSkeletons(contentId, skeletonId, response.length);
}


function loadActiveUsers(type) {
  var idPrefix = type;
  type = type.replace('ly', '');
  if (type == 'dai') { type = 'day' };
  var contentId = idPrefix + '_active_users';
  var skeletonId = idPrefix + '_active_users_skeleton';

  hideContentShowSkeletons(contentId, skeletonId);
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']],
  ];
  ajaxSetup();
  ajax('/get_active_users/' + type, 'GET', functionsOnSuccess);
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



