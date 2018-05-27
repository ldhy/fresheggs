<?php ob_start(); ?>

<p><a href="recipes.php">Voir les recettes</a></p>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1>Mes recettes favorites</h3>

        <div class="container">
        	<div class="row ">
        <?php

        		foreach($favRecipes as $favRecipe)
            {
        ?>
              <div class="card  col-md-6 col-lg-4" style="width: 18rem;">
                <div class="card-body">
                  <h1 class="title-index"><?= $favRecipe['title']; ?></h1>
                    <p><?= $favRecipe['description']; ?></p>
                    <p><?= $favRecipe['ingredients']; ?></p>
                    <p><?= $favRecipe['content']; ?></p>
                      <a href="deleteFav.php?favorites_id=<?= $favRecipe['id'] ?>"><button type="button" class="btn btn-warning">Supprimer</button></a>
                </div>
              </div>
<?php
if(isset($message))
{
  echo $message;
}
    }
?>

          </div>
        </div>
    </div>
  </div>
</div>
<?php
/*
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
*/
?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
