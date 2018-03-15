<!-- top tiles -->
<div class="row tile_count"></div>
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

		</div>
	</div>
	<form class="form-horizontal form-label-left" novalidate
		action="<?php echo base_url('admin.php/demande_saves');?>"
		method="post">
		<input type="hidden" name="idInfoPerso" value="<?php echo $data[0]['id']; ?>" />
		<div class="row" id="ancre">
			<div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Informations sur le propriétaire</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control col-md-7 col-xs-12" name="nom" id="nom">
                                    <option></option>
                                    <?php foreach ($data_client['client'] as $val){ ?>
                                        <option value="<?php echo $val['marriedname'] ?>" ><?php echo $val['marriedname']; ?></option>
                                    <?php } ?>
                                </select>


                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Date d'arrivée <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="date_arrivee" class="form-control col-md-7 col-xs-12"
                                       name="date_arrivee" placeholder="" required="required"
                                       type="date">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">N° Dossier
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="num_dossier_valide" class="form-control col-md-7 col-xs-12"
                                       name="num_dossier_valide" placeholder="Seulement si la demande est validée"
                                        type="text">
                            </div>
                        </div>

                    </div>
                </div>

                

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Informations sur la demande de devis</h5>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Détail de devis du propriétaire
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <p style="margin-top: 9px !important"><input id="detail_devis" class="flat" name="detail_devis" type="checkbox"></p>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Devis du propriétaire
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="btn_activ btn btn-info">
                                    <input id="file" type="file" multiple>
                                </div>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Montant du devis du propriétaire <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="montant_devis" class="form-control col-md-7 col-xs-12"
                                       name="montant_devis" placeholder="" required="required"
                                       type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Artisan
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p style="margin-top: 9px !important">
                                    Oui: <input type="radio" class="flat" name="art" value="1">
                                    Non: <input type="radio" class="flat" name="art" value="0">
                                </p>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom de l'artisan
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="name" name="name" class="form-control">
                                    <option value="Paul">Paul</option>
                                    <option value="Tony">Tony</option>
                                    <option value="Eric">Eric</option>
                                    <option value="Ga">Ga</option>
                                    <option value="Gold">Gold</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

			</div>
						
		</div>
		<div class="ln_solid"></div>
		<div class="form-group">
			<center>
				<div class="col-md-6 col-md-offset-3">
					<button type="reset" class="btn btn-primary">Effacer</button>
					<button id="send" type="submit" class="btn btn-success">Enregistrer</button>
				</div>
		
		</div>
		</center>
	</form>
	<br />

</div>
<script src="<?php echo base_url() ?>assets/backend/js/sites/clients/clients.js"></script>
