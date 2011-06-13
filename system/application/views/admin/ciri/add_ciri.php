<h2>Tambah Data Ciri </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Ciri</label>
	<?php echo form_error('kode_ciri', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_ciri" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Ciri</label>
	<?php echo form_error('nm_ciri', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_ciri" size="30" value="<?php echo set_value('nm_ciri'); ?>" />
</p>
<p>
	<label>Bagian</label>
	<?php echo bagianDropdown('content')?>
</p>
<p>
	<label>Gambar</label>
	<input type="file" name="gbr_ciri" class="subtitle">(max 800 kb)
</p>
<br /> <br />

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Back" onclick="window.history.go(-1)"/>
</div>
</form>
