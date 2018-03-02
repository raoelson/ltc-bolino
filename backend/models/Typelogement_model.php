<?php
class Typelogement_model extends CI_Model {
	private $table = "type_housing";
	private $id = "id";
	

	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}

	public function updates($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}

}