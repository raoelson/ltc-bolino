$('document').ready(function(){
	$('input.flat').iCheck({
		checkboxClass : 'icheckbox_flat-green',
		radioClass : 'iradio_flat-green'
	});
	$("ins.iCheck-helper")
		.click(function() {
			var etatCheck = $(this).prev(
			'input[name="adresse"]').val();
				if (etatCheck == 0 && etatCheck != 'undefined') {
					$('#NonAdresse').removeAttr("style");
					
						/*$('#div_montant_aide').hide();
						$('#div_type_travaux').hide();											
						$("#montant_aide").val("");
						$("#nom_organisme").val("");
						$("#type_travaux_finan").val("");*/
											
				} else if (etatCheck == 1 && etatCheck != 'undefined') {
					/*$('#div_nom_organisme').removeAttr("style");
					
					$('#div_type_travaux').removeAttr("style");*/
					$('#NonAdresse').hide();
				}
		});
});