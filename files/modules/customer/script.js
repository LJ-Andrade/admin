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

// Date Picker (Date and Time)
$(function () {
  $('#date-picker').daterangepicker({
    timePicker: true, 
    timePickerIncrement: 30,
    timePicker24Hour: true,
    showDropdowns: true,
    startDate: "04/11/2016",
    endDate: "11/11/2016",
    locale: {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aceptar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "A",
        "customRangeLabel": "Custom",
        "weekLabel": "S",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
    minDate: "DD/MM/YYY",
    maxDate: "DD/MM/YYY"
} 
// function(start, end, label) {
//   console.log("Nueva Fecha seleccionada: ' + start.format('DD/MM/YYYY') + ' to ' + end.format('DD/MM/YYYY') + ' (predefined range: ' + label + ')");
    
    
//   }
  );
});
