<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div  >
			<div class="col-md-12 ">
				<a href="<?php echo base_url('admin.php/clients')?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour vers liste</a>
										
			</div>		
		</div>
		
	</div>
	<div class="clearfix"></div>
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/logements_saves');?>"
		method="post">
		<input type="hidden" name="idlogement" value="<?php echo $data["idLog"];?>" />
		<input type="hidden" name="idtype" value="<?php echo $data["typeIdLog"];?>" />
		<input type="hidden" name="idClient" value="<?php echo $idClient?>" />
		<input type="hidden" name="idTypeTravaux" value="<?php echo $data["idtypetravaux"];?>" />
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur logement à rénover</h5>
						<div class="clearfix"></div> 
					</div>
					<div class="">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type du logement <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">								
								<select id="nameType" name="nameType" class="form-control col-md-7 col-xs-12" >
									<option value="F2" <?php if ($data["typeLog"] == "F2" ) echo 'selected' ; ?> >Appartement F2</option>
									<option value="F3" <?php if ($data["typeLog"] == "F3" ) echo 'selected' ; ?> >Appartement F3</option>
									<option value="F4" <?php if ($data["typeLog"] == "F4" ) echo 'selected' ; ?> >Appartement F4</option>

									<option value="maison_ind" <?php if ($data["typeLog"] == "maison_ind" ) echo 'selected' ; ?>>Maison individuelle</option>
									<option value="duplex" <?php if ($data["typeLog"] == "duplex" ) echo 'selected' ; ?>>Duplex</option>
								
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse du logement à rénover<br>(à compléter si différente de l'adresse où vous habitez) </label>
								<?php 
								   $testAide = "display: block;";
								   if($data['adresseetat'] == 1){
										$testAide = "display: none;";
									}
								?>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important">
									Oui: <input type="radio" class="flat" name="adresse" id=""
										value="1" checked="true" required <?php if ($data['adresseetat'] == 1 ) echo 'checked' ; ?> /> &nbsp;Non: <input
										type="radio" class="flat" name="adresse" id="" value="0" <?php if ($data['adresseetat'] == 0 ) echo 'checked' ; ?> />
								</p>
							</div>
						</div>
						
						<div id="NonAdresse" style="<?php echo $testAide;?>">
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">N° de la voie<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="numerovoie" placeholder="N° de la voie..."
										required="required" type="text" value="<?php echo $data["adress1_sec"];?>" />
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nom de la voie 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="nomvoie" placeholder="Nom de la voie..." 
										type="text"  value="<?php echo $data["adress2_sec"];?>" />
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Code postal <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										name="codepostal" placeholder="Code postal..."
										type="text" required="" value="<?php echo $data["postalcode_sec"];?>" />
								</div>
							</div>
							<div class="item form-group" id="">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Ville<span class="required" id="addclass"
									>*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
				                     <input type="text" class="form-control col-md-7 col-xs-1" name="ville"  placeholder="Ville..." required="" value="<?php echo $data["town_sec"];?>" />
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
											<?php
												$proprietaire = "checked='true'";
												if($data["proprieteLog"] == 0)
													$proprietaire = "";
											?>
											 <input type="checkbox" class="flat" name="proprietaire" <?php echo $proprietaire ;?> />									
										</td>
										<th>	
											Propriétaire 								
										</th>
										<td>
											<?php
												$proprietaire1 = "checked='true'";
												if($data["profoncierLog"] == 0)
													$proprietaire1 = "";
											?>
											<input type="checkbox" class="flat" name="proprietaire1" <?php echo $proprietaire1 ;?>/>								
										</td>
									</tr>
									<tr>
										<th>
											Locataire 								
										</th>
										<td>
											<?php
												$locataire = "checked='true'";
												if($data["locataireLog"] == 0)
													$locataire = "";
											?>
											<input type="checkbox" class="flat" name="locataire" <?php echo $locataire; ?> />								
										</td>
										<th>
											Locataire(²) 									
										</th>
										<td>
											<?php
												$locataire1 = "checked='true'";
												if($data["foncierlocataireLog"] == 0)
													$locataire1 = "";
											?>
											<input type="checkbox" class="flat" name="locataire1" <?php echo $locataire1; ?> />									
										</td>
									</tr>
									<tr>
										<th>
											Occupant à titre gratuit						
										</th>
										<td>
											<?php
												$occupant = "checked='true'";
												if($data["occupantLog"] == 0)
													$occupant = "";
											?>
											<input type="checkbox" class="flat" name="occupant" <?php echo $occupant; ?> />									
										</td>
										<th>
											Occupant à titre gratuit(²)  					
										</th>
										<td>
											<?php
												$occupant1 = "checked='true'";
												if($data["foncieroccupantLog"] == 0)
													$occupant1 = "";
											?>
											<input type="checkbox" class="flat" name="occupant1" <?php echo $occupant1; ?> />								
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
										type="text" name="surface" placeholder="Surface du logement..." required="true" value=" <?php echo $data["regionLog"]; ?>" />
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nombre de pièces habitable 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php
									$dataPiece = 0;
									 if($data["pieceLog"] != 0)
									  $dataPiece= $data["pieceLog"];
									?>
									<input  class="form-control col-md-7 col-xs-12"
										type="number" name="nombrepiece" placeholder="Nombre de pièces habitable ..." value="<?php echo $dataPiece;?>" />
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Nombre de personnes occupant le logement 
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php
									$dataPers = 0;
									 if($data["persLog"] != 0)
									  $dataPers= $data["persLog"];
									?>
									<input  class="form-control col-md-7 col-xs-12"
										type="number" name="nombrepersonne" placeholder="Nombre de personnes occupant le logement ..."  value="<?php echo $dataPers;?>" />
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name">Date de contruction <span class="required">*</span>
								</label>
								<?php
									if(isset($data["dateLog"])){
								?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="text" name="dateconstruction" id="single_cal001" required="true" 
										value=" <?php echo $data["dateLog"]; ?>">
								</div>
								<?php } else{?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input  class="form-control col-md-7 col-xs-12"
										type="text" name="dateconstruction" id="single_cal002" required="true" 
										value="">
								</div>
								<?php }?>
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
											<?php
												$beton = "checked='true'";
												if($data["beton"] == 0)
													$beton = "";
											?>
											 <input type="checkbox" class="flat" name="beton" <?php echo $beton; ?> />									
										</td>
										<th>	
											Cuisine 								
										</th>
										<td>
											<?php
												$cuisine = "checked='true'";
												if($data["cuisine"] == 0)
													$cuisine = "";
											?>
											<input type="checkbox" class="flat" name="cuisine" <?php echo $cuisine; ?> />								
										</td>
										<th>	
											Eau potable 								
										</th>
										<td>
											<?php
												$eau_potable = "checked='true'";
												if($data["eau_potable"] == 0)
													$eau_potable = "";
											?>
											<input type="checkbox" class="flat"  name="eaupotable" <?php echo $eau_potable; ?> />								
										</td>
									</tr>
									<tr>
										<th>
											Bois dulcifié  								
										</th>
										<td>
											<?php
												$bois_dulcifie = "checked='true'";
												if($data["bois_dulcifie"] == 0)
													$bois_dulcifie = "";
											?>
											<input type="checkbox" class="flat"  name="boisdulcifie"  <?php echo $bois_dulcifie; ?> />								
										</td>
										<th>
											Salle d'Eau									
										</th>
										<td>
											<?php
												$salle_eau = "checked='true'";
												if($data["salle_eau"] == 0)
													$salle_eau = "";
											?>
											<input type="checkbox" class="flat"  name="salleeau" <?php echo $salle_eau; ?>  />									
										</td>
										<th>
											
										 	Electricté									
										</th>
										<td>
											<?php
												$electricite = "checked='true'";
												if($data["electricite"] == 0)
													$electricite = "";
											?>
											<input type="checkbox" class="flat"  name="electricite" <?php echo $electricite; ?> />									
										</td>
									</tr>
									<tr>
										<th>
											Bois						
										</th>
										<td>
											<?php
												$bois = "checked='true'";
												if($data["bois"] == 0)
													$bois = "";
											?>
											<input type="checkbox" class="flat"  name="bois" <?php echo $bois; ?> />									
										</td>
										<th>
											W.C  					
										</th>
										<td>
											<?php
												$wc = "checked='true'";
												if($data["wc"] == 0)
													$wc = "";
											?>
											<input type="checkbox" class="flat"  name="wc" <?php echo $wc; ?> />								
										</td>
										<th>
											Tout-à-l'égout					
										</th>
										<td>
											<?php
												$tout_a_egout = "checked='true'";
												if($data["tout_a_egout"] == 0)
													$tout_a_egout = "";
											?>
											<input type="checkbox" class="flat"  name="toutegout" <?php echo $tout_a_egout; ?> />								
										</td>
									</tr>
										<tr>
										<th>
											Tôles						
										</th>
										<td>
											<?php
												$tole = "checked='true'";
												if($data["tole"] == 0)
													$tole = "";
											?>
											<input type="checkbox" class="flat"  name="tole" <?php echo $tole; ?>;  />									
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
											<?php
												$autres_mat = "checked='true'";
												if($data["autres_mat"] == 0)
													$autres_mat = "";
											?>
											<input type="checkbox" class="flat"  name="autre"  <?php echo $autres_mat; ?>;  />									
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
											<?php
												$fosse_septique = "checked='true'";
												if($data["fosse_septique"] == 0)
													$fosse_septique = "";
											?>
											<input type="checkbox" class="flat"  name="fosseeptique" <?php echo $fosse_septique; ?>>									
										</td>
									</tr>															
								</tbody>
							</table>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12"
									for="name" style="margin-top: 122px! important;">Nature des travaux à effectuer <span class="required">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<!-- <textarea class="form-control col-md-7 col-xs-12" style="height: 40px; !important;" 
										name="nature_travaux" placeholder="Nature des travaux à effectuer..."
										type="text" required="" value="" ><?php echo $data["typetravaux"];?></textarea>  -->
									<p style="margin-top: 9px !important">
									<input type="radio" class="flat" name="nature_travaux" id=""
										value="0"  required  <?php if ($data["typetravaux"] == 0 ) echo 'checked' ; ?> />&nbsp;&nbsp; Pose ou réfection des sanitaires(WC,lavabo,douche)
									<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="1"  <?php if ($data["typetravaux"] == 1 ) echo 'checked' ; ?>  required/> &nbsp;&nbsp;L'aménagement et l'équipement des bases d'une cuisine pour les logements qui&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;en sont dépouvus(évier,menuisier sous évier)
									<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="2"  <?php if ($data["typetravaux"] == 2 ) echo 'checked' ; ?> /> &nbsp;&nbsp;L'installation de fosse septique(dans le cas ou le raccordement aux réseaux&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; publics ne serait pas envisageable) Les raccordements aux réseaux d'adduction&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d'eau potable(AEP),d'eaux usées(EU) et électrique
										<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="3" required  <?php if ($data["typetravaux"] == 3 ) echo 'checked' ; ?> /> &nbsp;&nbsp;Les travaux de réalisation et de réfection de l'installation électrique
										<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="4" required  <?php if ($data["typetravaux"] == 4 ) echo 'checked' ; ?> /> &nbsp;&nbsp;Les travaux d'étanchéité et de réfection de la charpente couverte
										<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="5" required  <?php if ($data["typetravaux"] == 5 ) echo 'checked' ; ?>/> &nbsp;&nbsp;La pose de portes et fenêtre et la mise en sécurité de l'habitat	
									<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="6" required  <?php if ($data["typetravaux"] == 6 ) echo 'checked' ; ?> /> &nbsp;&nbsp;Les revêtements du sol et de murs(carrelage, peinture extérieure, enduisage&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;intérieur) justifiés par la rfection du bâti
									<br/><br/><input
									type="radio" class="flat" name="nature_travaux" id="" value="7"  required  <?php if ($data["typetravaux"] == 7 ) echo 'checked' ; ?>/> &nbsp;&nbsp;Les travaux d'accesssibilité et d'adaption du logment au profit des personnes&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;âgées, handicapées ou à mobilité réduite, si ces travaux ne peuvent être pris en&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;compte au titre des dispositifs dédiés
									</p>
								</div>
							</div>
						</div>
				</div>
			</div> 
			<div class="ln_solid"></div>
			<div class="form-group">
				<center>
					<div class="col-md-6 col-md-offset-3">
						<button type="reset" class="btn btn-primary"><span class="gly fa fa-remove"></span>&nbsp;Effacer</button>
						<button  type="submit" class="btn btn-success"><span class="gly fa fa-save"></span>&nbsp;Enregistrer</button>
					</div>
				</center>
			</div>
		</div>
	</form>
	<br />

</div>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/logement/logement.js"></script>