function alertResponse (string) {
  //alert(string);
}


function loadConnectionsInCommon(username) {  
  var contentId = 'connections_in_common'
  var skeletonId = 'connections_in_common_skeletons'
  $('#'+contentId).html('');
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']]
  ];
  $('#connections_in_common').html('');
  hideContentShowSkeletons(contentId, skeletonId);
  handlePageLoadRequest(username, contentId, skeletonId, functionsOnSuccess, '/get_user_connections_in_common/');
}


