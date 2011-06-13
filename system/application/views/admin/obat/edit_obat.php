
<h2>Edit Data Obat </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Obat</label>
	<?php echo form_error('kode_obat', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_obat" size="30" value="<?php echo $query->kode_obat; ?>" />
</p>
<p>
	<label>Nama Obat</label>
	<?php echo form_error('nm_obat', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_obat" size="30" value="<?php echo $query->nm_obat; ?>" />
</p>
<p>
	<label>Keterangan</label>
	<textarea  class="form_field_area" name="pemakaian" size="10"><?php echo $query->pemakaian; ?></textarea> 
</p>
<br /> <br />
<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
