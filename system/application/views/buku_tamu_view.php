<script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function(){
          $("#msg1,#msg2,#msg3").fadeOut("slow", function () {
            $("#msg1,#msg2,#msg3").remove();
          });    
        }, 3000);
      });
</script>

<script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function(){
          $("#pesan").fadeOut("slow", function () {
            $("#pesan").remove();
          });    
        }, 3000);
      });
</script>


<style type="text/css">
      #msg1,#msg2,#msg3{
		background-color:#f8c6d7;
        width: 350px;
        height: 25px;
		padding: 12px 5px 5px 10px;
		margin-top:10px;
		margin-bottom:10px;
		font-weight:bold;
		border:2px solid #d98e8f;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
	  #pesan{
		background-color:#bfdefc;
        width: 350px;
        height: 25px;
		padding: 12px 5px 5px 10px;
		margin-top:10px;
		margin-bottom:10px;
		font-weight:bold;
		border:2px solid #55acfd;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
	  
</style>
<h2>Buku Tamu</h2>
	<?php echo $this->session->flashdata('message_type');?>
	<form action="" method="post" onsubmit="return check();">
		<label>Nama</label>
		<?php echo form_error('name', '<div id="msg1">', '</div>'); ?>
		<input class="text" type="text" name="name" value="<?php echo set_value('name'); ?>">
		<label>Email</label>
		<?php echo form_error('email', '<div id="msg2">', '</div>'); ?>
		<input class="text" type="text" name="email" value="<?php echo set_value('email'); ?>">
		<label>Komentar</label>
		<?php echo form_error('komentar', '<div id="msg3">', '</div>'); ?>
		<textarea class="text"  name="komentar">
		<?php echo set_value('komentar'); ?>
		</textarea>
		<label></label>
		<input name="simpan" class="submit" value="Kirim" type="submit">
	</form>
<br/>
<h2>Isi Buku Tamu</h2>
	
		<?php foreach ($arrBuku as $buku): ?>
		<fieldset>
			<strong style="text-decoration:underline";>Nama : <?php echo $buku->nama?> </strong>
			<div class="comment">
			<?php echo $buku->komentar ?> </li>
			</div>
		</fieldset>
		<? endforeach; ?>
		<?php if($this->pagination->create_links()) echo $this->pagination->create_links(); ?>

		