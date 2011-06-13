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
<h2>Tambah Gejala Penyakit </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Kode Gejala</label>
	<?php echo form_error('kode_gejala', '<div class="error">', '</div>'); ?>
	<input readonly="readonly" type="label" class="form_field" name="kode_gejala" size="30" value="<?php echo $get_code; ?>" />
</p>
<p>
	<label>Nama Gejala</label>
	<?php echo form_error('nm_gejala', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="nm_gejala" size="30" value="<?php echo set_value('nm_gejala'); ?>" />
</p>
<p>
	<label>Bagian</label>
	<?php echo bagianDropdown('content')?>
</p>
<p>
	<label>Gambar</label>
	<input type="file" name="gbr_gejala" class="subtitle">(max 800 kb)
</p>
<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Back" onclick="window.history.go(-1)"/>
</div>
</form>
