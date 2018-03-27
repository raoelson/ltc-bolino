/*$( function() {
    $( ".single_calb" ).datepicker({ changeMonth: true, changeYear: true, minDate: 1, maxDate: new Date(3020, 1 - 1, 1) });
} );*/
/*ajout type assurance */
$('document').ready(function(){
    $(".single_cal").daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_4",
        startDate: -1,
     //  maxDate: testDate() ,
       // singleDatePicker: true,
        //showDropdowns: true,
        locale: {
            format: 'YYYY/MM/DD'

        }
    }, function(start, end, label) {
        //console.log(start.toISOString(), end.toISOString(), label);
    })


    $(".single_calb").daterangepicker({
        singleDatePicker: true,
        singleClasses: "picker_4",
        //maxDate: testDate() ,

        locale: {
            format: 'YYYY/MM/DD'
        }
    }, function(start, end, label) {
        //console.log(start.toISOString(), end.toISOString(), label);
    })


    //ajout type assurance
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
            data += '<input   required="required"  class="single_cal form-control col-md-7 col-xs-12" name="date_debs' + (x) + '"  type="text">';
            data += '</div>';
            data += '</div>';

            data += '<div class="item form-group">';
            data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date fin assurance<span class="required" id="addclass">*</span></label>';
            data += '<div class="col-md-6 col-sm-6 col-xs-12">';
            data += '<input required="required"  class="single_cal5 form-control col-md-7 col-xs-12" name="date_fins' + (x) + '"  type="text">';
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

            $(".single_cal").daterangepicker({
                singleDatePicker: true,
                singleClasses: "picker_4",
                startDate: testDate(),
                maxDate: testDate() ,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            }, function(start, end, label) {
                //console.log(start.toISOString(), end.toISOString(), label);
            })

            $(".single_cal5").daterangepicker({
                singleDatePicker: true,
                singleClasses: "picker_4",
                locale: {
                    format: 'DD/MM/YYYY'
                }
            }, function(start, end, label) {
                //console.log(start.toISOString(), end.toISOString(), label);
            })

            /*$( function() {
                $( ".single_cal" ).datepicker({ changeMonth: true, changeYear: true, minDate: 1, maxDate: new Date(2020, 1 - 1, 1) });
            } );*/

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
        tbody+="<option value='"+elt.id+"'>"+elt.nom_region_fr+"</option>"
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
        tbody+="<option value='"+elt.id+"'>"+elt.nom_ville_fr+"</option>"
    });
    $('#ville').append(tbody);
}




/****************categorie******************/
$('document').ready(function(){
    pChargementSelectaa();
    $(".ajout_categorie").click(function(){
        $.postJSON(BASE_URL+'/typeartisan/saves_categorie/',{
            'name_cat' : $("#namecategorie").val()
        },saveCallbacka);

    });
});


pChargementSelectaa = function(){
    $.getJSON(BASE_URL+'/typeartisan/inde/',
        {},
        SelectoCallback

    )};

SelectoCallback = function(json){
    $(".typecategorie").html("");
    var body = "";
    $.each(json.data,function(i,elt){
        body+="<option value='"+elt.name_cat+"'>"+elt.name_cat+"</option>";
    });
    $(".typecategorie").append(body);

};
saveCallbacka = function(json){
    if(json != 0){
        pChargementSelectaa();
        $('#modal_artisan').modal('toggle');
    }
}


