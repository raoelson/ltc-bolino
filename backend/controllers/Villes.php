<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Villes extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model ('Ville_model','villes');
	}
	
	public function getWhere()
	{
		$posts =  $this->input->post();
		$data = $this->villes->getAllVilles($posts['id']);
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data
		) ) );		
	}
}