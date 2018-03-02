<?php
class Owneradresse_model extends CI_Model {
	private $table = "owner-adress";
	
	public function getWhere($array) {
		
		$this->db->select ( 'owners.title as indentite,owners.marriedname as nommarie,owners.id as clientid, owners.firstname1 as clientNom,owners.firstname2 as clientPrenom
					,owners.firstname3 as clientUsagenom,DATE_FORMAT(owners.birthdate, "%d/%m/%Y") as clientDate,owners.birthplace as clientPlace
					,owners.familysituation as clientSituation,owners.aide_organisme as clientAide,owners.nom_organisme as clientOrganisme
					,owners.montant_aide as clientMontant,owners.type_travaux_finan as clienttp,owners.etat as clientEtat,
					,adress.adress1 as adresseAdresse1,adress.adress2 as adresseAdresse2,
					,adress.id as adresseId,adress.lieu_dit as adresseLieu,
					adress.cp as adresseCp,adress.ville as adresseVille,
					adress.pays as adressePays,adress.phone as adressePhone,
					adress.cellphone1 as adresseCellphone,adress.mail as adresseMail,adress.fax as adresseFax,
					parents.id as parentsId,parents.name as parentsNom,parents.firstname as parentsPrenom,DATE_FORMAT(parents.birthdate, "%d/%m/%Y") as parentsBirthdate,
					link_parents.name as linkparentsNom,link_parents.id as linkparentsId,
					resources.id as ressourcesId,resources.montant as ressourcesMontant');
		
		$this->db->join ( "owners", "owners.id =owners_id" );
		$this->db->join ( "adress", "adress.id = adress_id" );
		$this->db->join ( "parents", "parents.owner_id = owners.id" );
		$this->db->join ( "link_parents", "link_parents.id = parents.link_parent_id" );
		//$this->db->join ( "resources", "resources.owner_id = owners.id" );
		$this->db->join ( "resources", "resources.parent_id = parents.id" );
		
		$query = $this->db->get_where ( $this->table, $array );
		return $query->result_array ();
	}
		
	public function save($idClient,$id){
		$data = array('owners_id'=>$idClient,'adress_id'=>$id);
		$this->db->insert ( $this->table, $data);
		return $this->db->insert_id ();
	}
	
	public function remove($id,$adress) {
		$this->db->delete ( $this->table, array (
				'owners_id' => $id,
				'adress_id' => $adress
		) );
	}

}