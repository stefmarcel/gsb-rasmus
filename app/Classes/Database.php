<?php
namespace App\Classes;

use PDO;

/**
 * Exécution d'une requête à l'aide de PDO
 */
class Database
{

    private $dsn = "mysql:dbname=gsb_frais;host=localhost;charset=utf8";
    private $login = "root";
    private $password = "root";

    private $pdo;

    public function __construct()
    {

        if ($this->pdo == null) {
            $this->pdo = new PDO($this->dsn, $this->login, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        }

    }

    /**
     * Retourne le PDO statement le la requête passée
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement|false
     */

    public function query(string $query, array $params = [])
    {
        if ($params) {

            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } else {

            $req = $this->pdo->query($query);

        }

        return $req;

    }

    public function show(string $query, array $params = [])
    {
        var_dump($query);
        var_dump($params);
    }

}
