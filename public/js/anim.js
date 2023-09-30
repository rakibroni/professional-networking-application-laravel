function animScaleTransform(id, time, optionalFunction, optionalFunctionTimeOut) {

  optionalFunction = setOptionalFunction(optionalFunction);
  optionalFunctionTimeOut = setOptionalFunctionTimeOut(optionalFunctionTimeOut);
  $('#' + id).css('transition', 'all .3s ease-in-out');
  $('#' + id).css('transform', 'scale(0.6,0.6)');

  setTimeout(() => {
    tryOptionalFunction(optionalFunction, optionalFunctionTimeOut);
  }, time);

}

function animFadeOut(id, time, optionalFunction, optionalFunctionTimeOut) {
  optionalFunction = setOptionalFunction(optionalFunction);
  optionalFunctionTimeOut = setOptionalFunctionTimeOut(optionalFunctionTimeOut);

  $('#' + id).animate({
    opacity: 0
  }, time, function () {
    tryOptionalFunction(optionalFunction, optionalFunctionTimeOut);
  });
}

function animMoveRight(id, time, optionalFunction, optionalFunctionTimeOut) {
  optionalFunction = setOptionalFunction(optionalFunction);
  optionalFunctionTimeOut = setOptionalFunctionTimeOut(optionalFunctionTimeOut);

  $('#' + id).animate({
    marginLeft: 400
  }, time, function () {
    tryOptionalFunction(optionalFunction, optionalFunctionTimeOut);
  });
}

function animShrink(id, time, optionalFunction, optionalFunctionTimeOut) {
  optionalFunction = setOptionalFunction(optionalFunction);
  optionalFunctionTimeOut = setOptionalFunctionTimeOut(optionalFunctionTimeOut);

  $('#' + id).animate({
    height: 0,
    padding: 0,
    margin: 0
  }, time, function () {
    //$('#' + id).remove();
    $('#' + id).parent().remove();
    tryOptionalFunction(optionalFunction, optionalFunctionTimeOut);
  });
}

function setOptionalFunction(optionalFunction) {
  if (typeof optionalFunction === 'undefined') {
    optionalFunction = 'default';
  }
  return optionalFunction;
}

function setOptionalFunctionTimeOut(optionalFunctionTimeOut) {
  if (typeof optionalFunctionTimeOut === 'undefined') {
    optionalFunctionTimeOut = 0;
  }
  return optionalFunctionTimeOut;
}

function tryOptionalFunction(optionalFunction, optionalFunctionTimeOut) {
  setTimeout(() => {
    if (optionalFunction != 'default') {
      optionalFunction();
    }
  }, optionalFunctionTimeOut);
}



function removeDeleteAnim(id, optionalMargin) {
  if (typeof optionalMargin === 'undefined') {
    optionalMargin = 'default';
  }
  $('#' + id).css('transform', 'scale(1,1)');
  $('#' + id).css('transform', 'scale(1,1)');

  if (optionalMargin != 'default') {
    $('#' + id).css('margin-left', '0px');
  }


}

function addDeleteAnim(id, optional, optionalMargin) {
  var ANIM = 'animate__animated animate__heartBeat';
  if (typeof optionalMargin === 'undefined') {
    optionalMargin = 'default';
  }
  if (typeof optional === 'undefined') {
    optional = 'default';   
    $('#' + id).css('transition', 'all .1s ease-in-out');
    $('#' + id).css('transform', 'scale(1.3,1.3)');
  } else {
    $('#' + id).css('transition', 'all .1s ease-in-out');

    $('#' + id).css('transform', 'scale('+optional+','+optional+')');
  }
  if (optionalMargin != 'default') {
    $('#' + id).css('margin-left', optionalMargin + 'px');
  }
}