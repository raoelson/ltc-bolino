<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct ();
		if (!$this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		} 
	}
	
	public function index()
	{
		//$this->load->view('template');
		//$this->template->write('title', "Gestion des articles - Seraseran'ny Tantsaha");		;
		$this->template
		->title('ma')
		->build('dashboard/content');
	}
}
