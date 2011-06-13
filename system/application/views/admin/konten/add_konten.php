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
<h2>Tambah Konten </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">

<p>
	<label>Judul</label>
	<?php echo form_error('title', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="title" size="30" value="<?php echo set_value('title'); ?>" />
</p>
<p>
	<label>Halaman</label>
	<?php echo form_error('id_page', '<div class="error">', '</div>'); ?>
	<?php echo pageDropdown('list')?>
</p>
<p>
	<label>Isi Konten</label>
	<?php echo form_error('konten', '<div class="error">', '</div>'); ?>
	<textarea  class="form_field_area" name="konten" ><?php echo set_value('konten'); ?></textarea>
</p>
<p>
	<label>Gambar</label>
	<input type="file" name="image" class="subtitle">
</p>
<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
