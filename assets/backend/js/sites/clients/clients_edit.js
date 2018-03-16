$(document)
		.ready(
				function() {
					var tailleTable = dataTotal;
					/*alert();*/
					$('input[name^="montantRessoucesDemandeur"]').keyup(function() {
						var sommeDemandeur = 0;
					    $('input[name^="montantRessoucesDemandeur"]').each(function() {
					        if($(this).val() == "")
					        	return;
					        sommeDemandeur += parseFloat(($(this).val()));
					    });
					    $('input[name="montantSommeRessoucesDemandeur"]').val(sommeDemandeur);
					    SommeFoyer();
					});
					
					for(x = 1;x<=tailleTable; x++){
						if(x>1){
							$('#'+x+'_table tbody input[id^="'+(x)+'_montantRessoucesParents"]').keyup(function(e) {
							 	e.preventDefault();									 	
							 		var sommeFoyer = 0;
							 		var index = $(this).attr("name").match(/\d+/);								 									 	
								    $('input[id^="'+(index[0])+'_montantRessoucesParents"]').each(function() {
								        if($(this).val() == "")
								        	return;
								        sommeFoyer += parseFloat(($(this).val()));
								    });
								    //console.log(sommeFoyer);
								    $('input[id="'+index[0]+'_montantTotalRessoucesParents"]').val(sommeFoyer);
								    SommeFoyer();
								});

							$("#single_cal_"+(x)).daterangepicker({
									  singleDatePicker: true,
									  singleClasses: "picker_4",
									  //startDate: testDate(),
									   maxDate:  testDate() ,
									  locale: {
											format: 'DD/MM/YYYY'
										  }
									}, function(start, end, label) {
									  //console.log(start.toISOString(), end.toISOString(), label);
								})
						}
					}
					

					$('input.flat').iCheck({
						checkboxClass : 'icheckbox_flat-green',
						radioClass : 'iradio_flat-green'
					});
					$("ins.iCheck-helper")
							.click(
									function() {
										var etatCheck = $(this).prev(
												'input[name="aide_organisme"]')
												.val();
										if (etatCheck == 0
												&& etatCheck != 'undefined') {
											$('#div_nom_organisme').hide();
											$('#div_montant_aide').hide();
											$('#div_type_travaux').hide();											
											$("#montant_aide").val("");
											$("#nom_organisme").val("");
											$("#type_travaux_finan").val("");
											
										} else if (etatCheck == 1
												&& etatCheck != 'undefined') {
											$('#div_nom_organisme').removeAttr(
													"style");
											$('#div_montant_aide').removeAttr(
													"style");
											$('#div_type_travaux').removeAttr(
											"style");

										}
									});
					if (typeof ($.fn.DataTable) === 'undefined') {
						return;
					}

					var handleDataTableButtons = function() {
						if ($("#datatable-buttons").length) {
							var table = $("#datatable-buttons").DataTable({
								dom : "Blfrtip",
								buttons : [ {
									extend : "excel",
									className : "btn-sm"
								} ]
							});
							var tableBody = $('#datatable-buttons tbody');
							tableBody
									.on(
											'click',
											'#supprimer',
											function() {
												if (!confirm(" Êtes-vous certain de vouloir supprimer ceci ? "))
													return;
												id = $(this).closest('tr')
														.attr('id');
												usrgrp = $(this).closest('tr')
														.attr('data');
												var idtr = $(this)
														.parents('tr');
												$
														.postJSON(
																BASE_URL
																		+ "user/delete/",
																{
																	"id" : id,
																	"usrgrp" : usrgrp
																},
																function(json) {
																	id = json.data;
																	if (id != "") {
																		table
																				.row(
																						idtr)
																				.remove()
																				.draw();
																		notification(
																				"",
																				"Votre donnée a été bien supprimée",
																				"success");
																	}
																});
											});						
						}
					};

					TableManageButtons = function() {
						"use strict";
						return {
							init : function() {
								handleDataTableButtons();
							}
						};
					}();

					$('#datatable-keytable').DataTable({
						keys : true
					});

					$('#datatable-responsive').DataTable();

					$('#datatable-fixed-header').DataTable({
						fixedHeader : true
					});

					TableManageButtons.init();

				SommeFoyer = function(){
					var SommeTableFoyer = 0;
						 for(i=1;i<=tailleTable;i++){
							 if(i > 1){
								 SommeTableFoyer += (parseFloat( $('input[id="'+(i)+'_montantTotalRessoucesParents"]').val())); 
							 }						 	
						 }
					var sommeGeneral = SommeTableFoyer+parseFloat($('input[name="montantSommeRessoucesDemandeur"]').val());
						 //notificationSomme('Montant total des personnes vivants au Foyer',sommeGeneral);
						 $('#totalFoyer').text(sommeGeneral + " € ");
				}

				$('#supprimer').click(function(){
					var idPersonne = $('input[name="idInfoPerso"]').val();
					var idAdresse = $('input[name="idInfoAdresse"]').val();					
					if (!confirm(" Êtes-vous certain de vouloir supprimer ceci ? "))
						return;
					$.postJSON(BASE_URL + "clients/deleteClient/",{
						"idpersonne": idPersonne,
						"idadresse": idAdresse
					}, function(json){
						id = json.data;
						if(id != ""){							
							notification("","Votre donnée a été bien supprimée","success");
							setTimeout(function(){
							 window.location = urlRedirect;
							}, 500);
							
						}
					});
				});

				$("#single_cal001").daterangepicker({
					  singleDatePicker: true,
					  singleClasses: "picker_4",
					  //startDate: testDate(),
					  locale: {
							format: 'DD/MM/YYYY'
						  }
					}, function(start, end, label) {
					  //console.log(start.toISOString(), end.toISOString(), label);
				})


				if($('#pays').val() != ""){
					$('#region').html("");
					$.postJSON(BASE_URL + "regions/getWhere/",{
							"id": $('#pays').val()
						},ChargementCallback);
				}
				$('#pays').change(function(){					
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

ActiveDesactive = function(id,action){
		$.getJSON(BASE_URL + "clients/getUpdatetat/",{
			'id' : id,
			'action' : action
		},ActiveDesactiveCallBack);
	}

	ActiveDesactiveCallBack= function(json){
		if(json == 1){
			notification("","Ce propriétaire est activé","success");
				
		}else{
			notification("","Ce propriétaire est desactivé","success");
		}
		setTimeout(function(){
				 window.location = urlDetails;
			}, 500);
}

