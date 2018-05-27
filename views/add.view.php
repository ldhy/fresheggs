<?php ob_start(); ?>


  <p><a href="recipes.php">Retour aux recettes</a></p>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h1>Partager une recette</h1>

<div class="red">
<?php
	if(isset($message))
	{
		echo $message;
	}
?>
</div>

        <form action="" method="post">
          <div class="form-group">
            <label>Ajouter un titre</label>
            <input type="text" class="form-control" name="title" />
          </div>
          <div class="form-group">
            <label>Ajouter une petite description</label>
            <input type="text" class="form-control" name="description" />
          </div>
          <div class="form-group">
            <label>Ajouter les ingredients</label>
            <textarea type="text" class="form-control" rows="5" name="ingredients"></textarea>
          </div>
          <div class="form-group">
            <label>Ajouter la recette</label>
            <textarea type="text" class="form-control" rows="5" name="content"></textarea>
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
          <button type="submit" class="btn btn-warning" name="formaddrecipes">Partager</button>
        </form>

<!--
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
-->
  </div>
    </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
