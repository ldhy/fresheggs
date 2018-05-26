<?php

class Tags {

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

/*
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
*/

  //Afficher les tags sur la page recipe.php
  public function browseTags($tag_id){
  		$pdo = self::initializePdo();
  		$tags = $pdo->query('SELECT * FROM tags');
  		$result = $tags->fetchAll();
  		return $result;
  }

}
