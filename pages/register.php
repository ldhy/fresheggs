<?php
session_start();

require __DIR__.'/../models/Users.php';

if(isset($_POST['forminscription']))
{
  if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['emailconfirm']) AND !empty($_POST['password']) AND !empty($_POST['passwordconfirm']))
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $emailconfirm = htmlspecialchars($_POST['emailconfirm']);
    $password = sha1($_POST['password']);
    $passwordconfirm = sha1($_POST['passwordconfirm']);

    $pseudolength = strlen($pseudo);
    if($pseudolength <= 255)
    {
      if($email == $emailconfirm)
      {
          if($password == $passwordconfirm)
          {
            try
            {
          		$register = Users::registerMember($pseudo, $email, $password);
            	$message = "Votre compte a bien été créé";
            }
            catch(PDOException $e)
            {
                    die('Erreur : '.$e->getMessage());
                    $pdo = null;
            }
          }
          else
          {
            $message = "Vos mots de passe de correspondent pas";
          }
      }
      else
      {
        $message = "Vos adresses email ne correspondent pas";
      }
    }
    else
    {
      $message = "Votre pseudo ne doit pas dépasser 255 caractères";
    }
  }
  else
  {
    $message = "Tous les champs doivent être complétés";
  }
}

require __DIR__.'/../views/register.view.php';
