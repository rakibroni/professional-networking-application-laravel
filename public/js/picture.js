var equal = false;
function getProfilePicStats() {
  var form = new FormData();



  var profilepic = $('#temp-profile-pic');
  var path = profilepic.css("background-image").replace('url(', '').replace(')', '').replace(/\"/gi, "");


  var tempProfilePictureID = "#temp-profile-pic";
  var width = $(tempProfilePictureID).css("width");
  var zoom = $(tempProfilePictureID).css("background-size");
  var yPos = $(tempProfilePictureID).css("background-position-y");
  var xPos = $(tempProfilePictureID).css("background-position-x");
  var rotate;
  var classList = $(tempProfilePictureID).attr('class').split(/\s+/);
  $.each(classList, function (index, item) {
    if (item.includes('rotate') && !item.includes("rotate-origin")) {
      rotate = item;
    }
  });

  width = pxToInt(width);
  yPos = pxToInt(yPos);
  xPos = pxToInt(xPos);
  yPos = (yPos / width).toFixed(2);
  xPos = (xPos / width).toFixed(2);




  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  // Check file selected or not


  $.ajax({
    async: true,
    url: '/get_profile_pic_stats',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {

      var auth_path = response[0];
      var auth_zoom = response[1];
      var auth_pos_x = response[2];
      var auth_pos_y = response[3];
      var auth_rot = response[4];








      var pathEqual = false;
      var zoomEqual = false;
      var posxEqual = false;
      var posyEqual = false;
      var rotEqual = false;

      if (path.includes(auth_path)) {
        pathEqual = true;
      }
      if (auth_pos_x == xPos) {
        posxEqual = true;
      }
      if (auth_pos_y == yPos) {
        posyEqual = true;
      }

      if (auth_zoom == zoom) {
        zoomEqual = true;
      }
      if (auth_rot == rotate) {
        rotEqual = true;
      }

      if (pathEqual && zoomEqual && posxEqual && posyEqual && rotEqual) {
        equal = true;

        $('#edit_profile_picture_modal').modal('hide');

      } else {
        $('#edit_profile_picture_modal').modal('hide');

        openDiscardChangesPopUp();

      }



    }
  });
}

$("#edit-profile-pic").on("mouseover", function () {
  if (isDefaultProfileImage()) {
    $("#edit-profile-pic").css("cursor", "no-drop");
    $("#edit-profile-pic").css("opacity", "0.3");
    isDefaultProfileImage();
  }
});

$("#edit-profile-pic").on("mouseleave", function () {
  $("#edit-profile-pic").css("cursor", "pointer");
  $("#edit-profile-pic").css("opacity", "1");
});

$("#delete_profile_picture").on("mouseover", function () {
  if (isDefaultProfileImage()) {
    $("#delete_profile_picture").css("cursor", "no-drop");
    $("#delete_profile_picture").css("opacity", "0.3");
    isDefaultProfileImage();
  }
});

$("#delete_profile_picture").on("mouseleave", function () {
  $("#delete_profile_picture").css("cursor", "pointer");
  $("#delete_profile_picture").css("opacity", "1");
});

function isDefaultProfileImage() {

  var defaultPath = '/images/profile_picture_default/default.png';

  var tempPath = $('#temp-profile-pic').css('background-image');
  tempPath = tempPath.replace('url(', '').replace(')', '').replace(/\"/gi, "");

  var isDefaultProfileImage = false;

  if (tempPath.includes(defaultPath)) {
    isDefaultProfileImage = true;
  }

  return isDefaultProfileImage;
}



var urlLink = window.location.toString();
var slider1 = document.getElementById("profile-pic-zoom-slider");
if (document.getElementById('temp-profile-pic') != null) {
  if (urlLink.includes('users') == true) {

    tempProfilePictureID = "#profile-pic";
    var rotate = "";
    var classList = $(tempProfilePictureID).attr('class').split(/\s+/);
    $.each(classList, function (index, item) {
      if (item.includes('rotate') && !item.includes("rotate-origin")) {
        rotate = item;
      }
    });

    rotate = rotate.replace("rotate", "");
    rotate = parseInt(rotate);

    var angle = rotate;
    img2 = document.getElementById('temp-profile-pic');

    document.getElementById('rotate-profile-pic').onclick = function () {
      angle = (angle + 90) % 360;
      img2.className = "_drag-pointer rotate" + angle;
    }



    //slider1.value = 5;

    //slider1.value = parseFloat('<?php echo "5"; ?>');
    var temp = 0;

    slider1.oninput = function () {
      document.getElementById("temp-profile-pic").style.backgroundSize = this.value + "0%";
      offSetX = tempProfilePic.css("background-position-x");
      offSetX = offSetX.replace("px", "");
      offSetY = tempProfilePic.css("background-position-y");
      offSetY = offSetY.replace("px", "");
      var backgroundPos = offSetX + "px " + offSetY + "px";
      document.getElementById("temp-profile-pic").style.backgroundPosition = backgroundPos;
      //document.getElementById("img1").style.backgroundSize = this.value + "0%";
    }
  }
}












//document.getElementById("temp-profile-pic").style.backgroundImage = "url(" + document.getElementById("profile-pic").src + ")";

// ### PROFILE PIC ###
var tempProfilePic = $('#temp-profile-pic');
profilePicLoading = false;

$("input#upload_profile_pic").on('change', function () {
  if (profilePicLoading == false) {
    profilePicLoading = true;
    stopEditingProfilePic();
    $("#profile-pic-btns").fadeOut(100, function () {
      $("#profile-pic-btns-spinner").fadeIn(100, function () {
        setTimeout(function () {
          checkIfTempProfilePicExist();
        }, 300);
      });
    });
  }
});

function checkIfTempProfilePicExist() {
  $('#submit_profile_pic').trigger('click');
}

function hideProfilePicBtns() {
  $("profile-pic-btns").fadeOut(animSpeed, function () {

  });
}


var editingProfilePic = false;
var profilePicBtnsContainerHeightOnEdit = "148px";
var profilePicBtnsContainerHeight = "64px";

function editProfilePic() {
  if (isDefaultProfileImage() == false) {
    editingProfilePic = true;
    tempProfilePic.removeClass("pointer-on-hover");
    tempProfilePic.addClass("_drag-pointer");
    $("#edit-profile-pic").css('box-shadow', '0 0 5px rgba(1, 1, 1, 0.1)');
    $('#profile-btns-container').css('transition', 'all 0.05s ease-in-out');
    $('#profile-btns-container').css('height', profilePicBtnsContainerHeightOnEdit);
    $('#profile-btns-container').css('top', '362px').promise().done(function () {
      $("#profile-pic-zoom-text").fadeIn(animSpeed, function () { });
    });
    $("#profile-pic-move-text").fadeIn(animSpeed, function () { });
  }
}


jQuery(function () {
  $('#edit-profile-pic').on('click', function () {
    if (editingProfilePic == false) {
      editProfilePic();
    } else {
      stopEditingProfilePic();
    }
  });
  $('#delete_profile_picture').on('click', function () {
    if (isDefaultProfileImage() == false) {
      openProfilePictureDeletionPopUp();
    }
  });
});

function deleteProfilePicture() {
  $('#submit_delete_profile_picture').trigger('click');
}



function stopEditingProfilePic() {
  editingProfilePic = false;
  tempProfilePic.removeClass("_drag-pointer");
  $("#edit-profile-pic").css('box-shadow', 'unset');
  $("#profile-pic-move-text").fadeOut(animSpeed, function () { });
  $("#profile-pic-zoom-text").fadeOut(animSpeed, function () {
    $('#profile-btns-container').css('transition', 'all 0.05s ease-in-out');
    $('#profile-btns-container').css('height', profilePicBtnsContainerHeight);
    $('#profile-btns-container').css('top', '320px');
  });
}

function uploadTempProfilePic() {

  var fd = new FormData();

  var files = $('#file')[0].files;


  // Check file selected or not
  if (files.length > 0) {
    fd.append('file', files[0]);
    fd.append('token', '<?php echo $token ?>');
    fd.append('currentPage', 'pxtest1.php');
    fd.append('ajax_action', 'temp-profile-img-upload');

    $.ajax({
      async: true,
      url: '/ajax_php/ajax_php.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function (response) {

        var error = false;

        if (response.length < 3) {
          if (response.includes('a')) {
            showFileError();
            error = true;
            //document.getElementById("loader").classList.add("invisible");
          }
          if (response.includes('b')) {
            showSizeError();
            error = true;
            //document.getElementById("loader").classList.add("invisible");
          }
        }


        if (error == false) {
          if (response != 0) {
            //document.getElementById("loader").classList.remove("invisible");
            loading = true;

            response = response.replace('/kunden/homepages/45/d851672757/htdocs/curawork.online', '');

            $("#temp-profile-pic").animate({
              opacity: 0
            }, function () {
              document.getElementById("temp-profile-pic").style.backgroundImage = "url(" + response + ")";
              document.getElementById("profile-pic-personal-info").style.backgroundImage = "url(" + response + ")";
              //document.getElementById("profile-pic").style.backgroundImage = "url(" + response + ")"; das hier erst on save
              $("#temp-profile-pic").animate({
                opacity: 1
              });
              editProfilePic();
            })






            $("#profile-pic-btns-spinner").fadeOut(100, function () {
              $("#profile-pic-btns").fadeIn(100, function () {
                profilePicLoading = false;
              });
            });




            // stop loading
            previewPath = response;
          }
        }
      }
    });
  }

}

function cleanURL(url) {
  url = url.replace("url", "");
  url = url.replace("(", "");
  url = url.replace(")", "");
  url = url.replace("\"", "");
  url = url.replace("\"", "");
  return url;
}




// ### PROFILE PIC DRAG ###
var offSetX = 0;
var offSetY = 0;
var startX;
var startY;
var pcDrag = false;


// PC DRAG //

$(document).ready(function () {
  tempProfilePic.mousedown(function (e) {

    if (tempProfilePic.hasClass("_drag-pointer")) {

      pcDrag = true;
      startX = (window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
      startY = (window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
      offSetX = tempProfilePic.css("background-position-x");
      offSetX = offSetX.replace("px", "");
      offSetY = tempProfilePic.css("background-position-y");
      offSetY = offSetY.replace("px", "");
      if (angle == 0) {
        startY -= offSetY;
        startX -= offSetX;
      }
      if (angle == 180) {
        startY -= (-1) * offSetY;
        startX -= (-1) * offSetX;
      }
      if (angle == 90) {
        startY -= offSetX;
        startX -= (-1) * offSetY;
      }
      if (angle == 270) {
        startY -= (-1) * offSetX;
        startX -= offSetY;
      }
    }
  });


  $(document).mouseup(function (e) {
    pcDrag = false;
  });

});

window.onload = init();

function init() {
  if (window.Event) {
    document.captureEvents(Event.MOUSEMOVE);
  }
  document.onmousemove = getCursorXY;
}

function getCursorXY(e) {
  var x = (window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
  var y = (window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
  if (pcDrag == true) {
    if (angle == 0) {

      tempProfilePic.css("background-position-y", (y - startY) + "px");
      tempProfilePic.css("background-position-x", (x - startX) + "px");
    }
    if (angle == 180) {
      tempProfilePic.css("background-position-y", -1 * (y - startY) + "px");
      tempProfilePic.css("background-position-x", -1 * (x - startX) + "px");
    }
    if (angle == 90) {
      tempProfilePic.css("background-position-x", (y - startY) + "px");
      tempProfilePic.css("background-position-y", -1 * (x - startX) + "px");
    }
    if (angle == 270) {
      tempProfilePic.css("background-position-x", -1 * (y - startY) + "px");
      tempProfilePic.css("background-position-y", (x - startX) + "px");
    }
  }
}

// MOBILE DRAG // 
if (document.getElementById('temp-profile-pic') != null) {
  if ($("#temp-profile-pic") != null) {


    document.getElementById("temp-profile-pic").addEventListener("touchstart",
      function clicked(e) {

        if (tempProfilePic.hasClass("_drag-pointer")) {
          pcDrag = true;
          var br = document.getElementById("body").getBoundingClientRect();
          startX = e.touches[0].clientX - br.left;
          startY = e.touches[0].clientY - br.top;
          offSetX = tempProfilePic.css("background-position-x");
          offSetX = offSetX.replace("px", "");
          offSetY = tempProfilePic.css("background-position-y");
          offSetY = offSetY.replace("px", "");
          if (angle == 0) {
            startY -= offSetY;
            startX -= offSetX;
          }
          if (angle == 180) {
            startY -= (-1) * offSetY;
            startX -= (-1) * offSetX;
          }
          if (angle == 90) {
            startY -= offSetX;
            startX -= (-1) * offSetY;
          }
          if (angle == 270) {
            startY -= (-1) * offSetX;
            startX -= offSetY;
          }
        }
      });
  }
}

document.getElementById("body").addEventListener("touchend",
  function clicked(e) {
    pcDrag = false;
  });


document.getElementById("body").addEventListener("touchmove",
  function clicked(e) {

    var br = document.getElementById("body").getBoundingClientRect();
    var x = e.touches[0].clientX - br.left;
    var y = e.touches[0].clientY - br.top;
    if (pcDrag == true) {

      if (angle == 0) {
        tempProfilePic.css("background-position-y", (y - startY) + "px");
        tempProfilePic.css("background-position-x", (x - startX) + "px");
      }
      if (angle == 180) {
        tempProfilePic.css("background-position-y", -1 * (y - startY) + "px");
        tempProfilePic.css("background-position-x", -1 * (x - startX) + "px");
      }
      if (angle == 90) {
        tempProfilePic.css("background-position-x", (y - startY) + "px");
        tempProfilePic.css("background-position-y", -1 * (x - startX) + "px");
      }
      if (angle == 270) {
        tempProfilePic.css("background-position-x", -1 * (y - startY) + "px");
        tempProfilePic.css("background-position-y", (x - startX) + "px");
      }
    }
  });






$(function () {
  $('#upload_profile_pic_form').on('submit', function (e) {
    e.preventDefault();
    var form = new FormData(this);
    var tempPath = $('#temp-profile-pic').css('background-image');
    tempPath = tempPath.replace('url(', '').replace(')', '').replace(/\"/gi, "");
    form.append('tempPath', tempPath);

    $.ajax({
      async: true,
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },

      success: function (response) {

        loading = true;
        resetProfilePicture('#temp-profile-pic', false);
        $("#temp-profile-pic").animate({
          opacity: 0
        }, function () {

          document.getElementById("temp-profile-pic").style.backgroundImage = "url(" + response[0] + ")";
          //document.getElementById("profile-pic-personal-info").style.backgroundImage = "url(" + response + ")";
          //document.getElementById("profile-pic").style.backgroundImage = "url(" + response + ")"; das hier erst on save
          $("#temp-profile-pic").animate({
            opacity: 1
          });
          editProfilePic();
        })

        $("#profile-pic-btns-spinner").fadeOut(100, function () {
          $("#profile-pic-btns").fadeIn(100, function () {
            profilePicLoading = false;
          });
        });


      }
    });
  });
});


var savedPath = "";
$(function () {
  $('#save_profile_pic_form').on('submit', function (e) {
    e.preventDefault();
    var form = new FormData(this);
    var bg = $('#temp-profile-pic').css('background-image');
    bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");


    var tempProfilePictureID = "#temp-profile-pic";
    var width = $(tempProfilePictureID).css("width");
    var zoom = $(tempProfilePictureID).css("background-size");
    var yPos = $(tempProfilePictureID).css("background-position-y");
    var xPos = $(tempProfilePictureID).css("background-position-x");
    var rotate;
    var classList = $(tempProfilePictureID).attr('class').split(/\s+/);
    $.each(classList, function (index, item) {
      if (item.includes('rotate') && !item.includes("rotate-origin")) {
        rotate = item;
      }
    });

    width = pxToInt(width);
    yPos = pxToInt(yPos);
    xPos = pxToInt(xPos);
    yPos = (yPos / width).toFixed(2);
    xPos = (xPos / width).toFixed(2);


    form.append('temp_path', bg);
    form.append('zoom', zoom);
    form.append('pos_x', xPos);
    form.append('pos_y', yPos);
    form.append('rot', rotate);

    $.ajax({
      async: true,
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },

      success: function (response) {

        savedPath = response[0];
        $('#edit_profile_picture_modal').modal('hide');

        var bg = "url(" + savedPath + ")";

        $('#profile-pic').css('background-image', bg);
        $('#profile-pic1').css('background-image', bg);
        $('#profile-pic2').css('background-image', bg);
        $('#navbar_profile_pic').css('background-image', bg);
        $('#navbar_profile_pic1').css('background-image', bg);
        $('#navbar_profile_pic2').css('background-image', bg);
        $('#navbar_dropdown_profile_pic').css('background-image', bg);
        setProfilePictureStats('#navbar_dropdown_profile_pic');
        setProfilePictureStats('#navbar_profile_pic');
        setProfilePictureStats('#navbar_profile_pic1');
        setProfilePictureStats('#navbar_profile_pic2');
        setProfilePictureStats('#profile-pic');
        setProfilePictureStats('#profile-pic1');
        setProfilePictureStats('#profile-pic2');
      }
    });
  });
});


$(function () {
  $('#delete_profile_pic_form').on('submit', function (e) {


    // DELETE Abfrage
    // Erst nur default bild setten 
    // Bei speichern fragen ob delte in progress und dann delte callen.
    e.preventDefault();
    var form = new FormData(this);
    var bg = $('#temp-profile-pic').css('background-image');
    bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
    form.append('temp_path', bg);

    $.ajax({
      async: true,
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },

      success: function (response) {

        closeProfilePictureDeletionPopUp();
        $("#temp-profile-pic").animate({
          opacity: 0
        }, function () {

          resetAllProfilePictures();
          $("#temp-profile-pic").animate({
            opacity: 1
          });

        })

        $("#profile-pic-btns-spinner").fadeOut(100, function () {
          $("#profile-pic-btns").fadeIn(100, function () {
            profilePicLoading = false;
          });
        });

      }
    });
  });
});

function resetProfilePicture(id, background) {
  // SLIDER RESET
  // ANIMATION
  if (background) {
    var defaultPath = '/images/profile_picture_default/default.png';
  }
  $(id).css('background-image', 'url(' + defaultPath + ')');
  $(id).css('background-size', '100%');
  $(id).css('background-position-x', '0');
  $(id).css('background-position-y', '0');
  var classList1 = $(id).attr('class').split(/\s+/);
  $.each(classList1, function (index, item) {
    if (item.includes('rotate') && !item.includes("rotate-origin")) {
      $(id).removeClass(item);
    }
  });
  $(id).addClass("rotate0");
  angle = 0;
  slider1.value = 10;
}

function resetAllProfilePictures() {
  slider1.value = 10;
  resetProfilePicture('#temp-profile-pic', true);
  resetProfilePicture('#navbar_profile_pic', true);
  resetProfilePicture('#navbar_dropdown_profile_pic', true);
  resetProfilePicture('#profile-pic', true);
}


function setProfilePictureStats(id) {
 
  if ($(id).length != 0) {
    var tempProfilePictureID = "#temp-profile-pic";

    var classList = $(tempProfilePictureID).attr('class').split(/\s+/);
    var rotate;
    $.each(classList, function (index, item) {
      if (item.includes('rotate') && !item.includes("rotate-origin")) {
        rotate = item;
      }
    });
    //(id);
    if ($(id).length != 0) {
      var classList1 = $(id).attr('class').split(/\s+/);
      if (classList1 != null) {
        $.each(classList1, function (index, item) {
          if (item.includes('rotate') && !item.includes("rotate-origin")) {
            $(id).removeClass(item);
          }
        });
      }
    }

    var width = $(tempProfilePictureID).css("width");
    var zoom = $(tempProfilePictureID).css("background-size");
    var yPos = $(tempProfilePictureID).css("background-position-y");
    var xPos = $(tempProfilePictureID).css("background-position-x");


    width = pxToInt(width);
    yPos = pxToInt(yPos);
    xPos = pxToInt(xPos);
    yPos = (yPos / width).toFixed(2);
    xPos = (xPos / width).toFixed(2);

    var newWidth = $(id).css('width');
    xPos = xPos * pxToInt(newWidth);
    yPos = yPos * pxToInt(newWidth);

    $(id).addClass(rotate);
    $(id).css('background-position-x', xPos);
    $(id).css('background-position-y', yPos);
    $(id).css('background-size', zoom);
  }
}

function pxToInt(str) {
  str.replace("px", 0);
  return parseInt(str);
}


function openDiscardChangesPopUp() {
  $('#discard_modal').modal('show');
}



function openProfilePictureDeletionPopUp() {
  $('#edit_profile_picture_modal').modal('hide');
  $('#delete_profile_picture_modal').modal('show');
}

function closeProfilePictureDeletionPopUp() {
  $('#edit_profile_picture_modal').modal('show');
  $('#delete_profile_picture_modal').modal('hide');
}

function closeDiscardChangesPopUp() {
  $('#discard_modal').modal('hide');
  $('#edit_profile_picture_modal').modal('show');
}

function discardChanges() {
  //success
  $('#discard_modal').modal('hide');
  var form = new FormData();
  var bg = $('#temp-profile-pic').css('background-image');
  bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
  form.append('temp_path', bg);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    async: true,
    url: '/discard_profile_picture_changes',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {

    },

    success: function (response) {

      var profilePicturePath = $('#profile-pic').css('background-image');
      $('#temp-profile-pic').css('background-image', profilePicturePath);
    }
  });
}




