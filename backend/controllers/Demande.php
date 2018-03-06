<?php 
defined ('BASEPATH') OR exit ('No direct script acces allowed');
class Demande extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->model('Demande_model', 'demande');
	}

	public function index(){
		
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/index');
	}

	public function save(){
		$posts = $this->input->post();

		$dataDemande = array (
			'date_arrivee' => $posts['date_arrivee'],
			'montant_devis' => $posts['montant_devis']
		);

		$iddemande = $this->demande->add($dataDemande);
	}
}