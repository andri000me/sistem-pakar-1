
<script type="text/javascript"> 
      $(document).ready(function(){
      	$("ul.tabs").tabs("div.panes > div");
	    });
</script>
<script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function(){
          $("#kotak").fadeOut("slow", function () {
            $("#kotak").remove();
          });    
        }, 3000);
      });
</script>
<script type="text/javascript">
	enl_ani = 2;
	enl_brdcolor = '#ffffff';
	enl_brdsize = 6;
	enl_maxstep = 20;
	enl_speed = 14;
	enl_shadowintens = 35;
	enl_shadowsize = 0;
	enl_center = 0;
	enl_dark = 0;
	enl_opaglide = 1;
	enl_titlebar=0;
</script>

<style type="text/css">
      #kotak{
		width:220px;
		margin-bottom:5px;
		margin-left:100px;
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
<h2>Tambah Data Kawin Silang </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Jantan</label>
	<?php echo form_error('kelj', '<div class="error">', '</div>'); ?>
	<?php echo jenisDropdown('indukan','jantan','list',set_value('kelj'));?>
</p>
<p>
	<label>Betina</label>
	<?php echo form_error('kelb', '<div class="error">', '</div>'); ?>
	<?php echo jenisDropdown('indukan','betina','list',set_value('kelb'));?>
</p>
<div id="demo" class="demolayout">
	<?php echo form_error('hasil', '<div id="kotak">', '</div>'); ?>
	<ul class="tabs">
		<li><a class="current" href="#">Anakan</a></li>
	</ul>
<!-- panes (content untuk masing-masing tab) -->
	<div class="panes">
		<div style="display: block;">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th width="5">Pilih</th>
							<th width="50">Kode</th>
							<th width="350">Nama</th>
							<th width="100">Gambar</th>
						</tr>
					</thead>
					<?php
					$no = 1;
					foreach($query as $row) :?>
						<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
							<td><?php echo $no;?></td>
							<td><input name="hasil[]" type="checkbox" id="hasil" value="<?php echo $row["kode_jenis"]?>"></td>
							<td><?php echo $row['kode_jenis']?></td>
							<td><?php echo $row['nm_jenis']?></td>
							<?php if ($row['gbr_jenis'] != ''):?>
								<td><img src="" onclick="enlarge(this);" longdesc="<?php echo base_url().'uploads/'.$row['gbr_jenis']?>" alt="lihat" class="thumbnail" /></td>
							<?php else:?>
								<td><img src="" onclick="enlarge(this);" longdesc="<?php echo base_url().'uploads/no_picture_big.jpg';?>" alt="lihat" class="thumbnail" /></td>
							<?php endif;?>
						</tr>
					<? 
					$no++;  
					endforeach;
					?>
				</table>
		</div>
	</div>
</div>
		
<p>
	<label>Keterangan</label>
	<table>
	<textarea class="form_field_area" name="keterangan" ><?php echo set_value('keterangan'); ?></textarea>
	</table>
</p

<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
