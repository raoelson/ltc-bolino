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



});
