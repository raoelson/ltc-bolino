<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Group extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Group_model", "groupes" );
	}
	public function index() {
		$this->load->model ( "userhasgroup_model", "userhasgroup" );
		$data = $this->groupes->get_all ();
		$this->template->title ( 'Gestions des groupes' )->build ( 'user/groupes/index' ,array('data'=>$data));
	}
	
	public function getAllgroupes() {
		$this->load->model ( "userhasgroup_model", "userhasgroup" );
		$data = $this->groupes->get_all ();
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data 
		) ) );
	}
	
	public function show(){
		$posts = $this->input->post();
		$data = $this->groupes->show($posts['id']);
		$this->output->set_content_type ( 'application/json' )
				->set_output (json_encode( array (
				'data' => $data
		) ) );
	}
	
	public function save() {
		$posts = $this->input->post();
		$message = "";
		$typeMessage = "success";
		if ($posts["idgroupe"] ==""){			
			$data = array('name'=>$posts['name']);
			$rep = $this->groupes->add($data);
			if($rep == 0){
				$message = "Ce donnée existe déjà dans la base de données ";
				$typeMessage = "error";
			}else{
				$message = "Votre donnée  a été bien enregistrée !";
			}
		}
		else{
			$data = array('idgrp' =>$posts['idgroupe'],'name'=>$posts['name']);
			$this->groupes->update($data,$posts["idgroupe"]);
			$message = "Votre donnée  a été bien modifiée !";
		}
		$this->session->set_flashdata ( $typeMessage, $message );
		redirect ( base_url () . "admin.php/groupes" );
	}	
	
	public function delete(){
		$posts = $this->input->post();
		$data = $this->groupes->remove($posts['id']);
		$this->output->set_content_type ( 'application/json' )
		->set_output (json_encode( array (
				'data' =>$posts['id']
		) ) );
	}
}
