<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Ressources extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Clients_model", "client" );
	}
	public function index($id) {
		$data = $this->client->getWhere(array('owners.id'=>$id));
		var_dump($data);
		$this->template->title ( 'Gestions de Ressources' )->build ( 'ressources/index',array('data'=>$data));
	}

}
