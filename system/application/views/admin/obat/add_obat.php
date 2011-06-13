
<h2>Data Obat </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Obat</label>
	<?php echo form_error('kode_obat', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_obat" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Obat</label>
	<?php echo form_error('nm_obat', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_obat" size="30" value="<?php echo set_value('nm_obat'); ?>" />
</p>
<p>
	<label>Keterangan</label>
	<table>
	<tr><td style="text-align: left;padding:0px;"> <textarea  style="width: 380px; height: 200px;" class="" name="keterangan" ><?php echo set_value('pemakaian'); ?></textarea> </td></tr>
	</table>
</p>
<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
