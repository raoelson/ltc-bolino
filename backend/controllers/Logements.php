<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Logements extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Logements_model", "logements" );
	}
	public function index($id) {
		//$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des Logements' )->build ( 'logement/index');
	}
		
}
