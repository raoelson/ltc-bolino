<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Droit extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Group_model", "groupes" );
		$this->load->model ( "droits_model", "droit" );
	}
	public function index() {
		$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/index',array('groupes'=>$data_group));
	}
	
	public function getWhere ($id){
		$data = $this->droit->get_allByGroup($id);
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data
		) ) );
	}
	
	public function saveAndupdate(){
		$posts = $this->input->post();		
		if($posts["data"] == "true"){
			$actionData = "Checked";
		}else{
			$actionData = "Unchecked";
		}					
		 $data = array(trim($posts["name"],'"') => $actionData);
		 $this->droit->update($data,$posts["id"]);
		 $this->output->set_content_type ( 'application/json' )->set_output ( json_encode (array('posts'=>$posts,'data'=>$data))  );
	}
	
	public function front_office() {
		$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/fronted/index',array('groupes'=>$data_group));
	}
	
	///maorus
			
}
