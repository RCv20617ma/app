/**
 * Created by abdelhak on 24/09/2017.
 */

$(document).ready(function(){

    var carBrand = $("#car_info").length ? $("#car_info").data('brand') : 0;
    var carModel = $("#car_info").length ? $("#car_info").data('model') : 0;

    function getModels(brand) {
        $.RC2018.json.get(Routing.generate('model_list',{'brand':brand}),{},function(models){
            $("#carbundle_car_model").empty();
            $.each($.parseJSON(models),function(index,item){
                var selected = (item.id === carModel);
                var option = new Option(item.label,item.id,selected,selected);
                $("#carbundle_car_model").append(option);
            });
        });
    }

    $.RC2018.json.get(Routing.generate('brand_list',{}),{},function(brands){
        $("#brand").empty();
        $.each($.parseJSON(brands),function(index,item){
            var selected = (item.id === carBrand);
            var option = new Option(item.label,item.id,selected,selected);
            $("#brand").append(option);
        });
        $("#brand").trigger('change');
    });


    $("#brand").on('change',function(){
        getModels($(this).val());
    });

});
