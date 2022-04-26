<?php

namespace App\Classes;

class Erreur404Controller extends Controller
{

    /**
     * Rendu de la page 404
     *
     * @return void
     */

    public function index()
    {
        $this->render('Erreur404');

    }

}
