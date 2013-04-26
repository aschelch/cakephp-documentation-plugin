

  <div class="row">
    <div class="large-12 columns">

      <h2><?php echo __d('documentation', 'Documentation') ?></h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </div>
  </div>

  <div class="row">
    <div class="large-12 columns">
      <div class="row">

    <!-- Thumbnails -->
        <?php foreach ($versions as $version): ?>
          
        <div class="large-4 columns">
            <?php echo $this->Html->link('<div class="panel"><h6>'.$version['Version']['name'].'</h6><p>'.$version['Version']['description'].'</p></div>', 
              array('admin'=>false,'controller'=>'versions', 'action' => 'view', $version['Version']['id']), 
              array('escape' => false)) ?>
        </div>

        <?php endforeach ?>

        <div class="large-4 columns end">
            <?php echo $this->Html->link('<div class="panel"><h6>'.__d('documentation', 'Add a version').'</h6><p></p></div>', 
              array('admin'=>true,'controller'=>'versions', 'action' => 'add'), 
              array('escape' => false)) ?>
        </div>

    <!-- End Thumbnails -->

      </div>
    </div>
  </div>

