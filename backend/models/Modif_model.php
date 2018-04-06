<?php 
class Modif_model extends CI_Model{
	private $table = 'demande';

	public function get_all($id){
		$this->db->select('demande.id, demande.owner_id, demande.date_arrivee, demande.num_dossier_valide, demande.statut, demande.nombreDevis, owners.id, owners.title, owners.marriedname, owners.firstname1, owners.firstname2, owners.firstname3, devis.num_devis, devis.id, devis.prestataire_id, devis.demande_id, devis.montant, devis.statut_devis, devis.date_devis, artisan.nom_gerant,artisan.type_artisan_id, artisan.id, type_artisan.id, type_artisan.namee, ')
		->join('owners', 'owners.id = demande.owner_id')
		->join('compose-devis', 'compose-devis.demande_id = demande.id')
		->join('devis', 'devis.id = compose-devis.devis_id')
		->join('artisan', 'artisan.id = devis.prestataire_id')
		->join('type_artisan', 'type_artisan.id = artisan.type_artisan_id')
		->where(array("demande.id" => $id));
		$query = $this->db->get_where($this->table);
		return $query->result_array();
	}


	public function get_reste($nommodif){
		$this->db->group_by('firstname1');
		$this->db->distinct();
		$this->db->select('firstname1')
		->from('owners')
		->where('firstname1 !=', $nommodif);
		$query = $this->db->get();
		return $query->result();
	}

}