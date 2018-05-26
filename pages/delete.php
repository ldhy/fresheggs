<?php
session_start();


if($_SESSION)
{
  require __DIR__.'/../models/Recipes.php';
  $recipe_id = htmlspecialchars($_GET['recipe_id']);
  $deleteRecipe = Recipes::deleteRecipe($recipe_id);

    if(isset($_POST['formdelete'])) {
    $message = "La recette a bien été supprimée";
    }

  require __DIR__.'/../views/delete.view.php';

}
else {
  require __DIR__.'/../views/error.view.php';
}
