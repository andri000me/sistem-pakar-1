<?php $this->view('/header.php')?>
<div id="wrap">
		<div id="header">
			<div id="logo">
			  <h1>Adenium</h1>
			</div>
			<div id="nav">
			<ul class="sf-menu">
			  <li><a href="<?php echo site_url()?>">Home</a></li>
			  <li><a href="#">Konsultasi</a>
				<ul>
				<li><a href="<?php echo site_url()?>kon_jenis/kon_jenis_first">Jenis</a></li>
				<li><a href="<?php echo site_url()?>kon_penyakit/kon_penyakit_first">Penyakit</a></li>
				<li><a href="<?php echo site_url()?>kon_silang/kon_process">Silang</a></li>
				</ul>
			  </li> 
			  <li><a href="#">Budidaya</a>
			  <ul>
				<li><a href="<?php echo site_url()?>budidaya/generatif">Generatif</a></li>
				<li><a href="<?php echo site_url()?>budidaya/vegetatif">Vegetatif</a></li>
				<li><a href="<?php echo site_url()?>budidaya/kawin_silang">Kawin Silang</a></li>
				</ul>
			  </li> 
			  
			</ul>
			</div>
			
		
	  </div>
	  <div class="hd_img">
		<img src="<?php echo base_url()?>assets/css/images/img.jpg" alt="" class="img" />
	  </div>
	  
	
	<div id="content">
		<div class="side fr">
			<div class="list">
				  <li><a href="<?php echo site_url()?>profil">Profil</a></li>
				  <li><a href="<?php echo site_url()?>galery">Galery </a></li>
				  <li><a href="<?php echo site_url()?>tips">Tips </a></li>
				  <li><a href="<?php echo site_url()?>bukutamu">Buku Tamu </a></li>
				  <li><a href="<?php echo site_url()?>admin/dashboard">Login Admin </a></li>
			</div>
		</div>
		<div class="main fr">
			<div id="text">
			<?php $this->view('/'.$template)?>
			</div>
			
		 </div> 
	</div>
	<div class="clearfix"></div>
<?php $this->view('/footer.php')?>