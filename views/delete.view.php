<?php ob_start(); ?>

<p><a href="recipes.php">Retour aux recettes</a></p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">

<?php
    if(isset($message))
    {
      echo $message;
    }
?>

      <h1>Supprimer la recette</h1>
        <form action="" method="post">
          <input type="submit" class="btn btn-warning" value="Confirmer la suppression" name="formdelete"/>
        </form></br>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
