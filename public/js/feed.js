


var postSubmitted = false;
$(function () {
  $('#post_form').on('submit', function (e) {
    e.preventDefault();
    var form = new FormData(this);
    var tempPath = $('#post_img_inner').attr('src');
    tempPath = tempPath.replace('url(', '').replace(')', '').replace(/\"/gi, "");
    form.append('temp_path', tempPath);


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
        if (postSubmitted == false) {
          if (response.length == 1) {
            postSubmitted = true;
            $('#submit_post_btn').trigger('blur');
            $('#post_modal').modal('hide');
            //unsetBtn();
            changeBtnColor('feed1');
            $("#posts_spinner").fadeIn(function () { });
            setTimeout(() => {
              $("#posts_spinner").fadeOut(function () {
                $("#posts_spinner").fadeOut(function () {
                  $('#loaded_posts').html(response[0] + $('#loaded_posts').html());
                  postSubmitted = false;
                  $("#body").val("");
                });
              });

            }, 100);


          } else {
            $('#submit_post_btn').trigger('blur');
            $('#post_error_messages').html("Huh hast du nicht was vergessen?");
          }
        }
      }
    });
  });
});


/// ONCLICK NOT ÄNDERN

function addPostLike(id) {
  changeLikeImg('like_img', id);
  changeLikeImg('remove_like_img', id);

  var form = new FormData();
  form.append('post_id', id);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    async: true,
    url: '/like_post',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',

    success: function (response) {
      $('#like_count' + id).html(response[0]);
    }
  })
}

function changeLikeImg(img_id, id) {
  $('#' + img_id + id).attr('src', '/images/Likeactive.svg');
  $('#' + img_id + id).attr('onclick', '');

  $('#' + img_id + id).addClass("animate__animated animate__heartBeat animate__slow");
  setTimeout(function () {
    $('#' + img_id + id).removeClass("animate__animated animate__heartBeat animate__slow");
    $('#' + img_id + id).attr('onclick', 'removePostLike(' + id + ')');
  },
    500);
}

function removePostLike(id) {
  $('#like_img' + id).attr('src', '/images/Like.svg');
  $('#remove_like_img' + id).attr('src', '/images/Like.svg');


  $('#like_img' + id).attr('onclick', 'addPostLike(' + id + ')');
  $('#remove_like_img' + id).attr('onclick', 'addPostLike(' + id + ')');


  var form = new FormData();
  form.append('post_id', id);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    async: true,
    url: '/remove_post_like',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',

    success: function (response) {
      $('#like_count' + id).html(response[0]);
    }
  })
}


function post() {
  $('#submit_post').trigger('click');
}

//$('#post_modal').modal('show');
$("input#upload_post_image").on('change', function () {

  $('#upload_post_image_submit').trigger('click');
});


function openDiscardChangesPostPopUp() {
  var postTest = $('#post_body').val();
  changeBtnColor('feed1');
  if (postTest != "") {
    $('#discard_post').modal('show');
  } else {
    $('#post_modal').modal('hide');
  }
}



function closeDiscardChangesPostPopUp() {
  $('#discard_post').modal('hide');
  $('#post_modal').modal('show');
}


function discardChangesPost() {

  // clear input fields here, also after posting
}

function auto_grow(element, height) {
  //element.style.height = "5px";
  if (element.scrollHeight < height) {
    element.style.height = height + "px";
  } else {
    element.style.height = (element.scrollHeight) + "px";
  }


  if (element.value == '') {
    element.style.height = height + "px";
  }
}


function clearComment(id) {
  //$('#' + id).css("height", "45px").val('');
}

function clearPostInput() {
  $('#post_body').val("");
  auto_grow1(document.getElementById('post_body'));
  $('#post_img_parent').addClass("d-none");
  $('#add_post_img_btn').removeClass("d-none");
  $('#post_error_messages').html('');
}

function deletePostImage() {

  $('#submit_delete_post_image').trigger('click');
  $('#post_img_parent').addClass("d-none");
  $('#add_post_img_btn').removeClass("d-none");
  // removing Image
}

function uploadPostImage() {
  $('#submit_profile_pic').trigger('click');
  $('#add_post_img_btn').addClass("d-none");


  // success
  //$('#post_img').removeClass("d-none");
}

function discardPost() {
  $('#discard_post').modal('hide');
  //unsetBtn();
  changeBtnColor('feed1');
  //success
  var form = new FormData();
  var tempPath = $('#post_img').attr('src');

  tempPath = tempPath.replace('url(', '').replace(')', '').replace(/\"/gi, "");
  form.append('tempPath', tempPath);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    async: true,
    url: '/discard_post',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {

    },

    success: function (response) {
    }
  });
}


$(function () {
  $('#upload_post_image_form').on('submit', function (e) {
    e.preventDefault();
    var form = new FormData(this);
    var tempPath = $('#post_img').css('background-image');
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
        var bg = "url(" + response[0] + ")";

        $('#post_img').css('background-image', bg);
        $('#post_img_inner').attr('src', response[0]);

        $('#add_post_img_btn').addClass("d-none");
        $('#post_img_parent').removeClass("d-none");
      }
    });
  });
});


$(function () {
  $('#delete_post_image_form').on('submit', function (e) {

    e.preventDefault();
    var form = new FormData(this);
    var tempPath = $('#post_img_inner').attr('src');

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

      }
    });
  });
});

$(function () {
  $('#discard_post_image_form').on('submit', function (e) {

    e.preventDefault();
    var form = new FormData(this);
    var tempPath = $('#post_img').attr('src');

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

      }
    });
  });
});



// COMMENTS

function addComment(postID) {

  // hier mal ohne form ausprobieren

  var form = new FormData();
  var text = $('#comment_textarea' + postID).val();
  $('#comment_textarea' + postID).css("height", "37px").val('');
  //text = text.replace(/\n\r?/g, '<br>');

  form.append('text', text);
  form.append('postID', postID);
  if (text != '') {
    $('#add_comment_skeleton').removeClass('d-none');
  }


  ajaxSetup();

  $.ajax(
    {
      url: '/add_comment',
      type: 'POST',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () {

      },
      success: function (response) {
        var commentCount = parseInt($('#comment_count' + postID).html());
        commentCount++;
        $('#comment_count' + postID).html(commentCount);
        $('#comment_btn' + postID).trigger('blur');
        $('#comments' + postID).html(response + $('#comments' + postID).html());
        $('#add_comment_skeleton').addClass('d-none');
      }
    });
}

function scrollToComments(id1) {

  /*document.getElementById('collapse' + id1).scrollIntoView(true);



  const id = 'collapse' + id1;
  const yOffset = -900;
  const element = document.getElementById(id);
  const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

  window.scrollTo({ top: y, behavior: 'auto' });*/
}


function unsetBtn() {
  /*var html = $('#makepost').html();
  html = html.replaceAll("#FF7921", "#FFF");
  $('#makepost').html(html);
  var html1 = $('#feed1').html();
  html1 = html1.replaceAll("#FFF", "#FF7921");
  $('#feed1').html(html1);*/
}


// GET ALL POSTS IDS AND COMBINE




var loadingPost = false;
var postCount = 0;

var lastMaxScroll = 0;
var feedURL = window.location.toString();

$(window).scroll(function () {
  if (feedURL.includes('/feed') && !feedURL.includes('/feed/'))
    var lengthOfAllPostsCombined = calcPostsHeight();

  if (lengthOfAllPostsCombined != 0) {
    var scrollBottom = $(window).scrollTop() + $(window).height();
    if (scrollBottom >= lengthOfAllPostsCombined / 5 && lastMaxScroll <= scrollBottom) {


      if (loadingPost == false) {

        loadingPost = true;
        var form = new FormData();
        form.append('count', postCount);


        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax(
          {
            url: '/load_next_post',
            type: 'POST',
            data: form,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (response) {
              // in html ballern
              // update lenghtofpostcombined
              //
              //

              for (var i = 0; i < response.length - 1; i++) {

                $('#loaded_posts').append(response[i]);

                var height = $('#' + 'post-scroll-' + response[i + 1]).height();

                lengthOfAllPostsCombined += height;

                lastMaxScroll = $(window).scrollTop() + $(window).height();

                i++;
              }
              loadingPost = false;
              var sub = response.length / 2;
              postCount += sub;
            }
          });
      }
    }
  }
});

function calcPostsHeight() {
  var sum = 0;
  $('*[id*=' + 'post-scroll-' + ']').each(function () {

    var height = $('#' + this.id).height();
    if (height != 0) {
      //
    }
    sum += height;
  });
  return sum;
}

function showMoreText(id) {
  $('#rest_'+id).removeClass('d-none');
  $('#dots_'+id).addClass('d-none');
  $('#show_more_btn_'+id).addClass('d-none');
  $('#show_less_btn_'+id).removeClass('d-none');
} 

function showLessText(id) {
  $('#rest_'+id).addClass('d-none');
  $('#dots_'+id).removeClass('d-none');
  $('#show_more_btn_'+id).removeClass('d-none');
  $('#show_less_btn_'+id).addClass('d-none');
}