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
<h2>Edit Data Jenis </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Jenis</label>
	<?php echo form_error('kode_jenis', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_jenis" size="30" value="<?php echo $query->kode_jenis; ?>" />
</p>
<p>
	<label>Nama Jenis</label>
	<?php echo form_error('nm_jenis', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_jenis" size="30" value="<?php echo $query->nm_jenis; ?>" />
</p>
<?php if ($dropkel=='indukan'):?>
<p>
	<label>Jenis Kelamin</label>
	<?php echo kelDropdown($query->kel);?>
</p>
<?php endif;?>
<p>
	<label>Keterangan</label>
	<textarea  class="form_field_area" name="keterangan" ><?php echo $query->keterangan; ?></textarea>
</p>
<p>
	<label>Gambar</label>
	<?php if ($query->gbr_jenis==''): ?>
			<td><img src="<?php echo base_url().'uploads/no_picture.jpg'?>"height="80" width="80"/></td>
			
	<?php else: ?>
			<td><img src="<?php echo base_url().'uploads/'.$query->gbr_jenis;?>" height="80" width="80"/></td>
			<?php if ($dropkel=='indukan'):?>
				<a href="<?php echo site_url().'admin/jenis/delete_image/indukan/'.$query->id_jenis?>">hapus</a>
			<?php else:?>
				<a href="<?php echo site_url().'admin/jenis/delete_image/anakan/'.$query->id_jenis?>">hapus</a>
			<?php endif;?>
	<?php endif; ?>
</p>
<p>
	<label>Ganti Gambar</label>
	<input type="file" name="gbr_jenis" class="subtitle">(max 800 kb)
</p>
<br /><br />		

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>