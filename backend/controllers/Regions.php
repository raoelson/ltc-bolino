<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regions extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		$this->load->model ('Region_model','regions');
	}
	
	public function getWhere()
	{
		$posts =  $this->input->post();
		$data = $this->regions->getAllRegions($posts['id']);
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data
		) ) );		
	}
}