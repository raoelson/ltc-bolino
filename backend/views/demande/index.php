<!-- top tiles -->
<div class="row tile_count"></div> 
<!-- /top tiles -->
<div class="row">
	<div class="page-title">
		<div class="title_right" style="float: right;">
			<div
				class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
				<button  id="nouveau" class="btn btn-success" style="width: 100%" type="button">Nouveau</button>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Listes des Demandes</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table id="datatable-buttons"
						class="table table-striped table-bordered">
						<thead>
							<tr>
                                <th>N°</th>
                                <th>N° Dossier</th>
                                <th>Date d'arrivée</th>
                                <th>Titre</th>
                                <th>Propriétaire</th>
                                <th>Adresse Postale</th>
                                <th>Type des travaux</th>
                                <th>Devis</th>
								<th>Montant total des devis</th>
								<th>Montant de l'aide</th>
                                <th>Statut</th>
                                <th>Action</th>

							</tr> 
						</thead>
						<tbody>
							<?php foreach ($data['demande'] as $val ) { ?>
								<tr>

                                    <td><?php echo $val['demandeid']; ?></td>
                                    <td><?php echo $val['num_dossier_valide']; ?></td>
                                    <td><?php echo $val['date_arrivee']; ?></td>
                                    <td><?php echo $val['title']; ?></td>
                                    <td><?php echo $val['firstname1']; ?></td>
                                    <td><?php echo $val['adress1']; ?></td>
                                    <td><?php if ($val['type_travaux_finan'] != "") echo $val['type_travaux_finan']; else echo '-'; ?></td>
                                    <td><a href="<?php  echo base_url('admin.php/demande/devis/'.$val['demandeid']) ?>" class="btn btn-round btn-default"><span class="gly fa fa-plus"></span></a></td>
                                    <td><?php echo $val['montant_devis']; ?></td>
                                    <td>
                                        <?php 
                                            $aide = $val['montant_devis'];
                                            echo ($aide > 10500 ? 10500 : $aide); 
                                        ?>
                                    </td>
                                    <td>
                                        <!--affichage en cours-->
                                        <?php
                                        $value = $val['statut'];
                                        $validee = "Validée";
                                        $refusee = "Refusée";
                                        $encours = "En cours";
                                        if($value==$validee)
                                        {
                                            ?>
                                            <button class="badge bg-green ">
                                                <?php echo $validee;?>
                                            </button>
                                            <?php
                                        }
                                        else if($value==$refusee)
                                        {
                                            ?>
                                            <button class="badge bg-red">
                                                <?php echo $refusee;?>
                                            </button>
                                            <?php
                                        }
                                        else if($value==$encours)
                                        {
                                            ?>
                                            <button class="badge bg-blue">
                                                <?php echo $encours ?>
                                            </button>
                                            <?php  
                                        }
                                            ?>

                                    </td>
                                    <td><a href="<?php  echo base_url('admin.php/demande/details/'.$val['demandeid']) ?>" id="modifier" title="Voir les détails"
                                    class="btn btn-round btn-default"><span class="gly fa fa-eye"></span></a></td>

									
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <div id="ajout">
            <form class="form-horizontal form-label-left" novalidate
        action="<?php echo base_url('admin.php/demande_saves');?>"
        method="post">
        <input type="text" name="nombreDevis" value="1"/>
        <div class="row" id="ancre">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Propriétaire</h5>
                    </div>

                    <div class="x_content">
                        <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom<span class="required">*</span>
                               </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                               <select class="form-control col-md-7 col-xs-12" name="nom" id="nomProp" data-placeholder="Le Nom du Propriétaire" >
                                    <option></option>
                                    <?php foreach ($data_client['client'] as $val){ ?>
                                        <option value="<?php echo $val['firstname1'] ?>" ><?php echo $val['firstname1']; ?></option>
                                    <?php } ?>

                               </select>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Informations du dossier</h5>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Date d'arrivée <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="date_arrivee" class="form-control col-md-7 col-xs-12 dateCalendrier"
                                       name="date_arrivee" placeholder="" required="required"
                                       type="text">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Statut
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="statut" name="statut" class="form-control">
                                    <option value="En cours" selected="">En cours</option>
                                    <option value="Validée">Validée</option>
                                    <option value="Refusée" >Refusée</option>

                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">N° Dossier<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="num_dossier_valide" class="form-control col-md-7 col-xs-12" name="num_dossier_valide"  type="text" required="">
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
                                   for="name">Artisan
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <p style="margin-top: 9px !important">
                                    Oui: <input type="radio" class="flat" name="art" value="1"  checked="" required>
                                    Non: <input type="radio" class="flat" name="art" value="0">
                                </p>
                            </div>
                        </div>

                        <div id="div_oui_artisan">

                            <div id="div_devis">
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Nom de l'artisan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="nomArt1" name="nomArt1" class="form-control">
                                          <?php foreach ($arti as $art){?>
                                            <option> <?php echo $art->nom_gerant; ?> </option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Type de l'artisan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="nameArt1" name="nameArt1" class="form-control">
                                            <?php foreach ($type_art as $trav ){ ?>
                                                <option value=""><?php echo $trav->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">N° du Devis<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="num_devis1" class="form-control col-md-7 col-xs-12" name="num_devis1" type="text" required="">
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Date du Devis <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="date_devis1" class="form-control col-md-7 col-xs-12 dateCalendrier" name="date_devis1" required="required"
                                               type="text">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="montantDevisPrincipal">Montant du devis <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="montantDevisPrincipal" class="form-control col-md-7 col-xs-12"
                                               name="montantDevisPrincipal" placeholder="" required="required"
                                               type="text">
                                    </div>
                                </div>

                                <input type="text" name="montantTotalDevisPrincipal">

                                <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="name">Statut du devis <span class="required">*</span>
                                </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="statutDevis1">
                                            <option value="En cours" selected="">En cours</option>
                                            <option value="Validé">Validé</option>
                                            <option value="Refusé">Refusé</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Détail du devis
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p style="margin-top: 9px !important">
                                            <label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis" id="oui" value="oui" >
                                            <label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis" id="non" value="non" checked="">
                                        </p>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Devis de l'artisan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!--<div class="btn_activ btn btn-info">-->
                                            <input id="file" name="fileTest" type="file" disabled="">
                                        <!--</div>-->
                                    </div>
                                </div>

                            </div>

            




                      

                            <!-- <div class="item form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                        for="name">Détail de devis du propriétaire
                                 </label>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p style="margin-top: 9px !important"><input id="detail_devis" class="flat" name="detail_devis" type="checkbox" ></p>
                                 </div>
                             </div>-->

                           

                        </div>



                        <div id="div_non_artisan" style="display: none; height: 40px !important;">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="typeArt">Type de l'artisan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="typeArt" name="typeArt" class="form-control">
                                        <?php foreach ($typeart as $type){?>
                                            <option> <?php echo $type->name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>



                            <div class="item form-group" id="div_nom_artisan">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="name">Nom de l'artisan
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="nameArt" name="nameArt" class="form-control">
                                      <?php foreach ($arti as $art){?>
                                        <option> <?php echo $art->nom_gerant; ?> </option>
                                      <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="name">Montant du devis <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="montant_devis_art" class="form-control col-md-7 col-xs-12"
                                           name="montant_devis_art" placeholder="" required="required"
                                           type="text">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    Détail de devis de l'artisan
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <p style="margin-top: 9px !important">
                                        <label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis_art" id="oui" value="oui" >
                                        <label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis_art" id="non" value="non" checked="">
                                    </p>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="name">Devis de l'artisan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn_activ btn btn-info">
                                        <input id="file_art" name="fileTest" type="file" multiple disabled="">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                 <div class="x_panel" id="div_garantie" style="display: none; height: 40px !important;">
                    <div class="x_title">
                        <h5>Garantie du propriétaire</h5>
                    </div>

                    <div class="x_content" >
                        <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Fichier de la garantie<span class="required">*</span>
                               </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                               <input type="file" name="file">

                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group" >
                    <div class="col-md-11 col-sm-12 col-xs-12 " style="margin-left: 16px;">
                        <a href="#" id="montantTotal" type="button" style="float: right;">MONTANT TOTAL DES DEVIS:  
                            <b><span id="totalDevis"> 0.0 € </span></b> 
                        </a>  
                    </div>
                    <input type="text" name="valeurDevis" id="valeurDevis">
                </div>

                    <div class="ln_solid"></div>
                        <div class="form-group">
                            <center>
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="AfficheArti" type="button" class="btn btn-round btn-success"><span class="fa fa-plus-square-o"></span>&nbsp; AJOUTER UN AUTRE DEVIS</button>

                                </div>
                            </center>
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
            </center>
        </div>

    </form>
    </div>


	<br />

</div>


<link href="<?php echo base_url('assets/backend/css/demande/chosen.css')?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/prism.css')?>" rel="stylesheet"/>
<link href="<?php echo base_url('assets/backend/css/demande/jquery.inputfile.css')?>" rel="stylesheet"/>
<script >
    var data__ = [];
    var data2__ = [];
    <?php foreach ($type_art as $trav ){ ?>
         data__.push("<?php echo $trav->name?>");
    <?php } ?>

    <?php foreach ($arti as $art) { ?>
        data2__.push("<?php echo $art->nom_gerant ?>");
    <?php } ?>
</script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.proto.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/site.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/notify.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.inputfile.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/sites/demande/demande.js')?>"></script> 

<script>
    function testDate (){
            var date = new Date();
            date.setDate(date.getDate() - 1);
            var datereturn = date.getDate()  + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear()
            return (datereturn);
        }

    $(function() {
        $('.dateCalendrier').daterangepicker({
            singleDatePicker: true,
            singleClasses: "picker_4",
            startDate: testDate(),
            maxDate:  testDate() ,
            locale: {
                format: 'DD/MM/YYYY'
            }  
        }, 
        function(start, end, label) {
            
        });

        
    });

</script>








