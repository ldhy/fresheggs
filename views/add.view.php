<?php ob_start(); ?>

  <p><a href="recipes.php">Retour aux recettes</a></p>
<h1>Partager une recette</h1>

<?php
	if(isset($message))
	{
		echo $message;
	}
?>

  <form action="" method="post">
    <table>
      <tr>
        <td>
          <input type="text" placeholder="Titre de votre recette" name="title" />
        </td>
      </tr>
      <tr>
        <td>
          <input type="text" placeholder="Donner une description" name="description" />
        </td>
      </tr>
      <tr>
        <td>
          <textarea type="text" placeholder="Noter les ingredients" rows="16" cols="45" name="ingredients" /></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <textarea type="text" placeholder="Tapez votre recette" rows="16" cols="45" name="content" /></textarea>
        </td>
      </tr>
      <tr>
        <td>
          <label for="oui">Oeufs extra frais</label>
          <input type="radio" name="type" value="oui" id="oui" checked="checked" />
        </td>
      </tr>
      <tr>
        <td>
          <label for="non">Oeufs frais</label>
          <input type="radio" name="type" value="non" id="non" />
        </td>
      </tr>
    </table>
  		<input type="hidden" name="user_id"/>
      <input type="submit" value="Partager" name="formaddrecipes"/>
  </form>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
