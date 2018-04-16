<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'user_model', "user" );
	}
	public function index() {
		$this->load->view ( 'user/auth/index' );
	}
	public function login() {
		$this->form_validation->set_rules ( 'login', 'Login ', 'required' );
		$this->form_validation->set_rules ( 'motdepasse', 'Mot de passe ', 'required' );
		
		if ($this->form_validation->run () == FALSE) {
			$this->session->set_flashdata ( 'errors', validation_errors () );
			redirect ( base_url () . "admin.php" );
		} else {
			$post = $this->input->post ();
			$message = $this->cic_auth->login ( $post ['login'], $post ['motdepasse'] );
			if ($message == 'ok') {
				redirect ( base_url () . "admin.php/dashboard" );
			} else {
				$this->session->set_flashdata ( 'errors', $message );
				redirect ( base_url () . "admin.php/user_login" );
			}
		}
	}
	public function logout() {
		$this->cic_auth->logout ();
		redirect ( base_url () . "admin.php/user_login" );
	}
	public function listes() {
		$this->load->model ( "group_model", "group" );
		$this->load->model ( "userhasgroup_model", "usergroup" );
		$groupes = $this->group->get_all ();
		$data = $this->usergroup->getWhere ( null );
		$this->template->title ( 'Gestions des utilisateurs' )->build ( 'user/utilisateur/index', array (
				'data' => $data,
				'groupes' => $groupes 
		) );
	}
	public function show() {
		$this->load->model ( "userhasgroup_model", "usergroup" );
		$posts = $this->input->post ();
		$data = $this->usergroup->getWhere ( array (
				'user_id' => $posts ['id'] 
		) );
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $data 
		) ) );
	}
	public function save() {
		$posts = $this->input->post ();
		$this->load->model ( "userhasgroup_model", "usergroup" );
		$message = "";
		$typeMessage = "success";
		if ($posts ["idusr"] == "") {
			if ($posts ['idgroupe'] == "") {
				$message = "Veuillez choisir le groupe svp ! ";
				$typeMessage = "error";
			} else {
// 				var_dump($posts);
// 				die;
				$id = $this->user->add ( $posts );
				if ($id == 0) {
					$message = "Ce donnée existe déjà dans la base de données ";
					$typeMessage = "error";
				} else {
					$message = "Votre donnée  a été bien enregistrée !";
					$this->usergroup->save ( $posts, $id );
				}
			}
		} else {
			$this->user->update ( $posts, $posts ["idusr"] );
			$this->usergroup->save ( $posts, "" );
			$message = "Votre donnée  a été bien modifiée !";
		}
		$this->session->set_flashdata ( $typeMessage, $message );
		redirect ( base_url () . "admin.php/user_listes" );
	}
	public function delete() {
		$posts = $this->input->post ();
		$this->load->model ( "userhasgroup_model", "usergroup" );
		$this->usergroup->remove ( $posts ['usrgrp'] );
		$this->user->remove ( $posts ['id'] );
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
				'data' => $posts ['id'] 
		) ) );
	}
}
