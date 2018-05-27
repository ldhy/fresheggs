<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Fresh Eggs</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="style/style.css"/>
    </head>

    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbrand">
          <a class="navbar-brand" href="index.php">Fresh Eggs</a>
          <br class="navbar-brand navbar-brand-laptop">
          <a class="navbar-brand italic slogan" href="index.php">Mes oeufs sont-ils frais, archi-frais ?</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
<?php
  if(!$_SESSION){
?>

            <form class="form-inline" action="" method="post">
              <div class="form-group mx-sm-3 mb-2">
                <input type="email" class="form-control" id="inputPassword2" placeholder="votre email" name="emailconnect" />
                <input type="password" class="form-control" id="inputPassword2" placeholder="votre mot de passe" name="passwordconnect"  />
              </div>
              <input type="submit" class="btn btn-primary mb-2" id="green-bck" value="ok" name="formconnection"/>
            </form>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link italic underline" href="./pages/register.php">S'inscrire</a>
              </li>
            </ul>


<?php
}

if($_SESSION){
?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Calcul</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/recipes.php">Les recettes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/add.php">Partager une recette</a>
              </li>
              <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Mon compte
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="./pages/profil.php">Mon profil</a>
                   <a class="dropdown-item" href="./pages/fav.php">Mes recettes favorites</a>
                   <a class="dropdown-item" href="./pages/shared.php">Mes recettes partagées</a>
                 </div>
               </li>
              <li class="nav-item">
                <a class="nav-link" href="./pages/logout.php">Se déconnecter</a>
              </li>
            </ul>
<?php
} ?>
          </div>
        </nav>
      </header>

      <!--<img id="img_eggs" src="style/images/eggs.jpg"/>-->


<section class="title-index">

  <p class="red">
      <?php
      if(isset($message))
        {
          echo $message;
        }
      ?>
  </p>

<div class="container">
  <section class="row">
    <div class="col-lg-12 hidden-xs">
      <h1>Bienvenue sur Fresh Eggs !</h1>
        <p>Vous ne savez jamais si vos oeufs sont consommables ?</br>
          Fresh Eggs vous permet de calculer la fraîcheur de vos oeufs</br>
          Et vous évite l'intoxication !</br>
          Vous trouverez également des recettes</br>
          Et des informations sur les oeuf
        </p>
    </div>
  </section>
</div>


<div class="container">
  <section class="row eggs">
    <div class="col-md-4 col-lg-4">
      <a href="#calculs"><img src="style/images/calculs.png"/></a>
    </div>

    <div class="col-md-4 col-lg-4">
        <a href="#calculs"><img src="style/images/infos.png"/></a>
    </div>

    <div class="col-md-4 col-lg-4">
        <a href="./pages/recipes.php"><img src="style/images/recettes.png"/></a>
    </div>
  </section>
</div>



  <div id="calculs">
        <h3>Je veux connaître :</h3>

        <h4>La date max en extra frais de mon oeuf :</h4>
          <form action="" method="post">
            <label>Je rentre la DCR de mon oeuf :</label>
            <input class="input-date" type="date" placeholder="jj/mm/aaaa" name="dcr" />
            <input class="input-date-submit" type="submit" value="ok" name="formdcr">
          </form>
        </br>


    <?php
    if(isset($_POST['formdcr'])){ ?>
        <p><span class="green">Mes oeufs sont extra frais du <?= $echoClutchDcr ?> au <?= $echoExtrafreshDcr ?></span> </br>
        <span class="orange">Mes oeufs sont frais du <?= $echoFreshDcr ?> au <?= $echoDeadlineDcr ?></span> </br>
        <span class="red">La date maximale de consommation de mes oeufs est le <?= $echoDeadlineDcr ?></span> </p>

    <?php
        foreach ($reqrecipes as $recipe)
          {
    ?>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h1 class="title-index"><?= $recipe['title']; ?></h1>
              <h3><?= $recipe['description']; ?></h3>
              <a href="./pages/read.php?recipe_id=<?= $recipe['id']; ?>"><button type="button" class="btn btn-warning">Voir la recette</button></a>
            </div>
          </div>
    <?php
          }
        }

    ?>
</div>
        <h4>La DCR max à choisir pour des oeufs extra frais :</h4>
            <form action="" method="post">
              <label>Je rentre la date limite pour laquelle je veux des oeufs extra frais :</label>
              <input class="input-date" type="date" placeholder="jj/mm/aaa" name="extrafresh" />
              <input class="input-date-submit" type="submit" value="ok" name="formextrafresh">
            </form>
        <br>

    <?php
    if(isset($_POST['formextrafresh'])){ ?>
      <p>Je choisis une DCR maximale au <span class="red"><?= $extrafreshmax ?></span> </br>
      <span class="green">Mes oeufs sont extra frais du <?= $clutch2 ?> au <?= $deadline2 ?> maximum</span> </br>
      <span class="orange">Mes oeufs sont frais du <?= $fresh2 ?> au <?= $extrafreshmax ?></span> </br>
      <span class="red">Mes oeufs ne sont plus consommables après le <?= $extrafreshmax ?></span> </p>

    <?php
        foreach ($reqrecipes as $recipe)
          {
    ?>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h1 class="title-index"><?= $recipe['title']; ?></h1>
              <a href="./pages/read.php?recipe_id=<?= $recipe['id']; ?>"><button type="button" class="btn btn-warning">Voir la recette</button></a>
            </div>
          </div>
    <?php
          }
     }
    ?>
  </section>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
