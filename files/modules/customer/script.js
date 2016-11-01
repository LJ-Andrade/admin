$('.Info-Card-Form-Btn').click(function(){
    if ($('.Info-Card-Form').hasClass('Hidden')) {
      $('.Info-Card-Form').removeClass('Hidden');
      $('.MainDoneBtn').addClass('disabled-btn');
      $('.MainDoneBtn').attr('disabled', 'disabled');
    } else {
      $('.Info-Card-Form').addClass('Hidden');
      $('.MainDoneBtn').removeClass('disabled-btn');
      $('.MainDoneBtn').prop("disabled", false);
    }
});

$('.Info-Card-Form-Done').click(function(){
  $('.Info-Card-Form').addClass('Hidden');
  $('.MainDoneBtn').removeClass('disabled-btn');
  $('.MainDoneBtn').prop("disabled", false);
  // Demo Stuff
  $('.Demo-Card').removeClass('Hidden');
  $('.Info-Card-Empty').addClass('Hidden');
});
