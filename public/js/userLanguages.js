var ANIM = 'animate__animated animate__zoomIn animate__faster';
var tempItemCounter = 0;
function handleItemInput(inputID, optionalInputID) {
  // HANDLE OPTIONAL INPUT ID
  if (typeof optionalInputID === 'undefined') { optionalInputID = 'default'; }

  // GET INPUT VALUES
  var inputValue = $('#' + inputID).val();
  if (optionalInputID != 'default') {
    var optionalInputValue = $('#' + optionalInputID).val();
  }

  var plural = '';
  var innerID = '';
  var itemCategory = '';
  var idPrefix = 'inner_language_preview';
  var deleteUrl;
  
  if (inputID.includes('lang')) {
    itemCategory = 'language';
    idPrefix = 'inner_' + itemCategory + '_preview';
    plural = 'languages';
    url = '/save_user_language'
  }
  if (inputID.includes('training')) {
    itemCategory = 'training';
    idPrefix = 'inner_' + itemCategory + '_preview';
    plural = 'training';
  }
  if (inputID.includes('skill')) {
    itemCategory = 'skill';
    idPrefix = 'inner_' + itemCategory + '_preview';
    plural = 'skills';
  }

  if (inputValue != '' && optionalInputValue == 'default' || (optionalInputValue != 'default' && inputValue != '' && optionalInputValue != '')) {
    $('#' + inputID).get(0).focus();
    if (isSelectedItem(inputValue, idPrefix) == false) {
      $('#language_error').addClass('d-none');
      id_main = itemCategory + '_' + tempItemCounter;
      preview_id = itemCategory + '_preview_unsaved' + tempItemCounter;
      deleteId = itemCategory + '_delete_preview' + tempItemCounter;
      innerID = idPrefix + tempItemCounter;


      if (optionalInputValue != '') {
        optionalInputValue = '(' + optionalInputValue + ')';
      } else {
        optionalInputValue = '';
      }
      addItemToPreview(itemCategory, plural, innerID, preview_id, idPrefix, inputID, optionalInputID, inputValue, optionalInputValue);
      saveItem(inputValue, optionalInputValue, tempItemCounter, itemCategory);

      tempItemCounter++;
    }
  } else {
    if (itemCategory == 'language') {
      $('#language_error').removeClass('d-none');
      $('#language_error').html('Beide Felder müssen ausgefüllt sein.');
      $('#dropdown-' + inputID).removeClass('d-block');
      $('#dropdown-' + optionalInputID).removeClass('d-block');
    }
  }
}

function saveItem(inputValue, optionalInputValue, tempItemCounter, itemCategory) {
  // HANDLE OPTIONAL INPUT ID
  if (typeof optionalInputValue === 'undefined') {
    optionalInputValue = 'default';
  } else {
    optionalInputValue = optionalInputValue.replace('(', '').replace(')', '');
  }

  var form = new FormData();
  form.append('value', inputValue);
  form.append('optionalValue', optionalInputValue);
  form.append('itemCategory', itemCategory);
  ajaxSetup();
  $.ajax({async: true,
    url: '/create_user_item',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      var tempID_preview = itemCategory + '_preview_unsaved' + tempItemCounter;
      var finalIDpreview = itemCategory + '_preview_' + response;

      var tempID = itemCategory + '_' + tempItemCounter;
      var finalID = itemCategory + '_' + response;

      var tempInnerId = 'inner_' + itemCategory + '_preview' + tempItemCounter;
      var finalInnerId = 'inner_' + itemCategory + '_preview' + response;

      $('#' + tempID).attr('id', finalID);
      $('#' + tempInnerId).attr('id', finalInnerId);
      $('#' + tempID_preview).attr('id', finalIDpreview);

      setTimeout(() => {
        $('#' + finalIDpreview).removeClass(ANIM);
      }, 500);
    }
  });
}


function addItemToPreview(itemCategory, plural, innerID, preview_id, idPrefix, inputID, optionalInputID, inputValue, optionalInputValue) {
  $('#' + plural + '_preview').append(`<span id="` + preview_id + `"  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle" style="height:27px; margin-right: 15px; margin-bottom: 12px"><span id="` + innerID + `">` + inputValue + `</span> ` + optionalInputValue + `
        <div class="delete-badge-profil2" onclick="removeItem($('#'+this.id).parent().attr('id'), '`+ itemCategory + `')" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id)" id=` + deleteId + `>
        </div></span>`);
  $('#' + plural).append(`<span id=` + id_main + ` class="badge ProfileTextWrap TextWrapStyle  me-1 mb-2">` + inputValue + ' ' + optionalInputValue + `</span>`);
  $('#' + preview_id).addClass(ANIM);
  
  $('#' + inputID).val('');
  $('#dropdown-' + inputID).removeClass('d-block');
  if (optionalInputID != '') {
    $('#' + optionalInputID).val('');
    $('#dropdown-' + optionalInputID).removeClass('d-block');
  }

  $('[id=' + inputID + '-' + ']').each(function () {
    var value = $('#' + this.id).html();
    if (value == inputValue) {
      $('#' + this.id).addClass('d-none');
    }
  });
}

function isSelectedItem(value, innerInputID) {
  var selectedItemsArray = getSelectedItems(innerInputID);
  var isSelected = false;
  for (var i = 0; i < selectedItemsArray.length; i++) {
    selectedItemsArray[i] = selectedItemsArray[i].trim();

    if (selectedItemsArray[i] == value) {
      isSelected = true;
    }
  }
  return isSelected;
}

function getSelectedItems(innerInputID) {
  var selectedItemsArray = [];
  $('*[id*=' + innerInputID + ']').each(function () {
    var value = $('#' + this.id).first().html();

    selectedItemsArray.push(value);
  });

  return selectedItemsArray;
}

function getAllItems(inputID, innerID) {
  var allSkillsArray = [];
  $('*[id*=' + inputID + ']').each(function () {
    var value = $('#' + this.id).html();

    if (isSelectedItem(value, innerID)) {
      
      $('#' + this.id).addClass("d-none");
    }
    allSkillsArray.push(value);
  });
}
getAllItems('language-search4-', 'inner_language_preview');





// ERST ADD ITEM !
function removeItem(id, itemCategory) {

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

    var form = new FormData();
    var mainID = id.replace('preview_', '');

    var deleteID = '';
    var searchID = '';
    deleteID = id.replace(itemCategory+'_preview_', '');

    if (id.includes('language')) {
      searchID = 'language-search4-';
    }

    
    var innerID = '#inner_' + itemCategory + '_preview' + deleteID;
    

    $('*[id*=' + searchID + ']').each(function () {
      var value = $('#' + this.id).html().trim();
      var deleteValue = $(innerID).html().trim();
      if (value == deleteValue) {  
        $('#' + this.id).removeClass("d-none");
      }
    });


    $('#' + mainID).remove();

    form.append('id', deleteID);
    form.append('itemCategory', itemCategory);
    ajaxSetup();
    $.ajax({async: true,
      url: '/delete_user_item',
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


$(document).on('mouseup', function(e) 
{
  closeDropdownOnOutsideClick('language-search4', e);
  closeDropdownOnOutsideClick('language-level-search4', e);
  closeDropdownOnOutsideClick('skill-search3', e);
  closeDropdownOnOutsideClick('training-search2', e);
});


