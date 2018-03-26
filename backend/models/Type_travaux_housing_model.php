<?php
class Type_travaux_housing_model extends CI_Model {

	private $table = "type_travaux";
	private $id = "id";
	

	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}

	public function updates($posts,$id){
		$this->db->update ( 'type_travaux', $posts, array (
				'id' => $id
		) );
	}
}