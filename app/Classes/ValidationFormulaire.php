<?php

namespace App\Classes;

class ValidationFormulaire
{

    private $erreur = [];

    public function checkEmail(string $email)
    {
        if (empty(trim($email))) {
            $this->erreur[] = "L'email n'est pas renseigné.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->erreur[] = "L'email saisi n'a pas le bon format.";

        }
        return $this;
    }

    public function checkMdp(string $mdp)
    {
        if (empty(trim($mdp))) {
            $this->erreur[] = "Le mot de passe n'est pas renseigné.";
        } elseif (strlen($mdp) < 3) {
            $this->erreur[] = "Le mot de passe doit comporter au minimum 3 caractères.";
        }
        return $this;
    }

    public function checkMdpIdem(string $mdpnew, string $mdp)
    {
        if ($mdpnew != $mdp) {
            $this->erreur[] = "Les mots de passes ne sont pas identiques.";
        return $this;
        }
    }

    public function checkLogin(string $login)
    {
        if (empty(trim($login))) {
            $this->erreur[] = "Le login n'est pas renseigné.";
        }
        return $this;
    }

    public function resultat()
    {
        return $this->erreur;
    }
}
