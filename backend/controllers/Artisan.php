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
        //type artisan
        $this->load->model('Type_artisan','Type_artisan');
        //$this->load->model('Artisan_type_model','Artisan_type_model');
        //assurance
         $this->load->model('Assurance_model','Assurance_model');
        $this->load->model('Type_assurance_model','Type_assurance_model');
        $this->load->model('Type_travaux_artisan','Type_travaux_artisan');

        //affichage tableau
        $this->load->model('Affichage_artisan','Affichage_artisan');

        $this->art = new Affichage_artisan;
        //$this->art = new Artisan_model;

    }
    public function index()
    {
        //commentaire

        $data['data'] = $this->art->get_news();
        $data['sitraka'] = $this->Type_artisan->art_query();

        $this->template->title ( 'Gestions des artisans' )->build ( 'artisan/index',$data);
        //var_dump($data['data']);
        //commentaire
    }
    public function create_artisan()
    {
       /* $data_in['nom']=$this->input->post('nom');
        echo $data_in;*/

        $posts = $this->input->post ();
        //var_dump($posts);

        /*$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $posts
        ) ) );*/

        $datatype_travaux = array (
            //'id'=>$posts['id'],
            'name'=>$posts['name'],
        );
        $type_travaux=$this->Type_travaux_artisan->create_artisan_query($datatype_travaux);

        //assurance
        $scan_assurance=1;
        if($this->input->post ('scan_assurance')==0)
        {
            $scan_assurance=0;
        }
        $dataassurance = array (
            // 'type_assurance_id'=>$type_assurance,
            'type_travaux_id'=>$type_travaux,
            'date_deb'=>$posts['date_deb'],
            'date_fin'=>$posts['date_fin'],
            'assureur'=>$posts['assureur'],
            'telephone'=>$posts['telephone'],
            'scan_assurance'=>$scan_assurance,
        );
        $assurance=$this->Assurance_model->create_artisan_query($dataassurance);

       //if(isset($_POST['occasion']) && !empty($_POST['occasion'])){ $Col1_Array = $_POST['occasion']; print_r($Col1_Array)
           //$/noms = $this->input->post ('nom');
         //$Col1_Array = $_POST[$noms];
         //print_r($Col1_Array);
       /* $col = $this->input->post('nom');
        $assur=$this->input->post('assurance_id');

        if($col)
        {
            foreach ($col as $c)
            {
                $type_assurance=$this->Type_assurance_model->create_artisan_query($c,$assur);
            }
        }*/

        /*foreach($col as $selectValue){

            'assurance_id'=>$assurance,
        }*/

        //type assurance
        //$noms = $this->input->post ('nom');
        //if($noms=$this->input->post ('nom')) {
            // var_dump($nom)
            /*foreach($noms as $val) {
            }*/
           $datatype_assurance = array(
                //'id'=>$posts['id'],
                'nom' => $posts['nom'],
                'assurance_id'=>$assurance,
            );
            $type_assurance = $this->Type_assurance_model->create_artisan_query($datatype_assurance);




        /*foreach ($posts['nom'] as $item){
            //requete
            //assurance +item
            $type_assurance=$this->Type_assurance_model->create_artisan_query($datatype_assurance);
        }*/
        //creation assurance $assurance
        //selection type assurance foreach par item
        // enregistrement entre assurance et type assurance

        //type travaux artisan



        //type artisan
      $datatype = array (
            //'id'=>$posts['id'],
            'namee'=>$posts['namee'],
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
        $adresse = $this->Adress_model->create_artisan_query($dataadress);
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

            'tranche_effectif'=>$posts['tranche_effectif'],
            'type_artisan_id'=>$type_artisan,
            'artisan_adress_id'=>$adresse,
           'assurance_id'=>$assurance,
            //case à cocher
            'pres_attestation_immat'=>$pres_attestation_immat,
            'pres_kbis'=>$pres_kbis,
            'pres_services_fiscaux'=>$pres_services_fiscaux,
            'pers_attestation_clandestin'=>$pers_attestation_clandestin,
            'pres_attestation_decl_social'=>$pres_attestation_decl_social,
            'pres_attestation_assurance'=>$pres_attestation_assurance,
            'pres_rib'=>$pres_rib,


        );
     //echo
        /* $da = array (
            //'id'=>$posts['id'],
            'nom'=>$posts['nom'],
        );

        echo var_dump($da);
        //type_art
        //*$datatype_art = array (
            //'id'=>$posts['id'],
          /*  'name'=>$posts['name'],
        );
        $type_artt=$this->Type_assurance_model->create_art_query($datatype_art);*/
        //adress

       // $type_artisan_id=$type_artisan;
        //var_dump($type_artisan_id);
        $artisan = $this->Artisan_model->create_artisan_query($dataartisan);
        $ref=$this->Artisan_Adress_model->create($artisan,$adresse);
       //$ref1=$this->Type_artisan->create_type($type_artisan,$artisan);

        if($ref and $type_artisan and $assurance and $type_travaux and $type_assurance)
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
    public function create_type()
    {
        $posts = $this->input->post ();

        //type travaux artisan
        $type_art = array (
            //'id'=>$posts['id'],
            'name'=>$posts['name'],
        );
        $type_travaux=$this->Type_artisan->create_art_query($type_art);
        if($type_travaux)
            echo json_encode(array('status'=>true));
        else
            echo json_encode(array('status'=>false));
    }

    public function edit_artisan()
    {
        $output=array();
        $id_artisan=$this->input->post('id_artisan');
        //$denomination=$this->input->post('denomination');
        $data = $this->Affichage_artisan->affiche_query($id_artisan);
        // $this->output->set_content_type('application/json')->set_output(json_encode($data));
        //$output=$data;
        foreach ($data as $row)
        {
            $output['denomination']=$row->denomination;
            $output['nom_gerant']=$row->nom_gerant;
            $output['prenom_gerant']=$row->prenom_gerant;
            $output['statut']=$row->statut;
            $output['siren']=$row->siren;
            $output['code_activite']=$row->code_activite;
            $output['libelle_activite']=$row->libelle_activite;
            $output['forme_juridique']=$row->forme_juridique;
            $output['date_immatriculation']=$row->date_immatriculation;
            $output['date_derniere_rcs']=$row->date_derniere_rcs;
            $output['categorie']=$row->categorie;
            $output['montant_actif_passif']=$row->montant_actif_passif;
            $output['chiffres_affaires']=$row->chiffres_affaires;
            $output['tranche_effectif']=$row->tranche_effectif;
            /**/
            $output['pres_attestation_immat']=$row->pres_attestation_immat;
            $output['pres_services_fiscaux']=$row->pres_services_fiscaux;
            $output['pres_kbis']=$row->pres_kbis;
            $output['pers_attestation_clandestin']=$row->pers_attestation_clandestin;
            $output['pres_attestation_assurance']=$row->pres_attestation_assurance;
            $output['pres_attestation_decl_social']=$row->pres_attestation_decl_social;
            $output['pres_rib']=$row->pres_rib;
            //type artisan
            $output['namee']=$row->namee;
            //adress
            $output['ville']=$row->ville;
            $output['adress1']=$row->adress1;
            $output['adress2']=$row->adress2;
            $output['lieu_dit']=$row->lieu_dit;
            $output['cp']=$row->cp;
            $output['pays']=$row->pays;
            $output['cellphone1']=$row->cellphone1;
            $output['cellphone2']=$row->cellphone2;
            $output['fax']=$row->fax;
            $output['site_web']=$row->site_web;

        }
       // $output['nom_gerant']="test";

        echo json_encode($output);
        /*$output=array();
        $id_artisan=$this->input->post('$id_artisan');
        //$denomination=$this->input->post('denomination');
        $data = $this->Affichage_artisan->affiche_artisan_query($id_artisan);
       // $this->output->set_content_type('application/json')->set_output(json_encode($data));
        foreach ($data as $row)
        {
            $output['denomination']=$row->denomination;
        }
        echo json_encode($output);*/
    }
}