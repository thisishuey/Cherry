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
		<div class="panel panel-default">
			<div class="panel-heading"><?php echo "<?php echo __('Actions'); ?>"; ?></div>
			<div class="list-group">
				<?php echo "<?php echo \$this->Html->link(__('List {$pluralHumanName}'), array('action' => 'index'), array('class' => 'list-group-item active')); ?>\n"; ?>
				<?php echo "<?php echo \$this->Html->link(__('Add {$singularHumanName}'), array('action' => 'add'), array('class' => 'list-group-item')); ?>\n"; ?>
			</div>
		</div>
	</div>
	<div class="col-md-9 content">
		<h2><?php echo "<?php echo __('List {$pluralHumanName}'); ?>"; ?></h2>
		<div class="table-responsive">
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
							<div class="btn-group">
								<?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-list-alt\"></span>', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs', 'title' => __('View'), 'escape' => false)); ?>\n"; ?>
								<?php echo "<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-pencil\"></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs', 'title' => __('Edit'), 'escape' => false)); ?>\n"; ?>
								<?php echo "<?php echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-trash\"></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-default btn-xs', 'title' => __('Delete'), 'escape' => false, 'confirm' => __('Are you sure you want to delete this record (ID: %s)?', \${$singularVar}['{$modelClass}']['{$primaryKey}']))); ?>\n"; ?>
							</div>
						</td>
					</tr>
				<?php echo "<?php endforeach; ?>\n"; ?>
			</table>
		</div>
		<?php echo "<?php echo \$this->element('Cherry.paginator/counter'); ?>\n"; ?>
		<?php echo "<?php echo \$this->element('Cherry.paginator/navigation'); ?>\n"; ?>
	</div>
</div>
