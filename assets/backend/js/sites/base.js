function notification(titre,message,etat) {
	new PNotify({
	    text: message,
	    type: etat
	});
}
$.postJSON = function(url, data, callback) {
	$.post(url, data, callback, "json");
};

function testDate (){
	var date = new Date();
	date.setDate(date.getDate() - 1);
	var datereturn = date.getDate()  + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear()
	return (datereturn);
}

function dateContruction(){
	var date = new Date();
	date.setYear(date.getFullYear() - 10);
	var datereturn = date.getDate()  + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();
	return (datereturn);
}

