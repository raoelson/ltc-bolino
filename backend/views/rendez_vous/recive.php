
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