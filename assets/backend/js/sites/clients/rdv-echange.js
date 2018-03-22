$('document').ready(function(){
    $("#nouveau").click(function() {
        $('#ancre').show();
    });
	$("#dateappel").datetimepicker({
        format: 'DD/MM/YYYY  HH:mm:ss'
    });	
	$('#nomprop').typeahead({
		  hint: true,
		  highlight: true,
		  minLength: 1
		},{
          name: 'nomprop',
          required:'required',
          source: substringMatcher(dataClients)
    });

    $('#nomrecherche').typeahead({
          hint: true,
          highlight: true,
          minLength: 1
        },{
          name: 'nomrecherche',
          required:'required',
          source: substringMatcher(dataClients)
    });
   
   $('input[name="nomprop"]').change(function(){
        var textNom = $(this).val().toLowerCase();
        $('#selectClient').find('option').each(function(i,e){
            if($(e).text().toLowerCase() === textNom){
                 $('#selectClient').val($(e).val());
                 $('#numphone').val($(e).data("phone"));
                 $('#emailpro').val($(e).data("email"));
                 
                 return;
            }
        });

         $('#selectClient_').find('option').each(function(i,e){
            if($(e).text().toLowerCase() === textNom){
                 $('#selectClient_').val($(e).val());
                 $('#numphone').val($(e).data("phone"));
                 $('#emailpro').val($(e).data("email"));
                 
                 return;
            }
        });
   })
      if($('#li_0').hasClass('active')){           
         chargmentTable($('#li_0 a').data('client'));
      }
});
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;
    matches = [];
    substrRegex = new RegExp(q, 'i');
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

show = function(id){
    chargmentTable(id);
}

chargmentTable = function(id){
    $("#datatable-buttons tbody").html("");
    $("#datatable-buttons1 tbody").html("");
    $.postJSON(BASE_URL + "echanges_proprietaire/getAppelMessage/",
        {
            "id" : id
        },chargmentBack)
}
chargmentBack = function(json){
    tableAppel(json.appel);
    tableMessage(json.message);
};

tableAppel = function(json){
    var droits = json;
    var tbody = "";
    i = 0;
    if((droits.length)>0){
          $.each(droits,function(i, elt) {
            tbody += "<tr id='tr_" + elt.clientid + "'>";
            tbody += '<td>'+ elt.clientNom +' '+ elt.clientPrenom+'</td>';
            tbody += '<td>'+ elt.phonesEchanges +'</td>';
            tbody += '<td>'+ elt.dateEchanges +'</td>';
            tbody += '<td>'+ elt.motifEchanges +'</td>';
            tbody += '<td><a href="#" class="btn btn-round btn-warning">&nbsp;&nbsp;<span class="gly fa fa-edit"></span></a></td>';
            tbody += '<td><a href="#" class="btn btn-round btn-danger">&nbsp;&nbsp;<span class="gly fa fa-remove"></span></a></td>';
            tbody += '</tr>';
        });  
      }else{
       tbody+="<td colspan='7'>Aucun résultat sur l'appel<td>";
      }
    
    $("#datatable-buttons tbody ").append(tbody);
}
tableMessage = function(json){
    var droits = json;
    var tbody = "";
    i = 0;
    if((droits.length)>0){
        $.each(droits,function(i, elt) {
            tbody += "<tr id='tr_" + elt.clientid + "'>";
            tbody += '<td>'+ elt.clientNom +' '+ elt.clientPrenom+'</td>';
            tbody += '<td>'+ elt.mailsEchanges +'</td>';
            tbody += '<td>'+ elt.dateEchanges +'</td>';
            tbody += '<td>'+ elt.motifEchanges +'</td>';
            tbody += '<td>'+ elt.messagesEchanges +'</td>';
            tbody += '<td><a href="#" class="btn btn-round btn-warning">&nbsp;&nbsp;<span class="gly fa fa-edit"></span></a></td>';
            tbody += '<td><a href="#" class="btn btn-round btn-danger">&nbsp;&nbsp;<span class="gly fa fa-remove"></span></a></td>';
            tbody += '</tr>';
        });
    }else{
        tbody+="<td colspan='7'>Aucun résultat sur le message<td>";
      }
    $("#datatable-buttons1 tbody ").append(tbody);
}