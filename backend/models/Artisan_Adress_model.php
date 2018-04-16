<?php
class Artisan_Adress_model extends CI_Model
{
    private $table = "artisan_adress";


    public function create($artisan,$adresse)
    {
        $data = array('artisan_id'=>$artisan,'adress_id'=>$adresse);
        $this->db->insert('artisan_adress',$data);
        return $insert_id=$this->db->insert_id();
    }
    //assurance +type assurance
    public function create_type_assurance($data)
    {

        $this->db->insert('assurance_type_assurnce',$data);
        return $insert_id=$this->db->insert_id();
    }


    public function getWhere($array = null){
        $this->db->select ('adress.phone as adressePhone,adress.mail as adresseMail,
                            artisan.nom_gerant as nomArtisan,artisan.prenom_gerant as prenomArtisan,
                            artisan.id as idArtisan');
        $this->db->join ( "artisan", "artisan.id = artisan_id" );
        $this->db->join ( "adress", "adress.id = adress_id");
        $this->db->group_by('artisan.id');
        $query = $this->db->get( $this->table, $array );
        return $query->result_array ();
        
    }

}
