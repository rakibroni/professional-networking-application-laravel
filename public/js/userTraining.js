function addTrainingInput(inputID) {
  var value = $('#' + inputID).val();
  if (value != '') {
    $('#' + inputID).get(0).focus();
    if (inputID.includes('training')) {
      if (isSelectedTraining(value) == false) {
        addToTrainingPreview(value);
      }
    }
  }
  $('#' + inputID).val('');
}



function selectSkill(id, inputID, dropdownID) {


  var text = document.getElementById(id).innerHTML;
  $('#' + inputID).get(0).focus();
  //$('#'+id).addClass("d-none");
  if (inputID.includes('training')) {
    $('#'+id).addClass("d-none");
    if (isSelectedTraining(text) == false) {
      addToTrainingPreview(text);
      $('#' + inputID).val('');
    }
  }
  if (inputID.includes('skill')) {
    if (isSelectedSkill(text) == false) {
      $('#'+id).addClass("d-none");
      addToSkillsPreview(text);
      $('#' + inputID).val('');
    }
  }
  if (inputID.includes('language')) {
    $('#'+inputID).val(text);
    $('#'+dropdownID).removeClass('d-block');
    if (!inputID.includes('level')) {
      //$('#'+id).addClass("d-none"); Das hier erst bei hinzufügen
    }
  }
  
}

var ANIM = 'animate__animated animate__zoomIn animate__faster';
var userTrainingCount = 0;
function addToTrainingPreview(string) {
  userTrainingCount = userTrainingCount + "_new";
  id_main = 'training_' + userTrainingCount;
  preview_id = 'training_preview_unsaved' + userTrainingCount;
  deleteId = 'training_delete_preview' + userTrainingCount;
  var innerID = 'inner_training_preview' + userTrainingCount;
  createUserTraining(string, userTrainingCount);
  userTrainingCount = parseInt(userTrainingCount.replace("_new", ""));
  userTrainingCount++;

  $('#training_preview').append(`
  <span id="` + preview_id + `"  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle" style="height:27px; margin-right: 15px; margin-bottom: 12px"><span id="` + innerID + `">` + string + `</span>
  <div class="delete-badge-profil2" onclick="removeTraining($('#'+this.id).parent().attr('id'))" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id)" id=` + deleteId + `>
  </div></span>`);
  $('#training').append(`<span id=` + id_main + ` class="badge ProfileTextWrap TextWrapStyle  me-1 mb-2">` + string + `</span>`);
  $('#' + preview_id).addClass(ANIM);
}

function createUserTraining(id, count) {
  var form = new FormData();
  form.append('name', id);
  ajaxSetup();
  $.ajax({async: true,
    url: '/create_user_training',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {

      var tempID_preview = 'training_preview_unsaved' + count;
      var finalIDpreview = 'training_preview_' + response;

      var tempID = 'training_' + count;
      var finalID = 'training_' + response;

      var tempInnerId = 'inner_training_preview' + count;
      var finalInnerId = 'inner_training_preview' + response;

      $('#' + tempID).attr('id', finalID);
      $('#' + tempInnerId).attr('id', finalInnerId);
      $('#' + tempID_preview).attr('id', finalIDpreview);
      setTimeout(() => {
        $('#' + finalIDpreview).removeClass(ANIM);
      }, 500);
    }
  });
}

function removeTraining(id) {
  if (!id.includes('unsaved')) {
    var ANIM = 'animate__animated animate__zoomOut animate__faster';
    $('#' + id).addClass(ANIM);
    $('#' + id).css('height', '18px').css('padding-top', '0px').css('padding-bottom', '0px').css('margin-top', '0px').css('margin-bottom', '0px');
    setTimeout(() => {
      $('#' + id).remove();
    }, 500);
    setTimeout(() => {
      $('#' + id).animate({ padding: 0, height: 0, width: 0, margin: 0 }, 200);
    }, 300);


    var mainID = id.replace('preview_', '');
    var form = new FormData();

    var deleteID = id.replace('training_preview_', '');


    var innerID = '#inner_training_preview'+deleteID;



    $('*[id*=' + 'training-search2-' + ']').each(function () {
      var value = $('#' + this.id).html().trim();
      var deleteValue = $(innerID).html().trim();

      if (value == deleteValue) {
        $('#'+this.id).removeClass("d-none");
      }
    });


    $('#' + mainID).remove();
    form.append('id', deleteID);
    ajaxSetup();
    $.ajax({async: true,
      url: '/delete_user_training',
      type: 'POST',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {

      }
    });
  }
}


var mouse_is_inside = false;
$('#training-input').on('mouseleave', function () {
  $('#search-dropdown-training2').removeClass('d-block');
});

$('#training-input').on('click', function () {
  $('#search-dropdown-training2').addClass('d-block');
});

var selectedTrainingsArray = [];
function getAllSelectedTrainings() {
  selectedTrainingsArray = [];
  $('*[id*=' + 'inner_training_preview' + ']').each(function () {
    var value = $('#' + this.id).first().html();
    selectedTrainingsArray.push(value);
  });
}
getAllSelectedTrainings();

var allTrainingsArray = [];
function getAllTrainings() {
  allTrainingsArray = [];
  $('*[id*=' + 'training-search2-' + ']').each(function () {
    var value = $('#' + this.id).html();
    if (isSelectedTraining(value)) {
      $('#' + this.id).addClass('d-none');
    }
    allTrainingsArray.push(value);
  });
}
getAllTrainings();

function isSelectedTraining(value) {
  getAllSelectedTrainings();
  var isSelectedTraining = false;
  for (var i = 0; i < selectedTrainingsArray.length; i++) {
    selectedTrainingsArray[i] = selectedTrainingsArray[i].trim();

    if (selectedTrainingsArray[i] == value) {
      isSelectedTraining = true;
    }
  }
  return isSelectedTraining;
}


