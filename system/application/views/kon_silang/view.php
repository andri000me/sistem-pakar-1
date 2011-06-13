<h2>Konsltasi Kawin Silang </h2>
<div class="inside_text">
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="kon_process" enctype="multipart/form-data">
<p>
	<label>Jantan</label>
	<?php echo jenisDropdown(FALSE,'jantan','list',FALSE)?>
</p>
<p>
	<label>Betina</label>
	<?php echo jenisDropdown(FALSE,'betina','list',FALSE)?>
</p>

<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Hasil">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
</div>