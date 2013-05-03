<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo __d('Bootstrap', 'Bootstrap Plugin') ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0, user-scalable=no'));
			echo $this->Html->css(array(
				'/bootstrap/css/bootstrap.min',
				'/bootstrap/css/core'
			));
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->Html->css('/bootstrap/css/bootstrap-responsive.min');
		?>
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="#">Cherry</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#contact">Contact</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="nav-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
						<form class="navbar-form pull-right">
							<input class="span2" type="text" placeholder="Email">
							<input class="span2" type="password" placeholder="Password">
							<button type="submit" class="btn">Sign in</button>
						</form>
						<!-- <p class="navbar-text pull-right">
							Logged in as <a href="#" class="navbar-link">Username</a>
						</p> -->
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<hr>
			<footer id="footer">
				<p>&copy; Carpe Telam, LLC <?php echo date('Y'); ?></p>
			</footer>
			<?php echo $this->element('Bootstrap.sql/dump'); ?>
		</div>
		<?php 
			echo $this->Html->script(array(
				'//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',
				'/bootstrap/js/bootstrap.min',
				'/bootstrap/js/core'
			));
			echo $this->fetch('script');
			echo $this->Js->writeBuffer();
		?>
	</body>
</html>
