<?php $this->view('/admin/header.php')?>
<?php //echo $this->session->userdata('session_id')?>
<div id="wrap">
		<div id="header">
			<div id="logo">
			  <h1>Adenium</h1>
			</div>
			<div id="nav">
			<ul class="sf-menu">
			  <li><a href="<?php echo site_url()?>admin/dashboard">Dashboard</a></li>
			  <li><a href="<?php echo site_url()?>admin/user">Admin</a></li> 
			  <li><a href="<?php echo site_url()?>admin/konten">Konten</a></li> 
			  <li><a href="<?php echo site_url()?>admin/dashboard/doLogout">Logout</a></li> 
			  <li><a href="<?php echo site_url()?>">Site</a></li> 
			</ul>
			</div>
			
		
	  </div>
	  <div class="hd_img">
		<img src="<?php echo base_url()?>assets/css/images/img.jpg" alt="" class="img" />
	  </div>
	  
	
	<div id="content">
		<div class="side fr">
			<div class="list">
				<li><a href="<?php echo site_url()?>admin/penyakit">Data Penyakit</a></li>
				<li><a href="<?php echo site_url()?>admin/gejala_penyakit">Gejala Penyakit</a></li>
			<!--	<li><a href="<?php echo site_url()?>admin/obat">Data Obat</a></li> -->
				<li><a href="<?php echo site_url()?>admin/penyebab">Data Penyebab</a></li>
				<li><a href="<?php echo site_url()?>admin/jenis/indukan">Data Jenis</a></li>
				<li><a href="<?php echo site_url()?>admin/ciri">Data Ciri Jenis</a></li>
				<li><a href="<?php echo site_url()?>admin/rek_penyakit">Rekomendasi Penyakit </a></li>
				<li><a href="<?php echo site_url()?>admin/rek_jenis">Rekomendasi Jenis</a></li>
				<li><a href="<?php echo site_url()?>admin/silang">Perkawinan Silang</a></li>
				<li><a href="<?php echo site_url()?>admin/buku_tamu">Buku tamu</a></li>
			</div>
		</div>
		<div class="main fr">
			<div id="text">
			<div class="loged">
			<a href="<?php echo base_url().'admin/user/edit_user/'.$this->session->userdata('id_user')?>"><?php echo $this->session->userdata('user_display')?></a> loged in
			
			</div>
			<?php $this->view('/'.$main_view)?>
			</div>
			
		 </div> 
	</div>
	<div class="clearfix"></div>
<?php $this->view('/admin/footer.php')?>