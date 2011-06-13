<script type="text/javascript">	//function untuk menampilkan pilihan and jika dipilih AND
	function tampil_gejala(evt){
	evt = (evt) ? evt : event;
    var target = (evt.target) ? evt.target : evt.srcElement;
    var block1 = document.getElementById("gej1");
	var block2 = document.getElementById("gej2");
	var block3 = document.getElementById("gej3");
	var block4 = document.getElementById("gej4");
	var block5 = document.getElementById("gej5");
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
		var chks = document.getElementsByName('gejala[]');

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


<h2>Konsultasi Penyakit Adenium</h2>
<div class="inside_text">
<form method="post" action="kon_process" enctype="multipart/form-data" >

<div id="gej1" style="display:block">
<h3>Gejala Bunga | <a href="#"  id="next1" onClick="tampil_gejala(event)" />lanjut &raquo;</a><br /> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Gejala</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($gejala1 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="gejala[]" type="checkbox" id="kode_gejala" value="<?php echo $row["kode_gejala"]?>"></td>
				<td><?php echo $row['nm_gejala']?></td>
				<?php if ($row['gbr_gejala'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_gejala']?>" title="<?php echo $row["kode_gejala"]?>" class="pirobox">lihat</a></td>
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

<div id="gej2" style="display:none">
<h3>Gejala Batang | <a href="#"  id="back2" onClick="tampil_gejala(event)" /> &laquo; kembali</a> - <a href="#"  id="next2" onClick="tampil_gejala(event)" />lanjut &raquo;</a></h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Gejala</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($gejala2 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="gejala[]" type="checkbox" id="kode_gejala" value="<?php echo $row["kode_gejala"]?>"></td>
				<td><?php echo $row['nm_gejala']?></td>
				<?php if ($row['gbr_gejala'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_gejala']?>" title="<?php echo $row["kode_gejala"]?>" class="pirobox">lihat</a></td>
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

<div id="gej3" style="display:none">
<h3>Gejala Daun | <a href="#"  id="back3" onClick="tampil_gejala(event)" /> &laquo; kembali</a> - <a href="#"  id="next3" onClick="tampil_gejala(event)" />lanjut &raquo;</a> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Gejala</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($gejala3 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="gejala[]" type="checkbox" id="kode_gejala" value="<?php echo $row["kode_gejala"]?>"></td>
				<td><?php echo $row['nm_gejala']?></td>
				<?php if ($row['gbr_gejala'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_gejala']?>" title="<?php echo $row["kode_gejala"]?>" class="pirobox">lihat</a></td>
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

<div id="gej4" style="display:none">
<h3>Gejala Akar | <a href="#"  id="back4" onClick="tampil_gejala(event)" />&laquo; kembali</a> </h3>
	<table>
		<thead>
			<tr>
				<th width="20">No</th>
				<th width="20">Pilih</th>
				<th width="300">Gejala</th>
				<th width="100">Gambar</th>
			</tr>
		</thead>
		   
		<?php
		$no = 1;
		foreach($gejala4 as $row) :?>
			<tr class="<?php if ($no %2 == 0) echo 'zebra';?>"> 
				<td><?php echo $no;?></td>
				<td><input name="gejala[]" type="checkbox" id="kode_gejala" value="<?php echo $row["kode_gejala"]?>"></td>
				<td><?php echo $row['nm_gejala']?></td>
				<?php if ($row['gbr_gejala'] != ''): ?>
				<td><a href="<?php echo base_url().'uploads/'.$row['gbr_gejala']?>" title="<?php echo $row["kode_gejala"]?>" class="pirobox">lihat</a></td>
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
		<input type="submit" class="submit" name="Simpan" onclick="javascript:SubmitCheckForm();" value="Hasil"> atau <input class="submit" name="Batal" type="reset" value="Batal" onclick="window.history.go(-1)"/>
	</td>
	</tr>
</div>
</form>
</div>







