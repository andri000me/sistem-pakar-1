<script type="text/javascript"> 
      $(document).ready(function(){
      	$("ul.tabs").tabs("div.panes > div");
	    });
</script>
<h2>Data Jenis</h2>

<div id="demo" class="demolayout">

	<ul class="tabs">
		<li><a class="current" href="#">Indukan</a></li>
		<li><a class="" href="#">Anakan</a></li>
	</ul>

<table border="0" cellpadding="0" cellspacing="0">
	<tr class="zebra">
		<th>No</th>
		<th>Kode</th>
		<th width="250">Nama</th>
		<th width="100">Jen Kelamin</th>
		<th>Aksi</th>
	</tr>

<?php 
$i = 1 + $urut ;
foreach($query as $row):  ?>
	<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 
		<td><?php echo $i?></td>
		<td><?php echo $row['kode_jenis'] ?></td>
		<td><?php echo $row['nm_jenis'] ?></td>
		<td><?php echo $row['kel'] ?></td>
		<td><div class="action"><a class="update" href="<?php echo site_url().'admin/jenis/edit_jenis/'.$row['id_jenis'].'/'.$i?>">Edit</a> | 
		<a class="delete" href="<?php echo site_url().'admin/jenis/delete_jenis/'.$row['id_jenis'].'/'.$i?>">Hapus</a></div></td>
	</tr>
<?php 
$i++;
endforeach;?>
</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/jenis/add_jenis'?>">Tambah</a></p>


