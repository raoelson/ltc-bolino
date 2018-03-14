<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Travaux_housing_model extends CI_Model {
	private $table = "travaux";
	private $id = "id";
	
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}

}