<?php

class Users {

  public function initializePdo() {
  	try {
  	  require __DIR__ . '/Config.php';

  	  $pdo = new PDO(
  	    "mysql:dbname=$dbname;host=$host;charset=utf8", $user, $password
  	  );
  	} catch (PDOException $e) {
  	  echo 'erreur : ' . $e->getMessage();
  	  $pdo = null;
  	}
  	return $pdo;
  }

  //Préparation de la requête SQL
  public function prepareStatement($sql) {
  	$pdo_statement = null;
  	$pdo = self::initializePdo();
  	if ($pdo) {
  		try {
  		  $pdo_statement = $pdo->prepare($sql);
  		} catch (PDOException $e) {
  		  echo 'erreur : ' . $e->getMessage();
  		}
  	}
  	return $pdo_statement;
  }

  //Connexion membre
  public function connectMember($emailconnect, $passwordconnect) {
  	$pdo_statement = self::prepareStatement('SELECT * FROM users WHERE email = :email AND password = :password');
  	$pdo_statement->execute(array(
  		'email' => $emailconnect,
  		'password' => $passwordconnect
  	));
  	$result = $pdo_statement->fetch();
  	return $result;
  }

  //Enregistrer un nouveau membre
  public function registerMember($pseudo, $email, $password) {
  	$pdo_statement = self::prepareStatement('INSERT INTO users (pseudo, email, password) VALUES (:pseudo,:email,:password)');
  	$pdo_statement->execute(array(
  			'pseudo' => $pseudo,
  			'email' => $email,
  			'password' => $password
  			));
  	return $pdo_statement;
  	}

  //Page profil
  public function profilMember($getId) {
  	$pdo_statement = self::prepareStatement('SELECT * FROM users WHERE id = :id');
  	$pdo_statement->execute(array(
      'id' => $getId
  	));
  	$result = $pdo_statement->fetch();
  	return $result;
  }

}
