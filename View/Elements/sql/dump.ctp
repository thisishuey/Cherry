<?php if (class_exists('ConnectionManager') && Configure::read('debug') > 1): ?>
	<div class="container">
		<div class="well">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
<?php endif; ?>
