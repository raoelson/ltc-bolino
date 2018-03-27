<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Artisan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (! $this->cic_auth->is_logged_in ()) {
            redirect ( base_url () . "admin.php/user_login" );
        }
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
        $this->load->model ('Pays_model','pays');

        //affichage tableau
        $this->load->model('Affichage_artisan','Affichage_artisan');

        $this->art = new Affichage_artisan;
        //$this->art = new Artisan_model;

    }
    public function index()
    {
        //commentaire
        $data['data'] = $this->art->get_news();
        $data['pays'] = $this->pays->getAllPays();
		$this->template->title ( 'Gestions des artisans' )->build ( 'artisan/index',array('data'=>$data));

        //var_dump($data['data']);
        //commentaire
    }
    public function create_artisan()
    {
       // ajout type travaux
        $posts = $this->input->post ();

        //var_dump($posts);

        //type artisan
      $datatype = array (
            //'id'=>$posts['id'],
            'namee'=>$posts['name'],
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
            'region' => $posts['region'],
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
            'nombre'=>$posts['nombree'],
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
            'chiffres_affaires'=>$posts['chiffres_affaires'],
            'tranche_effectif'=>$posts['tranche_effectif'],
            'type_artisan_id'=>$type_artisan,
            'artisan_adress_id'=>$adresse,
          // 'assurance_id'=>$assurance,
            //case à cocher
            'pres_attestation_immat'=>$pres_attestation_immat,
            'pres_kbis'=>$pres_kbis,
            'pres_services_fiscaux'=>$pres_services_fiscaux,
            'pers_attestation_clandestin'=>$pers_attestation_clandestin,
            'pres_attestation_decl_social'=>$pres_attestation_decl_social,
            'pres_attestation_assurance'=>$pres_attestation_assurance,
            'pres_rib'=>$pres_rib,
        );
        $artisan = $this->Artisan_model->create_artisan_query($dataartisan);
        $this->Artisan_Adress_model->create($artisan,$adresse);


        //type travaux
       /* $travaux=$posts['name_travaux'];
        if($travaux)
        {
            foreach ($travaux as $c)
            {
                $datatype_travaux = array (
                    //'id'=>$posts['id'],
                    'name'=>$c,
                    'artisant_id'=>$artisan,

                );
                $this->Type_travaux_artisan->create_artisan_query($datatype_travaux);

            }
        }*/

        //assurance
        $nombre  = $posts['nombree'];
        if($nombre != 0) {
            for ($i = 1; $i <= $nombre; $i++) {
                $j = $i + 1;
                //recupe donne boucle
                $nom = ($posts["noms" . $j]);
                $date_deb = ($posts["date_debs" . $j]);
                $date_fin = $posts["date_fins" . $j];
                $assureur = $posts["assureurs" . $j];
                $telephone = $posts["telephones" . $j];
                $name=($posts["name_travaux" .$j]);

                //base
                //type travaux
               $datatype_travaux = array (
                    //'id'=>$posts['id'],
                    'name'=>$name,

                );
                $travaux=$this->Type_travaux_artisan->create_artisan_query($datatype_travaux);
                //type assurance
                $datatype_assurance = array (
                    //'id'=>$posts['id'],
                    'nom'=>$nom,
                );
                $type=$this->Type_assurance_model->create_artisan_query($datatype_assurance);

                // assurance
                $dataassurance = array(
                    //'artisans_id' => $artisan,
                    //'nom' => $nom,
                    'date_deb' => $date_deb,
                    'date_fin' => $date_fin,
                    'assureur' => $assureur,
                    'telephone' => $telephone,
                );
                 $assu=$this->Assurance_model->create_artisan_query($dataassurance);

                 //table recombinaison 3 table
                $table = array(
                    //'artisans_id' => $artisan,
                    'type_travaux_id' =>$travaux,
                    'assurance_id' => $assu,
                    'type_assurance_id' => $type,
                    'artisaans_id' => $artisan,

                );
                $this->Artisan_Adress_model->create_type_assurance($table);
            }
        }
        $this->session->set_flashdata ( "success", "Votre donnée  a été bien enregistrée !");
        redirect ( base_url () . "admin.php/artisan" );

    }
    /*public function create_type()
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
    }*/

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

            //type assurance
            $output['nom']=$row->nom;
            $output['date_deb']=$row->date_deb;
            $output['date_fin']=$row->date_fin;
            $output['assureur']=$row->assureur;
            $output['telephone']=$row->telephone;

        }
       // $output['nom_gerant']="test";

        echo json_encode($output);

    }
    public function details_artisan($id){

        $data = $this->Affichage_artisan->getWhere(array('artisan_id'=>$id));
        $pays = $this->pays->getAllPays();
        //$type_art = $this->Type_artisan->type_travaux_query();

        //print_r((($pays)));die;
        $this->template->title ( 'Gestions des artisans' )->build ( 'artisan/details_artisan',array('data'=>$data,
            'pays'=>$pays) );
        //var_dump($type_art);die;


        //$id_artisan->$this->input->get('id');
        //$data = $this->Affichage_artisan->affiche_query($id);
        //print_r((($data)));die;
        //$this->template->title ( 'Gestions des Propriétaires' )->build ( 'artisan/details_artisan',array('data'=>$data) );
    }

  /*  public function update()
    {
        $id = $this->input->post('id');
        $posts = $this->input->post ();
        $data = array(
            'denomination'=>$posts['denomination'],
            'nom_gerant'=>$posts['nom_gerant'],
            'nombre'=>$posts['nombree'],
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

        );
        $this->Affichage_artisan->update_student_id1($id, $data);
        $this->template->title ( 'Gestions des artisans' )->build ( 'artisan/details_artisan',$data);
        $this->output->set_content_type ( 'application/json' )
            ->set_output (json_encode($reponse) );
        //$this->details_artisan();
    }*/
    public function update()
    {
        $result=$this->Affichage_artisan->update();
        if($result)
        {
            $this->session->set_flashdata ( "success", "Vos données  sont modifiées !");
        }
        else
        {
            $this->session->set_flashdata ( "success", " Vos données  sont modifiées !");
        }
        redirect ( base_url () . "admin.php/artisan/" );

    }





    //function de teste
    public function detailsf_artisan(){
       // $data = $this->Affichage_artisan->getWhere(4);
        $data=$this->Affichage_artisan->update();
       // $id=48;
        //$data = $this->Affichage_artisan->getWhere(array('artisan_id'=>$id));
       // var_dump($data);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        // $id = $this->uri->segment(3);

        //print_r((($data)));die;
        //$this->template->title ( 'Gestions des artisans' )->build ( 'artisan/details_artisan',array('data'=>$data) );
        //$id_artisan->$this->input->get('id');
        //$data = $this->Affichage_artisan->affiche_query($id);
        //print_r((($data)));die;
        //$this->template->title ( 'Gestions des Propriétaires' )->build ( 'artisan/details_artisan',array('data'=>$data) );



    }
}