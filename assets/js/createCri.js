$(function () {
    
    // =================================================================================================================
    // =========== Initialization ==========
    let dateInterCounter = 0;
    let pieceCounter = 1;
    
    let dateInterRow    = $("#spanDateInter > *");
    let dateInterRemove = $("#dateInterRemove");
    let dateInterAdd    = $("#dateInterAdd");
    let lastDateInter   = $(".dateInterRow:last");
    let datepicker      = $(".datepicker");
    
    let rowDisplayPiece   = $("#rowDisplayPiece");
    let pieceAChanger     = $("#pieceAChanger");
    let addPiece          = $("#addPiece");
    let removePiece       = $("#removePiece");
    let clonePiece        = $("#clonePiece > *");
    let insertClonedPiece = $("#insertClonedPiece");
    let inputPiece        = $(".inputPiece");
    
    dateInterRemove.hide();
    rowDisplayPiece.hide();
    removePiece.hide();
    addPiece.hide();
    
    // =================================================================================================================
    // ========== Dates d'interventions ==========
    
    //Clone field dateInter and add it to dateInterFields <div>
    dateInterAdd.on("click", function (e) {
    
        e.preventDefault();
        if(dateInterCounter < 9)
        {
            $("#dateInterRemove").show('fade');
            dateInterRow.clone().removeAttr("id").hide().insertAfter(dateInterRow).fadeIn(1000);
            dateInterCounter++;
    
            datepicker = $(".datepicker");
            datepicker.pickadate( {
        
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Date du jour',
                clear: 'Réinitialiser',
                close: 'Ok',
                closeOnSelect: false, // Close upon selecting a date,
                container: undefined, // ex. 'body' will append picker to body
                format: 'dd/mm/yyyy'
            });
        }
        
        if(dateInterCounter >= 9)
            dateInterAdd.addClass("disabled");
    });
    
    //Remove the last dateInter field
    dateInterRemove.on("click", function (e) {
    
        e.preventDefault();
        if(dateInterCounter > 0)
        {
            lastDateInter = $(".dateInterRow:last");
            lastDateInter.remove();
    
            if(dateInterCounter >= 9)
                dateInterAdd.removeClass("disabled");
            
            dateInterCounter--;
        }
        
        if(dateInterCounter === 0)
            dateInterRemove.hide("fade");
    });

    // =================================================================================================================
    //========== Pièces à changer ==========
    
    pieceAChanger.on("change", function() {
    
        if($(this).is(":checked"))
        {
            rowDisplayPiece.show("fade");
            addPiece.show("fade");
            inputPiece.prop('required',true);
        }
        else
        {
            rowDisplayPiece.hide("fade");
            addPiece.hide("fade");
            inputPiece.prop('required',false);
        }
    });
    
    addPiece.on("click", function(e) {
       
        e.preventDefault();
        removePiece.show("fade");
        clonePiece.clone().hide().appendTo(insertClonedPiece).fadeIn("1000");
        let inputPiece = $(".inputPiece");
        
        $(".pieceH5:last").text("Pièce " + (pieceCounter + 1));
        
        inputPiece.eq(inputPiece.length - 1).removeAttr("name").attr("name", "piece[" + pieceCounter + "][qtePiece]");
        inputPiece.eq(inputPiece.length - 2).removeAttr("name").attr("name", "piece[" + pieceCounter + "][detailPiece]");
        inputPiece.eq(inputPiece.length - 3).removeAttr("name").attr("name", "piece[" + pieceCounter + "][refPiece]");
        
        pieceCounter++;
        
        if(pieceCounter >= 10)
            addPiece.addClass("disabled");
    });
    
    removePiece.on("click", function(e) {
    
        e.preventDefault();
        if(pieceCounter > 1)
        {
            $(".borderPiece:last").hide("fade").remove();
    
            if(pieceCounter >= 10)
                addPiece.removeClass("disabled");
            
            pieceCounter--;
        }
        
        if(pieceCounter < 2)
            removePiece.hide("fade");
    });
    
    // =================================================================================================================
    // Submit
    
    $("#formCri").on("submit", function () {
    
        if($("#pieceAChanger").is(":checked"))
        {}
        else
            $("#rowDisplayPiece > *").remove();
        
    });
    
    // =================================================================================================================
    //Materialize
    
    $('select').material_select();
    
    datepicker.pickadate( {
        
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Date du jour',
        clear: 'Réinitialiser',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        container: undefined, // ex. 'body' will append picker to body
        format: 'dd/mm/yyyy'
    });
    
});