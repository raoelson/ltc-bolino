<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div  >
			<div class="col-md-12 ">
				<a href="<?php echo base_url('admin.php/clients')?>" id="nouveau" class="btn btn-success"
					style="width: 15%" type="button">Retour vers les listes</a>
					
					<a href="<?php echo base_url('admin.php/clients')?>" id="nouveau" class="btn btn-primary"
					style="width: 10% ;float: right;" type="button">Imprimer</a>
			</div>		
		</div>
		
	</div>
	<div class="clearfix"></div>
	
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/clients_saves');?>"
		method="post">
		<input type="hidden" name="nombreVivantfoyer" value="0" />
		<div class="row" id="ancre" >
		<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations personelles</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Indentité <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<p style="margin-top: 9px !important">
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
									Madame: <input type="radio" class="flat" name="indentite" id=""
										value="Madame" <?php echo $RadioMadame;?>  /> &nbsp;Mademoiselle: <input
										type="radio" <?php echo $RadioMademoiselle;?> class="flat" name="indentite" id="" value="Mademoiselle" />
									&nbsp;Monsieur: <input type="radio" class="flat"
										name="indentite" id="" value="Monsieur" <?php echo $RadioMonsieur;?> />
								</p>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom martial </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="marriedname" class="form-control col-md-7 col-xs-12"
									type="text" name="marriedname" value="<?php echo $data[0]['nommarie'];?>" placeholder="Nom martial...">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom de naissance<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname1" class="form-control col-md-7 col-xs-12"
									name="firstname1" placeholder="Nom de naissance..."
									required="required" value="<?php echo $data[0]['clientNom'];?>" type="text">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Prénom <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname2" class="form-control col-md-7 col-xs-12"
									name="firstname2" placeholder="Prénom..." required="required"
									type="text" value="<?php echo $data[0]['clientPrenom'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Autre nom d'usage </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="firstname3" class="form-control col-md-7 col-xs-12"
									name="firstname3" placeholder="Autre nom d'usage..."
									type="text" value="<?php echo $data[0]['clientUsagenom'];?>" />
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Date de naissance<span class="required" id="addclass"
								>*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthday" class="form-control col-md-7 col-xs-12"
									name="birthday" required="required" type="date" value="<?php echo $data[0]['clientDate'];?>"/>
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieu de naissance<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="birthplace" class="form-control col-md-7 col-xs-12"
									name="birthplace" placeholder="Lieu de naissance ..."
									type="text" required="required" value="<?php echo $data[0]['clientPlace'];?>"/>
							</div>
						</div>
						<div class="item form-group" id="">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Situation familiale
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="familysituation" name="familysituation" class="form-control col-md-7 col-xs-12">
									<option value="Célibataire" <?php if ($data[0]['clientSituation'] == "Célibataire" ) echo 'selected' ; ?> >Célibataire</option>
									<option value="Marié(e)" <?php if ($data[0]['clientSituation'] == "Marié(e)" ) echo 'selected' ; ?>>Marié(e)</option>
									<option value="Séparé(e)" <?php if ($data[0]['clientSituation'] == "Séparé(e)" ) echo 'selected' ; ?>>Séparé(e)</option>
									<option value="Divorcé(e)" <?php if ($data[0]['clientSituation'] == "Divorcé(e)" ) echo 'selected' ; ?>>Divorcé(e)</option>
									<option value="Veuf(ve)" <?php if ($data[0]['clientSituation'] == "Veuf(ve)" ) echo 'selected' ; ?>>Veuf(ve)</option>
									<option value="Vie Maritale" <?php if ($data[0]['clientSituation'] == "Vie Maritale" ) echo 'selected' ; ?>>Vie Maritale</option>
								
								</select>
							</div>
						</div>
						<div class="item form-group" id="">
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
										id="aide_organismeNon" value="0"  <?php if ($data[0]['clientAide'] == 0 ) echo 'checked' ; ?>/> Oui: <input
										type="radio" class="flat" name="aide_organisme"
										id="aide_organismeOui" value="1"  <?php if ($data[0]['clientAide'] == 1 ) echo 'checked' ; ?> />
								</p>
							</div>
						</div>
						<div class="item form-group" id="div_nom_organisme"
							 style="height: 40px !important;<?php echo $testAide;?>">							
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Nom organisme<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="nom_organisme"
									class="form-control col-md-7 col-xs-12" name="nom_organisme"
									placeholder="Nom organisme ..." type="text" value="<?php echo $data[0]['clientOrganisme'];?>">
							</div>
						</div>
						<div class="item form-group" id="div_montant_aide"
							style="display: none; height: 40px !important;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Montant à aider<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="montant_aide" class="form-control col-md-7 col-xs-12"
									name="montant_aide" placeholder="Montant à aider ..."
									type="text" value="<?php echo $data[0]['clientMontant'];?>">
							</div>
						</div>
						<div class="item form-group" id="div_type_travaux" style="display: none;">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Type des travaux
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea  name="type_travaux_finan" id="type_travaux_finan" rows="4" class="form-control col-md-7 col-xs-12" value="<?php echo $data[0]['clienttp'];?>"> 
								</textarea>
							</div>
						</div>
					</div>
				</div>
			</div> 
			 <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations adresses</h5>
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
									type="text" value="<?php echo $data[0]['adresseAdresse1'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Adresse 2 <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="adresse2" class="form-control col-md-7 col-xs-12"
									name="adresse2" placeholder="Adresse 2..." required="required"
									type="text" value="<?php echo $data[0]['adresseAdresse2'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Lieudit <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="lieu_dit" class="form-control col-md-7 col-xs-12"
									name="lieu_dit" placeholder="Lieudit..." required="required"
									type="text" value="<?php echo $data[0]['adresseLieu'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Code Postal <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cp" class="form-control col-md-7 col-xs-12" name="cp"
									placeholder="Code postal ..." required="required" type="text" value="<?php echo $data[0]['adresseCp'];?>"/>
							</div>
						</div>
						<div class="item form-group" id="ville">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Ville<span class="required" id="addclass" >*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="ville" class="form-control col-md-7 col-xs-12"
									name="ville" placeholder="Ville ..."  required="required" 
									type="text" value="<?php echo $data[0]['adresseVille'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Pays<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="pays" class="form-control col-md-7 col-xs-12"
									name="pays" placeholder="Pays ..." required="required"
									 type="text" value="<?php echo $data[0]['adressePays'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Email<span class="required" id="addclass">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="mail" class="form-control col-md-7 col-xs-12"
									name="mail" placeholder="Email ..." type="email" required="true" value="<?php echo $data[0]['adresseMail'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Tél<span class="required" id="addclass" >*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="phone" class="form-control col-md-7 col-xs-12"
									name="phone" placeholder="Téléphone ..." type="text" required="true" value="<?php echo $data[0]['adressePhone'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Céllulaire<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="cellphone1" class="form-control col-md-7 col-xs-12"
									name="cellphone1" placeholder="Céllulaire ..." type="text" value="<?php echo $data[0]['adresseCellphone'];?>">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="name">Fax<span class="required" id="addclass"
								style="display: none;">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="fax" class="form-control col-md-7 col-xs-12"
									name="fax" placeholder="Fax ..." type="text" value="<?php echo $data[0]['adresseFax'];?>">
							</div>
						</div>
						
					</div>
				</div>
			</div> 
			
			<div class="row" id="ancre">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur votre ressources (DEMANDEUR)</h5>
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
								  	<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Salaire et Rénumération"/>		
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Salaire et Rénumération..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[0]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Allocation Familiales"/>			
									<input id="" class="form-control col-md-7 col-xs-12"									
										name="montantRessoucesDemandeur[]" placeholder="Allocation Familiales..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[1]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres préstations familiales"/>					
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres préstations familiales..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[2]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="A.A.H"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="A.A.H..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[3]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="ASSEDIC"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="ASSEDIC..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[4]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="R.S.A"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="R.S.A..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[5]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Retraite"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Retraite..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[6]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Pension Alimentaire"/>				
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Pension Alimentaire..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[7]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">	
								<input id="" 
										name="typeRessoucesDemandeur[]" 
										 type="hidden" value="Autres"/>			
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantRessoucesDemandeur[]" placeholder="Autres..."
										 type="text" value="<?php echo (unserialize($data[0]['ressourcesMontant'])[8]);?>">									
								</div>
							</td>
							<td>
								<div class="item form-group">											
									<input id="" class="form-control col-md-7 col-xs-12"
										name="montantSommeRessoucesDemandeur" placeholder="Montant Total..."
										 type="text" value="<?php echo array_sum(unserialize($data[0]['ressourcesMontant']));?>">									
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
       <?php 
       		if(count($data) > 0){       	
       ?>
		<div class="col-md-12 col-sm-12 col-xs-12" id="parentRessourceDiv" >
				<div class="x_panel">
					<div class="x_title">
						<h5>Informations sur les parentés avec les ressouces</h5>
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="divRessources">
						<?php 
						 	$sommeData = 0;
							for($i=0 ; $i<count($data);$i++){
								$sommeData += array_sum(unserialize($data[$i]['ressourcesMontant']));
								if($i > 0) {
						?>
						 	<div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12">
								 <input id="nomParent"  required="required"  class="form-control col-md-7 col-xs-12"
								 	 name="nomParent<?php echo $i+1;?>" placeholder="Nom..." type="text" value="<?php echo $data[$i]['parentsNom'];?>">
								 </div>
							 </div>
							 
							 <div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
								 <input id="prenomParent"  required="required"  class="form-control col-md-7 col-xs-12" name="prenomParent<?php echo $i+1;?>" placeholder="Prénom..." 
								 	type="text" value="<?php echo $data[$i]['parentsPrenom'];?>">
								 </div>
							 </div>
							 
							 <div class="item form-group">	
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date de naissance<span class="required" id="addclass">*</span></label>	
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
								 	<input id="datenaissanceParent"  required="required"  class="form-control col-md-7 col-xs-12" name="datenaissanceParent<?php echo $i+1;?>"
									value="<?php echo $data[$i]['parentsBirthdate'];?>" type="date">
							 	 </div>
						 	</div>
						 	 <div class="item form-group">
								 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lien parenté<span class="required" id="addclass">*</span></label>
								 <div class="col-md-6 col-sm-6 col-xs-12"> 
										 <select id="nom"  required="required"  class="form-control col-md-7 col-xs-12" name="lienParent<?php echo $i+1;?>" >
										 <option value="Mère" <?php if ($data[$i]['linkparentsNom'] == "Mère" ) echo 'selected' ; ?> >Mère</option>
										 <option value="Père" <?php if ($data[$i]['linkparentsNom'] == "Père" ) echo 'selected' ; ?>>Père</option>
										 <option  value="Enfant" <?php if ($data[$i]['linkparentsNom'] == "Enfant" ) echo 'selected' ; ?>>Enfant</option>
										 <option  value="Conjoint" <?php if ($data[$i]['linkparentsNom'] == "Conjoint" ) echo 'selected' ; ?>>Conjoint</option>
									 </select>
								 </div>
							 </div>
							 <table class="table table-striped table-bordered">							 
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
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Salaire et Rénumération"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Salaire et Rénumération..." 
										 		type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[0]);?>">
										 	</div>
										 </td>
										
										 <td>
										 	<div class="item form-group">
										 		<input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Allocation Familiales"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Allocation Familiales..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[1]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Autres préstations familiales"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Autres préstations familiales..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[2]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="A.A.H"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="A.A.H..."
										 		 type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[3]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="ASSEDIC"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" 
										 		name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="ASSEDIC..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[4]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="R.S.A"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="R.S.A..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[5]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Retraite"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Retraite..."
										 		 type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[6]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Pension Alimentaire"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" 
										 		placeholder="Pension Alimentaire..." type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[7]);?>">
									 		</div>
								 		</td>
										 
										 <td>
										 	<div class="item form-group"><input id="" name="typeRessoucesParents<?php echo $i+1;?>[]" type="hidden" value="Autres"/>
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantRessoucesParents<?php echo $i+1;?>[]" placeholder="Autres..." 
										 		type="text" value="<?php echo (unserialize($data[$i]['ressourcesMontant'])[8]);?>">
									 		</div>
								 		</td>
										 <td>
										 	<div class="item form-group">
										 		<input id="" class="form-control col-md-7 col-xs-12" name="montantTotalRessoucesParents<?php echo $i+1;?>"
										 		 placeholder="Autres..." type="text" value="<?php echo array_sum(unserialize($data[$i]['ressourcesMontant']));?>">
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
							<button type="reset" class="btn btn-primary">Imprimer</button>
							<button id="send" type="submit" class="btn btn-success">Modifier</button>
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
    </script>
<script
	src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients_edit.js"></script>