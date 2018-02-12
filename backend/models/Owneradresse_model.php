<?php
class Owneradresse_model extends CI_Model {
	private $table = "owner-adress";
	
	public function getWhere($array) {
		
		$this->db->select ( 'owners.id as clientid, owners.firstname1 as clientNom,owners.firstname2 as clientPrenom
					,owners.birthdate as clientDate,owners.birthplace as clientPlace
					,owners.aide_organisme as clientAide,owners.nom_organisme as clientOrganisme
					,owners.montant_aide as clientMontant
					,adress.id as adresseId,adress.lieu_dit as adresseLieu,
					adress.cp as adresseCp,adress.ville as adresseVille,
					adress.pays as adressePays,adress.phone as adressePhone,
					adress.cellphone1 as adresseCellphone,adress.mail as adresseMail,
					parents.id as parentsId,parents.name as parentsNom,parents.firstname as parentsPrenom' );
		
		$this->db->join ( "owners", "owners.id =owners_id" );
		$this->db->join ( "adress", "adress.id = adress_id" );
		$this->db->join ( "parents", "parents.owner_id = owners.id" );
		
		$query = $this->db->get_where ( $this->table, $array );
// 		if ($array != NULL) {
// 			return $query->row_array ();
// 		}
		return $query->result_array ();
	}
		
	public function save($idClient,$id){
		$data = array('owners_id'=>$idClient,'adress_id'=>$id);
		$this->db->insert ( $this->table, $data);
		return $this->db->insert_id ();
	}
	
	public function remove($id) {
		$this->db->delete ( $this->table, array (
				$this->iduser => $id
		) );
	}
}