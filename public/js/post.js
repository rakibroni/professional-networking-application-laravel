function openReactionModal(id) {
  var modal = $('#reaction_modal');
  var modalBody = $('#reaction_modal_body');
  var connectionSkeleton = $('#connection_skeletons_reaction_modal').html();
  modalBody.html(connectionSkeleton);
  modal.modal('show');
  getUsersWhoReactedToPost(id, modalBody);
}


function getUsersWhoReactedToPost(postId, modalBody) {
  var form = new FormData();
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/get_users_who_reacted_to_post/'+postId,
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      modalBody.html(response);
    }
  });
}