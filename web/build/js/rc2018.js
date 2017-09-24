/**
 * Created by abdelhak on 29/07/2017.
 */

$.RC2018 = {};

$.RC2018.bootstrap = {
    toolTip: function(){
        $('[data-toggle="tooltip"]').tooltip({
            html: true,
            container: 'body'
        });
    }
};

$.RC2018.json = {
    get: function(url,data,callback){
        $.get(
            url,data, function(json){callback(json);},"JSON"
        ).fail(function ($xhr) {swal('Erreur',"Une erreur s'est produite dans l'application !!","error");});
    },
    post: function (url,data,callback) {
        $.post(
            url,data, function(json){callback(json);},"JSON"
        ).fail(function ($xhr) {swal('Erreur',"Une erreur s'est produite dans l'application !!","error");});
    }
};

if($('.date-input').length){
    var old_fn = $.datepicker._updateDatepicker;
    $.datepicker._updateDatepicker = function(inst) {
        old_fn.call(this, inst);

        var buttonPane = $(this).datepicker("widget").find(".ui-datepicker-buttonpane");

        $("<button type='button' class='ui-datepicker-clean ui-state-default ui-priority-primary ui-corner-all'>Effacer</button>").appendTo(buttonPane).click(function(ev) {
            $.datepicker._clearDate(inst.input);
        }) ;
    }
    $.RC2018.dateInput ={
        initialise: function(){
            $('.date-input').datepicker({
                dateFormat: 'dd/mm/yy',
                showButtonPanel: true,
                currentText: "Aujourd'hui",
                closeText: 'Fermer',
                changeMonth: true,
                changeYear: true,
                dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ],
                monthNamesShort : [ "janv", "Févr", "Mars", "Avr", "Mai", "Juil", "Juil", "Aout", "Sept", "Oct", "Nov", "Déc" ],
                monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Setembre", "Octobre", "Novembre", "Décembre" ]
            });
        }
    };
}


$(document).ready(function(){

    $.RC2018.bootstrap.toolTip();
    if($('.date-input').length)
        $.RC2018.dateInput.initialise();

});
