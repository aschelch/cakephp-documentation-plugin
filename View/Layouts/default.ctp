<!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title><?php echo $title_for_layout; ?></title>

  <?php echo $this->Html->css('/documentation/css/normalize'); ?>
  <?php echo $this->Html->css('/documentation/css/foundation'); ?>
  <?php echo $this->Html->script('/documentation/js/vendor/custom.modernizr.js'); ?>
  
  <?php echo $this->Html->css('/documentation/css/font-awesome'); ?>

</head>
<body>

<!-- Header and Nav -->
  
    <div class="row">
        <div class="large-3 columns">
            <h1><?php echo $this->Html->link(Configure::read('Documentation.title'), array(
                'plugin'     => 'documentation',
                'admin'      => false,
                'controller' => 'versions',
                'action'     => 'index'
            )) ?></h1>  
        </div>
            <div class="large-9 columns">
                <?php echo $this->element('header'); ?>
            </div>
    </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">   
    <?php echo $this->fetch('content'); ?>
  </div>
    
  
  <!-- Footer -->
  
  <footer class="row">
    <div class="large-12 columns">
      <hr />
      <div class="row">
        <div class="large-6 columns">
          <p>&copy; Copyright</p>
        </div>
        <div class="large-6 columns">
          <?php echo $this->element('header'); ?>
        </div>
      </div>
    </div> 
  </footer>

  <?php echo $this->Html->script('/documentation/js/vendor/jquery.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.cookie.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.alerts.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.clearing.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.dropdown.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.forms.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.joyride.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.magellan.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.orbit.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.placeholder.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.reveal.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.section.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.tooltips.js'); ?>
  <?php echo $this->Html->script('/documentation/js/foundation/foundation.topbar.js'); ?>
  <script>
    $(document).foundation().foundation('joyride', 'start');
  </script>

  <?php echo $scripts_for_layout; ?>
</body>
</html>
