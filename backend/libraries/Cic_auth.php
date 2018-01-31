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
	
	//md5
	
	function login($login, $password) {
		$message = "Login ou mot de passe incorrect";
		$user = $this->ci->users->getAuth( $login );
		if ($user) {
			if ($user ["password"] ==  md5($password)) {
				$this->ci->session->set_userdata ( "user", $user );
				$message = "ok";
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
}