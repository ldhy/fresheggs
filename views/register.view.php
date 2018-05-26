<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Fresh Eggs</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/style.css"/>
    </head>

    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-light" id="navbrand">
          <a class="navbar-brand" href="../index.php">Fresh Eggs</a>
          <br class="navbar-brand navbar-brand-laptop">
          <a class="navbar-brand italic slogan" href="../index.php">Mes oeufs sont-ils frais, archi-frais ?</a>
        </nav>
      </header>

      <section>
        <h1>S'inscrire</h1>

        <form action="" method="POST">
          <table>
            <tr>
              <td align="right">
                <label for="pseudo">Pseudo : </label>
              </td>
              <td>
                <input type="text" name="pseudo" />
              </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="email">Email : </label>
                </td>
                <td>
                  <input type="email" name="email" />
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="emailconfirm">Confirmez votre email : </label>
                </td>
                <td>
                  <input type="email" name="emailconfirm" />
                </td>
              </tr>
              <tr>
                <td align="right">
                  <label for="password">Mot de passe : </label>
                </td>
                <td>
                  <input type="password" name="password" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="passwordconfirm">Confirmez votre mote de passe : </label>
                </td>
                <td>
                  <input type="password" name="passwordconfirm" />
                </td>
              </tr>
            </table>
          <input type="submit" value="M'inscrire" name="forminscription"/>
        </form>
      </section>

  <?php
    if(isset($message))
    {
      echo $message;
  ?>
      <a href="../index.php?recipe_id=<?= $_GET['recipe_id'] ?>"><?= 'Veuillez vous connecter'?>
  <?php
    }
  ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
