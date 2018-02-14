$(document)
		.ready(
				function() {

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

										} else if (etatCheck == 1
												&& etatCheck != 'undefined') {
											$('#div_nom_organisme').removeAttr(
													"style");
											$('#div_montant_aide').removeAttr(
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
					var wrapper = $("#divRessources").find('#newElements'); // Fields wrapper
					var x = 1;
					$('#ajoutRessources').click(function(e) {
						 e.preventDefault();
						 var data = "";
						 if(x < max_fields){ //max input box allowed
							 x++; 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="nomParent[]" placeholder="Nom..." type="text">';
							 data += '</div>';
							 data += '</div>'; 
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="prenomParent[]" placeholder="Prénom..." type="text">';
							 data += '</div>';
							 data += '</div>';
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date de naissance<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="datenaissanceParent[]"  type="date">';
							 data += '</div>';
							 data += '</div>';
							 
							 data += '<div class="item form-group">';	
							 data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lien parenté<span class="required" id="addclass">*</span></label>';	
							 data += '<div class="col-md-6 col-sm-6 col-xs-12">'; 
							 data += '<input id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="lienParent[]" placeholder="ex:Père ou Mère..." type="text">';
							 data += '</div>';
							 data += '</div>';
							 
					         $(wrapper).append(data);
						 }
					});
				});
