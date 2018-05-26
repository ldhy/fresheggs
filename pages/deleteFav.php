<?php
session_start();

if($_SESSION)
{
  require __DIR__.'/../models/Favorites.php';
  $favorites_id = htmlspecialchars($_GET['favorites_id']);
  $deleteRecipe = Favorites::deleteFavorite($favorites_id);


    if(isset($_POST['formdelete'])) {
    $message = "La recette a bien été supprimée";
    }

  require __DIR__.'/../views/delete.view.php';

}
else {
  require __DIR__.'/../views/error.view.php';
}
