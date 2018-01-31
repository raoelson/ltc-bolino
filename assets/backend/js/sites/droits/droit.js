$(document).ready(function() {

	$("#selectGroup").on('change', function() {
		if ($(this).val() == 0) {
			$("#datatable-droits tbody").html("");
			return;
		}
		init();
	});

});

init = function() {
	$("#datatable-droits tbody").html("");
	$.getJSON(BASE_URL + "droit/getWhere/" + 1, initCallBack);
}
initCallBack = function(json) {
	var droits = json.data;
	var tbody = "";
	i = 0;
	$
			.each(
					droits,
					function(i, elt) {
						tbody += "<tr id='tr_" + elt.id + "'>";
						tbody += "<td> <input type='hidden' name='nameMenu' value='"
								+ elt.name + "'>" + elt.name + "</td>";
						tbody += '<td><label><input type="checkbox" name="actionvoir" class="js-switch" '
								+ elt.actionvoir + ' /></td>';
						tbody += '<td><label><input type="checkbox" name="actioncreer" class="js-switch" '
								+ elt.actioncreer + ' /></td>';
						tbody += '<td><label><input type="checkbox" name="actionmodifier" class="js-switch" '
								+ elt.actionmodifier + ' /></td>';
						tbody += '<td><input type="checkbox" name="actionsupprimer" class="js-switch" '
								+ elt.actionsupprimer + ' /></td>';
						tbody += '</tr>';
					});
	$("#datatable-droits tbody").append(tbody);
	if ($(".js-switch")) {
		var elems = Array.prototype.slice.call(document
				.querySelectorAll('.js-switch'));
		elems.forEach(function(html) {
			var switchery = new Switchery(html, {
				color : '#26B99A'
			});
		});
	}

	$('#btnsave').click(function() {
		//JSON.stringify
		var data = (parseData());
		$.postJSON(BASE_URL + "droit/saveAndupdate/", {
			'data' : data,
			'groupe' : $("#selectGroup").val()
		}, saveCallBack);
	});
	var parseData = function() {
//		var data = "[";
//		$("#datatable-droits tbody tr").each(
//				function(i, v) {
//					data += "{";
//					$(this).closest('tr').find('input').each(
//							function(ii, vv) {
//								if ($(this).attr('name') == "nameMenu") {
//									data += '"' + $(this).attr('name') + '"'
//											+ ':"' + $(this).val() + '"';
//									trans.push(data);
//								} else {
//									data += '"' + $(this).attr('name') + '"'
//											+ ':"' + $(this).is(':checked')
//											+ '"'
//									trans.push(data);
//								}
//								if (ii < 4) {
//									data += ',';
//								}
//							});
//					data += "},";
//				})
//		var nbr = data.length;
//		if (data.charAt(nbr - 1) == ',') {
//			data = data.substring(0, nbr - 1);
//		}
//		data += "]";
//		return (data);
		var test = new Array();
		var datatet = "";
		$("#datatable-droits tbody tr").each(
				function(i, v) {					
					$(this).closest('tr').find('input').each(
					function(ii, vv) {
						if ($(this).attr('name') == "nameMenu") {
							datatet = $(this).attr('name') + '"=>"'+ $(this).val();
							
						} else {
							
						}
					});
					test.push(datatet);
				})
				return(test);
	}

	saveCallBack = function(json) {
		console.log(json);
	}
}
