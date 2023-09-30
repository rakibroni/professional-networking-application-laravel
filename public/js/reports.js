
var message = '';
var type = '';
var reportedUserFullName = '';
var typeId = '';
var optionalTypeId = '';
var reportedUserUsername;

function reportPost() {
  var reportForm = $('#report_form');
  var formHeight = reportForm.height();
  var thankForReportingMessage = $('#thanks_for_reporting_message_box');


  reportForm.fadeOut(200, function () {
    thankForReportingMessage.fadeIn(0);
    thankForReportingMessage.height(formHeight);
    setTimeout(() => {
      $('#report_modal').modal('hide');
    }, 800);
  });

  reportMessage = $('#report_message').val();


  var form = new FormData;
  form.append('type', type);
  form.append('reportedUserUsername', reportedUserUsername);
  form.append('typeId', typeId);
  form.append('optionalTypeId', optionalTypeId);
  form.append('reportMessage', reportMessage);


  
  // Mehrmaliges reporting hier verhindern
  var functionsOnSuccess = [];
  ajax('/create_report', 'POST', functionsOnSuccess, form)
}



function openReportModal(reportedUserFullName, reportedUserUsername, type, typeId, optionalTypeId) {
  if (typeof optionalTypeId === 'undefined') {
    optionalTypeId = 'default';
  }

  var reportForm = $('#report_form');
  var thankForReportingMessage = $('#thanks_for_reporting_message_box');
  reportForm.fadeIn(0);
  thankForReportingMessage.fadeOut(0);

  $('#report_message').val('');
  $('#report_modal').modal('show');
  $('#reported_user_full_name').html(reportedUserFullName);
  this.type = type;
  this.reportedUserFullName = reportedUserFullName;
  this.typeId = typeId;
  this.optionalTypeId = optionalTypeId;
  this.reportedUserUsername = reportedUserUsername; 
  // TITEL ÄNDERN BASUEREND AZF TYP
  if (type == 'post') {
    $('#report_modal_title').html('Beitrag melden');
  }
  if (type == 'comment') {
    $('#report_modal_title').html('Kommentar melden');
  }


}



