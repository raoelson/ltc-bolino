<?php
class Devis_model extends CI_Model{
    private $table = 'devis';  

    public function add($posts){
        $this->db->insert($this->table, $posts);
        return $insert_id = $this->db->insert_id();
    }

    public function get_all($id){
        $this->db->select('devis.id, devis.montant, devis.num_devis, devis.statut_devis, devis.date_devis, devis.prestataire_id,
            compose-devis.devis_id, compose-devis.demande_id, demande.id, artisan.id, artisan.nom_gerant, artisan.type_artisan_id, type_artisan.id, type_artisan.namee')
            ->join('compose-devis', 'compose-devis.devis_id = devis.id')
            ->join('demande', 'demande.id = compose-devis.demande_id')
            ->join('artisan', 'artisan.id = devis.prestataire_id')
            ->join('type_artisan', 'type_artisan.id = artisan.type_artisan_id')
            ->where(array("demande.id" => $id) );
        $query = $this->db->get_where($this->table);
        return $query->result_array(); 
    }

    public function getArtId($nomArtisan){
        $this->db->select('id')
        ->from('artisan')
       ->where('nom_gerant', $nomArtisan);
       $query = $this->db->get();
       return $query->result();
    }
}