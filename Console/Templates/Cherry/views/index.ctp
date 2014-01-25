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
<div class="row">
	<div class="col-md-3 sidebar">
		<ul class="well nav nav-pills nav-stacked">
			<li><h4><?php echo "<?php echo __('Actions'); ?>"; ?></h4></li>
			<li class="active"><?php echo "<?php echo \$this->Html->link(__('List {$pluralHumanName}'), array('action' => 'index')); ?>"; ?></li>
			<li><?php echo "<?php echo \$this->Html->link(__('Add {$singularHumanName}'), array('action' => 'add')); ?>"; ?></li>
		</ul>
	</div>
	<div class="col-md-9 content">
		<h2><?php echo "<?php echo __('List {$pluralHumanName}'); ?>"; ?></h2>
		<table class="table table-striped table-bordered">
			<tr>
<?php foreach ($fields as $field): ?>
				<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
<?php endforeach; ?>
				<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
			</tr>
			<?php echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n"; ?>
				<tr>
<?php foreach ($fields as $field): ?>
<?php $isKey = false; ?>
<?php if (!empty($associations['belongsTo'])): ?>
<?php foreach ($associations['belongsTo'] as $alias => $details): ?>
<?php if ($field === $details['foreignKey']): ?>
<?php $isKey = true; ?>
					<td><?php echo "<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>"; ?>&nbsp;</td>
<?php break; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php if ($isKey !== true): ?>
<?php if ($field === 'created' || $field === 'modified'): ?>
					<td><?php echo "<?php echo \$this->Time->timeAgoInWords(\${$singularVar}['{$modelClass}']['{$field}']); ?>"; ?>&nbsp;</td>
<?php else: ?>
					<td><?php echo "<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>"; ?>&nbsp;</td>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; ?>
					<td class="actions">
						<?php echo "<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-success btn-xs')); ?>\n"; ?>
						<?php echo "<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-warning btn-xs')); ?>\n"; ?>
						<?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete this record (ID: %s)?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n"; ?>
					</td>
				</tr>
			<?php echo "<?php endforeach; ?>\n"; ?>
		</table>
		<?php echo "<?php echo \$this->element('Cherry.paginator/counter'); ?>\n"; ?>
		<?php echo "<?php echo \$this->element('Cherry.paginator/navigation'); ?>\n"; ?>
	</div>
</div>