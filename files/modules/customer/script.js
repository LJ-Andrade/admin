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

$(document).ready(function () {

    // Remove Date Column in account.php from 400px  
    if (screen.width < 400) {
        $(".Sheet-Date").addClass('Hidden');
        $(".Sheet-Col").removeClass('col-xs-3');
        $(".Sheet-Col").addClass('col-xs-4');
    }
    else {
        $(".Sheet-Date").removeClass('Hidden');
        $(".Sheet-Col").addClass('col-xs-3');
        $(".Sheet-Col").removeClass('col-xs-4');
    }

});
