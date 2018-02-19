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
		$this->load->model ( "ParentsLink_model", "parentslink" );
	}
	public function index() {
		$data = $this->client->get_all();
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/index',array('data'=>$data) );
	}
	public function save() {
		$posts = $this->input->post();
		$donneeTypeDemandeur = array();
		$donneeMontantDemandeur = array();
		
		for($i=0;$i<8;$i++){
			array_push($donneeTypeDemandeur, $posts['typeRessoucesDemandeur'][$i]);
			array_push($donneeMontantDemandeur, $posts['montantRessoucesDemandeur'][$i]);
		}
		
		var_dump($donneeMontantDemandeur);die;

		$dataclient = array (
				'title'=>$posts['indentite'],
				'marriedname'=>$posts['marriedname'],
				'firstname1' => $posts ['firstname1'],
				'firstname2' => $posts ['firstname2'],
				'firstname3' => $posts ['firstname3'],
				'birthdate' => $posts ['birthday'],
				'familysituation' => $posts ['familysituation'],
				'aide_organisme' => $posts ['aide_organisme'],
				'nom_organisme' => $posts ['nom_organisme'],
				'montant_aide' => $posts ['montant_aide'], 
				'type_travaux_finan' => $posts ['type_travaux_finan']
		);

		
		
		$dataAdresse = array (
				'adress1' => $posts ['adresse1'],
				'adress2' => $posts ['adresse2'],
				'lieu_dit' => $posts ['lieu_dit'],
				'cp' => $posts ['cp'],
				'ville' => $posts ['ville'],
				'pays' => $posts ['pays'],
				'phone' => $posts ['phone'],
				'cellphone1' => $posts ['cellphone1'],
				'fax' => $posts ['fax'],
				'mail' => $posts ['mail']
		);
		
			
		$idclient = $this->client->add($dataclient);
		$idadresse = $this->adresse->add($dataAdresse);
		$this->owneradresse->save($idclient,$idadresse);
		
		


		$nombreParent = count($posts['nomParent']);
		for($i=0;$i<$nombreParent;$i++){
			$dataLink = array('name' => $posts['lienParent'][$i]);
			$idLink = $this->parentslink->add($dataLink);
			$dataParent = array(
				'name'=>$posts['nomParent'][$i],
				'firstname'=>$posts['prenomParent'][$i],
				'birthdate'=>$posts['datenaissanceParent'][$i],
				'owner_id'=>$idclient,
				'link_parent_id'=>$idLink
			);

			$this->parents->add($dataParent);
		}


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
