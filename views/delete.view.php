<?php ob_start(); ?>

  <p><a href="recipes.php">Retour aux recettes</a></p>
<?php
if(isset($message))
{
  echo $message;
}
?>

<h1>Supprimer la recette</h1>
  <form action="" method="post">
    <input type="submit" value="Confirmer la suppression" name="formdelete"/>
  </form></br>



<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
