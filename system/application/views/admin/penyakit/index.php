<h2>Data Penyakit</h2>

<table border="0" cellpadding="0" cellspacing="0">
	<tr class="zebra">
		<th>No</th>
		<th>Kode</th>
		<th width="250">Nama</th>
		<th>Aksi</th>
	</tr>

<?php 
$i = 1 + $urut ;
foreach($query as $row):  ?>
	<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 
		<td><?php echo $i?></td>
		<td><?php echo $row['kode_penyakit'] ?></td>
		<td><?php echo $row['nm_penyakit'] ?></td>
		<td><div class="action"><a class="update" href="<?php echo site_url().'admin/penyakit/edit_penyakit/'.$row['id_penyakit'].'/'.$i?>">Edit</a> | 
		<a class="delete" href="<?php echo site_url().'admin/penyakit/delete_penyakit/'.$row['id_penyakit'].'/'.$i?>">Hapus</a></div></td>
	</tr>
<?php 
$i++;
endforeach;?>
</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/penyakit/add_penyakit'?>">Tambah</a></p>


