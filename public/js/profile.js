////////
//TABS//
////////
function showInfos() {
  if (document.getElementById("page1").style.display != "none") {
    document.getElementById("page1").classList.add("d-none");
    document.getElementById("loader").classList.remove("d-none");

    setTimeout(function () {

      document.getElementById("loader").classList.add("d-none");
      document.getElementById("page0").classList.remove("d-none");
    }, 1000);


    createUser();
  }
  if (document.getElementById("page2").style.display != "none") {
    document.getElementById("page2").classList.add("d-none");
    document.getElementById("loader").classList.remove("d-none");

    setTimeout(function () {

      document.getElementById("loader").classList.add("d-none");
      document.getElementById("page0").classList.remove("d-none");
    }, 1000);
    createUser();
  }
}

function showPosts() {
  if (document.getElementById("page0").style.display != "none") {
    document.getElementById("page0").classList.add("d-none");
    document.getElementById("loader").classList.remove("d-none");

    setTimeout(function () {

      document.getElementById("loader").classList.add("d-none");
      document.getElementById("page1").classList.remove("d-none");
    }, 1000);


    createUser();
  }
  if (document.getElementById("page2").style.display != "none") {
    document.getElementById("page2").classList.add("d-none");
    document.getElementById("loader").classList.remove("d-none");

    setTimeout(function () {

      document.getElementById("loader").classList.add("d-none");
      document.getElementById("page1").classList.remove("d-none");
    }, 1000);
    createUser();
  }

}

function showConnections() {
  if (document.getElementById("page0").style.display != "none") {
    document.getElementById("page1").classList.add("d-none");
    document.getElementById("loader").classList.remove("d-none");

    setTimeout(function () {

      document.getElementById("loader").classList.add("d-none");
      document.getElementById("page1").classList.remove("d-none");
    }, 2000);

    document.getElementById("page1").classList.add("d-none");
    createUser();
  }
}

function ShowConnectionRequest() {
  if (document.getElementById("ConnectionSend").style.display != "none") {
    document.getElementById("ConnectionRequest").classList.add("d-none");
    document.getElementById("ConnectionSend").classList.remove("d-none");
    createUser();
  }
}

function ShowConnectionRequestBack() {
  if (document.getElementById("ConnectionRequest").style.display != "none") {
    document.getElementById("ConnectionSend").classList.add("d-none");
    document.getElementById("ConnectionRequest").classList.remove("d-none");
    createUser();
  }
}

///////////////////
//POSITION & CITY//
///////////////////

function fillInput(id, inputID, dropdownID) {
  var text = document.getElementById(id).innerHTML;
  document.getElementById(inputID).value = text;
  document.getElementById(dropdownID).classList.remove("d-block");
}

function filterFunction1(id, dropdownID) {
  //
  $('#position_error').addClass("d-none");
  var input, filter, ul, li, a, i;
  input = document.getElementById(id);


  filter = input.value.toUpperCase();
  div = document.getElementById(dropdownID);
  a = div.getElementsByTagName("div");

  if (document.getElementById(id).value.length == 0) {
    $('#' + dropdownID).removeClass("d-block");
    $('#' + dropdownID).addClass("pm0");
  } else {
    $('#' + dropdownID).removeClass("pm0");
    $('#' + dropdownID).addClass("d-block");
    var hiddenCount = 0;
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        hiddenCount++;
        a[i].style.display = "none";
      }
    }
    if (hiddenCount == a.length) {
      $('#' + dropdownID).removeClass("d-block");
    }
  }
  document.getElementById('position-search').scrollIntoView(true);

  if ($('#' + id).val() == '') {
    div = document.getElementById(dropdownID);
    a = div.getElementsByTagName("div");
    for (i = 0; i < a.length; i++) {
      a[i].style.display = "";
    }
    $('#' + dropdownID).addClass("d-block");
  }
}




// FÜR PROFILE BILD DISCARD AUCH WICHTIG  

////////////////
//USER SUMMARY//
////////////////

function getSummary(mode) {
  var form = new FormData();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: '/get_user_summary',
    type: 'get',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      if (mode == "check") {
        var summary = $('#summary').val();

        summary = summary.replace(/\s+/g, '');
        response = response.replace(/(?:\r\n|\r|\n)/g, '');


        if (response == summary) {

          $('#update_user_summary').modal('hide');
        } else {

          $('#update_user_summary').modal('hide');
          $('#discard_modal').modal('show');
          $('#cancel_discard_btn').attr("onclick", "openUpdateUserSummaryPopUp()");
          $('#final_discard_btn').attr("onclick", "discardUpdateUserInfo()");
        }
      }
      if (mode == "get") {
        //updateInnerHTMLs('summary', response);
        $('#summary').val(response);
      }
    }
  });
}

// OPEN MODAL
//openUpdateUserSummaryPopUp();
$("#open_summary_modal").on("click", function () {
  getSummary("get");
  openUpdateUserSummaryPopUp()
});



function openUpdateUserSummaryPopUp() {
  $('#update_user_summary').modal('show');
}

/// SAVE
$("#update_summary_btn").on("click", function () {
  updateUserSummary();
});

$("#update_summary_btn_1").on("click", function () {
  updateUserSummary();
});

$("#update_summary_btn_2").on("click", function () {
  updateUserSummary();
});

// UPDATE

// GET FROM DATABASE

// CHECK AGAINST CHANGE FROM ID VAL




function updateUserSummary() {
  var summary = $('#summary').val();

  var form = new FormData();
  form.append("summary", summary);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: '/update_user_summary',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      blurSubmitBtns('update_summary_btn');
      clearErrorMsgs();
      if (response.length > 0) {
        handleError(response[0], "summary_error");
      } else {
        $('#update_user_summary').modal('hide');
        updateInnerHTMLs('summary-', summary);
      }
    }
  });

  // ERROR HANDLER EINFÜGEN BEI WELCOME UND REGISTER
}

// OPEN DISCARD
function openDiscardUpdateSummaryPopUp() {
  getSummary("check");
}

$("#discard_update_summary").on("click", function () {
  openDiscardUpdateSummaryPopUp()
});

$("#discard_update_summary_1").on("click", function () {
  openDiscardUpdateSummaryPopUp()
});

// DISCARD
function discardUpdateSummaryInfo() {
  $('#update_user_summary').modal('hide');
}






///////////////
// USER INFO //
///////////////

/// SAVE
$("#update_user_info_btn").on("click", function () {
  updateUserInfo();
});

$("#update_user_info_btn_1").on("click", function () {
  updateUserInfo();
});

$("#update_user_info_btn_2").on("click", function () {
  updateUserInfo();
});

// OPEN MODAL
$("#open-personal-exp-popup").on("click", function () {
  openUpdateUserInfoPopUp();
});

function openUpdateUserInfoPopUp() {
  $('#update_user_info_modal').modal('show');
}

// UPDATE
function updateUserInfo() {
  //console.log("updaring userinfo");
  // Hier val als nächste var
  var firstname = $('#firstname_modal').val();
  var lastname = $('#lastname_modal').val();
  var location = $('#city-search'); // hier auch valk
  var location_city = location.val().split(',')[0];
  var location_state = location.val().split(', ')[1];
  var position = $('#position-search').val();

  var form = new FormData();
  form.append("first_name", firstname);
  form.append("last_name", lastname);
  form.append("location_city", location_city);
  form.append("location_state", location_state);
  form.append("position", position);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: '/update_user_info',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {


      blurSubmitBtns('update_user_info_btn');
      clearErrorMsgs();

      if (response.length > 0) {
        handleError(response[0], "firstname_error");
        handleError(response[1], "lastname_error");
        handleError(response[2], "location_error");
        handleError(response[3], "position_error");
        $('#search-dropdown-city').removeClass("d-block");
        //handleError(response[1], "position_error");
      } else {
        updateInnerHTMLs('first-name', firstname);
        updateInnerHTMLs('last-name', lastname);
        updateInnerHTMLs('work-city', location_city + ", " + location_state);
        updateInnerHTMLs('current-position', position);
        $('#update_user_info_modal').modal('hide');
      }
    }
  });

  // ERROR HANDLER EINFÜGEN BEI WELCOME UND REGISTER
}

// OPEN DISCARD
function openDiscardUpdateUserInfoPopUp() {
  // CHECK IF CHANGED INPUT
  $('#update_user_info_modal').modal('hide');
  $('#discard_modal').modal('show');
  $('#cancel_discard_btn').attr("onclick", "openUpdateUserInfoPopUp()");
  $('#final_discard_btn').attr("onclick", "discardUpdateUserInfo()");
  // SET SPEICHERN BUTTON
}

$("#discard_update_user_info").on("click", function () {
  openDiscardUpdateUserInfoPopUp();
});

$("#discard_update_user_info_1").on("click", function () {
  openDiscardUpdateUserInfoPopUp();
});

// DISCARD
function discardUpdateUserInfo() {
  $('#discard_modal').modal('hide');
}





