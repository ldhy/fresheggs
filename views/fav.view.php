<?php ob_start(); ?>

<p><a href="recipes.php">Voir les recettes</a></p>
  <h1>Mes recettes favorites</h3>


<?php
			foreach($favRecipes as $favRecipe)
			{
?>
      <h1><?= $favRecipe['title']; ?></h1>
        <p><?= $favRecipe['content']; ?></p>
        <a href="deleteFav.php?favorites_id=<?= $favRecipe['id'] ?>"><?= 'Supprimer'?></a>

<?php
			}

if(isset($message))
{
  echo $message;
}
?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
