<?php 
class ComposeDevis_model extends CI_Model{
	private $table = 'compose-devis';

	public function add($posts){
		$this->db->insert($this->table, $posts);
		return $insert_id = $this->db->insert_id();
	}  
}  
	