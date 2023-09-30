


function loadMoreComments(objectId, counter, type) {

  

  var skeletons;



  if (type == 'comment') {
    skeletons = $('#comment_skeletons' + objectId);
  }
  if (type == 'answer') {
    skeletons = $('#comment_answers_skeletons' + objectId);

  }
  if (type == 'answerToAnswer') {
    
    skeletons = $('#answers_to_comment_answers_skeletons' + objectId);
  }

  skeletons.removeClass('d-none');
  var form = new FormData;


  form.append('objectId', objectId);
  form.append('counter', counter);
  form.append('type', type);
  var functionsOnSuccess = [
    [displayLoadedComments, ['response', objectId, type]]
  ]
  ajaxSetup();
  ajax('/get_next_comments/' + objectId + '/' + counter + '/' + type, 'GET', functionsOnSuccess, form);

}
function displayLoadedComments(response, objectId, type) {



  var counter, skeletons, container, loadMoreBtn;
  if (type == 'comment') {
    skeletons = $('#comment_skeletons' + objectId);
    counter = $('#comments_counter' + objectId);
    container = $('#comments_container' + objectId);
    loadMoreBtn = $('#load_more_comments_btn' + objectId);
  }

  if (type == 'answer') {
    skeletons = $('#comment_answers_skeletons' + objectId);
    counter = $('#comment_answer_counter' + objectId);
    container = $('#comment_answers_container' + objectId);
    loadMoreBtn = $('#load_more_comment_answers_btn' + objectId);
  }

  if (type == 'answerToAnswer') {
    skeletons = $('#answers_to_comment_answers_skeletons' + objectId);
    counter = $('#answers_to_comment_answer_counter' + objectId);
    container = $('#answers_to_comment_answer_container' + objectId);
    loadMoreBtn = $('#load_more_answers_to_comment_answer_btn' + objectId);

  }


  skeletons.addClass('d-none');
  var objects = response['objects'];

  counter.html(response['counter']);
  container.append(objects);

  if (jQuery.inArray("", objects) != "-1") {
    loadMoreBtn.addClass('d-none');
  }
}





