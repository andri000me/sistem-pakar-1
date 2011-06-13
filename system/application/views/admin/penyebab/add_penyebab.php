
<h2>Data Penyebab </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Penyebab</label>
	<?php echo form_error('kode_penyebab', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_penyebab" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Penyebab</label>
	<?php echo form_error('nm_obat', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_penyebab" size="30" value="<?php echo set_value('nm_penyebab'); ?>" />
</p>

<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
