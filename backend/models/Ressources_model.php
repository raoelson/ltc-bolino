<?php
class Ressources_model extends CI_Model {
	private $table = "resources";
	private $id = "id";
		
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}
	
	public function getWhere($array){
		$this->db->select ('resources.id as ressourcesId,resources.montant as ressourcesMontat');
		$this->db->join ( "type_resources", "type_resources.id =resources.type_resource_id" );
		$query = $this->db->get_where ( $this->table, $array );
		return $query->row_array ();
	}

	public function modificationressources($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id 
		) );
	}

	public function remove($id) {
		$this->db->delete ( $this->table, array (
				'owner_id' => $id
		) );
	}
}