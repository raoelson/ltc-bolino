<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Droit extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Group_model", "groupes" );
	}
	public function index() {
		//$this->load->model ( "userhasgroup_model", "userhasgroup" );
		$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/backend/index',array('groupes'=>$data_group));
	}
	
	public function getWhere ($id){
		$data = [
				['id' => 1, 'name' => 'Gestions des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Checked'],
				['id' => 2, 'name' => 'Gestions des Clients','actionvoir'=>'Checked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
				['id' => 3, 'name' => 'Gestions des Tournées','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
				['id' => 4, 'name' => 'Gestions des Attestations des Assurances des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
				['id' => 5, 'name' => 'Gestions des Devis','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
				['id' => 3, 'name' => 'Gestions des Users','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked']
				];
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data
		) ) );
	}
	
	public function saveAndupdate(){
		$posts = $this->input->get();
		//print_r( serialize($posts['data']));
		//$test = ['id' => 1, 'name' => 'Gestions des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Checked'];
		$test = serialize($posts['data']);
		print_r(array (($posts['data'])));
// 		print_r(($posts['data']));
// // 		if (is_array($posts['data']) || is_object($posts['data']))
// // 		{
// // 			foreach ($posts['data'] as $value)
// // 			{
				
// // 			}
// // 		}
// 		$this->output->set_content_type ( 'application/json' )
// 			->set_output ( json_encode ( $posts['data']
// 			) );
	}
	
	public function front_office() {
		//$this->load->model ( "userhasgroup_model", "userhasgroup" );
		$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/fronted/index',array('groupes'=>$data_group));
	}
	
	
}
