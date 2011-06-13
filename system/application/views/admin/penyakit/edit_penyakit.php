<h2>Edit Data Penyakit </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Penyakit</label>
	<?php echo form_error('kode_penyakit', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_penyakit" size="30" value="<?php echo $query->kode_penyakit; ?>" />
</p>
<p>
	<label>Nama Gejala</label>
	<?php echo form_error('nm_penyakit', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_penyakit" size="30" value="<?php echo $query->nm_penyakit; ?>" />
</p>
<p>
	<label>Cara Penanggulangan</label>
	<textarea  class="form_field_area" name="obat" size="10"><?php echo $query->obat; ?></textarea> 
</p>
<p>
	<label>Keterangan</label>
	<textarea  class="form_field_area" name="keterangan" size="10"><?php echo $query->keterangan; ?></textarea> 
</p>
<p>
	<label>Gambar</label>
	<?php if ($query->gbr_penyakit==''): ?>
			<td><img src="<?php echo base_url().'uploads/no_picture.jpg'?>"height="80" width="80"/></td>
	<?php else: ?>
			<td><img src="<?php echo base_url().'uploads/'.$query->gbr_penyakit;?>" height="80" width="80"/></td>
				<a href="<?php echo site_url().'admin/penyakit/delete_image/'.$query->id_penyakit?>">hapus</a>
	<?php endif; ?>
</p>
<p>
	<label>Ganti Gambar</label>
	<input type="file" name="gbr_penyakit" class="subtitle">(max 800 kb)
</p>

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
