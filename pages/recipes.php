<?php
session_start();

if($_SESSION) {
  require __DIR__.'/../models/Recipes.php';
  $reqrecipes = Recipes::browseRecipes();

  require __DIR__.'/../models/Tags.php';
  $tags = Tags::browseTags($tag_id);

  require __DIR__.'/../views/recipes.view.php';
}
else {
	require __DIR__.'/../views/error.view.php';
}
