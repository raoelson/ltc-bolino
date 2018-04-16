
$('document').ready(function(){


    //pays
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

    //addclass
    $(".single_cal").daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_4",
        locale: {
            format: 'YYYY/MM/DD'

        }
    }, function(start, end, label) {
        //console.log(start.toISOString(), end.toISOString(), label);
    })
    //type artisan
    ChargementSelect();

    $(".ajout_type").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves/',{
            'name' : $("#nameType").val()
        },saveCallback);

    });

})

ChargementCallback = function(json){
    //console.log(dataRegion);
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

/***************type artisan*******************/
ChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/index/',
        {

        },
        SelectCallback
    )};
SelectCallback = function(json){
    $("#typeartisan").html("");

    var body = "";
    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.name == datatype){
            active = "selected=''true";
        }
        body+="<option value='"+elt.name+"' "+active+">"+elt.name+"</option>"
    });
    /*$.each(json.data,function(i,elt){
        var active = "";
        body+="<option value='"+elt.name+"'>"+elt.name+"</option>";
        /* if(i==1){

            body+="<option value='"+elt.name+"' disabled selected value>"+elt.name+"</option>";
        }
        else{

            body+="<option value='"+elt.name+"'>"+elt.name+"</option>";
        }
        * */
    /*});*/
    $("#typeartisan").append(body);
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
    //$("#typecategorie").html("");
    // $("#typecategorie_edit").html("");
    var body = "";
    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.name_cat == data_categorie){
            active = "selected=''true";
        }
        body+="<option value='"+elt.name_cat+"' "+active+">"+elt.name_cat+"</option>"
    });
   /*$.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_cat+"'>"+elt.name_cat+"</option>";
    });*/
    $(".typecategorie").append(body);

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
    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.name_assur == datatype_assurance){
            active = "selected=''true";
        }
        body+="<option value='"+elt.name_assur+"' "+active+">"+elt.name_assur+"</option>"
    });
   /* var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_assur+"'>"+elt.name_assur+"</option>";
    });*/
    $(".assurance").append(body);
};

saveCallbackassur = function(json){
    if(json != 0){
        assChargementSelect();
        $('#modal_assurance').modal('toggle');
    }
}
/****************type travaux******************
travauxChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home_travaux/',
        {},
        travauxSelectCallbackass
    )};

travauxSelectCallbackass = function(json){
    var body = "";
    console.log(datatype_travaux);
    $.each(json['data'],function(i,elt){
        var active = "";
        if(elt.name_travaux == datatype_travaux){
            active = "selected=''true";
        }
        body+="<option value='"+elt.name_travaux+"' "+active+">"+elt.name_travaux+"</option>"
    });
    $(".travaux").append(body);
};
saveCallbacktravaux = function(json){
    if(json != 0){
        travauxChargementSelect();
        $('#modal_travaux').modal('toggle');
    }
}*/