window.onpopstate = function () {
  location.reload();
};

function hideNavDropdown() {
  $('#navDrop').addClass("d-none");
  $("#navbarNav").removeClass("show");
  setTimeout(() => {
    $('#navDrop').removeClass("d-none");
  }, 10);
}

setInterval(() => {
  scrollPos = window.pageYOffset;
  $('*[id*=' + 'sticky_side_bar' + ']').each(function () {
    if (this.id == 'sticky_side_bar3') {

    }
    sideBar = document.getElementById(this.id);
    if (scrollPos > 80) {
      
      sideBar.style.top = "93px";
    }
  });
}, 10);

function filterTest3(inputID, dropdownID) {
  $('#'+dropdownID).removeClass('d-none');
  //document.getElementById('city-search').scrollIntoView(true);
  //document.getElementById(dropdownID).classList.remove("d-none");
  var inputValue = $('#' + inputID).val();
  var form = new FormData();
  form.append('inputValue', inputValue);
  form.append('inputID', inputID);
  form.append('dropdownID', dropdownID);
  // str, id, inputID
  //var str = "j";
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({async: true,
    url: '/search_city',
    method: 'post',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    beforeSend: function () {
      //
    },

    success: function (response) {

      $('#' + dropdownID).html(response);
   
      //var branchid = $('#city-search').val();
    }
  })
}

function fillInput(id, inputID, dropdownID) {
  var text = document.getElementById(id).innerHTML;
  document.getElementById(inputID).value = text;
  $('#'+dropdownID).addClass('d-none');
}

$(document).mouseup(function(e) 
{
    var container = $("#search-dropdown-city12");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});

$(document).mouseup(function(e) 
{
    var container = $("#search-dropdown-city1220");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});

$(document).mouseup(function(e) 
{
    var container = $("#search-dropdown-position");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});

$(document).mouseup(function(e) 
{
    var container = $("#input1_dropdown");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});

$(document).mouseup(function(e) 
{
    var container = $("#input0_dropdown");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});
$(document).mouseup(function(e) 
{
    var container = $("#input2_dropdown");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});
$(document).mouseup(function(e) 
{
    var container = $("#input2_lang_level_dropdown");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.addClass('d-none');
    }
});




function filterFunction1(id, dropdownID) {
  //
  $('#'+dropdownID).removeClass("d-none");
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
  //document.getElementById('position-search').scrollIntoView(true);

  if ($('#' + id).val() == '') {
    div = document.getElementById(dropdownID);
    a = div.getElementsByTagName("div");
    for (i = 0; i < a.length; i++) {
      a[i].style.display = "";
    }
    $('#' + dropdownID).addClass("d-block");
  }

  
}

// .chrome styling Vanilla JS

