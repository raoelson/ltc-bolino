<?php 
defined ('BASEPATH') OR exit ('No direct script acces allowed');
class Demande extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Demande_model', 'demande');
		$this->load->model('Clients_model', 'client');
		$this->load->model('Owneradresse_model', 'owneradresse');
	}

	public function index(){

		$data['demande'] = $this->demande->get_all();
		$data_client['client'] = $this->client->get_all();
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/index', array ('data' =>$data, 'data_client' => $data_client));


	}

	public function save(){
		$posts = $this->input->post();

		$ownerId = $this->demande->getOwnerId($posts['nom']);

		$aide = ($posts['montant_devis'] > 10500) ? 10500 : ($posts['montant_devis']); 

		foreach ($ownerId as $row) {

			$dataDemande = array (
				'num_dossier_valide' => $posts['num_dossier_valide'],
				'date_arrivee' => $posts['date_arrivee'],
				'montant_devis' => $posts['montant_devis'],
				'owner_id' => $row->id,
				'montant_aide_dept' => $aide
                //'housing_id' => $row->housing.id
			
			);
		}
		$this->demande->add($dataDemande);
		//$this->demande->addOwnerId($iddemande);
	}


	//Details
	public function details($id){
		$this->template->title ( 'Gestions des Demandes' )->build ( 'demande/details');
	}


}