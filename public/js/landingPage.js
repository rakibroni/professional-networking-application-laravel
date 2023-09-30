var currentID = "";

function getMail(id) {
  if (currentID.includes('0')) {
    return $('#submit-mail-text-0').val();
  }
  if (currentID.includes('1')) {
    return $('#submit-mail-text-1').val();
  }
  if (currentID.includes('2')) {
    return $('#submit-mail-text-2').val();
  }
  if (currentID.includes('3')) {
    return $('#submit-mail-text-3').val();
  }

}




c = document.getElementById("chatsvg");

function sendMail() {

  var form = new FormData();
  form.append('mail', getMail());

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({async: true,
    url: '/email_newsletter',
    method:'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {

    },

    success: function (response) {

    }
  })
};




function elemetIsInView(id) {
  var path = window.location.pathname;
  var page = path.split("/").pop();
  if (page == "home" || page == "") {
    var element = document.querySelector('#' + id);
    var position = element.getBoundingClientRect();
    if (position.top >= 0 && position.bottom <= window.innerHeight) {
      return true;
    } else {
      return false;
    }
  }

}

function playAnimation(objectID, svgID) {

  a = document.getElementById(objectID);
  b = a.contentDocument;
  c = b.getElementById(svgID);
  c.dispatchEvent(new Event("click"));
}


var chatShowed = false;
var chatShowed1 = false;
var connectShowed = false;
var newsShowed = false;

window.addEventListener('scroll', function () {


  if (chatShowed == false) {
    if (elemetIsInView("animated-svg")) {
      playAnimation('animated-svg', 'design-3');
      chatShowed = true;
    }
  }

  /*if (chatShowed1 == false) {
    if (elemetIsInView("animated-svg4")) {
      playAnimation('animated-svg4', 'design-3');
      chatShowed1 = true;
    }
  }*/

  if (connectShowed == false) {
    if (elemetIsInView("animated-svg1")) {
      playAnimation('animated-svg1', 'design-1');
      connectShowed = true;
    }
  }

  if (newsShowed == false) {
    if (elemetIsInView("animated-svg2")) {
      playAnimation('animated-svg2', 'design-2');
      newsShowed = true;
    }
  }




  if (elemetIsInView("arrow0-xl")) {

    var arrow0XLImg = $("#arrow0-img-xl");
    arrow0XLImg.addClass("transition-med");
    arrow0XLImg.css("margin-left", "0px");

    var arrow0XL = $("#arrow0-xl");
    arrow0XL.addClass("transition");
    arrow0XL.css('opacity', '1');
  }
  if (elemetIsInView("arrow1-xl")) {
    setTimeout(() => {
      var arrow0XLImg = $("#arrow1-img-xl");
      arrow0XLImg.addClass("transition-med");
      arrow0XLImg.css("margin-left", "0px");


      var arrow0XL = $("#arrow1-xl");
      arrow0XL.addClass("transition");
      arrow0XL.css('opacity', '1');
    }, 300);

  }
  if (elemetIsInView("arrow2-xl")) {
    setTimeout(() => {
      var arrow0XLImg = $("#arrow2-img-xl");
      arrow0XLImg.addClass("transition-med");
      arrow0XLImg.css("margin-left", "0px");
      var arrow0XL = $("#arrow2-xl");
      arrow0XL.addClass("transition");
      arrow0XL.css('opacity', '1');
    }, 600);
  }


  if (elemetIsInView("arrow0")) {
    var arrow0XLImg = $("#arrow0-img");
    arrow0XLImg.addClass("transition-med");
    arrow0XLImg.css("margin-left", "0px");

    var arrow0XL = $("#arrow0");
    arrow0XL.addClass("transition");
    arrow0XL.css('opacity', '1');
  }
  if (elemetIsInView("arrow1")) {
    setTimeout(() => {
      var arrow0XLImg = $("#arrow1-img");
      arrow0XLImg.addClass("transition-med");
      arrow0XLImg.css("margin-left", "0px");

      var arrow0XL = $("#arrow1");
      arrow0XL.addClass("transition");
      arrow0XL.css('opacity', '1');
    }, 300);

  }
  if (elemetIsInView("arrow2")) {
    setTimeout(() => {
      var arrow0XLImg = $("#arrow2-img");
      arrow0XLImg.addClass("transition-med");
      arrow0XLImg.css("margin-left", "0px");

      var arrow0XL = $("#arrow2");
      arrow0XL.addClass("transition");
      arrow0XL.css('opacity', '1');
    }, 600);
  }
});


function changeEmailStatus() {
  $('#mail-box').css('transition', 'all 0.3s ease-in-out');
  $('#tick-0').css('transition', 'all 0.3s ease-in-out');
  $('#mail-box').addClass("bg-blur");
  setTimeout(() => {
    $('#tick-0').fadeIn();
    $('#bg-tick').fadeIn(function () {
      $('#tick-0').css("top", "15%");
      setTimeout(() => {

        $('#tick-text').fadeIn(1200);
        setTimeout(() => {
          $('#tick-text1').fadeIn(2200);
        }, 300);

      }, 300);
    });

  }, 300);
}


function changeEmailStatusFooter(idSuffix, scroll) {
  $('#footer-email-box-' + idSuffix).fadeIn();
  $('#submit-mail-' + idSuffix).addClass("transition-fast");
  $('#submit-mail-' + idSuffix).css('opacity', '0');
  $('#submit-mail-text-' + idSuffix).addClass("transition-fast");
  $('#submit-mail-text-' + idSuffix).css('opacity', '0');
  $('#footer-disclaimer').addClass("transition-fast");
  $('#footer-disclaimer').css('opacity', '0');
  var path = window.location.pathname;
  var page = path.split("/").pop();
  if (path == "/home" || path == "/") {
    if (window.innerWidth > 500) {
      window.scroll({
        top: 0,
        left: 0,
        behavior: 'smooth'
      });
    } else {
      window.scroll({
        top: 200,
        left: 0,
        behavior: 'smooth'
      });
    }
    changeEmailStatus();
  }

}


$(document).ready(function () {

  $('#submit-mail-0').click(function () {
    currentID = '#submit-mail-text-0';
    changeEmailStatus();
    changeEmailStatusFooter("1", false);
    sendMail();
  });
  $('#submit-mail-3').click(function () {
    currentID = '#submit-mail-text-3';
    changeEmailStatus();
    changeEmailStatusFooter("2", false);
    sendMail();
  });
  $('#submit-mail-1').click(function () {
    currentID = '#submit-mail-text-1';
    changeEmailStatusFooter("1", true);
    sendMail();
  });
  $('#submit-mail-2').click(function () {
    currentID = '#submit-mail-text-2';
    changeEmailStatusFooter("2", true);
    sendMail();
  });

});


function hideNavDropdown() {
  $('#navDrop').addClass("d-none");
  $("#navbarNav").removeClass("show");
  setTimeout(() => {
    $('#navDrop').removeClass("d-none");
  }, 10);
}


window.onclick = function (event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

var firstScroll = false;
var firstScrollPos;
var allowHide = false;
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  if (document.body.scrollTop < 0) {
    document.getElementById("navbar").style.top = "0px";
    document.getElementById("navbar").style.position = "fixed";
  }
}
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;

  if (firstScroll == false && currentScrollPos != 0) {
    firstScroll = true;
    firstScrollPos = currentScrollPos;
    allowHide = false;
    $('#navbar').addClass('shadow-md');
    $("#navbar").removeClass("trans-navigation");
  } else {
    //allowHide = true;
  }


  if (allowHide == true) {
    if (prevScrollpos >= currentScrollPos || currentScrollPos <= 0) {
      document.getElementById("navbar").style.top = "0px";
    } else {

      document.getElementById("navbar").style.top = "-80px";
      $("#navbarNav").removeClass("show");

    }
  }
  if (currentScrollPos != firstScrollPos) {
    allowHide = true;
    $("#navbar").addClass("trans-navigation");
  }


  prevScrollpos = currentScrollPos;

}

document.addEventListener("touchstart", function () { }, true);
$(window).on('scroll', function () {
  if ($(window).scrollTop() > 10) {
    $('#navbar').addClass('bg-white');
    setTimeout(() => {
      if ($(window).scrollTop() > 10)
        $('#navbar').addClass('shadow-md');
    }, 300);

  } else {
    $('#navbar').removeClass('trans-navigation');
    $('#navbar').removeClass('shadow-md');
    $('#navbar').addClass('trans-navigation');
    $('#navbar').removeClass('bg-white');
  }
});