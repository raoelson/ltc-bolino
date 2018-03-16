$(document).ready(function() {
    $('#ajout').hide();
    $("#nouveau").click(function () {
        $('#ajout').toggle(1000);
        $('html,body').animate({scrollTop: $("#ajout").offset().top}, 'slow');
    });

    $('input.flat').iCheck({
        checkboxClass : 'icheckbox_flat-green',
        radioClass : 'iradio_flat-green'
    });

    $("ins.iCheck-helper").click(function() {
        var etatCheck = $(this).prev('input[name="detail_devis"]').is(':checked');
        if(etatCheck == true){
            $('#file').removeAttr("disabled" );
        }else{
               
            $('#file').attr('disabled', 'disabled');
            }              
    });

    $("ins.iCheck-helper").click(function() {
        var etatCheck1 = $(this).prev(
        'input[name="art"]:checked').val();


        if(etatCheck1 == 0){
            $('#div_nom_artisan').hide();
           
        }else{
            $('#div_nom_artisan').removeAttr("style");
        }   

    });
});
