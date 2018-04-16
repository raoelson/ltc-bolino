<?php
defined ('BASEPATH') OR exit ('No direct script acces allowed');
class Demande extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');


		//Chargement des modèles
		$this->load->model('Demande_model', 'demandemodel');
		$this->load->model('Clients_model', 'client');
		$this->load->model('Owneradresse_model', 'owneradresse');
		$this->load->model('Devis_model', 'devismodel');
		$this->load->model('Type_artisan', 'typeartisan');
		$this->load->model('Affichage_artisan', 'artisan');
    $this->load->model('ComposeDevis_model', 'composedevis');
    $this->load->model('Modif_model', 'modifmodel');
		$this->load->model ( "Logements_model", "logements" );

	}

	public function index(){
		$data['demande'] = $this->demandemodel->get_all();
		$data_client['client'] = $this->client->get_all();
		$data_log = $this->logements->getWhere ($this->input->post('clientid'));
    $type_art = $this->demandemodel->getTypeArt();
    $arti = $this->artisan->get_news();
    $typeart = $this->typeartisan->art_query();
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/index', array ('data' =>$data, 'data_client' => $data_client,
            'type_art' => $type_art, 'arti' => $arti, 'typeart' => $typeart, 'data_log' => $data_log));
	}

	public function save(){
		$posts = $this->input->post();

		$ownerId = $this->demandemodel->getOwnerId($posts['nom']);

		// $config = array(
		// 	'upload_path' => './uploads/',
		// 	'allowed_types' => 'gif|png|jpg'
		// );
		//
		// $this->load->library('upload', $config);
		//
		// if ( ! $this->upload->do_upload('fileTest1'))
		// 	{
		// 		$error = array('error' => $this->upload->display_errors());
		// 	}
		// 	else
		// 	{
		// 		$data = array('upload_data' => $this->upload->data());
		// 		$image= $data['upload_data']['file_name'];
		// 	}

		 //Vérification du montant du devis si celui ci dépasse ou pas la limite
		$aide = ($posts['valeurDevis'] > 10500) ? 10500 : ($posts['valeurDevis']);

		foreach ($ownerId as $row) {
			$dataDemande = array (
				'num_dossier_valide' => $posts['num_dossier_valide'],
				'date_arrivee' => $this->cic_auth->FormatDate($posts ['date_arrivee']),
				'montant_devis' => $posts['valeurDevis'],
				'owner_id' => $row->id,
				'montant_aide_dept' => $aide,
        'statut' => $posts['statut'],
        'nombreDevis' => $posts['nombreDevis']
			);
		}
		//var_dump($dataDemande); die;
        $iddemande = $this->demandemodel->add($dataDemande);

        $taille = $posts['nombreDevis'];
        for($i=0; $i < $taille; $i++){
					// $j = $i+1;
					// if ( $this->upload->do_upload('fileTest'.($i+1)))
					// 	{
					// 		$data.$j = array('upload_data' => $this->upload->data());
					// 		$image.$j= $data.$j['upload_data']['file_name'];
					// 	}


        		$dataDevis = array(
	        		'demande_id' => $iddemande,
		            'num_devis' => $posts['num_devis'.($i+1)],
		            'date_devis' => $this->cic_auth->FormatDate($posts['date_devis'.($i+1)]),
		            'montant' => $posts['montantDevis'.($i+1)],
		           	'statut_devis' => $posts['statutDevis'.($i+1)],
		           	'prestataire_id' => $posts['nomArt'.($i+1)]
								// 'scan_devis' => $image.$j

        		);

        	$iddevis = $this->devismodel->add($dataDevis);

        	$dataComposeDevis = array(
	        	'devis_id' => $iddevis,
	        	'demande_id' => $iddemande
        	);

        	$this->composedevis->add($dataComposeDevis);

        }

        $this->session->set_flashdata ( "success", "Vos données ont été bien enregistrées!");
        redirect ( base_url () . "admin.php/demande" );
	}

	public function devis($var){
		$data_devis['devis'] = $this->devismodel->get_all($var);
		$this->template->title ( 'Gestions des demandes' )->build ( 'devis/index', array('data_devis' => $data_devis));
	}

	public function modification($id){
		$data = $this->demandemodel->get_all();
		$modif = $this->modifmodel->get_all($id);
		$_SESSION['nom'] = $modif[0]['firstname1'];
		$reste = $this->modifmodel->get_reste($_SESSION['nom']);
		$data_client = $this->client->get_all();
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/modification', array('modif' => $modif, 'data' => $data, 'reste' => $reste));
	}

	public function modif(){
		$this->session->set_flashdata ( "success", "Vos données ont été bien modifiées!");
        redirect ( base_url () . "admin.php/demande" );
	}


}
