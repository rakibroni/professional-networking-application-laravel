function updateConnectionsCount() {
  if ($('#connections-count') != null) {
    var value = parseInt($('#connections-count').html());
    value++;
  }
  $('*[id*=connections-count]*').each(function () {


    $('#' + this.id).html(value);
  });
}
function requestConnection(username) {

  // hier mal ohne form ausprobieren
  var form = new FormData();
  form.append("username", username);

  ajaxSetup();

  $.ajax(
    {
      url: '/request_connection',
      type: 'POST',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },
      success: function (response) {

        setRequestBtn(response, "", username);
        setRequestBtn(response, "1", username);
        setRequestBtn(response, "2", username);
      }
    });
}

function setRequestBtn(response, suffix, username) {
  if (response[0] == "pending") {
    $('#btn_value' + suffix + username).html("Ausstehend");
    $('#btn_' + suffix + username).css("background-color", "#ebebeb").css("color", '#a4a4a4').css('cursor', 'no-drop');
    $('#btn_img' + username).attr("src", "");
  }
  if (response[0] == "connecting") {
    //$('#in_common_connections').modal('show');
    $('#btn_value' + suffix + username).html("Vernetzt");

    $('#btn_img' + username).attr("src", "/images/check.svg");
  }
  $('#btn_' + suffix + username).attr("onclick", "");
}

function acceptRequest(username) {

  var form = new FormData();
  form.append("username", username);

  ajaxSetup();

  $('#request' + username).addClass("d-none");
  $.ajax(
    {
      url: '/accept_request',
      type: 'POST',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        $('#request' + username).addClass("d-none");
        loadNetworkTabs();
      }
    });
}

function removeActiveClass() {
  /*var tabs = ['suggestions', 'connections', 'requests', 'suggestions1', 'connections1', 'requests1'];
   tabs.forEach(function (item) {
     $('#' + item).removeClass("active");
   });*/
}

function removeConnection(username) {
  var form = new FormData();
  form.append('username', username);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax(
    {
      url: '/remove_connection',
      type: 'POST',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },
      success: function (response) {

        $('#connection_parent' + username).addClass("d-none");
        loadNetworkTabs();
      }
    });
}

window.onpopstate = function () {
  location.reload();
};

function updateCount(id, value) {
  $('*[id*=' + id + ']:visible').each(function () {
    $('#' + this.id).html(value);
  });
}
var suggestions1Count = 0;



function sendRequest1(mainID, userDivID, letterSvgID, page) {
  $('#' + userDivID).animate({
    opacity: 0
  }, 75);
  animScaleTransform(userDivID, 2000);

  setTimeout(() => {

    $('#' + letterSvgID).css('display', 'block');
    $('#' + letterSvgID).css('opacity', '0');
    $('#' + letterSvgID).animate({
      opacity: 1
    }, 400);
  }, 200);


  setTimeout(() => {
    animFadeOut(userDivID, 200,
      function () {
        animMoveRight(letterSvgID, 200,
          function () {
            $('#' + mainID).html(`<table class="text-center" style="height: 58px; width: 282px">
              <tbody>
              <tr class="text-center w-100">
                <td class="text-center align-middle" style="font-size: 15px; font-weight: 500; color: #BCBBBB">Anfrage gesendet!</td>
              </tr>
            </tbody>
          </table >`);
            setTimeout(() => {
              animShrink(mainID, 50);
              getNextSuggestion(page, suggestions1Count);
            }, 1500);

            //
          })
      },
      300);
  }, 500);
}



function getNextSuggestion(page, count) {
  suggestions1Count++;
  var form = new FormData();
  ajaxSetup();
  $.ajax(
    {
      url: '/get_next_suggestion/' + count + '/' + page,
      type: 'GET',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        var suggestions = $('#suggestions_' + page).html() + response[0];
        $('#suggestions_' + page).html(suggestions);
      }
    });
}

//Suggestions on the side
function loadSuggestions1(page) {
  $('*[id*=' + 'suggestions_' + ']').each(function () {
    if (!this.id.includes('skel')) {
      $('#' + this.id).html('');
    }
  });
  suggestions1Count = 0;
  var form = new FormData();
  $('#suggestions_' + page).addClass('d-none');
  $('#suggestions_' + page + '_skeletons').removeClass('d-none');
  ajaxSetup();
  $.ajax({
    async: true,
    url: '/get_suggestions1/' + page,
    type: 'GET',
    async: true,
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#suggestions_' + page + '_skeletons').addClass('d-none');
      $('#suggestions_' + page).removeClass('d-none');
      $('#suggestions_' + page).html(response[0]);
      suggestions1Count = parseInt(response[1]);
    }
  });
}

var suggestionsCounter = 0;
var scrollBottom = $(window).scrollTop() + $(window).height();
$(window).scroll(function () {

  if (window.location.toString().includes('/network')) {

    scrollBottom = $(window).scrollTop() + $(window).height();
    if (scrollBottom > ($(document).height() / 10)) {

        loadMoreSuggestions(8 + suggestionsCounter, 8);
    }
  }
});


var loadingMoreSuggestions = false;
function loadMoreSuggestions(skip, take) {

  if (!loadingMoreSuggestions  && (suggestionsCounter == 0 || suggestionsCounter < $('#suggestionsCount1').html())) {

    if (skip > 0) {
      $('#suggestions_skeletons_row').removeClass('d-none');
    }

    loadingMoreSuggestions = true;
    ajaxSetup();
    var functionsOnSuccess = [
      [displaySuggestions, ['response']]
    ];
    ajax('/get_user_connections/' + skip + '/' + take +'/' + suggestionsCounter, 'GET', functionsOnSuccess)
  }
}

function displaySuggestions(response) {
  loadingMoreSuggestions = false;
  $('#suggestions_skeletons_row').addClass('d-none');
  $('#network_col_main').append(response[2]);
  $('#suggestions_row').append(response[0]);
  $('#' + 'suggestions' + '_skeletons').addClass('d-none');
  suggestionsCounter = suggestionsCounter + 8;
  $('#suggestionsCount1').html(response[1]);
}



