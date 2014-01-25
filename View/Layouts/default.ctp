<?php
	/**
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
	 * @package       app.View.Layouts
	 * @since         CakePHP(tm) v 0.10.0.1076
	 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
	 */
?>
<?php echo $this->Html->docType('html5'); ?>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo __d('cherry', 'Cherry'); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, user-scalable=no'));
			echo $this->Html->css(array(
				'//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css',
				'//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css',
				'/bootstrap/css/core',
				'default'
			));
			echo $this->fetch('meta');
			echo $this->fetch('css');
		?>
		<!--[if lt IE 9]>
			<?php
				echo $this->Html->css(array(
					'//html5shiv.googlecode.com/svn/trunk/html5.js',
					'//raw.github.com/scottjehl/Respond/master/respond.min.js'
				));
			?>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<?php
			echo $this->Html->script(array(
				'//code.jquery.com/jquery-1.11.0.min.js',
				'//code.jquery.com/jquery-1.11.0.min.map',
				'//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js',
				'/bootstrap/js/core',
				'default',
			));
			echo $this->fetch('script');
		?>
	</body>
</html>
