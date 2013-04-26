<?php
	$groups = ClassRegistry::init('Documentation.Group')->find('all', array(
		'conditions' => array('Group.version_id' => $version_id),
		'contain'    => array('Ressource', 'Version')
	));
?>

<div class="row">
	<?php echo $this->Html->link(__d('documentation', 'Add a group'), array(
		'admin' 	 => true,
		'plugin'     => 'documentation',
		'controller' => 'groups',
		'action'     => 'add'
	), array('class'=>'button small expand')) ?>
</div>

<div class="row">
	<?php echo $this->Html->link(__d('documentation', 'Add a ressource'), array(
		'admin' 	 => true,
		'plugin'     => 'documentation',
		'controller' => 'ressources',
		'action'     => 'add'
	), array('class'=>'button small expand')) ?> 
</div>



<?php foreach ($groups as $group): ?>
<div class="row">
	<h4><?php echo $group['Group']['name']; ?> 
		<small style="float:right; line-height:2.4">
			<?php echo $this->Html->link('<i class="icon-pencil icon-large"></i>', array(
				'admin' 	 => true,
				'plugin'     => 'documentation',
				'controller' => 'groups',
				'action'     => 'edit',
				$group['Group']['id']			
			), array('title'=>__d('documentation', 'Edit'), 'escape' => false)
			) ?> <?php echo $this->Html->link('<i class="icon-remove icon-large"></i>', array(
				'admin' 	 => true,
				'plugin'     => 'documentation',
				'controller' => 'groups',
				'action'     => 'delete',
				$group['Group']['id']
			), array('title'=>__d('documentation', 'Delete'), 'escape' => false), __d('documentation', 'Are you sure you want to delete it ?')) ?>
		</small>
	</h4>
	<ul class="side-nav">
		<?php foreach ($group['Ressource'] as $ressource): ?>
			<li>
				<?php echo $this->Html->link(strtoupper($ressource['method']).' '.$ressource['url'], array(
					'admin' 	 => false,
					'plugin'     => 'documentation',
					'controller' => 'ressources',
					'action'     => 'view',
					$ressource['id']
				)); ?>
			</li>
		<?php endforeach ?>
	</ul>
</div>
<?php endforeach ?>
