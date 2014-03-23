<?php echo $this->Html->docType('html5'); ?>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo __d('cherry', 'Cherry'); ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, user-scalable=no'));
			echo $this->Html->css(array(
				'//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css',
				'//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css',
				'/cherry/css/core'
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
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo $this->Html->link('Cherry', '/', array('class' => 'navbar-brand')); ?>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><?php echo $this->Html->link('Home', '/'); ?></li>
						<li><?php echo $this->Html->link('Link', '#'); ?></li>
						<li><?php echo $this->Html->link('Link', '#'); ?></li>
						<li class="dropdown">
							<?php echo $this->Html->link('Dropdown <span class="caret"></span>', '#', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'escape' => false)); ?>
							<ul class="dropdown-menu">
								<li><?php echo $this->Html->link('Action', '#'); ?></li>
								<li><?php echo $this->Html->link('Another action', '#'); ?></li>
								<li><?php echo $this->Html->link('Something else here', '#'); ?></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><?php echo $this->Html->link('Separated link', '#'); ?></li>
								<li><?php echo $this->Html->link('One more separated link', '#'); ?></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<?php
			echo $this->Html->script(array(
				'//code.jquery.com/jquery-1.11.0.min.js',
				'//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',
				'/cherry/js/core'
			));
			echo $this->fetch('script');
		?>
	</body>
</html>
