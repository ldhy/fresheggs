<?php ob_start(); ?>

<p><a href="recipes.php">Voir les recettes</a></p>

    <h1><?= $readRecipe['title']; ?></h1>
      <p><?= $readRecipe['description']; ?></p>
      <p><?= $readRecipe['ingredients']; ?></p>
      <p><?= $readRecipe['content']; ?></p>

<?php
if($_SESSION['id'] != $readRecipe['user_id']) {
?>
      <p><a href="addFav.php?favorites_id=<?= $readRecipe['id']; ?>">Ajouter à mes favoris</a></p>
<?php
}

if($_SESSION['id'] == $readRecipe['user_id']) {
?>
    <h4>Ceci est ma recette :) </h4>
    <a href="edit.php?recipe_id=<?= $readRecipe['id'] ?>"><?= 'Modifier'?></a>
    <a href="delete.php?recipe_id=<?= $readRecipe['id'] ?>"><?= 'Supprimer'?></a>
<?php
}
?>


<?php
if(isset($message))
{
  echo $message;
}
?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
