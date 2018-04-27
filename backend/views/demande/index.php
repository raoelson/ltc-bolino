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
	              <!-- <th>Action</th> -->

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
	                <td><?php echo $val['montant_devis'].' €'; ?></td>
	                <td>
	                    <?php
	                        $aide = $val['montant_devis'];
	                        echo ($aide > 10500 ? 10500 : $aide.' €');
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
	                <!-- <td><a href="<?php  echo base_url('admin.php/demande/modification/'.$val['demandeid']) ?>" id="modifier" title="Voir les détails"
	                class="btn btn-round btn-default"><span class="gly fa fa-edit"></span></a></td> -->


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


<!-- <select onchange="select_userFunction()" name="clientid" id="clientid"  >

		 <?php foreach ($data_client['client'] as $val){ ?>
				 <option value="<?php echo $val['id']; ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['id']; ?></option>

		 <?php } ?>


</select>

<input type="text" name="testtest"  id="testid" size="50"> -->





<input type="hidden" name="nombreDevis" value="1"/>
<input type="hidden" name="nombreTravaux" value="1">

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

                     <select class="form-control col-md-7 col-xs-12" name="nom" id="nomProp" placeholder="Le Nom du Propriétaire" >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['firstname1']; ?>" ><?php echo $val['firstname1']; ?></option>
                          <?php } ?>

                     </select>

                  </div>
                  <div
                      class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                      <button id="nouveau" class="btn btn-success" style="width: 100%" type="button"><a href="http://localhost/www/ltc/admin.php/clients" style="color: white;">Ajouter un nouveau propriétaire</a></button>
                  </div>
              </div>

              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="nommariProp">Nom marital<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <select class="form-control col-md-7 col-xs-12" name="nommari" id="nommariProp"  >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['marriedname']; ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['marriedname']; ?></option>
                          <?php } ?>

                     </select>

                  </div>
              </div>

              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12"
                         for="prenomProp">Prénom<span class="required">*</span>
                     </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                     <select class="form-control col-md-7 col-xs-12" name="prenom" id="prenomProp" >

                          <?php foreach ($data_client['client'] as $val){ ?>
                              <option value="<?php echo $val['firstname2']; ?>" class="<?php echo $val['firstname1']; ?>"><?php echo $val['firstname2']; ?></option>
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

								<div id="div_travaux">

									<div class="item form-group">
										<h3 class="control-label col-md-6 col-sm-6 col-xs-12">Devis 1</h3>
									</div>

									<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"
														 for="name">Travaux<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 col-xs-12">
													<select id="typetrav1" name ="travaux_name1[]" class="travaux_select1 form-control" multiple style="width: 100%;">
														<?php
															if (unserialize($data_log['typetravaux'])[0] == 1)
																echo '
																	<optgroup label="Pose ou réfection des sanitaires">
																		<option value="1">Sanitaires non adaptés</option>
																		<option value="2">Équipements obsolètes</option>
																		<option value="3">Équipements cassés</option>
																	</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[1] == 1)
																echo '
																	<optgroup label="Aménagement et équipement de base d\'une cuisine">
																		<option value="4">Évier cassé ou détérioré</option>
																		<option value="5">Absence de placard ou placards cassés sous évier</option>
																		<option value="6">Cuisine non adaptée</option>
																	</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[2] == 1)
																echo '
																<optgroup label="Installation de fosse septique">
																	<option value="7">Absence de fosse septique ou fosse septique obsolète</option>
																	<option value="8">Absence de raccordement au réseau AEP</option>
																	<option value="9">Absence de raccordement au réseau EU</option>
																	<option value="10">Absence de raccordement au réseau électrique</option>
																</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[3] == 1)
																echo '
																	<optgroup label="Travaux de réalisation et de réfection de l\'installation électrique">
																		<option value="11">Installation électrique obsolète et non conforme</option>
																		<option value="12">Absence d\'installation électrique</option>
																		<option value="13">Absence de raccordement au réseau électrique</option>
																	</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[4] == 1)
																echo '
																	<optgroup label="Travaux d\'étanchéité et de réfection de la charpente couverture">
																		<option value="14">Tôles percées et/ou corrodées</option>
																		<option value="15">Infiltration en toiture</option>
																		<option value="16">Présence de nuisibles sous toiture</option>
																		<option value="17">Bois de charpente abîmé ou pourri</option>
																		<option value="18">Bois de charpente attaqué par les termites</option>
																		<option value="19">Présence de termites </option>
																		<option value="20">Toiture dalle béton non protégée</option>
																		<option value="21">Système de récupération des eaux de toiture défectueux</option>
																		<option value="22">Éclatement béton et fissures en sous face de  dalle</option>
																		<option value="23">Foisonnement d\'acier et acier apparent en sous face de dalle</option>
																		<option value="24">Présence de traces d\'humidité sur murs et plafond</option>
																		<option value="25">Absence de faux plafond et d\'isolant sous tôle</option>
																	</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[5] == 1)
																echo '
																	<optgroup label="Pose de menuiseries et cloisonnement intérieur">
																		<option value="26">Portes intérieures et extérieures abîmées ou absentes ou défectueuses</option>
																		<option value="27">Portes bois intérieures et extérieures attaquées par les termites</option>
																		<option value="28">Menuiseries extérieures abîmées</option>
																		<option value="29">Menuiseries bois attaquées par les termites</option>
																		<option value="30">Absence de menuiseries ou menuiseries non sécurisées</option>
																		<option value="31">Cloisons séparatives entre pièces insuffisantes et/ou déterriorées</option>
																	</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[6] == 1) echo '
																<optgroup label="Revêtement de sol et mur">
																	<option value="32">Revêtement de sol  détériore</option>
																	<option value="33">Déformation du sol et/ou présence de seuil et/ou mauvaise planéité</option>
																	<option value="34">Façades extérieures non enduites et non protégées par les intempéries</option>
																	<option value="35">Éclatement béton et fissures en façades </option>
																	<option value="36">Présence de sol brut absence de revêtement de sol</option>
																	<option value="37">Murs intérieurs bruts non peints</option>
																	<option value="38">Murs intérieures des pièces humides sans protection </option>
																</optgroup>';
														?>
														<?php
															if (unserialize($data_log['typetravaux'])[7] == 1)
																echo '
																	<optgroup label="Travaux d\'accessibilité PMR et de sécurité">
																		<option value="39">Présence de seuils et de marches dans les maisons (intérieurs et extérieurs)</option>
																		<option value="40">Absence de garde-corps ou garde-corps détériorés</option>
																		<option value="41">Garde corps abîmés</option>
																	</optgroup>';
														?>
													</select>
											</div>

									</div>

										<div class="item form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12"
															 for="montantDevisPrincipal">Montant du travaux<span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
														<!-- <input id="montantTravaux1" class="form-control col-md-7 col-xs-12"
																	 name="montantTravaux1" placeholder="" required="required"
																	 type="text"> -->
															<select id="montantTravaux1" name ="montantTravaux1[]" class="montant_select1 form-control" multiple style="width: 100%;">
															</select>
												</div>
										</div>

								</div>


                   <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                 for="name">Type de l'artisan
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="nameArt1" name="nameArt1" class=" form-control" style="width: 100%">
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
                              <select id="nomArt1" name="nomArt1" class="form-control" style="width: 100%">
                                <?php foreach ($arti as $art){?>
                                  <option value="<?php echo $art->id_artisan_alias; ?>" class="<?php echo  $art->type_artisan_id ;?>"> <?php echo $art->nom_gerant; ?> </option>
                                <?php } ?>
                              </select>
                          </div>

													<div
															class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
															<button id="nouveau" class="btn btn-success" style="width: 100%" type="button"><a href="http://localhost/www/ltc/admin.php/artisan" style="color: white;">Ajouter un nouvel artisan</a></button>
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
                                  <input id="file" name="fileTest1" type="file" disabled="">
                          </div>
                      </div>

                  </div>

              </div>

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
<!-- <link href="<?php echo base_url('assets/backend/css/demande/bootstrap-select.min.css');?>" rel="stylesheet" > -->
<link href="<?php echo base_url('assets/backend/css/demande/chosen.css');?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/prism.css');?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/jquery.inputfile.css');?>" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script src="<?php echo base_url('assets/backend/js/demande/bootstrap-select.min.js');?>"></script> -->
<script src="<?php echo base_url('assets/backend/js/sites/demande/demande.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.proto.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/site.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/notify.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.inputfile.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.chained.js');?>"></script>

<script>

	$(document).ready(function() {
		$('.travaux_select1').select2();
		$('.montant_select1').select2({
			tags: true
		});

		//Seléctionne
		$('#montantTravaux1').on("select2:select", function(e){
			somme = 0;
			valeur = $(this).val();
			taille = $('#montantTravaux1 option').size();
			for (var i = 0; i < taille; i++) {
				somme += parseFloat(valeur[i]);
			}

			$('#montantDevis1').val(somme);
			$('input[name^="montantDevis"]').trigger('change');

		});


		//Desélectionne
		$('#montantTravaux1').on("select2:unselect", function(e){
			somme2 = 0;
			valeur2 = $(this).val();
			taille2 = ($('#montantTravaux1 option').size()) - 1;
			for (var j = 0; j < taille2; j++) {
				somme2 += parseFloat(valeur2[j]);
			}

			$('#montantDevis1').val(somme2);
			$('input[name^="montantDevis"]').trigger('change');
		});

	});
</script>


<script>
var id_user="";//porter variable (azo ampiasaina fona)

    function select_userFunction() {
        var id_select = document.getElementById("clientid").value;
				var val = document.getElementById("testid").value;
        id_user =id_select

        console.log(id_select);
				console.log(val);
				// alert(val);
        //console.log(id_user);
         //document.getElementById("id_user").innerHTML = "" + x;
    }
$(document).on('change', '#clientid', function() {

					$.ajax({
							url:"<?php echo base_url()?>admin.php/demande/edit_demande",
							method: "POST",
							data:{id_user: id_user},
							dataType: "json",
							success:function(data)
							{

									$('#testid').val(data.name);


							},
							error:function()
							{
									alert('errueroooooooooo');
									window.location.reload();
							}
					});
			});
</script>

<!-- <script>
	var max = $('#typetrav option').size();
	console.log(max);

	var tailletrav = 0;
	// var max = 2;
	var z = 1;
	var wrapper1 = $("#div_travaux");
	$('#AfficheTrav').click(function(e){
		e.preventDefault();

		var data2 = "";
		if (z < max){
			tailletrav = z++;

			data2 += '<div class="item form-group">';
			data2 += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Travaux</label>';
			data2 += '<div class="col-md-6 col-sm-6 col-xs-12">';
			data2 += '<select id="typetrav'+(z)+'" name ="travaux_name'+(z)+'" class=" form-control"  >';
			data2 += '<?php if (unserialize($data_log['typetravaux'])[0] == 1) echo '<optgroup label="Pose ou réfection des sanitaires"><option value="1">Sanitaires non adaptés</option> <option value="2">Équipements obsolètes</option> <option value="3">Équipements cassés</option> </optgroup>'; ?>';
			data2 += '</select>';
			data2 += '</div>';
			data2 += '</div>';
			data2 += '<div class="item form-group">';
			data2 += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="montantDevisPrincipal">Montant du travaux<span class="required">*</span> </label>';
			data2 += '<div class="col-md-6 col-sm-6 col-xs-12">';
			data2 += '<input id="montantTravaux'+(z)+'" class="form-control col-md-7 col-xs-12" name="montantTravaux'+(z)+'" placeholder="" required="required" type="text">';
			data2 += '</div>';
			data2 += '</div>';
			$(wrapper1).append(data2);
		}
		$('input[name="nombreTravaux"]').val(tailletrav+1);
	});
</script> -->



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
			data += '<h3 class="control-label col-md-6 col-sm-6 col-xs-12">Devis '+(x)+'</h3>';
			data += '</div>';
			data += '<div class="item form-group">';
			data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Travaux<span class="required">*</span></label>';
			data += '<div class="col-md-6 col-sm-6 col-xs-12">';
			data += '<select id ="typetrav'+(x)+'" name="travaux_name'+(x)+'[]" class="travaux_select'+(x)+' form-control" multiple="multiple" style ="width:100%">';
			data += '<?php if (unserialize($data_log['typetravaux'])[0] == 1) echo '<optgroup label="Pose ou réfection des sanitaires"><option value="1">Sanitaires non adaptés</option> <option value="2">Équipements obsolètes</option> <option value="3">Équipements cassés</option> </optgroup>'; ?>';
			data += '<?php if (unserialize($data_log['typetravaux'])[1] == 1) echo '<optgroup label="Aménagement et équipement de base d\'une cuisine"><option value="4">Évier cassé ou détérioré</option><option value="5">Absence de placard ou placards cassés sous évier</option><option value="6">Cuisine non adaptée</option></optgroup>';?>';
			data += '<?php if (unserialize($data_log['typetravaux'])[2] == 1) echo '<optgroup label="Installation de fosse septique"><option value="7">Absence de fosse septique ou fosse septique obsolète</option><option value="8">Absence de raccordement au réseau AEP</option><option value="9">Absence de raccordement au réseau EU</option><option value="10">Absence de raccordement au réseau électrique</option></optgroup>';?>';
			data += '<?php if (unserialize($data_log['typetravaux'])[3] == 1) echo '<optgroup label="Travaux de réalisation et de réfection de linstallation électrique"><option value="11">Installation électrique obsolète et non conforme</option><option value="12">Absence dinstallation électrique</option><option value="13">Absence de raccordement au réseau électrique</option></optgroup>';?>';
			// data += '<?php
			// 	if (unserialize($data_log['typetravaux'])[4] == 1)
			// 		echo '
			// 			<optgroup label="Travaux d\'étanchéité et de réfection de la charpente couverture">
			// 				<option value="14">Tôles percées et/ou corrodées</option>
			// 				<option value="15">Infiltration en toiture</option>
			// 				<option value="16">Présence de nuisibles sous toiture</option>
			// 				<option value="17">Bois de charpente abîmé ou pourri</option>
			// 				<option value="18">Bois de charpente attaqué par les termites</option>
			// 				<option value="19">Présence de termites </option>
			// 				<option value="20">Toiture dalle béton non protégée</option>
			// 				<option value="21">Système de récupération des eaux de toiture défectueux</option>
			// 				<option value="22">Éclatement béton et fissures en sous face de  dalle</option>
			// 				<option value="23">Foisonnement d\'acier et acier apparent en sous face de dalle</option>
			// 				<option value="24">Présence de traces d\'humidité sur murs et plafond</option>
			// 				<option value="25">Absence de faux plafond et d\'isolant sous tôle</option>
			// 			</optgroup>';
			// ?>';
			data += '<?php
				if (unserialize($data_log['typetravaux'])[5] == 1)
					echo '
						<optgroup label="Pose de menuiseries et cloisonnement intérieur">
							<option value="26">Portes intérieures et extérieures abîmées ou absentes ou défectueuses</option>
							<option value="27">Portes bois intérieures et extérieures attaquées par les termites</option>
							<option value="28">Menuiseries extérieures abîmées</option>
							<option value="29">Menuiseries bois attaquées par les termites</option>
							<option value="30">Absence de menuiseries ou menuiseries non sécurisées</option>
							<option value="31">Cloisons séparatives entre pièces insuffisantes et/ou déterriorées</option>
						</optgroup>';
			?>';
			data += '<?php
				if (unserialize($data_log['typetravaux'])[6] == 1) echo '
					<optgroup label="Revêtement de sol et mur">
						<option value="32">Revêtement de sol  détériore</option>
						<option value="33">Déformation du sol et/ou présence de seuil et/ou mauvaise planéité</option>
						<option value="34">Façades extérieures non enduites et non protégées par les intempéries</option>
						<option value="35">Éclatement béton et fissures en façades </option>
						<option value="36">Présence de sol brut absence de revêtement de sol</option>
						<option value="37">Murs intérieurs bruts non peints</option>
						<option value="38">Murs intérieures des pièces humides sans protection </option>
					</optgroup>';
			?>';
			data += '<?php
				if (unserialize($data_log['typetravaux'])[7] == 1)
					echo '
						<optgroup label="Travaux d\'accessibilité PMR et de sécurité">
							<option value="39">Présence de seuils et de marches dans les maisons (intérieurs et extérieurs)</option>
							<option value="40">Absence de garde-corps ou garde-corps détériorés</option>
							<option value="41">Garde corps abîmés</option>
						</optgroup>';
			?>';
			data += '</select>';
			data += '</div>';
			data += '</div>';
			data += '<div class="item form-group">';
			data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Montant du travaux<span class="required">*</span></label>';
			data += '<div class="col-md-6 col-sm-6 col-xs-12">';
			data += '<select id="montantTravaux'+(x)+'" name ="montantTravaux'+(x)+'[]" class="montant_select'+(x)+' form-control" multiple style="width: 100%;">';
			data += '</select>';
			data += '</div>';
			data += '</div>';
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

      $('input[name^="montantDevis'+(x)+'"]').change(function(e) {
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

			$('.travaux_select'+(x)+'').select2();
			$('.montant_select'+(x)+'').select2({
				tags: true
			});

			$('#montantTravaux'+(x)+'').on("select2:select", function(e){
				somme = 0;
				valeur = $(this).val();
				taille = $('#montantTravaux'+(x)+' option').size();
				for (var i = 0; i < taille; i++) {
					somme += parseFloat(valeur[i]);
				}

				$('#montantDevis'+(x)+'').val(somme);
				$('input[name^="montantDevis"]').trigger('change');

			});

			$('#montantTravaux'+(x)+'').on("select2:unselect", function(e){
				somme2 = 0;
				valeur2 = $(this).val();
				taille2 = ($('#montantTravaux'+(x)+' option').size()) - 1;
				for (var j = 0; j < taille2; j++) {
					somme2 += parseFloat(valeur2[j]);
				}

				$('#montantDevis'+(x)+'').val(somme2);
				$('input[name^="montantDevis"]').trigger('change');

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


$('input[name^="montantDevis"]').change(function() {
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
			// $("#prenomProp").chained('#nommariProp');
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
