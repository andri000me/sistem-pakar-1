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
    } 
	else if (target.id == "next2") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "block";
		block4.style.display = "none";
    }
	else if (target.id == "next3") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "block";
    }
	else if (target.id == "back2") {
        block1.style.display = "block";
		block2.style.display = "none";
		block3.style.display = "none";
		block4.style.display = "none";
    }
	else if (target.id == "back3") {
        block1.style.display = "none";
		block2.style.display = "block";
		block3.style.display = "none";
		block4.style.display = "none";
    }
		else if (target.id == "back4") {
        block1.style.display = "none";
		block2.style.display = "none";
		block3.style.display = "block";
		block4.style.display = "none";
    }


	}
	//function untuk menampilkan pilihan then jika dipilih then penyakit yang muncul blokpenyakit dan sebaliknya
</script>
<script language="javascript">
function SubmitCheckForm()// fngsi ajax untuk ngecek item terpilih
	{
		frmCheckform	= document.Checkform;
		// assigh the name of the checkbox;
		var chks = document.getElementsByName('ciri[]');

		var hasChecked = false;
		// Get the checkbox array length and iterate it to see if any of them is selected
		for (var i = 0; i < chks.length; i++)
		{
			if (chks[i].checked)
			{
					hasChecked = true;
				break;
			}
		}
		// if ishasChecked is false then throw the error message
		if (!hasChecked)
		{
			alert("Ada belum memasukan pilihan");
			chks[0].focus();

			return false;
		}
		
	}

</script>


<h2>Konsultasi Jenis Adenium</h2>
<div class="inside_text">
<form method="post" action="kon_process" enctype="multipart/form-data" >

<div id="ciri1" style="display:block">
<h3>Ciri Bunga | <a href="#"  id="next1" onClick="tampil_ciri(event)" />lanjut &raquo;</a><br /> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Ciri</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($ciri1 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="ciri[]" type="checkbox" id="kode_ciri" value="<?php echo $row["kode_ciri"]?>"></td>
				<td><?php echo $row['nm_ciri']?></td>
				<?php if ($row['gbr_ciri'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_ciri']?>" title="<?php echo $row["kode_ciri"]?>" class="pirobox">lihat</a></td>
				<?php else : ?>
				<td><a href="<?php echo base_url().'uploads/no_picture_big.jpg'?>" title="gambar tidak ada" class="pirobox">lihat</a></td>
				<?php endif;?>
			
			</tr>
		<? 
		$no++;  
		endforeach;
		?>
	</table>
</div>

<div id="ciri2" style="display:none">
<h3>Ciri Batang | <a href="#"  id="back2" onClick="tampil_ciri(event)" /> &laquo; kembali</a> - <a href="#"  id="next2" onClick="tampil_ciri(event)" />lanjut &raquo;</a></h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Ciri</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($ciri2 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="ciri[]" type="checkbox" id="kode_ciri" value="<?php echo $row["kode_ciri"]?>"></td>
				<td><?php echo $row['nm_ciri']?></td>
				<?php if ($row['gbr_ciri'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_ciri']?>" title="<?php echo $row["kode_ciri"]?>" class="pirobox">lihat</a></td>
				<?php else : ?>
				<td><a href="<?php echo base_url().'uploads/no_picture_big.jpg'?>" title="gambar tidak ada" class="pirobox">lihat</a></td>
				<?php endif;?>
			</tr>
		<? 
		$no++;  
		endforeach;
		?>
	</table>
</div>

<div id="ciri3" style="display:none">
<h3>Ciri Daun | <a href="#"  id="back3" onClick="tampil_ciri(event)" /> &laquo; kembali</a> - <a href="#"  id="next3" onClick="tampil_ciri(event)" />lanjut &raquo;</a> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Ciri</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($ciri3 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="ciri[]" type="checkbox" id="kode_ciri" value="<?php echo $row["kode_ciri"]?>"></td>
				<td><?php echo $row['nm_ciri']?></td>
				<?php if ($row['gbr_ciri'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_ciri']?>" title="<?php echo $row["kode_ciri"]?>" class="pirobox">lihat</a></td>
				<?php else : ?>
				<td><a href="<?php echo base_url().'uploads/no_picture_big.jpg'?>" title="gambar tidak ada" class="pirobox">lihat</a></td>
				<?php endif;?>
			</tr>
		<? 
		$no++;  
		endforeach;
		?>
	</table>
</div>

<div id="ciri4" style="display:none">
<h3>Ciri Bonggol | <a href="#"  id="back4" onClick="tampil_ciri(event)" />&laquo; kembali</a> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Ciri</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($ciri4 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="ciri[]" type="checkbox" id="kode_ciri" value="<?php echo $row["kode_ciri"]?>"></td>
				<td><?php echo $row['nm_ciri']?></td>
				<?php if ($row['gbr_ciri'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_ciri']?>" title="<?php echo $row["kode_ciri"]?>" class="pirobox">lihat</a></td>
				<?php else : ?>
				<td><a href="<?php echo base_url().'uploads/no_picture_big.jpg'?>" title="gambar tidak ada" class="pirobox">lihat</a></td>
				<?php endif;?>
			</tr>
		<? 
		$no++;  
		endforeach;
		?>
	</table>
	
	<tr>
	<td>
		<br />
	<!--	<input type="submit" class="submit" name="Simpan" onclick="javascript:SubmitCheckForm();" value="Hasil"> atau <? echo (anchor('kon_jenis','Batal'));?>-->
	<input type="submit" class="submit" name="Simpan" onclick="javascript:SubmitCheckForm();" value="Hasil"> atau <input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
	</td>
	</tr>
</div>
</form>
</div>







