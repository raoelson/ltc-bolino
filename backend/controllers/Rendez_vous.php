<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Rendez_vous extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (! $this->cic_auth->is_logged_in ()) {
            redirect ( base_url () . "admin.php/user_login" );
        }
        $this->load->helper('url');
        $this->load->model('Demande_model', 'demande');
        $this->load->model('Clients_model', 'client');
        $this->load->model ( "Tournee_model", "tournee" );
        $this->load->model('Clients_model', 'client');


        //$this->art = new Artisan_model;

    }

    public function index()
    {
        //affichage table liste
        $data['clients'] = $this->tournee->get_demande();
        //var_dump($data['clients']);die;
        //liste de propriétaire
       $data_client['client'] = $this->client->get_all();
		$this->template->title ( 'Gestions des artisans' )->build ( 'rendez_vous/index',array ('data' =>$data,'data_client'=>$data_client));
        //var_dump($data['data']);
        //commentaire
    }
    public function edit()
    {
        $output=array();
        //$id_user=$this->input->post('id');
        //var_dump($id_user);die;
        $data = $this->tournee->affiche_query($_POST["id_user"]);
       // var_dump($data);die;
        foreach ($data as $row)
        {
            $output['num_dossier_arrivee']=$row->num_dossier_arrivee;

            $output['adress1']=$row->adress1;
            $output['adress_id']=$row->adress_id;
            $output['demandeid']=$row->demandeid;
            $output['ville']=$row->ville;
            $output['lieu_dit']=$row->lieu_dit;

        }
        echo json_encode($output);
    }

    //function ajout gestion de rendez-vous
    public function ajout_rendez_vous()
    {
        $posts = $this->input->post();
       // $ownerId = $this->demande->getOwnerId($posts['nom']);
//$blu=$posts['proprietaire'];
//var_dump($blu);die;
        //detail tourneee
        $detail_tournee = array (
            'owner_id_t'=>$posts['proprietaire'],
            'adress_id_t'=>$posts['id_adress'],
            'demande_id_t'=>$posts['id_demande'],
        );
        //var_dump($detail_tournee);die;
        $detail_tourne_id=$this->tournee->create_detail_tournee_query($detail_tournee);
        //tourne
        $datatrournee = array (
            'nom_tournee'=>$posts['nom_tournee'],
            'date_tournee'=>$posts['date_tournee'],
            'detail_tournee_id'=>$detail_tourne_id,
        );
       $this->tournee->create_tournee_query($datatrournee);

        $this->session->set_flashdata ( "success", "Votre donnée  a été bien enregistrée !");
        redirect ( base_url () . "admin.php/rendez_vous" );
    }



    //function de teste
    public function detailsf_artisan(){
        // $data = $this->Affichage_artisan->getWhere(4);
        $data=$this->owneradresse->affiche_query(17);
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