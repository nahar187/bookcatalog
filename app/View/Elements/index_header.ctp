<div id="wrapper-header">
	<div id="header">
		<div class="logo"></br>
			<h1>BookCatalog</h1>
			<h3 align ='right'>
				<?php echo $this->Html->link('Admin login', array('controller'=>'users', 'action'=>'login'));?></h3>
			</div>
			<div class="filters">
				<fieldset>
					<?php
					$base_url = array('controller' => 'books', 'action' => 'index');
					echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
					echo $this->Form->input("search", array('label' => '', 'placeholder' => "Search books..."));
					echo $this->Form->end();
					?>
				</fieldset>
			</div>
		</div>
	</div>
