
/*ajout type assurance */
$('document').ready(function(){
    var max_fields = 10; // maximum input boxes allowed
    var wrapper = $("#typeassurancediv").find('#assurancediv'); // Fields wrapper
    var x = 1;
    $('#AfficheAssurance').click(function(e){


        e.preventDefault();
        $('#typeassurancediv').show();
        var data = "";
        var assurance= $('#assurance').val();
        if(x < max_fields) { //max input box allowed
            tailleTable = x++;
            //var ass=assurance+x;
            //console.log(ass);
            //type travaux
            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type Travaux<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<select  name="name_travaux' + (x) + '" class="travaux form-control col-md-7 col-xs-12"  placeholder="Type assurance..." type="text" >';
            data += '</select>';
            data += '</div>';
            data += '<div class="col-md-3 col-sm-3 col-xs-12">';
            data += '<button  data-title="Delete" data-toggle="modal" data-target="#modal_travaux" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>';
            data += '</div>';
            data += '</div>';




            //type assurance
            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<select   name="noms' + (x) + '" class="assurance form-control col-md-7 col-xs-12"  placeholder="Type assurance..." type="text" >';
            data += '</select>';
            data += '</div>';
            data += '<div class="col-md-3 col-sm-3 col-xs-12">';
            data += '<button  data-title="Delete" data-toggle="modal" data-target="#modal_assurance" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>';
            data += '</div>';
            data += '</div>';


            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date début assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input   required="required"  class="form-control col-md-7 col-xs-12" name="date_debs' + (x) + '"  type="date">';
            data += '</div>';
            data += '</div>';

            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date fin assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input  required="required"  class="form-control col-md-7 col-xs-12" name="date_fins' + (x) + '"  type="date">';
            data += '</div>';
            data += '</div>';

            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Assureur<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input id="assureur"  required="required"  class="form-control col-md-7 col-xs-12" placeholder="Assureur..." name="assureurs' + (x) + '"  type="texte">';
            data += '</div>';
            data += '</div>';

            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Téléphone Assureur<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input id="telephone"  required="required"  class="form-control col-md-7 col-xs-12" placeholder="Téléphone..." name="telephones' + (x) + '"  type="texte">';
            data += '</div>';
            data += '</div>';
            data += '<div class="item form-group">';
            data += '<br/>';
            data += '<div class="clearfix">';
            data += '</div>';
            data += '<br/>';
            data += '<br/>';
            data += '</div>';

            $(wrapper).append(data);
            assChargementSelect();
            travauxChargementSelect();

        }
        $('input[name="nombree"]').val(tailleTable);

        /* $("#assurance").change(function(){

         });*/
    });

    //type artisan
    ChargementSelect();
    $(".ajout_type").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves/',{
            'name' : $("#nameType").val()
        },saveCallback);

    });

    //type categorie
    pChargementSelect();
    $(".ajout_categorie").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_categorie/',{
            'name_cat' : $("#namecategorie").val()
        },saveCallbacka);

    });

    //type assurance
    $(".ajout_assurance").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_assurance/',{
            'name_assur' : $("#nameassurance").val()
        },saveCallbackassur);
    });

    //type travaux
    //$("#travaux").select2();
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

/****************type artisan******************/
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

pChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/inde/',
        {},
        SelectoCallback
    )};

SelectoCallback = function(json){
     $("#typecategorie").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_cat+"'>"+elt.name_cat+"</option>";
    });
    $("#typecategorie").append(body);
    //consol.log($('#typecategorie').val())

};
saveCallbacka = function(json){
    if(json != 0){
        pChargementSelect();
        $('#modal_artisan').modal('toggle');
    }
}
/****************type assurance******************/
assChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home/',
        {},
        SelectCallbackass
    )};

SelectCallbackass = function(json){
    //var assurance= $('#assurance').val();
    //$("#assurance").html("");
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
travauxChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home_travaux/',
        {},
        travauxSelectCallbackass
    )};

travauxSelectCallbackass = function(json){
    //$("#travaux").html("");
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

/****************pays et ville******************/

ChargementCallback = function(json){

    var tbody ="";
    $.each(json['data'],function(i,elt){
        tbody+="<option value='"+elt.nom_region_fr+"'>"+elt.nom_region_fr+"</option>"
    });
    $('#ville').append(tbody);
}



