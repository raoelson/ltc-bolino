<?php
class Demande_model extends CI_Model{
	private $table = "demande";
	private $id = 'id';


	public function add($posts){

		$this->db->insert($this->table, $posts);
		return $insert_id = $this->db->insert_id();
	}

	public function getOwnerId($nom){
		$this->db->select('id')
            ->from('owners')
            ->where('firstname1', $nom);
		$query = $this->db->get();
		return $query->result();

	}

	public function art_query()
	{
			$this->db->select('*');
			$query=$this->db->get_where('type_art');
			return $query->result_array();
	}

	 public function getTypeArt()
    {
				$this->db->group_by('type_artisan.namee');
        $this->db->select('type_artisan.id, type_artisan.namee, artisan.type_artisan_id')
        ->from('type_artisan')
        ->join('artisan', 'artisan.type_artisan_id = type_artisan.id');
        $query=$this->db->get();
        return $query->result();
    }


	public function get_all(){
		$this->db->select('demande.id as demandeid, demande.owner_id, demande.housing_id, demande.num_dossier_arrivee, demande.date_arrivee,
		                    demande.montant_aide_dept, demande.montant_devis, demande.num_dossier_valide, owners.id,owners.title, owners.marriedname,
		                    owners.firstname1, owners.firstname2, owners.type_travaux_finan, adress.adress1, demande.statut');
		$this->db->from('demande');
		$this->db->join('owners', 'owners.id = owner_id');
		$this->db->join('owner-adress', 'owner-adress.owners_id = owners.id');
		$this->db->join('adress', 'adress.id = owner-adress.adress_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getTravaux(){
		$this->db->select('*');
		$query = $this->db->get('ligne_travaux_proprietaire');
		return $query->result();

	}

	/*public function getInfoClient(){
		$this->db->group_by('marriedname');
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('owners');
		$query = $this->db->get();
		return $query->result_array();
	}*/

	public function gettest($id_user) {

	        $this->db->select ('*');
	        $this->db->from('housing');
	        $this->db->where("housing.owner_id",$id_user);
	        $this->db->join ( "travaux", "travaux.housing_id = housing.id" );
	        $this->db->join ( "type_travaux", "type_travaux.id = travaux.type_travaux_id" );
	        $query = $this->db->get();
	        return $query->result();

	    }




	//Details
	public function modificationdemande($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				$this->id => $id
		) );
	}

}
