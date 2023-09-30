var url = decodeURI(window.location);

// ON PAGE LOAD OR REFRESH
handleURL(url);

// LOAD PAGE CONTENT
function handleURL(url) {
  // FEED
  if (url.includes('/my-questions')) {
    loadQuestionsCreatedByUser();
  }
  if (url.includes('/questions-for-me')) {
    loadQuestionsForExpert();
  }
}


function loadQuestionsCreatedByUser() {


  changeBtnColor('feed1');
  hideAllPages();

  $('#load_more_questions_btn').removeClass('d-none');
  $('#load_more_questions_btn').attr("onclick","loadMoreQuestions(1, 'BYUSER')");


  $('#feed_grid').removeClass('d-none');
  changeColorOfFeedNavigation('navigate_to_users_questions');
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

  window.history.pushState("", "", '/my-questions');
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestions, ['response']]
  ]
  ajax('/get_questions/BYUSER/0/10', 'GET', functionsOnSuccess);
}

function loadQuestionsForExpert() {

  changeBtnColor('feed1');
  hideAllPages();
  $('#load_more_questions_btn').removeClass('d-none');
  $('#load_more_questions_btn').attr("onclick","loadMoreQuestions(1, 'FOREXPERT')");


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

  window.history.pushState("", "", '/questions-for-me');
  ajaxSetup();
  var functionsOnSuccess = [
    [displayQuestions, ['response']]
  ]
  ajax('/get_questions/FOREXPERT/0/10', 'GET', functionsOnSuccess);
}

var questionsCounter = 0;
function loadMoreQuestions(amount, route) {
  amount = parseInt(amount);

  var skip = 9 + amount + questionsCounter;
  ajaxSetup();
  var functionsOnSuccess = [
    [appendQuestions, ['response']]
  ]
  //console.log(skip);
 
  ajax('/get_questions/'+route+'/+'+skip+'/1', 'GET', functionsOnSuccess);
}

function appendQuestions(questions) {
  questionsCounter++;
  //alert(questions);
  if (questions[0].trim() == '') {
    $('#load_more_questions_btn').addClass('d-none');
  } else {
    $('#all_questions').append(questions[0]);
  }

}