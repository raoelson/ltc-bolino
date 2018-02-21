<?php
class Affichage_artisan extends CI_Model
{
    //private $table = "artisan_adress";


    public function get_news()
    {
        //table.nom_column
        $this->db->select ( 'artisan.id , artisan.artisan_adress_id,artisan.type_artisan_id,artisan.denomination,artisan.nom_gerant,artisan.prenom_gerant
					,artisan.statut,artisan.siren,artisan.code_activite,artisan.libelle_activite,
					artisan.forme_juridique,artisan.date_immatriculation,artisan.date_derniere_rcs,
					artisan.categorie,artisan.montant_actif_passif,artisan.chiffres_affaires,artisan.tranche_effectif,
					artisan.pres_attestation_immat,artisan.pres_kbis,artisan.pres_services_fiscaux,artisan.pers_attestation_clandestin,
					artisan.pres_attestation_decl_social,artisan.pres_attestation_assurance,artisan.pres_rib
					,adress.id,adress.adress1,adress.adress2,adress.lieu_dit,adress.cp,adress.ville,adress.pays,
					adress.phone,adress.cellphone1,adress.cellphone2,adress.fax,adress.mail,adress.mail,adress.site_web
					,type_artisan.id,type_artisan.name'

        );

        $this->db->join ( 'adress', 'artisan.artisan_adress_id = adress.id' );
        $this->db->join ( 'type_artisan', 'artisan.type_artisan_id =type_artisan.id' );

        $query = $this->db->get('artisan','adress','type_artisan');
        return $query->result();
        /*$query = $this->db->get("artisan");
       return $query->result();*/
    }
    /*public function get_news()
    {
        $query = $this->db->get("artisan");
        return $query->result();
    }*/
  /*  public function create($artisan,$adresse)
    {
        $data = array('artisan_id'=>$artisan,'adress_id'=>$adresse);
        $this->db->insert('artisan_adress',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }*/
}
