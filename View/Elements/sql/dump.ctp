<?php if (class_exists('ConnectionManager') && Configure::read('debug') > 1): ?>
	<div class="well">
		<small><?php echo $this->element('sql_dump'); ?></small>
	</div>
<?php endif; ?>
