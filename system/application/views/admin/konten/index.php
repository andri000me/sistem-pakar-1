<h2>Konten</h2>

<table border="0" cellpadding="0" cellspacing="0">
	<tr class="zebra">
		<th>No</th>
		<th width="230">Judul</th>
		<th width="100">Halaman</th>
		<th>Aksi</th>
	</tr>

<?php 
$i = 1 + $urut ;
foreach($query as $row):  ?>
	<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 
		<td><?php echo $i?></td>
		<td><?php echo $row['title'] ?></td>
		<td><?php echo $row['page'] ?></td>
		<td><div class="action"><a class="update" href="<?php echo site_url().'admin/konten/edit_konten/'.$row['id_konten'].'/'.$i?>">Edit</a> | 
		<a class="delete" href="<?php echo site_url().'admin/konten/delete_konten/'.$row['id_konten'].'/'.$i?>">Hapus</a></div></td>
	</tr>
<?php 
$i++;
endforeach;?>
</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/konten/add_konten'?>">Tambah</a></p>


