$(function () {

    //When a date is selected
    $("#dateInter").one("change", function() {

        $("#dateInter").clone().append($("#multiDate")); //Clone dateInter and insert it at the end of the multiDate <span>
    });

    //When the last date cloned is selected
    $("#multiDate > input:last").on("change", function(){

        $("#dateInter").clone().append($("#multiDate"));
    });

});
