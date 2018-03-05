<?php 
defined ('BASEPATH') OR exit ('No direct script acces allowed');
class Demande extends CI_Controller{
	public function __construct(){
		parent::__construct();

	}

	public function index(){
		
		$this->template->title ( 'Gestions des demandes' )->build ( 'demande/index');
	}
}