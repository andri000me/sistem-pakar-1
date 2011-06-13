
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
<h2>Edit Data Kawin Silang </h2>
<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Jantan</label>
	<?php echo jenisDropdown('indukan','jantan','list',$query->kode_jantan)?>
</p>
<p>
	<label>Betina</label>
	<?php echo jenisDropdown('indukan','betina','list',$query->kode_betina)?>
</p>
<div id="demo" class="demolayout">

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
					for($i = 0; $i <= count($query2)-1; )
					{
						$akses=explode(".",$query->kode_hasil);
						if(in_array($query2[$i]['kode_jenis'], $akses))
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td><input name="hasil[]" type="checkbox" id="hasil" value="<?php echo $query2[$i]["kode_jenis"]?>" checked="checked"></td>
								<td><?php echo $query2[$i]['kode_jenis']?></td>
								<td><?php echo $query2[$i]['nm_jenis']?></td>
								<td><a href="<?php echo base_url().'uploads/'.$query2[$i]['gbr_jenis']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td><input name="hasil[]" type="checkbox" id="hasil" value="<?php echo $query2[$i]['kode_jenis']?>"></td>
								<td><?php echo $query2[$i]['kode_jenis']?></td>
								<td><?php echo $query2[$i]['nm_jenis']?></td>
								<td><a href="<?php echo base_url().'uploads/'.$query2[$i]['gbr_jenis']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?php
						}
						$i++;
						$no++;  
						} 			  		
					?>
					
					
				</table>
		</div>
	</div>
</div>
		
<p>
	<label>Keterangan</label>
	<table>
	<textarea class="form_field_area" name="keterangan" ><?php echo $query->keterangan; ?></textarea>
	</table>
</p

<br /> <br />
	

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
