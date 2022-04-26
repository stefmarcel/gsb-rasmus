<?php

namespace App\Classes;


/**
 * Classe parent pour les models
 */

class DbModels
{

    protected $db;
    protected $id_session;

    public function __construct()
    {
        $this->db = new Database;
        $this->id_session = session_id();
    }

}
