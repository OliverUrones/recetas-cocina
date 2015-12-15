<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Paso Imagenes'), ['controller' => 'RecetaPasoImagenes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Paso Imagene'), ['controller' => 'RecetaPasoImagenes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaPasos form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPaso) ?>
    <fieldset>
        <legend><?= __('Add Receta Paso') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('orden');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
