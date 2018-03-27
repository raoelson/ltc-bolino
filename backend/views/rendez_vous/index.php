<div id="list_artisan">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <h2>Gestion de Rendez-vous</h2>&nbsp;<span  id="demo55">
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <select id="mySelect_list" onchange="myFunction_select()" name="statut"  class="form-control"  tabindex="50" ><br />
                            <option  value="2018-03-20">Semaine Passée</option>
                            <option  value="2018-03-27">Semaine Dernière</option>
                            <option value="sur cette Semaine">Cette Semaine </option>
                            <option value="Semaine Prochaine ">Semaine Prochaine </option>
                            <option value="Futur">Futur </option>
                            <option value="Tous">Tous </option>
                            </optgroup>
                        </select>
                        <input type="text" id="myInput" onmouseover="myFunction_input()" placeholder="Search for names.." value="" title="Type in a name">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h class="titr">Liste personne à visiter</h>&nbsp;</span></h>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>N° Dossier</th>
                            <th>Nom </th>
                            <th>Ville</th>
                            <th>Adresse</th>
                            <th>Lieu_dit</th>
                            <th>Date et Heure</th>
                            <th>Nom tournée</th>
                            <th>Presence</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['clients'] as $val){ ?>
                            <td><?php echo ($val['num_dossier_arrivee']) ;?></td>
                            <td><?php echo ($val['firstname1']) ;?></td>
                            <td><?php echo ($val['ville']) ;?></td>
                            <td><?php echo ($val['adress1']) ;?></td>
                            <td><?php  echo ($val['lieu_dit']) ;?></td>
                            <td><?php echo ($val['date_tournee']) ;?></td>
                            <td><?php echo ($val['nom_tournee']) ;?></td>
                            <td>
                                <input type="checkbox" value="1" name="presence" class="check filled-in" id="presence">
                            </td>
                            <td>

                                <a href="#" id="modifier" title="Voir les détails"
                                   class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a>
                            </td>

                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ajout gestion de rendez_vous -->
<form class="form-horizontal form-label-left"
      action="<?php echo base_url('admin.php/rendez_vous_ajout');?>"
      method="post">
    <div class="row" id="ancre">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h5>Propriétaire</h5>
                </div>
                <div class="x_content">

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               for="name">Nom Propriétaire<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select onchange="select_userFunction()" class="form-control col-md-7 col-xs-12" name="proprietaire" id="select_user" data-placeholder="Le Nom du Propriétaire" >
                                <option></option>
                                <?php foreach ($data_client['client'] as $val){ ?>
                                    <option value="<?php echo $val['id'] ?>" ><?php echo $val['firstname1']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">N° Dossier<span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="text"  id="num_dossier_arrivee"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  placeholder="N° Dossier..." name="denomination">
                            <input type="text"  id="id_demande"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  name="id_demande">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Ville<span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="text"  id="ville11"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  placeholder="Ville ..." name="denomination">
                            <input type="text"  id="id_adress"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  name="id_adress">

                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Adresse<span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="text"  id="adress11"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  placeholder="Adresse..." name="denomination">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Lieu_dit<span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="text"  id="lieu_dit11"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  placeholder="Lieu_dit..." name="denomination">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Nom tournée<span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="text"  id="nom_tournee"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                   required="required"  placeholder="Nom tourné..." name="nom_tournee">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Date et Heure du rendez-vous<span class="required">*</span></label>
                        <div class="col-sm-6">
                            <input type="datetime-local" class="single_cal form-control" id="date_tournee" name="date_tournee" >

                            <!--input  name="partydate" value="" type="datetime-local" class="single_calb form-control" id="date_tournee" name="date_tournee" -->
                        </div>

                    </div>

                    <!---div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                               id="addclass" for="name">Validation du Tournée <span class="required">*</span></label>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <input type="checkbox" value="1" name="pres_attestation_immat" class="check filled-in" id="pres_attestation_immat">
                        </div>
                    </div-->
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button  type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Enregistrer</button>
                                <button type="reset" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Effacer</button>

                            </div>
                        </div>



                </div>

            </div>
        </div>
    </div>
</form>
<!-- page content -->

<!-- ************************************************************/.modal-ajout *********************************************************************-->
<select id="mySelecta" onchange="myFunction()" name="statut"  class="form-control"  tabindex="50" ><br />
                            <option for="mySelect" value="Semaine Passer">Semaine Passée</option>
                            <option for="mySelect" value="Semaine Dernière">Semaine Dernière</option>
                            <option value="sur cette Semaine">Cette Semaine </option>
                            <option value="Semaine Prochaine ">Semaine Prochaine </option>
                            <option value="Futur">Futur </option>
                            <option value="Tous">Tous </option>
                            </optgroup>
                        </select>




<script>


    var id_user="";//porter variable (azo ampiasaina fona)
    function select_userFunction() {
        //date

        var id_select = document.getElementById("select_user").value;
        id_user =id_select
        //console.log(id_select);
        //console.log(id_user);
         //document.getElementById("id_user").innerHTML = "" + x;
    }

    $(document).ready(function() {

        //date
        // var x = document.getElementById("mySelect").value;
       // document.getElementById("demo").innerHTML = "" + x;
        //exemple table
        $('#example').DataTable();

        //call var select_user
        $(document).on('change', '#select_user', function() {
            //$("#select_user").change(function(){
            console.log(id_user);
            $.ajax({
                url:"<?php echo base_url()?>admin.php/rendez_vous/edit",
                method: "POST",
                data:{id_user: id_user},
                dataType: "json",
                success:function(data)
                    {
                        $('#num_dossier_arrivee').val(data.num_dossier_arrivee);
                        $('#adress11').val(data.adress1);
                        $('#ville11').val(data.ville);
                        $('#lieu_dit11').val(data.lieu_dit);
                        //recuperer id adress, demande
                        $('#id_adress').val(data.adress_id);
                        $('#id_demande').val(data.demandeid);
                    },
                error:function()
                    {
                        alert('erruer');
                        window.location.reload();
                    }
            });
        });


    });


    function myFunction_select() {
        var x = document.getElementById("mySelect_list").value;
       document.getElementById("demo55").innerHTML = "" + x;
        document.getElementById("myInput").value = x;
      //  document.getElementById("country").value x;
    }
   /* function myFunction() {
        var x = document.getElementById("mySelecta").value;
		 document.getElementById("demo1").innerHTML = "" + x;
       
		}*/
		/*var lue="$("#example_filter").find(".input-sm")"
    alert(lue);
		consol.log(lue);*/


		//function filtre sisi
    function myFunction_input() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("example");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[5];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>


<link href="<?php echo base_url() ?>assets/backend/css/art/artisan.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
