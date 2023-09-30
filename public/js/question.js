function question() {
  $('#submit_question').trigger('click');
}

var questionCategories = [];
function addCategoriesToArray(category) {
  questionCategories.push(category);
}

//store member question
$(function () {
  $('#question_form').on('submit', function (e) {
    e.preventDefault();

    //alert(questionCategories);
    var form = new FormData(this);

    for (var i = 0; i < questionCategories.length; i++) {
      form.append('questionCategories[]', questionCategories[i]);
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      async: true,
      url: '/question',
      method: 'post',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',

      success: function (response) {
        //console.log(response);
        $('#title_error').html(response[0]);
        $('#description_error').html(response[1]);

        if (response[0] == '.') {
          $('#title_error').html('');

        }
        if (response[1] == '.') {
          $('#description_error').html('');

        }
        if (response[2] == 'success') {
          //console.log(response[4]);
          $('#frage_modal').modal('hide'); $('#question_disclaimer_modal').modal('show')
          $('#frage_modal').modal('hide');
          //$('#new_question').prepend(response[3]);
          $('#job_description0add').val('');
          $('#question_modal_title').val('');
          $('#inputaa').val('');
          $('*[id*=' + 'aa' + ']').each(function () {
            if (this.id.includes('_delete')) {
              $('#'+this.id).trigger( "click" );

            }

          });
        }
      }
    });

  });
});

//index member question 

/*function loadQuestionPage(question_type) {
  hideAllPages();
  $('#question_grid').removeClass('d-none');
  if (typeof optional === 'undefined') { optional = 'default'; }
  if (optional == 'openModal') {
    $('#post_modal').modal('show');
  }

  $('#loaded_question').html('');
  //$('#posts_skeleton').removeClass('d-none');



  var form = new FormData();
  postCount = 0;
  lastMaxScroll = 0;
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/get_questions/' + question_type,
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#posts_skeleton').addClass('d-none');
      $('#loaded_question').html(response);
    }
  });
}*/
// load question comment
function loadQuestionComment(question_id) {
  var form = new FormData();
  form.append('question_id', question_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionComment, [question_id, 'response']]
  ];

  ajax('/question_comment_index', 'POST', functionsOnSuccess, form);
}

//load more question comment
function loadMoreComment(question_id) {

  var totalCurrentLoadComments = $(".comment-box-" + question_id).length; //current load comments 
  var totalComments = parseInt($(".total-comments-" + question_id).attr('data-total-comments-' + question_id));
  var form = new FormData();
  form.append('question_id', question_id);
  form.append('skip', totalCurrentLoadComments);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayLoadMoreQuestionComment, [question_id, totalComments, totalCurrentLoadComments, 'response']]
  ];

  ajax('/load_more_comment', 'POST', functionsOnSuccess, form);
}


// add question comment
function addQuestionComment(question_id) {
  var form = new FormData();
  var text = $('#question_comment_' + question_id).val();
  $('#question_comment_' + question_id).val('');
  form.append('text', text);
  form.append('question_id', question_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionComment, [question_id, 'response']]
  ];
  ajax('/add_question_comment', 'POST', functionsOnSuccess, form);
}




function displayQuestionComment(questionId, content) {

  $('#question_comments_' + questionId).html(content);
}

function displayLoadMoreQuestionComment(questionId, totalComments, totalCurrentLoadComments, content) {
  $('.comment-list-' + questionId).append(content);
  //alert(totalComments +'-'+ totalCurrentLoadComments);
  if (totalComments == totalCurrentLoadComments) {
    $(".load-more-" + questionId).html('keine weiteren Antworten');
  }
}

// load question comment reply
function loadQuestionCommentReply(question_comment_id) {
  var form = new FormData();
  form.append('question_comment_id', question_comment_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionCommentReply, [question_comment_id, 'response']]
  ];

  ajax('/question_comment_reply_index', 'POST', functionsOnSuccess, form);
}


function displayQuestionCommentReply(question_comment_id, content) {

  $('#question_comments_reply_' + question_comment_id).html(content);
}

// add question comment reply
function addQuestionCommentReply(question_comment_id) {
  var form = new FormData();
  var text = $('#comment_reply_textarea_' + question_comment_id).val();
  $('#comment_reply_textarea_' + question_comment_id).val('');
  form.append('text', text);
  form.append('question_comment_id', question_comment_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionCommentReply, [question_comment_id, 'response']]
  ];
  ajax('/add_question_comment_reply', 'POST', functionsOnSuccess, form);
}
function displayQuestionCommentReply(question_comment_id, content) {

  $('#question_comments_reply_' + question_comment_id).html(content);
}

//load more question comment reply
function loadMoreCommentReply(question_comment_id) {
  var totalCurrentLoadCommentReplies = $(".comment-reply-box-" + question_comment_id).length; //current load comments reply 
  var totalCommentReplies = parseInt($(".total-comments-reply-" + question_comment_id).attr('data-total-comment-replies-' + question_comment_id));
  var form = new FormData();
  form.append('question_comment_id', question_comment_id);
  form.append('skip', totalCurrentLoadCommentReplies);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayLoadMoreQuestionCommentReply, [question_comment_id, totalCommentReplies, totalCurrentLoadCommentReplies, 'response']]
  ];

  ajax('/load_more_comment_reply', 'POST', functionsOnSuccess, form);
}
function displayLoadMoreQuestionCommentReply(question_comment_id, totalCommentReplies, totalCurrentLoadCommentReplies, content) {
  $('.comment-reply-list-' + question_comment_id).append(content);
  //alert(totalComments +'-'+ totalCurrentLoadComments);
  if (totalCommentReplies == totalCurrentLoadCommentReplies) {
    $(".load-more-reply-" + question_comment_id).html('keine weiteren Antworten');
  }
}

//add comment likes
function addCommentLike(comment_id) {
  changeQuestionCommnentLikeImg('comment_like_', comment_id);

  var form = new FormData();
  form.append('comment_id', comment_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionCommentLikes, [comment_id, 'response']]
  ];
  ajax('/add_comment_like', 'POST', functionsOnSuccess, form);
}
function displayQuestionCommentLikes(comment_id, content) {
  $('#like_count_' + comment_id).html(content);
}
function changeQuestionCommnentLikeImg(comment_like_, id) {
  $('#' + comment_like_ + id).attr('src', '/images/active-helpful-icon.svg');
  $('#' + comment_like_ + id).attr('onclick', '');

  $('#' + comment_like_ + id).addClass("animate__animated animate__heartBeat animate__slow");
  setTimeout(function () {
    $('#' + comment_like_ + id).removeClass("animate__animated animate__heartBeat animate__slow");
    $('#' + comment_like_ + id).attr('onclick', 'removeCommentLike(' + id + ')');
  },
    500);
}

// delete comment like

function removeCommentLike(comment_id) {
  changeDislikeImg('comment_like_', comment_id);

  var form = new FormData();
  form.append('comment_id', comment_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionCommentLikes, [comment_id, 'response']]
  ];
  ajax('/add_comment_like', 'POST', functionsOnSuccess, form);
}
function displayQuestionCommentLikes(comment_id, content) {
  $('#like_count_' + comment_id).html(content);
}
function changeDislikeImg(comment_like_, id) {
  $('#' + comment_like_ + id).attr('src', 'images/helpful-icon.svg');
  $('#' + comment_like_ + id).attr('onclick', 'addCommentLike(' + id + ')');
}
//load right side panel 
function loadRightSidePanel() {
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestionRighrSidePanel, ['response']]
  ];

  ajax('/get_question_right_side_panel', 'GET', functionsOnSuccess);

}
function displayQuestionRighrSidePanel(content) {
  $('#right_side_panel_question').html(content);
}
//load text for question description
function loadQuestionDescription(question_id){
  if ($("#portfolio_"+question_id).hasClass("readmore")) {
    $("#expandbtn_"+question_id).html("Mehr anzeigen");
    $("#portfolio_"+question_id).removeClass("readmore");
  } else {
    $("#expandbtn_"+question_id).html("Zeige weniger");
    $("#portfolio_"+question_id).addClass("readmore");
  }
}
// question post scroll down
// GET ALL POSTS IDS AND COMBINE




// var loadingPost = false;
// var postCount = 0;

// var lastMaxScroll = 0;
// var feedURL = window.location.toString();

// $(window).scroll(function () {
//   if (feedURL.includes('/feed') && !feedURL.includes('/feed/'))
//     var lengthOfAllPostsCombined = calcPostsHeight();

//   if (lengthOfAllPostsCombined != 0) {
//     var scrollBottom = $(window).scrollTop() + $(window).height();
//     if (scrollBottom >= lengthOfAllPostsCombined / 5 && lastMaxScroll <= scrollBottom) {


//       if (loadingPost == false) {

//         loadingPost = true;
//         var form = new FormData();
//         form.append('count', postCount);




//         $.ajax(
//           {
//             url: '/load_next_post',
//             type: 'POST',
//             data: form,
//             processData: false,
//             contentType: false,
//             dataType: 'json',
//             beforeSend: function () {

//             },
//             success: function (response) {
//               // in html ballern
//               // update lenghtofpostcombined
//               //
//               //

//               for (var i = 0; i < response.length - 1; i++) {

//                 $('#loaded_posts').append(response[i]);

//                 var height = $('#' + 'post-scroll-' + response[i + 1]).height();

//                 lengthOfAllPostsCombined += height;

//                 lastMaxScroll = $(window).scrollTop() + $(window).height();

//                 i++;
//               }
//               loadingPost = false;
//               var sub = response.length / 2;
//               postCount += sub;
//             }
//           });
//       }
//     }
//   }
// });

// function calcPostsHeight() {
//   var sum = 0;
//   $('*[id*=' + 'post-scroll-' + ']').each(function () {

//     var height = $('#' + this.id).height();
//     if (height != 0) {
//       //
//     }
//     sum += height;
//   });
//   return sum;
// }


