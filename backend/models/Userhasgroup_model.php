<?php
class Userhasgroup_model extends CI_Model {
	private $table = "user_has_group";
	private $iduser= "user_id";
	public function getWhere($array) {
		$this->db->select ( 'group.namegrp as groupename,user.nameuser as username,user.firstname as firstname,user.password as 
			password,user.idusr,group.idgrp,user_has_group.user_id as usrgrp' );
		$this->db->join ( "user", "idusr = user_id1" );
		$this->db->join ( "group", "idgrp = group_id" );
		$query = $this->db->get_where ( $this->table, $array );
		if ($array != NULL) {
			return $query->row_array ();
		}
		return $query->result_array ();
	}
		
	public function save($posts,$id){
		if(($posts['usergrp']) != ""){
			$this->remove($posts['usergrp']);
			$data = array('user_id'=>$posts['idusr'],'user_id1'=>$posts['idusr'],'group_id'=>$posts['idgroupe']);
		}else{
			$data = array('user_id'=>$id,'user_id1'=>$id,'group_id'=>$posts['idgroupe']);
		}		
		$this->db->insert ( $this->table, $data);
		return $this->db->insert_id ();
	}
	
	public function remove($id) {
		$this->db->delete ( $this->table, array (
				$this->iduser => $id
		) );
	}
}