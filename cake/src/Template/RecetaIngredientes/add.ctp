<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver ingredientes en recetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Ver Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaIngredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaIngrediente) ?>
    <fieldset>
        <legend><?= __('Añadir Ingrediente a Receta') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('ingrediente_id', ['options' => $ingredientes]);
            echo $this->Form->input('cantidad');
            echo $this->Form->input('medida');
            echo $this->Form->input('notas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Añadir')) ?>
    <?= $this->Form->end() ?>
</div>
