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
<h2>Data Perkawinan Silang</h2>
<?php echo $this->session->flashdata('message_type');?>            
<table border="0" cellpadding="0" cellspacing="0">
	<tr class="zebra">
		<th>No</th>
		<th width='120'>Jantan</th>
		<th width='120'>Betina</th>
		<th width='120'>Hasil</th>
		<th>Aksi</th>
	</tr>

<?php echo getTabelSilang();?> 


</table>
<p id="pagination"><?php echo $this->pagination->create_links(); ?></p>
<p id="bottom_link"><a class="add" href="<?php echo site_url().'admin/silang/add_silang'?>">Tambah</a></p>


