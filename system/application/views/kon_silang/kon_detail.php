<h2>Detail Hasil Penelusuran</h2>
<div class="inside_text">
	<h3>Hasil Persilangan :</h3>
	<p><strong><?php echo $query->nm_jenis;?></strong></p>
	<p><?php echo $query->keterangan;?></p> 
	<br />
	<h3>Gambar :</h3>
	<div class="gbr">
	<?php if ($query->gbr_jenis != ''): ?>
	<a href="<?php echo base_url().'uploads/'.$query->gbr_jenis?>" title="<?php echo $query->nm_jenis?>" class="pirobox"><img src="<?php echo base_url().'uploads/'.$query->gbr_jenis?>" height="80" width="80"></a>
	<?php else : ?>
	<a href="<?php echo base_url().'uploads/no_picture_big.jpg'?>" title="gambar tidak ada" class="pirobox"><img src="<?php echo base_url().'uploads/no_picture.jpg'?>"></a>
	<?php endif;?>
	</div>
	
	<input class="submit" name="Batal" type="reset" value="Back" onclick="window.history.go(-1)"/>
</div>

