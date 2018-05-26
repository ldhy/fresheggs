<?php
session_start();

if($_SESSION){
	require __DIR__.'/../models/Recipes.php';

		if(isset($_GET['recipe_id']) AND !empty($_GET['recipe_id']))
		{
			$recipe_id = htmlspecialchars($_GET['recipe_id']);
			$readRecipe = Recipes::readRecipe($recipe_id);

			if($readRecipe)
			{
				//$displayRecipes = $displayRecipes->fetch();
			}
			else
			{
				die("La recette n'existe pas");
			}
		}

		if(isset($_POST['formupdate']))
		{
		  if(!empty($_POST['title']) AND !empty($_POST['content']))
		  {
				$recipe_id = htmlspecialchars($_GET['recipe_id']);
		    $title = htmlspecialchars($_POST['title']);
				$description = htmlspecialchars($_POST['description']);
        $ingredients = htmlspecialchars($_POST['ingredients']);
		    $content = htmlspecialchars($_POST['content']);
				$user = $_SESSION['id'];
				$type = $_POST['type'];

				$updateRecipe = Recipes::editRecipe($recipe_id, $title, $description, $ingredients, $content, $user, $type);

		    $message = "La recette a bien été modifiée";
		  }
			else
			{
				$message = "Tous les champs doivent être complétés";
			}
		}
require __DIR__.'/../views/edit.view.php';
}
else {
	require __DIR__.'/../views/error.view.php';
}
