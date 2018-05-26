<?php

class Recipes {

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

  //Affichage recettes
  public function browseRecipes() {
    $pdo = self::initializePdo();
    $recipes = $pdo->query('SELECT * FROM recipes');
    $result = $recipes->fetchAll();
    return $result;
  }

  //Afficher détail des recettes
  public function readRecipe($recipe_id) {
  	$pdo_statement = self::prepareStatement('SELECT * FROM recipes WHERE id = :id');
  	$pdo_statement->execute(array(
      'id' => $recipe_id
  	));
  	$result = $pdo_statement->fetch();
  	return $result;
  }

  //Affichage aléatoire de recette
  public function randRecipes(){
  	$pdo = self::initializePdo();
  	$recipes = $pdo->query('SELECT * FROM recipes ORDER BY rand() LIMIT 1');
  	$result = $recipes->fetchAll();
  	return $result;
  }

//Ajouter une recette
  public function addRecipe($title, $description, $ingredients, $content, $user_id, $type) {
    $pdo_statement = self::prepareStatement('INSERT INTO recipes(title, description, ingredients, content, user_id, type) VALUES(:title, :description, :ingredients, :content, :user_id, :type)');
    $pdo_statement->execute(array(
        'title' => $title,
        'description' => $description,
        'ingredients' => $ingredients,
        'content' => $content,
        'user_id' => $_SESSION['id'],
        'type' => $type
        ));
    return $pdo_statement;
}

//Modifier une recette
  public function editRecipe($recipe_id, $title, $description, $ingredients, $content, $user, $type){
    $pdo_statement = self::prepareStatement('UPDATE recipes SET id = :id, title = :title, description = :description, ingredients = :ingredients, content = :content, user_id = :user_id, type= :type WHERE id = :id');
    $pdo_statement->execute(array(
      'id' => $recipe_id,
      'title' => $title,
      'description' => $description,
      'ingredients' => $ingredients,
      'content' => $content,
      'user_id' => $_SESSION['id'],
      'type' => $type
      ));
    return $pdo_statement;
  }

  //Supprimer une recette
  public function deleteRecipe($recipe_id) {
  	$pdo_statement = self::prepareStatement('DELETE FROM recipes WHERE id = :id');
  	$pdo_statement->execute(array(
  			'id' => $recipe_id
  			));
  	$result = $pdo_statement->fetch();
  	return $result;
  }

}
