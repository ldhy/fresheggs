<?php
class Favorites {

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

  //Voir les recettes favorites
    public function readFavorites($member_id){
  	$pdo_statement = self::prepareStatement(
              'SELECT * FROM recipes
              JOIN favorites
              ON recipes.id = favorites.recipe_id
              WHERE member_id = ?
  						');
    $pdo_statement->execute(array($member_id));
  	$result = $pdo_statement->fetchAll();
  	return $result;
  }

  //Ajouter une recette à ses favoris
    public function addFavRecipes($member_id, $favorites_id){
  	$pdo_statement = self::prepareStatement(
          'INSERT INTO favorites(member_id, recipe_id)
          VALUES(:member_id, :recipe_id)');
    $pdo_statement->execute(array(
      'member_id' => $member_id,
      'recipe_id' => $favorites_id
    ));
  	return $pdo_statement;
  }

  //Supprimer une recette des favoris
  public function deleteFavorite($favorites_id){
  	$pdo_statement = self::prepareStatement(
              'DELETE FROM favorites
  						WHERE favorites.id = ?
  						');
    $pdo_statement->execute(array($favorites_id));
  	$result = $pdo_statement->fetch();
  	return $result;
  }

}
