<?php
class Artisansechanges_model extends CI_Model {
	private $table = "artisans_echanges";
	
	public function getWhere($array,$id) {
		
		$this->db->select ( 'artisan.nom_gerant as nomArtisan,artisan.prenom_gerant as prenomArtisan,
                            artisan.id as idArtisan,
							echanges.motif as motifEchanges,echanges.date as dateEchanges
							,echanges.telephones as phonesEchanges,echanges.mails as mailsEchanges
							,echanges.messages as messagesEchanges,echanges.code_confirmation as codeEchanges
							,echanges.commentaires as commentaireEchanges,echanges.daterappel as rappelEchanges
							,echanges.id as idEchanges');
		
		$this->db->join ( "artisan", "artisan.id =artisans_echanges.artisans_id" );
		$this->db->join ( "echanges", "echanges.id = artisans_echanges.echanges_id" );
		$this->db->join ( "type_echange","type_echange.id = echanges.type_echange_id");
		
		if(is_array ($array)){
			$query = $this->db->get_where ( $this->table, $array );
			return $query->result_array ();
		}else{
			$this->db->limit(NB_PAGES(),0);
			$this->db->group_by('artisan.id');
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
		
	public function save($idartisan,$id){
		$data = array('artisans_id'=>$idartisan,'echanges_id'=>$id);
		$this->db->insert ( $this->table, $data);
		return $this->db->insert_id ();
	}

	public function remove($id,$echange) {
		$this->db->delete ( $this->table, array (
				'artisans_id' => $id,
				'echanges_id' => $echange
		) );
	}

	public function getLimit($val,$array=null){
		$this->db->select ( 'artisan.nom_gerant as nomArtisan,artisan.prenom_gerant as prenomArtisan,
                            artisan.id as idArtisan,
							echanges.motif as motifEchanges,echanges.date as dateEchanges
							,echanges.telephones as phonesEchanges,echanges.mails as mailsEchanges
							,echanges.messages as messagesEchanges,echanges.code_confirmation as codeEchanges
							,echanges.commentaires as commentaireEchanges,echanges.daterappel as rappelEchanges
							,echanges.id as idEchanges');
		
		$this->db->join ( "artisan", "artisan.id =artisans_echanges.artisans_id" );
		$this->db->join ( "echanges", "echanges.id = artisans_echanges.echanges_id" );
		$this->db->join ( "type_echange","type_echange.id = echanges.type_echange_id");
		$this->db->group_by('artisan.id');
		$this->db->limit(NB_PAGES(),($val-1) * NB_PAGES());
		if ($array) $this->db->where($array);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
}