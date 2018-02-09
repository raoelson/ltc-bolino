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
				[ 
						'name' => 'Gestions des Artisans',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Artisans',
						'url' => '#',
						'icon' => 'fa fa-edit',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des Artisans",
										"url" => "#" 
								],
								[
										"nomMenu" => "",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								] 
						] 
				],
				
				[ 
						'name' => 'Gestions des Clients',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Clients',
						'url' => '#',
						'icon' => 'fa fa-user',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des Clients",
										"url" => "clients" 
								],
								[
										"nomMenu" => "",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								] 
						] 
				],
				
				[ 
						'name' => 'Gestions des Tournées',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Tournées',
						'url' => '#',
						'icon' => 'fa fa-refresh',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des Tournées",
										"url" => "#" 
								],
								[
										"nomMenu" => "",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								] 
						] 
				],
				
				[ 
						'name' => 'Gestions des Diagnostics',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Diagnostics',
						'url' => '#',
						'icon' => 'fa fa-cog',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des Diagnostics",
										"url" =>"" 
								],
								[
										"nomMenu" => "",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								] 
						] 
				],
				
				[ 
						'name' => 'Gestions des Attestations des Assurances des Artisans',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des A-A-A',
						'url' => '#',
						'icon' => 'fa fa-list',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des A-A-A",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								],
								[
										"nomMenu" => "",
										"url" => "#"
								] 
						] 
				],
				[ 
						'name' => 'Gestions des Devis',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Devis',
						'url' => '#',
						'icon' => 'fa fa-money',
						'sous_menu' => [ 
								[ 
										"nomMenu" => "Listes des Devis",
										"url" => "#"
								],
								[ 
										"nomMenu" => "",
										"url" => "#" 
								],
								[ 
										"nomMenu" => "",
										"url" => "#" 
								] 
						] 
				],
				[ 
						'name' => 'Gestions des Users',
						'actionvoir' => 'Unchecked',
						'actioncreer' => 'Unchecked',
						'actionmodifier' => 'Unchecked',
						'actionsupprimer' => 'Unchecked',
						'alias' => 'Gestions des Users',
						'url' => '#',
						'icon' => 'fa fa-users',
						'sous_menu' => [ 
								[
										"nomMenu" => "Gérer utilisateur",
										"url" => "user_listes" 
								],
								[
										"nomMenu" => "Gérer droit",
										"url" => "droit"
// 										"sousNomMenu" => [
// 												[
// 														"nomMenu" => "Front office",
// 														"url" => "droit_fronted"
// 												],[
// 														"nomMenu" => "Back office",
// 														"url" => "droit_backend"
// 												]
// 										]
								],
								[
										"nomMenu" => "Gérer groupe",
										"url" =>"groupes"
								] 
						] 
				] 
		];
		
		$dataGrp = $this->ci->groupes->get_all ();
		$dataDroits = $this->ci->droits->get_all ( "NULL" );
		if (count ( $dataDroits ) == 0) {
			foreach ( $dataGrp as $grp ) {
				foreach ( $data as $value ) {
					$actionvoir = $value ['actionvoir'];
					if ($grp ['namegrp'] == 'Admin' || $grp ['namegrp'] == 'Administrateur' || $grp ['namegrp'] == 'admin' || $grp ['namegrp'] == 'administrateur') {
						$actionvoir = "Checked";
					}
					$posts = array (
							'menu' => $value ['name'],
							'voir' => $actionvoir,
							'creer' => $value ['actioncreer'],
							'modifier' => $value ['actionmodifier'],
							'supprimer' => $value ['actionsupprimer'],
							'idgroup' => $grp ['idgrp'],
							'alias_menu' => $value ['alias'],
							'url_menu' => $value ['url'],
							'iconmenu' => $value ['icon'],
							'sous_menu' => (serialize ( $value ['sous_menu'] )) 
					);
					$this->ci->droits->add ( $posts );
				}
			}
			return $data;
		}
	}
	public function getMenu() {
		if ($this->ci->session->userdata ( 'user' )) {
			$this->ci->load->model ( 'droits_model', 'droits' );
			$id = $this->ci->session->userdata ( 'user' ) ['group_id'];
			$dataMenu = $this->ci->droits->get_all ( $id );
			return $dataMenu;
		}
		return;
	}
}