<?php  if (count($error	) > 0) : ?>
  <div class="error">
  	<?php foreach ($error as $errorr) : ?>
  	  <p style="text-align: center;"><?php echo $errorr ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>