<?php  if (count($errors) > 0) : ?>
  	<?php foreach ($errors as $error) : ?>
  	  <?php echo "
		<div class='alert alert-danger text-center'>". $error ."</div>"; 
		?>
  	<?php endforeach ?>
<?php  endif ?>