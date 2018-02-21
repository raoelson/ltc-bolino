$(document).ready(function() {
	init();
});

init = function(){
	$(".table tbody").html("");
	var tbody = "";
	
	for(i=1;i<=5;i++){
		var somm= 0;
		somm+= i;
		tbody += "<tr id='tr_" + i + "'>";
		tbody += '<td><input id="nomParent"    name="nomParent'+i+'" placeholder="Nom..." type="text" value="'+i+'"></td>';
		tbody += '<td><input id="nomParent"    name="nomParent'+i+'" placeholder="Nom..." type="text" value="'+i+'"></td></td>';
		tbody += '<td><input id="nomParent"    name="nomParent'+i+'" placeholder="Nom..." type="text" value="'+somm+'"></td></td>';
		tbody += '</tr>';
	}
	$(".table tbody").append(tbody);
}