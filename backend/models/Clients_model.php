<?php
class Clients_model extends CI_Model {
	private $table = "owners";
	private $id = "id";
	
	public function get_all() {
		$query = $this->db->get ( $this->table );
		return $query->result_array ();
	}
	
// 	/**
// 	 * Obtenir un user par son name ou firstname
// 	 */
// 	public function getAuth($login) {
// 		$this->db->where ( array (
// 				"nameuser" => $login 
// 		) );
// 		$this->db->or_where ( array (
// 				"firstname" => $login 
// 		) );
// 		$this->db->join("user_has_group","user_id1 = idusr","LEFT");
// 		$query = $this->db->get_where ( $this->table );
// 		return $query->row_array ();
// 	}
	
// 	public function show($id) {
// 		$query = $this->db->get_where ( $this->table, array (
// 				$this->id => $id 
// 		) );
// 		return $query->row_array ();
// 	}
	
// 	public function update($posts, $id) {
// 		if ($posts ['password'] == "") {
// 			$data = array (
// 					'nameuser' => $posts ['name'],
// 					'firstname' => $posts ['firstnameuser'] 
// 			);
// 		} else {
// 			$data = array (
// 					'nameuser' => $posts ['name'],
// 					'firstname' => $posts ['firstnameuser'],
// 					'password' => md5 ( $posts ['password'] ) 
// 			);
// 		}
		
// 		$this->db->update ( $this->table, $data, array (
// 				$this->id => $id 
// 		) );
// 	}
	
// 	public function remove($id) {
// 		$this->db->delete ( $this->table, array (
// 				$this->id => $id 
// 		) );
// 	}
	
	public function getByName($name, $first) {
		$this->db->where ( array (
				"firstname1" => $name,
				"firstname2" => $first 
		) );
		$query = $this->db->get_where ( $this->table );
		return $query->row_array ();
	}
	
	public function add($posts) {
		if ($this->getByName ( $posts ['firstname1'], $posts ['firstname2'] )) {
			return 0;
		} else {			
			$this->db->insert ( $this->table, $posts);
			return $this->db->insert_id ();
		}
	}
}