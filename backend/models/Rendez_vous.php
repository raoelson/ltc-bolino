<?php
class Rendez_vous extends CI_Model {
    private $table = "owner-adress";

    public function getWhere($array) {

        $this->db->select ( 'owners.title as indentite,owners.marriedname as nommarie,owners.id as clientid, owners.firstname1 as clientNom,owners.firstname2 as clientPrenom
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
    }



}