<?php ob_start(); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-6">
<?php
if(isset($_SESSION['id']))
{

?>
      <h1>Bienvenue <?= $_SESSION['pseudo']; ?></h1>
        <p><a href="shared.php">Mes recettes partagées</a></p>
        <p><a href="fav.php">Mes recettes favorites</a></p>
        <p><a href="add.php">Partager une recette</a></p>
        <p><a href="deconnexion.php">Se déconnecter</a></p>

<?php
}
else
{
  echo "Veuillez vous connecter ou vous enregistrer";
?>
  <p><a href="index.php">Se connecter</a></p>
  <p><a href="register.php">S'enregistrer</a></p>

<?php
}
?>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
