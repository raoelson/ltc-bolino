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
			var idtr = $(this).parents('tr');
			$.postJSON(BASE_URL + "group/delete/",{
				"id": id
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
			$.postJSON(BASE_URL + "group/show/",{
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
		$("#idgroupe").val(elt.idgrp);
		$("#namegroupe").val(elt.name);
		$('#ancre').show();
	}
});

