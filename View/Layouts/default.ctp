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
				'/cherry/css/core',
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
	<body id="top" class="controller-<?php echo $this->request->params['controller']; ?> action-<?php echo $this->request->params['action']; ?>">
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<?php
			echo $this->Html->script(array(
				'//code.jquery.com/jquery-1.11.0.min.js',
				'//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js',
				'/cherry/js/core',
				'default',
			));
			echo $this->fetch('script');
		?>
	</body>
</html>
