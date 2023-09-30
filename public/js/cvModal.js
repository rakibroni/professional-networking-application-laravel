function showCVModalContent(id, optional) {
  

  if (typeof optional === 'undefined') { optional = 'default'; }
  if (optional == 'default') {

    optional = '0';
  }


  hideAllCVModalContent();
  $('#'+id+optional).addClass('activeModal');

  id = id.replace('show_', '');
  $('#' + id).removeClass('d-none');
}

function hideAllCVModalContent() {
  $('*[id*=' + 'modal_box' + ']').each(function () {
    $('#'+this.id).removeClass('activeModal');
    if (this.id.includes('show_') == false) {
      $('#' + this.id).addClass('d-none');
    } 
  });
}

$(document).on('click', function (e) {
  var id1 = e.target.id;


  var id = e.target.id.slice(0, -1);
  if (id.includes("show") && !id.includes('open')) {
    showCVModalContent(id);
  }


  if (id1.includes("show") && !id1.includes('open')) {
    $('*[id*=' + 'modal_box' + ']').each(function () {
      $('#'+this.id).removeClass('activeModal');
    }); 
    $('#'+id1).addClass('activeModal');

  }
});

function openCVModal(id, optional) {
  if (typeof optional === 'undefined') { optional = 'default'; }
  id = id.slice(0, -1);

  id = id.replace('open_', '');
  id = id + "_box";
  showCVModalContent(id, optional);
  $('#add_cv_modal').modal('show');
  
}

setTimeout(() => {
  AddAnotherPosition();
  addAnotherEducationStation();
}, 200);


$( "#training_modal_sub_box" ).on('mouseover', function() {
  $('*[id*=' + 'modal_box' + ']').each(function () {
    $('#'+this.id).removeClass('activeModal');
  }); 
  $('#show_other_modal_box0').addClass('activeModal');
});

$( "#skills_modal_sub_box" ).on('mouseover', function() {
  $('*[id*=' + 'modal_box' + ']').each(function () {
    $('#'+this.id).removeClass('activeModal');
  }); 
  $('#show_other_modal_box1').addClass('activeModal');
});

$( "#language_modal_sub_box" ).on('mouseover', function() {
  $('*[id*=' + 'modal_box' + ']').each(function () {
    $('#'+this.id).removeClass('activeModal');
  }); 
  $('#show_other_modal_box2').addClass('activeModal');
});