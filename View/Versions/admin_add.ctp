<h3><?php echo __d('documentation', 'Add a version'); ?></h3>

<?php echo $this->Form->create('Version'); ?>

    <fieldset>
        <legend><?php echo __d('documentation', 'Details') ?></legend>
        <?php echo $this->Form->input('Version.code', array('label'=>__d('documentation', 'Version code'))) ?>
	    <?php echo $this->Form->input('Version.name', array('label'=>__d('documentation', 'Version name'))) ?>
	    <?php echo $this->Form->input('Version.description', array('label'=>__d('documentation', 'Description'))) ?>
	</fieldset>
    <?php echo $this->Form->submit(__d('documentation', 'Save'), array('class'=>'button')) ?>
<?php echo $this->Form->end(); ?>