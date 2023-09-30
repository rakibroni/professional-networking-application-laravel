
var urlLink = window.location.toString();

var scrollPos;
var sideBar;
var sideBarRight;



setInterval(() => {
  scrollPos = window.pageYOffset;
  $('*[id*=' + 'sticky_side_bar' + ']').each(function () {
    if (this.id == 'sticky_side_bar3') {

    }
    sideBar = document.getElementById(this.id);
    if (scrollPos > 80) {
      sideBar.style.top = "73px";
    }
  });
}, 10);

setInterval(() => {
  scrollPos = window.pageYOffset;
  $('*[id*=' + 'sticky1_side_bar' + ']').each(function () {

    sideBar = document.getElementById(this.id);
    if (scrollPos > 80) {
      //sideBar.style.top = "65px";
      if (this.id == 'sticky1_side_bar_acitvity_sub_tabs1' || this.id == 'sticky1_side_bar_acitvity_sub_tabs5') {
        sideBar.style.top = "100px";
      }
      if (this.id == 'sticky1_side_bar_acitvity_sub_tabs') {
        sideBar.style.top = "125px";
      }
      if (this.id == 'sticky1_side_bar_profile_tabs') {
        sideBar.style.top = "65px";
      }
      if (this.id == 'sticky1_side_bar_profile_tabs1') {
        sideBar.style.top = "45px";
      }
      if (this.id == 'sticky1_side_bar_profile_tabs2') {
        sideBar.style.top = "65px";
      }
      if (this.id == 'sticky1_side_bar_profile_tabs3') {
        sideBar.style.top = "45px";
      }


    }
  });
}, 10);




function disableDatePicker(count) {
  $("#month_end" + count).addClass("grey-unselectable");
  $("#month_end" + count).attr('disabled', 'disabled');
  $("#year_end" + count).addClass("grey-unselectable");
  $("#year_end" + count).attr('disabled', 'disabled');
}

function enableDatePicker(count) {
  $("#month_end" + count).removeClass("grey-unselectable");
  $("#month_end" + count).removeAttr("disabled");
  $("#year_end" + count).removeClass("grey-unselectable");
  $("#year_end" + count).removeAttr("disabled");
}
function hideNavDropdown1(id) {
  document.getElementById(id).css.removeClass("show");
}

var animSpeed = 250;

/* ### DROPDOWNS ### */
function hideNavDropdown() {
  $('#navDrop').addClass("d-none");
  $("#navbarNav").removeClass("show");
  setTimeout(() => {
    $('#navDrop').removeClass("d-none");
  }, 10);
  var id;
  $("#navbarNav" + id).removeClass("show");
  $('#' + currPage).addClass('d-none');
}

function switchPage(currPage, nextPage) {
  $('#' + currPage).addClass('d-none');
}

function showDropdown(id) {
  $("#" + id).fadeIn(animSpeed, function () { });
}

function hideDropdown(id) {
  $("#" + id).fadeOut(animSpeed, function () { });
}


var dropdownIDs = [];
var inputIDs = [];
var inputIDsInitDone = false;
$('*[id*=drop-]').each(function (index) {
  dropdownIDs.push(this.id);
  var inputID = dropdownIDs[index];
  inputID = inputID.replace("drop-", "");
  inputIDs.push(inputID);
  hideDropdown(this.id);
});



//$("button").attr("aria-expanded","true");
var inputField = document.getElementById("feed-search");
$("#search-dropdown").fadeOut(0);
/*var inputField = document.getElementById("feed-search1").value = "";
$("#search-dropdown1").fadeOut(0);*/
$('#feed-body').addClass('d-none');
$('#feed-search').click(function (evt) {

  closePostNavigation();
  postChoiceOpen = false;
  $('#feed_grid_navigation').addClass('d-none');
  //$('#chat').addClass('z-9');
  $('#feed-body').removeClass('d-none');
  $('#feed-body').animate({
    backgroundColor: 'rgba(1,1,1,0.7)'
  }, 200);
  //var mobile = true;
  $('#feed-search').addClass("search-shadow");
  //var background = document.getElementById("feed-body").classList.remove("invisible");
  $('#feed-search').css('transition', 'all 0.2s ease-in-out');
  $('#feed-search').css('font-size', '20px');
  $('#feed-search').css('background-position-y', '9px');
  $('#feed-search').css('background-size', '19px');
  if (window.outerWidth >= 576) {

    $('#feed-search').css('padding-left', '55px');
    $('#feed-search').css('width', '400px');
    $('#feed-search').css('font-size', '20px');
    $('#feed-search').css('padding-left', '55px');
  }
  $("#search-dropdown").fadeIn(100);
  $("#search-dropdown").removeClass("shadow-md");
  /*if (mobile == false) {
    //$('#feed-search').css('width', '300px');
    $('#search-dropdown').css('height', '100px');
    $('#search-dropdown').css('top', '92px');
  } else {
    $('#feed-search').css('width', '480px');
    $('#search-dropdown').css('height', '100px');
    $('#search-dropdown').css('top', '92px');
  }*/






});


function ajaxSetup() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })
}


var searchingForPeople = false;
function filterTest() {
  searchingForPeople = true;
  var inputValue = $('#feed-search').val();
  var form = new FormData();
  form.append('inputValue', inputValue);
  // str, id, inputID
  //var str = "j";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    async: true,
    url: '/search',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {
      //
    },

    success: function (response) {

      searchingForPeople = false;
      $('#search-dropdown').html(response);

      //var branchid = $('#feed-search').val();
    }
  })
}



function filterFunction($inputID, $dropdownID) {
  var input, filter, a;
  input = document.getElementById($inputID);


  filter = input.value.toUpperCase();
  div = document.getElementById($dropdownID);
  a = div.getElementsByTagName("a");


  if (document.getElementById($inputID).value.length <= 1) {

  }
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}

/*

  /* GET LOCATION */
/*function showResult(str, id, inputID) {
  if (str.length == 0) {
    document.getElementById(id).innerHTML =
      `<a class="unselectable item text-cura" style="color: black !important">Suche z.B nach "Köln"</a>`;
    return;
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById(id).innerHTML = this.responseText;
    }
  }
  xmlhttp.open("GET", "/livesearch.php?q=" + str + "&searchID=" + id + "&inputID=" +
    inputID, true);
  xmlhttp.send();
}

*/


var postChoiceOpen = false;

function openPostChoice() {
  if (!postChoiceOpen) {
    openPostNavigation();

  } else {
    closePostNavigation();
  }




  //$('#add-post-btn').css('transform', 'rotate(45deg)');
}


function openPostNavigation() {
  $('#add-post-btn').css('transition', 'all .3s ease-in-out');
  $('#add-post-btn').css('transform', 'scale(1.3,1.3) rotate(45deg)');
  $('#add-post-btn-container').css('transition', 'all .3s ease-in-out');
  $('#add-post-btn-container').css('padding-bottom', '20px');
  navBarItem = $('#add-post-btn');
  innerHtml = navBarItem.html();

  while (innerHtml.includes('#FFF')) {
    innerHtml = innerHtml.replace('#FFF', '#FF9721');

  }

  $('#post-question-container').animate({
    opacity: '1',
    top: '-30px'
  }, 100);

  $('#add-post-question-body').removeClass('d-none');
  $('#add-post-question-body').animate({
    backgroundColor: 'rgba(1,1,1,0.7)'
  }, 200);

  $('#feed-body').animate({
    backgroundColor: 'rgba(1,1,1,0.0)'
  }, 200);

  setTimeout(() => {
    $('#feed_grid_navigation').addClass('d-none');
  }, 100);


  navBarItem.html(innerHtml);
  postChoiceOpen = true;
}

function closePostNavigation() {
  $('#feed_grid_navigation').removeClass('d-none');
  $('#add-post-btn').css('transition', 'all .3s ease-in-out');
  $('#add-post-btn').css('transform', 'scale(1.0,1.0) rotate(0deg)');



  $('#add-post-btn-container').css('transition', 'all .3s ease-in-out');
  $('#add-post-btn-container').css('padding-bottom', '0px');

  navBarItem = $('#add-post-btn');
  innerHtml = navBarItem.html();

  while (innerHtml.includes('#FF9721')) {

    innerHtml = innerHtml.replace('#FF9721', '#FFF');

  }
  navBarItem.html(innerHtml);


  $('#add-post-question-body').addClass('d-none');
  $('#add-post-question-body').animate({
    backgroundColor: 'rgba(1,1,1,0.0)'
  }, 200);


  $('#post-question-container').animate({
    opacity: '0',
    top: '200px'
  }, 100);
  postChoiceOpen = false;
}


$('#body').click(function (evt) {
  if (!$(evt.target).is('#feed-search') && !postChoiceOpen) {

    //
    /*$('#feed-body').animate({

            backgroundColor: 'transparent',
            function() {

            }
        }, 400);
        setTimeout(function() {
            var background = document.getElementById("feed-body").classList.add("invisible");
        }, 400);
        
*/


    $('#feed_grid_navigation').removeClass('d-none');

    $('#feed-body').animate({
      backgroundColor: 'transparent'
    }, 200);
    setTimeout(function () {
      $('#chat').removeClass('z-9');
      $('#feed-body').addClass('d-none');
    }, 200);
    $('#feed-search').css('font-size', '16px');
    $('#feed-search').css('background-position-y', '10px');
    $('#feed-search').css('background-size', '15px');
    if (window.outerWidth >= 576) {
      $('#feed-search').removeClass("search-shadow");
      $('#feed-search').css('transition', 'all 0.2s ease-in-out');
      $('#feed-search').css('width', '300px');
      $('#feed-search').css('padding-left', '35px');
    }
    $("#search-dropdown").addClass("shadow-md");
    $("#search-dropdown").fadeOut();
    var inputField = document.getElementById("feed-search").value = "";
  
  }
});




function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (Object.keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; }
  }));
} catch (e) { }

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt);
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}



var myOffcanvas = document.getElementById('offcanvasExample');
myOffcanvas.addEventListener('hidden.bs.offcanvas', function () {
  enableScroll();
})

myOffcanvas.addEventListener('show.bs.offcanvas', function () {
  disableScroll();
})
//showOffCanvas('offcanvasExample');
//document.getElementById('offcanvasExample').classList.toggle('show');






function showOffCanvas(btnId, offCanvasId) {
  growBtn(btnId);
  var myOffcanvas = document.getElementById(offCanvasId);
  var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
  bsOffcanvas.show();
  /*setTimeout(() => {
    var myOffcanvas = document.getElementById(offCanvasId);
    var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
    bsOffcanvas.show();
  }, 200);*/
}

function hideOffCanvas(offCanvasId) {
  var myOffcanvas = document.getElementById(offCanvasId);
  var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);
  bsOffcanvas.hide();
}




function showNotAvailableMsg(id) {
  document.getElementById(id).classList.add('soon-available');
  document.getElementById(id + 'text').classList.add('soon-available-text');
}

function removeAvailableMsg(id) {
  document.getElementById(id).classList.remove('soon-available');
  document.getElementById(id + 'text').classList.remove('soon-available-text');
}

function growBtn(id) {
  const SIZE = 0.7;
  $('#' + id).css('transition', 'all .1s ease-in-out');
  $('#' + id).css('transform', 'scale(' + SIZE + ',' + SIZE + ')');
  setTimeout(() => {
    $('#' + id).css('transform', 'scale(0.5,0.5)');
  }, 100);
}


function chatSoonAvailable(id) {
  $('#' + id).toggleClass('d-none');
}

$(document).mouseup(function (e) {
  var container = $("chat-soon-available");

  // if the target of the click isn't the container nor a descendant of the container
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    $('#' + 'chat-soon-available').addClass('d-none');
  }
});

$(document).mouseup(function (e) {
  var container = $("chat-soon-available1");

  // if the target of the click isn't the container nor a descendant of the container
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    $('#' + 'chat-soon-available1').addClass('d-none');
  }
});

var backDropVisible = false;
setInterval(() => {
  if (backDropVisible) {
    $('.modal-backdrop').addClass('backdrop-opacity');
  } else {
    $('.modal-backdrop').addClass('backdrop-opacity1');
  }
}, 100);

// show backdrop based on width and setting 