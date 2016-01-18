<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar Ingrediente de Receta'),
                ['action' => 'delete', $recetaIngrediente->id],
                ['confirm' => __('Estas seguro de borrar # {0}?', $recetaIngrediente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes en Recetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Ver Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaIngredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaIngrediente) ?>
    <fieldset>
        <legend><?= __('Editar Ingredientes en Recetas') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('ingrediente_id', ['options' => $ingredientes]);
            echo $this->Form->input('cantidad');
            echo $this->Form->input('medida');
            echo $this->Form->input('notas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
