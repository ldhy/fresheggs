<?php
function initializePdo() {
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
function prepareStatement($sql) {
	$pdo_statement = null;
	$pdo = initializePdo();
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
function connectMember($emailconnect, $passwordconnect) {
	$pdo_statement = prepareStatement('SELECT * FROM users WHERE email = :email AND password = :password');
	$pdo_statement->execute(array(
		'email' => $emailconnect,
		'password' => $passwordconnect
	));
	$result = $pdo_statement->fetch();
	return $result;
}

//Enregistrer un nouveau membre
function registerMember($pseudo, $email, $password) {
	$pdo_statement = prepareStatement('INSERT INTO users (pseudo, email, password) VALUES (:pseudo,:email,:password)');
	$pdo_statement->execute(array(
			'pseudo' => $pseudo,
			'email' => $email,
			'password' => $password
			));
	return $pdo_statement;
	}


//Calcul form dcr
function calculDcr(){
	if(isset($_POST['formdcr']))
	{
			$dcr1 = $_POST['dcr'];

			$clutchDcr = date('Y-m-d', strtotime($dcr1 . "- 27 days"));
			$extrafreshDcr = date('Y-m-d', strtotime($dcr1 . "- 19 days"));
			$freshDcr = date('Y-m-d', strtotime($dcr1 . "- 18 days"));
			$deadlineDcr = date('Y-m-d', strtotime($dcr1));

			$echoClutchDcr = date('d/m/Y', strtotime($clutchDcr));
			$echoExtrafreshDcr = date('d/m/Y', strtotime($extrafreshDcr));
			$echoFreshDcr = date('d/m/Y', strtotime($freshDcr));
			$echoDeadlineDcr = date('d/m/Y', strtotime($deadlineDcr));

			return $echoClutchDcr; //mettre dans un tableau où chaque valeur retourne...
			return $echoExtrafreshDcr;
			return $echoFreshDcr;
			return $echoDeadlineDcr;
		}
}

//Lire la recette aléatoire
function readRandRecipe($recipe_id) {
	$pdo_statement = prepareStatement('SELECT * FROM recipes WHERE id = :id');
	$pdo_statement->execute(array(
    'id' => $recipe_id
	));
	$result = $pdo_statement->fetch();
	return $result;
}

//Lire la recette depuis le browse /!\ mm requête que readRandRecipe -> à changer !!
function readRecipes($getid) {
	$pdo_statement = prepareStatement('SELECT * FROM recipes WHERE id = :id');
	$pdo_statement->execute(array(
    'id' => $getid
	));
	$result = $pdo_statement->fetch();
	return $result;
}

function shareRecipe($getid) {
	$pdo_statement = prepareStatement('SELECT * FROM recipes WHERE user_id = ?');
	$pdo_statement->execute(array($getid));
	$result = $pdo_statement->fetch();
	return $result;
}

//Affichage aléatoire de recette
function randRecipes(){
	$pdo = initializePdo();
	$recipes = $pdo->query('SELECT * FROM recipes ORDER BY rand() LIMIT 1');
	$result = $recipes->fetchAll();
	return $result;
}

//Page profil
function profilMember($getId) {
	$pdo_statement = prepareStatement('SELECT * FROM users WHERE id = :id');
	$pdo_statement->execute(array(
    'id' => $getId
	));
	$result = $pdo_statement->fetch();
	return $result;
}

//Affichage recettes
function browseRecipes() {
	$pdo = initializePdo();
	$recipes = $pdo->query('SELECT * FROM recipes');
	$result = $recipes->fetchAll();
	return $result;
}

//Afficher les tags sur la page recipe.php
function tags($tag_id){
		$pdo = initializePdo();
		$tags = $pdo->query('SELECT * FROM tags');
		$result = $tags->fetchAll();
		return $result;
}

//Afficher les recettes du tag sélectionné
function tagSelected($tag_id){
	$pdo_statement = prepareStatement(
              'SELECT * FROM recipes
              JOIN recipe_tag
              ON recipes.id = recipe_tag.recipe_id
              WHERE tag_id = ?');
  $pdo_statement->execute(array($tag_id));
	$result = $pdo_statement->fetchAll();
	return $result;
}

//Ajouter une recette
function addRecipes($title, $content, $user_id, $type) {
	$pdo_statement = prepareStatement('INSERT INTO recipes(title, content, user_id, type) VALUES(:title, :content, :user_id, :type)');
	$pdo_statement->execute(array(
			'title' => $title,
			'content' => $content,
			'user_id' => $_SESSION['id'],
			'type' => $type
			));
	return $pdo_statement;
}

//Afficher une recette pour la modifier
function displayRecipes($update_id){
	$pdo_statement = prepareStatement('SELECT * FROM recipes WHERE id = ?');
	$pdo_statement->execute(array($update_id));
	$result = $pdo_statement->fetch();
	return $result;
}

//Modifier une recette
function updateRecipes($update_id, $update_title, $update_content, $update_user, $update_type){
	$pdo_statement = prepareStatement('UPDATE recipes SET id = :id, title = :title, content = :content, user_id = :user_id, type= :type WHERE id = :id');
	$pdo_statement->execute(array(
			'id' => $update_id,
			'title' => $update_title,
			'content' => $update_content,
			'user_id' => $update_user,
			'type' => $update_type
			));
	return $pdo_statement;
}

//Supprimer une recette
function deleteRecipes($delete_id) {
	$pdo_statement = prepareStatement('DELETE FROM recipes WHERE id = :id');
	$pdo_statement->execute(array(
			'id' => $delete_id
			));
	$result = $pdo_statement->fetch();
	return $result;
}

//Ajouter une recette à ses favoris
function addFavRecipes($user_id, $favoritesrecipes_id){
	$pdo_statement = prepareStatement(
        'INSERT INTO user_favorite(member_id, recipe_id)
        VALUES(:member_id, :recipe_id)');
  $pdo_statement->execute(array(
    'member_id' => $user_id,
    'recipe_id' => $favoritesrecipes_id
  ));
	return $pdo_statement;
}

//Voir les recettes favorites
function favRecipes($getid){
	$pdo_statement = prepareStatement(
            'SELECT * FROM recipes
            JOIN user_favorite
            ON recipes.id = user_favorite.recipe_id
            WHERE member_id = ?
						');
  $pdo_statement->execute(array($getid));
	$result = $pdo_statement->fetchAll();
	return $result;
}

//Supprimer une recette des favoris
function deleteFav($getid){
	$pdo_statement = prepareStatement(
            'DELETE FROM user_favorite
						WHERE user_favorite.id = ?
						');
  $pdo_statement->execute(array($getid));
	$result = $pdo_statement->fetch();
	return $result;
}
