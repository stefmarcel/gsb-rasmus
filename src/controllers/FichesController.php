<?php
namespace Gsb\Controllers;

use \App\Classes\Controller;

class FichesController extends Controller
{

    protected $modelName = '\Gsb\Models\FichesModel';

    public function SaisieFiches()
    {
        $mois = date("Ym");
        $numAnnee = substr($mois, 0, 4);
        $numMois = substr($mois, 4, 2);

        $lesFraisForfait = $this->getLesFraisForfait($mois);
        $lesFraisHorsForfait = $this->getLesFraisHorsForfait($mois);

        $this->render('v_saisie_fiches', compact('mois', 'numAnnee', 'numMois', 'lesFraisForfait', 'lesFraisHorsForfait'));
    }

    private function getLesFraisForfait($mois)
    {

        return $this->model->getLesFraisForfait($_SESSION['user']->id, $mois)->fetchAll();
    }

    private function getLesFraisHorsForfait($mois)
    {

        return $this->model->getLesFraisHorsForfait($_SESSION['user']->id, $mois)->fetchAll();
    }

    public function ChoisirMois()
    {
        $lesMois = $this->model->getLesMoisDisponibles($_SESSION['user']->id)->fetchAll();

        $this->render('v_listeMois', compact('lesMois'));
    }

    public function verifLigneExistante()
    {
        //..

    }

    public function ConsulterFiches()
    {
        //...
    }

}
