

<h2>Data Penyakit </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Penyakit</label>
	<?php echo form_error('kode_penyakit', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_penyakit" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Penyakit</label>
	<?php echo form_error('nm_penyakit', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_penyakit" size="30" value="<?php echo set_value('nm_penyakit'); ?>" />
</p>
<p>
	<label>Cara Penanggulangan</label>
	<textarea class="form_field_area" name="obat" ><?php echo set_value('obat'); ?></textarea> 
</p>
<p>
	<label>Keterangan</label>
	<textarea class="form_field_area" name="keterangan" ><?php echo set_value('keterangan'); ?></textarea> 
</p>
<label>Gambar</label>
	<input type="file" name="gbr_penyakit" class="subtitle">(max 800 kb)
</p>
<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
