<?php
session_start();

if($_SESSION) {
  require __DIR__.'/../models/Users.php';

  $userinfo = Users::profilMember($getId);

  require __DIR__.'/../views/profil.view.php';
}
else {
  require __DIR__.'/../views/error.view.php';
}
