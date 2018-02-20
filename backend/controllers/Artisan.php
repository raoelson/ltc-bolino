<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Artisan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model('book_model');
       // $this->load->model('Artisan_model','Artisan_model',TRUE);
        $this->load->model('Artisan_model','Artisan_model');
        $this->load->model('Adress_model','Adress_model');
        $this->load->model('Artisan_Adress_model','Artisan_Adress_model');
        $this->load->model('Type_artisan','Type_artisan');
        $this->load->model('Artisan_type_model','Artisan_type_model');

        $this->art = new Artisan_Adress_model;
        //$this->art = new Artisan_model;

    }
    public function index()
    {
        //commentaire

        $data['data'] = $this->art->get_news();

        $this->template->title ( 'Gestions des artisans' )->build ( 'artisan/index',$data);
        
        //commentaire
    }
    public function create_artisan()
    {

        //type artisan
        $posts = $this->input->post ();
        $datatype = array (
            //'id'=>$posts['id'],
            'name'=>$posts['name'],

        );
        $type_artisan=$this->Type_artisan->create_artisan_query($datatype);


        //condition artisan
        $pres_attestation_immat=1;
        if($this->input->post ('pres_attestation_immat')==0)
        {
            $pres_attestation_immat=0;
        }

        $pres_kbis=1;
        if($this->input->post ('pres_kbis')==0)
        {
            $pres_kbis=0;
        }

        $pres_services_fiscaux=1;
        if($this->input->post ('pres_services_fiscaux')==0)
        {
            $pres_services_fiscaux=0;
        }

        $pers_attestation_clandestin=1;
        if($this->input->post ('pers_attestation_clandestin')==0)
        {
            $pers_attestation_clandestin=0;
        }

        $pres_attestation_decl_social=1;
        if($this->input->post ('pres_attestation_decl_social')==0)
        {
            $pres_attestation_decl_social=0;
        }

        $pres_attestation_assurance=1;
        if($this->input->post ('pres_attestation_assurance')==0)
        {
            $pres_attestation_assurance=0;
        }

        $pres_rib=1;
        if($this->input->post ('pres_rib')==0)
        {
            $pres_rib=0;
        }


        //artisan
        $dataartisan = array (

            'denomination'=>$posts['denomination'],
            'nom_gerant'=>$posts['nom_gerant'],

            'prenom_gerant'=>$posts['prenom_gerant'],
            'statut'=>$posts['statut'],
            'siren'=>$posts['siren'],
            'code_activite'=>$posts['code_activite'],
            'libelle_activite'=>$posts['libelle_activite'],
            'forme_juridique'=>$posts['forme_juridique'],
            'date_immatriculation'=>$posts['date_immatriculation'],
            'date_derniere_rcs'=>$posts['date_derniere_rcs'],
            'categorie'=>$posts['categorie'],
            'montant_actif_passif'=>$posts['montant_actif_passif'],
            'type_artisan_id'=>$type_artisan,
            //case à cocher
            'pres_attestation_immat'=>$pres_attestation_immat,
            'pres_kbis'=>$pres_kbis,
            'pres_services_fiscaux'=>$pres_services_fiscaux,
            'pers_attestation_clandestin'=>$pers_attestation_clandestin,
            'pres_attestation_decl_social'=>$pres_attestation_decl_social,
            'pres_attestation_assurance'=>$pres_attestation_assurance,
            'pres_rib'=>$pres_rib,


        );
        //adress
        $dataadress = array (
            'adress1'=>$posts['adress1'],
            'adress2'=>$posts['adress2'],
            'lieu_dit'=>$posts['lieu_dit'],
            'cp'=>$posts['cp'],
            'ville'=>$posts['ville'],
            'pays'=>$posts['pays'],
            'phone'=>$posts['phone'],
            'cellphone1'=>$posts['cellphone1'],
            'cellphone2'=>$posts['cellphone1'],
            'fax'=>$posts['fax'],
            'mail'=>$posts['mail'],
            'site_web'=>$posts['site_web'],
        );
        //adress

       // $type_artisan_id=$type_artisan;
        //var_dump($type_artisan_id);
        $artisan = $this->Artisan_model->create_artisan_query($dataartisan);
        $adresse = $this->Adress_model->create_artisan_query($dataadress);
        $ref=$this->Artisan_Adress_model->create($artisan,$adresse);
       //$ref1=$this->Type_artisan->create_type($type_artisan,$artisan);

        if($ref and $type_artisan)
            echo json_encode(array('status'=>true));
        else
            echo json_encode(array('status'=>false));
        //******************************adress






        //*********************************artisan

//$posts = $this->input->post ();
        /*$data_in['denomination']=$this->input->post('denomination');
        $data_in['nom_gerant']=$this->input->post('nom_gerant');
        $data_in['prenom_gerant']=$this->input->post('prenom_gerant');
        $data_in['statut']=$this->input->post('statut');
        $data_in['siren']=$this->input->post('siren');
         $data_in['code_activite']=$this->input->post('code_activite');
         $data_in['libelle_activite']=$this->input->post('libelle_activite');
        $data_in['forme_juridique']=$this->input->post('forme_juridique');
        $data_in['date_immatriculation']=$this->input->post('date_immatriculation');
        $data_in['date_derniere_rcs']=$this->input->post('date_derniere_rcs');
        $data_in['categorie']=$this->input->post('categorie');
        $data_in['montant_actif_passif']=$this->input->post('montant_actif_passif');

        if($this->input->post('pres_attestation_immat')==0)
        {
            $data_in['pres_attestation_immat']=0;
        }
        else
        {
            $data_in['pres_attestation_immat']=1;
        }




        if($this->input->post('pres_kbis')==0)
        {
            $data_in['pres_kbis']=0;
        }
        else
        {
            $data_in['pres_kbis']=1;
        }



        if($this->input->post('pres_services_fiscaux')==0)
        {
            $data_in['pres_services_fiscaux']=0;
        }
        else
        {
            $data_in['pres_services_fiscaux']=1;
        }



        if($this->input->post('pers_attestation_clandestin')==0)
        {
            $data_in['pers_attestation_clandestin']=0;
        }
        else
        {
            $data_in['pers_attestation_clandestin']=1;
        }


        if($this->input->post('pres_attestation_decl_social')==0)
        {
            $data_in['pres_attestation_decl_social']=0;
        }
        else
        {
            $data_in['pres_attestation_decl_social']=1;
        }


        if($this->input->post('pres_attestation_assurance')==0)
        {
            $data_in['pres_attestation_assurance']=0;
        }
        else
        {
            $data_in['pres_attestation_assurance']=1;
        }



        if($this->input->post('pres_rib')==0)
        {
            $data_in['pres_rib']=0;
        }
        else
        {
            $data_in['pres_rib']=1;
        }

        $id_artisan=$this->input->post('id');



                //$data_in['pres_attestation_immat']=$this->input->post('pres_attestation_immat');



        /*$data_in['pres_kbis']=$this->input->post('pres_kbis');
        /*$data_in['pres_services_fiscaux']=$this->input->post('pres_services_fiscaux');
        /*$data_in['pres_attestation_clandestin']=$this->input->post('pres_attestation_clandestin');
        $data_in['pres_attestation_immat']=$this->input->post('pres_attestation_immat');
        $data_in['pres_attestation_immat']=$this->input->post('pres_attestation_immat');
        pres_kbis*/


        /*$artisan=$this->Artisan_model->create_artisan_query($data_in);
        if($artisan)
            echo json_encode(array('status'=>true));
        else
            echo json_encode(array('status'=>false));*/
    }


}