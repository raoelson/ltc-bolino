<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Clients extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Clients_model", "client" );
		$this->load->model ( "Owneradresse_model", "owneradresse" );
		$this->load->model ( "Adresse_model", "adresse" );
		$this->load->model ( "Parents_model", "parents" );
		$this->load->model ( "ParentsLink_model", "parentslink" );
		$this->load->model ( "Ressources_model", "ressources" );
		$this->load->model ( "TypeRessouces_model", "typesressources" );
	}
	public function index() {
		$data = $this->client->get_all();
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/index',array('data'=>$data) );
	}
	public function save() {
		$posts = $this->input->post();
		//print_r($posts);die;
		
		// Table Client
		
		$dataclient = array (
				'title'=>$posts['indentite'],
				'marriedname'=>strtoupper($posts['marriedname']),
				'firstname1' => strtoupper($posts ['firstname1']),
				'firstname2' => ucwords($posts ['firstname2']),
				'firstname3' => ucwords($posts ['firstname3']),
				'birthdate' => $posts ['birthday'],
				'birthplace' => $posts ['birthplace'],
				'familysituation' => $posts ['familysituation'],
				'aide_organisme' => $posts ['aide_organisme'],
				'nom_organisme' => $posts ['nom_organisme'],
				'montant_aide' => $posts ['montant_aide'], 
				'type_travaux_finan' => $posts ['type_travaux_finan']
		);

		$idclient = $this->client->add($dataclient);
		
		// Table Adresse
		$dataAdresse = array (
				'adress1' => ucwords($posts ['adresse1']),
				'adress2' => ucwords($posts ['adresse2']),
				'lieu_dit' => $posts ['lieu_dit'],
				'cp' => $posts ['cp'],
				'ville' => $posts ['ville'],
				'pays' => $posts ['pays'],
				'phone' => $posts ['phone'],
				'cellphone1' => $posts ['cellphone1'],
				'fax' => $posts ['fax'],
				'mail' => $posts ['mail']
		);
							
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
				'birthdate'=>$dataDemandeur['birthdate'],
				'link_parent_id' => $id_demandeur
		);
		$parent_idDemandeur = $this->parents->add($DemandeurParent);
		
		$donneeTypeDemandeur = array();
		$donneeMontantDemandeur = array();
		
		for($i=0;$i<9;$i++){
			array_push($donneeTypeDemandeur, $posts['typeRessoucesDemandeur'][$i]);
			array_push($donneeMontantDemandeur, $posts['montantRessoucesDemandeur'][$i]);
		}
		
		$dataTypedemande = array('name'=>serialize($donneeTypeDemandeur));
		$id_ressoucesDemandeur = $this->typesressources->add($dataTypedemande);
		
		$dataRessourceDemandeur = array(
				'owner_id' => $idclient,
				'parent_id' => $parent_idDemandeur,
				'type_resource_id' => $id_ressoucesDemandeur,
				'montant' => serialize($donneeMontantDemandeur)
		);
		
		$this->ressources->add($dataRessourceDemandeur);
// 		------------------------------------------

        //Ajout vivant au foyer
        $nombre  = $posts['nombreVivantfoyer'];
        if($nombre != 0){
        	for($i=1; $i<=$nombre;$i++){
        		$j = $i+1;        		
        		$nom = strtoupper($posts["nomParent".$j]);
        		$prenom = ucwords($posts["prenomParent".$j]);
        		$datenaissance = $posts["datenaissanceParent".$j];
        		$lienParent= $posts["lienParent".$j];
        		
        		$typeressouces = $posts['typeRessoucesParents'.$j];
        		$ressouces = $posts['montantRessoucesParents'.$j];
        		
        		$dataLienFoyer = array('name'=>($lienParent));
        		
        		$id_foyer = $this->parentslink->add($dataLienFoyer);
        		$FoyerParent = array(
        				'owner_id'=>$idclient,
        				'name'=>$nom,
        				'firstname'=>$prenom,
        				'birthdate'=>$datenaissance,
        			'link_parent_id' => $id_foyer
        		);
        		$parent_idFoyer = $this->parents->add($FoyerParent);
        		
        		$donneeTypeFoyer = array();
        		$donneeMontantFoyer= array();
        		for($ii=0;$ii<9;$ii++){
        			array_push($donneeTypeFoyer, $typeressouces[$ii]);
        			array_push($donneeMontantFoyer, $ressouces[$ii]);
        		}   
        		
        			$dataType = array('name'=>serialize($donneeTypeFoyer));
        			$id_ressouces = $this->typesressources->add($dataType); 
        			
        			$dataRessourceFoyer = array(
        				'owner_id' => $idclient,
        				'parent_id' => $parent_idFoyer,
        				'type_resource_id' => $id_ressouces,
        				'montant' => serialize($donneeMontantFoyer)
        			);
        			$this->ressources->add($dataRessourceFoyer);
        	}
        }
		$this->session->set_flashdata ( "success", "Votre donnée  a été bien enregistrée !");
		redirect ( base_url () . "admin.php/clients" );
		
	}
	
	public function details($id){
		$data = $this->owneradresse->getWhere(array('owners_id'=>$id));
		//print_r((($data)));die;
		$this->template->title ( 'Gestions des Propriétaires' )->build ( 'clients/details',array('data'=>$data) );
	}
}
