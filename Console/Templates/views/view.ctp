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
<div id="page-container" class="row-fluid">
	<div id="sidebar" class="span3">
		<div class="actions">
			<ul class="nav nav-list">
				<li><?php echo "<?php echo \$this->Html->link(__('List {$pluralHumanName}'), array('action' => 'index')); ?>"; ?></li>
				<li><?php echo "<?php echo \$this->Html->link(__('Edit {$singularHumanName}'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"; ?></li>
				<li><?php echo "<?php echo \$this->Form->postLink(__('Delete {$singularHumanName}'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"; ?></li>
				<li><?php echo "<?php echo \$this->Html->link(__('New {$singularHumanName}'), array('action' => 'add')); ?>"; ?></li>
			</ul>
		</div>
	</div>
	<div id="page-content" class="span9">
		<div class="<?php echo $pluralVar; ?> view">
			<h2><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></h2>
			<dl class="dl-horizontal">
<?php foreach ($fields as $field): ?>
<?php $isKey = false; ?>
<?php if (!empty($associations['belongsTo'])): ?>
<?php foreach ($associations['belongsTo'] as $alias => $details): ?>
<?php if ($field === $details['foreignKey']): ?>
<?php $isKey = true; ?>
				<dt title="<?php echo "<?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?>"; ?>"><?php echo "<?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?>"; ?></dt>
				<dd><?php echo "<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>"; ?>&nbsp;</dd>
<?php break; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php if ($isKey !== true): ?>
				<dt title="<?php echo "<?php echo __('" . Inflector::humanize($field) . "'); ?>"; ?>"><?php echo "<?php echo __('" . Inflector::humanize($field) . "'); ?>"; ?></dt>
				<dd><?php echo "<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>"; ?>&nbsp;</dd>
<?php endif; ?>
<?php endforeach; ?>
			</dl>
		</div>
<?php if (!empty($associations['hasOne'])): ?>
<?php foreach ($associations['hasOne'] as $alias => $details): ?>
		<div class="related">
			<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
			<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
				<dl class="dl-horizontal">
<?php foreach ($details['fields'] as $field): ?>
					<dt title="<?php echo "<?php echo __('" . Inflector::humanize($field) . "'); ?>"; ?>"><?php echo "<?php echo __('" . Inflector::humanize($field) . "'); ?>"; ?></dt>
					<dd><?php echo "<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>"; ?>&nbsp;</dd>
<?php endforeach; ?>
				</dl>
			<?php echo "<?php endif; ?>\n"; ?>
			<div class="actions">
				<?php echo "<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n"; ?>
				<?php echo "<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n"; ?>
				<?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n"; ?>
			</div>
		</div>
<?php endforeach; ?>
<?php endif; ?>
<?php if (empty($associations['hasMany'])): ?>
<?php $associations['hasMany'] = array(); ?>
<?php endif; ?>
<?php if (empty($associations['hasAndBelongsToMany'])): ?>
<?php $associations['hasAndBelongsToMany'] = array(); ?>
<?php endif; ?>
<?php $relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']); ?>
<?php foreach ($relations as $alias => $details): ?>
<?php $otherSingularVar = Inflector::variable($alias); ?>
<?php $otherPluralHumanName = Inflector::humanize($details['controller']); ?>
		<div class="related">
			<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
			<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
				<table class="table table-striped table-bordered">
					<tr>
<?php foreach ($details['fields'] as $field): ?>
						<th><?php echo "<?php echo __('" . Inflector::humanize($field) . "'); ?>"; ?></th>
<?php endforeach; ?>
						<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
					</tr>
					<?php echo "<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n"; ?>
						<tr>
<?php foreach ($details['fields'] as $field): ?>
							<td><?php echo "<?php echo \${$otherSingularVar}['{$field}']; ?>"; ?>&nbsp;</td>
<?php endforeach; ?>
							<td class="actions">
								<?php echo "<?php echo \$this->Html->link(__('View'), array('controller' => '{$details['controller']}', 'action' => 'view', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n"; ?>
								<?php echo "<?php echo \$this->Html->link(__('Edit'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini')); ?>\n"; ?>
								<?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('controller' => '{$details['controller']}', 'action' => 'delete', \${$otherSingularVar}['{$details['primaryKey']}']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n"; ?>
							</td>
						</tr>
					<?php echo "<?php endforeach; ?>\n"; ?>
				</table>
			<?php echo "<?php endif; ?>\n"; ?>
			<div class="actions">
				<?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus icon-white\"></i> ' . __('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>\n"; ?>
			</div>
		</div>
<?php endforeach; ?>
	</div>
</div>
