$(document)
		.ready(
				function() {
					var tailleTable = 0;

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
							tableBody.on('click', '#modifier', function() {
								id = $(this).closest('tr').attr('id');
								$.postJSON(BASE_URL + "user/show/", {
									"id" : id
								}, modifierCallBack);
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

					$("#nouveau").click(function() {
						$('#ancre').show();
					});

					modifierCallBack = function(json) {
						var elt = json.data;
						$('#addclass').hide();
						$('.alert').hide();
						$('#passworduser').removeAttr("required")
						$('#password').removeClass("item form-group bad")
								.addClass("item form-group");
						$("#nameuser").val(elt.username);
						$("#firstnameuser").val(elt.firstname);
						$("#idusr").val(elt.idusr);
						$("#idgroupe").val(elt.idgrp);
						$('#usergrp').val(elt.usrgrp)
						$('#ancre').show();
					}

					var max_fields = 10; // maximum input boxes allowed
					var wrapper = $("#parentRessourceDiv").find('#divRessources'); // Fields wrapper
					var x = 1;					
					$('#AffichePersonnes').click(function(e){						
						e.preventDefault();
						$('#parentRessourceDiv').show();
						var data = "";
						 if(x < max_fields){ //max input box allowed
						 	tailleTable = x++;							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">';
							 data += '<input id="nomParent"  required="required"  class="form-control col-md-7 col-xs-12" name="nomParent'+(x)+'" placeholder="Nom..." type="text">';
							 data += '</div>';
							 data += '</div>'; 
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="prenomParent"  required="required"  class="form-control col-md-7 col-xs-12" name="prenomParent'+(x)+'" placeholder="Prénom..." type="text">';
							 data += '</div>';
							 data += '</div>';
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date de naissance<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="single_cal'+(x)+'" placeholder="Date de naissance..."   required="required"  class="form-control col-md-7 col-xs-12" name="datenaissanceParent'+(x)+'"  type="text">';
							 data += '</div>';
							 data += '</div>';
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lien parenté<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<select id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="lienParent'+(x)+'" placeholder="ex:Père ou Mère..." type="text">';
							 data += '<option value="Mère">Mère</option>';
							 data += '<option value="Père">Père</option>';
							 data += '<option  value="Enfant">Enfant</option>';
							 data += '<option  value="Conjoint">Conjoint</option>';
							 data += '<option  value="Grandparent">Grands-parents</option>';							 
							 data += '</select>';
							 data += '</div>';
							 data += '</div>';
							 data += '<table class="table table-striped table-bordered">';							 
							 data +='<thead><tr>';
							 data +='<th>Salaire et Rénumération</th>';
							 data +='<th>Allocation Familiales</th>';
							 data +='<th>Autres préstations familiales</th>';
							 data +='<th>A.A.H</th>';
							 data +='<th>ASSEDIC</th>';
							 data +='<th>R.S.A</th>';
							 data +='<th>Retraite</th>';
							 data +='<th>Pension Alimentaire</th>';
							 data +='<th>Autres</th>';
							 data +='<th>Montant Total</th>';
							 data +='</thead></tr>';
							 data +='<tbody><tr>';
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Salaire et Rénumération"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Salaire et Rénumération..." type="text" value="0.0"></div></td>';
							
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Allocation Familiales"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Allocation Familiales..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Autres préstations familiales"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Autres préstations familiales..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="A.A.H"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="A.A.H..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="ASSEDIC"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="ASSEDIC..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="R.S.A"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="R.S.A..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Retraite"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Retraite..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Pension Alimentaire"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Pension Alimentaire..." type="text" value="0.0"></div></td>';
							 
							 data +='<td><div class="item form-group"><input id="" name="typeRessoucesParents'+(x)+'[]" type="hidden" value="Autres"/>';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents'+(x)+'[]" placeholder="Autres..." type="text" value="0.0"></div></td>';
							 data +='<td><div class="item form-group">';
							 data +='<input id="" class="form-control col-md-7 col-xs-12" name="montantTotalRessoucesParents'+(x)+'" disabled="disabled" placeholder="Autres..." type="text" value="0.0"></div></td>';
							 data +='</tr></tbody>';
							 data += '</table>';
					         $(wrapper).append(data);

					          $('input[name^="montantRessoucesParents'+(x)+'"]').keyup(function(e) {
							 	e.preventDefault();
							 		var sommeFoyer = 0;

								    $('input[name^="montantRessoucesParents'+(x)+'"]').each(function() {
								        if($(this).val() == "")
								        	return;
								        sommeFoyer += parseFloat(($(this).val()));
								    });
								    $('input[name="montantTotalRessoucesParents'+(x)+'"]').val(sommeFoyer);
								    SommeFoyer();
								});	



								$("#single_cal"+(x)).daterangepicker({
									  singleDatePicker: true,
									  singleClasses: "picker_4",
									  startDate: testDate(),
									  maxDate:  testDate() ,
									  locale: {
											format: 'DD/MM/YYYY'
										  }
									}, function(start, end, label) {
									  //console.log(start.toISOString(), end.toISOString(), label);
								})					 
						 }	
						 $('input[name="nombreVivantfoyer"]').val(tailleTable);
						 SommeFoyer();
					});

				SommeFoyer = function(){
					var SommeTableFoyer = 0;
						 for(i=1;i<=tailleTable;i++){
						 	SommeTableFoyer += (parseFloat( $('input[name="montantTotalRessoucesParents'+(i+1)+'"]').val()));
						 }
					var sommeGeneral = SommeTableFoyer+parseFloat($('input[name="montantSommeRessoucesDemandeur"]').val());
						 //notificationSomme('Montant total des personnes vivants au Foyer',sommeGeneral);
						 $('#totalFoyer').text(sommeGeneral + " € ");
				}
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
ChargementCallback = function(json){
	
	var tbody ="";
	$.each(json['data'],function(i,elt){
		tbody+="<option value='"+elt.nom_region_fr+"'>"+elt.nom_region_fr+"</option>"						
	});
	$('#ville').append(tbody);
}
