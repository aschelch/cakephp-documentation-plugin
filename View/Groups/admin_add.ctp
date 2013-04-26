<h3><?php echo __d('documentation', 'Add a group'); ?></h3>

<?php echo $this->Form->create('Group'); ?>
    <fieldset>
        <legend><?php echo __d('documentation', 'Details') ?></legend>
	    <?php echo $this->Form->input('Group.name', array('label'=>__d('documentation', 'Group name'))) ?>
	    <?php echo $this->Form->input('Group.version_id', array('label'=>__d('documentation', 'Version'))) ?>
	</fieldset>
	<?php echo $this->Form->submit(__d('documentation', 'Save'), array('class'=>'button')) ?>
<?php echo $this->Form->end(); ?>