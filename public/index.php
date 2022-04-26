<?php
session_start();

use App\Classes\Router;

require '../vendor/autoload.php';

define('RACINE', '/gsb/public');

$router = new Router();

$router->get('/', 'User#index', 'Identification');
$router->post('/login', 'User#logIn', 'Connexion');
$router->get('/reinitialiser_mdp', 'User#ReinitialiserMdp', 'reinitialiser_mdp');
$router->post('/reinitialiser_mdp_verif', 'User#ReinitialiserMdpVerif', 'reinitialiser_mdp_verif');

if (isset($_SESSION['user'])) {

        $router->get('/logout', 'User#logOut', 'Deconnexion')
        ->get('/modifier_mdp', 'User#ModifierMdp', 'Modifier_mdp')
        ->post('/modifier_mdp_verif', 'User#ModifierMdpVerif', 'Modifier_mdp_verif')
        ->get('/saisie_des_fiches', 'Fiches#SaisieFiches', 'Saisie des fiches')
        ->get('/consulter_mes_fiches', 'Fiches#ChoisirMois', 'Choisir le Mois')
        ->post('/consulter_mes_fiches', 'Fiches#ConsulterFiches', 'Consulter_mes_fiches');
}

$match = $router->run();
