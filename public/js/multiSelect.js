function removeItem(id, itemId, inputId) {

  var preview = $('#' + itemId).parent();
  var previewID = preview.attr('id');
  var ANIM = 'animate__animated animate__zoomOut animate__faster';
  var item = $('#' + itemId);
  var deleteBadge = $('#' + item.children()[1].id);

  deleteBadge.remove();
  item.addClass(ANIM);
  item.animate({
    marginTop: 0,
    marginBottom: 0,
    paddingTop: 0,
    paddingBottom: 0
  }, 0);
  setTimeout(() => {
    item.remove();


    if (preview.html().trim() == '') {
      preview.removeClass('mt-2 mb-1');
    }
  }, 500);
  setTimeout(() => {
    item.fadeOut(100);
  }, 400);

  $('*[id*=' + inputId + '-]').each(function () {
    var value = $('#' + this.id).html().trim();
    var deleteValue = $('#' + item.children()[0].id).html().trim();
    if (value == deleteValue) {
      $('#' + this.id).removeClass("d-none");
      $('#' + this.id).removeClass("inPreview");
    }
  });


  if (typeof searchTalents === "function") {
    searchTalents();
  }



}

var count = 0;
function addToItemsPreview(inputId, value, optionalInputId, optionalInputValue, checkIfInList) {
 // console.log("adding");
  // HANDLE OPTIONAL PARAMETERS
  if (typeof optionalInputId === 'undefined') {
    optionalInputId = '';
  }

  if (typeof optionalInputId === 'undefined') {
    checkIfInList = true;
  }

  if (typeof optionalInputValue === 'undefined') {
    optionalInputValue = 'default';
  }
  optionalInputValue = optionalInputValue.trim();
  // CHECK IF SELECTED ITEM IS PART OF THE DROPDOWN LIST
  var foundInList = false;
  $('*[id*=' + inputId + '-]').each(function () {
    //console.log(this.id);
    var compareValue = $('#' + this.id).html();
    //console.log('#'+compareValue+"#" + "==" + "#"+value+"#");
    if (value == compareValue) {
      foundInList = true;
    }
  });

  if (checkIfInList) {
    if (optionalInputValue != 'default') {
      foundInList = false;
      $('*[id*=' + optionalInputId + '-]').each(function () {
        var compareValue = $('#' + this.id).html().trim();
        if (optionalInputValue == compareValue) {
          foundInList = true;
        }
      });
    }
  }
  ///console.log(foundInList);
  if (foundInList | !checkIfInList) {
    if (optionalInputValue == 'default' || optionalInputValue != 'default' && optionalInputValue != '' && value != '') {

      if (optionalInputValue != 'default') {
        optionalInputValue = ' (' + optionalInputValue + ') ';
        $('#' + inputId).val('');
        $('#' + optionalInputId).val('');
      } else {
        optionalInputValue = '';
      }

      // PREPARE IDS & FUNCTIONS
      var mainId = inputId + '_' + count;
      var deleteId = mainId + '_delete';
      var innerId = mainId + '_inner';
      var preview = $('#' + inputId + '_preview');
      var itemClasses =
        " d-inline-block position-relative example-box-style unselectable pointer-on-hover me-2 mb-2"; // needs to contain fixed height somewhere!
      var onclick = "removeItem(this.id , $('#'+this.id).parent().attr('id'),'" + inputId + "')";
      var onmouseleave = "removeDeleteAnimMultiSelect(this.id)";
      var onmouseenter = "addDeleteAnimMultiSelect(this.id)";

      // APPEND ITEM TO PREVIEW
      count++;

      if (preview.html().trim() == '') {
        preview.addClass(" mt-2 mb-1");
      }

      preview.append(`
      <div id=` + mainId + ` class="` + itemClasses + `" style="max-width: 231px">
        <div class="hide-overflow-text mx-2" id=` + innerId + `>` + value + optionalInputValue + `</div>
        <div class="delete-badge float-end" onclick="` + onclick + `" onmouseleave="` + onmouseleave +
        `" onmouseenter="` +
        onmouseenter + `" id=` + deleteId + `>
        </div>
      </div>`);
      // CHECK IF PREVIEW NOT EMPTY HERE


      // REMOVE ITEM FROM DROPDOWN
      $('*[id*=' + inputId + '-]').each(function () {
        var compareValue = $('#' + this.id).html();
        if (value == compareValue) {
          $('#' + this.id).addClass('d-none');
          $('#' + this.id).addClass('inPreview');
        }
      });
    }
  }
}

function selectItem(id, inputId, optional) {
  var text = $('#' + id).html();
  $('#' + inputId).get(0).focus();

  if (typeof optional === 'undefined') {
    optional = 'default';
    $('#' + inputId).val('');
    addToItemsPreview(inputId, text);
  } else {
    $('#' + inputId).val(text.trim());
    $('#' + inputId + '_dropdown').addClass('d-none');
  }
}




function filterInput(id) {
  // VARIABLES
  var input, filter, dropdownId, dropdownItems, dropdownItemsHidden, dropdownItemValue, i;
  input = $('#' + id);
  dropdownId = id + '_dropdown';
  filter = input.val().toUpperCase();
  dropdown = $('#' + dropdownId);
  dropdownItems = dropdown.find("div");
  dropdownItemsHidden = dropdown.find("div:hidden");

  // INNER FUNCTIONS
  function hideDropdown() {
    dropdown.addClass("d-none");
  }

  function showDropdown() {
    dropdown.removeClass('d-none');
  }

  function showDropdownItem(i) {
    // CHECK IF ITEM IS NOT ALREADY IN PREVIEW
    if (!dropdownItems.eq(i).hasClass('inPreview')) {
      dropdownItems.eq(i).removeClass('d-none');
    }
  }

  function hideDropdownItem(i) {
    dropdownItems.eq(i).addClass('d-none');
  }

  if (filter.length == 0) {
    hideDropdown();
  } else {
    showDropdown();

    for (i = 0; i < dropdownItems.length; i++) {
      // GET VALUE OF DROPDOWN ITEM
      dropdownItemValue = dropdownItems[i].textContent || dropdownItems[i].innerText;
      // UPDATE COUNT OF HIDDEN ITEMS 
      dropdownItemsHidden = dropdown.find("div:hidden");
      // The indexOf() method returns the first index at which a given element can be foundInList in the array, or -1 if it is not present.
      if (dropdownItemValue.toUpperCase().indexOf(filter) > -1) {
        showDropdownItem(i);
      } else {
        hideDropdownItem(i);
      }
    }

    // HIDE DROPDOWN IF NO ITEMS ARE foundInList
    if (dropdownItemsHidden.length == dropdownItems.length) {
      hideDropdown();
    }
  }

  // SHOW ALL ITEMS IF INPUT IS EMPTY
  if (input.val() == '') {
    for (i = 0; i < dropdownItems.length; i++) {
      showDropdownItem(i);
    }
    showDropdown();
  }
}

function closeDropdownOnOutsideClick(inputID, e) {
  var dropdownID = inputID + '_dropdown';

  var inputClick = true;
  var dropdownClick = true;

  // CHECK IF DROPDOWN IS CLICKED
  var dropdown = $('#' + dropdownID);
  if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
    dropdownClick = false;
  }

  // CHECK IF INPUT IS CLICKED
  var input = $('#' + inputID);
  if (!input.is(e.target) && input.has(e.target).length === 0) {
    inputClick = false;
  }

  // CLOSE DROPDOWN WHEN THE CLICK IS NOT ON THE INPUT FIELD NOR THE DROPDOWN
  if (!inputClick && !dropdownClick) {
    $('#' + dropdownID).removeClass('d-block');
  }
}

// ANIMATIONS
function removeDeleteAnimMultiSelect(id) {
  $('#' + id).css('transform', 'scale(1,1)');
  $('#' + id).css('transform', 'scale(1,1)');
}

function addDeleteAnimMultiSelect(id) {

  $('#' + id).css('transition', 'all .1s ease-in-out');
  $('#' + id).css('transform', 'scale(1.1,1.1)');
}

/*$(document).on('mouseup', function (e) {
  for (var i = 0; i < inputs.length; i++) {
    closeDropdownOnOutsideClick(inputs[i], e);
  }
});*/


function getAllSelectedItems(id) {
  selectedTrainingsItems = [];
  $('*[id*=' + '_inner' + ']').each(function () {
    if (this.id.includes(id)) {
      var value = $('#' + this.id).first().html();
      selectedTrainingsItems.push(value);
    }
  });
  return selectedTrainingsItems;
}


getAllSelectedItems();
// CAN BE USED FOR DISPLAYING ITEMS THAT WERE SAVED IN A SEARCH
// LOOP OVER ALL SAVED ITEMS...
//addToItemsPreview('input0', 'Praxisanleiter*in');