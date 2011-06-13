<h2>Data Penyebab</h2>

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
		<td><?php echo $row['kode_penyebab'] ?></td>
		<td><?php echo $row['nm_penyebab'] ?></td>
		<td><div class="action"><a class="update" href="<?php echo site_url().'admin/penyebab/edit_penyebab/'.$row['id_penyebab'].'/'.$i?>">Edit</a> | 
		<a class="delete" href="<?php echo site_url().'admin/penyebab/delete_penyebab/'.$row['id_penyebab'].'/'.$i?>">Hapus</a></div></td>
	</tr>
<?php 
$i++;
endforeach;?>
</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/penyebab/add_penyebab'?>">Tambah</a></p>


