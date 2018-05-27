<?php ob_start(); ?>

<h1>Mes recettes partagées</h1>

<div class="container">
	<div class="row ">
<?php

		foreach ($reqrecipes as $recipe)
		{
			if($_SESSION['id'] == $recipe['user_id'])
				{
?>
			<div class="card  col-md-6 col-lg-4" style="width: 18rem;">
				<div class="card-body">
					<h1 class="title-index"><?= $recipe['title']; ?></h1>
						<p><?= $recipe['description']; ?></p>
						<p><?= $recipe['ingredients']; ?></p>
						<p><?= $recipe['content']; ?></p>
							<a href="edit.php?recipe_id=<?= $recipe['id'] ?>"><button type="button" class="btn btn-warning">Modifier</button></a>
							<a href="delete.php?recipe_id=<?= $recipe['id'] ?>"><button type="button" class="btn btn-warning">Modifier</button></a>
				</div>
			</div>
<?php
if(isset($message))
{
	echo $message;
}
				}
		}
?>

	</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
