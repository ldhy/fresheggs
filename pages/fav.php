<?php
session_start();


if($_SESSION)
{
  require __DIR__.'/../models/Favorites.php';
  $member_id = $_SESSION['id'];
  $favRecipes = Favorites::readFavorites($member_id);
  
  if($favRecipes)
  {
  }
  else
  {
    $message = "Aucune recette favorite";
  }
  require __DIR__.'/../views/fav.view.php';
}
else {
  require __DIR__.'/../views/error.view.php';
}
