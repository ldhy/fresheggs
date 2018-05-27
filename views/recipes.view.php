<?php ob_start(); ?>

<h1>Recettes</h1>

<h3>Recherche par tags</h3>

<?php
    foreach($tags as $tag)
    {
?>
        <a href="tagSelected.php?tag_id=<?= $tag['id']; ?>"><button><?= $tag['name']; ?></button></a>
<?php
    }
?>


<?php

		foreach ($reqrecipes as $recipe)

    {
?>

<div class="container">
  <div class="row">
    <div class="col-lg-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h1 class="title-index"><?= $recipe['title']; ?></h1>
            <h2 class="title-index"><?= $recipe['description']; ?></h2>
            <a href="../pages/read.php?recipe_id=<?= $recipe['id'] ?>"><button type="button" class="btn btn-warning">Voir la recette</button></a>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
}
?>




<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
