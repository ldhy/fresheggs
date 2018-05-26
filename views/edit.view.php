<?php ob_start(); ?>

  <p><a href="recipes.php">Retour aux recettes</a></p>
<h1>Modifier la recette</h1>

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
              <input type="text" value="<?= $readRecipe['title']; ?>" name="title" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="text" value="<?= $readRecipe['description']; ?>" name="description" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="text" value="<?= $readRecipe['ingredients']; ?>" name="ingredients" />
            </td>
          </tr>
          <tr>
            <td>
              <input type="text" value="<?= $readRecipe['content']; ?>" name="content"/></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label for="oui">Oeufs extra frais</label>
              <input type="radio" name="type" value="oui" id="oui" />
            </td>
          </tr>
          <tr>
            <td>
              <label for="non">Oeufs frais</label>
              <input type="radio" name="type" value="non" id="non" />
            </td>
          </tr>
        </table>
          <input type="submit" value="Modifier la recette" name="formupdate"/>
      </form>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
