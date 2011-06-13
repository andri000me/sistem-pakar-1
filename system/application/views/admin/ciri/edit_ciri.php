<h2>Edit Ciri </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Ciri</label>
	<?php echo form_error('kode_ciri', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_ciri" size="30" value="<?php echo $query->kode_ciri; ?>" />
</p>
<p>
	<label>Nama Ciri</label>
	<?php echo form_error('nm_ciri', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_ciri" size="30" value="<?php echo $query->nm_ciri; ?>" />
</p>
<p>
	<label>Bagian</label>
	<?php echo bagianDropdown('content',$query->kode_bagian)?>
</p>
<p>
	<label>Gambar</label>
	<?php if ($query->gbr_ciri==''): ?>
			<td><img src="<?php echo base_url().'uploads/no_picture.jpg'?>"height="80" width="80"/></td>
	<?php else: ?>
			<td><img src="<?php echo base_url().'uploads/'.$query->gbr_ciri;?>" height="80" width="80"/></td>
				<a href="<?php echo site_url().'admin/ciri/delete_image/'.$query->id_ciri?>">hapus</a>
	<?php endif; ?>
</p>
<p>
	<label>Ganti Gambar</label>
	<input type="file" name="gbr_ciri" class="subtitle">(max 800 kb)
</p>

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Back" onclick="window.history.go(-1)"/>
</div>
</form>
