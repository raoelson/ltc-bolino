<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div  >
			<div class="col-md-12 ">
				<a href="<?php echo base_url('admin.php/clients')?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour vers les listes</a>
										
			</div>		
		</div>
		
	</div>
	<div class="clearfix"></div>
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/clients_saves');?>"
		method="post">
		<input type="hidden" name="nombreVivantfoyer" value="0" />
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur logement à rénover</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type du logement <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input  class="form-control col-md-7 col-xs-12"
									type="text" name="nameType" placeholder="Type du logement..." required="true">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse du logement à rénover<br>(à compléter si différente de l'adresse où vous habitez) </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important">
									Oui: <input type="radio" class="flat" name="adresse" id=""
										value="1" checked="true" required /> &nbsp;Non: <input
										type="radio" class="flat" name="adresse" id="" value="0" />
								</p>
							</div>
						</div>
						
						<div id="NonAdresse" style="display: none;">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">N° de la voie<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="numerovoie" placeholder="N° de la voie..."
										required="required" type="text">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nom de la voie <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="nomvoie" placeholder="Nom de la voie..." required="required"
										type="text" required="">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Code postal <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="codepostal" placeholder="Code postal..."
										type="text" required="">
								</div>
							</div>
							<div class="item form-group" id="">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Ville<span class="required" id="addclass"
									>*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                     <input type="text" class="form-control col-md-7 col-xs-1" name="ville"  placeholder="Ville..." required="">
								</div>
							</div>
						</div>
						<br/>
						<div class="x_title">
						<h5>Type d'occupation</h5>
						<div class="clearfix"></div>
						</div>
						<div class="x_content">	
							<table class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>LOGEMENT</th>
									<th>ACTIONS<br/>(Cochez si oui,décochez si non)</th>
									<th>FONCIER</th>
									<th>ACTIONS<br/>(Cochez si oui,décochez si non)</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<th>	
											Propriétaire 								
										</th>
										<td>
											 <input type="checkbox" class="flat" >									
										</td>
										<th>	
											Propriétaire 								
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
									</tr>
									<tr>
										<th>
											Locataire 								
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
										<th>
											Locataire(²) 									
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
									</tr>
									<tr>
										<th>
											Occupant à titre gratuit						
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
										<th>
											Occupant à titre gratuit(²)  					
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
									</tr>															
								</tbody>
							</table>
						</div>
						<br/>
						<div class="x_title">
						<h5>caractèristique du logement nécessitant les travaux</h5>
						<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Surface du logement <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="text" name="nmaeType" placeholder="Surface du logement..." required="true">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nombre de pièces habitable 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="number" name="nmaeType" placeholder="Nombre de pièces habitable ..." value="0">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nombre de personnes occupant le logement 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="number" name="nmaeType" placeholder="Nombre de personnes occupant le logement ..."  value="0">
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Date de contruction <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="text" name="nmaeType" id="single_cal01" required="true" >
								</div>
							</div>
							<br/>
							<div class="x_content">	
							<table class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>NATURE<br/> DES MATERIAUX</th>
									<th>ACTIONS<br/>(Cochez si oui,décochez si non)</th>
									<th>EQUIPEMENT</th>
									<th>ACTIONS<br/>(Cochez si oui,décochez si non)</th>
									<th>DESSERTE PAR<br/>LES RESEAUX </th>
									<th>ACTIONS<br/>(Cochez si oui,décochez si non)</th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<th>	
											Béton 								
										</th>
										<td>
											 <input type="checkbox" class="flat" >									
										</td>
										<th>	
											Cuisine 								
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
										<th>	
											Eau potable 								
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
									</tr>
									<tr>
										<th>
											Bois dulcifié  								
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
										<th>
											Salle d'Eau									
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
										<th>
										 	Electricté									
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
									</tr>
									<tr>
										<th>
											Bois						
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
										<th>
											W.C  					
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
										<th>
											Tout-à-l'égout					
										</th>
										<td>
											<input type="checkbox" class="flat" >								
										</td>
									</tr>
										<tr>
										<th>
											Tôles						
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
										<th>
											-						
										</th>
										<td>
											-									
										</td>
										<th>
											-						
										</th>
										<td>
											-									
										</td>
									</tr>	
									<tr>
										<th>
											autres						
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
										<th>
											-					
										</th>
										<td>
											-							
										</td>
										<th>
											Fosse septique						
										</th>
										<td>
											<input type="checkbox" class="flat" >									
										</td>
									</tr>															
								</tbody>
							</table>

						</div>
				</div>
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
	</form>
	<br />

</div>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/logement/logement.js"></script>