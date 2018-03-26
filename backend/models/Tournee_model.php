<?php
class Tournee_model extends CI_Model
{
    //private $table = "";
    private $table = "artisan_adress";
    /*public function getrendez_vous($array) {

        $this->db->select ( 'owners.id as clientid, owners.firstname1 as clientNom,owners.firstname2 as clientPrenom
					,owners.firstname3 as clientUsagenom,DATE_FORMAT(owners.birthdate, "%d/%m/%Y") as clientDate,owners.birthplace as clientPlace
					,owners.familysituation as clientSituation,owners.aide_organisme as clientAide,owners.nom_organisme as clientOrganisme
					,owners.montant_aide as clientMontant,owners.type_travaux_finan as clienttp,owners.etat as clientEtat,
					,adress.adress1 as adresseAdresse1,adress.adress2 as adresseAdresse2,
					,adress.id as adresseId,adress.lieu_dit as adresseLieu,
					adress.cp as adresseCp,adress.ville as adresseVille,
					adress.pays as adressePays,adress.phone as adressePhone,adress.region as adresseRegion,
					adress.cellphone1 as adresseCellphone,adress.mail as adresseMail,adress.fax as adresseFax,
					');

        $this->db->join ( "owners", "owners.id =owners_id" );
        $this->db->join ( "adress", "adress.id = adress_id" );

        if(is_array ($array)){
            $query = $this->db->get_where ( $this->table, $array );
            return $query->result_array ();
        }else{
            $this->db->group_by('owners.id');
            $query = $this->db->get( $this->table, $array );
            return $query->result_array ();
        }
    }*/
//demande.id as demandeid, demande.num_dossier_arrivee, demande.date_arrivee,demande.num_dossier_valide,
    //affichage tableau rendez-vous
    public function get_demande(){
        $this->db->select('owners.id,owners.firstname1, owners.firstname2,
		                   adress.id as id_adress,adress.adress1,adress.lieu_dit,adress.ville,adress.pays,
		                    detail_tournee.id,detail_tournee.owner_id_t,detail_tournee.adress_id_t,detail_tournee.demande_id_t,detail_tournee.present,
		                    tournee.id,tournee.nom_tournee,tournee.date_tournee,tournee.detail_tournee_id,
		                    demande.id as demandeid, demande.num_dossier_arrivee, demande.date_arrivee,demande.num_dossier_valide
		                    ');
        $this->db->from('detail_tournee');
        $this->db->join('tournee', 'tournee.id = detail_tournee.id');
        $this->db->join('demande', 'demande.id = detail_tournee.demande_id_t');
        $this->db->join('adress', 'adress.id = detail_tournee.adress_id_t');
        $this->db->join('owners', 'owners.id = detail_tournee.owner_id_t');

        $query = $this->db->get();
        return $query->result_array();
    }
    //function edit propriétaire
    public function affiche_query($id_user)
    {
        //$query = $this->db->query("select * from owners,adress where owners.id=$id_user");

        $this->db->select('demande.id as demandeid, demande.owner_id, demande.housing_id, demande.num_dossier_arrivee, demande.date_arrivee, 
		                    demande.montant_aide_dept, demande.montant_devis, demande.num_dossier_valide, owners.id,owners.title, owners.marriedname, 
		                    owners.firstname1, owners.firstname2,adress.id as id_adress,adress.adress1,adress.lieu_dit,adress.ville,adress.pays,
		                    owner-adress.id,owner-adress.adress_id');
        $this->db->from('demande');
        $this->db->join('owners', 'owners.id = owner_id');
        $this->db->join('owner-adress', 'owner-adress.owners_id = owners.id');
        $this->db->join('adress', 'adress.id = owner-adress.adress_id');
        $this->db->where("owners.id",$id_user);
        $query = $this->db->get();
        return $query->result();

    }
    //tourne model
    public function create_tournee_query($data)
    {
        $this->db->insert('tournee',$data);
        return $insert_id=$this->db->insert_id();
    }

    //detail tourner model
    public function create_detail_tournee_query($data)
    {
        $this->db->insert('detail_tournee',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }





}
