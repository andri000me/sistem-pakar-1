<h2><?php echo $title;?></h2>
<div id="gal">
<ul id="gallery">
<?php foreach($query as $row): ?>
	<li><a href="<?php echo base_url().'uploads/'.$row['image']?>" class="pirobox" title="<?php echo $row['konten'];?>"><img src="<?php echo base_url().'uploads/'.$row['image_thumb']?>" alt="<?php echo $row['title'];?>" /></a></li>
<?php endforeach;?>
</ul>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
</div>
