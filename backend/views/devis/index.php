<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div >
			<div class="col-md-12 form-group pull-left ">
				<a href="<?php echo base_url('admin.php/demande')?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour</a>

			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Détail des Devis</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>Date</th>
								<th>Nom de l'artisan</th>
								<th>Type de l'artisan</th>
								<th>Travaux</th>
								<th>Montants</th>
								<th>Statut</th>
							</tr>

						</thead>
						<tbody>
							<?php foreach ($data_devis['devis'] as $dev) { ?>
								<tr>
									<td><?php echo $dev['num_devis']; ?></td>
									<td><?php echo $dev['date_devis']; ?></td>
									<td><?php echo $dev['nom_gerant'] ?></td>
									<td><?php echo $dev['namee']; ?></td>
									<td><a href="<?php  echo base_url('admin.php/demande/travaux/'.$dev['devisid']) ?>" class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a></td>
									<td><?php echo $dev['montant'].' €'; ?></td>
									<td>
	                  <!--affichage en cours-->
	                  <?php
		                  $value = $dev['statut_devis'];
		                  $valide = "Validé";
		                  $refuse = "Refusé";
		                  $encours = "En cours";
		                  if($value==$valide)
		                  {
	                  ?>
	                    <button class="badge bg-green ">
	                    	<?php echo $valide;?>
	                    </button>
	                  <?php
	                  	}
	                  else if($value==$refuse)
	                  {
	                      ?>
	                      <button class="badge bg-red">
	                          <?php echo $refuse;?>
	                      </button>
	                      <?php
	                  }
	                  else if($value==$encours)
	                  {
	                      ?>
	                      <button class="badge bg-blue">
	                          <?php echo $encours; ?>
	                      </button>
	                      <?php
	                  }
	                      ?>

	              </td>
								</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<br />

</div>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients.js"></script>
