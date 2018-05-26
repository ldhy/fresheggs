<?php
session_start();

if($_SESSION) {
  require __DIR__.'/../models/Recipes.php';
  $reqrecipes = Recipes::browseRecipes();

  require __DIR__.'/../views/shared.view.php';
}
else {
	require __DIR__.'/../views/error.view.php';
}
