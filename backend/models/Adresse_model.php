<?php
class Adresse_model extends CI_Model {
	private $table = "adress";
	private $id = "id";

	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();		
	}

	public function modificationAdresse($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}

	public function remove($id){
		$this->db->delete ( $this->table, array (
				$this->id => $id 
		) );
	}
}