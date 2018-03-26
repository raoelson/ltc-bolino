<?php
class Ownerechanges_model extends CI_Model {
	private $table = "owner_echanges";
	
	public function getWhere($array,$id) {
		
		$this->db->select ( 'owners.id as clientid, owners.firstname1 as clientNom,owners.firstname2 as clientPrenom,
							echanges.motif as motifEchanges,echanges.date as dateEchanges
							,echanges.telephones as phonesEchanges,echanges.mails as mailsEchanges
							,echanges.messages as messagesEchanges,echanges.code_confirmation as codeEchanges
							,echanges.commentaires as commentaireEchanges,echanges.daterappel as rappelEchanges
							,echanges.id as idEchanges');
		
		$this->db->join ( "owners", "owners.id =owner_echanges.owner_id" );
		$this->db->join ( "echanges", "echanges.id = owner_echanges.echange_id" );
		$this->db->join ( "type_echange","type_echange.id = echanges.type_echange_id");

		if(is_array ($array)){
			$query = $this->db->get_where ( $this->table, $array );
			return $query->result_array ();
		}else{
			$this->db->group_by('owners.id');
			if($id == ""){
				$query = $this->db->get( $this->table);
				return $query->result_array ();
			}else{
				$this->db->like($id);
				$query = $this->db->get( $this->table);
				return $query->result_array ();
			}
		}
	}
		
	public function save($idClient,$id){
		$data = array('owner_id'=>$idClient,'echange_id'=>$id);
		$this->db->insert ( $this->table, $data);
		return $this->db->insert_id ();
	}
	
	public function remove($id,$adress) {
		$this->db->delete ( $this->table, array (
				'owners_id' => $id,
				'adress_id' => $adress
		) );
	}

}