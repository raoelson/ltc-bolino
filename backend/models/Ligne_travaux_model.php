<?php
class ligne_travaux_model extends CI_Model{
  private $table = 'ligne_travaux_proprietaire';

  public function add($posts){
    $this->db->insert_batch('devis-lignetravaux', $posts);
    return $insert_id = $this->db->insert_id();
  }

  public function get_all($id){
    $this->db->select('ligne_travaux_proprietaire.id as lignetravauxid, ligne_travaux_proprietaire.libelle,
              devis-lignetravaux.devis_id, devis-lignetravaux.ligne_travaux_id, devis-lignetravaux.montant_travaux, devis.id, ')
              ->join('devis-lignetravaux', 'devis-lignetravaux.ligne_travaux_id = ligne_travaux_proprietaire.id')
              ->join('devis', 'devis.id = devis-lignetravaux.devis_id')
              ->where(array("devis.id" => $id) );
          $query = $this->db->get_where($this->table);
          return $query->result_array();
  }

  public function test(){
    $this->db->select('owners.id as ownerid, ligne_travaux_proprietaire.libelle')
    ->join('devis-lignetravaux', 'devis-lignetravaux.ligne_travaux_id = ligne_travaux_proprietaire.id')
    ->join('devis', 'devis.id = devis-lignetravaux.devis_id')
    ->join('compose-devis', 'compose-devis.devis_id = devis.id')
    ->join('demande', 'demande.id = compose-devis.demande_id')
    ->join('owners', 'owners.id = owner_id');
    $query = $this->db->get('ligne_travaux_proprietaire');
    return $query->result();
  }


}
