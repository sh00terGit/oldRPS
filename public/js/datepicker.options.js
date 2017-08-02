/* 
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */
$(document).ready(function () {
   $.datepicker.setDefaults({
        showOtherMonths: true,
        selectOtherMonths: true,
        dayNamesMin: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'],
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 
            'Июль', 'Август', 'Сентябрьr', 'Октябрь', 'Ноябрь', 'Декабрь'],
        dateFormat: "yy-mm-dd"

});  
  $("#submitButton").prop('disabled', true);   // submit недоступен
  $("#photo").prop('disabled', true);
  
  
    $("#date").datepicker();
    
    //изначально выбрана дата    
    
    if ($("#date").datepicker('getDate') != null ) {        
//        $('input[type="submit"]').prop('disabled', false);
        $("#submitButton").prop('disabled', false);
        $("#photo").prop('disabled', false);
    }
    
    // После изменения даты сабмит доступен , пошло сохранение даты 
    $('#date').change(function() {
//        $('input[type="submit"]').prop('disabled', false);
        $("#submitButton").prop('disabled', false);
       $("#photo").prop('disabled', false);
    });


});
