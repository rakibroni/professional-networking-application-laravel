function switchDisplayState(hideId, showId) {
  $('#' + hideId).addClass('d-none');
  $('#' + showId).removeClass('d-none');
}

function jobsLogin() {
  // PARAMETERS
  var btnTextId = 'login_btn_text';
  var spinnerId = 'login_btn_spinner';
  var email = $('#email').val();
  var password = $('#password').val();
  var form = new FormData;
  // PREPARE EMAIL AND PASSWORD
  form.append('email', email);
  form.append('password', password);
  // VISUAL FEEDBACK FOR USER
  switchDisplayState(btnTextId, spinnerId);
  // AJAX, TRY TO LOGIN
  ajaxSetup();
  var functionsOnSuccess = [
    [switchDisplayState, [spinnerId, btnTextId]],
    [handleJobsLogin, ['response']]
  ];
  ajax('/jobs_login', 'POST', functionsOnSuccess, form);
}

function handleJobsLogin(response) {
  var emailError = response[0];
  var passwordError = response[1];
  var loginError = response[3];
  var loginSuccess = response[2];
  var username = '';
  $('#email_error').html(formatErrorMsg(emailError));
  $('#password_error').html(formatErrorMsg(passwordError));
  if (response[0] == '.' && response[1] == '.' && loginSuccess == "false") {
    $('#login_error').html(formatErrorMsg(loginError));
  }
  var loginRequestResponse = response;
  if (loginSuccess == false) {
    ajaxSetup();
    var functionsOnSuccess = [
      [getJobsPageNavbar, ['response']],
      [finishLogin, [loginRequestResponse]],
    ];
    ajax('/get_jobs_page_navbar', 'GET', functionsOnSuccess);
  }
}

function getJobsPageNavbar(response) {
  $('#jobs_page_navbar_container').html(response);
}

function finishLogin(response) {
  $('#jobs_login').css('transition', 'all .1s ease-in-out');
  $('#jobs_login').css('transform', 'scale(0,0)');
  setTimeout(() => {
    $('#jobs_login').css('transition', 'all .4s ease-in-out');
    $('#jobs_login').css('transform', 'scale(0,0)');
  }, 400);
  setTimeout(() => {
    $('#jobs_login').remove();
  }, 400);
  setTimeout(() => {

    loadSearchPage();
  }, 400);
}

function formatErrorMsg(errorMsg) {
  errorMsg = errorMsg.toString();
  errorMsg = errorMsg.replaceAll(".,", ". ");
  if (errorMsg.includes("Passwort Format ist ungültig.")) {
    errorMsg = "Format: Kombination aus mind. acht Ziffern, Groß- und Kleinbuchstaben.";
  }
  if (errorMsg == '.') {
    errorMsg = '';
  }
  return errorMsg;
}
function showJobsNavbar() {
  $('#jobs_page_navbar').animate({
    top: '0px'
  }, 200);
}
showJobsNavbar();
