<div id="list_artisan">
<div class="col-md-12 text-right">
    <button href="#ajou" id="new_ajout" type="button" class="btn-success btn_ko btn btn-sm  btn-create">Nouveau</button>
</div>
<div class="row tile_count"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Listes des Artisans</h2>
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
                                        <td><?php echo $item->name; ?></td>
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
                                   <img  class="mage img-responsive avatar-view" src="<?php echo base_url() ?>images/picture.jpg" alt="Avatar" title="Change the avatar"/>

                                </div>
                            </div>

                            <h3>Samuel Doe</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-external-link user-profile-icon"></i>
                                    <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                                </li>
                            </ul>

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
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
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
                                                            <input type="text" id="denomination" name="denomination" disabled class="pt1 form-control">

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
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Statut <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input disabled type="text" id="statut" name="statut"  class="pt1 form-control">
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
                                                    <div class="form-group">
                                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input disabled  class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
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
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="ln_solid"></div>

                                                </form>
                                            </div>
                                        </div>
                                        <!-- end recent activity -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Name</th>
                                                <th>Client Company</th>
                                                <th class="hidden-phone">Hours Spent</th>
                                                <th>Contribution</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>New Company Takeover Review</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">18</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>New Partner Contracts Consultanci</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">13</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Partners and Inverstors report</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">30</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>New Company Takeover Review</td>
                                                <td>Deveint Inc</td>
                                                <td class="hidden-phone">28</td>
                                                <td class="vertical-align-mid">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                                            photo booth letterpress, commodo enim craft beer mlkshk </p>
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
                                    <input type="text" class="form-control" id="denomination" name="denomination">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Nom du gerant </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="nom_gerant"
                                           placeholder="Nom du gerant..." required="required" name="nom_gerant">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-3 control-label">Prénom du gerant </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="prenom_gerant" name="prenom_gerant">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="col-sm-3 control-label">Status</label>
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
                                    <input type="text" class="form-control" id="siren" name="siren">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">NAF</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="code_activite" name="code_activite">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Libellé activité</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="libelle_activite" name="libelle_activite">
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
                                    <input type="text" class="form-control" id="categorie" name="categorie">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">Bilan (actif/passif) en Euro</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="montant_actif_passif" name="montant_actif_passif">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Chiffres d’affaires en Euro</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="chiffres_affaires" name="chiffres_affaires">
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
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Type Artisan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="name" name="name">

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
                              <h5>Adress artisan</h5>
                              <div class="clearfix"></div>
                          </div>
                          <div class="form-group">
                              <label for="date" class="col-sm-3 control-label"> Adress1</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" id="adress1" name="adress1">
                              </div>
                          </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Adress2</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="adress2" name="adress2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> lieu_dit</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="lieu_dit" name="lieu_dit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Code Postal</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cp" name="cp">
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
                                <label for="date" class="col-sm-3 control-label"> Pays</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="pays" name="pays">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Phone</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Celluire Phone 1</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cellphone1" name="cellphone1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Celluire Phone 2</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="cellphone2" name="cellphone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label">  Fax</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="fax" name="fax">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Mail</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="mail" name="mail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-3 control-label"> Site_web</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="site_web" name="site_web">
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
                                <!--***********************************
                                *******************************type_assurance-->
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Type_assurance</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nom" name="nom">
                                    </div>
                                </div>
                                <!--************************
                                ****************************-->
                                <!--type_travaux _assurance-->
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Type Travaux</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <!--************************
                                ****************************-->

                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Assureur</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="assureur" name="assureur">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="col-sm-3 control-label">Contact de l'assureur</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="telephone" name="telephone">
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
                <h4>Ajout d'un artisan terminer</h4>

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
                   //alert('succccceeeeeeesss');
                    $('#modal_confirm').modal('show');
                    $("#confirm").click(function () {
                        // $('#ancre').show();
                        window.location.reload();
                    });
                    //window.location.reload();

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
               $('#denomination').val(data.denomination);
               $('#nom_gerant').val(data.nom_gerant);
               //$('#adress1').val(data.adress1);
               //$('#phone').val(data.phone);


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
        <script src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients.js"></script>