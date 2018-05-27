<?php ob_start(); ?>

<p><a href="recipes.php">Voir les recettes</a></p>

<div class="container">
  <div class="row">
      <div class="card col-lg-12" style="width: 18rem;">
        <div class="card-body">
          <h1 class="title-index"><?= $readRecipe['title']; ?></h1>
            <p><?= $recipe['description']; ?></p>
            <p><?= $readRecipe['description']; ?></p>
            <p><?= $readRecipe['ingredients']; ?></p>
            <p><?= $readRecipe['content']; ?></p>
        </div>

      <!--
      <h1><?= $readRecipe['title']; ?></h1>
        <p><?= $readRecipe['description']; ?></p>
        <p><?= $readRecipe['ingredients']; ?></p>
        <p><?= $readRecipe['content']; ?></p>
      -->

<?php
if($_SESSION['id'] != $readRecipe['user_id']) {
?>
      <p><a href="addFav.php?favorites_id=<?= $readRecipe['id']; ?>"><button type="button" class="btn btn-warning">Ajouter à mes favoris</button></a></p>

<?php
}

if($_SESSION['id'] == $readRecipe['user_id']) {
?>
    <h4>Ceci est ma recette :) </h4>
    <p><a href="edit.php?recipe_id=<?= $readRecipe['id'] ?>"><button type="button" class="btn btn-warning">Modifer</button></a>
    <a href="delete.php?recipe_id=<?= $readRecipe['id'] ?>"><button type="button" class="btn btn-warning">Supprimer</button></a></p>
<?php
}
?>


<?php
if(isset($message))
{
  echo $message;
}
?>
</div>
  </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
