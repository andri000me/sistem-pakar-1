<script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function(){
          $("#kotak").fadeOut("slow", function () {
            $("#kotak").remove();
          });    
        }, 2000);
      });
</script>

<style type="text/css">
      #kotak {
        width: 200px;
		margin-left:180px;
		padding: 7px 5px 5px 5px;
		background-color:#fdf7f7;
		font-weight:bold;
		border:2px solid #f91515;
		color:#f91515;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
</style>
<h2>Data Jenis </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Jenis</label>
	<?php echo form_error('kode_jenis', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_jenis" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Jenis</label>
	<?php echo form_error('nm_jenis', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_jenis" size="30" value="<?php echo set_value('nm_jenis'); ?>" />
</p>
<?php if ($dropkel=='indukan'):?>
<p>
	<label>Jenis Kelamin</label>
	<?php echo kelDropdown('kel')?>
</p>
<?php endif;?>
<p>
	<label>Keterangan</label>
	<textarea  class="form_field_area" name="keterangan" ><?php echo set_value('keterangan'); ?></textarea>
</p>
<p>
	<label>Gambar</label>
	<input type="file" name="gbr_jenis" class="subtitle">(max 800 kb)
</p>
<br /><br />		

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<?php if ($dropkel=='indukan'):?>
	<a href="<?php echo site_url('admin/jenis/indukan')?>"><button class="submit" >Batal</button></a>
<?php else:?>
	<a href="<?php echo site_url('admin/jenis/anakan')?>"><button class="submit" >Batal</button></a>
<?php endif;?>

</div>
</form>
