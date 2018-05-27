<?php ob_start(); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1>Recettes</h1>
        <h3>Recherche par tags</h3>

<?php
          foreach($tags as $tag)
          {
?>
              <a href="tagSelected.php?tag_id=<?= $tag['id']; ?>"><button type="button" class="btn btn-warning" id="purple"><?= $tag['name']; ?></button></a>
<?php
          }
?>

        <div class="container">
	        <div class="row ">
<?php

        		foreach ($reqrecipes as $recipe)
            {
?>
              <div class="card  col-md-6 col-lg-4" style="width: 18rem;">
                <div class="card-body">
                  <h1 class="title-index"><?= $recipe['title']; ?></h1>
                    <p><?= $recipe['description']; ?></p>
                    <a href="../pages/read.php?recipe_id=<?= $recipe['id'] ?>"><button type="button" class="btn btn-warning">Voir la recette</button></a>
                </div>
              </div>
<?php
            }
?>

          </div>
        </div>
      </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
