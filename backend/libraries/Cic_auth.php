<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
/**
 * Cic_auth
 *
 * Authentication library for Code Igniter.
 *
 * @package Cic_auth
 * @author Samuelson
 * @version 0.1
 * @license MIT License Copyright (c) 2013 Samuelson
 */
class Cic_auth {
	function __construct() {
		$this->ci = & get_instance ();
		$this->ci->load->model ( 'user_model', 'users' );
	}
	/**
	 * Tester le login et mot de passe d'un utilisateur
	 *
	 * @param : $array
	 *        	*
	 */
	
	// md5
	function login($login, $password) {
		$message = "Login ou mot de passe incorrect";
		$user = $this->ci->users->getAuth ( $login );
		print_r($user);die();
		if ($user) {
			if ($user ["password"] == md5 ( $password )) {
				$this->ci->session->set_userdata ( "user", $user );
				$message = "ok";
				$this->loadMenu ();
			}
		}
		return $message;
	}
	function is_logged_in() {
		$user = $this->ci->session->userdata ( "user" );
		return $user ["idusr"];
	}
	function logout() {
		$this->ci->session->unset_userdata ( "user" );
		$this->ci->session->sess_destroy ();
	}
	public function loadMenu() {
		$this->ci->load->model ( 'droits_model', 'droits' );
		$this->ci->load->model ( 'group_model', 'groupes' );
		
		$data = [
				['name' => 'Gestions des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Artisans','url'=> '#','sous_menu'=>[["nomMenu"=>"Listes des Artisans","url"=>base_url('admin.php/dashboard')]]],
				
				['name' => 'Gestions des Clients','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Clients','url'=>'#','sous_menu'=>[["nomMenu"=>"Listes des Clients","url"=>base_url('admin.php/dashboard')]]
				],
				
				['name' => 'Gestions des Tournées','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Tournées','url'=> '#','sous_menu'=>[["nomMenu"=>"Listes des Tournées","url"=>base_url('admin.php/dashboard')]]
				],
				
				['name' => 'Gestions des Diagnostics','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Diagnostics','url'=>'#','sous_menu'=>[["nomMenu"=>"Listes des Diagnostics","url"=>base_url('admin.php/dashboard')]]
				],
				
				
				['name' => 'Gestions des Attestations des Assurances des Artisans','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des A-A-A','url'=>'#','sous_menu'=>[["nomMenu"=>"Listes des A-A-A","url"=>base_url('admin.php/dashboard')]]
				],
				['name' => 'Gestions des Devis','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Devis','url'=>'#','sous_menu'=>[["nomMenu"=>"Listes des Devis","url"=>base_url('admin.php/dashboard')]]
				],
				['name' => 'Gestions des Users','actionvoir'=>'Unchecked','actioncreer'=>'Unchecked','actionmodifier'=>'Unchecked','actionsupprimer'=>'Unchecked',
						'alias'=>'Gestions des Users','url'=>'#','sous_menu'=>[["nomMenu"=>"Gérer utilisateur","url"=>base_url('admin.php/user_listes')],
								["nomMenu"=>"Gérer Droits","url"=>base_url('admin.php/dashboard')],
								["nomMenu"=>"Gérer Groupes","url"=>base_url('admin.php/groupes')]
						]
				]
		];
		//print_r($data[0]['name']);die;
		$dataGrp = $this->ci->groupes->get_all();		
		$dataDroits = $this->ci->droits->get_all();
		if(count($dataDroits) == 0){
			foreach ($dataGrp as $grp){
				foreach ($data as $value){
					$posts = array (
							'menu' => $value ['name'],
							'voir' =>$value ['actionvoir'],
							'creer' =>$value ['actioncreer'],
							'modifier' =>$value ['actionmodifier'],
							'supprimer' =>$value ['actionsupprimer'],
							'idgroup' =>$grp['idgrp'],
							'alias_menu'  => $value ['alias'],
							'url_menu'  => $value ['url'],
							'sous_menu'  => serialize($value ['sous_menu'])
					);
					//print_r(array($value ['sous_menu']));
					$this->ci->droits->add ( $posts );
				}
			}
			//die;
			return $data;
		}
	}
}