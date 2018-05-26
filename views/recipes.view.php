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

			 <h1><?= $recipe['title']; ?></h1>
         <h2><?= $recipe['description']; ?></h2>
          <p>
            <a href="../pages/read.php?recipe_id=<?= $recipe['id'] ?>"><?= 'Voir la recette'?></a>
<?php
}
?>
        </p>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
