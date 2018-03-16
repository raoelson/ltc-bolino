<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div class="title_right" style="float: right;">
			<div
				class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
				<button  id="nouveau" class="btn btn-success" style="width: 100%" type="button">Nouveau</button>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listes des Demandes</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
                                <th>N°</th>
                                <th>N° Dossier</th>
                                <th>Titre</th>
                                <th>Propriétaire</th>
                                <th>Adresse Postale</th>
                                <th>Artisan</th>
                                <th>Type de l'artisan</th>
                                <th>Type des travaux</th>
								<th>Date d'arrivée</th>
								<th>Montant du devis</th>
								<th>Montant de l'aide</th>
                                <th>Statut</th>
                                <th>Action</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['demande'] as $val ) { ?>
								<tr>

                                    <td><?php echo $val['demandeid']; ?></td>
                                    <td><?php echo $val['num_dossier_valide']; ?></td>
                                    <td><?php echo $val['title']; ?></td>
                                    <td><?php echo $val['firstname1']; ?></td>
                                    <td><?php echo $val['adress1']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php if ($val['type_travaux_finan'] != "") echo $val['type_travaux_finan']; else echo '-'; ?></td>
                                    <td><?php echo $val['date_arrivee']; ?></td>
                                    <td><?php echo $val['montant_devis']; ?></td>
                                    <td>

                                        <?php 
                                            $aide = $val['montant_devis'];
                                            echo ($aide > 10500 ? 10500 : $aide); 
                                        ?>

                                    </td>
                                    <td>
                                        <!--affichage en cours-->
                                        <?php
                                        $value = $val['statut'];
                                        $validee = "Validée";
                                        $refusee = "Refusée";
                                        if($value==$validee)
                                        {
                                            ?>
                                            <button class="badge bg-green ">
                                                <?php echo $validee;?>
                                            </button>
                                            <?php
                                        }
                                        else if($value==$refusee)
                                        {
                                            ?>
                                            <button class="badge bg-red">
                                                <?php echo $refusee;?>
                                            </button>
                                            <?php
                                        }
                                            ?>

                                    </td>
                                    <td><a href="<?php  echo base_url('admin.php/demande/details/'.$val['demandeid']) ?>" id="modifier" title="Voir les détails"
                                    class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a></td>

									
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <div id="ajout">
            <form class="form-horizontal form-label-left" novalidate
        action="<?php echo base_url('admin.php/demande_saves');?>"
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
                                   for="name">Nom<span class="required">*</span>
                               </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                               <select class="form-control col-md-7 col-xs-12" name="nom" id="nomProp" data-placeholder="Le Nom du Propriétaire" >
                                    <option></option>
                                    <?php foreach ($data_client['client'] as $val){ ?>
                                        <option value="<?php echo $val['firstname1'] ?>" ><?php echo $val['firstname1']; ?></option>
                                    <?php } ?>

                               </select>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Informations du dossier</h5>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Date d'arrivée <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="date_arrivee" class="form-control col-md-7 col-xs-12"
                                       name="date_arrivee" placeholder="" required="required"
                                       type="date">
                            </div>
                        </div>

                        <div class="item form-group" id="div_nom_artisan">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Statut
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="statut" name="statut" class="form-control">
                                    <option value="Validée">Validée</option>
                                    <option value="Refusée">Refusée</option>

                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">N° Dossier
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="num_dossier_valide" class="form-control col-md-7 col-xs-12"
                                       name="num_dossier_valide" placeholder="Seulement si la demande est validée"
                                        type="text">
                            </div>
                        </div>

                    </div>
                </div>

               

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Informations sur la demande de devis</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Artisan
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p style="margin-top: 9px !important">
                                    Oui: <input type="radio" class="flat" name="art" value="1">
                                    Non: <input type="radio" class="flat" name="art" value="0" checked="" required>
                                </p>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom de l'artisan
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" id="nomArt" class="flat" name="nomArt" type="text" >
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Type des travaux
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="nameArt" name="nameArt" class="form-control">
                                    <option value="">Travaux 1</option>
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Détail de devis du propriétaire
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <p style="margin-top: 9px !important"><input id="detail_devis" class="flat" name="detail_devis" type="checkbox" ></p>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Devis du propriétaire
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn_activ btn btn-info">
                                    <input id="file" name="fileTest" type="file" multiple disabled="">
                                </div>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Montant du devis <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="montant_devis" class="form-control col-md-7 col-xs-12"
                                       name="montant_devis" placeholder="" required="required"
                                       type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="type_trav">Type des travaux
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="type_trav" class="form-control col-md-7 col-xs-12"
                                       name="type_trav" placeholder="" required="required"
                                       type="text">
                            </div>
                        </div>



                        <div class="item form-group" id="div_nom_artisan">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom de l'artisan
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="nameArt" name="nameArt" class="form-control">
                                    <option value="Paul">Paul</option>
                                    <option value="Tony">Tony</option>
                                    <option value="Eric">Eric</option>
                                    <option value="Ga">Ga</option>
                                    <option value="Gold">Gold</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
                        
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <center>
                <div class="col-md-6 col-md-offset-3">
                    <button type="reset" class="btn btn-primary">Effacer</button>
                    <button id="send" type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </center>
        </div>

    </form>
    </div>


	<br />

</div>


<link href="<?php echo base_url('assets/backend/css/demande/chosen.css')?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/prism.css')?>" rel="stylesheet"/>

<script src="<?php echo base_url('assets/backend/js/demande/chosen.proto.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/site.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/sites/demande/demande.js')?>"></script>







