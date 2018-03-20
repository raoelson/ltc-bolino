
$('document').ready(function(){

    if($('#pays').val() != ""){
        $('#region').html("");
        $.postJSON(BASE_URL + "regions/getWhere/",{
            "id": $('#pays').val()
        },ChargementCallback);
    }
    $('#pays').change(function(){
        $('#ville').html("");
        var id = $(this).val();
        $('#region').html("");
        $.postJSON(BASE_URL + "regions/getWhere/",{
            "id": id
        },ChargementCallback);
    });
    $('#region').change(function(){
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": $('#region').val()
        },ChargementVilleCallback);
    })
})

ChargementCallback = function(json){
    console.log(dataRegion);
    var tbody ="";
    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.id == dataRegion){
            active = "selected=''true";
        }
        tbody+="<option value='"+elt.id+"' "+active+" >"+elt.nom_region_fr+"</option>"
    });
    $('#region').append(tbody);
    if($('#region').val() != ""){
        $('#ville').html("");
        $.postJSON(BASE_URL + "villes/getWhere/",{
            "id": $('#region').val()
        },ChargementVilleCallback);
    }
}
ChargementVilleCallback = function(json){
    var tbody ="";


    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.id == dataVille){
            active = "selected=''true";
        }
        tbody+="<option value='"+elt.id+"' "+active+">"+elt.nom_ville_fr+"</option>"
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
    $(".assurance").html("");
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