<?php foreach ($modif as $mod ) { ?>
    <input type="text" value="<?php echo $mod['num_devis']; ?>" name="">
<?php } ?>


<div class="row tile_count"></div>

<div class="row">
	<div class="page-title">
		<div  >
            <div class="col-md-12 ">
                <a href="<?php echo base_url('admin.php/demande')?>" id="nouveau" class="btn btn-success"
                    style="width: 15%" type="button"><span class="gly fa fa-angle-left"></span>&nbsp; Retour</a>
            </div>
        </div>
	</div>


        <form class="form-horizontal form-label-left" novalidate
        action="<?php echo base_url('admin.php/demande/modif');?>"
        method="post">

        <input type="text" name="idInfoDemande" value="<?php echo $data[0]['demandeid']; ?>" />
        <input type="hidden" name="nombreDevis" value="1"/>
        <?php
            $k =  $modif[0]['nombreDevis'];
            echo $k;
        ?>
        <div class="row" id="ancre">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">
                    <div class="x_title">
                        <h5>Propriétaire</h5>
                    </div>

                    <div class="x_content">
                        <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                   for="name">Nom de naissance<span class="required">*</span>
                               </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                               <select class="form-control col-md-7 col-xs-12" name="nom" id="nomProp" data-placeholder="Le Nom du Propriétaire" >

                                            <option value="<?php echo $modif[0]['firstname1'] ?>" selected ><?php echo $modif[0]['firstname1']; ?></option>


                                        <?php foreach ($reste as $re) { ?>
                                            <option><?php echo $re->firstname1; ?></option>
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
                                <input id="date_arrivee" class="form-control col-md-7 col-xs-12  single_cal"
                                       name="date_arrivee" placeholder="" required="required"
                                       type="date" value="<?php echo $modif[0]['date_arrivee']; ?>">
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
                                <input id="num_dossier_valide" class="form-control col-md-7 col-xs-12" name="num_dossier_valide"  type="text" required="" value="<?php echo $mod['num_dossier_valide']; ?>">
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
                                           for="name">Type de l'artisan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="nameArt1" name="nameArt1" class="form-control">
                                            <?php foreach ($modif as $mod ){ ?>
                                                <option value=""><?php echo $mod['namee']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">Nom de l'artisan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="nomArt1" name="nomArt1" class="form-control">
                                            <?php foreach ($modif as $mod){ ?>
                                                <option value=""><?php echo $mod['nom_gerant'] ; ?></option>
                                            <?php }?>

                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="name">N° du Devis<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="num_devis1" class="form-control col-md-7 col-xs-12" name="num_devis1" type="text" required="" value="<?php  echo $modif[$k-1]['num_devis']; ?>">
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
                                        <input id="montantDevis1" class="form-control col-md-7 col-xs-12"
                                               name="montantDevis1" placeholder="" required="required"
                                               type="text" value="<?php echo $modif[0]['montant']; ?>">
                                    </div>
                                </div>

                                <input type="hidden" name="montantTotalDevisPrincipal">

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
                    <input type="hidden" name="valeurDevis" id="valeurDevis">
                </div>

                    <!-- <div class="ln_solid"></div>
                        <div class="form-group">
                            <center>
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="AfficheArti" type="button" class="btn btn-round btn-success"><span class="fa fa-plus-square-o"></span>&nbsp; AJOUTER UN AUTRE DEVIS</button>

                                </div>
                            </center>
                        </div> -->

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
<script src="<?php echo base_url('assets/backend/js/demande/chosen.proto.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/site.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/notify.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/demande/jquery.inputfile.js')?>"></script>
<script src="<?php echo base_url('assets/backend/js/sites/demande/demande.js')?>"></script>
<script>
    var wrapper = $("#div_devis");
    var a = <?php echo $modif[0]['nombreDevis']; ?>;
    var w;
    //alert(a);
    data="";


    for (w=1; w<a; w++){
      <?php $ww = "echo " ?>

        data += '<div class="ln_solid"></div> ';
        data += '<div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="name">Type de l\'artisan</label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<select id="nameArt'+(w+1)+'" name="nameArt'+(w+1)+'" class="form-control">';
        data += '<?php foreach($modif as $mod){?><option value=""><?php echo $mod['namee']; ?></option> <?php } ?>';
        data += '</select>';
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom de l\'artisan </label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<select id="nomArt'+(w+1)+'" name="nomArt'+(w+1)+'" class="form-control">';
        data += '<?php foreach($modif as $mod){?><option value="" class=""><?php echo $mod['nom_gerant']; ?></option><?php } ?>';
        data += '</select>'
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">N° du Devis<span class="required">*</span></label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<input id="num_devis'+(w+1)+'" class="form-control col-md-7 col-xs-12" name="num_devis'+(w+1)+'" type="text" required="" value="">';
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += ' <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Date du Devis <span class="required">*</span> </label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += ' <input id="date_devis'+(w+1)+'" class="form-control col-md-7 col-xs-12 dateCalendrier" name="date_devis'+(w+1)+'" required="required" type="text">';
        data +='</div>';
        data+= '</div>';
        data += ' <div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Montant du devis <span class="required">*</span>';
        data += '</label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<input id="montantDevis'+(w+1)+'" class="form-control col-md-7 col-xs-12" name="montantDevis'+(w+1)+'" placeholder="" required="required" type="text" value="<?php echo $modif[1]['montant']; ?>">';
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" >Statut du devis</label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<select id="statutDevis'+(w+1)+'" name="statutDevis'+(w+1)+'" class="form-control">';
        data += '<option value="En cours">En cours</option>';
        data += '<option value="Validé">Validé</option>';
        data += '<option value="Refusé">Refusé</option>';
        data += '</select>';
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += ' <label class="control-label col-md-3 col-sm-3 col-xs-12">Détail du devis';
        data += '</label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += ' <p style="margin-top: 9px !important">';
        data += '<label for="oui">Oui:</label> <input type="radio" class="flat" name="detail_devis_art'+(w+1)+'" id="oui" value="oui" >';
        data += '<label for="non">Non:</label> <input type="radio" class="flat" name="detail_devis_art'+(w+1)+'" id="non" value="non" checked="">';
        data += '</p>';
        data += '</div>';
        data += '</div>';
        data += '<div class="item form-group">';
        data += '<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Devis de l\'artisan';
        data += '</label>';
        data += '<div class="col-md-6 col-sm-6 col-xs-12">';
        data += '<input id="file_art'+(w+1)+'" name="fileTest'+(w+1)+'" type="file"  disabled="">';
        data += '<input type="hidden" name="montantDev'+(w+1)+'">'
        data += '</div>';
        data += '</div>';
        data += '<input type="hidden" name="montantTotalDevis'+(w+1)+'">';


        $("ins.iCheck-helper").click(function() {

            //SI RADIO --DETAIL DEVIS ARTISAN--
            var etatCheck = $(this).prev('input[name = "detail_devis_art'+(w+1)+'"]').val();
            if(etatCheck == "oui"){
                $('#file_art'+(w+1)+'').removeAttr("disabled");
            }else if(etatCheck == "non"){
                $('#file_art'+(w+1)+'').attr('disabled', 'disabled');
            }
        });
    }

    $(wrapper).append(data);



</script>
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
