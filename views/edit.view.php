<?php ob_start(); ?>

<p><a href="recipes.php">Retour aux recettes</a></p>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <h1>Modifier la recette</h1>

<?php
if(isset($message))
{
  echo $message;
}
?>
        <form action="" method="post">
          <div class="form-group">
            <label>Titre</label>
            <input type="text" class="form-control" value="<?= $readRecipe['title']; ?>" name="title" />
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" value="<?= $readRecipe['description']; ?>" name="description" />
          </div>
          <div class="form-group">
            <label>Ingrédients</label>
            <textarea type="text" class="form-control" rows="5" name="ingredients"><?= $readRecipe['ingredients']; ?></textarea>
          </div>
          <div class="form-group">
            <label>La recette</label>
            <textarea type="text" class="form-control" rows="7" name="content"><?= $readRecipe['content']; ?></textarea>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="oui" value="oui" checked>
            <label class="form-check-label" for="oui">Oeufs extra frais</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="non" value="non" checked>
            <label class="form-check-label" for="oui">Oeufs frais</label>
          </div>
          <input type="hidden" name="user_id"/>
          <button type="submit" class="btn btn-warning" name="formupdate">Partager</button>
        </form>

<!--
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
-->

<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
