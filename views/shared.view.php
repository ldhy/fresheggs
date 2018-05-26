<?php ob_start(); ?>

<h1>Mes recettes partagées</h1>

<?php

		foreach ($reqrecipes as $recipe)
    {
      if($_SESSION['id'] == $recipe['user_id'])
				{ ?>
          <h1><?= $recipe['title']; ?></h1>
            <p><?= $recipe['content']; ?></p>
    			 		<a href="edit.php?recipe_id=<?= $recipe['id'] ?>"><?= 'Modifier'?></a>
    					<a href="delete.php?recipe_id=<?= $recipe['id'] ?>"><?= 'Supprimer'?></a>
				<?php
				}
				?>
			 </p>

      <?php
      			}
      ?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
