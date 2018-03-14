$('document').ready(function(){
    /*$("#e1").select2();*/
    ChargementSelect();

    $(".ajout_type").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves/',{
            'name' : $("#nameType").val()
        },saveCallback);

    });
   /* $("#btn-create").click(function(){
        $.postJSON(BASE_URL+'/artisan/create_artisan',{
            'nom' : $('#assurance').val()
        /*'date_deb': $('#date_deb').val()
        'date_fin': $('#date_fin').val()
        'scan_assurance' : $('#scan_assurance').val()
        'assureur' : $('#assureur').val()*
        },function(json){
            console.log(json);
        });
    });*/

});

ChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/index/',
        {},
        SelectCallback
)};

SelectCallback = function(json){
    $("#typeartisan").html("");
   var body = "";
   $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name+"'>"+elt.name+"</option>";
   });
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
    $("#typecategorie").html("");
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
    $("#assurance").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_assur+"'>"+elt.name_assur+"</option>";
    });
    $("#assurance").append(body);
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

});
travauxChargementSelect = function(){
    $.getJSON(BASE_URL+'/typeartisan/home_travaux/',
        {},
        travauxSelectCallbackass
    )};

travauxSelectCallbackass = function(json){
    $("#travaux").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_travaux+"'>"+elt.name_travaux+"</option>";
    });
    $("#travaux").append(body);
};
saveCallbacktravaux = function(json){
    if(json != 0){
        travauxChargementSelect();
        $('#modal_travaux').modal('toggle');
    }
}


/*ajout type assurance */
$('document').ready(function(){
    var max_fields = 10; // maximum input boxes allowed
    var wrapper = $("#typeassurancediv").find('#assurancediv'); // Fields wrapper
    var x = 1;
    $('#AfficheAssurance').click(function(e){
        e.preventDefault();
        $('#typeassurancediv').show();
        var data = "";
        if(x < max_fields) { //max input box allowed
            tailleTable = x++;
            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Type assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<select  id="assurance"  class="form-control col-md-7 col-xs-12" name="noms' + (x) + '" placeholder="Type assurance..." type="text">';
            data += '<option value="rcp">Assurance RCP(Responsabilité Civile Professionnelle)</option>';
            data += '<option value="decenale">Assurance Décennale</option>';
            data += '<option value="Tous">Tous</option>';
            data += '</select>';
            data += '</div>';
            data += '</div>';


            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date début assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input id="date_deb"  required="required"  class="form-control col-md-7 col-xs-12" name="date_debs' + (x) + '"  type="date">';
            data += '</div>';
            data += '</div>';

            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date fin assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input id="date_fin"  required="required"  class="form-control col-md-7 col-xs-12" name="date_fins' + (x) + '"  type="date">';
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

        }
        $('input[name="nombre"]').val(tailleTable);
        });

    });

