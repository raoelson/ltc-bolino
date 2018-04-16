<?php
class Group_model extends CI_Model {
	private $table = "group";
	private $id = "idgrp";
	public function get_all() {
		$this->db->order_by ( 'namegrp', 'asc' );
		$query = $this->db->get ( $this->table );
		return $query->result_array ();
		;
	}
	public function show($id) {
		$query = $this->db->get_where ( $this->table, array (
				$this->id => $id 
		) );
		return $query->row_array ();
	}
	public function update($posts, $id) {
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}
	public function add($posts) {
		if ($this->getByName ( $posts ['name'] )) {
			return 0;
		} else {
			$this->db->insert ( $this->table, $posts );
			return $this->db->insert_id ();
		}
	}
	public function remove($id) {
		$this->db->delete ( $this->table, array (
				$this->id => $id 
		) );
	}
	public function getByName($name) {
		$this->db->where ( array (
				"namegrp" => $name 
		) );
		$query = $this->db->get_where ( $this->table );
		return $query->row_array ();
	}
}