<?php
class Devis_model extends CI_Model{
    private $table = 'devis'; 

    public function add($posts){
        $this->db->insert($this->table, $posts);
        return $insert_id = $this->db->insert_id();
    }

    public function get_all($id){
        $this->db->select('devis.id, devis.montant, devis.num_devis, devis.statut_devis, devis.date_devis, 
            compose-devis.devis_id, compose-devis.demande_id, demande.id')
            ->join('compose-devis', 'compose-devis.devis_id = devis.id')
            ->join('demande', 'demande.id = compose-devis.demande_id')
            ->where(array("demande.id" => $id) );
        $query = $this->db->get_where($this->table);
        return $query->result_array(); 
    }

   /*public function getById($id){
        $this->db->where(array('id' => $id));
        $query = $this->db->get($this->table);
        return $query->row_array();
    }*/

}