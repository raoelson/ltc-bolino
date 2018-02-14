<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Clients extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Clients_model", "client" );
		$this->load->model ( "Owneradresse_model", "owneradresse" );
		$this->load->model ( "Adresse_model", "adresse" );
		$this->load->model ( "Parents_model", "parents" );
	}
	public function index() {
		$data = $this->owneradresse->getWhere(NULL);
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/index',array('data'=>$data) );
	}
	public function save() {
		$posts = $this->input->post ();
		var_dump($posts);die;
		$dataclient = array (
				'firstname1' => $posts ['firstname1'],
				'firstname2' => $posts ['firstname2'],
				'birthdate' => $posts ['birthday'],
				'birthplace' => $posts ['birthplace'],
				'aide_organisme' => $posts ['aide_organisme'],
				'nom_organisme' => $posts ['nom_organisme'],
				'montant_aide' => $posts ['montant_aide'] 
		);
		
		$dataAdresse = array (
				//'adress1' => $posts ['firstname1'],
				'lieu_dit' => $posts ['lieu_dit'],
				'cp' => $posts ['cp'],
				'ville' => $posts ['ville'],
				'pays' => $posts ['pays'],
				'phone' => $posts ['phone'],
				'cellphone1' => $posts ['cellphone1'],
				'mail' => $posts ['mail']
		);
		
			
		$idclient = $this->client->add($dataclient);
		$idadresse = $this->adresse->add($dataAdresse);
		$this->owneradresse->save($idclient,$idadresse);
		
		$dataParent = array(
				'name'=>$posts['parent_name'],
				'firstname'=>$posts['parent_prenom'],
				'owner_id'=>$idclient
		);
		$idadresse = $this->parents->add($dataParent);
		//$this->session->set_flashdata ( $typeMessage, $message );
		redirect ( base_url () . "admin.php/clients" );
		
	}
	
	// public function getWhere ($id){
	// $data = $this->droit->get_allByGroup($id);
	// $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
	// 'data' => $data
	// ) ) );
	// }
	
	// public function saveAndupdate(){
	// $posts = $this->input->post();
	// if($posts["data"] == "true"){
	// $actionData = "Checked";
	// }else{
	// $actionData = "Unchecked";
	// }
	// $data = array(trim($posts["name"],'"') => $actionData);
	// $this->droit->update($data,$posts["id"]);
	// $this->output->set_content_type ( 'application/json' )->set_output ( json_encode (array('posts'=>$posts,'data'=>$data)) );
	// }
	
	// public function front_office() {
	// $data_group = $this->groupes->get_all ();
	// $this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/fronted/index',array('groupes'=>$data_group));
	// }
}
