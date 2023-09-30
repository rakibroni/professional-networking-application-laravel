function loadChatPreview() {
  ajaxSetup();
  var skeletonId = 'chat_items_skeletons';
  var contentId = 'chat_items';
  hideContentShowSkeletons(contentId, skeletonId);
  
  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']]
  ]
  ajax('/get_chat_previews', 'GET', functionsOnSuccess);
}


function loadChat(uuid) {


  ajaxSetup();
  var skeletonId = 'chat_window_skeleton';
  var contentId = 'chat_window';
  hideContentShowSkeletons(contentId, skeletonId);


  var functionsOnSuccess = [
    [showContentHideSkeletons, [contentId, skeletonId, 'response']]
  ]
  ajax('/get_job_chat/'+uuid, 'GET', functionsOnSuccess);
}

function sendMessageToTalent() {
  var text = $('#message_input').val();
  
	
  var today = new Date();
  var minutes = today.getMinutes();
  if (minutes < 10) minutes = "0" + minutes;
  var time = today.getHours() + ":" + minutes;

  var message = `
  
  
  <div class="text-center text-secondary" style="width: 740px;font-size: 10px; color: #F2F2F2">`+time+`</div>
  <div class="my-2 ms-3" ><div style="font-size:12px; font-weight: 400 !important"   class="badge bg-primary p-1 text-white br">`+ text + `</div></div>`; 


  $('#job_chat_send_btn').trigger('blur');
  if (text.trim() != '') {
    $('#messages').append(message);
  }

  $('#message_input').val('');
}