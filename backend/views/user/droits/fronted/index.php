<!-- top tiles -->

<link
	href="<?php echo base_url() ?>assets/backend/vendors/switchery/dist/switchery.min.css"
	rel="stylesheet">
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div class="title_left">
			<h2>Gestions des Droits du Front Office</h2>
		</div>
		<div class="title_right" style="float: right;">
<!-- 			<div -->
<!-- 				class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search"> -->
<!-- 				<a href="#ancre" id="nouveau" class="btn btn-success" -->
<!-- 					style="width: 100%" type="button">Nouveau</a> -->
<!-- 			</div> -->
		</div>
	</div>

	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<!-- 					<h2>Gestions des Droits</h2> -->
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12">
							Groupes</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="select2_single form-control" id="selectGroup" tabindex="-1">
								<option value="0">Veuillez choisir</option>
								<?php foreach ($groupes as $val){
									?>
									<option value="<?php echo $val['idgrp']?>"><?php echo ($val['name']) ;?></option>
								<?php }
								?>
							</select>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-droits"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Menu</th>
								<th>Voir</th>
								<th>Créer</th>
								<th>Modifier</th>
								<th>Supprimer</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<div class="form-group" style="display: none;">
                	<div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                	    <button type="button" class="btn btn-primary">Annuler</button>
	                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                    </div>
               </div>                      
			</div>
		</div>
	</div>
</div>
<br />
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/droits/droit.js"></script>




