<?php
class Logements_model extends CI_Model {
	private $table = "housing";
	
	public function getWhere($array) {
		
		$this->db->select ('housing.id as idLog,type_housing.name as typeLog,type_housing.id as typeIdLog,log_proprietaire as proprieteLog,log_locataire as locataireLog,log_occupant_gratuit as 							occupantLog,foncier_proprietaire as profoncierLog,foncier_locataire as foncierlocataireLog,
							foncier_indivision as foncierdivisionLog,foncier_occupant_gratuit as foncieroccupantLog,
							area as regionLog,numberpieces as pieceLog,numberpersons as persLog,DATE_FORMAT(buildDate, "%d/%m/%Y") as dateLog,
							housing.owner_id as idClient,housing.adresseetat as adresseetat,
							beton,bois_dulcifie,bois,tole,electricite,autres_mat,cuisine,salle_eau,wc,eau_potable,tout_a_egout,
							fosse_septique,adress1_sec,adress2_sec,postalcode_sec,town_sec,type_travaux.name as typetravaux,type_travaux.id as idtypetravaux');
		
		$this->db->join ( "owners", "owners.id =housing.owner_id" );
		$this->db->join ( "type_housing", "type_housing.id =type_housing_id" );
		$this->db->join ( "travaux", "travaux.housing_id = housing.id" );
		$this->db->join ( "type_travaux", "type_travaux.id = travaux.type_travaux_id" );

		if($array == "NULL")	{
			$query = $this->db->get ( $this->table );			
		}					
		else{
			$query = $this->db->get_where ( $this->table, $array );

		}	
		return $query->row_array ();	
	}

	public function updates($posts,$id){
		$this->db->update ( $this->table, $posts, array (
				'id' => $id 
		) );
	}
	public function add($posts) {
		$this->db->insert ( $this->table, $posts);
		return $this->db->insert_id ();
	}
			
}