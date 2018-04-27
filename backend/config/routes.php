<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 	Routage User

$route['user_login'] = 'user';
$route['user_verify']['post']= 'user/login';
$route['user_logout'] = 'user/logout';

$route['user_listes'] = 'user/listes';
$route['user_save'] = 'user/save';
/*
$route['user_auth'] = 'user';
$route['user_auth'] = 'user'; */


// 	Routage Groupes

$route['groupes'] = 'group';
$route['groupes_save'] = 'group/save';


// 	Routage Droit

$route['droit'] = 'droit';
$route['droit_backend_save'] = 'droit/save';


// 	Routage Dashboard

$route['dashboard'] = 'welcome';
/* $route['user_auth'] = 'user';
 $route['user_auth'] = 'user';
 $route['user_auth'] = 'user'; */


// 	Routage Clients

$route['clients'] = 'clients';
$route['clients_saves'] = 'clients/save';
$route['clients/details/(:id)'] = 'clients/details/$1';
$route['clients/exports/(:id)'] = 'clients/exports/$1';


// 	Routage artisan


$route['artisan'] = 'artisan';
$route['create_artisan'] = 'artisan/create_artisan';
//$route['artisan/ind'] = 'artisan/ind';
//$route['artisan/edit_artisan'] = 'artisan/edit_artisan';
$route['artisan/details_artisan/(:id)'] = 'artisan/details_artisan/$1';

//Routage Housing
$route['logements/index/(:id)'] = 'logements/index/$1';
$route['logements_saves'] = 'logements/saves';


//Routage Demandes
$route['demande/index'] = 'demande/index';
$route['demande_saves'] = 'demande/save';
$route['demande/modification/(:id)'] = 'demande/modification/$1';
$route['demande/modification']='demande/modif';
$route['demande/devis/(:id)'] = 'demande/devis/$1';
$route['demande/travaux/(:id)'] = 'demande/travaux/$1';



//Routage echange rdv
$route['echanges-rendez-vous-proprietaires'] = 'echanges_proprietaire';
$route['echanges-proprietaires-saves'] = 'echanges_proprietaire/saves';
$route['rendez_vous'] = 'rendez_vous';
$route['rendez_vous_edit'] = 'rendez_vous/edit';
$route['rendez_vous_ajout'] = 'rendez_vous/ajout_rendez_vous';
$route['echanges-proprietaires'] = 'echanges_proprietaire';
$route['echanges-proprietaires-saves'] = 'echanges_proprietaire/saves';
$route['echanges-artisans'] = 'echanges_artisans';
$route['echanges-artisans-saves'] = 'echanges_artisans/saves';
