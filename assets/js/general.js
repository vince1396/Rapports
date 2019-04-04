$(function () {
    
    
    let datepicker = $(".datepicker");
    
    datepicker.pickadate({
        
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: "Date du jour",
        clear: "Réinitialiser",
        close: "Ok",
        closeOnSelect: false, // Close upon selecting a date,
        container: undefined, // ex. 'body' will append picker to body
        format: "yyyy-mm-dd"
    });
    
    $('ul.tabs').tabs();
    
});