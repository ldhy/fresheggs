<?php ob_start(); ?>


<?php
			foreach($tag_selected as $tag)
			{
?>

      <h1><?= $tag['title']; ?></h1>
      <p><?= $tag['content']; ?></p>			
<?php
			}

if(isset($message))
{
  echo $message;
}
?>


<?php $content = ob_get_clean(); ?>
<?php require __DIR__.'/../layout/header.php'; ?>
