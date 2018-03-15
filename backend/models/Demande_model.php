<?php 
class Demande_model extends CI_Model{
	private $table = "demande";
	private $table2 = "owners";
	private $table3 = 'housing';
	private $id = 'id';
	
 
	public function add($posts){

		$this->db->insert($this->table, $posts);
		return $insert_id = $this->db->insert_id();
	}

	public function getOwnerId($nom){
		$this->db->select('id')->from($this->table2)->where('marriedname', $nom);
		$query = $this->db->get();
		return $query->result();
		
	}


	/*public function get_all(){
		$query = $this->db->get($this->table);
		return $query->result_array();
	}*/

	public function get_all(){
		$this->db->select('demande.id as demandeid, demande.owner_id, demande.housing_id, demande.num_dossier_arrivee, demande.date_arrivee, demande.montant_aide_dept, demande.montant_devis, demande.num_dossier_valide, owners.id, owners.title, owners.marriedname, owners.firstname1, owners.firstname2, owners.type_travaux_finan');
		$this->db->from('demande');
		$this->db->join('owners', 'owners.id = demande.owner_id');
		$query = $this->db->get();
		return $query->result_array();
	}



	//Details
	public function modificationclient($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}

}