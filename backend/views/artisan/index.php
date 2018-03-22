<div id="list_artisan">
    <div class="col-md-12 text-right">
        <button href="#ajou" id="new_ajout" type="button" class="btn-success btn_ko btn btn-sm  btn-create">Nouveau</button>
    </div>
    <div class="row tile_count"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Liste des Artisans</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons"
                           class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nom entreprise</th>
                            <th>Etat civil</th>
                            <th>Local</th>
                            <th>Activité</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data['data'] as $item) { ?>
                            <tr>
                                <!--td><img src="<!--?php echo base_url() ?>images/image.jpg" height="80px" width="80px"/></td>
                                    </td-->
                                <td><?php echo $item->denomination; ?><br/></td>
                                <td>
                                    Nom:&nbsp;&nbsp;<?php echo $item->nom_gerant; ?><br/>
                                    Prenom:&nbsp;<?php echo $item->prenom_gerant; ?><br/>
                                    Tel:&nbsp;<?php echo $item->phone; ?><br/>
                                </td>
                                <td>
                                    Adress:&nbsp;<?php echo $item->adress1; ?><?php echo $item->adress2; ?><br/>
                                    Ville:&nbsp;<?php echo $item->ville; ?><br/>
                                    Pays:<?php echo $item->pays; ?><br/>




                                </td>
                                <td><?php echo $item->namee; ?></td>
                                <td>
                                    <!--affichage en cours-->
                                    <?php
                                    $value=$item->statut;
                                    $cour='En cours';
                                    $attente="En Attente";
                                    $accepter="Accepter";
                                    $refuser="Réfuser";
                                    if($value==$cour)
                                    {
                                        ?>
                                        <button class="btn btn-primary">
                                            <?php echo $cour;?>
                                        </button>
                                        <?php
                                    }
                                    else if($value==$attente)
                                    {
                                        ?>
                                        <button class="btn btn-danger">
                                            <?php echo $attente;?>
                                        </button>
                                        <?php
                                    }
                                    else if($value==$accepter)
                                    {
                                        ?>
                                        <button class="btn btn-warning">
                                            <?php echo $accepter;?>
                                        </button>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <button class="btn btn-default">
                                            <?php echo $refuser;?>
                                        </button>
                                        <?php
                                    }

                                    ?>

                                </td>
                                <!--button class="btn btn-warning" ><!--?php echo $item->statut; ?></button></td-->

                                <td class="wx">
                                    <div class="action">


                                        <!--button class="bt btn  btn-success btn-xs voir_artisan"
                                                id="<!?php echo $item->id_artisan_alias; ?>">
                                            <span class="gly fa fa-eye"></span>&nbsp;&nbsp;</button-->
                                        <a href="<?php  echo base_url('admin.php/artisan/details_artisan/'.$item->id_artisan_alias) ?>" id="modifier"
                                           class="btn btn-round btn-default"> <span class="gly fa fa-eye"></span>&nbsp;Voir</a>
                                        <!--a href="javascript:void(0)" class="bt btn  btn-success btn-xs" onclick=voir("'."'".<!--?php $item->id;?>."'".'")> <span class="gly fa fa-eye"></span></a-->
                                    </div>
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
<!-- page content -->

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



<!-- ***********************************************/.modal-type artisan ************************************************************ -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="head modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="titre modal-title custom_align" id="Heading">Ajout Type d'artisan</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="create_tp">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input required="required" placeholder="type artisan..."type="text" id="nameType" name="name"  class="inp pt1 form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="lp">
                    <button type="button" class="ajout_type btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Terminer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- ***********************************************/.modal-categorie ************************************************************ -->
<div class="modal fade" id="modal_artisan" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="head modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="titre modal-title custom_align" id="Heading">Catégorie des Artisans</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="categorie">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input required="required" placeholder="Catégorie..."type="text" id="namecategorie" name="name"  class="inp pt1 form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="lp">
                    <button type="button" class="ajout_categorie btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Terminer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ***********************************************/.modal-type assurance ************************************************************ -->
<div class="modal fade" id="modal_assurance" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="head modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="titre modal-title custom_align" id="Heading">Type Assurance</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="categorie">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input required="required" placeholder="Type assurance..."type="text" id="nameassurance" name="name"  class="inp pt1 form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="lp">
                    <button type="button" class="ajout_assurance btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Terminer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!--***************************************************modal travaux *****************************************************************************-->
<div class="modal fade" id="modal_travaux" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="head modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="titre modal-title custom_align" id="Heading">Type Travaux</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="id_travaux">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <input required="required" placeholder="Type Travaux..."type="text" id="nametravaux" name="name"  class="inp pt1 form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="lp">
                    <button type="button" class="ajout_travaux btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Terminer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--***************************************************modal view *****************************************************************************-->


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- ************************************************************/.modal-ajout *********************************************************************-->
<div class="ajout" id="ajout">
    <form class="form-horizontal form-label-left" id="frm-create"
          action="<?php echo base_url('admin.php/create_artisan');?>"
          method="post">

        <input type="text" name="nombree" value="0" />
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="x_title">
                        <h5>Information sur l'artisan</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom entreprise<span class="required" id="addclass">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  id="denomination2"  required="required"  placeholder="Nom entreprise..." name="denomination" required
                                   data-fv-notempty-message="The password is required">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Nom du gerant<span class="required" id="addclass">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nom_gerant2" required="required"
                                   placeholder="Nom du gerant..."  name="nom_gerant">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Prénom du gerant </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="prenom_gerant2" required name="prenom_gerant"
                                   placeholder="Prenom du gerant...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Statut</label>
                        <div class="col-sm-6">
                            <select name="statut" id="statut" class="form-control"  tabindex="50" ><br />
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
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="siren2"
                                   required="required" placeholder="SIREN..." name="siren">
                        </div>



                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">NAF</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="code_activite2"
                                   required="required" placeholder="NAF...." name="code_activite">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Libellé activité</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder=Libellé activité... class="form-control" id="libelle_activite2" name="libelle_activite">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Forme juridique RCS ou INSEE</label>
                        <div class="col-sm-6">
                            <select name="forme_juridique" id="forme_juridique" class="form-control"  tabindex="50" ><br />
                                <option value="EIRL">EIRL </option>
                                <option value="SARL">SARL </option>
                                <option value="EURL">EURL </option>
                                <option value="SAS">SAS </option>
                                <option value="SASU">SASU </option>
                                <option value="SA">SA </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date immatriculation RCS</label>
                        <div class="col-sm-6">
                            <input type="text" class="single_cal form-control" id="date_immatriculation" name="date_immatriculation" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date dernière maj RCS</label>
                        <div class="col-sm-6">
                            <input type="text" class="single_cal form-control" id="date_derniere_rcs" name="date_derniere_rcs">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Catégorie</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="categorie" name="categorie">
                        </div>
                        <!--div class="col-sm-6">
                            <div class="show_ajout">
                                <select id="typecategorie" name="categorie"  required="required" class="typecategorie form-control"  tabindex="50">
                                </select>
                            </div>
                        </div-->
                        <div class="col-sm-3">
                            <button   data-toggle="modal" data-target="#modal_artisan" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Bilan (actif/passif) en Euro</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Bilan (actif/passif) en Euro..." class="form-control" id="montant_actif_passif2" name="montant_actif_passif">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Chiffres d’affaires en Euro</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Chiffres d’affaires en Euro..." class="form-control" id="chiffres_affaires2" name="chiffres_affaires">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Tranche d’effectif</label>
                        <div class="col-sm-6">
                            <select name="tranche_effectif" id="tranche_effectif" class="form-control"  tabindex="50" ><br />
                                <option value="1 à 2 Salariés">1 à 2 Salariés </option>
                                <option value="3 à 5 Salariés">3 à 5 Salariés </option>
                                <option value="6 à 9 Salariés">6 à 9 Salariés </option>
                                <option value="10 à 19 Salariés">10 à 19 Salariés </option>
                                <option value="20 à 49 Salariés">20 à 49 Salariés </option>
                                <option value="50 à 99 Salariés">50 à 99 Salariés </option>
                                <option value="100 à 199 Salariés">100 à 199 Salariés </option>
                                <option value="100 à 199 Salariés">200 à 299 Salariés </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>


            <!--*****************************type artisan********************************************-->
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="x_title">
                        <h5>Type d'artisan</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div id="relo" class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Type Artisan</label>
                        <div class="col-sm-6">
                            <div class="show_ajout">
                                <select style="width:500px;"id="typeartisan" name="name"  required="required" class="form-control"  tabindex="50">

                                </select>
                            </div>
                            <!--input type="text"  name="name" class="form-control" id="name"-->


                        </div>
                        <div class="col-sm-3">
                            <button  data-title="Delete" data-toggle="modal" data-target="#delete" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                        </div>
                    </div>
                </div>
            </div>



            <!--*****************************Document nécessaire sur l'artisan********************************************-->
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="x_title">
                        <h5>Document nécessaire sur l'artisan</h5>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align"> Attestation d’immatriculation
                            du répertoire des métiers  </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_attestation_immat" class="check filled-in" id="pres_attestation_immat">
                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align"> Extrait kbis de moins de 6 mois  </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_kbis" class="check filled-in" id="pres_kbis">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align">Attestation des services fiscaux </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_services_fiscaux" class="check filled-in" id="pres_services_fiscaux">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align"> Attestation sur l’honneur  relative au travail non clandestin </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pers_attestation_clandestin" class="check filled-in" id="pers_attestation_clandestin">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align">Attestation de fourniture de déclarations sociales(moins 6 mois) </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_attestation_decl_social" class="check filled-in" id="pres_attestation_decl_social">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align">Attestations d’assurance  </label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_attestation_assurance" class="check filled-in" id="pres_attestation_assurance">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="droite col-sm-3 control-label text-align">RIB</label>
                        <div class="matricu col-sm-6">
                            <input type="checkbox" value="1" name="pres_rib" class="check filled-in" id="pres_rib">

                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="file_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div-->
                        </div>
                    </div>

                </div>
            </div>
            <!--*****************************adresse artisan********************************************-->
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="x_title">
                        <h5>Adresse artisan</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Adresse</label>
                        <div class="col-sm-6">
                            <input placeholder="Adresse..." type="text" class="form-control" id="adress12" name="adress1">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Suite Adresse</label>
                        <div class="col-sm-6">
                            <input placeholder="Suite Adresse....." type="text" class="form-control" id="adress13" name="adress2">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> lieu_dit</label>
                        <div class="col-sm-6">
                            <input placeholder="Lieu_dit....." type="text" class="form-control" id="lieu_dit" name="lieu_dit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-3 control-label">Pays</label>
                        <div class="col-sm-6">
                            <select id="pays" name="pays" class="form-control col-md-7 col-xs-12">
                                <?php

                                foreach ($data['pays'] as $key => $value) {
                                    # code...
                                    ?>
                                    <option value="<?php echo $value['id'];?>"><?php echo $value['nom_pays_fr'];?></option>
                                <?php }
                                ?>

                            </select>

                        </div>
                    </div>
                    <div class="item form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Région<span class="required" id="addclass">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="region" name="region" class="form-control col-md-7 col-xs-12" required="required">
                            </select>
                        </div>
                    </div>
                    <div class="item form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ville<span class="required" id="addclass">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="ville" name="ville" class="form-control col-md-7 col-xs-12" required="required">
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Code Postal</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="cp2" name="cp">
                        </div>
                        <div class="error-message-cp col-sm-3">
                            <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Téléphone</label>
                        <div class="col-sm-6">
                            <input placeholder="Téléphone....." type="text" class="form-control" id="phone2" name="phone">
                        </div>
                        <div class="error-message-phone col-sm-3">
                            <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Téléphone Portable 1</label>
                        <div class="col-sm-6">
                            <input placeholder="Téléphone Portable 1....." type="text" class="form-control" id="cellphone1" name="cellphone1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Téléphone Portable 2</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Téléphone Portable 2....." class="form-control" id="cellphone2" name="cellphone2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">  Fax</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Fax....." class="form-control" id="fax" name="fax">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Mail</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Mail....." class="form-control" id="mail" name="mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label"> Site web</label>
                        <div class="col-sm-6">
                            <input type="text" placeholder="Site web....." class="form-control" id="site_web" name="site_web">
                        </div>
                    </div>
                </div>
            </div>
            <!--*****************************type artisan********************************************-->
            <div class="panel panel-default">
                <div class="panel-body form-horizontal payment-form">
                    <div class="x_title">
                        <h5>Assurance de l'Artisan</h5>
                        <div class="clearfix"></div>
                    </div>
                    <!--div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                        <!--div class="col-sm-6">
                            <input  placeholder="Type Travaux....." type="text" class="form-control" id="name" name="name">
                        </div-->
                    <!--div class="col-sm-6">
                        <div class="show_ajout">

                            <select style="width:500px" multiple="multiple" id="travaux" name="name_travaux[]"   class="form-control"  tabindex="50">

                            </select>


                                <select style="300px;"  id="" name="nom"   class="form-control"  tabindex="50">
                                </select>


                        </div>
                    </div>
                    <div class="col-sm-3">
                        <button  data-title="Delete" data-toggle="modal" data-target="#modal_travaux" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                    </div>
                </div>



        <!--***********************************
       *******************************type_assurance-->

                    <!--div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Type assurance</label>
                        <div class="col-sm-6">
                            <input  placeholder="Type assurance....." type="text" class="form-control" id="nom" name="nom">

                        </div>

                    <!--div class="col-sm-6">
                        <div class="show_ajout">

                            <select style="300px;" multiple="multiple" id="assurance" name="nom"   class="form-control"  tabindex="50">
                                </select>

                        </div>
                    </div-->
                    <!---div class="col-sm-3">
                        <button  data-title="Delete" data-toggle="modal" data-target="#modal_assurance" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                    </div>

                </div>
                <!--************************
                ****************************-->
                    <!--type_travaux _assurance-->

                    <!--div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                        <div class="col-sm-6">
                            <input  placeholder="Type Travaux....." type="text" class="form-control" id="name" name="name">
                        </div>
                    </div-->
                    <!--************************
                    ****************************-->
                    <!--div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date début assurance</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date_deb" name="date_deb">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Date fin assurance</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date_fin" name="date_fin">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Assureur</label>
                        <div class="col-sm-6">
                            <input  placeholder="Assureur....." type="text" class="form-control" id="assureur" name="assureur">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Contact de l'assureur</label>
                        <div class="col-sm-6">
                            <input  placeholder="Contact de l'assureur....." type="text" class="form-control" id="telephone" name="telephone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label text-align">Scan Assurance</label>
                        <div class="col-sm-6">
                            <input type="checkbox" value="1" name="scan_assurance" class="check filled-in" id="scan_assurance">
                            <div class="btn_activ btn btn-primary btn-sm">
                                <input id="scan_assurance_id" type="file" multiple>
                            </div>
                            <!--div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            </div->
                        </div>
                    </div-->

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12" id="typeassurancediv" style="display: none;">
                            <div class="x_panel">

                                <div class="x_content" id="assurancediv">


                                </div>
                            </div>

                        </div>

                        <button id="AfficheAssurance" type="button" class="btn btn-success">
                            AJOUT TYPE ASSURANCE DE L' ARTISAN
                        </button>
                    </div>
                </div>
            </div>
            <!--*****************************Document nécessaire sur l'artisan********************************************-->

            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <button  type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Enregistrer</button>
                    <button type="reset" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Effacer</button>

                </div>
            </div>


    </form>
</div>


<!--***************Modal confirmation
-->
<div id="modal_confirm" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ajout d'un artisan terminé</h4>

                <button id="confirm" class="btn btn-success" data-dismiss="modal"><span>OK</span> <!--i class="material-icons">&#xE5C8;</i--></button>
            </div>
        </div>
    </div>
</div>

<div id="modal_confirm" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ajout d'un artisan terminé</h4>

                <button id="confirm" class="btn btn-success" data-dismiss="modal"><span>OK</span> <!--i class="material-icons">&#xE5C8;</i--></button>
            </div>
        </div>
    </div>
</div>

<!-- /.modal-dialog -->




<link href="<?php echo base_url() ?>assets/backend/css/art/artisan.css" rel="stylesheet">

<!---script ajout****************
*******************************-->
<script>
    /* jQuery(document).ready(function() {
         jQuery("#frm-create").validate({
             rules: {
                 "denomination":{
                     required: "votre message",
                     "minlength": 2,
                     "maxlength": 60000
                 }
             })
     });*/
    $(document).ready(function(){
        $("[data-toggle=tooltip]").tooltip();
        $(".error-message").hide();
        $(".error-message1").hide();
        $(".error-message2").hide();
        $(".error-message-siren").hide();
        $(".error-message-naf").hide();
        $(".error-message-la").hide();
        $(".error-message-bl").hide();
        $(".error-message-chiffre").hide();
        $(".error-message-ad2").hide();
        $(".error-message-ad3").hide();
        $(".error-message-cp").hide();
        $(".error-message-phone").hide();
        // $(".error-message-prenom").hide();
        //$(".error-message-libel").hide();*/
        //create

        //$("#btn-create").on('click',function () {
        /* $('#it_home_form').submit(function (event) {
             event.preventDefault();*/
        /*var denomination = $('#denomination2').val();
        var nom_gerant = $('#nom_gerant2').val();
        var prenom_gerant = $('#prenom_gerant2').val();
        var siren = $('#siren2').val();
        var code = $('#code_activite2').val();
        var la = $('#libelle_activite2').val();
        var bl = $('#montant_actif_passif2').val();
        var chiffre = $('#chiffres_affaires2').val();
        var ad = $('#adress12').val();
        var adr = $('#adress13').val();
        var cp = $('#cp2').val();
        var phone = $('#phone2').val();


        /*if (denomination== '' && prenom_gerant== '' && nom_gerant== '' && siren== '' && code== '' && la== '' && bl== ''&& ad=='') {
            //alert("SVP! Modifier vos texte");
            // $('#denomination').next(".error-message").fadeIn().text("sssssssssssssssssss");
            $('#denomination2').css('border-color','red');
            $('#prenom_gerant2').css('border-color','red');
            $('#nom_gerant2').css('border-color','red');
            $('#siren2').css('border-color','red');
            $('#code_activite2').css('border-color','red');
            $('#libelle_activite2').css('border-color','red');
            $('#code_activite2').css('border-color','red');
            $('#montant_actif_passif2').css('border-color','red');
            $('#chiffres_affaires2').css('border-color','red');
            $('#adress12').css('border-color','red');
            $(".error-message-ad2").show();
            $('#adress13').css('border-color','red');
            $(".error-message-ad3").show();
            $('#cp2').css('border-color','red');
            $(".error-message-cp").show();
            $('#phone2').css('border-color','red');
            $(".error-message-phone").show();
            //alert("SVP! Modifier vos texte");
            $(".error-message").show();
            $(".error-message1").show();
            $(".error-message2").show();
            $(".error-message-siren").show();
            $(".error-message-naf").show();
            $(".error-message-la").show();
            $(".error-message-bl").show();
            $(".error-message-chiffre").show();

            return false;
        }
        if (nom_gerant== ''  ) {
            //alert("SVP! Modifier vos texte");
            // $('#denomination').next(".error-message").fadeIn().text("sssssssssssssssssss");
            $('#nom_gerant2').css('border-color','red');
            $(".error-message1").show();

            return false;
        }
        if (prenom_gerant== ''  ) {
            //alert("SVP! Modifier vos texte");
            // $('#denomination').next(".error-message").fadeIn().text("sssssssssssssssssss");
            $('#prenom_gerant2').css('border-color','red');
            $(".error-message2").show();
            return false;
        }
        if (siren== '' ) {

            $('#siren2').css('border-color','red');
            $(".error-message-siren").show();
            return false;
        }
        if (code== '' ) {

            $('#code_activite2').css('border-color','red');
            $(".error-message-naf").show();
            return false;
        }
        if (la== '' ) {

            $('#libelle_activite2').css('border-color','red');
            $(".error-message-la").show();
            return false;
        }
        if (bl== '' ) {

            $('#montant_actif_passif2').css('border-color','red');
            $(".error-message-bl").show();
            return false;
        }
        if (chiffre== '' ) {
            $('#chiffres_affaires2').css('border-color','red');
            $(".error-message-chiffre").show();
            return false;
        }
        if (chiffre== '' ) {
            $('#chiffres_affaires2').css('border-color','red');
            $(".error-message-chiffre").show();
            return false;
        }
        if (ad== '' ) {
            $('#adress12').css('border-color','red');
            $(".error-message-ad2").show();
            return false;
        }
        if (adr== '' ) {
            $('#adress13').css('border-color','red');
            $(".error-message-ad3").show();
            return false;
        }
        if (cp== '' ) {
            $('#cp2').css('border-color','red');
            $(".error-message-cp").show();
            return false;
        }
        if (phone== '' ) {
            $('#phone2').css('border-color','red');
            $(".error-message-phone").show();
            return false;
        }*/


        /*$.ajax({
            url: "<!?php echo base_url()?>admin.php/artisan/create_artisan",
            type: "POST",
            data: $('#frm-create').serialize(),
            dataType: 'json',
            success: function (data) {
                //alert('succccceeeeeeesss');
                console.log(data)
                $('#modal_confirm').modal('show');
                //alert($('#assurance').val());
                $("#confirm").click(function () {
                    // $('#ancre').show();
                    window.location.reload();
                });
                //window.location.reload();
            },
            error: function () {
                alert('errooooooooooooooooooooooo');
                window.location.reload();

            }
        });
});*/
    });
</script>

<!---script apparait ajout**************
****************************************-->
<script>
    $(document).ready(function() {
        $('#ajout').hide();
        $('#profil_artisan').hide();
        $("#new_ajout").click(function () {
            // $('#ancre').show();
            $('#ajout').toggle(1000);
            $('html,body').animate({scrollTop: $("#ajout").offset().top}, 'slow'      );
        });
    });
</script>

<!--*******************************************script view_ajout*************************************-->
<script>
    /* function appelFonction(dataValue,idCible){
         console.log($(dataValue));
        //console.log($('#'+idCible).val());
         console.log($(idCible).val());


         //var contents = $('#contents').get(0);

        if(idCible == 1){
             $(dataValue).val("OK");
             //var cible=
         }
         else
             $(dataValue).val("yOK");

         //console.log(data);
     }*/
    $(document).on('click', '.voir_artisan', function () {
        var id_artisan =$(this).attr("id");
        $.ajax({
            url:"<?php echo base_url()?>admin.php/artisan/edit_artisan",
            method: "POST",
            data:{id_artisan: id_artisan},
            dataType: "json",
            success:function(data) {
                console.log(data)
                $('#profil_artisan').show(500);
                $('#list_artisan').hide(500);
                $('#id_artisan').val(id_artisan);
                //appelFonction(id_artisan, id_artisan);
                //appelFonction(pres_attestation_immat,'#pres_attestation');
                $('#denomination').val(data.denomination);
                //$('#denomination1').val(data.denomination);
                $('#nom_gerant').val(data.nom_gerant);
                $('#prenom_gerant').val(data.prenom_gerant);
                $('#statut').val(data.statut);
                $('#siren').val(data.siren);
                $('#code_activite').val(data.code_activite);
                $('#libelle_activite').val(data.libelle_activite);
                $('#forme_juridique').val(data.forme_juridique);
                $('#date_immatriculation').val(data.date_immatriculation);
                $('#date_derniere_rcs').val(data.date_derniere_rcs);
                $('#typecategorie_edit').val(data.categorie);
                $('#montant_actif_passif').val(data.montant_actif_passif);
                $('#chiffres_affaires').val(data.chiffres_affaires);
                $('#tranche_effectif1').val(data.tranche_effectif);
                $('#pres_attestation_immat').val(data.pres_attestation_immat);
                //pres_services_fiscaux
                /*if(data.pres_services_fiscaux == 1){
                    $('#pres_services_fiscaux').val("OK");
                }
                else
                    $('#pres_services_fiscaux').val("NOT OK");

 */
                if(data.pres_attestation_immat == 1){
                    $('#pres_attestation_immat').val("OK");
                }
                else
                    $('#pres_attestation_immat').val("NOT OK");

                if(data.pres_kbis == 1){
                    $('#pres_kbis').val("OK");
                }
                else
                    $('#pres_kbis').val("NOT OK");

                if(data.pers_attestation_clandestin == 1){
                    $('#pers_attestation_clandestin').val("OK");
                }
                else
                    $('#pers_attestation_clandestin').val("NOT OK");

                if(data.pres_attestation_assurance == 1){
                    $('#pres_attestation_assurance').val("OK");
                }
                else
                    $('#pres_attestation_assurance').val("NOT OK");

                if(data.pres_attestation_decl_social == 1){
                    $('#pres_attestation_decl_social').val("OK");
                }
                else
                    $('#pres_attestation_decl_social').val("NOT OK");

                if(data.pres_rib == 1){
                    $('#pres_rib').val("OK");
                }
                else
                    $('#pres_rib').val("NOT OK");
                $('#adress11').val(data.adress1);
                $('#adress21').val(data.adress2);
                $('#lieu_dit1').val(data.lieu_dit);
                $('#cp1').val(data.cp);
                $('#ville1').val(data.ville);
                $('#pays1').val(data.pays);
                $('#phone1').val(data.phone);
                $('#cellphone11').val(data.cellphone1);
                $('#cellphone21').val(data.cellphone2);
                $('#fax1').val(data.fax);
                $('#mail1').val(data.mail);
                $('#site_web1').val(data.site_web);

                //type assurance
                $('#nom1').val(data.nom);
                $('#date_deb1').val(data.date_deb);
                $('#date_fin1').val(data.date_fin);
                $('#assureur1').val(data.assureur);
                $('#telephone1').val(data.telephone);



            },
            error:function()
            {
                alert('errooooooooooooooooooooooo');
                window.location.reload();

            }

        });

        // var artisan_id = $(this).attr("id");
        //$('#action').val("edi");

        /* $.ajax({
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
         });*/
    });
</script>
<script>
    $(document).ready(function() {
        $('.hid_ajout').hide();
        $('.show_ajout').show();
        $('.mp').hide();
        $(".error-message").hide();
        $(".bt_ajout").click(function () {
            // $('#ancre').show();
            $('.hid_ajout').show();
            $('.show_ajout').hide();
            $(".error-message").hide();
            /*$('#ajout').toggle(1000);
             $('html,body').animate({scrollTop: $("#ajout").offset().top}, 'slow'      );*/
        });
        /* $(".ak").click(function () {
             // $('#ancre').show();
             $('.show_ajout').hide();
             $('.mp').show();
             /*$('#ajout').toggle(1000);
              $('html,body').animate({scrollTop: $("#ajout").offset().top}, 'slow'      );*/

    });
</script>
<script>
    /*
     <form id="group">
                                            <legend>Groups</legend>
                                            <input type="button" value="Add group" class="add" id="addgroup" />
                                            <input type="button" value="remove group" class="remove" id="removegroup" />
                                        </form>​

    $(document).ready(function() {
        $("#addgroup").click(function() {
            var intId = $("#group div").length + 1;
            var fieldWrapper = $("<div class=\"group\" id=\"group" + intId + "\"/>");
            var fName = $("<input type=\"text\" name=\"nom\" id=\"group"+intId+"\" />");
            fieldWrapper.append(fName).fadeIn('slow');
            $("#group").append(fieldWrapper);
        });
        $("#removegroup").click(function() {
            var intId = $("#group div").length;
            $('#group'+intId).fadeOut('slow').remove();
            $("#group").append(fieldWrapper);
        });
    });

    /*
     <form id="frm" action="">

                                            <div id="cadre" style="margin-left:100px;width:200px">
                                            </div>

                                            <p>
                                                <input type="button" value="ajouter un champ" onclick="plus()" />
                                                <input type="button"  id="sup" value="supprimer un champ" onclick="moins()" />
                                            </p>
                                        </form>
    var c,c2, ch;

     // ajouter un champ avec son "name" propre;
     function plus(){
         c=document.getElementById('cadre');
         c2=c.getElementsByTagName('input');
         ch=document.createElement('input');
         ch.setAttribute('type','text');
         ch.setAttribute('name','ch'+c2.length);
         c.appendChild(ch);
         document.getElementById('sup').style.display='inline';
     }

     // supprimer le dernier champ;
     function moins(){
         if(c2.length>0){c.removeChild(c2[c2.length-1])}
         if(c2.length==0){document.getElementById('sup').style.display='none'};
     }
    /*
    div id="fields">
                                         <input name="champ" type="text" size="10" maxlength="15"><br/>
                                         </div>
                                     <input type="button" value="+" onClick="addField();">
                                         <input type="button" value="-" onClick="supField();">
    function addField(){

         var field = "<input type='text' name='champ' value='' size='10' maxlength='15'/><br/>";
         document.getElementById('fields').innerHTML += field;
     }
     function supField(){
         /*var field = "<input type='text' name='champ' value='' size='10' maxlength='15'/><br/>";
         document.getElementById('fields').innerHTML -= field;*/
    // var field = "<input type='text' name='champ' value='' size='10' maxlength='15'/><br/>";
    /*  var form = document.getElementById("fields");
      form.removeChild(form.lastChild);
      i--;
  }
*/
</script>
<script src="<?php echo base_url() ?>assets/backend/js/sites/artisan/artisan.js"></script>
<script src="<?php echo base_url() ?>assets/backend/js/sites/artisan/select2.js"></script>
<link href="<?php echo base_url() ?>assets/backend/css/art/select2.css" rel="stylesheet"/>


<!--script type="text/javascript">
    $(function(){
        var items="";
        $.getJSON("get-data.php",function(data){
            $.each(data,function(index,item)
            {
                items+="<option value='"+item.id+"'>"+item.name+"</option>";
            });
            $("#a1_title").html(items);
        });
    });
</script-->