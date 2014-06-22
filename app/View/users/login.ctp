
<div class="login form">
<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User', array('url'=>'login'));?>
	<fieldset>
 		<legend>Admin Login</legend>
		<div class="input required">
			<label>Username: *</label>
			<?php echo $this->Form->text('User.username'); ?>
		</div>
		<div class="input required">
			<label>Password: *</label>
			<?php echo $this->Form->password('User.password'); ?>
		</div>
	</fieldset>
<?php echo $this->Form->end('Login');?>
</div>
