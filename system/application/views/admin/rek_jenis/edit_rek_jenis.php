<script type="text/javascript"> 
      $(document).ready(function(){
      	$("ul.tabs").tabs("div.panes > div");
	    });
</script>
<script type="text/javascript">	//function untuk menampilkan pilihan and jika dipilih AND
	function tampil_ciri(evt){
	evt = (evt) ? evt : event;
    var target = (evt.target) ? evt.target : evt.srcElement;
    var block1 = document.getElementById("ciri1");
	var block2 = document.getElementById("ciri2");
	var block3 = document.getElementById("ciri3");
	var block4 = document.getElementById("ciri4");
    if (target.id == "next1") {
        block1.style.display = "none";
		block2.style.display = "block";
		block3.style.display = "none";
		block4.style.display = "none";
		block5.style.display = "none";
    } 
	else if (target.id == "next2") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "block";
		block4.style.display = "none";
		block5.style.display = "none";
    }
	else if (target.id == "next3") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "block";
		block5.style.display = "none";
    }
	else if (target.id == "next4") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "none";
		block5.style.display = "block";
    }
	else if (target.id == "back2") {
        block1.style.display = "block";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "none";
		block5.style.display = "none";
    }
	else if (target.id == "back3") {
        block1.style.display = "none";
		block2.style.display = "block";
		block3.style.display = "none";
		block4.style.display = "none";
		block5.style.display = "none";
    }
	else if (target.id == "back4") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "block";
		block4.style.display = "none";
		block5.style.display = "none";
    }
	else if (target.id == "back5") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "block";
		block5.style.display = "none";
    }


	}
	//function untuk menampilkan pilihan then jika dipilih then penyakit yang muncul blokpenyakit dan sebaliknya
</script>
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
<h2>Data Rekomendasi Jenis </h2>

<form  method="post" action="" enctype="multipart/form-data">

<p>
	<label>Pilih Jenis</label>
	<?php echo form_error('kode_jenis', '<div class="error">', '</div>'); ?>
	<?php echo jenisDropdown(FALSE,FALSE,'list_edit',$qrrow->kode_jenis);?>


</p>
<br />

<?php echo form_error('kode_ciri', '<div id="kotak">', '</div>'); ?>


<div id="demo" class="demolayout">

	<ul class="tabs">
		<li><a class="current" href="#">Ciri - ciri</a></li>
	</ul>
<!-- panes (content untuk masing-masing tab) -->
	<div class="panes">
		<div style="display: block;">
			<div id="ciri1" style="display:block">
			
			<p>Bagian Bunga  |  <a href="#"  id="next1" onClick="tampil_ciri(event)" />lanjut &raquo;</a><br /></p>
				<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Gejala</th>
							<th>Gambar</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($datamenu1)-1; )
					{
						$akses=explode(".",$qrrow->kode_ciri);
						if(in_array($datamenu1[$i]['kode_ciri'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu1[$i]['kode_ciri']?>" checked="checked"></td>
								<td><?php echo $datamenu1[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu1[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu1[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu1[$i]['kode_ciri']?>" ></td>
								<td><?php echo $datamenu1[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu1[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu1[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?php
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>

			<div id="ciri2" style="display:none">
			<p>Bagian Batang  |  <a href="#"  id="back2" onClick="tampil_ciri(event)">&laquo; kembali</a> - <a href="#"  id="next2" onClick="tampil_ciri(event)">lanjut &raquo;</a></p>
				<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Gejala</th>
							<th>Gambar</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($datamenu2)-1; )
					{
						$akses=explode(".",$qrrow->kode_ciri);
						if(in_array($datamenu2[$i]['kode_ciri'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu2[$i]['kode_ciri']?>" checked="checked"></td>
								<td><?php echo $datamenu2[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu2[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu2[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu2[$i]['kode_ciri']?>" ></td>
								<td><?php echo $datamenu2[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu2[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu2[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
				
			</div>

			<div id="ciri3" style="display:none">
			<p>Bagian Daun  |  <a href="#"  id="back3" onClick="tampil_ciri(event)">&laquo; kembali</a> - <a href="#"  id="next3" onClick="tampil_ciri(event)">lanjut &raquo;</a></p>
				<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Gejala</th>
							<th>Gambar</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($datamenu3)-1; )
					{
						$akses=explode(".",$qrrow->kode_ciri);
						if(in_array($datamenu3[$i]['kode_ciri'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu3[$i]['kode_ciri']?>" checked="checked"></td>
								<td><?php echo $datamenu3[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu3[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu3[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu3[$i]['kode_ciri']?>" ></td>
								<td><?php echo $datamenu3[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu3[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu3[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>

			<div id="ciri4" style="display:none">
			<p>Bagian Bonggol  |  <a href="#"  id="back4" onClick="tampil_ciri(event)">&laquo; kembali</a></p>
				<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Gejala</th>
							<th>Gambar</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($datamenu4)-1; )
					{
						$akses=explode(".",$qrrow->kode_ciri);
						if(in_array($datamenu4[$i]['kode_ciri'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu4[$i]['kode_ciri']?>" checked="checked"></td>
								<td><?php echo $datamenu4[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu4[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu4[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_ciri[]" value="<?php echo $datamenu4[$i]['kode_ciri']?>" ></td>
								<td><?php echo $datamenu4[$i]['kode_ciri'];?></td>
								<td><?php echo $datamenu4[$i]['nm_ciri'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu4[$i]['gbr_ciri']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>

		</div>
		
	</div>
</div>

<br />

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<a href="<?php echo site_url('admin/rek_jenis/')?>"><button class="submit" >Batal</button></a>
</div>
</form>
