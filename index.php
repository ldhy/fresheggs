<?php
session_start();

if(isset($_POST['formconnection']) AND empty($_GET['recipe_id']))
{
  require __DIR__.'/models/Users.php';
  $emailconnect = htmlspecialchars($_POST['emailconnect']);
  $passwordconnect = sha1($_POST['passwordconnect']);
  if(!empty($emailconnect) AND !empty($passwordconnect))
  {
			$user = Users::connectMember($emailconnect, $passwordconnect);

			if(!empty($user))
			{
				$_SESSION['id'] = $user['id'];
				$_SESSION['pseudo'] = $user['pseudo'];
				$_SESSION['email'] = $user['email'];
        header('location: pages/recipes.php');
			}
			else
			{
				$message = "Mauvais email ou mot de passe";
			}
  }
  else
  {
    	$message = "Tous les champs doivent être complétés";
  }
}

if(isset($_POST['formconnection']) AND $_GET['recipe_id'])
{
  require __DIR__.'/models/Users.php';
  $emailconnect = htmlspecialchars($_POST['emailconnect']);
  $passwordconnect = ($_POST['passwordconnect']);
  $getrecipeid = htmlspecialchars($_GET['recipe_id']);
  if(!empty($emailconnect) AND !empty($passwordconnect))
  {
			$user = Users::connectMember($emailconnect, $passwordconnect);

			if(!empty($user))
			{
				$_SESSION['id'] = $user['id'];
				$_SESSION['pseudo'] = $user['pseudo'];
				$_SESSION['email'] = $user['email'];
        header('location: pages/read.php?recipe_id='. $getrecipeid);
			}
			else
			{
				$message = "Mauvais email ou mot de passe";
			}
  }
  else
  {
    	$message = "Tous les champs doivent être complétés";
  }
}


//Calcul depuis formulaire DCR
$dcr1 = $_POST['dcr'];
$clutchDcr = date('Y-m-d', strtotime($dcr1 . "- 27 days"));
$extrafreshDcr = date('Y-m-d', strtotime($dcr1 . "- 19 days"));
$freshDcr = date('Y-m-d', strtotime($dcr1 . "- 18 days"));
$deadlineDcr = date('Y-m-d', strtotime($dcr1));

$echoClutchDcr = date('d/m/Y', strtotime($clutchDcr));
$echoExtrafreshDcr = date('d/m/Y', strtotime($extrafreshDcr));
$echoFreshDcr = date('d/m/Y', strtotime($freshDcr));
$echoDeadlineDcr = date('d/m/Y', strtotime($deadlineDcr));

//Calcul depuis formulaire date extra frais max voulue
$dcr2 = $_POST['extrafresh'];
$extrafreshmax = date('d/m/Y', strtotime($dcr2 . "+ 19 days"));
$fresh2 = date('d/m/Y', strtotime($dcr2 . "+ 1 day"));
$clutch2 = date('d/m/Y',strtotime($dcr2 . "- 8 days"));
$deadline2 = date('d/m/Y', strtotime($dcr2));

//Affichage recette aléatoire depuis DCR
if(isset($_POST['formdcr']))
{
  require __DIR__.'/models/Recipes.php';
  $reqrecipes = Recipes::randRecipes();
}

//Affichage recette aléatoire depuis date extra frais max voulue
if(isset($_POST['formextrafresh']))
{
  require __DIR__.'/models/Recipes.php';
  $reqrecipes = Recipes::randRecipes();
}

require __DIR__.'/views/index.view.php';
