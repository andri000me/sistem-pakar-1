
<h2>Edit Data Penyebab </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Penyabab</label>
	<?php echo form_error('kode_penyebab', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_penyebab" size="30" value="<?php echo $query->kode_penyebab; ?>" />
</p>
<p>
	<label>Nama Penyebab</label>
	<?php echo form_error('nm_penyebab', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_penyebab" size="30" value="<?php echo $query->nm_penyebab; ?>" />
</p>

<br /> <br />
<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
