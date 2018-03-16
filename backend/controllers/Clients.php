<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Clients extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}

		//Chargement des modeles
		$this->load->model ( "Clients_model", "client" );
		$this->load->model ( "Owneradresse_model", "owneradresse" );
		$this->load->model ( "Adresse_model", "adresse" );
		$this->load->model ( "Parents_model", "parents" );
		$this->load->model ( "ParentsLink_model", "parentslink" );
		$this->load->model ( "Ressources_model", "ressources" );
		$this->load->model ( "TypeRessouces_model", "typesressources" );
		$this->load->model ('Pays_model','pays');
	}

	//Affichages des propriétaires
	public function index() {
		$data['clients'] = $this->owneradresse->getWhere("");	
		$data['pays'] = $this->pays->getAllPays();
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/index',array('data'=>$data) );
	}

	//Ajout et modif de propriétaire
	public function save() {
		$posts = $this->input->post();
		$message = "";
		$typeMessage = "success";

		// Table Client		
		$dataclient = array (
				'title'=>$posts['indentite'],
				'marriedname'=>strtoupper($posts['marriedname']),
				'firstname1' => strtoupper($posts ['firstname1']),
				'firstname2' => ucwords($posts ['firstname2']),
				'firstname3' => ucwords($posts ['firstname3']),
				'birthdate' => $this->cic_auth->FormatDate($posts ['birthday']),
				'birthplace' => $posts ['birthplace'],
				'familysituation' => $posts ['familysituation'],
				'aide_organisme' => $posts ['aide_organisme'],
				'nom_organisme' => $posts ['nom_organisme'],
				'montant_aide' => $posts ['montant_aide'], 
				'type_travaux_finan' => $posts ['type_travaux_finan']
		);

		// Table Adresse
		$dataAdresse = array (
				'adress1' => ucwords($posts ['adresse1']),
				'adress2' => ucwords($posts ['adresse2']),
				'lieu_dit' => $posts ['lieu_dit'],
				'cp' => $posts ['cp'],
				'region' => $posts ['region'],
				'ville' => $posts ['ville'],
				'pays' => $posts ['pays'],
				'phone' => $posts ['phone'],
				'cellphone1' => $posts ['cellphone1'],
				'fax' => $posts ['fax'],
				'mail' => $posts ['mail']
		);
		
		//Modification table Client et Adresse
		if((isset($posts['idInfoPerso'])) && (isset($posts['idInfoAdresse']))){
			$idclient = $this->client->modificationclient($dataclient,$posts['idInfoPerso']);
			$idadresse = $this->adresse->modificationAdresse($dataAdresse,$posts['idInfoAdresse']);			
		}else{				
			$idclient = $this->client->add($dataclient);			
			if($idclient == 0){
				$message = "Ce donnée existe déjà dans la base de données ";
				$typeMessage = "error";
				$this->session->set_flashdata ( $typeMessage, $message);
				redirect ( base_url () . "admin.php/clients" );
			}
			//ajout des donnees dans la table owners			
			//ajout des donnees dans la table Adresse
			$idadresse = $this->adresse->add($dataAdresse);		
			//Table relation entre adresse et client		
			$this->owneradresse->save($idclient,$idadresse);

			// Ajout parent et lien  demandeur		
			$dataLiendemandeur = array('name'=>'DEMANDEUR');
			$id_demandeur = $this->parentslink->add($dataLiendemandeur);		
			$dataDemandeur = $this->client->getWhereID($idclient);		
			$DemandeurParent = array(
					'owner_id'=>$dataDemandeur['id'],
					'name'=>strtoupper($dataDemandeur['firstname1']),
					'firstname'=>ucwords($dataDemandeur['firstname2']),
					'birthdate'=>($dataDemandeur['birthdate']),
					'link_parent_id' => $id_demandeur
			);

		    $parent_idDemandeur = $this->parents->add($DemandeurParent);
		}

		$donneeTypeDemandeur = array();
		$donneeMontantDemandeur = array();
		
		for($i=0;$i<9;$i++){
			array_push($donneeTypeDemandeur, $posts['typeRessoucesDemandeur'][$i]);
			array_push($donneeMontantDemandeur, $posts['montantRessoucesDemandeur'][$i]);
		}
		

		//Modification de ressources demandeur
		if(isset($posts['idInfoRessourceAdresse'])){			
			//Modification
			$dataRessourceDemandeur = array(				
				'montant' => serialize($donneeMontantDemandeur)
			);
			$this->ressources->modificationressources($dataRessourceDemandeur,$posts['idInfoRessourceAdresse']);			
		}else{
			//sinon ajout			
			$dataTypedemande = array('name'=>serialize($donneeTypeDemandeur));
			$id_ressoucesDemandeur = $this->typesressources->add($dataTypedemande);
			$dataRessourceDemandeur = array(
				'owner_id' => $idclient,
				'parent_id' => $parent_idDemandeur,
				'type_resource_id' => $id_ressoucesDemandeur,
				'montant' => serialize($donneeMontantDemandeur)
			);
			$this->ressources->add($dataRessourceDemandeur);
		}
					
		//Modification et ajout ressources vivant au foyer
		if(isset($posts['idDataParent'])){							
			$nombre  = ($posts['idDataParent']) - 1;				
			if($nombre != 0){
    			$this->AjoutModification($nombre,0,$posts,"");
    		}    		
    		$typeMessage = "success";
    		$message = "Votre donnée  a été bien modifiée !";
    		$this->session->set_flashdata ( $typeMessage, $message);
		redirect ( base_url () . "admin.php/clients/details/".$posts['idInfoPerso']);
		}else{
			//Ajout vivant au foyer			
    		$nombre  = $posts['nombreVivantfoyer'];
    		if($nombre != 0){    			
    			$this->AjoutModification($nombre,1,$posts,$idclient);
    		}
    		
    		$typeMessage = "success";
    		$message = "Votre donnée  a été bien enregistrée !";
    		$this->session->set_flashdata ( $typeMessage, $message);
			redirect ( base_url () . "admin.php/clients" );
		}
	}
	
	//Affichage de details des propriétaires
	public function details($id){
		$data = $this->owneradresse->getWhere(array('owners_id'=>$id));
		$pays = $this->pays->getAllPays();
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/details',array('data'=>$data,
																								'pays'=>$pays) );
	}


	//Ajout et modif de parents
	public function AjoutModification($nombre,$action,$posts,$client){
		for($i=1; $i<=$nombre;$i++){
				$j = $i+1;        		
        		
        		$nom = strtoupper($posts["nomParent".$j]);
        		$prenom = ucwords($posts["prenomParent".$j]);
        		$datenaissance = $this->cic_auth->FormatDate($posts["datenaissanceParent".$j]);
        		//print_r($datenaissance);
        		$lienParent= $posts["lienParent".$j];
        		
        		$typeressouces = $posts['typeRessoucesParents'.$j];
        		$ressouces = $posts['montantRessoucesParents'.$j];        	        		
        		//action ajout
        		if($action == 1){
        			$dataLienFoyer = array('name'=>($lienParent));
        			$id_foyer = $this->parentslink->add($dataLienFoyer);
	        			$FoyerParent = array(
	        				'owner_id'=>$client,
	        				'name'=>$nom,
	        				'firstname'=>$prenom,
	        				'birthdate'=>$datenaissance,
	        			'link_parent_id' => $id_foyer
	        		);
	        		$parent_idFoyer = $this->parents->add($FoyerParent);
        		}else{   
        			$dataLienFoyer = array('name'=>($lienParent));

        			$this->parentslink->modificationLinkParents($dataLienFoyer,$posts['idInfoLinkParent'.$j]);     			
        			$FoyerParent = array(
	        				'name'=>$nom,
	        				'firstname'=>$prenom,
	        				'birthdate'=>$datenaissance,
	        				'link_parent_id' => $posts['idInfoLinkParent'.$j]
	        		);
	        		$this->parents->modificationParents($FoyerParent, $posts['idInfoParent'.$j]);	        		
        		}
        		
        		        		
        		$donneeTypeFoyer = array();
        		$donneeMontantFoyer= array();
        		for($ii=0;$ii<9;$ii++){
        			array_push($donneeTypeFoyer, $typeressouces[$ii]);
        			array_push($donneeMontantFoyer, $ressouces[$ii]);
        		}   
        		
        		//ressources 
        		if($action == 1){
        			//nouveau ressources
        		 	$dataType = array('name'=>serialize($donneeTypeFoyer));
        			$id_ressouces = $this->typesressources->add($dataType); 
        			$dataRessourceFoyer = array(
        				'owner_id' => $client,
        				'parent_id' => $parent_idFoyer,
        				'type_resource_id' => $id_ressouces,
        				'montant' => serialize($donneeMontantFoyer)
        			);
        			$this->ressources->add($dataRessourceFoyer);
        		 }else{        		 	
        		 	//modifications ressources
        		 	$dataRessourceFoyer = array(
        				'montant' => serialize($donneeMontantFoyer)
        			);
        			$this->ressources->modificationressources($dataRessourceFoyer,$posts['idInfoParentRessources'.$j]);        			
        		 }
        			        			        		
        }
	}

	public function Exports($id){
		$this->load->library("Phppdf");
		$this->load->view("clients/export");
	}

	public function deleteClient(){
		$posts = $this->input->post();
		$idpersonne = $posts['idpersonne'];
		$idadresse = $posts['idadresse'];
		$this->owneradresse->remove($idpersonne,$idadresse);
		$this->client->remove($idpersonne);
		$this->adresse->remove($idadresse);
		$this->parents->remove($idpersonne);
		$this->ressources->remove($idpersonne);
		$this->output->set_content_type ( 'application/json' )
				->set_output (json_encode( array (
				'data' => 1
		) ) );
	}

	public function getUpdatetat(){
		$gets = $this->input->get();
		$reponse = 2;
		if($gets['action'] == 0){
			$reponse = 0;
		}else{
			$reponse = 1;
		}
		$data  = array('etat' => $gets['action']);
		$this->client->modificationclient($data,$gets['id']);
		$this->output->set_content_type ( 'application/json' )
				->set_output (json_encode($reponse) );
	}
}
