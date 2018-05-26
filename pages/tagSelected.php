<?php
session_start();


if($_SESSION)
{
  require __DIR__.'/../models/RecipeTag.php';
    if(isset($_GET['tag_id']))
    {
      $tag_id = htmlspecialchars($_GET['tag_id']);
      $tag_selected = RecipeTag::tagSelected($tag_id);

      if($tag_selected)
      {
      }
      else
      {
        //die("Aucune recette pour ce tag");
        $message = "Aucune recette pour ce tag";
      }
      require __DIR__.'/../views/tagSelected.view.php';
    }
}
else
{
  require __DIR__.'/../views/error.view.php';
}
