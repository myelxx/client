
<ol class="breadcrumb" style="color:white;background-color:#db2a35;border-radius:12px;">
<?php $error_list ="";
	  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) :
  			 $error_list .= $error ;
		  endforeach ?>
	  <p><?php echo $error_list; ?></p>
  </div>
<?php  endif ?>
</ol>