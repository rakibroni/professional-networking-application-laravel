function clearErrorMsgs() {

  $('*[id*=' + 'error' + ']:visible').each(function () {
    $('#' + this.id).addClass("d-none");
  });
}

function handleError(errorMsg, id) {
  if (errorMsg != "undefined") {
    if (errorMsg != ".") {

      $('#' + id).removeClass("d-none");
      $('#' + id).html(formatErrorMsg(errorMsg));
    }



  }
}

function formatErrorMsg(errorMsg) {
  if (errorMsg != null) {
    errorMsg = errorMsg.toString();
    errorMsg = errorMsg.replaceAll(".,", ". ");
    if (errorMsg.includes("Passwort Format ist ungültig.")) {
      errorMsg = "Format: Kombination aus mind. acht Ziffern, Groß- und Kleinbuchstaben.";
    }
  }
  return errorMsg;
}

function blurSubmitBtns(id) {
  $('*[id*=' + id + ']:visible').each(function () {
    $('#' + this.id).trigger('blur');
  });
}

$('*[id*=' + 'input0_inner_' + ']').each(function () {
  //alert(this.id)
});