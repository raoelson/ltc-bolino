
$('document').ready(function(){

    if($('#pays').val() != ""){
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": $('#pays').val()
        },ChargementCallback);
    }
    $('#pays').change(function(){
        var id = $(this).val();
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": id
        },ChargementCallback);
    });
})

ChargementCallback = function(json) {

    var tbody = "";
    $.each(json['data'], function (i, elt) {
        var active = "";
        if (elt.nom_region_fr == dataVille) {
            active = "selected=''true";
        }
        tbody += "<option value='" + elt.nom_region_fr + "' " + active + " >" + elt.nom_region_fr + "</option>"
    });
    $('#ville').append(tbody);
}

/**********************************/
$('document').ready(function(){
    /*$("#e1").select2();*/
    ChargementSelect();

    $(".ajout_type").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves/',{
            'name' : $("#nameType").val()
        },saveCallback);

    });

});

ChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/index/',
        {},
        SelectCallback
    )};

SelectCallback = function(json){
    $("#typeartisan").html("");
    $("#typeartisan_edit").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name+"'>"+elt.name+"</option>";
    });
    $("#typeartisan").append(body);
    $("#typeartisan_edit").append(body);
};
saveCallback = function(json){
    if(json != 0){
        ChargementSelect();
        $('#delete').modal('toggle');
    }
}
/****************categorie******************/
$('document').ready(function(){
    pChargementSelect();
    $(".ajout_categorie").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_categorie/',{
            'name_cat' : $("#namecategorie").val()
        },saveCallbacka);

    });
});
pChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/inde/',
        {},
        SelectoCallback

    )};

SelectoCallback = function(json){
    $("#typecategorie").html("");
    // $("#typecategorie_edit").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_cat+"'>"+elt.name_cat+"</option>";
    });
    $("#typecategorie").append(body);

};
saveCallbacka = function(json){
    if(json != 0){
        pChargementSelect();
        $('#modal_artisan').modal('toggle');
    }
}
/****************type assurance******************/
$('document').ready(function(){
    assChargementSelect();

    $(".ajout_assurance").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_assurance/',{
            'name_assur' : $("#nameassurance").val()
        },saveCallbackassur);

    });
});
assChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home/',
        {},
        SelectCallbackass
    )};

SelectCallbackass = function(json){
    $(".dassurance").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_assur+"'>"+elt.name_assur+"</option>";
    });
    $(".assurance").append(body);
};

saveCallbackassur = function(json){
    if(json != 0){
        assChargementSelect();
        $('#modal_assurance').modal('toggle');
    }
}
/****************type travaux******************/
$('document').ready(function(){
    travauxChargementSelect();
    $("#travaux").select2();
    $(".ajout_travaux").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_travaux/',{
            'name_travaux' : $("#nametravaux").val()
        },saveCallbacktravaux);
    });
    //pays et ville
    if($('#pays').val() != ""){
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": $('#pays').val()
        },ChargementCallback);
    }
    $('#pays').change(function(){
        var id = $(this).val();
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": id
        },ChargementCallback);
    });

});

travauxChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home_travaux/',
        {},
        travauxSelectCallbackass
    )};

travauxSelectCallbackass = function(json){
    $(".travaux").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_travaux+"'>"+elt.name_travaux+"</option>";
    });
    $(".travaux").append(body);
};
saveCallbacktravaux = function(json){
    if(json != 0){
        travauxChargementSelect();
        $('#modal_travaux').modal('toggle');
    }
}