<?php
class ParentsLink_model extends CI_Model {
	private $table = "link_parents";
	private $id = "id";
	

	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}

	public function modificationLinkParents($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}
}