$(document).ready(function() {

	$("#selectGroup").on('change', function() {
		if ($(this).val() == 0) {
			$("#datatable-droits tbody").html("");
			return;
		}
		init($(this).val());
	});

});

init = function(id) {
	$("#datatable-droits tbody").html("");
	$.getJSON(BASE_URL + "droit/getWhere/" + id, initCallBack);
}
initCallBack = function(json) {
	var droits = json.data;
	var tbody = "";
	i = 0;
	$
			.each(
					droits,
					function(i, elt) {
						tbody += "<tr id='tr_" + elt.iddroit + "'>";
						tbody += "<td> <input type='hidden' name='nameMenu' id='nameMenu' value='"
								+ elt.iddroit + "'>" + elt.menu + "</td>";
						tbody += '<td><label><input type="checkbox" name="voir" class="js-switch" '
								+ elt.voir + ' /></td>';
						tbody += '<td><label><input type="checkbox" name="creer" class="js-switch" '
								+ elt.creer + ' /></td>';
						tbody += '<td><label><input type="checkbox" name="modifier" class="js-switch" '
								+ elt.modifier + ' /></td>';
						tbody += '<td><label><input type="checkbox" name="supprimer" class="js-switch" '
								+ elt.supprimer + ' /></td>';
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

	$('.js-switch').click(
			function() {
                 var id = "";
				$.each($(this).closest("td").siblings("td").find(
						'input[name="nameMenu"]'), function() {
					id = ($(this).val());
				});
				$.postJSON(BASE_URL + "droit/saveAndupdate/", {
					'data' : JSON.stringify($(this).is(':checked')),
					'name' : ($(this).attr('name')),
					'id' : id
				}, saveCallBack);
			})

	//
	saveCallBack = function(json) {
		//console.log(json);
	}
}
