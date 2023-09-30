function addSkillInput(inputID) {
  var value = $('#' + inputID).val();
  if (value != '') {
    $('#' + inputID).get(0).focus();
    if (isSelectedSkill(value) == false) {
      addToSkillsPreview(value);
    }
  }
  $('#' + inputID).val('');
}

var ANIM = 'animate__animated animate__zoomIn animate__faster';
var userskillCount = 0;

function addToSkillsPreview(string) {
  userskillCount = userskillCount + "_new";
  id_main = 'skill_' + userskillCount;
  preview_id = 'skill_preview_unsaved' + userskillCount;
  deleteId = 'skill_delete_preview' + userskillCount;
  var innerID = 'inner_skill_preview' + userskillCount;
  createUserskill(string, userskillCount);
  userskillCount = parseInt(userskillCount.replace("_new", ""));
  userskillCount++;

  $('#skill_preview').append(`
  <span id="` + preview_id + `"  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle" style="height:27px; margin-right: 15px; margin-bottom: 12px"><span id="` + innerID + `">` + string + `</span>
  <div class="delete-badge-profil2" onclick="removeSkill($('#'+this.id).parent().attr('id'))" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id)" id=` + deleteId + `>
  </div></span>`);
  $('#skills').append(`<span id=` + id_main + ` class="badge ProfileTextWrap TextWrapStyle me-1 mb-2">` + string + `</span>`);
  $('#' + preview_id).addClass(ANIM);
}


var allSkillsArray = [];
function getAllSkills() {
  allSkillsArray = [];
  $('*[id*=' + 'skill-search3-' + ']').each(function () {
    var value = $('#' + this.id).html();

    if (isSelectedSkill(value)) {

      $('#'+this.id).addClass("d-none");
    }
    allSkillsArray.push(value);
  });
}
getAllSkills();



var selectedSkillsArray = [];
function getAllSelectedSkills() {
  selectedSkillsArray = [];
  $('*[id*=' + 'inner_skill_preview' + ']').each(function () {
    var value = $('#' + this.id).first().html();
    selectedSkillsArray.push(value);
  });
}
getAllSelectedSkills();

function isSelectedSkill(value) {
  getAllSelectedSkills();
  var isSelected = false;
  for (var i = 0; i < selectedSkillsArray.length; i++) {
    selectedSkillsArray[i] = selectedSkillsArray[i].trim();
    
    if (selectedSkillsArray[i] == value) {
      isSelected = true;
    }
  }
  return isSelected;
}

function createUserskill(id, count) {
  var form = new FormData();
  form.append('name', id);
  ajaxSetup();
  $.ajax({async: true,
    url: '/create_user_skill',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      var tempID_preview = 'skill_preview_unsaved' + count;
      var finalIDpreview = 'skill_preview_' + response;

      var tempID = 'skill_' + count;
      var finalID = 'skill_' + response;

      var tempInnerId = 'inner_skill_preview' + count;
      var finalInnerId = 'inner_skill_preview' + response;

      $('#' + tempID).attr('id', finalID);
      $('#' + tempInnerId).attr('id', finalInnerId);
      $('#' + tempID_preview).attr('id', finalIDpreview);
      setTimeout(() => {
        $('#' + finalIDpreview).removeClass(ANIM);
      }, 500);
    }
  });
}





function removeSkill(id) {
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

    var deleteID = id.replace('skill_preview_', '');

    form.append('id', deleteID);
    ajaxSetup();
    var innerID = '#inner_skill_preview'+deleteID;



    $('*[id*=' + 'skill-search3-' + ']').each(function () {
      var value = $('#' + this.id).html().trim();
      var deleteValue = $(innerID).html().trim();

      if (value == deleteValue) {
        $('#'+this.id).removeClass("d-none");
      }
    });

    $('#' + mainID).remove();

    $.ajax({async: true,
      url: '/delete_user_skill',
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
$('#skill-input').on('mouseleave', function () {
  $('#search-dropdown-skill3').removeClass('d-block');
});

$('#skill-input').on('click', function () {
  $('#search-dropdown-skill3').addClass('d-block');
});



