<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row-fluid">
	<div class="span3">
		<div class="actions well sidebar-nav">
			<ul class="nav nav-list">
				<li class="nav-header">Actions</li>
				<li><?php echo "<?php echo \$this->Html->link(__('List {$pluralHumanName}'), array('action' => 'index')); ?>"; ?></li>
<?php if (strpos($action, 'add') !== false): ?>
				<li class="active"><?php echo "<?php echo \$this->Html->link(__('New {$singularHumanName}'), array('action' => 'add')); ?>"; ?></li>
<?php else: ?>
				<li><?php echo "<?php echo \$this->Html->link(__('New {$singularHumanName}'), array('action' => 'add')); ?>"; ?></li>
				<li class="nav-header"><?php echo $singularHumanName; ?> Actions</li>
				<li><?php echo "<?php echo \$this->Html->link(__('View {$singularHumanName}'), array('action' => 'view', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
				<li class="active"><?php echo '<?php echo $this->Html->link(__(\'Edit ' . $singularHumanName . '\'), array(\'action\' => \'edit\', $this->Form->value(\'' . $modelClass . '.' . $primaryKey . '\'))); ?>'; ?></li>
				<li><?php echo "<?php echo \$this->Form->postLink(__('Delete {$singularHumanName}'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
<?php endif; ?>
			</ul>
		</div>
	</div>
	<div class="span9">
		<div class="<?php echo $pluralVar; ?> form">
			<h2><?php echo "<?php echo __('" . Inflector::humanize($action) . " {$singularHumanName}'); ?>"; ?></h2>
			<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class' => 'form-horizontal')); ?>\n"; ?>
				<fieldset>
					<legend><?php echo "<?php echo __('{$singularHumanName} Information'); ?>"; ?></legend>
<?php foreach ($fields as $field): ?>
<?php if (strpos($action, 'add') !== false && $field == $primaryKey): ?>
<?php continue; ?>
<?php elseif (!in_array($field, array('created', 'modified', 'updated'))): ?>
					<?php echo "<?php echo \$this->Form->input('{$field}'); ?>\n"; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php if (!empty($associations['hasAndBelongsToMany'])): ?>
<?php foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData): ?>
					<?php echo "<?php echo \$this->Form->input('{$assocName}');?>\n"; ?>
<?php endforeach; ?>
<?php endif; ?>
				</fieldset>
				<?php echo "<?php echo \$this->Form->submit('Submit', array('class' => 'btn btn-success')); ?>\n"; ?>
			<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
		</div>
	</div>
</div>
