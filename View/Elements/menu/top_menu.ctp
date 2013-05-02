<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php echo $this->Html->link(__('rappidApp Automator'), array('controller' => 'applications', 'action' => 'index'), array('class' => 'brand')); ?>
			<div class="nav-collapse">
				<ul class="nav">
					<li><?php echo $this->Html->link(__('Applications'), array('controller' => 'applications', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('Builds'), array('controller' => 'builds', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('SDK Versions'), array('controller' => 'sdk_versions', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('Servers'), array('controller' => 'servers', 'action' => 'index')); ?></li>
				</ul>
			</div>
		</div>
	</div>
</div>