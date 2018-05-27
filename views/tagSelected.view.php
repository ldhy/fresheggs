<?php ob_start(); ?>

<p><a href="recipes.php">Retour aux recettes</a></p>

<div class="container">
  <div class="row">

<?php
			foreach($tag_selected as $tag)
			{
?>
			<div class="card col-lg-12" style="width: 18rem;">
				<div class="card-body">
					<h1 class="title-index"><?= $tag['title']; ?></h1>
      			<p><?= $tag['description']; ?></p>
						<p><?= $tag['ingredients']; ?></p>
						<p><?= $tag['content']; ?></p>
				</div>
			</div>
<?php
			}

if(isset($message))
{
  echo $message;
}
?>
		</div>
	</div>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
