<?php ob_start(); ?>

<p><a href="recipes.php">Retour aux recettes</a></p>

<?php

if(isset($message))
{
  echo $message;
}
?>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
