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

			var etatProprietaire = $(this).prev('input[name="proprietaire"]');
			var etatLocataire = $(this).prev('input[name="locataire"]');
			var etatOccupant = $(this).prev('input[name="occupant"]');

			if(etatProprietaire.is(':checked') == true){
				$('input[name="locataire"]').removeAttr('checked');
				$('input[name="occupant"]').removeAttr('checked');
				$('input[name="locataire"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="occupant"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')				
			}
			if(etatLocataire.is(':checked') == true){
				$('input[name="proprietaire"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green');
				$('input[name="occupant"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')	;
				$('input[name="proprietaire"]').removeAttr('checked');
				$('input[name="occupant"]').removeAttr('checked');
			}
			if(etatOccupant.is(':checked') == true){
				$('input[name="proprietaire"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="locataire"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')	
				$('input[name="proprietaire"]').removeAttr('checked');
				$('input[name="locataire"]').removeAttr('checked');
			}

			var foncierroprietaire = $(this).prev('input[name="proprietaire1"]');
			var foncierLocataire = $(this).prev('input[name="locataire1"]');
			var foncierOccupant = $(this).prev('input[name="occupant1"]');

			if(foncierroprietaire.is(':checked') == true){
				$('input[name="locataire1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="occupant1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')	
				$('input[name="locataire1"]').removeAttr('checked');
				$('input[name="occupant1"]').removeAttr('checked');		
			}
			if(foncierLocataire.is(':checked') == true){
				$('input[name="proprietaire1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="occupant1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')	
				$('input[name="proprietaire1"]').removeAttr('checked');
				$('input[name="occupant1"]').removeAttr('checked');
			}
			if(foncierOccupant.is(':checked') == true){
				$('input[name="proprietaire1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="locataire1"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
				$('input[name="proprietaire1"]').removeAttr('checked');
				$('input[name="locataire1"]').removeAttr('checked');	
			}
		});

		$('#single_cal001').daterangepicker({
			  singleDatePicker: true,
			  singleClasses: "picker_4",
			  maxDate:  dateContruction() ,
			  locale: {
					format: 'DD/MM/YYYY'
				  }
		}, function(start, end, label) {
			  //console.log(start.toISOString(), end.toISOString(), label);
		});
		$('#single_cal002').daterangepicker({
			  singleDatePicker: true,
			  singleClasses: "picker_4",
			  startDate: dateContruction(),
			  maxDate:  dateContruction() ,
			  locale: {
					format: 'DD/MM/YYYY'
				  }
		}, function(start, end, label) {
			  //console.log(start.toISOString(), end.toISOString(), label);
		});


});