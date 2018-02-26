<?php
class Pays_model extends CI_Model {
	private $table = "pays";
	private $id = "id";

	public function getAllPays() {
		
		$query = $this->db->get( $this->table );
		return $query->result_array ();
	}

}