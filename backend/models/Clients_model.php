<?php
class Clients_model extends CI_Model {
	private $table = "owners";
	private $id = "id";
	
	public function get_all() {
		
		$query = $this->db->get ( $this->table );
		return $query->result_array ();
	}
		
	public function getByName($name, $first) {
		$this->db->where ( array (
				"firstname1" => $name,
				"firstname2" => $first 
		) );
		$query = $this->db->get_where ( $this->table );
		return $query->row_array ();
	}
	
	public function add($posts) {
		if ($this->getByName ( $posts ['firstname1'], $posts ['firstname2'] )) {
			return 0;
		} else {			
			$this->db->insert ( $this->table, $posts);
			return $this->db->insert_id ();
		}
	}
	
	public function getWhere($array) {		
		$this->db->select ( 'parents.id as parentid,parents.name as parentName,parents.firstname as parentPrenom' );
		$this->db->join ( "parents", "parents.owner_id = owners.id" );		
		$query = $this->db->get_where ( $this->table, $array );
		return $query->result_array ();
	}
}