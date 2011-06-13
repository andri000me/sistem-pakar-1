<h2><?php echo $title;?></h2>

<?php foreach ($query as $row):?>
<div class="inside_text">
	<h3><a href="<?php echo site_url();?>tips/detail/<?php echo $row['id_konten'];?>"><?php echo $row['title'];?></a></h3>
	<p><?php echo word_limiter($row['konten'],50);?></p>
	<a href="<?php echo site_url();?>tips/detail/<?php echo $row['id_konten'];?>">[selengkapnya]</a>
</div>
<br />
<?php endforeach;?>
