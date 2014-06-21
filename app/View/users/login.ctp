
<div class="login form">
<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create('User', array('url'=>'login'));?>
	<fieldset>
 		<legend>ログイン</legend>
		<div class="input required">
			<label>ユーザ名: *</label>
			<?php echo $this->Form->text('User.username'); ?>
		</div>
		<div class="input required">
			<label>パスワード: *</label>
			<?php echo $this->Form->password('User.password'); ?>
		</div>
	</fieldset>
<?php echo $this->Form->end('ログイン');?>
</div>
