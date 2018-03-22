<?php
class Devis_model extends CI_Model{
    private $table = 'devis';

    public function add($posts){
        $this->db->insert($this->table, $posts);
        return $insert_id = $this->db->insert_id();
    }

    public function get_all(){
        $this->select('demande.id')
            ->from('devis')
            ->join('compose-devis', 'compose-devis.devis_id = devis.id')
            ->join('demande', 'demande.id = compose-devis.demande_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}