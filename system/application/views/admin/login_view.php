<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url().'images/fav_icon.png';?>" />
<link rel="stylesheet" type="text/css" href=" <?php echo base_url() . 'assets/admin_css/reset.css'; ?>"/>
<link rel="stylesheet" type="text/css" href=" <?php echo base_url() . 'assets/admin_css/login.css'; ?>"/>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.4.js"></script>

<title>Adenium Administrator</title>
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
      #msg1,#msg2,#pesan{
		background-color:#892e2f;
		color:#fff;
        width: 260px;
		border:2px solid #fe9294;
        height: 25px;
		padding: 6px 2px 0px 10px;
		margin:0px 0 5px 0;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
	 #pesan{
		background-color:#892e2f;
		color:#fff;
        width: 290px;
		border:2px solid #fe9294;
        height: 25px;
		padding: 6px 2px 0px 10px;
		margin:5px 0 5px 0;
		-moz-border-radius: 5px;
		-khtml-border-radius: 5px;
		-webkit-border-radius: 5px;
		border-radius: 5px;
      }
</style>
</head>

<body>
<div id="login_box">
	
	<h1>Login Admin</h1>
	<?php echo $this->session->flashdata('message_type');?>
	 <form action="<?php echo site_url()?>admin/dashboard/login_process" method="post" name="loginForm" id="login_form">
		<p>
		<?php echo form_error('username', '<div id="msg1">', '</div>');?>
			<label for="username">Username</label>
			<input type="text" name="username" size="20" class="form_field" value="<?php echo set_value('username');?>"/>			
		</p>
		
		<p>
		<?php echo form_error('password', '<div id="msg2">', '</div>');?>
			<label for="password">Password</label>
			<input type="password" name="password" size="20" class="form_field" value="<?php echo set_value('password');?>"/>			
		</p>
		<p></p>
		<p>
			<input type="submit" name="submit" id="submit" value="Login" />
			
		</p>
		<a href="<?php echo site_url()?>"> [Front Page] </a>
	</form>
</div>
</body>
</html>