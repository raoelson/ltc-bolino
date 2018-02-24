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
					<h2>Listes des Propriétaires</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Indentité</th>
								<th>Situation</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Nom Organisme</th>
								<th>Montant à aider</th>
								<th>Type des travaux</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($data as $val){ ?>
						<tr id="<?php echo ($val['id']) ;?>">
								<td><?php echo ($val['title']) ;?></td>
								<td><?php echo ($val['familysituation']) ;?></td>
								<td><?php echo ($val['firstname1']) ;?></td>
								<td><?php echo ($val['firstname2']) ;?></td>
								<td><?php if($val['nom_organisme'] != "") echo ($val['nom_organisme']); else echo "-" ;?></td>
								<td><?php echo ($val['montant_aide']) ;?></td>
								<td><?php if($val['type_travaux_finan'] != "") echo ($val['type_travaux_finan']) ; else echo "-";?></td>
								
								<td>
									<a href="<?php  echo base_url('admin.php/clients/details/'.$val['id']) ?>" id="modifier"
									class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a>

									<!-- <a href="#" id="supprimer"
									class="btn btn-round btn-danger"><span class="gly fa fa-trash"></span></a> -->	
															
									<!-- <a href="#ancre" id="modifier"
									class="btn btn-round btn-warning">Modifier</a>  -->
									<!-- <a href="#"
									id="supprimer" class="btn btn-round btn-danger">Supprimer</a></td> -->
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
						<h5>Informations personelles</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Indentité <span class="required">*</span>
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
								for="name">Nom martial </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="marriedname" class="form-control col-md-7 col-xs-12"
									type="text" name="marriedname" placeholder="Nom martial...">
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
								for="name">Montant à aider<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="montant_aide" class="form-control col-md-7 col-xs-12"
									name="montant_aide" placeholder="Montant à aider ..."
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
						<h5>Informations adresses</h5>
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
								for="name">Adresse 2 <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="adresse2" class="form-control col-md-7 col-xs-12"
									name="adresse2" placeholder="Adresse 2..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieudit <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lieu_dit" class="form-control col-md-7 col-xs-12"
									name="lieu_dit" placeholder="Lieudit..." required="required"
									type="text">
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
						<div class="item form-group" id="ville">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Ville<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ville" class="form-control col-md-7 col-xs-12"
									name="ville" placeholder="Ville ..." type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Pays<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="pays" class="form-control col-md-7 col-xs-12"
									name="pays" placeholder="Pays ..." type="text">
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
						<h5>Informations sur votre ressources (DEMANDEUR)</h5>
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
										 type="text" value="0.0">									
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
						<h5>Informations sur les parentés avec les ressouces</h5>
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
							<button type="reset" class="btn btn-primary"><span class="gly fa fa-save"></span>&nbsp;Effacer</button>
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
	