/**
 * Created by abdelhak on 24/09/2017.
 */

$(document).ready(function(){

    function getModels(brand) {
        $.RC2018.json.get(Routing.generate('car_list_models',{'brand_id':brand}),{},function(json){
           console.log(json);
        });
    }

    $("#brand").trigger('change');

    $("#brand").on('change',function(){
        getModels($(this).val());
    });

});
