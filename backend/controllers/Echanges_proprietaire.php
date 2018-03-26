<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Echanges_proprietaire extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		//Chargement des modeles		
		$this->load->model ("Owneradresse_model", "owneradresse");
		$this->load->model ("Types_echanges_model", "types_echanges");
		$this->load->model ("Ownerechanges_model", "ownerechanges");
		$this->load->model ("Echanges_proprietaire_model", "echanges");
		
	}

	public function index(){
		$data['clients'] =$this->owneradresse->getWhere("");
		$data['clients-echange'] =$this->ownerechanges->getWhere("","");
		$this->template->title ( 'Gestions des échanges des rendez-vous avec propriétaires' )->build ( 'echange-proprietaire/index',array('data'=>$data));
	}

	public function getWhere(){
		$gets = $this->input->post();
		if($gets['id'] != ""){
			$data =$this->ownerechanges->getWhere("",array('owner_id'=>$gets['id']));	
		}else{
			$data =$this->ownerechanges->getWhere("","");	
		}	
		
		$this->output->set_content_type ( 'application/json' )
				->set_output (json_encode($data) );
	}

	public function getAppelMessage(){
		$posts = $this->input->post();
		$data['appel'] = $this->ownerechanges->getWhere(array('owner_id'=>$posts['id'],'type_echange.nom'=>'appel'),"");
		$data['message'] = $this->ownerechanges->getWhere(array('owner_id'=>$posts['id'],'type_echange.nom'=>'message'),"");
		$this->output->set_content_type ( 'application/json' )
				->set_output (json_encode($data) );
	}

	public function saves(){
		$posts = $this->input->post();
		if($posts['selectClient'] == 0){
				$typeMessage = "error";
	    		$message = "Veuillez remplir le champs nom du propriétaire svp!";
	    		$this->session->set_flashdata ( $typeMessage, $message);
				redirect ( base_url () . "admin.php/echanges-rendez-vous-proprietaires" );
		}
		if($posts['types'] == 0){			
			

			$confirmation = 0;
			if($posts['confirmation'] == 'on'){
				$confirmation = 1;
			}

			
			if($posts['idechange'] == 0){
				$dataTypes = array('nom'=>'appel');
				$types = $this->types_echanges->add($dataTypes);
				$dataechanges = array(
					'type_echange_id'=>$types,
					'date'=>$posts['dateappel'],
					'motif'=>$posts['motifi'],
					'telephones'=>($posts['numphone']),
					'code_confirmation' =>$confirmation,
					'commentaires '=>$posts['commentaires'],
					'daterappel'=>$posts['daterappel']
				);
				$echanges= $this->echanges->add($dataechanges);
				$this->ownerechanges->save($posts['selectClient'],$echanges);
				$typeMessage = "success";
	    		$message = "Votre donnée  a été bien enregistrée !";
			}else{
				$dataechanges = array(
					'date'=>$posts['dateappel'],
					'motif'=>$posts['motifi'],
					'telephones'=>($posts['numphone']),
					'code_confirmation' =>$confirmation,
					'commentaires '=>$posts['commentaires'],
					'daterappel'=>$posts['daterappel']
				);
				$echanges= $this->echanges->modification($dataechanges,$posts['idechange']);
				$typeMessage = "success";
	    		$message = "Votre donnée  a été bien modifiée !";
			}
			
    		$this->session->set_flashdata ( $typeMessage, $message);
			redirect ( base_url () . "admin.php/echanges-rendez-vous-proprietaires" );
		}else{

			$dataTypes = array('nom'=>'message');
			$types = $this->types_echanges->add($dataTypes);

			$dataechanges = array(
				'type_echange_id'=>$types,
				'date'=>date("d/m/Y H:i:s"),
				'motif'=>$posts['motifi'],
				'messages'=>($posts['messageenvoyer']),
				'mails'=>($posts['emailpro'])
			);
			if($posts['idmessageechange'] == 0){
				$echanges= $this->echanges->add($dataechanges);
				$this->ownerechanges->save($posts['selectClient'],$echanges);
				$typeMessage = "success";
	    		$message = "Votre donnée  a été bien enregistrée !";
			}else{
				$echanges= $this->echanges->modification($dataechanges,$posts['idmessageechange']);
				$typeMessage = "success";
	    		$message = "Votre donnée  a été bien modifiée !";
			}
			
    		$this->session->set_flashdata ( $typeMessage, $message);
			redirect ( base_url () . "admin.php/echanges-rendez-vous-proprietaires" );
		}
	}

	public function getEchanges(){
		$gets = $this->input->get();
		$data = $this->ownerechanges->getWhere(array('echange_id'=>$gets['id']),"");
		$this->output->set_content_type ( 'application/json' )
			->set_output (json_encode($data) );
	}
}