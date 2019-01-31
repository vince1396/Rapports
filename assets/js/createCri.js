$(function () {
    
    // =================================================================================================================
    // =========== Dates d'interventions (global) ==========
    let dateInterCounter = 0;
    
    let dateInterRemove = $("#dateInterRemove");
    let dateInterAdd = $("#dateInterAdd");
    let dateInter = $("#dateInter");
    let dateInterFields = $("#dateInterFields");
    let lastDateInter = $(".dateInter:last");
    
    dateInterRemove.hide();
    
    // =================================================================================================================
    // ========== Intervenants (global) ===========
    
    let techSelect = $("#tech");
    
    // =================================================================================================================
    // ========== Dates d'interventions ==========
    
    //Clone field dateInter and add it to dateInterFields <div>
    dateInterAdd.on("click", function (e) {
    
        e.preventDefault();
        if(dateInterCounter < 9)
        {
            $("#dateInterRemove").show('fade');
            dateInter.clone().removeAttr("id").appendTo(dateInterFields);
            dateInterCounter++;
        }
    });
    
    //Remove the last dateInter field
    dateInterRemove.on("click", function(e) {
    
        e.preventDefault();
        if(dateInterCounter > 0)
        {
            lastDateInter = $(".dateInter:last");
            lastDateInter.remove();
            dateInterCounter--;
            
        }
        if(dateInterCounter == 0)
            dateInterRemove.hide("fade");
    });
    
    // =================================================================================================================
    // ========== Intervenants ===========
    
    
    
});