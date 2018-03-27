
<div class="modal fade" id="modal_artisan" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="head modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="titre modal-title custom_align" id="Heading">Ajout de rendez-vous</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="categorie">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           id="addclass" for="name">Nom tournée<span class="required">*</span></label>
                                    <div class="col-sm-6 col-sm-6 col-xs-12">
                                        <input type="text"  id="denomination2"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                               required="required"  placeholder="Nom tourné..." name="denomination">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           id="addclass" for="name">Date du rendez-vous<span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="single_calb form-control" id="date_immatriculation" name="date_immatriculation" >
                                    </div>

                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           id="addclass" for="name">Heure du rendez-vous<span class="required">*</span></label>
                                    <div class="col-sm-6 col-sm-6 col-xs-12">
                                        <input type="date"  id="denomination2"  class="bfh-timepicker form-control col-md-7 col-xs-12"
                                               required="required"  placeholder="Nom entreprise..." name="denomination">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer ">
                <div class="lp">
                    <button class="btn btn-primary">
                        Echange
                    </button>
                    <button type="button" class="ajout_categorie btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Terminer</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Annuler</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


//create artisan
<!--*******************************************script view_ajout*************************************-->
<script>
    /* function appelFonction(dataValue,idCible){
         console.log($(dataValue));
        //console.log($('#'+idCible).val());
         console.log($(idCible).val());


         //var contents = $('#contents').get(0);

        if(idCible == 1){
             $(dataValue).val("OK");
             //var cible=
         }
         else
             $(dataValue).val("yOK");

         //console.log(data);
     }*/
    $(document).on('click', '.voir_artisan', function () {
        var id_artisan =$(this).attr("id");
        $.ajax({
            url:"<?php echo base_url()?>admin.php/artisan/edit_artisan",
            method: "POST",
            data:{id_artisan: id_artisan},
            dataType: "json",
            success:function(data) {
                console.log(data)
                $('#profil_artisan').show(500);
                $('#list_artisan').hide(500);
                $('#id_artisan').val(id_artisan);
                //appelFonction(id_artisan, id_artisan);
                //appelFonction(pres_attestation_immat,'#pres_attestation');
                $('#denomination').val(data.denomination);
                //$('#denomination1').val(data.denomination);
                $('#nom_gerant').val(data.nom_gerant);
                $('#prenom_gerant').val(data.prenom_gerant);
                $('#statut').val(data.statut);
                $('#siren').val(data.siren);
                $('#code_activite').val(data.code_activite);
                $('#libelle_activite').val(data.libelle_activite);
                $('#forme_juridique').val(data.forme_juridique);
                $('#date_immatriculation').val(data.date_immatriculation);
                $('#date_derniere_rcs').val(data.date_derniere_rcs);
                $('#typecategorie_edit').val(data.categorie);
                $('#montant_actif_passif').val(data.montant_actif_passif);
                $('#chiffres_affaires').val(data.chiffres_affaires);
                $('#tranche_effectif1').val(data.tranche_effectif);
                $('#pres_attestation_immat').val(data.pres_attestation_immat);
                //pres_services_fiscaux
                /*if(data.pres_services_fiscaux == 1){
                    $('#pres_services_fiscaux').val("OK");
                }
                else
                    $('#pres_services_fiscaux').val("NOT OK");

 */
                if(data.pres_attestation_immat == 1){
                    $('#pres_attestation_immat').val("OK");
                }
                else
                    $('#pres_attestation_immat').val("NOT OK");

                if(data.pres_kbis == 1){
                    $('#pres_kbis').val("OK");
                }
                else
                    $('#pres_kbis').val("NOT OK");

                if(data.pers_attestation_clandestin == 1){
                    $('#pers_attestation_clandestin').val("OK");
                }
                else
                    $('#pers_attestation_clandestin').val("NOT OK");

                if(data.pres_attestation_assurance == 1){
                    $('#pres_attestation_assurance').val("OK");
                }
                else
                    $('#pres_attestation_assurance').val("NOT OK");

                if(data.pres_attestation_decl_social == 1){
                    $('#pres_attestation_decl_social').val("OK");
                }
                else
                    $('#pres_attestation_decl_social').val("NOT OK");

                if(data.pres_rib == 1){
                    $('#pres_rib').val("OK");
                }
                else
                    $('#pres_rib').val("NOT OK");
                $('#adress11').val(data.adress1);
                $('#adress21').val(data.adress2);
                $('#lieu_dit1').val(data.lieu_dit);
                $('#cp1').val(data.cp);
                $('#ville1').val(data.ville);
                $('#pays1').val(data.pays);
                $('#phone1').val(data.phone);
                $('#cellphone11').val(data.cellphone1);
                $('#cellphone21').val(data.cellphone2);
                $('#fax1').val(data.fax);
                $('#mail1').val(data.mail);
                $('#site_web1').val(data.site_web);

                //type assurance
                $('#nom1').val(data.nom);
                $('#date_deb1').val(data.date_deb);
                $('#date_fin1').val(data.date_fin);
                $('#assureur1').val(data.assureur);
                $('#telephone1').val(data.telephone);



            },
            error:function()
            {
                alert('errooooooooooooooooooooooo');
                window.location.reload();

            }

        });

        // var artisan_id = $(this).attr("id");
        //$('#action').val("edi");

        /* $.ajax({
             url:"<!--?php echo base_url()?>admin.php/artisan/create_artisan",
             method: "POST",
             data: {artisan_id: artisan_id},
             dataType: "json",
             success: function (data) {
                 //alert(data);
                 // fetch_data();
                 //$('#qsm_form')[0].reset();
                 //$('#qsmModal').modal("hide");
                 //$('.up').val(onClick="window.location.reload()");
                 //location.reload();
                 // window.location.reload();
                 //return false;
                 console.log(data)
                 $('#nos_contact_Modal').modal("show");
             }
         });*/
    });
</script>