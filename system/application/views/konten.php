<h2><?php echo $title;?></h2>
<div class="inside_text">
<?php foreach ($query as $row):?>
	<h3><?php echo $row['title'];?></h3>
	<?php if ($row['image'] != ''): ?>
	<img style="height:340px;width:535px;" src="<?php echo base_url()?>uploads/<?php echo $row['image'];?>">
	<?php endif;?>
	<p><?php echo $row['konten'];?></p>
<?php endforeach;?>
</div>
