<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div  >
			<div class="col-md-12 ">
				<a href="<?php echo base_url('admin.php/clients')?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour vers liste</a>
					
					<a  href="<?php  echo base_url('admin.php/clients/exports/'.$data[0]['clientid']) ?>"  class="btn btn-primary"
					style="width: 10% ;float: right;display: none;" type="button"><span class="gly fa fa-print"></span>&nbsp;Imprimer</a>
			</div>		
		</div>
		
	</div>
	<div class="clearfix"></div>
	<?php
		$disabled_ = '';
		if( $data[0]['clientEtat'] == 0){
			$disabled_ = 'disabled = "true"';
		}
	?>
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/clients_saves');?>"
		method="post">
		<input type="hidden" name="idInfoPerso" value="<?php echo $data[0]['clientid']; ?>" />		
		<div class="row" id="ancre" >
		<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Etat civil des propriétaires</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Civilité <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important" >
								<?php 
									$RadioMadame = "";
									$RadioMademoiselle= "";
									$RadioMonsieur= "";
								    if($data[0]['indentite'] == "Madame"){
								    	$RadioMadame = "checked='true'";
								    }else if($data[0]['indentite'] == "Mademoiselle"){
								    	$RadioMademoiselle= "checked='true'";
								    }else if($data[0]['indentite'] == "Monsieur"){
								    	$RadioMonsieur = "checked='true'";
								    }
								?>
									Madame: <input type="radio" class="flat" name="indentite" 
										value="Madame" <?php echo $RadioMadame; echo $disabled_;?>  /> &nbsp;Mademoiselle: <input
										type="radio" <?php echo $RadioMademoiselle; echo $disabled_;?> class="flat" name="indentite"  value="Mademoiselle"  />
									&nbsp;Monsieur: <input type="radio" class="flat"
										name="indentite"  value="Monsieur" <?php echo $RadioMonsieur; echo $disabled_;?> />
								</p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom marital </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="marriedname" class="form-control col-md-7 col-xs-12"
									type="text" name="marriedname" value="<?php echo $data[0]['nommarie'];?>" placeholder="Nom marital..." <?php  echo $disabled_;?> >
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom de naissance<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname1" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="firstname1" placeholder="Nom de naissance..."
									required="required" value="<?php echo $data[0]['clientNom'];?>" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="firstname2" placeholder="Prénom..." required="required"
									type="text" value="<?php echo $data[0]['clientPrenom'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Autre nom d'usage </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname3" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="firstname3" placeholder="Autre nom d'usage..."
									type="text" value="<?php echo $data[0]['clientUsagenom'];?>" />
							</div>
						</div>
						<div class="item form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Date de naissance<span class="required" id="addclass"
								>*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12"> 
								<input id="single_cal001" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="birthday" required="required" type="text" value="<?php echo $data[0]['clientDate'];?>"/>
							</div>
						</div>
						<div class="item form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu de naissance<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthplace" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="birthplace" placeholder="Lieu de naissance ..."
									type="text" required="required" value="<?php echo $data[0]['clientPlace'];?>"/>
							</div>
						</div>
						<div class="item form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Situation familiale
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="familysituation" name="familysituation" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> >
									<option value="Célibataire" <?php if ($data[0]['clientSituation'] == "Célibataire" ) echo 'selected' ; ?> >Célibataire</option>
									<option value="Marié(e)" <?php if ($data[0]['clientSituation'] == "Marié(e)" ) echo 'selected' ; ?>>Marié(e)</option>
									<option value="Séparé(e)" <?php if ($data[0]['clientSituation'] == "Séparé(e)" ) echo 'selected' ; ?>>Séparé(e)</option>
									<option value="Divorcé(e)" <?php if ($data[0]['clientSituation'] == "Divorcé(e)" ) echo 'selected' ; ?>>Divorcé(e)</option>
									<option value="Veuf(ve)" <?php if ($data[0]['clientSituation'] == "Veuf(ve)" ) echo 'selected' ; ?>>Veuf(ve)</option>
									<option value="Vie Maritale" <?php if ($data[0]['clientSituation'] == "Vie Maritale" ) echo 'selected' ; ?>>Vie Maritale</option>
								
								</select>
							</div>
						</div>
						<div class="item form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Aide organisme
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<?php 
								   $testAide = "display: none;";
								   if($data[0]['clientAide'] == 1){
										$testAide = "display: block;";
									}
								?>
								<p style="margin-top: 9px !important">
									Non: <input type="radio" class="flat" name="aide_organisme"
										id="aide_organismeNon" value="0" <?php  echo $disabled_;?>   <?php if ($data[0]['clientAide'] == 0 ) echo 'checked' ; ?>/> Oui: <input
										type="radio" class="flat" name="aide_organisme"
										id="aide_organismeOui" value="1" <?php  echo $disabled_;?>  <?php if ($data[0]['clientAide'] == 1 ) echo 'checked' ; ?> />
								</p>
							</div>
						</div>
						<div class="item form-group" id="div_nom_organisme"
							 style="height: 40px !important;<?php echo $testAide;?>">							
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom organisme<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nom_organisme" <?php  echo $disabled_;?> 
									class="form-control col-md-7 col-xs-12" name="nom_organisme"
									placeholder="Nom organisme ..." type="text" value="<?php echo $data[0]['clientOrganisme'];?>">
							</div>
						</div>
						<div class="item form-group" id="div_montant_aide"
							style="<?php echo $testAide;?>; height: 40px !important;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Montant de l'aide<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="montant_aide" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="montant_aide" placeholder="Montant de l'aide ..."
									type="text" value="<?php echo $data[0]['clientMontant'];?>">
							</div>
						</div>
						<div class="item form-group" id="div_type_travaux" style="<?php echo $testAide;?>;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type des travaux
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input  name="type_travaux_finan" id="type_travaux_finan" rows="4" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?>  value="<?php echo trim($data[0]['clienttp']);?>" /> 									
							</div>
						</div>
					</div>
				</div>
			</div> 
			 <div class="col-md-12 col-sm-12 col-xs-12">
			 	<input type="hidden" name="idInfoAdresse" value="<?php echo $data[0]['adresseId']; ?>" />		
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur l’adresse du propriétaire</h5>
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
									type="text" value="<?php echo $data[0]['adresseAdresse1'];?>" <?php  echo $disabled_;?> />
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse 2 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="adresse2" class="form-control col-md-7 col-xs-12"
									name="adresse2" placeholder="Adresse 2..." 
									type="text" value="<?php echo $data[0]['adresseAdresse2'];?>" <?php  echo $disabled_;?> />
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu-dit 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lieu_dit" class="form-control col-md-7 col-xs-12"
									name="lieu_dit" placeholder="Lieu-dit..." 
									type="text" value="<?php echo $data[0]['adresseLieu'];?>" <?php  echo $disabled_;?> />
							</div>
						</div>
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Pays 
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="pays" name="pays" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> >
									<?php
										foreach ($pays as $key => $value) {
											# code...										
									 ?>								
										<option value="<?php echo $value['id'];?>"
											<?php if ($data[0]['adressePays'] == $value['id'] ) echo 'selected' ; ?>><?php echo $value['nom_pays_fr'];?></option>									
									<?php }
									 ?>
								</select>
							</div>
						</div>
						<div class="item form-group" >
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Région<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="region" name="region" class="form-control col-md-7 col-xs-12" required="required"
								<?php  echo $disabled_;?> >>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Ville  <span class="required" id="addclass" >*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="ville" name="ville" class="form-control col-md-7 col-xs-12" required="required" <?php  echo $disabled_;?> >
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Code Postal <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cp" class="form-control col-md-7 col-xs-12" name="cp"
									placeholder="Code postal ..." required="required" type="text" value="<?php echo $data[0]['adresseCp'];?>" <?php  echo $disabled_;?> />
							</div>
						</div>
						

						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Email<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="mail" class="form-control col-md-7 col-xs-12"
									name="mail" placeholder="Email ..." type="email" required="true" value="<?php echo $data[0]['adresseMail'];?>" <?php  echo $disabled_;?> >
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Tél<span class="required" id="addclass" >*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="phone" class="form-control col-md-7 col-xs-12"
									name="phone" placeholder="Téléphone ..." type="text" required="true" value="<?php echo $data[0]['adressePhone'];?>" <?php  echo $disabled_;?> >
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Céllulaire<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cellphone1" class="form-control col-md-7 col-xs-12"
									name="cellphone1" placeholder="Céllulaire ..." type="text" value="<?php echo $data[0]['adresseCellphone'];?>" <?php  echo $disabled_;?> >
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Fax<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="fax" class="form-control col-md-7 col-xs-12" <?php  echo $disabled_;?> 
									name="fax" placeholder="Fax ..." type="text" value="<?php echo $data[0]['adresseFax'];?>">
							</div>
						</div>
						
					</div>
				</div>
			</div> 
			
			<div class="row" id="ancre">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="hidden" name="idInfoRessourceAdresse" value="<?php echo $data[0]['ressourcesId']; ?>" />	
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur les revenus du propriétaire</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">	
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Salaire et Rénumération</th>
								<th>Allocation Familiales</th>
								<th>Autres préstations familiales</th>
								<th>A.A.H</th>
								<th>ASSEDIC</th>
								<th>R.S.A</th>
								<th>Retraite</th>
								<th>Pension Alimentaire</th>
								<th>Autres</th>
								<th>Montant Total</th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td>
								<div class="item form-group">		
								  	<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Salaire et Rénumération"/>		
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Salaire et Rénumération..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[0]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Allocation Familiales"/>			
									<input  class="form-control col-md-7 col-xs-12"									
										name="montantRessoucesDemandeur[]" placeholder="Allocation Familiales..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[1]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres préstations familiales"/>					
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres préstations familiales..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[2]);?>" <?php  echo $disabled_;?> />									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="A.A.H"/>			
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="A.A.H..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[3]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="ASSEDIC"/>				
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="ASSEDIC..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[4]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="R.S.A"/>			
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="R.S.A..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[5]);?>" <?php  echo $disabled_;?> />									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Retraite"/>				
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Retraite..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[6]);?>" <?php  echo $disabled_;?> />									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Pension Alimentaire"/>				
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Pension Alimentaire..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[7]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input  
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres"/>			
									<input  class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[8]);?>" <?php  echo $disabled_;?>  />									
								</div>
							</td>
							<td>
								<div class="item form-group">											
									<input disabled="disabled" class="form-control col-md-7 col-xs-12"
										name="montantSommeRessoucesDemandeur" placeholder="Montant Total..."
										 type="text" value="<?php echo array_sum(unserialize($data[0]['ressourcesMontant']));?>" >									
								</div>
							</td>
						</tr>
						</tbody>
						</table>																																			 						
					</div>
				</div>
			</div>					
		</div>
		
		
<!-- 		---------------------parenté -->
		<input type="hidden" name="idDataParent" value="<?php echo count($data); ?>" />		
       <?php 
       		$sommeData = 0;  
       		$sommeData+= array_sum(unserialize($data[0]['ressourcesMontant']));
       		if(count($data) >1){         		   
       ?>
		<div class="col-md-12 col-sm-12 col-xs-12" id="parentRessourceDiv" >
				<div class="x_panel">
					<div class="x_title">
						<h5>Information sur les parentés et les revenus du ressources</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="divRessources">
						<?php 						 	
							for($i=0 ; $i<count($data);$i++){								
								if($i > 0) {
								 $sommeData += array_sum(unserialize($data[$i]['ressourcesMontant']));
						?>

							<input type="hidden" name="idInfoParent<?php echo $i+1;?>" value="<?php echo $data[$i]['parentsId']; ?>" />		
							<input type="hidden" name="idInfoLinkParent<?php echo $i+1;?>" value="<?php echo $data[$i]['linkparentsId']; ?>" />
						 	<div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12">
								 <input id="nomParent"  required="required"  class="form-control col-md-7 col-xs-12"
								 	 name="nomParent<?php echo $i+1;?>" placeholder="Nom..." type="text" value="<?php echo $data[$i]['parentsNom'];?>" <?php  echo $disabled_;?> />
								 </div>
							 </div>
							 
							 <div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
								 <input id="prenomParent"  required="required"  class="form-control col-md-7 col-xs-12" name="prenomParent<?php echo $i+1;?>" placeholder="Prénom..." 
								 	type="text" value="<?php echo $data[$i]['parentsPrenom'];?>" <?php  echo $disabled_;?> />
								 </div>
							 </div>
							 
							 <div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date de naissance<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
								 	<input id="single_cal_<?php echo $i+1;?>"  required="required"  class="form-control col-md-7 col-xs-12" name="datenaissanceParent<?php echo $i+1;?>"
									value="<?php echo $data[$i]['parentsBirthdate'];?>" type="text" <?php  echo $disabled_;?> />
							 	 </div>
						 	</div>
						 	 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lien parenté<span class="required" id="addclass">*</span></label>
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
										 <select id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="lienParent<?php echo $i+1;?>" <?php  echo $disabled_;?> >
										 <option value="Mère" <?php if ($data[$i]['linkparentsNom'] == "Mère" ) echo 'selected' ; ?> >Mère</option>
										 <option value="Père" <?php if ($data[$i]['linkparentsNom'] == "Père" ) echo 'selected' ; ?>>Père</option>
										 <option  value="Enfant" <?php if ($data[$i]['linkparentsNom'] == "Enfant" ) echo 'selected' ; ?>>Enfant</option>
										 <option  value="Conjoint" <?php if ($data[$i]['linkparentsNom'] == "Conjoint" ) echo 'selected' ; ?>>Conjoint</option>
										  <option  value="Grandparent" <?php if ($data[$i]['linkparentsNom'] == "Grandparent" ) echo 'selected' ; ?>>Grands-parents</option>
									 </select>
								 </div>
							 </div>
							 <table class="table table-striped table-bordered" id="<?php echo $i+1;?>_table">		<input type="hidden" name="idInfoParentRessources<?php echo $i+1;?>" value="<?php echo $data[$i]['ressourcesId']; ?>"/>					 
								 <thead>
									 <th>Salaire et Rénumération</th>
									 <th>Allocation Familiales</th>
									 <th>Autres préstations familiales</th>
									 <th>A.A.H</th>
									 <th>ASSEDIC</th>
									 <th>R.S.A</th>
									 <th>Retraite</th>
									 <th>Pension Alimentaire</th>
									 <th>Autres</th>
									 <th>Montant Total</th>
								 </thead>
								 
								 <tbody>
									 <tr>
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Salaire et Rénumération"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Salaire et Rénumération..." 
										 		type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[0]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
										 	</div>
										 </td>
										
										 <td>
										 	<div class="item form-group">
										 		<input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Allocation Familiales"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Allocation Familiales..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[1]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Autres préstations familiales"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Autres préstations familiales..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[2]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="A.A.H"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="A.A.H..."
										 		 type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[3]);?>"
										 		 id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="ASSEDIC"/>
										 		<input  class="form-control col-md-7 col-xs-12" 
										 		name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="ASSEDIC..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[4]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="R.S.A"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="R.S.A..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[5]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Retraite"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Retraite..."
										 		 type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[6]);?>"
										 		 id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Pension Alimentaire"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Pension Alimentaire..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[7]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input  name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Autres"/>
										 		<input  class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Autres..." 
										 		type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[8]);?>"
										 		id="<?php echo $i+1;?>_montantRessoucesParents[]" <?php  echo $disabled_;?> />
									 		</div>
								 		</td>
										 <td>
										 	<div class="item form-group">
										 		<input disabled="disabled" class="form-control col-md-7 col-xs-12" name="montantTotalRessoucesParents_<?php echo $i+1;?>"
										 		 placeholder="Montant Total..." type="text" value="<?php echo array_sum(unserialize($data[$i]['ressourcesMontant']));?>"
										 		  id="<?php echo $i+1;?>_montantTotalRessoucesParents">
									 		</div>
								 		</td>
									 </tr>
								 </tbody>
							 </table>
						<?php
								}
       						}
						?>						
					</div>
				</div>

			</div>
			 <?php 
       			}    	
       		?>
<!-- ------------fin -->
		
		
			<div class="form-group" >
						<div class="col-md-11 col-sm-12 col-xs-12 " style="margin-left: 16px;">
							<a href="#" id="nouveau" 
								 type="button" style="float: right;">MONTANT TOTAL POUR LES PERSONNES VIVANTS DANS LE FOYER  : <b><span id="totalFoyer"> 
								 <?php echo $sommeData?> € </span></b> </a>
						</div>
			</div>		
			<div class="ln_solid"></div>
				<div class="form-group">
					<center>
						<div class="col-md-6 col-md-offset-3">
							<?php

								if($data[0]['clientEtat'] != 0) {
							?>
							<a href="#" class="btn btn-default" onclick="ActiveDesactive(<?php echo $data[0]['clientid']; ?>,0)"><span class="gly fa fa-remove"></span>&nbsp;Désactiver</a>
							<?php }else{?>
							<a href="#" class="btn btn-default"  onclick="ActiveDesactive(<?php echo $data[0]['clientid']; ?>,1)"><span class="glyphicon glyphicon-ok"></span>&nbsp;Activer</a>
							<?php }?>
							<button id="send" type="submit" class="btn btn-success" <?php  echo $disabled_;?> ><span class="gly fa fa-save"></span>&nbsp;Modifier</button>
						</div>
					</center>
				</div>
				
          </div>
          
			<!-- 			-------------------------------------------------------------------------------- -->
			
				
	</form>
	<br />

</div>
<script type="text/javascript">
        var dataTotal = "<?php echo count($data);?>";
        var dataVille = "<?php echo $data[0]['adresseVille'];?>";
        var dataRegion = "<?php echo $data[0]['adresseRegion'];?>";
        var urlRedirect = "<?php echo  base_url () . "admin.php/clients" ;?>";
        var urlDetails = "<?php echo  base_url () . "admin.php/clients/details/".$data[0]['clientid']."" ;?>";
    </script>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients_edit.js"></script>