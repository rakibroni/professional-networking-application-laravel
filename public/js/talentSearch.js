
var searchingTalents = false;
function searchTalents() {

  if (!searchingTalents) {
    searchingTalents = true;
    var location = $('#city-search').val();
    var companyType = $('#institution_type').val();
    var contractType = $('#contract_type').val();
    var position = $('#position-search').val();
    var driversLicense = getDriversLicenseNecessity();
    var contractStart = $('#contract_start').val();
    var furtherEducation = getAllSelectedItems('input0');
    var documentationSystems = getAllSelectedItems('input1');
    var languages = getAllSelectedItems('input2');
    var locationCity = location.split(',')[0];
    var locationState = location.split(', ')[1];

    console.log(languages);
    $('#search_talents').removeClass('d-none');
    $('#saved_talents').addClass('d-none');
    hideContentShowSkeletons('talents', 'talents_skeletons');
    var form = new FormData;
    var yearsOfExperience = $('#years_of_experience_slider').val();
    form.append('driversLicense', driversLicense);
    console.log(driversLicense);
    form.append('yearsOfExperience', yearsOfExperience);
    form.append('locationCity', locationCity);
    form.append('locationState', locationState);
    form.append('position', position);
    form.append('companyType', companyType);
    form.append('contractType', contractType);
    form.append('contractStart', contractStart);
    form.append('documentationSystems', JSON.stringify(documentationSystems));
    form.append('furtherEducation', JSON.stringify(furtherEducation));
    form.append('languages', JSON.stringify(languages));
    ajaxSetup();
    var functionsOnSuccess = [
      [showContentHideSkeletons, ['talents', 'talents_skeletons', 'response']],
      [unlockSearch, ['']]
    ];
    ajax('/get_talents', 'POST', functionsOnSuccess, form);
  } else {
    console.log("search forbidden");
  }
}

function unlockSearch() {
  searchingTalents = false;
  console.log("enabling search");
}

function setDriversLicenseNecessity(id) {
  $('#' + 'drivers_license_neccessary').removeClass('drivers-license-btn-active');
  $('#' + 'drivers_license_not_neccessary').removeClass('drivers-license-btn-active');
  $('#' + id).addClass('drivers-license-btn-active');
  searchTalents();
}

function getDriversLicenseNecessity() {
  var isNeccessary = false;
  if ($('#' + 'drivers_license_neccessary').hasClass('drivers-license-btn-active')) {
    isNeccessary = true;
  }
  return isNeccessary;
}





function talentSearchSave(){
  var location = $('#city-search').val();
  var location_split = location.split(/,/);
  var companyType = $('#institution_type').val();
  var contractType = $('#contract_type').val();
  var position = $('#position-search').val();
  var driversLicense = getDriversLicenseNecessity();
  var contractStart = $('#contract_start').val();
  var furtherEducation = getAllSelectedItems('input0');
  var documentationSystems = getAllSelectedItems('input1');
  var languages = getAllSelectedItems('input2');
  var locationCity = location_split[0];
  var locationState = location_split[1];
  var yearsOfExperience = $('#years_of_experience_slider').val(); 
  var form = new FormData; 
  
  form.append('driversLicense', driversLicense);  
  form.append('yearsOfExperience', yearsOfExperience);
  form.append('locationCity', locationCity);
  form.append('locationState', locationState);
  form.append('position', position);
  form.append('companyType', companyType);
  form.append('contractType', contractType);
  form.append('contractStart', contractStart);
  form.append('documentationSystems', JSON.stringify(documentationSystems));
  form.append('furtherEducation', JSON.stringify(furtherEducation));
  form.append('languages', JSON.stringify(languages));
  ajaxSetup();
  var functionsOnSuccess = [
    [displayTalentSearchSave, ['response']]
  ];
  ajax('/save_talent_search', 'POST', functionsOnSuccess, form);
}
function displayTalentSearchSave(content) {
  alert('Data save successfully');
}

function talentSearchEdit(){
  var location = $('#city-search').val();
  var location_split = location.split(/,/);
  var companyType = $('#institution_type').val();
  var contractType = $('#contract_type').val();
  var position = $('#position-search').val();
  var driversLicense = getDriversLicenseNecessity();
  var contractStart = $('#contract_start').val();
  var furtherEducation = getAllSelectedItems('input0');
  var documentationSystems = getAllSelectedItems('input1');
  var languages = getAllSelectedItems('input2');
  var locationCity = location_split[0];
  var locationState = location_split[1];
  var yearsOfExperience = $('#years_of_experience_slider').val();  
  var talentSearchId = $('#talent_search_id').val();  

  var form = new FormData;
  
  form.append('talentSearchId', talentSearchId);  
  form.append('driversLicense', driversLicense);  
  form.append('yearsOfExperience', yearsOfExperience);
  form.append('locationCity', locationCity);
  form.append('locationState', locationState);
  form.append('position', position);
  form.append('companyType', companyType);
  form.append('contractType', contractType);
  form.append('contractStart', contractStart);
  form.append('documentationSystems', JSON.stringify(documentationSystems));
  form.append('furtherEducation', JSON.stringify(furtherEducation));
  form.append('languages', JSON.stringify(languages));
  ajaxSetup();
  var functionsOnSuccess = [
    [displayTalentSearchUpdate, ['response']]
  ];
  ajax('/edit_talent_search', 'POST', functionsOnSuccess, form);
}
function displayTalentSearchUpdate(content) {
  alert('Data Update successfully');
}

function searchTalentsById($talent_search_id){
  var form = new FormData; 
  form.append('talent_search_id', $talent_search_id);
  ajaxSetup();
  var functionsOnSuccess = [
    [ loadSearchPage, ['savedSearch', 'response']]
  ];
  ajax('/talent_search_by_id', 'POST', functionsOnSuccess, form);
}
