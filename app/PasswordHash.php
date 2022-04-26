<?php

class Database {
	private $dsn="mysql:dbname=gsb_frais;host=localhost";
	private $login="root";
	private $password="root";
	private $pdo;

	public function __construct() {
		$this->pdo = new PDO($this->dsn,$this->login,$this->password);
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	}

	public function query($query,$params=false) {
		if($params) {
			$req=$this->pdo->prepare($query);
			$req->execute($params);
		}
		else {
			$req=$this->pdo->query($query);
		}
		
		return $req;
	
	}

}

$db= new Database();

$passwords=$db->query('SELECT mdp FROM Visiteur')->fetchAll();

foreach ($passwords as $password) {
    $new_password = password_hash($password->mdp, PASSWORD_DEFAULT);
    $db->query('UPDATE visiteur SET mdp=? WHERE mdp=?',[$new_password,$password->mdp]);
}


/*
echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
*/
