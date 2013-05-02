<?php if (class_exists('ConnectionManager') && Configure::read('debug') > 1): ?>
	<div class="container">
		<div class="well">
			<small><?php echo $this->element('sql_dump'); ?></small>
		</div>
	</div>
<?php endif; ?>
