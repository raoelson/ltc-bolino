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
					<h2>Liste des échanges avec les propriétaires</h2>					
					<div class="clearfix"></div>
				</div>
					<div class="col-xs-6">
					 	<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nomrecherche" class="form-control col-md-7 col-xs-12"
								type="text" name="nomrecherche" placeholder="Recherche..." data-provide="typeahead" />
						</div>
				 	</div>	<br/>
				 <div class="x_content">
				 	<?php if(count($data['clients-echange'])>0) {?>
					 			 	
				    <div class="col-xs-3">
				    	
                      <!-- required for floating -->
                      <!-- Nav tabs -->
	                      <ul class="nav nav-tabs tabs-left">
	                      	 <?php
		                   		$i = 0;
		                   		foreach ($data['clients-echange'] as $value) {
			                   			//print_r($key);
		                   	  ?> 
	                        <li id="li_<?php echo($i);?>" <?php if($i==0) echo 'class="active"';?> ><a href="#home-<?php echo($i);?> " data-toggle="tab" data-client="<?php echo($value['clientid']);?>" onclick="show('<?php echo($value['clientid']);?>')"><?php echo($value['clientNom'].' '.$value['clientPrenom']); ?></a>
	                        </li>	                        
	                        <?php
		                   		$i++;
		                   		}
		                   	?>
	                      </ul>

                    </div>  
                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                      	 <?php
	                   		$i = 0;
	                   		foreach ($data['clients-echange'] as $value) {
		                   			//print_r($key);
	                   	  ?> 
                        <div class="tab-pane <?php if($i==0) echo 'active';?>" id="home-<?php echo($i);?>">
                          <p class="lead">Listes des appels effectués</p>
                         	<table id="datatable-buttons"
								class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nom propriétaire</th>	
										<th>N° phone</th>							
										<th>Date&Heure</th>
										<th>Motif</th>
										<th colspan="2">Actions</th>
									</tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
							<br/><br/>
							<p class="lead">Listes des messages effectués</p>
                         	<table id="datatable-buttons1"
								class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Nom propriétaire</th>								
										<th>Email</th>
										<th>Date&Heure</th>
										<th>Motif</th>
										<th>Message</th>
										<th colspan="2">Actions</th>
									</tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
                        </div>
                        <?php
	                   		$i++;
	                   		}
	                   	?>
                      </div>
                    </div>              
                    <div class="clearfix"></div>
                  </div>
                  <?php } else{?>
                  Aucun résultat
                  <?php }?>
			</div>
		</div>
	</div>
	
	<div class="row" id="ancre" style="display: none;">
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h5>Informations sur les échanges</h5>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"
							for="name">Nom proprietaire </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nomprop" class="form-control col-md-7 col-xs-12"
								type="text" name="nomprop" placeholder="Nom proprietaire..." data-provide="typeahead" />
						</div>
					</div><br/>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-earphone"></span>&nbsp; Appel</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-comment"></span>&nbsp; Message</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                        	<br/><br/>
                        	<form id="#sendAppel" class="form-horizontal form-label-left" novalidate
								action="<?php echo base_url('admin.php/echanges-proprietaires-saves');?>"
								method="post">
								<input  type="hidden" name="types" value="0" />
								<select id="selectClient" name="selectClient" style="display: none;">
									<option value="0"></option>
									<?php
										foreach ($data['clients']  as  $value) {
									 ?>
									   <option value="<?php echo $value['clientid']; ?>" data-phone ="<?php echo $value['adressePhone']; ?>"
									   	data-email ="<?php echo $value['adresseMail']; ?>"><?php echo $value['clientNom'].' '.$value['clientPrenom'];?></option>
									    
									<?php } ?>
								</select>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">N° phone<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="numphone" class="form-control col-md-7 col-xs-12"
											type="text" name="numphone" placeholder="N° phone du proprietaire.." required="" />
								</div>
								</div>
                        		<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">Date d'appel <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="dateappel" class="form-control col-md-7 col-xs-12"
											type="text" name="dateappel" placeholder="Date d'appel..." required="" />
								</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">Motif</label>

									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="motifi" class="form-control col-md-7 col-xs-12"
											type="text" name="motifi" placeholder="Motif d'appel..." required="" />
										<!-- <select  class="form-control col-md-7 col-xs-12"
											 name="etatappel">
											 <option value="1">Appel confirmé</option>
											 <option value="2">Appel rejeté</option>
											 <option value="3">Toujours injoinable</option>
										</select> -->
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
							</form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <br/><br/>
                        	<form class="form-horizontal form-label-left" novalidate
								action="<?php echo base_url('admin.php/echanges-proprietaires-saves');?>"
								method="post">
								<input  type="hidden" name="types" value="1" />
								<select id="selectClient_" name="selectClient" style="display: none;">
									<option value="0"></option>
									<?php
										foreach ($data['clients']  as  $value) {
									 ?>
									   <option value="<?php echo $value['clientid']; ?>" data-phone ="<?php echo $value['adressePhone']; ?>"
									   	data-email ="<?php echo $value['adresseMail']; ?>"><?php echo $value['clientNom'].' '.$value['clientPrenom'];?></option>
									    
									<?php } ?>
								</select>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">Email<span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="emailpro" class="form-control col-md-7 col-xs-12"
											type="text" name="emailpro" placeholder="email du proprietaire.." required="" />
								</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">Motif<span class="required">*</span></label>

									<div class="col-md-6 col-sm-6 col-xs-12">
										<input id="motifi" class="form-control col-md-7 col-xs-12"
											type="text" name="motifi" placeholder="Motif du message..." required="" />
									</div>											
                        		</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12"
										for="name">Message à envoyer <span class="required">*</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<textarea name="messageenvoyer" required="" class="form-control col-md-7 col-xs-12" cols="20" rows="5" placeholder="Ecrire ici votre message" >
											
										</textarea> 
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
							</form>
                        </div>
                      </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
<select id="selectClient" style="display: none;">
	<?php
		foreach ($data['clients']  as  $value) {
	 ?>
	   <option value="<?php echo $value['clientid']; ?>" data-phone ="<?php echo $value['adressePhone']; ?>"
	   	data-email ="<?php echo $value['adresseMail']; ?>"><?php echo $value['clientNom'].' '.$value['clientPrenom'];?></option>
	    
	<?php } ?>
</select>
<script type="text/javascript">
	var dataClients = [];
	<?php
		foreach ($data['clients']  as  $value) {
	 ?>
	    dataClients.push("<?php echo $value['clientNom'].' '.$value['clientPrenom'];?>");

	<?php } ?>
</script>
<link href="<?php echo base_url() ?>assets/backend/css/typeahead.css" rel="stylesheet"/>   
<script src="<?php echo base_url() ?>assets/backend/js/typeahead.js"></script>	
<script src="<?php echo base_url() ?>assets/backend/js/sites/clients/rdv-echange.js"></script>