$('document').ready(function(){
     init('');
    $("#nouveau").click(function() {
        $('#ancre').show();
        $('#idechange').val('0');
        $('#idmessageechange').val('0');
        
    });
	$("#dateappel").datetimepicker({
        format: 'DD/MM/YYYY  HH:mm:ss'
    });	
    $("#daterappel").datetimepicker({
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

   $('input[name="nomrecherche"]').keypress(function(){
        $('#tableClients').html("");   
        var textNom = $(this).val().toLowerCase();
         $('#rechercheClient_').find('option').each(function(i,e){
            if($(e).text().toLowerCase() === textNom){
                 $('#rechercheClient_').val($(e).val());
                 init(($('#rechercheClient_').val()));
                 return;
            }
        });
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

   $('input.flat').iCheck({
        checkboxClass : 'icheckbox_flat-green',
        radioClass : 'iradio_flat-green'
    });
   $("ins.iCheck-helper").click(function() {

        var etatCheck = $(this).prev('input[name="confirmation"]').is(':checked');
       if(etatCheck == true){
          $('#confirmationDiv').hide();  
          $('#commentaires').val('');
          $('#daterappel').val('');
       }else{
          $('#confirmationDiv').show();  
       }

   });

});

init = function(id){
    $('#loading-table').show();
    $('#tableClients').html("");   
    $.postJSON(BASE_URL + "echanges_proprietaire/getWhere/",
    {
        "id" : id
    },initBack);     
};
initBack = function(json){

    var droits = json;
    var tbody = "";
    i = 0;

    if((droits.length)>0){
         tbody += '<ul class="nav nav-tabs tabs-left" >';
          $.each(droits,function(i, elt) {
            var onglet = "";
            if( i == 0){
               onglet = "class = 'active' "; 
            }
           
            tbody += '<li id="li_'+i+'" '+onglet+'>';
            tbody += '<a href="#home-'+i+'" data-toggle="tab" data-client="'+elt.clientid+'" onclick="show('+elt.clientid+')">';
            tbody += ''+elt.clientNom+' '+elt.clientPrenom;
            tbody += '</a>';
            tbody += '</li> ';
          
        }); 
        tbody += '</ul>'; 
      }

    $('#tableClients').append(tbody);
    if($('#li_0').hasClass('active')){        
        chargmentTable($('#li_0 a').data('client'));
    }
    $('#loading-table').hide(); 
};

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
    $('.well').show();

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
            var commentaires = '-';
            if(elt.commentaireEchanges != null){
                commentaires =  elt.commentaireEchanges;
            }

            var daterappel_ = '-';
            if(elt.rappelEchanges != null){
                daterappel_ =  elt.rappelEchanges;
            }

            tbody += "<tr id='tr_" + elt.idEchanges + "'>";
            tbody += '<td>'+ elt.clientNom +' '+ elt.clientPrenom+'</td>';
            tbody += '<td>'+ elt.phonesEchanges +'</td>';
            tbody += '<td>'+ elt.dateEchanges +'</td>';
            tbody += '<td>'+ elt.motifEchanges +'</td>';
            tbody += '<td>'+ commentaires +'</td>';
            tbody += '<td>'+ daterappel_ +'</td>';
            tbody += '<td><a href="#ancre" onclick="showAppel('+elt.idEchanges+')" class="btn btn-round btn-warning">&nbsp;&nbsp;<span class="gly fa fa-edit"></span></a></td>';
            tbody += '<td><a href="#" class="btn btn-round btn-danger" onclick="deleteEchange('+elt.idEchanges+','+elt.clientid+')">&nbsp;&nbsp;<span class="gly fa fa-remove"></span></a></td>';
            tbody += '</tr>';
        });  
      }else{
       tbody+="<td colspan='7'>Aucun résultat sur l'appel<td>";
      }
    $('.well').hide();
    $("#datatable-buttons tbody ").append(tbody);
   
}
tableMessage = function(json){
    var droits = json;
    var tbody = "";
    i = 0;
    if((droits.length)>0){
        $.each(droits,function(i, elt) {
            tbody += "<tr id='tr_" + elt.idEchanges + "'>";
            tbody += '<td>'+ elt.clientNom +' '+ elt.clientPrenom+'</td>';
            tbody += '<td>'+ elt.mailsEchanges +'</td>';
            tbody += '<td>'+ elt.dateEchanges +'</td>';
            tbody += '<td>'+ elt.motifEchanges +'</td>';
            tbody += '<td>'+ elt.messagesEchanges +'</td>';
            tbody += '<td><a href="#ancre"  onclick="showMessage('+elt.idEchanges+')"  class="btn btn-round btn-warning">&nbsp;&nbsp;<span class="gly fa fa-edit"></span></a></td>';
            tbody += '<td><a href="#" class="btn btn-round btn-danger" onclick="deleteEchange('+elt.idEchanges+','+elt.clientid+')">&nbsp;&nbsp;<span class="gly fa fa-remove"></span></a></td>';
            tbody += '</tr>';
        });
    }else{
        tbody+="<td colspan='7'>Aucun résultat sur le message<td>";
      }
    $("#datatable-buttons1 tbody ").append(tbody);
}
showAppel = function(id){
    $('#ancre').show();
    $('#home-tab').tab('show'); 
    $.getJSON(BASE_URL+'echanges_proprietaire/getEchanges/',{
        'id' : id
    },showAppelBack)
}
showAppelBack = function (json){  
    $('#idechange').val(json[0].idEchanges);
    $('#nomprop').val(json[0].clientNom +' '+json[0].clientPrenom);
    $('#selectClient').val(json[0].clientid);
    $('#numphone').val(json[0].phonesEchanges);
    $('#dateappel').val(json[0].dateEchanges);
    $('#motifi').val(json[0].motifEchanges);
    if(json[0].codeEchanges == 0){
        $('#confirmationDiv').show();  
        $('#commentaires').val(json[0].commentaireEchanges);
        $('#daterappel').val(json[0].rappelEchanges);
        $('#confirmation').removeAttr("checked");
        $('input[name="confirmation"]').parent('div').removeAttr('class').addClass('icheckbox_flat-green')
    }else{
        $('#confirmationDiv').hide();          
        $('input[name="confirmation"]').parent('div').addClass('icheckbox_flat-green checked');
        $('input[name="confirmation"]').attr('checked','checked');
        $('#commentaires').val("");
        $('#daterappel').val('');
    }
    
}

showMessage = function(id){
    $('#ancre').show(); 
    $('#profile-tab').tab('show');
    $.getJSON(BASE_URL+'echanges_proprietaire/getEchanges/',{
        'id' : id
    },showMessageBack)
}
showMessageBack = function (json){ 
    $('#idmessageechange').val(json[0].idEchanges);
    $('#nomprop').val(json[0].clientNom +' '+json[0].clientPrenom);
    $('#selectClient_').val(json[0].clientid);
    $('#emailpro').val(json[0].mailsEchanges);
    $('#messageenvoyer').text(json[0].messagesEchanges);
    $('#motific').val(json[0].motifEchanges);
    
}

deleteEchange = function(ide,idc){
    if (!confirm(" Êtes-vous certain de vouloir supprimer ceci ? "))
        return;
   $.getJSON(BASE_URL+'echanges_proprietaire/removeEchanges/',{
        'ide' : ide,
        'idc' : idc
    },MessageBack) 
}
MessageBack = function(json){
    id = json;
    console.log(json);
    if (id != "") {
      notification("","Votre donnée a été bien supprimée","success");
      $("#tr_" +id).remove();
    }
}