<?php
namespace Gsb\Controllers;

use App\Classes\Controller;
use App\Classes\ValidationFormulaire;
use App\Classes\Mail;
use App\Classes\Sms;

class UserController extends Controller
{

    protected $modelName = '\Gsb\Models\UserModel';
    private $erreur = [];

    public function logIn()
    {
        $validation = new ValidationFormulaire;

        $validation->checkLogin($_POST['login'])->checkMdp($_POST['mdp']);

        if (!empty($validation->resultat())) {

            $this->erreur['form_login']['erreur'] = $validation->resultat();

        } elseif (!$this->authentification($_POST['login'], $_POST['mdp'])) {

            $this->erreur['form_login']['erreur'][] = "Le login et/ou le mot de passe sont incorrects.";

        } else {
            $infos = $this->getInfosUtilisateur($_POST['login']);
            $this->creerSessionUtilisateur($infos);
        }

        $this->index();
    }

    private function preauthentification($login, $email)
    {
        if ($this->model->preauthentification($login, $email)->fetch()) {
            return true;
        }

    }

    private function authentification($login, $mdp)
    {
        
        if (password_verify($mdp,$this->model->authentification($login)->fetch()->mdp)) {
            return true;
        }

    }

    private function getInfosUtilisateur(string $login)
    {
        return $this->model->getInfosUtilisateur($login)->fetch();
    }

    private function creerSessionUtilisateur($infos)
    {
        $_SESSION['user'] = $infos;
    }

    public function logOut()
    {
        session_destroy();
        // $this->index();
        header("Location:/gsb/public/");
    }

    public function ModifierMdp()
    {
        
        $this->render('v_modifier_mdp');
        
    }

    public function ModifierMdpVerif()
    {
        $validation = new ValidationFormulaire;

        $validation->checkMdp($_POST['mdpnew'])->checkMdp($_POST['mdp'])->checkMdpIdem($_POST['mdpnew'],$_POST['mdp']);
        
        if (!empty($validation->resultat())) {

            $this->erreur['form_modifier_mdp']['erreur'] = $validation->resultat();
            $erreur = $this->erreur;
            $this->render('v_modifier_mdp', compact('erreur'));

        } 
 
        else {

            $mdp = password_hash($_POST['mdpnew'], PASSWORD_DEFAULT);
            $id = $_SESSION['user']->id;

            $this->model->majMdp($id,$mdp);
            $this->render('v_mdp_modifie');
        }
    
    }

    public function ReinitialiserMdp()
    {
        
        $this->render('v_reinitialiser_mdp');
        
    }

    public function ReinitialiserMdpVerif()
    {
        $validation = new ValidationFormulaire;

        $validation->checkLogin($_POST['login'])->checkEmail($_POST['email']);
        
        if (!empty($validation->resultat())) {

            $this->erreur['form_reinitialiser_mdp']['erreur'] = $validation->resultat();
            $erreur = $this->erreur;
            $this->render('v_reinitialiser_mdp', compact('erreur'));

        } elseif (!$this->preauthentification($_POST['login'], $_POST['email'])) {
            
            $this->erreur['form_reinitialiser_mdp']['erreur'][] = "Le login et/ou l'adresse email sont incorrects.";
            $erreur = $this->erreur;
            $this->render('v_reinitialiser_mdp', compact('erreur'));
        
        } else { 
        
            $id = $this->getInfosUtilisateur($_POST['login'])->id;
            $mdp = uniqid();
            $mdp = str_shuffle($mdp);

            $nom = $this->getInfosUtilisateur($_POST['login'])->nom;
            $prenom = $this->getInfosUtilisateur($_POST['login'])->prenom;

            $destinataire = $this->getInfosUtilisateur($_POST['login'])->email;
            $objet = 'Reinitialisation de votre mot de passe';
            $contenu_msg = 'Bonjour '.$prenom.' '.$nom.',<br><br>
            Votre mot de passe &agrave; &eacute;t&eacute; r&eacute;initials&eacute; avec succ&egrave;s. 
            Voici votre nouveau mot de passe :<br><br>'
            .$mdp.'<br><br>
            Nous vous recommandons de le changer imm&eacute;diatement d&egrave;s votre prochaine connexion.<br><br>
            Si vous n\'&ecirc;tes pas a l\'origine de cette r&eacute;initialisation, contactez imm&eacute;diatement SOS Informatique GSB au 01-23-45-67-89.<br><br>
            Bien cordialement,<br>
            Votre support informatique GSB.';

            $mail = new Mail;
            $mail->sendMail($destinataire,$objet,$contenu_msg);

            $msg_admin = 'INFO_ADMIN_GSB_mdp_'.$prenom.'_'.$nom.'_reinitialise';
            $sms = new Sms();
            $sms->sendSms($msg_admin);

            $mdp = password_hash($mdp, PASSWORD_DEFAULT);
            $this->model->majMdp($id,$mdp);
            $this->render('v_mdp_reinitialise');
   
        }
    
    }

    public function index()
    {

        if (isset($_SESSION['user'])) {

            $this->render('v_accueil');

        } else {

            $erreur = $this->erreur;
            
            if (isset($_POST['login'])) {
                $saisie['form_login']['login'] = filter_var($_POST['login'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            else {
                $saisie = '';
            }

            $this->render('v_connexion', compact('erreur', 'saisie'));
        }

    }

}
