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
					<h2>Listes des Clients</h2>
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
								<td><?php echo ($val['nom_organisme']) ;?></td>
								<td><?php echo ($val['montant_aide']) ;?></td>
								<td><?php echo ($val['type_travaux_finan']) ;?></td>
								
								<td>
									<a href="#ancre" id="modifier"
									class="btn btn-round btn-primary">Ajouter ressource</a>
									<a href="#ancre" id="modifier"
									class="btn btn-round btn-default">Voir détails</a> 							
									<!-- <a href="#ancre" id="modifier"
									class="btn btn-round btn-warning">Modifier</a>  -->
									<a href="#"
									id="supprimer" class="btn btn-round btn-danger">Supprimer</a></td>
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
								<input id="birthday" class="form-control col-md-7 col-xs-12"
									name="birthday" required="required" type="date">
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
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type des travaux<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea  name="type_travaux_finan" rows="4" class="form-control col-md-7 col-xs-12" required="true"> 
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
								for="name">Tél<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="phone" class="form-control col-md-7 col-xs-12"
									name="phone" placeholder="Téléphone ..." type="text">
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
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Email<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="mail" class="form-control col-md-7 col-xs-12"
									name="mail" placeholder="Email ..." type="email">
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 			-------------------------------------------------------------------------------- -->
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur les parentés</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="divRessources">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nomParent" class="form-control col-md-7 col-xs-12"
									name="nomParent[]" placeholder="Nom..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="prenomParent" class="form-control col-md-7 col-xs-12" name="prenomParent[]"
									placeholder="Prénom..." required="required" type="text" />
							</div>
						</div>
						<div class="item form-group" id="ville">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Date de naissance<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="datenaissanceParent" class="form-control col-md-7 col-xs-12"
									name="datenaissanceParent[]" type="date"  required="required" >
							</div>
						</div>
						<div class="item form-group" id="ville">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lien parenté<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lienParent" class="form-control col-md-7 col-xs-12"
									name="lienParent[]" placeholder="ex:Père ou Mère..." type="text"  required="required" >
							</div>
						</div>
						<div  id="newElements" >
							
						</div>
						<div class="item form-group" style="padding-left: 140px;">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<button type="button" id="ajoutRessources" class="btn btn-primary">Ajouter un autre champs</button>
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
		
		</div>
		</center>
	</form>
	<br />

</div>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients.js"></script>