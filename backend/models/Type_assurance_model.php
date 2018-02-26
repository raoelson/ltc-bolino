<?php
class Type_assurance_model extends CI_Model
{

    public function __construct()
    {
        //$this->load->database();
    }

    public function create_artisan_query($data)
    {
        $this->db->insert('type_assurance',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }
}