<?php

namespace Gsb\Models;

use App\Classes\DbModels;

class FichesModel extends DbModels
{

    public function getLesFraisForfait(string $idVisiteur, string $mois)
    {
        return $this->db->query("SELECT fraisforfait.id as idfrais, fraisforfait.libelle as libelle, lignefraisforfait.quantite as quantite
                                 FROM lignefraisforfait
                                 INNER JOIN fraisforfait
		                         ON fraisforfait.id = lignefraisforfait.idfraisforfait
		                         WHERE lignefraisforfait.idvisiteur =? AND lignefraisforfait.mois=?
		                         ORDER BY lignefraisforfait.idfraisforfait", [$idVisiteur, $mois]);
    }

    public function getLesFraisHorsForfait(string $idVisiteur, string $mois)
    {
        return $this->db->query('SELECT * FROM lignefraishorsforfait
                                WHERE lignefraishorsforfait.idvisiteur =?
		                        AND lignefraishorsforfait.mois = ?', [$idVisiteur, $mois]);
    }

    public function getLesMoisDisponibles(string $idVisiteur)
    {
        return $this->db->query('SELECT mois from  fichefrais where idvisiteur=? order by mois desc', [$idVisiteur]);
    }

    public function estPremierFraisMois(string $idVisiteur, string $mois)
	{
		return $this->db->query("SELECT count(*) AS nblignesfrais FROM fichefrais 
		WHERE fichefrais.mois = ? AND fichefrais.idvisiteur = ?", [$mois, $idVisiteur]);

	}




}
