function updateInnerHTMLs(id, value) {

  $('*[id*=' + id + ']*').each(function () {
    $('#' + this.id).html(value);
  });
}

function closeDropdownOnOutsideClick(inputID, e) {
  var dropdownID = 'dropdown-' + inputID;
  var inputClick = true;
  var dropdownClick = true;


  //var container = $("#dropdown-language-search4");
  var container = $('#' + dropdownID);

  // if the target of the click isn't the container nor a descendant of the container
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    dropdownClick = false;
  }

  //var container = $("#language-search4");
  var container = $('#' + inputID);

  // if the target of the click isn't the container nor a descendant of the container
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    inputClick = false;
  }

  if (!inputClick && !dropdownClick) {
    $('#' + dropdownID).removeClass('d-block');
  }
}




function ajaxSetup() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
}


function ajax(url, method, functionsOnSuccess, form) {
  if (typeof form === 'undefined') { form = new FormData; }
  if (typeof functionsOnSuccess === 'undefined') { functionsOnSuccess = []; }
  ajaxSetup();
  $.ajax({
    url: url,
    type: method,
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    error: function() {
      //console.log("ajax error"+url);
    },
    success: function (response) {
    
      for (var j = 0; j < functionsOnSuccess.length; j++) {
        for (var i = 0; i < functionsOnSuccess[j][1].length; i++) {
          if (functionsOnSuccess[j][1][i] == "response") {
            functionsOnSuccess[j][1][i] = response;
          }
        }
        functionsOnSuccess[j][0].apply(this, functionsOnSuccess[j][1]);
      }
    }
  });
}

var STRIP_COMMENTS = /((\/\/.*$)|(\/\*[\s\S]*?\*\/))/mg;
var ARGUMENT_NAMES = /([^\s,]+)/g;
function getParamNames(func) {
  var fnStr = func.toString().replace(STRIP_COMMENTS, '');
  var result = fnStr.slice(fnStr.indexOf('(') + 1, fnStr.indexOf(')')).match(ARGUMENT_NAMES);
  if (result === null)
    result = [];
  return result;
}