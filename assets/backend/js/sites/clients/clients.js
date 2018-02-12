$(document)
.ready(
function() {

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
		tableBody.on('click','#supprimer',function() {
			if (!confirm(" Êtes-vous certain de vouloir supprimer ceci ? "))
				return;
			id =  $(this).closest('tr').attr('id');
			usrgrp =  $(this).closest('tr').attr('data');
			var idtr = $(this).parents('tr');
			$.postJSON(BASE_URL + "user/delete/",{
				"id": id,
				"usrgrp": usrgrp
			}, function(json){
				id = json.data;
				if(id != ""){
					table
			        .row(idtr)
			        .remove()
			        .draw();
					notification("","Votre donnée a été bien supprimée","success");
				}
			});
		});	
		tableBody.on('click','#modifier',function() {									
			id =  $(this).closest('tr').attr('id');
			$.postJSON(BASE_URL + "user/show/",{
				"id": id
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
	
	modifierCallBack = function(json){
		var elt = json.data;
		$('#addclass').hide();
		$('.alert').hide();
		$('#passworduser').removeAttr( "required" )
		$('#password').removeClass( "item form-group bad" ).addClass( "item form-group" );
		$("#nameuser").val(elt.username);
		$("#firstnameuser").val(elt.firstname);
		$("#idusr").val(elt.idusr);
		$("#idgroupe").val(elt.idgrp);
		$('#usergrp').val(elt.usrgrp)
		$('#ancre').show();
	}
});

