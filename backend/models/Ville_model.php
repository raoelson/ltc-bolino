<?php
class Ville_model extends CI_Model {
	private $table = "regions";
	private $id = "id_pays";

	public function getAllRegions($id) {
		
		$query = $this->db->get_where( $this->table, array (
				$this->id => $id 
		) );
		return $query->result_array ();
	}

}