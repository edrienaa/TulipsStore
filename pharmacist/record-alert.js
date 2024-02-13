/**
 * Sweet Alerts
 */

'use strict';

(function () {
  const basicAlert = document.querySelector('#basic-alert'),
    withTitle = document.querySelector('#with-title'),
    footerAlert = document.querySelector('#footer-alert'),
    htmlAlert = document.querySelector('#html-alert'),
    positionTopStart = document.querySelector('#position-top-start'),
    positionTopEnd = document.querySelector('#position-top-end'),
    positionBottomStart = document.querySelector('#position-bottom-start'),
    positionBottomEnd = document.querySelector('#position-bottom-end'),
    bounceInAnimation = document.querySelector('#bounce-in-animation'),
    fadeInAnimation = document.querySelector('#fade-in-animation'),
    flipXAnimation = document.querySelector('#flip-x-animation'),
    tadaAnimation = document.querySelector('#tada-animation'),
    shakeAnimation = document.querySelector('#shake-animation'),
    iconSuccess = document.querySelector('#type-success'),
    iconInfo = document.querySelector('#type-info'),
    iconWarning = document.querySelector('#type-warning'),
    iconError = document.querySelector('#type-error'),
    iconQuestion = document.querySelector('#type-question'),
    customImage = document.querySelector('#custom-image'),
    autoClose = document.querySelector('#auto-close'),
    outsideClick = document.querySelector('#outside-click'),
    progressSteps = document.querySelector('#progress-steps'),
    ajaxRequest = document.querySelector('#ajax-request'),
    confirmText = document.querySelector('#confirm-text'),
    confirmColor = document.querySelector('#confirm-color');

    // Success Alert
  if (iconSuccess) {
    iconSuccess.onclick = function () {
      Swal.fire({
        title: 'Good job!',
        text: 'New record has been added !',
        icon: 'success',
        customClass: {
          confirmButton: 'btn btn-primary waves-effect waves-light'
        },
        buttonsStyling: false
      });
    };
  }
})();