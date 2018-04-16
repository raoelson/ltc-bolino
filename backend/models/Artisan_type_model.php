<?php
class Artisan_type_model extends CI_Model
{
    //private $table = "artisan_adress";


    public function get_news()
    {

    }
    /*public function get_news()
    {
        $query = $this->db->get("artisan");
        return $query->result();
    }*/
    public function create_type($type_artisan,$artisan)
    {
        $data = array('type_artisan_id'=>$artisan,'id'=>$type_artisan);
       // $data=$type_artisan==$artisan;
        $this->db->insert('artisan',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }


}
