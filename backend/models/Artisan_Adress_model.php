<?php
class Artisan_Adress_model extends CI_Model
{
    //private $table = "artisan_adress";


   public function get_news()
    {
        //table.nom_column
        $this->db->select ( 'artisan.id , artisan.denomination,artisan.nom_gerant
					,adress.id,adress.adress1,adress.adress2' );
        $this->db->join ( 'artisan', 'artisan.id =artisan_id' );
        $this->db->join ( 'adress', 'adress.id = adress_id' );

        $query = $this->db->get('artisan_adress');
        return $query->result();
        /*$query = $this->db->get("artisan");
       return $query->result();*/
    }
    /*public function get_news()
    {
        $query = $this->db->get("artisan");
        return $query->result();
    }*/
    public function create($artisan,$adresse)
    {
        $data = array('artisan_id'=>$artisan,'adress_id'=>$adresse);
        $this->db->insert('artisan_adress',$data);
        return $insert_id=$this->db->insert_id();
        //$query = $this->db->get("artisan");
        //return $query->result();
    }
}
