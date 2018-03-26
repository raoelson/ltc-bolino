<?php
class Type_artisan extends CI_Model
{

    public function __construct()
    {
        //$this->load->database();
    }

    public function create_artisan_query($data)
    {
        $this->db->insert('type_artisan',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }
    //liste deroulant dynamic sans repetition
    //type artisan
    public function create_art_query($data)
    {
        $this->db->insert('type_art',$data);
        return $insert_id=$this->db->insert_id();
    }

    public function art_query()
    {
        $this->db->select('*');
        $query=$this->db->get('type_art');
        return $query->result();
    }

    //type categorie
    public function cat_query()
    {
        $this->db->select('*');
        $query=$this->db->get('categorie');
        return $query->result();
    }

    public function create_categorie_query($data)
    {
        $this->db->insert('categorie',$data);
        return $insert_id=$this->db->insert_id();
    }

    //type assurance
    public function type_as_query()
    {
        $this->db->select('*');
        $query=$this->db->get('type_as');
        return $query->result();
    }
    public function create_assurance_query($data)
    {
        $this->db->insert('type_as',$data);
        return $insert_id=$this->db->insert_id();
    }

    //type travaux
    public function type_travaux_query()
    {
        $this->db->select('*');
        $query=$this->db->get('list_travaux');
        return $query->result();
    }
    public function create_travaux_query($data)
    {
        $this->db->insert('list_travaux',$data);
        return $insert_id=$this->db->insert_id();
    }

}