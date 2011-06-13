<h2>Edit User </h2>

<?php echo $this->session->flashdata('message_type');?>

<form  method="post" action="" enctype="multipart/form-data">
<p>
	<label>Username</label>
	<?php echo form_error('username', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="username" size="30" value="<?php echo $query->username; ?>" />
</p>
<p>
	<label>Nama</label>
	<?php echo form_error('user_display', '<div class="error">', '</div>'); ?>
	<input type="text" class="form_field" name="user_display" size="30" value="<?php echo $query->user_display; ?>" />
</p>
<p>
	<label>Password</label>
	<?php echo form_error('password', '<div class="error">', '</div>'); ?>
	<input type="password" class="form_field" name="password" size="30" value="" />
</p>

<div id="btn">
<input type="submit" class="submit" name="edit" value="Simpan">
<input class="submit" name="Batal" type="reset" value="Back" onclick="window.history.go(-1)"/>
</div>
</form>
