<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
		<div class="page-title">
			<div class="title_right" style="float: right;">
				<div
					class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
					<a href="#ancre" id="nouveau" class="btn btn-success" style="width: 100%" type="button">Nouveau</a>
				</div>
			</div>
		</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listes des Groupes</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nom</th>
								<!-- 							<th>Nombre d'utilisateur</th> -->
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
					<?php foreach ($data as $val){ ?>
						<tr id="<?php echo ($val['idgrp']) ;?>">
								<td><?php echo ($val['name']) ;?></td>
								<td><a href="#ancre" id="modifier" class="btn btn-round btn-warning">Modifier</a> <a
									href="#" id="supprimer" class="btn btn-round btn-danger">Supprimer</a>
								</td>
							</tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="ancre" style="display: none">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>
						Formulaire d'ajout
					</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<form class="form-horizontal form-label-left" novalidate method="post"
					 action="<?php echo base_url('admin.php/groupes_save');?>">
						<div class="item form-group">
						<input id="idgroupe" name="idgroupe" type="hidden"  value=""/>
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="namegroupe" class="form-control col-md-7 col-xs-12"
									name="name" placeholder="Nom ..."
									required="required" type="text">
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
				</div>
			</div>
		</div>
	</div>
</div>
<br />


<script
	src="<?php echo base_url() ?>assets/backend/js/sites/groupes/groupes.js"></script>