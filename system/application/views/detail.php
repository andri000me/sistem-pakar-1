<h2><?php echo $title;?></h2>
<div class="inside_text">
	<h3><?php echo $query->title;?></h3>
	<?php if ($query->image != ''):?>
	<img style="height:340px;width:535px;"src="<?php echo base_url().'uploads/'.$query->image?>" title="<?php echo $query->title;?>" alt="<?php echo $query->title;?>" />
	<?php endif ?>
	<p><?php echo $query->konten;?></p>
	<br />
	<a href="<?php echo site_url();?><?php echo $url;?>">[back]</a>
</div>
<br />

