<?php
class Droits_model extends CI_Model {
	private $table = "droits";
	private $id = "iddroit";
	public function get_all($array) {
		if($array != "NULL"){
			$query = $this->db->get_where($this->table,array('idgroup'=>$array));
			return $query->result_array();
		}
		$query = $this->db->get( $this->table );
		return $query->result_array ();
	}
	
	public function update($posts, $id) {
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}
	public function add($posts) {
		if ($this->getByName ( $posts ['menu'], $posts ['idgroup'])) {
			return 0;
		} else {
			$this->db->insert ( $this->table, $posts );
			return $this->db->insert_id ();
		}
	}
	
	public function getByName($name,$grp) {
		$this->db->where ( array (
				"menu" => $name 
		) );
		$this->db->where ( array (
				"idgroup" => $grp
		) );
		$query = $this->db->get_where ( $this->table );
		return $query->row_array ();
	}
	
	public function get_allByGroup($idgroup) {
		$this->db->where ( array (
				"idgroup" => $idgroup
		) );;
		$this->db->order_by ( 'menu', 'asc' );
		$query = $this->db->get ( $this->table );
		return $query->result_array ();
	}
	
	public function remove(){
		$this->db->empty_table($this->table);
	}
	
}