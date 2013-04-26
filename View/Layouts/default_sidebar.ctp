<?php $this->extend('default'); ?>

<div class="row">    
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 push-3 columns">
   		<?php echo $this->fetch('content'); ?>
    </div>
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">  
    	<?php echo $this->element('sidebar'); ?>
    </div>
    
</div>