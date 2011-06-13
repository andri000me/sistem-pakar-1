<script type="text/javascript"> 
      $(document).ready(function(){
      	$("ul.tabs").tabs("div.panes > div");
	    });
</script>
<script type="text/javascript">	//function untuk menampilkan pilihan and jika dipilih AND
	function tampil_gejala(evt){
	evt = (evt) ? evt : event;
    var target = (evt.target) ? evt.target : evt.srcElement;
    var block1 = document.getElementById("gej1");
	var block2 = document.getElementById("gej2");
	var block3 = document.getElementById("gej3");
	var block4 = document.getElementById("gej4");
	//var block5 = document.getElementById("gej5");
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
	/*else if (target.id == "back5") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "block";
		block5.style.display = "none";
    }*/


	}
	//function untuk menampilkan pilihan then jika dipilih then penyakit yang muncul blokpenyakit dan sebaliknya
</script>
<script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function(){
          $("#kotak1,#kotak2,#kotak3").fadeOut("slow", function () {
            $("#kotak1,#kotak2,#kotak3").remove();
          });    
        }, 2000);
      });
</script>

<style type="text/css">
      #kotak1{
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
	    #kotak2{
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
	    #kotak3{
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
<h2>Data Rekomendasi Penyakit </h2>

<form  method="post" action="" enctype="multipart/form-data">

<p>
	<label>Pilih Penyakit</label>
	<?php echo form_error('kode_penyakit', '<div class="error">', '</div>'); ?>
	<?php echo penyakitDropdown('list_edit',$qrrow->kode_penyakit);?>
	<!--<?php echo '<br />CEKKKKKK Gjeala '.$qrrow->kode_gejala;?>
	<?php echo '<br />CEKKKKKK Penyabab '.$qrrow->kode_penyebab;?>
	<?php echo '<br />CEKKKKKK Obat '.$qrrow->kode_obat;?> -->

</p>
<br />

<?php echo form_error('kode_gejala', '<div id="kotak1">', '</div>'); ?>
<?php echo form_error('kode_penyebab', '<div id="kotak2">', '</div>'); ?>
<!-- <?php echo form_error('kode_obat', '<div id="kotak3">', '</div>'); ?> -->

<div id="demo" class="demolayout">

	<ul class="tabs">
		<li><a class="current" href="#">Gejala</a></li>
		<li><a class="" href="#">Penyebab</a></li>
		<!-- <li><a class="" href="#">Obat</a></li> -->
	</ul>
<!-- panes (content untuk masing-masing tab) -->
	<div class="panes">
		<div style="display: block;">
			<div id="gej1" style="display:block">
			
			<p>Bagian Bunga  |  <a href="#"  id="next1" onClick="tampil_gejala(event)" />lanjut &raquo;</a><br /></p>
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
						$akses=explode(".",$qrrow->kode_gejala);
						if(in_array($datamenu1[$i]['kode_gejala'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu1[$i]['kode_gejala']?>" checked="checked"></td>
								<td><?php echo $datamenu1[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu1[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu1[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu1[$i]['kode_gejala']?>" ></td>
								<td><?php echo $datamenu1[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu1[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu1[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>

			<div id="gej2" style="display:none">
			<p>Bagian Batang  |  <a href="#"  id="back2" onClick="tampil_gejala(event)">&laquo; kembali</a> - <a href="#"  id="next2" onClick="tampil_gejala(event)">lanjut &raquo;</a></p>
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
						$akses=explode(".",$qrrow->kode_gejala);
						if(in_array($datamenu2[$i]['kode_gejala'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu2[$i]['kode_gejala']?>" checked="checked"></td>
								<td><?php echo $datamenu2[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu2[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu2[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu2[$i]['kode_gejala']?>" ></td>
								<td><?php echo $datamenu2[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu2[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu2[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
				
			</div>

			<div id="gej3" style="display:none">
			<p>Bagian Daun  |  <a href="#"  id="back3" onClick="tampil_gejala(event)">&laquo; kembali</a> - <a href="#"  id="next3" onClick="tampil_gejala(event)">lanjut &raquo;</a></p>
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
						$akses=explode(".",$qrrow->kode_gejala);
						if(in_array($datamenu3[$i]['kode_gejala'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu3[$i]['kode_gejala']?>" checked="checked"></td>
								<td><?php echo $datamenu3[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu3[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu3[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu3[$i]['kode_gejala']?>" ></td>
								<td><?php echo $datamenu3[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu3[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu3[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>

			<div id="gej4" style="display:none">
			<p>Bagian Akar  |  <a href="#"  id="back4" onClick="tampil_gejala(event)">&laquo; kembali</a></p>
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
						$akses=explode(".",$qrrow->kode_gejala);
						if(in_array($datamenu4[$i]['kode_gejala'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu4[$i]['kode_gejala']?>" checked="checked"></td>
								<td><?php echo $datamenu4[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu4[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu4[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu4[$i]['kode_gejala']?>" ></td>
								<td><?php echo $datamenu4[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu4[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu4[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>
		<!--	<div id="gej5" style="display:none">
			<p>Bagian Bonggol  |  <a href="#"  id="back5" onClick="tampil_gejala(event)">&laquo; kembali</a></p>
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
					for($i = 0; $i <= count($datamenu5)-1; )
					{
						$akses=explode(".",$qrrow->kode_gejala);
						if(in_array($datamenu5[$i]['kode_gejala'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu5[$i]['kode_gejala']?>" checked="checked"></td>
								<td><?php echo $datamenu5[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu5[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu5[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_gejala[]" value="<?php echo $datamenu5[$i]['kode_gejala']?>" ></td>
								<td><?php echo $datamenu5[$i]['kode_gejala'];?></td>
								<td><?php echo $datamenu5[$i]['nm_gejala'];?></td>
								<td><a href="<?php echo base_url().'uploads/'.$datamenu5[$i]['gbr_gejala']?>" width='80' height='80'>lihat</a></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
			</div>-->
		</div>
		<div style="display: none;">
				<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Penyebab</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($query1)-1; )
					{
						$akses=explode(".",$qrrow->kode_penyebab);
						if(in_array($query1[$i]['kode_penyebab'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_penyebab[]" value="<?php echo $query1[$i]['kode_penyebab']?>" checked="checked"></td>
								<td><?php echo $query1[$i]['kode_penyebab'];?></td>
								<td><?php echo $query1[$i]['nm_penyebab'];?></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_penyebab[]" value="<?php echo $query1[$i]['kode_penyebab']?>" ></td>
								<td><?php echo $query1[$i]['kode_penyebab'];?></td>
								<td><?php echo $query1[$i]['nm_penyebab'];?></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
				</table>
		</div>
	<!--	<div style="display: none;">
			<table>
					<thead>
						<tr>
							<th width="5">No</th>
							<th width="5">Pilih</th>
							<th width="5">Kode</th>
							<th width="400">Obat</th>
						</tr>
					</thead>
					   
					<?php 
					$no = 1;
					for($i = 0; $i <= count($query2)-1; )
					{
						$akses=explode(".",$qrrow->kode_obat);
						if(in_array($query2[$i]['kode_obat'], $akses)){
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_obat[]" value="<?php echo $query2[$i]['kode_obat']?>" checked="checked"></td>
								<td><?php echo $query2[$i]['kode_obat'];?></td>
								<td><?php echo $query2[$i]['nm_obat'];?></td>
							</tr> 
					<?php
						}
						else
						{
					?>
							<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
								<td><?php echo $no;?></td>
								<td valign="top"><input type="checkbox" name="kode_obat[]" value="<?php echo $query2[$i]['kode_obat']?>" ></td>
								<td><?php echo $query2[$i]['kode_obat'];?></td>
								<td><?php echo $query2[$i]['nm_obat'];?></td>
							</tr>
					<?
						}
						$i++;
						$no++;  
					} 			  		
					?>
			</table>
		</div>-->
	</div>
</div>

<br />

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
</div>
</form>
