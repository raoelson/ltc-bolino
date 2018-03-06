<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Logements extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		if (! $this->cic_auth->is_logged_in ()) {
			redirect ( base_url () . "admin.php/user_login" );
		}
		$this->load->model ( "Logements_model", "logements" );
		$this->load->model ( "Typelogement_model", "types" );
		$this->load->model ( "Owneradresse_model", "client" );
		$this->load->model ( "Type_travaux_housing_model", "typetravaux" );
		$this->load->model ( "Travaux_housing_model", "travaux" );
	}
	public function index($id) {
		$data = $this->logements->getWhere (array('owner_id'=>$id));
		$this->template->title ( 'Gestions des Logements' )->build ( 'logement/index',array('data' => $data ,'idClient'=>$id));
	}

	public function saves(){		
		$posts = $this->input->post();

		$typeLogement = $posts['nameType'];
		$numero = $posts['numerovoie'];
		$nomvoie = $posts['nomvoie'];
		$codePostal = $posts['codepostal'];
		$ville = $posts['ville'];
		$surface = $posts['surface'];
		$nombrepiece = $posts['nombrepiece'];
		$nombrepersonne = $posts['nombrepersonne'];
		$dateconstruction = $this->cic_auth->FormatDate($posts['dateconstruction']);
        $typetravaux =  $posts['nature_travaux'];       
		$proprietaire = 0;
		if(isset($posts['proprietaire'])){			
			$proprietaire = 1;
		}

		$proprietaire1 = 0;
		if(isset($posts['proprietaire1'])){			
			$proprietaire1 = 1;
		}
		$locataire = 0;
		if(isset($posts['locataire'])){			
			$locataire = 1;
		}

		$locataire1 = 0;
		if(isset($posts['locataire1'])){
			$locataire1 = 1;
		}

		$occupant = 0;
		if(isset($posts['occupant'])){			
			$occupant = 1;
		}

		$occupant1 = 0;
		if(isset($posts['occupant1'])){
			$occupant1 = 1;
		}

		$beton = 0;
		if(isset($posts['beton'])){
			$beton = 1;
		}

		$cuisine = 0;
		if(isset($posts['cuisine'])){
			$cuisine = 1;
		}

		$eaupotable = 0;
		if(isset($posts['eaupotable'])){
			$eaupotable = 1;
		}

		$boisdulcifie = 0;
		if(isset($posts['boisdulcifie'])){
			$boisdulcifie = 1;
		}

		$salleeau = 0;
		if(isset($posts['salleeau'])){
			$salleeau =1;
		}

		$fosse_septique = 0;
		if(isset($posts['fosseeptique'])){
			$fosse_septique = 1;
		}

		$bois = 0;
		if(isset($posts['bois'])){
			$bois =1;
		}

		$wc = 0;
		if(isset($posts['wc'])){
			$wc = 1;
		}

		$toutegout = 0;
		if(isset($posts['toutegout'])){
			$toutegout =1;
		}

		$tole = 0;
		if(isset($posts['tole'])){
			$tole = 1;
		}

		$autre = 0;
		if(isset($posts['autre'])){
			$tole = 1;
		}

		$electricite = 0;
		if(isset($posts['electricite'])){
			$electricite = 1;
		}

		$dataHousing = array('name'=>$typeLogement);
		$dataTypetravaux = array('name'=>$typetravaux);

		if($posts['adresse'] == 1){

			$client = $this->client->getWhere(array('owners_id'=>$posts['idClient']));
			$numero = $client[0]['adresseAdresse1'];
			$nomvoie = $client[0]['adresseAdresse2'];
			$codePostal = $client[0]['adresseCp'];
			$ville = $client[0]['adresseVille'];
		}

		if($posts['idlogement'] != ""){	
			$data = array('type_housing'=>$typeLogement,
					  'adress1_sec'=>$numero,
					  'adress2_sec'=>$nomvoie,
					  'postalcode_sec'=>$codePostal,
					  'town_sec'=>$ville,
					  'area'=>$surface,
					  'numberpieces'=>$nombrepiece,
					  'numberpersons'=>$nombrepersonne,
					  'buildDate'=>$dateconstruction,
					  'log_proprietaire'=>$proprietaire,
					  'log_locataire'=>$locataire,
					  'log_occupant_gratuit'=>$occupant,
					  'foncier_proprietaire'=>$proprietaire1,
					  'foncier_locataire'=>$locataire1,
					  'foncier_occupant_gratuit'=>$occupant1,
					  'beton'=>$beton,
					  'bois_dulcifie'=>$boisdulcifie,
					  'bois'=>$bois,
					  'tole'=>$tole,
					  'autres_mat'=>$autre,
					  'cuisine'=>$cuisine,
					  'salle_eau'=>$salleeau,
					  'wc'=>$wc,
					  'eau_potable'=>$eaupotable,
					  'tout_a_egout'=>$toutegout,
					  'fosse_septique'=>$fosse_septique,
					  'electricite'=>$electricite,
					  'adresseetat'=>$posts['adresse']);

						  		
			$this->types->updates($dataHousing,$posts['idtype']);
			$this->logements->updates($data,$posts['idlogement']);
			$this->typetravaux->updates($dataTypetravaux,$posts['idTypeTravaux']);		
			$this->session->set_flashdata ("success","Votre donnée a été bien modifiée");
			redirect ( base_url () . "admin.php/logements/index/".$posts['idClient']);
		}else{
			$idType = $this->types->add($dataHousing);
			$data = array('type_housing'=>$typeLogement,
					  'placecalledsec'=>$numero,
					  'adress1_sec'=>$nomvoie,
					  'adress2_sec'=>$typeLogement,
					  'postalcode_sec'=>$codePostal,
					  'town_sec'=>$ville,
					  'area'=>$surface,
					  'numberpieces'=>$nombrepiece,
					  'numberpersons'=>$nombrepersonne,
					  'buildDate'=>$dateconstruction,
					  'log_proprietaire'=>$proprietaire,
					  'log_locataire'=>$locataire,
					  'log_occupant_gratuit'=>$occupant,
					  'foncier_proprietaire'=>$proprietaire1,
					  'foncier_locataire'=>$locataire1,
					  'foncier_occupant_gratuit'=>$occupant1,
					  'beton'=>$beton,
					  'bois_dulcifie'=>$boisdulcifie,
					  'bois'=>$bois,
					  'tole'=>$tole,
					  'autres_mat'=>$autre,
					  'cuisine'=>$cuisine,
					  'salle_eau'=>$salleeau,
					  'wc'=>$wc,
					  'eau_potable'=>$eaupotable,
					  'tout_a_egout'=>$toutegout,
					  'fosse_septique'=>$fosse_septique,
					  'electricite'=>$electricite,
					  'type_housing_id' => $idType,
					  'owner_id'=>$posts['idClient'],
					  'adresseetat'=>$posts['adresse']);

			$idLogment= $this->logements->add($data);
			$idTypetravaux = $this->typetravaux->add($dataTypetravaux);	
			$dataTravaux = array('type_travaux_id'=>$idTypetravaux,
									'housing_id'=>$idLogment,
									'housing_id1'=>$idLogment);
			$this->travaux->add($dataTravaux);
			$this->session->set_flashdata ("success","Votre donnée a été bien enregistrée");
			redirect ( base_url () . "admin.php/logements/index/".$posts['idClient']);

		}
	}
		
}
