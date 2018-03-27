<?php 
defined ('BASEPATH') OR exit ('No direct script acces allowed');
class Demande extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Demande_model', 'demande');
		$this->load->model('Clients_model', 'client');
		$this->load->model('Owneradresse_model', 'owneradresse');
		$this->load->model('Devis_model', 'devismodel');
		$this->load->model('Type_artisan', 'typeartisan');
		$this->load->model('Affichage_artisan', 'artisan');
        $this->load->model('ComposeDevis_model', 'composedevis');

	}

	public function index(){
		$data['demande'] = $this->demande->get_all();
		$data_client['client'] = $this->client->get_all();
        $type_art = $this->typeartisan->art_query();
        $arti = $this->artisan->get_news();
        $typeart = $this->typeartisan->art_query();
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/index', array ('data' =>$data, 'data_client' => $data_client,
            'type_art' => $type_art, 'arti' => $arti, 'typeart' => $typeart));
	}

	public function save(){
		$posts = $this->input->post();

		$ownerId = $this->demande->getOwnerId($posts['nom']);

		$aide = ($posts['valeurDevis'] > 10700) ? 10700 : ($posts['valeurDevis']); 

		//$a = ($posts['num_dossier_valide'] == null) ? 0 : ($posts['num_dossier_valide']);

		foreach ($ownerId as $row) {
			$dataDemande = array (
				'num_dossier_valide' => $posts['num_dossier_valide'],
				'date_arrivee' => $this->cic_auth->FormatDate($posts ['date_arrivee']), 
				'montant_devis' => $posts['valeurDevis'],
				'owner_id' => $row->id,
				'montant_aide_dept' => $aide,
                'statut' => $posts['statut'],
			);
		}
		//var_dump($dataDemande); die;
        $iddemande = $this->demande->add($dataDemande);
        $i = 1;
		$dataDevis = array(
            'num_devis' => $posts['num_devis'.$i],
            'date_devis' => $this->cic_auth->FormatDate($posts['date_devis'.$i]) 
            /*'montant' => $posts['montantTotalDevisPrincipal'.$i],*/
           // 'statut_devis' => $posts['statutDevis'.$i]
        );
        $taille = $posts['nombreDevis'];
        for($i=1; $i <= $taille; $i++){
        	$iddevis = $this->devismodel->add($dataDevis);
        }
        $iddevis = $this->devismodel->add($dataDevis);

        $dataComposeDevis = array(
        	'devis_id' => $iddevis,
        	'demande_id' => $iddemande
        );
        $this->composedevis->add($dataComposeDevis);


        

        $this->session->set_flashdata ( "success", "Votre donnée  a été bien enregistrée !");
        redirect ( base_url () . "admin.php/demande" );

	}

	public function devis($var){
		$data_devis['devis'] = $this->devismodel->get_all($var);
		$this->template->title ( 'Gestions des demandes' )->build ( 'devis/index', array('data_devis' => $data_devis));
	}


}