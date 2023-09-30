function answerComment(id, type) {



  switch (type) {
    case 'comment':
      $('#comment_collapse' + id).collapse('hide');
      var text = $('#comment_answer_text' + id).val();
      $('#comment_answer_text' + id).val('');
      break;
    case 'answer':
      $('#comment_answer_collapse' + id).collapse('hide');
      var text = $('#comment_answer_answer_text' + id).val();
      $('#comment_answer_answer_text' + id).val('');
      break;
    case 'answerToAnswer':
      $('#comment_answer_collapse' + id).collapse('hide');
      var text = $('#comment_answer_answer_text' + id).val();
      $('#comment_answer_answer_text' + id).val('');
      break;
  }




  var form = new FormData;
  if (text != '') {
    $('#add_comment_answer_skeleton' + id).removeClass('d-none');
    form.append('id', id);
    form.append('text', text);



    form.append('type', type);
    var functionsOnSuccess = [
      [displayCommentAnswer, ['response', id, type]]
    ]
    ajax('/create_comment_answer', 'POST', functionsOnSuccess, form);
  }
}

function displayCommentAnswer(response, id, type) {

  var idArray = response['idArray'];
  var counter;

  $('#add_comment_answer_skeleton' + id).addClass('d-none');
  switch (type) {
    case 'comment':
      $('#answers_to_comment' + id).prepend(response['commentAnswer']);
      $('#comment_answers_count' + id).html(response['commentAnswerCount']);
      break;

    case 'answer':

      for (var i = 0; i < idArray.length; i++) {
        if ($('#comment_answer_answer_count' + idArray[i]).length != 0) {
          counter = parseInt($('#comment_answer_answer_count' + idArray[i]).html()) + 1;
          $('#comment_answer_answer_count' + idArray[i]).html(counter);

        } 
        if ($('#comment_answers_count' + idArray[i]).length != 0) {
          counter = parseInt($('#comment_answers_count' + idArray[i]).html()) + 1;
          $('#comment_answers_count' + idArray[i]).html(counter);
        }
      }
      $('#answers_to_comment_answer' + id).prepend(response['commentAnswer']);
      break;

    case 'answerToAnswer':

      for (var i = 0; i < idArray.length; i++) {
        if ($('#comment_answer_answer_count' + idArray[i]).length != 0) {
          counter = parseInt($('#comment_answer_answer_count' + idArray[i]).html()) + 1;
          $('#comment_answer_answer_count' + idArray[i]).html(counter);
 
        } else {
        
        }
        if ($('#comment_answers_count' + idArray[i]).length != 0) {
          counter = parseInt($('#comment_answers_count' + idArray[i]).html()) + 1;
          $('#comment_answers_count' + idArray[i]).html(counter);
        }
      }
      $('#answers_to_comment_answer' + id).prepend(response['commentAnswer']);

      break;
  }

}