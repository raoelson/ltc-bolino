<?php
class Affichage_artisan extends CI_Model
{
    //private $table = "";
    private $table = "artisan_adress";


    public function get_news()
    {
        //table.nom_column
        $this->db->select ( 'artisan.id as id_artisan_alias, artisan.artisan_adress_id,artisan.type_artisan_id,artisan.denomination,artisan.nom_gerant,artisan.prenom_gerant
					,artisan.statut,artisan.siren,artisan.code_activite,artisan.libelle_activite,
					artisan.forme_juridique,artisan.date_immatriculation,artisan.date_derniere_rcs,
					artisan.categorie,artisan.montant_actif_passif,artisan.chiffres_affaires,artisan.tranche_effectif,
					artisan.pres_attestation_immat,artisan.pres_kbis,artisan.pres_services_fiscaux,artisan.pers_attestation_clandestin,
					artisan.pres_attestation_decl_social,artisan.pres_attestation_assurance,artisan.pres_rib
					,adress.id as id_adress_alias,adress.adress1,adress.adress2,adress.lieu_dit,adress.cp,adress.ville,adress.pays,
					adress.phone,adress.cellphone1,adress.cellphone2,adress.fax,adress.mail,adress.mail,adress.site_web
					,type_artisan.id,type_artisan.namee'

        );

        $this->db->join ( 'adress', 'artisan.artisan_adress_id = adress.id' );
        $this->db->join ( 'type_artisan', 'artisan.type_artisan_id =type_artisan.id' );
        $query = $this->db->get('artisan');
        return $query->result();
        /*$query = $this->db->get("artisan");
       return $query->result();*/
    }
    public function getWhere($array) {

        $this->db->select ( 'artisan.id as idartisan , artisan.artisan_adress_id,artisan.nombre,artisan.type_artisan_id,artisan.denomination,artisan.nom_gerant,artisan.prenom_gerant
					,artisan.statut,artisan.siren,artisan.code_activite,artisan.libelle_activite,
					artisan.forme_juridique,artisan.date_immatriculation,artisan.date_derniere_rcs,
					artisan.categorie as artcategorie,artisan.montant_actif_passif,artisan.chiffres_affaires,artisan.tranche_effectif,
					artisan.pres_attestation_immat,artisan.pres_kbis,artisan.pres_services_fiscaux,artisan.pers_attestation_clandestin,
					artisan.pres_attestation_decl_social,artisan.pres_attestation_assurance,artisan.pres_rib
					,adress.id as idadress ,adress.adress1,adress.adress2,adress.lieu_dit,adress.cp,adress.ville as adresseVille,adress.pays,
					adress.phone,adress.cellphone1,adress.cellphone2,adress.fax,adress.mail,adress.mail,adress.site_web,
					,type_artisan.id as idtype_art,type_artisan.namee,type_travaux.id,type_travaux.name,type_travaux.artisant_id,
					type_assurance.id,type_assurance.nom,assurance.id,assurance.artisans_id,assurance.nom,assurance.date_deb,
					assurance.date_fin,assurance.telephone,assurance.assureur');

        $this->db->join ( 'adress', 'adress.id = adress_id' );
        $this->db->join ( 'artisan', 'artisan.id = artisan_id' );
        $this->db->join ( 'type_artisan', 'type_artisan.id = artisan.type_artisan_id' );
        $this->db->join ( 'type_travaux', 'type_travaux.artisant_id= artisan.id' );
        $this->db->join ( 'assurance', 'assurance.artisans_id= artisan.id' );
        $this->db->join ( 'type_assurance', 'type_assurance.artisan_assurance_id= artisan.id' );
        //$this->db->join ( 'assurance', 'assurance.artisans_id = artisan.id' );
        //$this->db->join ( "parents", "parents.owner_id = owners.id" );
        //$this->db->join ( "parents", "parents.owner_id = owners.id" );
        //$this->db->join ( "owners", "owners.id =owners_id" );

        $query = $this->db->get_where ( $this->table, $array );
        return $query->result_array ();
    }
    public function affiche_query($id_artisan)
    {
        /*$this->db->where('id',$id_artisan);
        $query=$this->db->get('artisan');*/
        $query = $this->db->query("select * from artisan as art,adress as a,type_artisan as type_art,assurance as assur where art.id=$id_artisan");

        return $query->result();
       /*$this->db->select('*');
        $this->db->from('artisan');
        $this->db->where('id',$id_artisan);
        $query=$this->db->get();
        return $query->result();*/
        //$query = $this->db->get("artisan");
        //return $query->result();
    }
    /*function update_student_id1($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('artisan', $data);
    }*/
    //update artisan + adress + type travaux
    function update()
    {
        $id = $this->input->post('idartisan');
        $idadress = $this->input->post('idadress');
        $idtype_art = $this->input->post('idtype_art');
        $posts = $this->input->post ();

        //type artisan
        $datatype = array (
            //'id'=>$posts['id'],
            'namee'=>$posts['name'],
        );
        $this->db->where('id', $idtype_art);
        $adresse=$this->db->update('type_artisan', $datatype);

        //adress
        $dataadress = array (
            'adress1'=>$posts['adress1'],
            'adress2'=>$posts['adress2'],
            'lieu_dit'=>$posts['lieu_dit'],
            'cp'=>$posts['cp'],
            'ville'=>$posts['ville'],
            'pays'=>$posts['pays'],
            'phone'=>$posts['phone'],
            'cellphone1'=>$posts['cellphone1'],
            'cellphone2'=>$posts['cellphone1'],
            'fax'=>$posts['fax'],
            'mail'=>$posts['mail'],
            'site_web'=>$posts['site_web'],
        );
        $this->db->where('id', $idadress);

         //$this->db->update($dataadress);
        $adresse=$this->db->update('adress', $dataadress);
        $data = array(
            'artisan_adress_id'=>$idadress,
            'denomination'=>$posts['denomination'],
            'nom_gerant'=>$posts['nom_gerant'],
            'nombre'=>$posts['nombree'],
            'prenom_gerant'=>$posts['prenom_gerant'],
            'statut'=>$posts['statut'],
            'siren'=>$posts['siren'],
            'code_activite'=>$posts['code_activite'],
            'libelle_activite'=>$posts['libelle_activite'],
            'forme_juridique'=>$posts['forme_juridique'],
            'date_immatriculation'=>$posts['date_immatriculation'],
            'date_derniere_rcs'=>$posts['date_derniere_rcs'],
            'categorie'=>$posts['categorie'],
            'montant_actif_passif'=>$posts['montant_actif_passif'],
            'chiffres_affaires'=>$posts['chiffres_affaires'],
            'pres_attestation_immat'=>$posts['pres_attestation_immat'],
            'pres_kbis'=>$posts['pres_kbis'],
            'pres_services_fiscaux'=>$posts['pres_services_fiscaux'],
            'pers_attestation_clandestin'=>$posts['pers_attestation_clandestin'],
            'pres_attestation_decl_social'=>$posts['pres_attestation_decl_social'],
            'pres_attestation_assurance'=>$posts['pres_attestation_assurance'],
            'pres_rib'=>$posts['pres_rib'],
        );
        $this->db->where('id', $id);
        $this->db->update('artisan', $data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }
        else{
            return false;
        }
       /* $this->template->title ( 'Gestions des artisans' )->build ( 'artisan/details_artisan',$data);
        $this->output->set_content_type ( 'application/json' )
            ->set_output (json_encode($reponse) );
        $this->db->where('id', $id);
        $this->db->update('artisan', $data);*/
    }

}
