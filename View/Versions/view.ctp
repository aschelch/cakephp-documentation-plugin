<?php $this->set('version_id', $version['Version']['id']); ?>

<div class="large-12 columns">
    <h3>
        <?php echo __d('documentation', 'API %s', $version['Version']['name']) ?>
        <small style="float:right; line-height:2.4">
            <?php echo $this->Html->link('<i class="icon-pencil icon-large"></i>', array(
                'admin'      => true,
                'plugin'     => 'documentation',
                'controller' => 'versions',
                'action'     => 'edit',
                $version['Version']['id']
            ), array('title'=>__d('documentation', 'Edit'), 'escape'=>false)) ?> <?php echo $this->Html->link('<i class="icon-remove icon-large"></i>', array(
                'admin'      => true,
                'plugin'     => 'documentation',
                'controller' => 'versions',
                'action'     => 'delete',
                $version['Version']['id']
            ), array('title'=>__d('documentation', 'Delete'), 'escape'=>false), __d('documentation', 'Are you sure you want to delete it ?')) ?>
        </small>
    </h3>
    <hr>
</div>


<?php foreach ($version['Group'] as $group): ?>
<div class="large-12 columns">
    <h4><?php echo $group['name'] ?>

    </h4>

    <table width="100%">
        <thead>
            <tr>
                <th width="300"><?php echo __d('documentation', 'Ressource') ?></th>
                <th><?php echo __d('documentation', 'Description') ?></th>
            </tr>
        </thead>
        <?php foreach ($group['Ressource'] as $ressource): ?>
        <tbody>
            <tr>
                <td>
                <?php echo $this->Html->link(strtoupper($ressource['method']).' '.$ressource['url'], array(
                    'admin'      => false,
                    'plugin'     => 'documentation',
                    'controller' => 'ressources',
                    'action'     => 'view',
                    $ressource['id']
                )); ?>
                </td>
                <td>
                    <p><?php echo $ressource['description'] ?></p>
                </td>
            </tr>
        </tbody>
        <?php endforeach ?> 
    </table>
</div>
<?php endforeach ?>
