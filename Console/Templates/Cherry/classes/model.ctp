<?php
/**
 * Model template file.
 *
 * Used by bake to create new Model files.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.classes
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

echo "<?php\n";
?>
	<?php echo "App::uses('{$plugin}AppModel', '{$pluginPath}Model');\n"; ?>

	/**
	 * <?php echo $name ?> Model
	 *
<?php foreach (array('hasOne', 'belongsTo', 'hasMany', 'hasAndBelongsToMany') as $assocType): ?>
<?php if (!empty($associations[$assocType])): ?>
<?php foreach ($associations[$assocType] as $relation): ?>
	<?php echo " * @property {$relation['className']} \${$relation['alias']}\n"; ?>
<?php endforeach; ?>
<?php endif; ?>
<?php endforeach; ?>
	 */
	class <?php echo $name ?> extends <?php echo $plugin; ?>AppModel {

<?php if ($useDbConfig !== 'default'): ?>
		/**
		 * Use database config
		 *
		 * @var string
		 */
		public $useDbConfig = '<?php echo $useDbConfig; ?>';

<?php endif; ?>
<?php if ($useTable && $useTable !== Inflector::tableize($name)): ?>
		/**
		 * Use table
		 *
		 * @var mixed False or table name
		 */
		public $useTable = '<?php echo $useTable; ?>';

<?php endif; ?>
<?php if ($primaryKey !== 'id'): ?>
		/**
		 * Primary key field
		 *
		 * @var string
		 */
		public $primaryKey = '<?php echo $primaryKey; ?>';

<?php endif; ?>
<?php if ($displayField): ?>
		/**
		 * Display field
		 *
		 * @var string
		 */
		public $displayField = '<?php echo $displayField; ?>';

<?php endif; ?>
<?php if (!empty($actsAs)): ?>
		/**
		 * Behaviors
		 *
		 * @var array
		 */
		public $actsAs = array(
<?php foreach ($actsAs as $behavior): ?>
			<?php var_export($behavior); ?>,
<?php endforeach; ?>
		);

<?php endif; ?>
<?php if (!empty($validate)): ?>
		/**
		 * Validation rules
		 *
		 * @var array
		 */
		public $validate = array(
<?php foreach ($validate as $field => $validations): ?>
			'<?php echo $field; ?>' => array(
<?php foreach ($validations as $key => $validator): ?>
				'<?php echo $key; ?>' => array(
					'rule' => array('<?php echo $validator; ?>'),
					'message' => '<?php echo $validator; ?>'
				),
<?php endforeach; ?>
			),
<?php endforeach; ?>
		);
<?php endif; ?>

<?php foreach (array('hasOne', 'belongsTo', 'hasMany', 'hasAndBelongsToMany') as $assocType): ?>
<?php if (!empty($associations[$assocType])): ?>
<?php $typeCount = count($associations[$assocType]); ?>
		/**
		 * <?php echo $assocType; ?> associations
		 *
		 * @var array
		 */
<?php $assocToPrint = array(); ?>
<?php foreach ($associations[$assocType] as $i => $relation): ?>
<?php $assocToPrint[] = $relation['alias']; ?>
<?php endforeach; ?>
		public $<?php echo $assocType; ?> = array('<?php echo implode('\', \'', $assocToPrint); ?>');

<?php endif; ?>
<?php endforeach; ?>
	}
