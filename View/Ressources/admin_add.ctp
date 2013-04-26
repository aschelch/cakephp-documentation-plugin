<h3><?php echo __d('documentation', 'Add a ressource'); ?></h3>

<?php echo $this->Form->create('Ressource');?>

    <fieldset>
        <legend><?php echo __d('documentation', 'Details') ?></legend>
        <div class="row">
            <?php echo $this->Form->input('Ressource.url', array('label'=>__d('documentation', 'URL'))) ?>
        </div> 
        <div class="row">
            <?php echo $this->Form->input('Ressource.description', array('label'=>__d('documentation', 'Description'))) ?>
        </div> 
        <div class="row">
            <?php echo $this->Form->input('Ressource.group_id', array('label'=>__d('documentation', 'Group'), 'div'=>array('class'=>'large-6 columns'))) ?>
            <?php echo $this->Form->input('Ressource.method', array('label'=>__d('documentation', 'Method'), 'options'=>array('get'=>'GET', 'post'=>'POST'), 'default'=>'get', 'empty'=>false, 'div'=>array('class'=>'large-6 columns'))) ?>
        </div> 
    </fieldset>

    <fieldset>
        <legend><?php echo __d('documentation', 'Parameters') ?></legend>
        <div id="parameters">
            <div class="row" id="parameter-model" style="display:none;">
                    <div class="large-12 columns">
                        <h5><?php echo __d('documentation', 'Parameter'); ?> <small>[<a href="#" class="deleteParameter"><?php echo __d('documentation', 'Delete') ?></a>]</small></h5>
                    </div>
                    <div class="large-3 columns">
                        <?php echo $this->Form->input('Parameter.#.name', array('label'=>__d('documentation', 'Parameter name'))); ?>
                    </div>
                    <div class="large-2 columns">
                        <?php echo $this->Form->input('Parameter.#.required', array('label'=>__d('documentation', 'required'))); ?>
                    </div>
                    <div class="large-2 columns">
                        <?php echo $this->Form->input('Parameter.#.example', array('label'=>__d('documentation', 'Example'))); ?>
                    </div>
                    <div class="large-5 columns">
                        <?php echo $this->Form->input('Parameter.#.description', array('label'=>__d('documentation', 'Description'))); ?>
                    </div>
                </div>
            
        </div>
        <?php echo $this->Html->link(__d('documentation', 'Add a parameters'), '#', array('class'=>'button tiny', 'id'=>'addParameter')) ?> 
    </fieldset>

    <fieldset>
        <legend><?php echo __d('documentation', 'Examples') ?></legend>
        <div id="examples">
            <div id="example-model" style="display:none;">
                <h5><?php echo __d('documentation', 'Example'); ?> <small>[<a href="#" class="deleteExample"><?php echo __d('documentation', 'Delete') ?></a>]</small></h5>
                <?php echo $this->Form->input('Example.#.name', array('label'=>__d('documentation', 'Title'))); ?>
                <?php echo $this->Form->input('Example.#.request', array('label'=>__d('documentation', 'Request'))); ?>
                <?php echo $this->Form->input('Example.#.result', array('label'=>__d('documentation', 'Result'))); ?>
            </div>
        </div>
        <?php echo $this->Html->link(__d('documentation', 'Add a example'), '#', array('class'=>'button tiny', 'id'=>'addExample')) ?>
    </fieldset>

    <?php echo $this->Form->submit(__d('documentation', 'Save'), array('class'=>'button')) ?>
<?php echo $this->Form->end(); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
    var i = 0;
    $('#addParameter').click(function(){
        var m = $('#parameter-model');
        n = m.clone();
        n.css('display', 'block');
        n.removeAttr('id');
        n.find('input, label, textarea').each(function(){
            if($(this).attr('for') != undefined){
                $(this).attr('for', $(this).attr('for').replace('#',i));
            }
            if($(this).attr('name') != undefined){
                $(this).attr('name', $(this).attr('name').replace('#',i));
            }
            if($(this).attr('id') != undefined){
                $(this).attr('id', $(this).attr('id').replace('#',i));
            }
        });
        m.before(n);
        i++;
        return false;
    });

    $(document).on("click", '.deleteParameter', function(){ 
        $(this).parent().parent().parent().parent().remove();
        return false;
    });

    var j = 0;
    $('#addExample').click(function(){
        var m = $('#example-model');
        n = m.clone();
        n.css('display', 'block');
        n.removeAttr('id');
        n.find('input, label, textarea').each(function(){
            if($(this).attr('for') != undefined){
                $(this).attr('for', $(this).attr('for').replace('#',j));
            }
            if($(this).attr('name') != undefined){
                $(this).attr('name', $(this).attr('name').replace('#',j));
            }
            if($(this).attr('id') != undefined){
                $(this).attr('id', $(this).attr('id').replace('#',j));
            }
        });
        m.before(n);
        j++;
        return false;
    });


    $(document).on("click", '.deleteExample', function(){ 
        $(this).parent().parent().parent().remove();
        return false;
    });
<?php $this->Html->scriptEnd(); ?>
