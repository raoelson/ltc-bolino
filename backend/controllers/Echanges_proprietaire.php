<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Echanges_proprietaire extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		//Chargement des modeles
		$this->load->model ( "Echanges_proprietaire_model", "echanges" );
	}
}