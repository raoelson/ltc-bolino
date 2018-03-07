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
                                <?php foreach ($data as $item) { ?>
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
                                            Pays:&nbsp;<?php echo $item->pays; ?><br/>

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

                                                <button class="bt btn btn-primary btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                                    <span class="gly glyphicon glyphicon-trash"></span>&nbsp;&nbsp;</button>
                                                <button class="bt btn  btn-success btn-xs voir_artisan"
                                                        id="<?php echo $item->id_artisan_alias; ?>">
                                                    <span class="gly fa fa-eye"></span>&nbsp;&nbsp;</button>
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
<div id="profil_artisan" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profil Artisan</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                   <!--img  class="mage img-responsive avatar-view" src="<!--?php echo base_url() ?>images/picture.jpg" alt="Avatar" title="Change the avatar"/-->

                                </div>
                            </div>

                            <h3></h3>

                            <!---ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i>
                                    <input type="text" id="adress" name="adress" disabled class="pt1">
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i>
                                    <input type="text" id="activite" name="activite" disabled class="pt1">
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                </li->
                            </ul-->

                            <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />

                            <!-- start skills -->
                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <p>Web Applications</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of skills -->

                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>User Activity Report</h2>

                                </div>
                                <div class="col-md-6">
                                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                        <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                                    </div>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <!--div id="graph_bar" style="width:100%; height:280px;"></div>
                            <!-- end of user-activity-graph -->

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Etat civil</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Adress</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Activité</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Assurance</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                        <div class="x_panel">

                                            <div class="x_content">
                                                <br />
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="first-name">Nom Entreprise <span class="required">*</span>

                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="denomination" name="denomination"  disabled class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nom gerant <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="nom_gerant" name="nom_gerant"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prenom gerant <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="prenom_gerant" name="prenom_gerant"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div style="margin-bottom: 18px;" class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Statut <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <button class="bh btn">
                                                                <input disabled type="text" id="statut" name="statut"  class="pt2">
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Siren <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="siren" name="siren"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Code d'activiter <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="code_activite" name="code_activite"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Libellé d'activité <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="libelle_activite" name="libelle_activite"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Forme juridique <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="forme_juridique" name="forme_juridique"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date d'immatriculation <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="date_immatriculation" name="date_immatriculation"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date du dernier rcs <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="date_derniere_rcs" name="date_derniere_rcs"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Categorie <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="categorie" name="categorie"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Montant actif  passif <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="montant_actif_passif" name="montant_actif_passif"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Chiffre d'affaires <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="chiffres_affaires" name="chiffres_affaires"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tranche effectif <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="tranche_effectif" name="tranche_effectif"  class="pt1 form-control">
                                                        </div>
                                                    </div>

                                                    <!--div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input disabled  class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                                        </div>
                                                    </div-->
                                                    <!--div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div id="gender" class="btn-group" data-toggle="buttons">
                                                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                                                </label>
                                                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                                    <input type="radio" name="gender" value="female"> Female
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div-->
                                                    <!--div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                        </div>
                                                    </div-->
                                                    <div class="ln_solid"></div>

                                                </form>
                                                <?php //$vl=$_Post['statut'];

                                               // $_GET['statut'] == $vl;
                                               // echo $vl;
                                                ?>

                                            </div>
                                        </div>
                                        <!-- end recent activity -->

                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <div class="x_panel">

                                            <div class="x_content">
                                                <br />
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="first-name">Adress de l'Artisan <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="adress1" name="adress1" disabled class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Lieu dit <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="lieu_dit" name="lieu_dit"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Code Postal <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="cp" name="cp"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div style="margin-bottom: 18px;" class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ville <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                                <input disabled type="text" id="ville" name="ville"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pays <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pays" name="pays"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="phone" name="phone"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cellphone 1 <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="cellphone1" name="cellphone1"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cellphone 2 <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="cellphone2" name="cellphone2"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fax<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="fax" name="fax"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mail<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="mail" name="mail"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Site Web<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="site_web" name="site_web"  class="pt1 form-control">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>

                                                </form>
                                                <?php //$vl=$_Post['statut'];

                                                // $_GET['statut'] == $vl;
                                                // echo $vl;
                                                ?>

                                            </div>
                                        </div>

                                        <!-- end user projects -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <div class="x_panel">

                                            <div class="x_content">
                                                <br />
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="first-name">Type Artisan<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="name" disabled class="pt1 form-control">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Prestation attestation d'immatriculation <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pres_attestation_immat" name="pres_attestation_immat"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pres Kbis<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pres_kbis" name="pres_kbis"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div style="margin-bottom: 18px;" class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Attestation Services Fiscaux <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">

                                                            <input disabled type="text" id="pres_services_fiscaux" name="pres_services_fiscaux"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Attestation clandestin <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pers_attestation_clandestin" name="pers_attestation_clandestin"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Attestation Declin Social<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pres_attestation_decl_social" name="pres_attestation_decl_social"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Attestation assurance <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pres_attestation_assurance" name="pres_attestation_assurance"  class="put pt1 ko">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">RIB<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="pres_rib" name="pres_rib"  class="put pt1 ko">
                                                        </div>
                                                    </div>

                                                    <div class="ln_solid"></div>

                                                </form>
                                                <?php //$vl=$_Post[$do];

                                                 //$_GET['statut'] == $vl;
                                               // echo $do;
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">

                                        <!--*****************************type artisan********************************************-->
                                        <div class="panel panel-default">
                                            <div class="panel-body form-horizontal payment-form">
                                                <div class="x_title">
                                                    <h5>Assurance</h5>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <!--***********************************
                                                *******************************type_assurance-->
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-3 control-label">Type assurance</label>
                                                    <div class="col-sm-6">
                                                        <input  placeholder="Type assurance....." type="text" class="form-control" id="nom" name="nom">
                                                    </div>

                                                    <!--div class="col-sm-6">
                                                    <div class="show_ajout">
                                                    <form name="product" onsubmit="SaveProduct(this); return false;">
                                                    <select style="300px;" multiple="multiple" id="assurance" name="nom"   class="form-control"  tabindex="50">

                                                    </select>
                                                    </form>
                                                    </div>
                                                    </div-->


                                                </div>
                                                <!--************************
                                                ****************************-->
                                                <!--type_travaux _assurance-->
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                                                    <div class="col-sm-6">
                                                        <input  placeholder="Type Travaux....." type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                </div>
                                                <!--************************
                                                ****************************-->
                                                <div class="form-group">
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
                                                            </div-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
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
                <form class="form-horizontal" method="post" id="frm-create" >
                    <div class="container">
                    <div class="panel panel-default">
                        <div class="panel-body form-horizontal payment-form">
                            <div class="x_title">
                                <h5>Information sur l'artisan</h5>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <label for="concept" class="col-sm-3 control-label">Nom de l'entreprise</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control"  id="denomination2"  placeholder="Nom entreprise..." name="denomination" required
                                           data-fv-notempty-message="The password is required">
                                </div>
                                <div class="error-message col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Nom du gerant </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nom_gerant2"
                                           placeholder="Nom du gerant..."  name="nom_gerant">
                                </div>
                                <div class="error-message1 col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Prénom du gerant </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="prenom_gerant2" required name="prenom_gerant"
                                            placeholder="Prenom du gerant...">
                                </div>
                                <div class="error-message2 col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
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
                                <div class="error-message-siren col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                                </div>


                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">NAF</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="code_activite2"
                                           required="required" placeholder="NAF...." name="code_activite">
                                </div>
                                <div class="error-message-naf col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Libellé activité</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder=Libellé activité... class="form-control" id="libelle_activite2" name="libelle_activite">
                                </div>
                                <div class="error-message-la col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
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
                                    <input type="date" class="form-control" id="date_immatriculation" name="date_immatriculation" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Date dernière maj RCS</label>
                                <div class="col-sm-6">
                                    <input type="date" class="form-control" id="date_derniere_rcs" name="date_derniere_rcs">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Catégorie</label>
                                <div class="col-sm-6">
                                    <!--input type="text" class="form-control" id="categorie" name="categorie"-->
                                </div>
                                <div class="col-sm-6">
                                    <div class="show_ajout">
                                        <select id="typecategorie" name="categorie"  required="required" class="form-control"  tabindex="50">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <button   data-toggle="modal" data-target="#modal_artisan" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Bilan (actif/passif) en Euro</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Bilan (actif/passif) en Euro..." class="form-control" id="montant_actif_passif2" name="montant_actif_passif">
                                </div>
                                <div class="error-message-bl col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Chiffres d’affaires en Euro</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Chiffres d’affaires en Euro..." class="form-control" id="chiffres_affaires2" name="chiffres_affaires">
                                </div>
                                <div class="error-message-chiffre col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
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
                                        <select style="width:500px;"id="typeartisan" name="namee"  required="required" class="form-control"  tabindex="50">

                                        </select>
                                    </div>

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
                              <div class="error-message-ad2 col-sm-3">
                                  <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
                              </div>
                          </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Suite Adresse</label>
                                <div class="col-sm-6">
                                    <input placeholder="Suite Adresse....." type="text" class="form-control" id="adress13" name="adress2">
                                </div>
                                <div class="error-message-ad3 col-sm-3">
                                    <div class="error"> <span class="fa fa-close" style="font-size:24px;color:white;">&nbsp;</span>Veillez compléter votre texte</div>
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
                                    <select name="pays" class="form-control" id="pays">
                                        <option value="France" selected="selected">France </option>
                                        <option value="Afghanistan">Afghanistan </option>
                                        <option value="Afrique_Centrale">Afrique_Centrale </option>
                                        <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                        <option value="Albanie">Albanie </option>
                                        <option value="Algerie">Algerie </option>
                                        <option value="Allemagne">Allemagne </option>
                                        <option value="Andorre">Andorre </option>
                                        <option value="Angola">Angola </option>
                                        <option value="Anguilla">Anguilla </option>
                                        <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                        <option value="Argentine">Argentine </option>
                                        <option value="Armenie">Armenie </option>
                                        <option value="Australie">Australie </option>
                                        <option value="Autriche">Autriche </option>
                                        <option value="Azerbaidjan">Azerbaidjan </option>

                                        <option value="Bahamas">Bahamas </option>
                                        <option value="Bangladesh">Bangladesh </option>
                                        <option value="Barbade">Barbade </option>
                                        <option value="Bahrein">Bahrein </option>
                                        <option value="Belgique">Belgique </option>
                                        <option value="Belize">Belize </option>
                                        <option value="Benin">Benin </option>
                                        <option value="Bermudes">Bermudes </option>
                                        <option value="Bielorussie">Bielorussie </option>
                                        <option value="Bolivie">Bolivie </option>
                                        <option value="Botswana">Botswana </option>
                                        <option value="Bhoutan">Bhoutan </option>
                                        <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                        <option value="Bresil">Bresil </option>
                                        <option value="Brunei">Brunei </option>
                                        <option value="Bulgarie">Bulgarie </option>
                                        <option value="Burkina_Faso">Burkina_Faso </option>
                                        <option value="Burundi">Burundi </option>

                                        <option value="Caiman">Caiman </option>
                                        <option value="Cambodge">Cambodge </option>
                                        <option value="Cameroun">Cameroun </option>
                                        <option value="Canada">Canada </option>
                                        <option value="Canaries">Canaries </option>
                                        <option value="Cap_vert">Cap_Vert </option>
                                        <option value="Chili">Chili </option>
                                        <option value="Chine">Chine </option>
                                        <option value="Chypre">Chypre </option>
                                        <option value="Colombie">Colombie </option>
                                        <option value="Comores">Colombie </option>
                                        <option value="Congo">Congo </option>
                                        <option value="Congo_democratique">Congo_democratique </option>
                                        <option value="Cook">Cook </option>
                                        <option value="Coree_du_Nord">Coree_du_Nord </option>
                                        <option value="Coree_du_Sud">Coree_du_Sud </option>
                                        <option value="Costa_Rica">Costa_Rica </option>
                                        <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                        <option value="Croatie">Croatie </option>
                                        <option value="Cuba">Cuba </option>

                                        <option value="Danemark">Danemark </option>
                                        <option value="Djibouti">Djibouti </option>
                                        <option value="Dominique">Dominique </option>

                                        <option value="Egypte">Egypte </option>
                                        <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                        <option value="Equateur">Equateur </option>
                                        <option value="Erythree">Erythree </option>
                                        <option value="Espagne">Espagne </option>
                                        <option value="Estonie">Estonie </option>
                                        <option value="Etats_Unis">Etats_Unis </option>
                                        <option value="Ethiopie">Ethiopie </option>

                                        <option value="Falkland">Falkland </option>
                                        <option value="Feroe">Feroe </option>
                                        <option value="Fidji">Fidji </option>
                                        <option value="Finlande">Finlande </option>
                                        <option value="France">France </option>

                                        <option value="Gabon">Gabon </option>
                                        <option value="Gambie">Gambie </option>
                                        <option value="Georgie">Georgie </option>
                                        <option value="Ghana">Ghana </option>
                                        <option value="Gibraltar">Gibraltar </option>
                                        <option value="Grece">Grece </option>
                                        <option value="Grenade">Grenade </option>
                                        <option value="Groenland">Groenland </option>
                                        <option value="Guadeloupe" selected="selected">Guadeloupe </option>
                                        <option value="Guam">Guam </option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernesey">Guernesey </option>
                                        <option value="Guinee">Guinee </option>
                                        <option value="Guinee_Bissau">Guinee_Bissau </option>
                                        <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                        <option value="Guyana">Guyana </option>
                                        <option value="Guyane_Francaise ">Guyane_Francaise </option>

                                        <option value="Haiti">Haiti </option>
                                        <option value="Hawaii">Hawaii </option>
                                        <option value="Honduras">Honduras </option>
                                        <option value="Hong_Kong">Hong_Kong </option>
                                        <option value="Hongrie">Hongrie </option>

                                        <option value="Inde">Inde </option>
                                        <option value="Indonesie">Indonesie </option>
                                        <option value="Iran">Iran </option>
                                        <option value="Iraq">Iraq </option>
                                        <option value="Irlande">Irlande </option>
                                        <option value="Islande">Islande </option>
                                        <option value="Israel">Israel </option>
                                        <option value="Italie">italie </option>

                                        <option value="Jamaique">Jamaique </option>
                                        <option value="Jan Mayen">Jan Mayen </option>
                                        <option value="Japon">Japon </option>
                                        <option value="Jersey">Jersey </option>
                                        <option value="Jordanie">Jordanie </option>

                                        <option value="Kazakhstan">Kazakhstan </option>
                                        <option value="Kenya">Kenya </option>
                                        <option value="Kirghizstan">Kirghizistan </option>
                                        <option value="Kiribati">Kiribati </option>
                                        <option value="Koweit">Koweit </option>

                                        <option value="Laos">Laos </option>
                                        <option value="Lesotho">Lesotho </option>
                                        <option value="Lettonie">Lettonie </option>
                                        <option value="Liban">Liban </option>
                                        <option value="Liberia">Liberia </option>
                                        <option value="Liechtenstein">Liechtenstein </option>
                                        <option value="Lituanie">Lituanie </option>
                                        <option value="Luxembourg">Luxembourg </option>
                                        <option value="Lybie">Lybie </option>

                                        <option value="Macao">Macao </option>
                                        <option value="Macedoine">Macedoine </option>
                                        <option value="Madagascar">Madagascar </option>
                                        <option value="Madère">Madère </option>
                                        <option value="Malaisie">Malaisie </option>
                                        <option value="Malawi">Malawi </option>
                                        <option value="Maldives">Maldives </option>
                                        <option value="Mali">Mali </option>
                                        <option value="Malte">Malte </option>
                                        <option value="Man">Man </option>
                                        <option value="Mariannes du Nord">Mariannes du Nord </option>
                                        <option value="Maroc">Maroc </option>
                                        <option value="Marshall">Marshall </option>
                                        <option value="Martinique">Martinique </option>
                                        <option value="Maurice">Maurice </option>
                                        <option value="Mauritanie">Mauritanie </option>
                                        <option value="Mayotte">Mayotte </option>
                                        <option value="Mexique">Mexique </option>
                                        <option value="Micronesie">Micronesie </option>
                                        <option value="Midway">Midway </option>
                                        <option value="Moldavie">Moldavie </option>
                                        <option value="Monaco">Monaco </option>
                                        <option value="Mongolie">Mongolie </option>
                                        <option value="Montserrat">Montserrat </option>
                                        <option value="Mozambique">Mozambique </option>

                                        <option value="Namibie">Namibie </option>
                                        <option value="Nauru">Nauru </option>
                                        <option value="Nepal">Nepal </option>
                                        <option value="Nicaragua">Nicaragua </option>
                                        <option value="Niger">Niger </option>
                                        <option value="Nigeria">Nigeria </option>
                                        <option value="Niue">Niue </option>
                                        <option value="Norfolk">Norfolk </option>
                                        <option value="Norvege">Norvege </option>
                                        <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                        <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>

                                        <option value="Oman">Oman </option>
                                        <option value="Ouganda">Ouganda </option>
                                        <option value="Ouzbekistan">Ouzbekistan </option>

                                        <option value="Pakistan">Pakistan </option>
                                        <option value="Palau">Palau </option>
                                        <option value="Palestine">Palestine </option>
                                        <option value="Panama">Panama </option>
                                        <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                        <option value="Paraguay">Paraguay </option>
                                        <option value="Pays_Bas">Pays_Bas </option>
                                        <option value="Perou">Perou </option>
                                        <option value="Philippines">Philippines </option>
                                        <option value="Pologne">Pologne </option>
                                        <option value="Polynesie">Polynesie </option>
                                        <option value="Porto_Rico">Porto_Rico </option>
                                        <option value="Portugal">Portugal </option>

                                        <option value="Qatar">Qatar </option>

                                        <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                        <option value="Republique_Tcheque">Republique_Tcheque </option>
                                        <option value="Reunion">Reunion </option>
                                        <option value="Roumanie">Roumanie </option>
                                        <option value="Royaume_Uni">Royaume_Uni </option>
                                        <option value="Russie">Russie </option>
                                        <option value="Rwanda">Rwanda </option>

                                        <option value="Sahara Occidental">Sahara Occidental </option>
                                        <option value="Sainte_Lucie">Sainte_Lucie </option>
                                        <option value="Saint_Marin">Saint_Marin </option>
                                        <option value="Salomon">Salomon </option>
                                        <option value="Salvador">Salvador </option>
                                        <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                        <option value="Samoa_Americaine">Samoa_Americaine </option>
                                        <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                        <option value="Senegal">Senegal </option>
                                        <option value="Seychelles">Seychelles </option>
                                        <option value="Sierra Leone">Sierra Leone </option>
                                        <option value="Singapour">Singapour </option>
                                        <option value="Slovaquie">Slovaquie </option>
                                        <option value="Slovenie">Slovenie</option>
                                        <option value="Somalie">Somalie </option>
                                        <option value="Soudan">Soudan </option>
                                        <option value="Sri_Lanka">Sri_Lanka </option>
                                        <option value="Suede">Suede </option>
                                        <option value="Suisse">Suisse </option>
                                        <option value="Surinam">Surinam </option>
                                        <option value="Swaziland">Swaziland </option>
                                        <option value="Syrie">Syrie </option>

                                        <option value="Tadjikistan">Tadjikistan </option>
                                        <option value="Taiwan">Taiwan </option>
                                        <option value="Tonga">Tonga </option>
                                        <option value="Tanzanie">Tanzanie </option>
                                        <option value="Tchad">Tchad </option>
                                        <option value="Thailande">Thailande </option>
                                        <option value="Tibet">Tibet </option>
                                        <option value="Timor_Oriental">Timor_Oriental </option>
                                        <option value="Togo">Togo </option>
                                        <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                        <option value="Tristan da cunha">Tristan de cuncha </option>
                                        <option value="Tunisie">Tunisie </option>
                                        <option value="Turkmenistan">Turmenistan </option>
                                        <option value="Turquie">Turquie </option>

                                        <option value="Ukraine">Ukraine </option>
                                        <option value="Uruguay">Uruguay </option>

                                        <option value="Vanuatu">Vanuatu </option>
                                        <option value="Vatican">Vatican </option>
                                        <option value="Venezuela">Venezuela </option>
                                        <option value="Vierges_Americaines">Vierges_Americaines </option>
                                        <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                        <option value="Vietnam">Vietnam </option>

                                        <option value="Wake">Wake </option>
                                        <option value="Wallis et Futuma">Wallis et Futuma </option>

                                        <option value="Yemen">Yemen </option>
                                        <option value="Yougoslavie">Yougoslavie </option>

                                        <option value="Zambie">Zambie </option>
                                        <option value="Zimbabwe">Zimbabwe </option>

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Ville</label>
                                <div class="col-sm-6">
                                    <select name="ville" id="ville" class="form-control"  tabindex="50" ><br />
                                        <option value="Anse-Bertrand">Anse-Bertrand</option>
                                        <option value="Baie-Mahaut">Baie-Mahaut </option>
                                        <option value="Baillif">Baillif </option>
                                        <option value="Basse-Terre">Basse-Terre </option>
                                        <option value="Bouillante">Bouillante</option>
                                        <option value="Capesterre-Belle-Eau">Capesterre-Belle-Eau </option>
                                        <option value="Capesterre-de-Marie-Galante">Capesterre-de-Marie-Galante</option>
                                        <option value="Deshaies">Deshaies </option>
                                        <option value="La Désirade">La Désirade </option>
                                        <option value="Le Gosier">Le Gosier </option>
                                        <option value="Gourbeyre">Gourbeyre</option>
                                        <option value="Goyave">Goyave </option>
                                        <option value="Grand-Bourg">Grand-Bourg </option>
                                        <option value="Lamentin">Lamentin </option>
                                        <option value="Morne-à-l'Eau">Morne-à-l'Eau</option>
                                        <option value="Le Moule">Le Moule </option>
                                        <option value="Petit-Bourg">Petit-Bourg </option>
                                        <option value="Petit-Canal">Petit-Canal </option>
                                        <option value="Pointe-à-Pitre ">Pointe-à-Pitre </option>
                                        <option value="Pointe-Noire">Pointe-Noire </option>
                                        <option value="Port-Louis">Port-Louis </option>
                                        <option value="Saint-Claude">Saint-Claude </option>
                                        <option value="Saint-François">Saint-François </option>
                                        <option value="Saint-Louis">Saint-Louis </option>
                                        <option value="Sainte-Anne">Sainte-Anne </option>
                                        <option value="Sainte-Rose">Sainte-Rose </option>
                                        <option value="Terre-de-Bas">Terre-de-Bas </option>
                                        <option value="Terre-de-Haut">Terre-de-Haut </option>
                                        <option value="Trois-Rivières">Trois-Rivières </option>
                                        <option value="Vieux-Fort">Vieux-Fort </option>
                                        <option value="Vieux-Habitants">Vieux-Habitants </option>
                                        </optgroup>
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
                                    <h5>Assurance</h5>
                                    <div class="clearfix"></div>
                                </div>
                                <!--***********************************
                               *******************************type_assurance-->
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Type assurance</label>
                                    <!--div class="col-sm-6">
                                        <input  placeholder="Type assurance....." type="text" class="form-control" id="nom" name="nom">
                                    </div-->

                                    <div class="col-sm-6">
                                        <div class="show_ajout">

                                            <select style="width:500px;" multiple="multiple" id="assurance" name="nom"   class="form-control"  tabindex="50">
                                                </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button  data-title="Delete" data-toggle="modal" data-target="#modal_assurance" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                                    </div>

                                </div>
                                <!--************************
                                ****************************-->
                                <!--type_travaux _assurance-->
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                                    <!--div class="col-sm-6">
                                        <input  placeholder="Type Travaux....." type="text" class="form-control" id="name" name="name">
                                    </div-->
                                    <div class="col-sm-6">
                                        <div class="show_ajout">
                                            <form name="product" >
                                                <select style="width:500px;" multiple="multiple" id="travaux" name="name"   class="form-control"  tabindex="50">

                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <button  data-title="Delete" data-toggle="modal" data-target="#modal_travaux" class="ak"><span class="fa fa-plus"></span>&nbsp;Ajout</button>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                                    <div class="col-sm-6">
                                        <input  placeholder="Type Travaux....." type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div-->
                                <!--************************
                                ****************************-->
                                <div class="form-group">
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
                                        </div-->
                                    </div>
                                </div>
                            </div>
                        </div>
                          <!--*****************************Document nécessaire sur l'artisan********************************************-->

                            <div class="form-group">
                                <div class="col-sm-12 text-right">
                                    <button id="btn-create" type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Enregistrer</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Effacer</button>

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

        $("#btn-create").on('click',function () {
           /* $('#it_home_form').submit(function (event) {
                event.preventDefault();*/
            var denomination = $('#denomination2').val();
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


            if (denomination== '' && prenom_gerant== '' && nom_gerant== '' && siren== '' && code== '' && la== '' && bl== ''&& ad=='') {
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
            }


                $.ajax({
                    url: "<?php echo base_url()?>admin.php/artisan/create_artisan",
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
        });
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
               $('#categorie').val(data.categorie);
               $('#montant_actif_passif').val(data.montant_actif_passif);
               $('#chiffres_affaires').val(data.chiffres_affaires);
               $('#tranche_effectif').val(data.tranche_effectif);
               //$('#pres_attestation_immat').val(data.pres_attestation_immat);
               //pres_services_fiscaux
               if(data.pres_services_fiscaux == 1){
                   $('#pres_services_fiscaux').val("OK");
               }
               else
                   $('#pres_services_fiscaux').val("NOT OK");


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
               $('#adress1').val(data.adress1);
               $('#adress2').val(data.adress2);
               $('#lieu_dit').val(data.lieu_dit);
               $('#cp').val(data.cp);
               $('#ville').val(data.ville);
               $('#pays').val(data.pays);
               $('#cellphone1').val(data.cellphone1);
               $('#cellphone2').val(data.cellphone2);
               $('#fax').val(data.fax);
               $('#site_web').val(data.site_web);
               //appelFonction(id_artisan, id_artisan);
               //appelFonction(pres_attestation_immat,pres_attestation_immat);
               /*$('#pres_services_fiscaux').val(data.pres_services_fiscaux);
               $('#pres_kbis').val(data.pres_kbis);
               $('#pers_attestation_clandestin').val(data.pers_attestation_clandestin);
               $('#pres_attestation_assurance').val(data.pres_attestation_assurance);
               $('#pres_attestation_decl_social').val(data.pres_attestation_decl_social);
               $('#pres_rib').val(data.pres_rib);*/




              // $('input[name="id_artisan"]').val(data.id_artisan);
              //$('input[name=nom_gerant]').val(data.nom_gerant);

               //alert(data);
               // fetch_data();
               //$('#qsm_form')[0].reset();
               //$('#qsmModal').modal("hide");
               //$('.up').val(onClick="window.location.reload()");
               //location.reload();
               // window.location.reload();
               //return false;



              // $('#nos_contact_Modal').modal("show");
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