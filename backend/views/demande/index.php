<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
<div class="page-title">
	<div class="title_right" style="float: right;">
		<div
			class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
			<button  id="nouveau" class="btn btn-success" style="width: 100%" type="button">Ajouter</button>
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
	              <th>N° Dossier</th>
	              <th>Date d'arrivée</th>
	              <th>Titre</th>
	              <th>Nom de naissance</th>
	              <th>Nom marital</th>
	              <th>Prénom</th>
	              <th>Adresse Postale</th>
	              <!-- <th>Type des travaux</th> -->
	              <th>Devis</th>
								<th>Montant total des devis</th>
								<th>Montant de l'aide</th>
	              <th>Statut</th>
	              <th>Action</th>

						</tr>
					</thead>
					<tbody>
						<?php foreach ($data['demande'] as $val ) { ?>
							<tr>

	                <td><?php echo $val['num_dossier_valide']; ?></td>
	                <td><?php echo $val['date_arrivee']; ?></td>
	                <td><?php echo $val['title']; ?></td>
	                <td><?php echo $val['firstname1'] ?></td>
	                <td><?php echo $val['marriedname']; ?></td>
	                <td><?php echo $val['firstname2']; ?></td>
	                <td><?php echo $val['adress1']; ?></td>
	                <!-- <td><?php if ($val['type_travaux_finan'] != "") echo $val['type_travaux_finan']; else echo '-'; ?></td> -->
	                <td><a href="<?php  echo base_url('admin.php/demande/devis/'.$val['demandeid']) ?>" class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a></td>
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
	                    $encours = "En cours";
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
	                    else if($value==$encours)
	                    {
	                        ?>
	                        <button class="badge bg-blue">
	                            <?php echo $encours ?>
	                        </button>
	                        <?php
	                    }
	                        ?>

	                </td>
	                <td><a href="<?php  echo base_url('admin.php/demande/modification/'.$val['demandeid']) ?>" id="modifier" title="Voir les détails"
	                class="btn btn-round btn-default"><span class="gly fa fa-edit"></span></a></td>


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
enctype="multipart/form-data"
method="post" >

<select class="" name="">
	<option value="[object Object]"></option>
	<option value="" hidden>test</option>
	<option value="" id="test2" >test2</option>
</select>

<select  name="clientid" id="clientid"  >

		 <?php foreach ($data_client['client'] as $val){ ?>
				 <option value="<?php echo $val['id'] ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['id']; ?></option>
		 <?php } ?>

</select>


<input type="hidden" name="nombreDevis" value="1"/>
<div class="row" id="ancre">
  <div class="col-md-12 col-sm-12 col-xs-12">

      <div class="x_panel">
          <div class="x_title">
              <h5>Propriétaire</h5>
          </div>

          <div class="x_content">
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Nom de naissance<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <select class="form-control col-md-7 col-xs-12" name="nom" id="nomProp" data-placeholder="Le Nom du Propriétaire" >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['firstname1'] ?>" ><?php echo $val['firstname1']; ?></option>
                          <?php } ?>

                     </select>

                  </div>
                  <div
                      class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                      <button id="nouveau" class="btn btn-success" style="width: 100%" type="button"><a href="http://localhost/ltc-botino/admin.php/clients" style="color: white;">Ajouter un nouveau propriétaire</a></button>
                  </div>
              </div>

              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Nom marital<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <select class="form-control col-md-7 col-xs-12" name="nommari" id="nommariProp" data-placeholder="Le Nom du Propriétaire" >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['marriedname'] ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['marriedname']; ?></option>
                          <?php } ?>

                     </select>

                  </div>
              </div>

              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Prénom<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <select class="form-control col-md-7 col-xs-12" name="prenom" id="prenomProp" data-placeholder="Le Nom du Propriétaire" >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['firstname2'] ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['firstname2']; ?></option>
                          <?php } ?>

                     </select>

                  </div>
              </div>

          </div>

      </div>

      <div class="x_panel">
          <div class="x_title">
              <h5>Informations de la demande</h5>
              <div class="clearfix"></div>
          </div>

          <div class="x_content">

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Date d'arrivée <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="date_arrivee" class="form-control col-md-7 col-xs-12 dateCalendrier"
                             name="date_arrivee" placeholder="" required="required"
                             type="text">
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Statut
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="statut" name="statut" class="form-control">
                          <option value="En cours" selected="">En cours</option>
                          <option value="Validée">Validée</option>
                          <option value="Refusée" >Refusée</option>

                      </select>
                  </div>
              </div>

              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">N° Dossier<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="num_dossier_valide" class="form-control col-md-7 col-xs-12" name="num_dossier_valide"  type="text" required="">
                  </div>
              </div>

          </div>
      </div>

			<div class="x_panel">
				<div class="x_title">
					<h5>Types de travaux</h5>
				</div>
				<div class="x_content">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"
							for="name" style="margin-top: 122px! important;">Nature des travaux à effectuer <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<p style="margin-top: 9px !important">
							<span  name="nature_travaux_0" <?php if (unserialize($data_log['typetravaux'])[0] == 0 ) echo 'hidden' ; ?>>-Pose ou réfection des sanitaires(WC,lavabo,douche)</span><br>
							<span name="nature_travaux_1" <?php if (unserialize($data_log['typetravaux'])[1] == 0 ) echo 'hidden' ; ?>>-L'aménagement et l'équipement des bases d'une cuisine pour les logements qui en sont dépouvus(évier,menuisier sous évier)</span><br>
							<span name="nature_travaux_2" <?php if (unserialize($data_log['typetravaux'])[2] == 0 ) echo 'hidden' ; ?> >-L'installation de fosse septique(dans le cas ou le raccordement aux réseaux publics ne serait pas envisageable) Les raccordements aux réseaux d'adduction d'eau potable(AEP),d'eaux usées(EU) et électrique</span><br>
							<span name="nature_travaux_3" <?php if (unserialize($data_log['typetravaux'])[3] == 0 ) echo 'hidden' ; ?>>-Les travaux de réalisation et de réfection de l'installation électrique</span><br>
							<span name="nature_travaux_4" <?php if (unserialize($data_log['typetravaux'])[4] == 0 ) echo 'hidden' ; ?> >-Les travaux d'étanchéité et de réfection de la charpente couverte</span><br>
							<span name="nature_travaux_5" <?php if (unserialize($data_log['typetravaux'])[5] == 0 ) echo 'hidden' ; ?>>-La pose de portes et fenêtre et la mise en sécurité de l'habitat</span><br>
							<span name="nature_travaux_6" <?php if (unserialize($data_log['typetravaux'])[6] == 0 ) echo 'hidden' ; ?> >-Les revêtements du sol et de murs(carrelage, peinture extérieure, enduisage intérieur) justifiés par la rfection du bâti</span><br>
							<span name="nature_travaux_7" <?php if (unserialize($data_log['typetravaux'])[7] == 0 ) echo 'hidden' ; ?>>-Les travaux d'accesssibilité et d'adaption du logment au profit des personnes âgées, handicapées ou à mobilité réduite, si ces travaux ne peuvent être pris en compte au titre des dispositifs dédiés</span>
						</div>
					</div>
				</div>
			</div>



      <div class="x_panel">
          <div class="x_title">
              <h5>Informations des devis</h5>
              <div class="clearfix"></div>
          </div>
          <div class="x_content">

							<!--radio bouton oui ou non artisan-->
              <!-- <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Artisan
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <p style="margin-top: 9px !important">
                          Oui: <input type="radio" class="flat" name="art" value="1"  checked="" required>
                          Non: <input type="radio" class="flat" name="art" value="0">
                      </p>
                  </div>
              </div> -->

              <div id="div_oui_artisan">

                   <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Type de l'artisan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="nameArt1" name="nameArt1" class="form-control">
                                  <?php foreach ($type_art as $trav ){ ?>
                                      <option value="<?php echo $trav->id ?>"><?php echo $trav->namee; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                      </div>

                  <div id="div_devis">
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Nom de l'artisan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="nomArt1" name="nomArt1" class="form-control">
                                <?php foreach ($arti as $art){?>
                                  <option value="<?php echo $art->id_artisan_alias; ?>" class="<?php echo  $art->type_artisan_id ;?>"> <?php echo $art->nom_gerant; ?> </option>
                                <?php } ?>
                              </select>
                          </div>
                      </div>

											<div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Type de travaux
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="TT1" name="TT1" class=" js-example-basic-multiple " multiple="multiple" style="width: 100%">
																<option value="" <?php if (unserialize($data_log['typetravaux'])[0] == 0 ) echo 'hidden' ; ?>>Pose ou réfection des sanitaires(WC,lavabo,douche)</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[1] == 0 ) echo 'hidden' ; ?>>L'aménagement et l'équipement des bases d'une cuisine pour les logements qui en sont dépouvus(évier,menuisier sous évier)</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[2] == 0 ) echo 'hidden' ; ?>>L'installation de fosse septique(dans le cas ou le raccordement aux réseaux publics ne serait pas envisageable) Les raccordements aux réseaux d'adduction d'eau potable(AEP),d'eaux usées(EU) et électrique</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[3] == 0 ) echo 'hidden' ; ?>>Les travaux de réalisation et de réfection de l'installation électrique</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[4] == 0 ) echo 'hidden' ; ?>>Les travaux d'étanchéité et de réfection de la charpente couverte</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[5] == 0 ) echo 'hidden' ; ?>>La pose de portes et fenêtre et la mise en sécurité de l'habitat</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[6] == 0 ) echo 'hidden' ; ?> >Les revêtements du sol et de murs(carrelage, peinture extérieure, enduisage intérieur) justifiés par la rfection du bâti</option>
																<option value="" <?php if (unserialize($data_log['typetravaux'])[7] == 0 ) echo 'hidden' ; ?>>Les travaux d'accesssibilité et d'adaption du logment au profit des personnes âgées, handicapées ou à mobilité réduite, si ces travaux ne peuvent être pris en compte au titre des dispositifs dédiés</option>
                              </select>
                          </div>
                      </div>




                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">N° du Devis<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="num_devis1" class="form-control col-md-7 col-xs-12" name="num_devis1" type="text" required="">
                          </div>
                      </div>

                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Date du Devis <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="date_devis1" class="form-control col-md-7 col-xs-12 dateCalendrier" name="date_devis1" required="required"
                                     type="text">
                          </div>
                      </div>

                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="montantDevisPrincipal">Montant du devis <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="montantDevis1" class="form-control col-md-7 col-xs-12"
                                     name="montantDevis1" placeholder="" required="required"
                                     type="text">
                          </div>
                      </div>

                      <input type="hidden" name="montantTotalDevisPrincipal">

                      <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="name">Statut du devis <span class="required">*</span>
                      </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="statutDevis1">
                                  <option value="En cours" selected="">En cours</option>
                                  <option value="Validé">Validé</option>
                                  <option value="Refusé">Refusé</option>
                              </select>
                          </div>
                      </div>

                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">
                              Détail du devis
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <p style="margin-top: 9px !important">
                                  <label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis" id="oui" value="oui" >
                                  <label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis" id="non" value="non" checked="">
                              </p>
                          </div>
                      </div>

                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Devis de l'artisan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <!--<div class="btn_activ btn btn-info">-->
                                  <input id="file" name="fileTest1" type="file" disabled="">
                              <!--</div>-->
                          </div>
                      </div>

                  </div>

              </div>



              <!-- <div id="div_non_artisan" style="display: none; height: 40px !important;">
                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="typeArt">Type de l'artisan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="typeArt" name="typeArt" class="form-control">
                              <?php foreach ($typeart as $type){?>
                                  <option> <?php echo $type->name; ?> </option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>



                  <div class="item form-group" id="div_nom_artisan">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="name">Nom de l'artisan
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="nameArt" name="nameArt" class="form-control">
                            <?php foreach ($arti as $art){?>
                              <option> <?php echo $art->nom_gerant; ?> </option>
                            <?php } ?>
                          </select>
                      </div>
                  </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="name">Montant du devis <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="montant_devis_art" class="form-control col-md-7 col-xs-12"
                                 name="montant_devis_art" placeholder="" required="required"
                                 type="text">
                      </div>
                  </div>


                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Détail de devis de l'artisan
                      </label>

                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <p style="margin-top: 9px !important">
                              <label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis_art" id="oui" value="oui" >
                              <label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis_art" id="non" value="non" checked="">
                          </p>
                      </div>
                  </div>

                  <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"
                             for="name">Devis de l'artisan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="btn_activ btn btn-info">
                              <input id="file_art" name="fileTest" type="file" multiple disabled="">
                          </div>
                      </div>
                  </div>

              </div> -->

          </div>

      </div>

       <div class="x_panel" id="div_garantie" style="display: none; height: 40px !important;">
          <div class="x_title">
              <h5>Garantie du propriétaire</h5>
          </div>

          <div class="x_content" >
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="name">Fichier de la garantie<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <input type="file" name="file">

                  </div>
              </div>
          </div>

      </div>

      <div class="form-group" >
          <div class="col-md-11 col-sm-12 col-xs-12 " style="margin-left: 16px;">
              <a href="#" id="montantTotal" type="button" style="float: right;">MONTANT TOTAL DES DEVIS:
                  <b><span id="totalDevis"> 0.0 € </span></b>
              </a>
          </div>
          <input type="hidden" name="valeurDevis" id="valeurDevis">
      </div>

          <div class="ln_solid"></div>
              <div class="form-group">
                  <center>
                      <div class="col-md-6 col-md-offset-3">
                          <button id="AfficheArti" type="button" class="btn btn-round btn-success"><span class="fa fa-plus-square-o"></span>&nbsp; AJOUTER UN AUTRE DEVIS</button>

                      </div>
                  </center>
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url('assets/backend/css/demande/chosen.css')?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/prism.css')?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/jquery.inputfile.css')?>" rel="stylesheet"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/backend/js/sites/demande/demande.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.proto.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/site.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/notify.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.inputfile.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.chained.js')?>"></script>

<script>
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
</script>
<script>


var tailleTable = 0;
var max_fields = 10; // maximum input boxes allowed
var wrapper = $("#div_devis"); // Fields wrapper
var x = 1;
$('#AfficheArti').click(function(e){
  e.preventDefault();
  $('#div_devis').show();

  var data = "";
  if(x < max_fields) { //max input box allowed
      tailleTable = x++;
      data += '<div class="ln_solid"></div> ';

      data += '<div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="name">Type de l\'artisan</label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += '<select id="nameArt'+(x)+'" name="nameArt'+(x)+'" class="form-control">';
      //$.each(data__, function( index, value ) {
        data += '<?php foreach($type_art as $trav){?><option value="<?php echo $trav->id ?>"><?php echo $trav->namee;  ?></option> <?php } ?>';
      //});
      data += '</select>';
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom de l\'artisan </label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
     // data += '<input class="form-control col-md-7 col-xs-12" id="nomArt'+(x)+'" class="flat" name="nomArt'+(x)+'" type="text">';
      data += '<select id="nomArt'+(x)+'" name="nomArt'+(x)+'" class="form-control">';
       //$.each(data2__, function(key, value ) {
        data += '<?php foreach($arti as $art){?><option value="<?php echo $art->id_artisan_alias ; ?>" class="<?php echo $art->type_artisan_id ; ?>"><?php echo $art->nom_gerant; ?></option><?php } ?>';
      //});
      data += '</select>'
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">N° du Devis<span class="required">*</span></label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += '<input id="num_devis'+(x)+'" class="form-control col-md-7 col-xs-12" name="num_devis'+(x)+'" type="text" required="">';
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date du Devis <span class="required">*</span> </label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += ' <input id="date_devis'+(x)+'" class="form-control col-md-7 col-xs-12 dateCalendrier" name="date_devis'+(x)+'" required="required" type="text">';
      data +='</div>';
      data+= '</div>';
      data += ' <div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Montant du devis <span class="required">*</span>';
      data += '</label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += '<input id="montantDevis'+(x)+'" class="form-control col-md-7 col-xs-12" name="montantDevis'+(x)+'" placeholder="" required="required" type="text">';
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" >Statut du devis</label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += '<select id="statutDevis'+(x)+'" name="statutDevis'+(x)+'" class="form-control">';
      data += '<option value="En cours">En cours</option>';
      data += '<option value="Validé">Validé</option>';
      data += '<option value="Refusé">Refusé</option>';
      data += '</select>';
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += ' <label class="control-label col-md-3 col-sm-3 col-xs-12">Détail du devis';
      data += '</label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += ' <p style="margin-top: 9px !important">';
      data += '<label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis_art'+(x)+'" id="oui" value="oui" >';
      data += '<label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis_art'+(x)+'" id="non" value="non" checked="">';
      data += '</p>';
      data += '</div>';
      data += '</div>';
      data += '<div class="item form-group">';
      data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Devis de l\'artisan';
      data += '</label>';
      data += '<div class="col-md-6 col-sm-6 col-xs-12">';
      data += '<input id="file_art'+(x)+'" name="fileTest'+(x)+'" type="file"  disabled="">';
      data += '<input type="hidden" name="montantDev'+(x)+'">'
      data += '</div>';
      data += '</div>';
      data += '<input type="hidden" name="montantTotalDevis'+(x)+'">';
      $(wrapper).append(data);

      $('input[name^="montantDevis'+(x)+'"]').keyup(function(e) {
          e.preventDefault();
          var sommeDevis = 0;
          //var valeur = 0;

          $('input[name^="montantDevis'+(x)+'"]').each(function() {
              if($(this).val() == "")
                  return;
              //valeur = $(this).val();
              //$('input[name="montantDev'+(x)+'"]').val(valeur);
              sommeDevis += parseFloat(($(this).val()));
          });

          $('input[name="montantTotalDevis'+(x)+'"]').val(sommeDevis);
             SommeDevisFunct();
      });


      $('input[name="fileTest'+(x)+'"]').inputfile({
				uploadText: '<span class="glyphicon glyphicon-upload"></span> Choisir un fichier',
				removeText: '<span class="glyphicon glyphicon-trash"></span>',
				restoreText: '<span class="glyphicon glyphicon-remove"></span>',

				uploadButtonClass: 'btn btn-primary',
				removeButtonClass: 'btn btn-default',

				removeName: '',
				removeValue: 1,

				dontRemove: false,

				fileNameOnly: true

      });

       $(function(){
          $('#nomArt'+(x)+'').chained('#nameArt'+(x)+'');
      });


      function testDate (){
          var date = new Date();
          date.setDate(date.getDate() - 1);
          var datereturn = date.getDate()  + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear()
          return (datereturn);
      }

      $(function() {
          $('.dateCalendrier').daterangepicker({
              singleDatePicker: true,
              singleClasses: "picker_4",
              startDate: testDate(),
              maxDate:  testDate() ,
              locale: {
                  format: 'DD/MM/YYYY'
              }
          },
          function(start, end, label) {

          });


      });

      $('input.flat').iCheck({
          checkboxClass : 'icheckbox_flat-green',
          radioClass : 'iradio_flat-green'
      });

      $("ins.iCheck-helper").click(function() {

          //SI RADIO --DETAIL DEVIS ARTISAN--
          var etatCheck = $(this).prev('input[name = "detail_devis_art'+(x)+'"]').val();
          if(etatCheck == "oui"){
              $('#file_art'+(x)+'').removeAttr("disabled");
          }else if(etatCheck == "non"){
              $('#file_art'+(x)+'').attr('disabled', 'disabled');
          }
      });
  }
  $('input[name="nombreDevis"]').val(tailleTable+1);

});


$('input[name^="montantDevis"]').keyup(function() {
  var sommeDevisPrincipal = 0;
  $('input[name^="montantDevis1"]').each(function() {
      if($(this).val() == "")
          return;
      sommeDevisPrincipal += parseFloat(($(this).val()));
  });
  $('input[name="montantTotalDevisPrincipal"]').val(sommeDevisPrincipal);
   SommeDevisFunct();
});

SommeDevisFunct = function(){
  var SommeTableDevis = 0;
  for(i=1;i<=tailleTable;i++){
      SommeTableDevis += (parseFloat( $('input[name="montantTotalDevis'+(i+1)+'"]').val()));
  }
  var sommeGeneral = SommeTableDevis+parseFloat($('input[name="montantTotalDevisPrincipal"]').val());
  $('#totalDevis').text(sommeGeneral + " € ");
  $('#valeurDevis').val(sommeGeneral);

  if(sommeGeneral > 10500){
      $('#totalDevis').text(sommeGeneral + " € ").css('color', 'red');
      //alert('LE MONTANT TOTAL DES DEVIS: '+sommeGeneral+'€ EST AU DESSUS DE LA LIMITE QUI EST A 10700€');
      $('#montantTotal').notify("Le montat total des devis excède la limite prévue qui est à 10500€. Veuillez insérer ci-dessus, le fichier qui garantisse que vous allez payer la somme excédant, sinon veuillez diminiuer le montant des devis",
          {position:"left"},

      );
      $('#div_garantie').toggle();
      $('#div_garantie').removeAttr("style");
      //$.notify("Le montat total des devis excède la limite prévue qui est à 10500€.\n Veuillez insérer ci-dessous, \n le fichier qui garantisse que vous allez payer la somme excédant, sinon veuillez diminiuer le montant des devis");

  }
  else{
      $('#totalDevis').text(sommeGeneral + " € ").css('color', 'grey');
      $('#montantTotal').notify("Montant acceptable", "success");
      $('#div_garantie').hide();

  }
}

</script>
<script>

  $(function(){
			$("#clientid").chained("#nomProp");
      $("#prenomProp").chained("#nomProp");
      $("#nommariProp").chained("#nomProp");
      $("#nomArt1").chained("#nameArt1");
  });
  function testDate (){
          var date = new Date();
          date.setDate(date.getDate() - 1);
          var datereturn = date.getDate()  + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear()
          return (datereturn);
      }

  $(function() {
      $('.dateCalendrier').daterangepicker({
          singleDatePicker: true,
          singleClasses: "picker_4",
          startDate: testDate(),
          maxDate:  testDate() ,
          locale: {
              format: 'DD/MM/YYYY'
          }
      },
      function(start, end, label) {

      });


  });



</script>
