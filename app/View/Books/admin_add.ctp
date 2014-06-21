<div class="books form">
	<?php echo $this->Form->create('Book', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Book'); ?></legend>
		<?php
		echo $this->Form->input('name');
		echo $this->Form->input('isbn');
		echo $this->Form->input('image', array('label'=>'Image:', 'type'=>'file'));
		echo $this->Form->input('Book.Type',array('label'=>'Types', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('Author.authors',array(
			'type' => 'text',
			'label' => __('Authors',true),
			'after' => __('Seperate author name with a comma.  Eg: john brown, Dr takore..',true)
		));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Books'), array('action' => 'index')); ?></li>
	</ul>
</div>
