<div id="wrapper-header">
	<div id="header">
		<div class="logo"></br>
			<h1>BookCatalog</h1>
		</div>
			<!-- <h2>an online application to track and catalog your collection books</h2> -->
		<div class="filters">
			<fieldset>
				<?php
				$base_url = array('controller' => 'books', 'action' => 'index');
				echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
				echo $this->Form->input("search", array('label' => '', 'placeholder' => "Search..."));
				echo $this->Form->end();?>
				?>
			</fieldset>
		</div>
	</div>
</div>
