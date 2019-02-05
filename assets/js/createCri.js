$(function () {
    
    // =================================================================================================================
    // =========== Dates d'interventions (global) ==========
    let dateInterCounter = 0;
    
    let dateInterRow    = $("#spanDateInter > *");
    let dateInterRemove = $("#dateInterRemove");
    let dateInterAdd    = $("#dateInterAdd");
    let lastDateInter   = $(".dateInterRow:last");
    let datepicker      = $(".datepicker");
    
    dateInterRemove.hide();
    
    // =================================================================================================================
    // ========== Dates d'interventions ==========
    
    //Clone field dateInter and add it to dateInterFields <div>
    dateInterAdd.on("click", function (e) {
    
        e.preventDefault();
        if(dateInterCounter < 9)
        {
            $("#dateInterRemove").show('fade');
            dateInterRow.clone().removeAttr("id").insertAfter(dateInterRow);
            dateInterCounter++;
        }
    });
    
    //Remove the last dateInter field
    dateInterRemove.on("click", function (e) {
    
        e.preventDefault();
        if(dateInterCounter > 0)
        {
            lastDateInter = $(".dateInterRow:last");
            lastDateInter.remove();
            dateInterCounter--;
        }
        
        if(dateInterCounter === 0)
            dateInterRemove.hide("fade");
    });
    
    // =================================================================================================================
    // TODO : JQuery Intervenants
    
    
    // =================================================================================================================
    //Materialize
    
    datepicker.pickadate( {
        
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Date du jour',
        clear: 'Réinitialiser',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        container: undefined, // ex. 'body' will append picker to body
    });
    
    $('select').material_select();
    
});