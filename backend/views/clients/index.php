<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div class="title_right" style="float: right;">
			<div
				class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
				<a href="#ancre" id="nouveau" class="btn btn-success"
					style="width: 100%" type="button">Nouveau</a>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Liste des Propriétaires</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Civilité</th>								
								<th>Nom de naissance</th>
								<th>Nom marital</th>
								<th>Prénom</th>
								<th>Adresse1</th>
								<th>Adresse2</th>
								<th>Ville</th>
								<th>Etat</th>
								<th>Logement du propriétaire<br/>(Maison à rénover)</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($data['clients'] as $val){ ?>
						<tr id="<?php echo ($val['clientid']) ;?>">
								<td><?php echo ($val['indentite']) ;?></td>
								<td><?php echo ($val['clientNom']) ;?></td>
								<td><?php echo ($val['nommarie']) ;?></td>
								<td><?php echo ($val['clientPrenom']) ;?></td>
								<td><?php echo ($val['adresseAdresse1']) ;?></td>
								<td><?php if($val['adresseAdresse2'] != "") echo ($val['adresseAdresse2']); else echo "-" ;?></td>									
								<td><?php echo ($val['adresseVille']) ;?></td>							
								<td><?php
									$titre  = 'title="Assigner à un logement"';
									$disabled_ = "";
									$etat = "badge bg-green";
									$textEtat = "Activé";
								 if($val['clientEtat'] == 0) {
								 	$etat = "badge bg-orange";
								 	$textEtat = "désactivé";
								 	$titre  = 'title="Veuillez activez ce propriétaire après vous assignerez à un logement"';
									$disabled_ = "disabled=true";
								 	}?>
									<a href="#" ><span class="<?php echo $etat;?>"><?php echo $textEtat;?></span></a>
								</td>
								
								<td>
									<a href="<?php  echo base_url('admin.php/logements/index/'.$val['clientid']) ?>" <?php echo $disabled_; echo $titre;?>
									class="btn btn-round btn-default"><span class="gly fa fa-plus"></span></a>
								</td>
								<td>
									<a href="<?php  echo base_url('admin.php/clients/details/'.$val['clientid']) ?>" id="modifier" title="Voir les détails"
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
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/clients_saves');?>"
		method="post">
		<input type="hidden" name="nombreVivantfoyer" value="0" />
		<div class="row" id="ancre" style="display: none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Etat civil des propriétaires</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Civilité<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important">
									Madame: <input type="radio" class="flat" name="indentite" id=""
										value="Madame" checked="true" required /> &nbsp;Mademoiselle: <input
										type="radio" class="flat" name="indentite" id="" value="Mademoiselle" />
									&nbsp;Monsieur: <input type="radio" class="flat"
										name="indentite" id="" value="Monsieur" />
								</p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom marital </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="marriedname" class="form-control col-md-7 col-xs-12"
									type="text" name="marriedname" placeholder="Nom marital...">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom de naissance<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname1" class="form-control col-md-7 col-xs-12"
									name="firstname1" placeholder="Nom de naissance..."
									required="required" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12"
									name="firstname2" placeholder="Prénom..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Autre nom d'usage </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname3" class="form-control col-md-7 col-xs-12"
									name="firstname3" placeholder="Autre nom d'usage..."
									type="text">
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Date de naissance<span class="required" id="addclass"
								>*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
<!-- 								<input id="birthday" class="form-control col-md-7 col-xs-12" -->
<!-- 									name="birthday" required="required" type="text"> -->
			                     <input type="text" class="form-control col-md-7 col-xs-1" name="birthday" id="single_cal01" placeholder="Date de naissance..." >
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu de naissance<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthplace" class="form-control col-md-7 col-xs-12"
									name="birthplace" placeholder="Lieu de naissance ..."
									type="text" required="required">
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Situation familiale
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="familysituation" name="familysituation" class="form-control col-md-7 col-xs-12">
									<option value="Célibataire">Célibataire</option>
									<option value="Marié(e)">Marié(e)</option>
									<option value="Séparé(e)">Séparé(e)</option>
									<option value=">Divorcé(e)">Divorcé(e)</option>
									<option value="Veuf(ve)">Veuf(ve)</option>
									<option value="Vie Maritale">Vie Maritale</option>
								
								</select>
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Aide organisme
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important">
									Non: <input type="radio" class="flat" name="aide_organisme"
										id="aide_organismeNon" value="0" checked="" required /> Oui: <input
										type="radio" class="flat" name="aide_organisme"
										id="aide_organismeOui" value="1" />
								</p>
							</div>
						</div>
						<div class="item form-group" id="div_nom_organisme"
							style="display: none; height: 40px !important;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom organisme<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nom_organisme"
									class="form-control col-md-7 col-xs-12" name="nom_organisme"
									placeholder="Nom organisme ..." type="text">
							</div>
						</div>
						<div class="item form-group" id="div_montant_aide"
							style="display: none; height: 40px !important;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Montant de l'aide<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="montant_aide" class="form-control col-md-7 col-xs-12"
									name="montant_aide" placeholder="Montant de l'aide ..."
									type="text">
							</div>
						</div>
						<div class="item form-group" id="div_type_travaux" style="display: none;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type des travaux
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea  name="type_travaux_finan" id="type_travaux_finan" rows="4" class="form-control col-md-7 col-xs-12" > 
								</textarea>
							</div>
						</div>
					</div>
				</div>
			</div> 
			 <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur l’adresse du propriétaire</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse 1 <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="adresse1" class="form-control col-md-7 col-xs-12"
									name="adresse1" placeholder="Adresse 1..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse 2 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="adresse2" class="form-control col-md-7 col-xs-12"
									name="adresse2" placeholder="Adresse 2..." 
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu-dit 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lieu_dit" class="form-control col-md-7 col-xs-12"
									name="lieu_dit" placeholder="Lieu-dit..." 
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Pays<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								
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
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Code Postal <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cp" class="form-control col-md-7 col-xs-12" name="cp"
									placeholder="Code postal ..." required="required" type="text" />
							</div>
						</div>
						
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Email<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="mail" class="form-control col-md-7 col-xs-12"
									name="mail" placeholder="Email ..." type="email" required="true">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Tél<span class="required" id="addclass" >*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="phone" class="form-control col-md-7 col-xs-12"
									name="phone" placeholder="Téléphone ..." type="text" required="true">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Céllulaire<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cellphone1" class="form-control col-md-7 col-xs-12"
									name="cellphone1" placeholder="Céllulaire ..." type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Fax<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="fax" class="form-control col-md-7 col-xs-12"
									name="fax" placeholder="Fax ..." type="text">
							</div>
						</div>
						
					</div>
				</div>
			</div> 
			
			<div class="row" id="ancre">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur les revenus du propriétaire</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">	
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Salaire et Rénumération</th>
								<th>Allocation Familiales</th>
								<th>Autres préstations familiales</th>
								<th>A.A.H</th>
								<th>ASSEDIC</th>
								<th>R.S.A</th>
								<th>Retraite</th>
								<th>Pension Alimentaire</th>
								<th>Autres</th>
								<th>Montant Total</th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<div class="item form-group">		
								  	<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Salaire et Rénumération"/>		
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Salaire et Rénumération..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Allocation Familiales"/>			
									<input id="" class="form-control col-md-7 col-xs-12"									
										name="montantRessoucesDemandeur[]" placeholder="Allocation Familiales..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres préstations familiales"/>					
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres préstations familiales..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="A.A.H"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="A.A.H..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="ASSEDIC"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="ASSEDIC..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="R.S.A"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="R.S.A..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Retraite"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Retraite..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Pension Alimentaire"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Pension Alimentaire..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres..."
										 type="text" value="0.0">									
								</div>
							</td>
							<td>
								<div class="item form-group">											
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantSommeRessoucesDemandeur" placeholder="Montant Total..."
										 type="text" value="0.0" disabled="disabled">									
								</div>
							</td>
						</tr>
						</tbody>
						</table>																																			 						
					</div>
				</div>
			</div>					
		</div>
		
		
<!-- 		---------------------parenté -->
		<div class="col-md-12 col-sm-12 col-xs-12" id="parentRessourceDiv" style="display: none;">
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur les parentés et les revenus du ressources</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="divRessources">
												
					</div>
				</div>

			</div>
<!-- ------------fin -->
		
		
		<div class="form-group" >
					<div class="col-md-11 col-sm-12 col-xs-12 " style="margin-left: 16px;">
						<a href="#" id="nouveau" 
							 type="button" style="float: right;">MONTANT TOTAL POUR LES PERSONNES VIVANTS DANS LE FOYER  : <b><span id="totalFoyer"> 0.0 € </span></b> </a>
					</div>
				</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<center>
				<div class="col-md-6 col-md-offset-3">
					<button id="AffichePersonnes" type="button" class="btn btn-round btn-success"><span class="fa fa-plus-square-o"></span>&nbsp; AJOUTER DES PERSONNES VIVANT DANS VOTRE FOYER</button>

				</div>
			</center>
		</div>
			<div class="ln_solid"></div>
				<div class="form-group">
					<center>
						<div class="col-md-6 col-md-offset-3">
							<button type="reset" class="btn btn-primary"><span class="gly fa fa-remove"></span>&nbsp;Effacer</button>
							<button id="send" type="submit" class="btn btn-success"><span class="gly fa fa-save"></span>&nbsp;Enregistrer</button>
						</div>
					</center>
				</div>
				
          </div>
          
			<!-- 			-------------------------------------------------------------------------------- -->
			
				
	</form>
	<br />

</div>
<script src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients.js"></script>
	