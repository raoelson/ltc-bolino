function notification(titre,message,etat) {
	new PNotify({
	    text: message,
	    type: etat
	});
}
$.postJSON = function(url, data, callback) {
	$.post(url, data, callback, "json");
};

