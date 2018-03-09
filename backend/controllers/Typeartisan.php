<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typeartisan extends CI_Controller {

    public function __construct() {
        parent::__construct ();
        if (!$this->cic_auth->is_logged_in ()) {
            redirect ( base_url () . "admin.php/user_login" );
        }
        $this->load->model('Type_artisan','typeartisan');
    }

    public function index()
    {
        $data = $this->typeartisan->art_query();
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function inde()
    {
        $data = $this->typeartisan->cat_query();
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function home()
    {
        $data = $this->typeartisan->type_as_query();
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }

    public function saves(){
        $posts = $this->input->post();
        $donnes = array('name'=> $posts['name']);
        $data = $this->typeartisan->create_art_query($donnes);
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function saves_categorie(){
        $posts = $this->input->post();
        $donnes = array('name_cat'=> $posts['name_cat']);
        $data = $this->typeartisan->create_categorie_query($donnes);
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function saves_assurance(){
        $posts = $this->input->post();
        $donnes = array('name_assur'=> $posts['name_assur']);
        $data = $this->typeartisan->create_assurance_query($donnes);
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function home_travaux()
    {
        $data = $this->typeartisan->type_travaux_query();
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }
    public function saves_travaux(){
        $posts = $this->input->post();
        $donnes = array('name_travaux'=> $posts['name_travaux']);
        $data = $this->typeartisan->create_travaux_query($donnes);
        $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( array (
            'data' => $data
        ) ) );
    }

}