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
      #kotak {
        width: 180px;
		margin-left:180px;
		padding: 7px 5px 5px 15px;
		background-color:#d6fdcb;
		font-weight:bold;
		border:2px solid #058b02;
		color:#058b02;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
</style>
<h2>Data Buku Tamu</h2>
<?php echo $this->session->flashdata('message_type');?>
<br />
<table border="0" cellpadding="0" cellspacing="0">
	<tr class="zebra">
		<th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th width="50%">Komentar</th>
		<th>Aksi</th>
	</tr>

<?php 
$i = 1 + $urut ;
foreach($query as $row):  ?>
	<tr class="<?php if ($i %2 == 0) echo 'zebra';?>"> 
		<td><?php echo $i?></td>
		<td><?php echo $row['nama'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['komentar'] ?></td>
		<td><a class="delete" href="<?php echo site_url().'admin/buku_tamu/delete_BukuTamu/'.$row['id_bk_tamu'].'/'.$i?>">Hapus</a></td>
	</tr>
<?php 
$i++;
endforeach;?>
</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<!--<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/rek_jenis/add_rek_jenis'?>">Tambah</a></p> -->


