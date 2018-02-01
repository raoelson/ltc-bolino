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
// 				['id' => 1, 'name' => 'Gestions des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Checked'],
// 				['id' => 2, 'name' => 'Gestions des Clients','actionvoir'=>'Checked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 				['id' => 3, 'name' => 'Gestions des Tournées','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 				['id' => 4, 'name' => 'Gestions des Attestations des Assurances des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
 				['id' => 5, 'name' => 'Gestions des Devis','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
				['id' => 3, 'name' => 'Gestions des Users','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked']
				];
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data
		) ) );
	}
	
	public function saveAndupdate(){
// 		$names = array("firstname"=>"maurice",
// 				"lastname"=>"muteti",
// 				"contact"=>"7844433339");
		
// 		foreach ($names as $name => $value) {
// 			echo $name." ".$value."</br>";
// 		}
// 		$posts = $this->input->post();
// 		$data = [
// 		// 				['id' => 1, 'name' => 'Gestions des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Checked'],
// 		// 				['id' => 2, 'name' => 'Gestions des Clients','actionvoir'=>'Checked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 		// 				['id' => 3, 'name' => 'Gestions des Tournées','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 		// 				['id' => 4, 'name' => 'Gestions des Attestations des Assurances des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 				['id' => 5, 'name' => 'Gestions des Devis','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked'],
// 				['id' => 3, 'name' => 'Gestions des Users','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Checked','actionsupprimer'=>'Unchecked']
// 		];
// // // // 		for ($i=0; $i <$posts['taille']; $i++){
// 			$test = "";
			
// 			//$data =  array_keys($data);
// 			foreach ($data as $value){
// 				foreach ($value['0'] as $n => $v){
// 					$test = $n." ".$v."</br>";
// 				}
				
// 			}
// // // 		}	

// 			$example_array = [
// 					['id'=>'1','nom'=>'John','prenom'=>'Smith'],
// 					['id'=>'2','nom'=>'Dave','prenom'=>'Jones'],
// 					['id'=>'3','nom'=>'Bob','prenom'=>'Williams']
// 			];
			
			
// 			echo "<table>";
// 			foreach ($example_array as $value) {
// 				echo "<tr><td>" . $value['id'] . "</td>";
// 				echo "<td>" . $value['nom'] . "</td>";
// 				echo "<td>" . $value['prenom'] . "</td></tr>";
// 			}
// 			echo "</table>";
		
			//$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( $test) );
	}
	
	public function front_office() {
		//$this->load->model ( "userhasgroup_model", "userhasgroup" );
		$data_group = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/droits/fronted/index',array('groupes'=>$data_group));
	}
	
	
}
