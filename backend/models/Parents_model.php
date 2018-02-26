<?php
class Parents_model extends CI_Model {
	private $table = "parents";
	private $id = "id";
	

	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}
	
	public function modificationParents($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}

	public function remove($id) {
		$this->db->delete ( $this->table, array (
				'owner_id' => $id
		) );
	}
	
}