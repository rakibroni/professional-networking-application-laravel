//////////////////////////////////
// ADD EXPERIENCE AND EDUCATION //
//////////////////////////////////

// RESET
function resetCV() {

  // BALD
}


function deleteJobExperience(id) {
  var form = new FormData();
  form.append("id", id);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: '/delete_job_experience',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      updateJobExperiences();
    }

  });
}


// OPEN MODALs
//openUpdateCVPopUp();
$("#open_cv_modal").on("click", function () {
  openUpdateCVPopUp();
});

function openUpdateCVPopUp() {
  $('#add_cv_modal').modal('show');
}

/// SAVE EXPERIENCE
$("#save_experience_btn").on("click", function () {
  //addJobExperience();
});

$("#discard_save_experience_btn").on("click", function () {
  //addJobExperience();
});

function addJobExperience(id) {

  var saveBtn = 'save_experience_btn' + id;
  var position = $('#position-search1' + id).val();
  var company = $('#company' + id).val();
  var companyType = $('#company_type' + id + ' :selected').html().trim();
  var customCompanyType = $('#custom_input_company_type' + id).val();
  var employmentType = $('#employment_type' + id + ' :selected').html().trim();
  var customEmploymentType = $('#custom_input_employment_type' + id).val();
  var jobLocation = $('#city-search1' + id).val();
  var description = $('#job_description' + id).val();

  var startMonth = $('#month_start' + id).val();
  var startYear = $('#year_start' + id).val();
  //var startYear = $('#year_start' + id + ' :selected').html().trim();

  //var endMonth = $('#month_end' + id + ' :selected').html().trim();
  var endMonth = $('#month_end' + id).val();
  var endYear = $('#year_end' + id).val();
  var is_current_position = $('#is_current_position' + id).prop('checked');
  var is_custom_employment_type = false;
  var is_custom_company_type = false;



  if (customEmploymentType != '') {
    employmentType = customEmploymentType;
    is_custom_employment_type = true;

  }

  if (customCompanyType != '') {
    companyType = customCompanyType;
    is_custom_company_type = true;
  }

  if (companyType == '-') {
    companyType = '';
  }

  if (employmentType == '-') {
    employmentType = '';
  }



  if (startMonth == 'Month' || startMonth == null) {
    startMonth = '';
  }


  if (startYear == 'Jahr' || startYear == null) {
    startYear = '';
  }


  if (endMonth == 'Month' || endMonth == null) {
    endMonth = '';
    if (is_current_position == true) {
      endMonth = startMonth;
    }
  }

  if (endYear == 'Jahr' || endYear == null) {
    endYear = '';
    if (is_current_position == true) {
      endYear = startYear;
    }
  }



  jobLocation = jobLocation.toString();
  var location_city = jobLocation.split(',')[0];
  var location_state = jobLocation.split(', ')[1];

  var form = new FormData();
  form.append('position', position);
  form.append('company', company);
  form.append('company_type', companyType);
  form.append('employment_type', employmentType);
  form.append("location_city", location_city);
  form.append("location_state", location_state);
  form.append("description", description);
  form.append("start_month", startMonth);
  form.append("start_year", startYear);
  form.append("end_month", endMonth);
  form.append("end_year", endYear);
  form.append("is_current_position", is_current_position);
  form.append("is_custom_employment_type", is_custom_employment_type);
  form.append("is_custom_company_type", is_custom_company_type);


  
  

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });




  $('#save_experience_btn_text' + id).addClass("d-none");
  $('#save_experience_btn_spinner' + id).removeClass("d-none");

  $.ajax({async: true,
    url: '/add_job_experience',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      


      $('#save_experience_btn_text' + id).removeClass("d-none");
      $('#save_experience_btn_spinner' + id).addClass("d-none");


      //blurSubmitBtns(saveBtn);
      clearErrorMsgs();

      if (response.length > 0) {

        handleError(response[0], "position_error" + id);
        handleError(response[1], "employment_type_error" + id);
        handleError(response[2], "company_error" + id);
        handleError(response[3], "company_type_error" + id);
        handleError(response[4], "location_error" + id);
        handleError(response[5], "start_month_error" + id);
        handleError(response[6], "start_year_error" + id);
        handleError(response[7], "description_error" + id);
        handleError(response[8], "end_month_error" + id);
        handleError(response[9], "end_year_error" + id);


        $('#search-dropdown-city1' + id).removeClass("d-block");

      } else {

        $('#save_experience_btn' + id).addClass('animate__animated animate__backOutRight');
        setTimeout(() => {
          var addJobExperience = $('#add_job_experience' + id);
          $('#cv_modal_body').scrollTop(0);
          addJobExperience.animate({ height: 0, margin: 0, padding: 0 },
            250, function () {
              addJobExperience.addClass("d-none");
              $('#add_another_job_experience').animate({ opacity: 1 }, 200);
              $('#add_job_experience_text').removeClass("d-none");
              $('#add_job_experience_spinner').addClass("d-none");
            });
        }, 500);

        updateJobExperiences();
        updateJobExperiencesPreview();
      }


    }
  });

  // ERROR HANDLER EINFÜGEN BEI WELCOME UND REGISTER

}


var currentJobExperienceID = "";
var returnToMainModal;
$("#discard_edit_job_experience").on("click", function () {
  discardEditJobExperience();
});

$("#discard_edit_job_experience1").on("click", function () {
  discardEditJobExperience();
});

function discardEditJobExperience() {
  $('#hidden_modal_body' + currentJobExperienceID).html($('#edit_job_experience_modal_body').html());
  $('#edit_job_experience_modal').modal('hide');
  if (returnToMainModal == true) {
    $('#add_cv_modal').modal('show');
    returnToMainModal = false;
  }


}



$('#update_job_experience_btn').on('click', function () {
  $('#update_job_experience_btn').trigger('blur');
  updateJobExperience(currentJobExperienceID);
});
$('#update_job_experience_btn1').on('click', function () {
  $('#update_job_experience_btn1').trigger('blur');
  updateJobExperience(currentJobExperienceID);
});
$('#update_job_experience_btn2').on('click', function () {
  $('#update_job_experience_btn2').trigger('blur');
  updateJobExperience(currentJobExperienceID);
});


function updateJobExperience(id) {

  //$('#hidden_modal_body' + id).html($('#edit_job_experience_modal_body'+id).html());

  var saveBtn = 'save_experience_btn' + id;
  var position = $('#position-search1' + id).val();
  var company = $('#company' + id).val();
  var companyType = $('#company_type' + id + ' :selected').html().trim();
  var customCompanyType = $('#custom_input_company_type' + id).val();
  var employmentType = $('#employment_type' + id + ' :selected').html().trim();
  var customEmploymentType = $('#custom_input_employment_type' + id).val();
  var jobLocation = $('#city-search1' + id).val();
  var description = $('#job_description' + id).val();

  var startMonth = $('#month_start' + id).val();

  var startYear = $('#year_start' + id).val();
  //var startYear = $('#year_start' + id + ' :selected').html().trim();

  //var endMonth = $('#month_end' + id + ' :selected').html().trim();
  var endMonth = $('#month_end' + id).val();

  var endYear = $('#year_end' + id).val();
  var is_current_position = $('#is_current_position' + id).prop('checked');

  var is_custom_employment_type = false;
  var is_custom_company_type = false;



  if (customEmploymentType != '') {
    employmentType = customEmploymentType;
    is_custom_employment_type = true;

  }

  if (customCompanyType != '') {
    companyType = customCompanyType;
    is_custom_company_type = true;
  }

  if (companyType == '-') {
    companyType = '';
  }

  if (employmentType == '-') {
    employmentType = '';
  }



  if (startMonth == 'Month' || startMonth == null) {
    startMonth = '';
  }


  if (startYear == 'Jahr' || startYear == null) {
    startYear = '';
  }


  if (endMonth == 'Month' || endMonth == null) {
    endMonth = '';
    if (is_current_position == true) {
      endMonth = startMonth;
    }
  }

  if (endYear == 'Jahr' || endYear == null) {
    endYear = '';
    if (is_current_position == true) {
      endYear = startYear;
    }
  }



  jobLocation = jobLocation.toString();
  var location_city = jobLocation.split(',')[0];
  var location_state = jobLocation.split(', ')[1];


  var form = new FormData();
  form.append('id', id);
  form.append('position', position);
  form.append('company', company);
  form.append('company_type', companyType);
  form.append('employment_type', employmentType);
  form.append("location_city", location_city);
  form.append("location_state", location_state);
  form.append("description", description);
  form.append("start_month", startMonth);
  form.append("start_year", startYear);
  form.append("end_month", endMonth);
  form.append("end_year", endYear);
  form.append("is_current_position", is_current_position);
  form.append("is_custom_employment_type", is_custom_employment_type);
  form.append("is_custom_company_type", is_custom_company_type);

  ajaxSetup();

  //$('#save_experience_btn_text' + count).addClass("d-none");
  //$('#save_experience_btn_spinner' + count).removeClass("d-none");

  $.ajax({async: true,
    url: '/update_job_experience',
    type: 'POST',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {



      //$('#save_experience_btn_text' + count).removeClass("d-none");
      //$('#save_experience_btn_spinner' + count).addClass("d-none");


      //blurSubmitBtns(saveBtn);
      clearErrorMsgs();
      if (response.length > 0) {

        handleError(response[0], "position_error" + id);
        handleError(response[1], "employment_type_error" + id);
        handleError(response[2], "company_error" + id);
        handleError(response[3], "company_type_error" + id);
        handleError(response[4], "location_error" + id);
        handleError(response[5], "start_month_error" + id);
        handleError(response[6], "start_year_error" + id);
        handleError(response[7], "description_error" + id);
        handleError(response[8], "end_month_error" + id);
        handleError(response[9], "end_year_error" + id);


        $('#search-dropdown-city1' + id).removeClass("d-block");

      } else {
        updateJobExperiences();
        updateJobExperiencesPreview();
        $('#edit_job_experience_modal').modal('hide');
        $('#hidden_modal_body' + id).html($('#edit_job_experience_modal_body').html());
        if (returnToMainModal == true) {
          $('#add_cv_modal').modal('show');
          returnToMainModal = false;
        }
      }
    }
  });
}




var count2 = 0;
var gettingPositionForm = false;
function AddAnotherPosition() {
  if (!gettingPositionForm) {
    count2 = count2 + "add";
    gettingPositionForm = true;

    $('#cv_modal_body').scrollTop(0);


    $('#add_job_experience_text').addClass("d-none");
    $('#add_job_experience_spinner').removeClass("d-none");

    //$('#job_experiences_preview').slideUp(250);
    var form = new FormData();
    form.append('count', count2);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({async: true,
      url: '/get_add_experience_form' + '/' + count2,
      type: 'GET',
      data: form,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        $('#add_job_experiences').append(response);
        $('#add_job_experience_header' + count2).removeClass('d-none');
        $('#add_another_job_experience').addClass('animate__animated animate__backOutRight');
        setTimeout(() => {
          $('#add_job_experience' + count2).animate({ maxHeight: 2000 },
            200, function () {
              $('#add_another_job_experience').removeClass('animate__animated animate__backOutRight');
            });
          $('#add_another_job_experience').removeClass('animate__animated animate__backOutRight');
          $('#add_another_job_experience').css("opacity", "0");
          count2 = count2.toString().replace("add");
          count2 = parseInt(count2);
          count2++;
          gettingPositionForm = false;
        }, 500);
      }
    });
  }
}

function updateJobExperiences() {

  var form = new FormData();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: "/get_job_experiences" + '/' + username,
    type: 'GET',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#job_experiences').html(response);
    }
  });
}

function updateJobExperiencesPreview() {
  var form = new FormData();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({async: true,
    url: "/get_job_experiences_preview" + '/' + username,
    type: 'GET',
    data: form,
    processData: false,
    contentType: false,
    dataType: 'json',
    success: function (response) {
      $('#job_experiences_preview').slideUp(250);
      setTimeout(() => {
        $('#job_experiences_preview').html(response);
        $('#job_experiences_preview').slideDown(250);
      }, 250);
    }
  });
}

function prepareEditExperienceModal(id, job_location, company, description, employment_type, company, company_type, employment_type, start_date, end_date, position, is_current_position, is_custom_company_type, is_custom_employment_type) {

  document.getElementById('add_job_experience' + id).style.maxHeight = "2000px";

  $('#edit_job_experience_modal').modal('show');
  var modalBody = $('#hidden_modal_body' + id).html();
  $('#hidden_modal_body' + id).html('');
  $('#edit_job_experience_modal_body').html(modalBody);
  $('#job_experiences_btns' + id).addClass("d-none");

  // SET VALUES
  $('#position-search1' + id).val(position);
  $('#company' + id).val(company);
  $('#city-search1' + id).val(job_location);
  $('#job_description' + id).val(description);
  $('#employment_type' + id).val(employment_type);
  $('#company_type' + id).val(company_type);
  // OBEN FUNCKTIONIERT VALUES IM SELECT NUR ANPASSEN !
  // onclose put back into

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

  if (is_current_position == "true") {
    $('#is_current_position' + id).prop('checked', true);

    disableDatePicker(id);
  }

  //var customEmploymentType = $('#custom_input_employment_type' + count).val();
  //var customCompanyType = $('#custom_input_company_type' + count).val();
  /*if (customCompanyType != '') {
    companyType = customCompanyType;
  }*/

  var customInputBox = $('#custom_input_box_employment_type' + id);
  var customInput = $('#custom_input_employment_type' + id);

  if (is_custom_employment_type == "true") {

    $("#employment_type" + id).blur();
    $('#employment_type' + id).val('Eigene Angabe...');
    customInputBox.removeClass("d-none");
    customInput.get(0).focus();
    customInput.val(employment_type);
  }

  var customInputBox1 = $('#custom_input_company_type_box' + id);
  var customInput1 = $('#custom_input_company_type' + id);
  if (is_custom_company_type == "true") {
    $("#company_type" + id).blur();
    $('#company_type' + id).val('Eigene Angabe...');
    customInputBox1.removeClass("d-none");
    customInput1.get(0).focus();
    customInput1.val(company_type);
  }
  currentJobExperienceID = id;
}


