<?php

$title = strtoupper($data['Ressource']['method']).' '.$data['Ressource']['url'];
$this->set('title_for_layout', $title);

$this->set('version_id', $data['Group']['Version']['id']);


?>

<h3><?php echo $title; ?> <small>
<?php echo $this->Html->link('<i class="icon-pencil icon-large"></i>', array(
    'admin'   => true,
    'plugin'     => 'documentation',
    'controller' => 'ressources',
    'action'     => 'edit',
    $data['Ressource']['id']
), array('title'=>__d('documentation', 'Edit'), 'escape'=>false)) ?>
 <?php echo $this->Html->link('<i class="icon-remove icon-large"></i>', array(
    'admin'      => true,
    'plugin'     => 'documentation',
    'controller' => 'ressources',
    'action'     => 'delete',
    $data['Ressource']['id']
), array('title'=>__d('documentation', 'Delete'), 'escape'=>false), __d('documentation', 'Are you sure you want to delete it ?')) ?></small></h3>

<p><?php echo $data['Ressource']['description']; ?></p>

<h4><?php echo __d('documentation', 'Parameter'); ?></h4>
<?php if (!empty($data['Parameter'])): ?>
<table width="100%">
  <tbody>
    <?php foreach ($data['Parameter'] as $parameter): ?>
    <tr>
        <td width="220px;">
            <p><strong><?php echo $parameter['name'] ?></strong><br>
            <?php echo $parameter['required']?__d('documentation', 'required'):__d('documentation', 'optional') ?></p>
        </td>
        <td>
            <p><?php echo $parameter['description'] ?><br>
            <strong><?php echo __d('documentation', 'Example value') ?></strong>: <?php echo $parameter['example'] ?></p>

        </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>
<?php else: ?>
    <p><?php echo __d('documentation', 'No parameters') ?></p>
<?php endif ?>

<h4><?php echo __d('documentation', 'Example request'); ?></h4>
<?php if (!empty($data['Example'])): ?>
    <?php foreach ($data['Example'] as $i => $example): ?>
        <h5><?php echo __d('documentation', 'Example #%s', $i+1).' : '.$example['name'] ?></h5>
        <blockquote><?php echo strtoupper($data['Ressource']['method']).' '.$example['request'] ?></blockquote>
        <blockquote><?php echo $example['result'] ?></blockquote>
    <?php endforeach ?>
<?php else: ?>
    <p><?php echo __d('documentation', 'No examples') ?></p>
<?php endif ?>

