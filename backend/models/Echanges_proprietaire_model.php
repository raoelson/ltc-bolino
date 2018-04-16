<?php
class Echanges_proprietaire_model extends CI_Model {
	private $table = "echanges";
	private $id = "id";
	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}
	
	public function modification($posts,$id){
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