<div class="books form">
	<?php echo $this->Form->create('Book'); ?>
	<fieldset>
		<legend><?php echo __('Edit Book'); ?></legend>
		<?php
		echo $this->Form->input('name');
		echo $this->Form->input('isbn');
		echo $this->Form->input('image');
		echo $this->Form->input('Book.Type',array('label'=>'At least one Type', 'type'=>'select', 'multiple'=>true));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->bookLink(__('Delete'), array('action' => 'delete', $this->Form->value('Book.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Book.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('action' => 'index')); ?></li>
	</ul>
</div>
