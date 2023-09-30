var currentEducationStationID = "";
var returnToMainModalEducation;


$("#discard_edit_education_station_btn").on("click", function () {
  discardEditEducationStation();
});

$("#discard_edit_education_station_btn1").on("click", function () {
  discardEditEducationStation();
});

function discardEditEducationStation() {
  $('#hidden_modal_body_education' + currentEducationStationID).html($('#edit_education_station_modal_body').html());
  $('#edit_education_station_modal').modal('hide');
  if (returnToMainModalEducation == true) {
    $('#add_cv_modal').modal('show');
    returnToMainModalEducation = false;
  }
}

function addEducationStation(id) {
  var degree = $('#degree' + id).val();
  var degreeType = $('#degree_type' + id + ' :selected').html().trim();
  var customDegreeType = $('#custom_input_degree_type' + id).val();
  var school = $('#school' + id).val();
  var startMonth = $('#month_start' + id).val();
  var startYear = $('#year_start' + id).val();
  var endMonth = $('#month_end' + id).val();
  var endYear = $('#year_end' + id).val();

  var is_current_school = $('#is_current_school' + id).prop('checked');
  var is_custom_degree_type = false;


  if (customDegreeType != '') {
    degreeType = customDegreeType;
    is_custom_degree_type = true;
  }

  if (degreeType == '-') {
    degreeType = '';
  }

  if (startMonth == 'Month' || startMonth == null) {
    startMonth = '';
  }


  if (startYear == 'Jahr' || startYear == null) {
    startYear = '';
  }

  if (endMonth == 'Month' || endMonth == null) {
    endMonth = '';
    if (is_current_school == true) {
      endMonth = startMonth;
    }
  }

  if (endYear == 'Jahr' || endYear == null) {
    endYear = '';
    if (is_current_school == true) {
      endYear = startYear;
    }
  }


  var form = new FormData();
  form.append('degree', degree);
  form.append('school', school);
  form.append('degree_type', degreeType);
  form.append("start_month", startMonth);
  form.append("start_year", startYear);
  form.append("end_month", endMonth);
  form.append("end_year", endYear);
  form.append("is_current_school", is_current_school);
  form.append("is_custom_degree_type", is_custom_degree_type);


  $('#save_education_station_btn_text' + id).addClass("d-none");
  $('#save_education_station_btn_spinner' + id).removeClass("d-none");

  ajaxSetup();
  $.ajax({async: true,
    url: '/add_education_station',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {



      $('#save_education_station_btn_text' + id).removeClass("d-none");
      $('#save_education_station_btn_spinner' + id).addClass("d-none");


      clearErrorMsgs();

      if (response.length > 0) {
        handleError(response[0], "degree_error" + id);
        handleError(response[1], "degree_type_error" + id);
        handleError(response[2], "school_error" + id);
        handleError(response[3], "start_month_error" + id);
        handleError(response[4], "start_year_error" + id);
        handleError(response[5], "end_month_error" + id);
        handleError(response[6], "end_year_error" + id);
      } else {

        $('#education_station_btns' + id).addClass('animate__animated animate__backOutRight');
        setTimeout(() => {
          var addJobExperience = $('#add_education_station' + id);
          //$('#cv_modal_body').scrollTop(0);
          addJobExperience.animate({ maxHeight: 0 },
            250, function () {
              addJobExperience.addClass("d-none");
              $('#add_another_education_station').animate({
                opacity: 1
              }, 200);
              //$('#add_job_experience_text').removeClass("d-none");
              //$('#add_job_experience_spinner').addClass("d-none");
            });
        }, 500);

        updateEducationStations();
        updateEducationStationsPreview();
      }
    }
  });
}

function updateEducationStationsPreview() {
  var form = new FormData();
  ajaxSetup();
  $.ajax({async: true,
    url: "/get_education_stations_preview" + '/' + username,
    type: 'GET',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#education_stations_preview').slideUp(250);
      setTimeout(() => {
        $('#education_stations_preview').html(response);
        $('#education_stations_preview').slideDown(250);
      }, 250);
    }
  });
}

function deleteEducationStation(id) {

  var form = new FormData();
  form.append("id", id);
  ajaxSetup();
  $.ajax({async: true,
    url: '/delete_education_station',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      updateEducationStations();
      //updateEducationStationsPreview();
    }
  });
}
var gettingEducationForm = false;
var count1 = 0;
function addAnotherEducationStation() {
  if (!gettingEducationForm) {

    count1 = count1 + "edua";
    gettingEducationForm = true;

    $('#add_another_education_text').addClass("d-none");
    $('#add_another_education_spinner').removeClass("d-none");


    var form = new FormData();
    form.append('count', count1);

    ajaxSetup();
    $.ajax({async: true,
      url: '/get_add_education_form' + '/' + count1,
      type: 'GET',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {

        $('#add_education_stations').append(response);
        $('#add_education_station_header'+count1).removeClass('d-none');
        $('#add_another_education_station').addClass('animate__animated animate__backOutRight')
        setTimeout(() => {
          $('#add_education_station' + count1).removeClass('d-none').animate({ maxHeight: 2000 },
            200, function () {
              $('#add_another_education_station').removeClass('animate__animated animate__backOutRight');
            });
          $('#add_another_education_station').css("opacity", "0");
          $('#add_another_education_text').removeClass("d-none");
          $('#add_another_education_spinner').addClass("d-none");

          count1 = count1.toString().replace("addedua", "");
  
          count1 = parseInt(count1);
          count1++;
          gettingEducationForm = false;
        }, 500);
      }
    }); 
  }
}


function prepareEditEducationStationModal(id, degree, degree_type, school, start_date, end_date, is_current_school, is_custom_degree_type) {


  document.getElementById('add_education_station' + id).style.maxHeight = "2000px";

  $('#edit_education_station_modal').modal('show');


  var modalBody = $('#hidden_modal_body_education' + id).html();

  $('#hidden_modal_body_education' + id).html('');
  $('#edit_education_station_modal_body').html(modalBody);
  $('#education_station_btns' + id).addClass("d-none");


  $('#degree' + id).val(degree);
  $('#school' + id).val(school);

  $('#degree_type' + id).val(degree_type);

  $('#year_start' + id).val(start_date.substring(0, 4));
  $('#year_end' + id).val(end_date.substring(0, 4));
  var month_start = start_date.substring(5, 7);
  if (month_start.includes('0')) {
    month_start = month_start.replace('0', '');
  }
  $('#month_start' + id).val(month_start);

  var month_end = end_date.substring(5, 7);
  if (month_end.includes('0')) {
    month_end = month_end.replace('0', '');
  }
  $('#month_end' + id).val(month_end);

  if (is_current_school == "true") {
    $('#is_current_school' + id).prop('checked', true);

    disableDatePicker(id);
  }


  var customInputBox = $('#custom_input_box_degree_type' + id);
  var customInput = $('#custom_input_degree_type' + id);

  if (is_custom_degree_type == "true") {

    $("#degree_type" + id).blur();
    $('#degree_type' + id).val('Eigene Angabe...');
    customInputBox.removeClass("d-none");
    customInput.get(0).focus();
    customInput.val(degree_type);
  }

  currentEducationStationID = id;

}

$('#update_education_station_btn').on('click', function () {
  $('#update_education_station_btn').trigger('blur');
  updateEducationStation(currentEducationStationID);
});
$('#update_education_station_btn1').on('click', function () {
  $('#update_education_station_btn1').trigger('blur');
  updateEducationStation(currentEducationStationID);
});
$('#update_education_station_btn2').on('click', function () {
  $('#update_education_station_btn2').trigger('blur');
  updateEducationStation(currentEducationStationID);
});

function updateEducationStation(id) {
  var degree = $('#degree' + id).val();
  var degreeType = $('#degree_type' + id + ' :selected').html().trim();
  var customDegreeType = $('#custom_input_degree_type' + id).val();
  var school = $('#school' + id).val();
  var startMonth = $('#month_start' + id).val();
  var startYear = $('#year_start' + id).val();
  var endMonth = $('#month_end' + id).val();
  var endYear = $('#year_end' + id).val();

  var is_current_school = $('#is_current_school' + id).prop('checked');
  var is_custom_degree_type = false;


  if (customDegreeType != '') {
    degreeType = customDegreeType;
    is_custom_degree_type = true;
  }

  if (degreeType == '-') {
    degreeType = '';
  }

  if (startMonth == 'Month' || startMonth == null) {
    startMonth = '';
  }


  if (startYear == 'Jahr' || startYear == null) {
    startYear = '';
  }

  if (endMonth == 'Month' || endMonth == null) {
    endMonth = '';
    if (is_current_school == true) {
      endMonth = startMonth;
    }
  }

  if (endYear == 'Jahr' || endYear == null) {
    endYear = '';
    if (is_current_school == true) {
      endYear = startYear;
    }
  }


  var form = new FormData();
  form.append('id', id);
  form.append('degree', degree);
  form.append('school', school);
  form.append('degree_type', degreeType);
  form.append("start_month", startMonth);
  form.append("start_year", startYear);
  form.append("end_month", endMonth);
  form.append("end_year", endYear);
  form.append("is_current_school", is_current_school);
  form.append("is_custom_degree_type", is_custom_degree_type);


  $('#save_education_station_btn_text' + id).addClass("d-none");
  $('#save_education_station_btn_spinner' + id).removeClass("d-none");

  ajaxSetup();
  $.ajax({async: true,
    url: '/update_education_station',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {



      $('#save_education_station_btn_text' + id).removeClass("d-none");
      $('#save_education_station_btn_spinner' + id).addClass("d-none");


      clearErrorMsgs();

      if (response.length > 0) {
        handleError(response[0], "degree_error" + id);
        handleError(response[1], "degree_type_error" + id);
        handleError(response[2], "school_error" + id);
        handleError(response[3], "start_month_error" + id);
        handleError(response[4], "start_year_error" + id);
        handleError(response[5], "end_month_error" + id);
        handleError(response[6], "end_year_error" + id);
      } else {

        //updateJobExperiences();
        //updateJobExperiencesPreview();

        updateEducationStations();
        updateEducationStationsPreview();

        $('#edit_education_station_modal').modal('hide');
        $('#hidden_modal_body_education' + id).html($('#edit_education_station_modal').html());
        if (returnToMainModalEducation == true) {
          $('#add_cv_modal').modal('show');
          returnToMainModalEducation = false;
        }
      }
    }
  });
}

function getEducationStations() {
  var form = new FormData();
  ajaxSetup();

  $.ajax({async: true,
    url: "/get_education_stations" + '/' + username,
    type: 'GET',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#education_stations').html(response);
    }
  });
}

function updateEducationStations() {
  var form = new FormData();

  ajaxSetup();

  $.ajax({async: true,
    url: "/get_education_stations" + '/' + username,
    type: 'GET',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#education_stations').html(response);
    }
  });
}