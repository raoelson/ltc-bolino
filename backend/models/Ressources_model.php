<?php
class Ressources_model extends CI_Model {
	private $table = "resources";
	private $id = "id";
		
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}
}