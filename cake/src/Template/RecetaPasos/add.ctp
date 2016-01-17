<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?=  __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Pasos de Receta'), ['action' => 'index',$receta_id]) ?></li>
        <li><?= $this->Html->link(__('Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="recetaPasos form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPaso) ?>
    <fieldset>
        <legend><?= __('Añadir paso de receta') ?></legend>
        <?php
           
            echo $this->Form->input('orden');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
