<?php 
class Demande_model extends CI_Model{
	private $table = "demande";
	private $id = 'id';
	

	public function add($posts){

		$this->db->insert($this->table, $posts);
		return $insert_id = $this->db->insert_id();
	}

	public function getOwnerId($nom){
		$this->db->select('id')
            ->from('owners')
            ->where('firstname1', $nom);
            //->where('housing.owner_id', 'owners.id');
		//$this->db->join('housing', 'housing.owner_id = owners.id');
		$query = $this->db->get();
		return $query->result();
		
	}

	 /*public function getHousingId($id){
	    $this->db->select('id')->from('housing')->where('owner_id', $id);
	    $query = $this->db->get();
    }*/


	public function get_all(){
		$this->db->select('demande.id as demandeid, demande.owner_id, demande.housing_id, demande.num_dossier_arrivee, demande.date_arrivee, 
		                    demande.montant_aide_dept, demande.montant_devis, demande.num_dossier_valide, owners.id,owners.title, owners.marriedname, 
		                    owners.firstname1, owners.firstname2, owners.type_travaux_finan, adress.adress1, demande.statut');
		$this->db->from('demande');
		$this->db->join('owners', 'owners.id = owner_id');
		$this->db->join('owner-adress', 'owner-adress.owners_id = owners.id');
		$this->db->join('adress', 'adress.id = owner-adress.adress_id');
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