<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Receta Paso Imagenes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Paso'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaPasoImagenes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPasoImagene) ?>
    <fieldset>
        <legend><?= __('Add Receta Paso Imagene') ?></legend>
        <?php
            echo $this->Form->input('receta_paso_id', ['options' => $recetaPasos]);
            echo $this->Form->input('orden');
            echo $this->Form->input('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
