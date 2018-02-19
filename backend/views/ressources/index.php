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
					<h2>Listes des Ressouces</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Types de ressources </th>
								<th>Occupants</th>
								<th>Montants</th>
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
		<div class="row" id="ancre">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur le ressources</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom de personne au foyer</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="idgroupe" name="idgroupe" class="form-control col-md-7 col-xs-12">								
								<?php foreach ($data as $val){ ?>
										<option value="<?php echo ($val['parentid']) ;?>"><?php echo ($val['parentName'].' '.$val['parentPrenom']) ;?></option>
								<?php } ?>
								</select>
							</div>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type de ressouces<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname1" class="form-control col-md-7 col-xs-12"
									name="firstname1" placeholder="Nom de naissance..."
									required="required" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Montant <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12"
									name="firstname2" placeholder="Prénom..." required="required"
									type="text">
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