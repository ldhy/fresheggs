<?php
session_start();

//Ajouter aux favoris
if($_SESSION)
{
  require __DIR__.'/../models/Favorites.php';
  $favorites_id = $_GET['favorites_id'];
  $member_id = $_SESSION['id'];

  $addFavRecipes = Favorites::addFavRecipes($member_id, $favorites_id);

  $message = 'La recette bien été ajoutée à vos favoris';
  require __DIR__.'/../views/addFav.view.php';
}
else {
  require __DIR__.'/../views/error.view.php';
}
