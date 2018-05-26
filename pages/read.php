<?php
session_start();

if(isset($_GET['recipe_id']) AND !empty($_GET['recipe_id']) AND $_SESSION)
{
	require __DIR__.'/../models/Recipes.php';
	$recipe_id = htmlspecialchars($_GET['recipe_id']);
	$readRecipe = Recipes::readRecipe($recipe_id);

	if($readRecipe)
	{
		//$displayRecipes = $displayRecipes->fetch();
	}
	else
	{
		//die("La recette n'existe pas");
		$message = "La recette n'existe pas";
	}
	require __DIR__.'/../views/read.view.php';
}
else
{
	require __DIR__.'/../views/error.view.php';
}
