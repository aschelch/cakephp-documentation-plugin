<?php
	$versions = Cache::read('Version.list');
    if (!$versions) {
		$versions = ClassRegistry::init('Documentation.Version')->find('list');
        Cache::write('Version.list', $versions);
    }
?>
<ul class="inline-list right">
<?php foreach ($versions as $id => $code): ?>
	<li>
		<?php echo $this->Html->link($code, array(
			'admin' => false,
			'plugin' => 'documentation',
			'controller' => 'versions',
			'action' => 'view',
			$id
		)); ?>
	</li>
<?php endforeach ?>
</ul>