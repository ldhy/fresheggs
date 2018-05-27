<?php ob_start(); ?>

<p><a href="recipes.php">Retour aux recettes</a></p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <p><a href="fav.php">Voir mes recettes favorites</a></p>
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
