<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p style="color: white; background-color: red; font-family: Times New Roman; padding: 8px " >

  	  	<?php echo $error ?></p>
  	  	
  	<?php endforeach ?>
  </div>
<?php  endif ?>

