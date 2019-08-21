
<ol class="breadcrumb" style="color:white;background-color:#db2a35;border-radius:12px;">
<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
</ol>