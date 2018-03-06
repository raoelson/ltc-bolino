<?php 
class Demande_model extends CI_Model{
	private $table = "demande";

	public function add($posts){

		$this->db->insert($this->table, $posts);
		return $insert_id = $this->db->insert_id();
	}

	/*public function get_all(){
		$query = $this->db->get($this->table);
		return $query->result_array();
	}*/
}