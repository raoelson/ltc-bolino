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
								<th>Nom</th>
								<th>Prénom</th>
								<th>Groupe</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/clients_saves');?>"
		method="post">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel tile ">
					<div class="x_title">
						<h5>Informations personelles</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div class="item form-group">
							<input id="usergrp" name="usergrp" type="hidden" value="" /> <input
								id="idusr" name="idusr" type="hidden" value="" /> <label
								class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom
								<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname1" class="form-control col-md-7 col-xs-12"
									name="firstname1" placeholder="Nom ..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12"
									name="firstname2" placeholder="Prénom ..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group" id="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Date de naissance<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthday" class="form-control col-md-7 col-xs-12"
									name="birthday" placeholder="Date de naissance ..." type="date">
							</div>
						</div>
						<div class="item form-group" id="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu de naissance<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthplace" class="form-control col-md-7 col-xs-12"
									name="birthplace" placeholder="Lieu de naissance ..."
									type="text">
							</div>
						</div>
						<div class="item form-group" id="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Aide organisme<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="aide_organisme"
									class="form-control col-md-7 col-xs-12" name="password"
									placeholder="Aide organisme ..." type="text">
							</div>
						</div>
						<div class="item form-group" id="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom organisme<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nom_organisme"
									class="form-control col-md-7 col-xs-12" name="password"
									placeholder="Nom organisme ..." type="password">
							</div>
						</div>
						<div class="item form-group" id="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Montant à aider<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="montant_aide" class="form-control col-md-7 col-xs-12"
									name="montant_aide" placeholder="Montant à aider ..."
									type="text">
							</div>
						</div>
						<div></div>
						<div class="x_title">
							<h5>Informations sur la parentalité</h5>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="x_panel tile ">
					<div class="x_title">
						<h5>Informations adresses</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu d'adresse <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lieu_dit" class="form-control col-md-7 col-xs-12"
									name="lieu_dit" placeholder="Lieu d'adresse ..."
									required="required" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12"
									name="firstname2" placeholder="Prénom ..." required="required"
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
								for="name">Email<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="mail" class="form-control col-md-7 col-xs-12"
									name="mail" placeholder="Email ..." type="email">
							</div>
						</div>
					</div>
					<div class="x_title">
						<h5>Informations sur la parentalité</h5>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>	
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-3">
				<button type="reset" class="btn btn-primary">Effacer</button>
				<button id="send" type="submit" class="btn btn-success">Enregistrer</button>
			</div>
		</div>
	</form>
	<br />

</div>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/user/user.js"></script>