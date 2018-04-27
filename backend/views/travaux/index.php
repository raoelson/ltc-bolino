<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div >
			<div class="col-md-12 form-group pull-left ">

				<a href="<?php echo base_url('admin.php/demande');?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour</a>


			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Détail des Travaux à réalisés</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Libellé</th>
                <th>Montant</th>
							</tr>

						</thead>
						<tbody>
							<?php foreach ($data_travaux['travaux'] as $trav) { ?>
								<tr>
									<td><?php echo $trav['libelle']; ?></td>
                  <td><?php echo $trav['montant_travaux'].' €'; ?></td>
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
