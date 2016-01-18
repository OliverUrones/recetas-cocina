<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Ingredientes de Receta'), ['action' => 'edit', $recetaIngrediente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Ingrediente de Receta '), ['action' => 'delete', $recetaIngrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaIngrediente->id)]) ?> </li>
        <li><?= $this->Html->link(__('Ver Ingredientes en Recetas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Añadir Ingrediente a Receta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Ver Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recetaIngredientes view large-9 medium-8 columns content">
    <h3><?= h($recetaIngrediente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $recetaIngrediente->has('receta') ? $this->Html->link($recetaIngrediente->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaIngrediente->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ingrediente') ?></th>
            <td><?= $recetaIngrediente->has('ingrediente') ? $this->Html->link($recetaIngrediente->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $recetaIngrediente->ingrediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Medida') ?></th>
            <td><?= h($recetaIngrediente->medida) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recetaIngrediente->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($recetaIngrediente->cantidad) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notas') ?></h4>
        <?= $this->Text->autoParagraph(h($recetaIngrediente->notas)); ?>
    </div>
</div>
