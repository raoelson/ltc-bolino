$(document).ready(function() {

    //ANIMATION DU FORMULAIRE LORSQU'ON CLIQUE SUR LE BOUTON NOUVEAU
    $('#ajout').hide();
    $("#nouveau").click(function () {
        $('#ajout').toggle(1000);
        $('html,body').animate({scrollTop: $("#ajout").offset().top}, 'slow');
    });

    $('input.flat').iCheck({
        checkboxClass : 'icheckbox_flat-green',
        radioClass : 'iradio_flat-green'
    });

    //ANIMATION DANS LE BLOC INFO SUR LA DEMANDE DE DEVIS
    $("ins.iCheck-helper").click(function() {
        //SI CHECKBOX  ---DETAIL DEVIS PROPRIETAIRE--
        /*var etatCheck = $(this).prev('input[name="detail_devis"]').is(':checked');
        console.log('ok')
        if(etatCheck == true){
            $('#file').removeAttr("disabled" );
        }else{

            $('#file').attr('disabled', 'disabled');
            }*/

        //SI RADIO --DETAIL DEVIS PROPRIETAIRE--
        var x = 1;
        var max = 10;

        if(x < max){
            tailleTable = x++;
        }
        var etatCheck = $(this).prev('input[name = "detail_devis"]').val();
        if(etatCheck == "oui"){
            $('#file').removeAttr("disabled");
        }else if(etatCheck == "non"){
            $('#file').attr('disabled', 'disabled');
        }

        //SI RADIO --DETAIL DEVIS ARTISAN--
        var etatCheck = $(this).prev('input[name = "detail_devis_art"]').val();
        if(etatCheck == "oui"){
            $('#file_art').removeAttr("disabled");
        }else if(etatCheck == "non"){
            $('#file_art').attr('disabled', 'disabled');
        }


        //HIDE-SHOW SI OUI ou NON ARTISAN (RADIO)
        var etatCheck1 = $(this).prev('input[name="art"]').val();
        if(etatCheck1 == 1){
            $('#div_oui_artisan').show(1000);
            $('#div_non_artisan').hide(1000);
            $('#montant_devis_art').val("");

        }else if(etatCheck1 == 0){
            //$('#div_nom_artisan').removeAttr("style");
            $('#div_oui_artisan').hide(1000);
            $('#div_non_artisan').toggle(1000);
            $('#div_non_artisan').removeAttr("style");
            $('#montant_devis').val("");

        }

    });

        var tailleTable = 0;
        var max_fields = 10; // maximum input boxes allowed
        var wrapper = $("#div_devis"); // Fields wrapper
        var x = 1;        
        $('#AfficheArti').click(function(e){
            e.preventDefault();
            $('#div_devis').show();
            var data = "";
            if(x < max_fields) { //max input box allowed
                tailleTable = x++;
                data += '<div class="ln_solid"></div> '
                data += '<div class="item form-group">';
                data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom de l\'artisan </label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
               // data += '<input class="form-control col-md-7 col-xs-12" id="nomArt'+(x)+'" class="flat" name="nomArt'+(x)+'" type="text">';
                data += '<select id="nomArt'+(x)+'" name="nomArt'+(x)+'" class="form-control">';
                 $.each(data2__, function( index, value ) {
                  data += '<option value="">'+value+'</option>';
                });
                data += '</select>'
                data += '</div>';
                data += '</div>';
                data += '<div class="item form-group">';
                data += '<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="name">Type de l\'artisan</label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
                data += '<select id="nameArt'+(x)+'" name="nameArt'+(x)+'" class="form-control">';
                $.each(data__, function( index, value ) {
                  data += '<option value="">'+value+'</option>';
                });
                data += '</select>';
                data += '</div>';
                data += '</div>';
                data += ' <div class="item form-group">';
                data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Montant du devis <span class="required">*</span>';
                data += '</label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
                data += '<input id="montantDevis'+(x)+'" class="form-control col-md-7 col-xs-12" name="montantDevis'+(x)+'" placeholder="" required="required" type="text">';
                data += '</div>';
                data += '</div>';
                data += '<div class="item form-group">';
                data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" >Statut du devis</label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
                data += '<select id="statutDevis'+(x)+'" name="statutDevis'+(x)+'" class="form-control">';
                data += '<option value="Encours">En cours</option>';
                data += '<option value="Validé">Validé</option>';
                data += '<option value="Refusé">Refusé</option>';
                data += '</select>';
                data += '</div>';
                data += '</div>';
                data += '<div class="item form-group">';
                data += ' <label class="control-label col-md-3 col-sm-3 col-xs-12">Détail du devis';
                data += '</label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
                data += ' <p style="margin-top: 9px !important">';
                data += '<label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis_art'+(x)+'" id="oui" value="oui" >';
                data += '<label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis_art'+(x)+'" id="non" value="non" checked="">';
                data += '</p>';
                data += '</div>';
                data += '</div>';
                data += '<div class="item form-group">';
                data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Devis de l\'artisan';
                data += '</label>';
                data += '<div class="col-md-6 col-sm-6 col-xs-12">';
                data += '<div class="btn_activ btn btn-info">';
                data += '<input id="file_art'+(x)+'" name="fileTest'+(x)+'" type="file" multiple disabled="">';
                data += '</div>';
                data += '</div>';
                data += '</div>';
                data += '<input type="hidden" name="montantTotalDevis'+(x)+'">';
                $(wrapper).append(data);

                $('input[name^="montantDevis'+(x)+'"]').keyup(function(e) {
                    e.preventDefault();
                    var sommeDevis = 0;

                    $('input[name^="montantDevis'+(x)+'"]').each(function() {
                        if($(this).val() == "")
                            return;
                        sommeDevis += parseFloat(($(this).val()));
                    });

                    $('input[name="montantTotalDevis'+(x)+'"]').val(sommeDevis);
                       SommeDevisFunct();
                    }); 

            }

        });
     
           
        $('input[name^="montantDevisPrincipal"]').keyup(function() {
            var sommeDevisPrincipal = 0;
            $('input[name^="montantDevisPrincipal"]').each(function() {
                if($(this).val() == "")
                    return;
                sommeDevisPrincipal += parseFloat(($(this).val()));
            });
            $('input[name="montantTotalDevisPrincipal"]').val(sommeDevisPrincipal);
             SommeDevisFunct();
        });

        SommeDevisFunct = function(){
            var SommeTableDevis = 0;
            for(i=1;i<=tailleTable;i++){
                SommeTableDevis += (parseFloat( $('input[name="montantTotalDevis'+(i+1)+'"]').val()));
            }
            var sommeGeneral = SommeTableDevis+parseFloat($('input[name="montantTotalDevisPrincipal"]').val());
            $('#totalDevis').text(sommeGeneral + " € ");
            $('#valeurDevis').val(sommeGeneral); 

            if(sommeGeneral > 10700){
                $('#totalDevis').text(sommeGeneral + " € ").css('color', 'red');
                alert('LE MONTANT TOTAL DES DEVIS: '+sommeGeneral+'€ EST AU DESSUS DE LA LIMITE QUI EST A 10700€');
                
            }
            else{
                $('#totalDevis').text(sommeGeneral + " € ").css('color', 'grey');

            }
        }
      

  /* $('#statut').change(function(){
        var stat = $('#statut :selected').val();

        if(stat == "Validée"){
            $('#num_dossier_valide').removeAttr("disabled");
            $('#num_dossier_valide').prop('required', 'true');

            
        }
        else if(stat == "Refusée"){
            $('#num_dossier_valide').attr('disabled', 'disabled');
            $('#num_dossier_valide').removeAttr('required');
            $('#num_dossier_valide').val(0);

        }
    });*/
    
   // $( "#date_arrivee" ).datepicker({ changeMonth: true, changeYear: true, minDate: new Date(2010, 1 - 1, 1), maxDate: 0 });
   

});
  