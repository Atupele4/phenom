  
 <?php 
 	if(empty($loc))
 	{
 		?>

 	<?php
 	}
 	else
 	{
 		?>
	<?php foreach ($loc as $loc): ?>
<a href="<?php echo base_url() ?>index.php/cases/<?php echo $loc['c_s_id'] ?>/<?php echo $loc['c_id'] ?>">
		<div class="categories" style="width: 23%; float: left">
			
       		<h3> <?php echo $loc['c_name'] ?></h3>
       		<p><?php echo $loc['c_s_desc'] ?> - <?php echo $loc['c_s_file_number'] ?> </p> 
 
       		 
    	</div>
</a>
    <?php endforeach ?>
<div style="clear:both"></div>
 	<?php
 	}
 ?>
 