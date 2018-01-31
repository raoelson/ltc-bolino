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
					<h2>Listes des Utilisateurs</h2>
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
					<?php foreach ($data as $val){ ?>
						<tr id="<?php echo ($val['idusr']) ;?>" data="<?php echo ($val['usrgrp']) ;?>">
								<td><?php echo ($val['username']) ;?></td>
								<td><?php echo ($val['firstname']) ;?></td>
								<td><?php echo ($val['groupename']) ;?></td>
								<td><a href="#ancre" id="modifier"
									class="btn btn-round btn-warning">Modifier</a> <a href="#"
									id="supprimer" class="btn btn-round btn-danger">Supprimer</a></td>
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
					<h2>Formulaire d'ajout</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<form class="form-horizontal form-label-left" novalidate 
					action="<?php echo base_url('admin.php/user_save');?>" method="post">
						<div class="item form-group">
							<input id="usergrp" name="usergrp" type="hidden" value="" />
							<input id="idusr" name="idusr" type="hidden" value="" /> <label
								class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom
								<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nameuser" class="form-control col-md-7 col-xs-12"
									name="name" placeholder="Nom ..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstnameuser" class="form-control col-md-7 col-xs-12"
									name="firstnameuser" placeholder="Prénom ..." required="required"
									type="text">
							</div>
						</div>
						<div class="item form-group" id ="password">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Mot de passe <span class="required" id="addclass" style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="passworduser" class="form-control col-md-7 col-xs-12"
									name="password" placeholder="Mot de passe ..." type="password">
							</div>
						</div>
<!-- 						<div class="item form-group"> -->
<!-- 							<label class="control-label col-md-3 col-sm-3 col-xs-12" -->
<!-- 								for="name">Confirmation du <span class="required">*</span> -->
<!-- 							</label> -->
<!-- 							<div class="col-md-6 col-sm-6 col-xs-12"> -->
<!-- 								<input id="passworduser" class="form-control col-md-7 col-xs-12" -->
<!-- 									name="password" placeholder="Mot de passe ..." -->
<!-- 									required="required" type="text"> -->
<!-- 							</div> -->
<!-- 						</div> -->
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Groupe </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="idgroupe" name="idgroupe" class="form-control col-md-7 col-xs-12">								
								<?php foreach ($groupes as $val){ ?>
										<option value="<?php echo ($val['idgrp']) ;?>"><?php echo ($val['name']) ;?></option>
								<?php } ?>
								</select>
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
	src="<?php echo base_url() ?>assets/backend/js/sites/user/user.js"></script>
