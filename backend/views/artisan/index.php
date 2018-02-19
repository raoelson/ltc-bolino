

<div class="container">
    <div class="row">


        <div class="col-md-12">
            <div class="row">
                <div class="col col-xs-6 ">
                    <h1>Gestion des Artisans</h1>
                    <hr class="gest_art"/>
                </div>
                <div class="ro col col-xs-5 text-right">
                    <form class="form_bar navbar-form navbar-search" role="search">
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <div class="input-group-btn">
                                <button type="button" class="btn btn-search btn-danger">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="label-icon">Search</span>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="ro col col-xs-1 text-right">
                    <button href="#ajout" id="new_ajout" type="button" class="btn_ko btn btn-sm  btn-create">Nouveau</button>
                </div>
            </div>




            <div class="table-responsive">


                <table id="mytable" class="table table-bordred table-striped">

                    <thead>


                    <th>Denomination</th>
                    <th>Nom gerant</th>

                    <th> Adress</th>
                    <th>Adress deuxieme </th>







                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Voir</th>
                    </thead>
                    <tbody>
                    <?php foreach ($data as $item) { ?>
                        <tr>
                            <td><?php echo $item->denomination; ?></td>
                            <td><?php echo $item->nom_gerant; ?></td>

                            <td><?php echo $item->adress1; ?></td>
                            <td><?php echo $item->adress2; ?></td>






                            <!--button class="btn btn-warning" ><!--?php echo $item->statut; ?></button></td-->

                            <td><p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                        <span class="glyphicon glyphicon-pencil"></span></button></p></td>

                            <td><p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                        <span class="glyphicon glyphicon-trash"></span></button></p></td>

                            <td><p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-warning btn-xs view_artisan" id="<?php echo $item->id; ?>">
                                        <span class="fa fa-eye"></span></button></p></td>
                        </tr>
                    <?php } ?>

                    </tbody>

                </table>

                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>

                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!--***************************************************modal view *****************************************************************************-->
<div class="modal fade" id="modal_artisan" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">View artisan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>

                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ************************************************************/.modal-ajout *********************************************************************-->
    <div class="ajout" id="ajout">
                <form class="form-horizontal" id="frm-create">
                    <div class="panel panel-default">
                        <div class="panel-body form-horizontal payment-form">
                            <div class="x_title">
                                <h5>Information sur l'artisan</h5>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="concept" class="col-sm-3 control-label">Nom de l'entreprise</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="denomination" name="denomination">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Nom du gerant </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nom_gerant" name="nom_gerant">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Prénom du gerant </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prenom_gerant" name="prenom_gerant">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="statut" id="statut" class="form-control"  tabindex="50" ><br />
                                        <option value="">   </option>
                                        <option value="En cours">En cours </option>
                                        <option value="En Attente">En Attente </option>
                                        <option value="Accepter">Accepter </option>
                                        <option value="Refuser">Réfuser </option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-sm-3 control-label">SIREN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="siren" name="siren">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">NAF</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="code_activite" name="code_activite">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Libellé activité</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="libelle_activite" name="libelle_activite">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Forme juridique RCS ou INSEE</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="forme_juridique" name="forme_juridique">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Date immatriculation RCS</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date_immatriculation" name="date_immatriculation">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Date dernière maj RCS</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="date_derniere_rcs" name="date_derniere_rcs">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Catégorie</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="categorie" name="categorie">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Bilan (actif/passif) </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="montant_actif_passif" name="montant_actif_passif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Chiffres d’affaires</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="chiffres_affaires" name="chiffres_affaires">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Tranche d’effectif</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tranche_effectif" name="tranche_effectif">
                                </div>
                            </div>

                            <!--*****************************type artisan********************************************>
                            <div class="x_title">
                                <h5>Type d'artisan</h5>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Type Artisan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tranche_effectif" name="tranche_effectif">
                                </div>
                            </div>

                            <!--*****************************Document nécessaire sur l'artisan********************************************-->
                            <div class="x_title">
                                <h5>Document nécessaire sur l'artisan</h5>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align"> Attestation d’immatriculation
                                    du répertoire des métiers  </label>
                                <div class="matricu col-sm-9">
                                        <input type="checkbox" value="1" name="pres_attestation_immat" class="check filled-in" id="pres_attestation_immat">

                                        <label for="active">Attestation activer</label>
                                            <div class="btn_activ btn btn-primary btn-sm">
                                                <input id="file_id" type="file" multiple>
                                            </div>
                                            <!--div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                            </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align"> Extrait kbis de moins de 6 mois  </label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pres_kbis" class="check filled-in" id="pres_kbis">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align">Attestation des services fiscaux </label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pres_services_fiscaux" class="check filled-in" id="pres_services_fiscaux">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align"> Attestation sur l’honneur  relative au travail non clandestin </label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pers_attestation_clandestin" class="check filled-in" id="pers_attestation_clandestin">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align">Attestation de fourniture de déclarations sociales(moins 6 mois) </label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pres_attestation_decl_social" class="check filled-in" id="pres_attestation_decl_social">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align">Attestations d’assurance  </label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pres_attestation_assurance" class="check filled-in" id="pres_attestation_assurance">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label text-align">RIB</label>
                                <div class="matricu col-sm-9">
                                    <input type="checkbox" value="1" name="pres_rib" class="check filled-in" id="pres_rib">
                                    <label for="active">Filled-in checkbox</label>
                                    <div class="btn_activ btn btn-primary btn-sm">
                                        <input id="file_id" type="file" multiple>
                                    </div>
                                    <!--div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div-->
                                </div>
                            </div>
                            <!--*****************************adresse artisan********************************************-->
                          <div class="x_title">
                              <h5>Adress artisan</h5>
                              <div class="clearfix"></div>
                          </div>
                          <div class="form-group">
                              <label for="date" class="col-sm-3 control-label"> Adress1</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" id="adress1" name="adress1">
                              </div>
                          </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Adress2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="adress2" name="adress2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> lieu_dit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lieu_dit" name="lieu_dit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Code Postal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cp" name="cp">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Ville</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ville" name="ville">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Pays</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pays" name="pays">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Celluire Phone 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cellphone1" name="cellphone1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Celluire Phone 2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cellphone2" name="cellphone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">  Fax</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fax" name="fax">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Mail</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mail" name="mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Site_web</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="site_web" name="site_web">
                                </div>
                            </div>

                          <!--*****************************Document nécessaire sur l'artisan********************************************-->

                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <button id="btn-create" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Enregistrer</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Effacer</button>

                                </div>
                            </div>
                        </div>

                </div>


                </form>
    </div>

    <!-- /.modal-dialog -->

<script
        src="<?php echo base_url() ?>assets/backend/js/artisan/artisan.js"></script>

<link href="<?php echo base_url() ?>assets/backend/css/art/artisan.css" rel="stylesheet">

<!---script ajout****************
*******************************-->
<script>
    $(document).ready(function(){
        $("[data-toggle=tooltip]").tooltip();
        //create
        $("#btn-create").on('click',function () {
            //alert('hgdfhjgsdfhbgkjldghbkjfd');
            $.ajax({
                url:"<?php echo base_url()?>admin.php/artisan/create_artisan",
                type:"POST",
                data:$('#frm-create').serialize(),
                dataType:'json',
                success:function(data)
                {
                   alert('succccceeeeeeesss');
                    window.location.reload();

                },
                error:function()
                {
                    alert('errooooooooooooooooooooooo');
                    window.location.reload();

                }
                /*success:function()
                {
                    if(data.status)
                    {
                        $('#frm-create')[0].reset();
                        alert('succccceeeeeeesss');
                    }

                },
                error:function()
                {
                    alert('errooooooooooooooooooooooo');

                }*/
            });
        });
    });
</script>
<!---script apparait ajout**************
****************************************-->
<script>
    $(document).ready(function() {
        $('#ajout').hide();
        $("#new_ajout").click(function () {
           // $('#ancre').show();
            $('#ajout').toggle(1000);
        });
    });
</script>
<!--*******************************************script view_ajout*************************************-->
<!--script>
    $(document).on('click', '.view_artisan', function () {
        //$('#modal_artisan').modal("show");
        var artisan_id = $(this).attr("id");
        //$('#action').val("edi");

        $.ajax({
            url:"<!--?php echo base_url()?>admin.php/artisan/create_artisan",
            method: "POST",
            data: {artisan_id: artisan_id},
            dataType: "json",
            success: function (data) {
                //alert(data);
                // fetch_data();
                //$('#qsm_form')[0].reset();
                //$('#qsmModal').modal("hide");
                //$('.up').val(onClick="window.location.reload()");
                //location.reload();
                // window.location.reload();
                //return false;
                console.log(data)
                $('#nos_contact_Modal').modal("show");
            }
        });
    });
</script-->
