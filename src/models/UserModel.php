<?php

namespace Gsb\Models;

use App\Classes\DbModels;

class UserModel extends DbModels
{

    public function preauthentification(string $login, string $email)
    {
        return $this->db->query('SELECT id FROM visiteur WHERE login=? AND email=?', [$login, $email]);
    }

    public function authentification(string $login)
    {
        return $this->db->query('SELECT mdp FROM visiteur WHERE login=?', [$login]);
    }

    public function getInfosUtilisateur(string $login)
    {
        return $this->db->query('SELECT id, nom, prenom, email FROM visiteur WHERE login=?', [$login]);
    }

    public function majMdp(string $id, string $mdp)
    {

        return $this->db->query('UPDATE Visiteur SET mdp=? WHERE id=?', [$mdp,$id]);

    }

}
