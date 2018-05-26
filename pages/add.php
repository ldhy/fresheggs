<?php
session_start();

if($_SESSION){
  require __DIR__.'/../models/Recipes.php';

    if(isset($_POST['formaddrecipes']))
    {
      if(!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['type']))
      {
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $ingredients = htmlspecialchars($_POST['ingredients']);
        $content = htmlspecialchars($_POST['content']);
        $type = $_POST['type'];

        $titlelength = strlen($title);
        if($titlelength <= 255)
        {
            $addRecipes = Recipes::addRecipe($title, $description, $ingredients, $content, $user_id, $type);
            $message = "Votre recette a bien été ajoutée";
        }
    		else
    		{
    			$message = "Votre titre ne doit pas contenir plus de 255 caractères";
    		}
      }
    	else
    	{
    		$message = "Veuillez compléter tous les champs";
    	}
    }
  require __DIR__.'/../views/add.view.php';
}
else {
  require __DIR__.'/../views/error.view.php';
}
