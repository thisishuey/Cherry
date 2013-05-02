<?php
	if(!isset($class)) {
		$class = 'input checkbox';
	}
	if(!isset($label)) {
		$label = Inflector::humanize($field);
	}
?>
<div class="<?php echo $class; ?>">
	<div class="controls">
		<?php echo $this->Form->label($field, $this->Form->checkbox($field) . $label, array('class' => 'checkbox')); ?>
	</div>
</div>