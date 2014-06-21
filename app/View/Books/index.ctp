
<div id="wrapper-contents">
	<div id="contents">

		<div class="dvds index">
			<?php
			if(isset($books) && !empty($books)) :
				$count = 1;
				?>
				<div class="shelf">

					<?php foreach($books as $key=>$book): ?>
						<?php
						$last_book = ( (($count) % 7 == 0)? 'book-last' : '' );
						?>
						<div class="dvd <?php echo $last_book; ?>">
							<?php echo $this->Html->image($book['Book']['image'],
									array('url' =>array('controller' =>'books','action' => 'view',$book['Book']['id']),
									'width' => 100,
									'height' => 150));
							?>
				</div>
				<?php
				if(!empty($last_book)) {
					echo '<div class="clear"></div>';
					echo '</div>';
					echo '<div class="shelf">';
				}
				?>
				<?php $count++; ?>
			<?php endforeach; ?>

			<div class="clear"></div>
		</div>
		<?php
	else:
		echo 'There are currently no Books in the database.';
	endif;
	?>
</div>

</div>
</div>
