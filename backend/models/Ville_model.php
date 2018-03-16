<?php
class Ville_model extends CI_Model {
	private $table = "villes";
	private $id = "id_region";

	public function getAllVilles($id) {
		$this->db->group_by('villes.id,villes.nom_ville_fr');
		$query = $this->db->get_where( $this->table, array (
				$this->id => $id 
		) );
		return $query->result_array ();
	}

}